// GSAP
// hidden right
let observer = new IntersectionObserver((entries)=>{
  entries.forEach((entry)=>{
    if(entry.isIntersecting){
      entry.target.classList.add('showw')
    }else{
      entry.target.classList.remove('showw')
    }
  })
})
let hidddenElement = document.querySelectorAll('.hidddenright');
hidddenElement.forEach((el) => observer.observe(el))

// hidden left
let observer2 = new IntersectionObserver((entries)=>{
  entries.forEach((entry)=>{
    if(entry.isIntersecting){
      entry.target.classList.add('showw')
    }else{
      entry.target.classList.remove('showw')
    }
  })
})
let hidddenElement2 = document.querySelectorAll('.hidddenleft');
hidddenElement2.forEach((el) => observer2.observe(el))

// hiddden
let observer3 = new IntersectionObserver((entries)=>{
  entries.forEach((entry)=>{
    if(entry.isIntersecting){
      entry.target.classList.add('showw')
    }else{
      entry.target.classList.remove('showw')
    }
  })
})
let hidddenElement3 = document.querySelectorAll('.hiddden');
hidddenElement3.forEach((el) => observer3.observe(el))










// navBar effect


var prevScrollpos = window.pageYOffset;
let navBar = document.getElementById('navbar')
let nav_toggler = document.getElementById('nav_toggler')


nav_toggler.onclick = ()=>{
  navBar.style.cssText = `
            background: white !important;
        `;
}


window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    navBar.style.top = "0";
  
      if(this.scrollY >= 60)
      {
        navBar.style.cssText = `
        background: white !important; 
        padding-bottom: 40px;
        box-shadow: 10px -30px 100px black
        `; 
       
      }
      if(this.scrollY <= 60 )
      {
        navBar.style.cssText = `
            background: none !important;

        `;
      }

  } else {
    navBar.style.top = "-150px";
  }
  prevScrollpos = currentScrollPos;
}



