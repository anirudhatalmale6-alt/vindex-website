/* ============ VINDEX — shared behaviour ============ */
(function(){
  var root=document.documentElement;

  /* ---------- ANALYTICS CONFIG ----------
     Fill in whichever you use, then re-upload this file. Leave blank to disable
     (the cookie banner only appears when at least one of these is set). */
  var ANALYTICS = {
    goatcounter: '',  // e.g. 'https://vindex.goatcounter.com/count'
    matomoUrl:   '',  // e.g. 'https://vindex.matomo.cloud/'  (keep the trailing slash)
    matomoSite:  '1'  // your Matomo site id
  };

  /* THEME (persisted; also applied pre-paint by inline head script) */
  var tbtn=document.getElementById('theme'), tic=document.getElementById('theme-ic');
  var sun='<circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/>';
  var moon='<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>';
  function syncIcon(){ if(tic) tic.innerHTML = root.getAttribute('data-theme')==='dark'?sun:moon; }
  syncIcon();
  if(tbtn) tbtn.onclick=function(){
    var dark=root.getAttribute('data-theme')==='dark';
    var next=dark?'light':'dark';
    root.setAttribute('data-theme',next);
    try{localStorage.setItem('vindex-theme',next);}catch(e){}
    syncIcon();
  };

  /* LANGUAGE (persisted across pages) */
  var lang='en';
  try{ lang=localStorage.getItem('vindex-lang')||'en'; }catch(e){}
  function applyLang(l){
    var nodes=document.querySelectorAll('[data-en]');
    for(var i=0;i<nodes.length;i++){
      var v=nodes[i].getAttribute('data-'+l);
      if(v!=null) nodes[i].innerHTML=v;
    }
    // placeholders
    var ph=document.querySelectorAll('[data-en-ph]');
    for(var j=0;j<ph.length;j++){
      var pv=ph[j].getAttribute('data-'+l+'-ph');
      if(pv!=null) ph[j].setAttribute('placeholder',pv);
    }
    var box=document.getElementById('lang');
    if(box){ var bs=box.querySelectorAll('button');
      for(var k=0;k<bs.length;k++) bs[k].classList.toggle('on',bs[k].getAttribute('data-lang')===l); }
    root.setAttribute('lang',l);
  }
  applyLang(lang);
  var langBox=document.getElementById('lang');
  if(langBox){
    var btns=langBox.querySelectorAll('button');
    for(var b=0;b<btns.length;b++){(function(btn){
      btn.onclick=function(){
        var l=btn.getAttribute('data-lang');
        try{localStorage.setItem('vindex-lang',l);}catch(e){}
        applyLang(l);
      };
    })(btns[b]);}
  }

  /* MOBILE MENU */
  var burger=document.getElementById('burger'), mm=document.getElementById('mobile-menu');
  if(burger&&mm) burger.onclick=function(){ mm.classList.toggle('open'); };

  /* ACCORDION */
  var heads=document.querySelectorAll('.acc-head');
  for(var h=0;h<heads.length;h++){(function(hd){
    hd.onclick=function(){ hd.parentElement.classList.toggle('open'); };
  })(heads[h]);}

  /* REVEAL ON SCROLL */
  if('IntersectionObserver' in window){
    var io=new IntersectionObserver(function(es){
      es.forEach(function(e){ if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); } });
    },{threshold:.12});
    document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
  } else {
    document.querySelectorAll('.reveal').forEach(function(el){ el.classList.add('in'); });
  }

  /* CONTACT FORM — posts to contact-send.php and only says "received" when the
     server confirms the email actually went. Any failure says so plainly and
     leaves what the visitor typed in place, so nothing is lost. */
  var form=document.getElementById('contact-form');
  if(form){
    var MSG={
      invalid:{en:'Please fill in your name, a valid email address and a message.',
               da:'Udfyld venligst dit navn, en gyldig e-mailadresse og en besked.'},
      not_configured:{en:'Sorry — the contact form isn’t switched on yet. Please try again a little later.',
               da:'Beklager — kontaktformularen er ikke slået til endnu. Prøv igen lidt senere.'},
      failed:{en:'Sorry — your message could not be sent just now. Please try again in a moment.',
               da:'Beklager — din besked kunne ikke sendes lige nu. Prøv igen om et øjeblik.'}
    };
    var cur=function(){ return (document.documentElement.getAttribute('lang')==='da')?'da':'en'; };
    var ok=document.getElementById('form-ok'), err=document.getElementById('form-err');
    var btn=form.querySelector('button[type=submit]');
    var showErr=function(key){
      if(!err) return; var m=MSG[key]||MSG.failed;
      err.setAttribute('data-en',m.en); err.setAttribute('data-da',m.da);
      err.textContent=m[cur()]; err.classList.add('show');
    };
    form.addEventListener('submit',function(e){
      e.preventDefault();
      if(ok) ok.classList.remove('show'); if(err) err.classList.remove('show');
      var bad=false;
      ['name','email','message'].forEach(function(n){
        var el=form.elements[n], f=el&&el.closest('.field'), v=(el&&el.value||'').trim();
        var wrong=!v||(n==='email'&&!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
        if(f) f.classList.toggle('bad',wrong); if(wrong) bad=true;
      });
      if(bad){ showErr('invalid'); return; }
      if(btn) btn.disabled=true;
      fetch(form.getAttribute('action')||'contact-send.php',{method:'POST',body:new FormData(form)})
        .then(function(r){ return r.json().catch(function(){ return {ok:false,code:'failed'}; }); })
        .then(function(res){
          if(res&&res.ok){ if(ok) ok.classList.add('show'); form.reset(); }
          else showErr(res&&res.code==='invalid'?'invalid':(res&&res.code==='not_configured'?'not_configured':'failed'));
        })
        .catch(function(){ showErr('failed'); })
        .then(function(){ if(btn) btn.disabled=false; });
    });
  }

  /* COOKIE CONSENT + ANALYTICS (scripts load ONLY after Accept) */
  (function(){
    var GC=ANALYTICS.goatcounter||'', MU=ANALYTICS.matomoUrl||'', MS=ANALYTICS.matomoSite||'1';
    if(!GC && !MU) return; // nothing configured -> no banner, no tracking
    if(MU && MU.charAt(MU.length-1)!=='/') MU+='/';
    function loadAnalytics(){
      if(window.__vdxAnalytics) return; window.__vdxAnalytics=true;
      if(GC){ var s=document.createElement('script'); s.async=true; s.setAttribute('data-goatcounter',GC); s.src='//gc.zgo.at/count.js'; document.head.appendChild(s); }
      if(MU){ var _paq=window._paq=window._paq||[]; _paq.push(['disableCookies']); _paq.push(['trackPageView']); _paq.push(['enableLinkTracking']); _paq.push(['setTrackerUrl',MU+'matomo.php']); _paq.push(['setSiteId',MS]); var g=document.createElement('script'); g.async=true; g.src=MU+'matomo.js'; document.head.appendChild(g); }
    }
    var KEY='vindex-consent', choice=null;
    try{ choice=localStorage.getItem(KEY); }catch(e){}
    if(choice==='yes'){ loadAnalytics(); return; }
    if(choice==='no'){ return; }
    // Build the banner
    var box=document.createElement('div');
    box.className='cookie-consent'; box.setAttribute('role','dialog');
    box.innerHTML='<div class="cc-inner">'+
      '<p class="cc-text" data-en="We use privacy-friendly analytics (no ads, no cross-site tracking) to see how the site is used. You choose whether to allow it." data-da="Vi bruger privatlivsvenlig statistik (ingen reklamer, ingen sporing på tværs af websites) for at se, hvordan sitet bruges. Du bestemmer, om det må tillades.">We use privacy-friendly analytics (no ads, no cross-site tracking) to see how the site is used. You choose whether to allow it.</p>'+
      '<div class="cc-actions">'+
      '<button type="button" class="btn btn-ghost" id="cc-decline" data-en="Decline" data-da="Afvis">Decline</button>'+
      '<button type="button" class="btn btn-primary" id="cc-accept" data-en="Accept" data-da="Accepter">Accept</button>'+
      '</div></div>';
    document.body.appendChild(box);
    try{ applyLang(lang); }catch(e){}
    function set(v){ try{localStorage.setItem(KEY,v);}catch(e){} box.parentNode&&box.parentNode.removeChild(box); if(v==='yes') loadAnalytics(); }
    document.getElementById('cc-accept').onclick=function(){ set('yes'); };
    document.getElementById('cc-decline').onclick=function(){ set('no'); };
  })();
})();
