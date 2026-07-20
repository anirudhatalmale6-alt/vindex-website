/* ============ VINDEX — shared behaviour ============ */
(function(){
  var root=document.documentElement;

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

  /* CONTACT FORM (client-side demo; backend wired later) */
  var form=document.getElementById('contact-form');
  if(form) form.addEventListener('submit',function(e){
    e.preventDefault();
    var ok=document.getElementById('form-ok');
    if(ok) ok.classList.add('show');
    form.reset();
  });
})();
