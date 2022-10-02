const btn_loading_0 = document.querySelector('.btn_loading_0');

btn_loading_0.addEventListener('click', ()=> {
  // text drop: middle param is the duration of animation
  gsap.to('.btn_loading_0', 1, {
    opacity: 0,
    y: 40,
    ease: Expo.easeInOut,
  });
  
  // text move out in stagger format
  gsap.to('.text-wrapper > div', 2, {
    xPercent: '12',
    ease: Expo.easeInOut,
    delay: 0.5,
    stagger: 0.15,
  });
  
  // scale & rotate the text container
  gsap.to('.text-wrapper', 3, {
    yPercent: '-50',
    scale: 4,
    rotate: -90,
    ease: Expo.easeInOut,
    delay: 1,
  });
  
  //
  gsap.to('.text', 1, {
    opacity: 1,
    ease: Expo.easeInOut,
    delay: 2,
  });
  
  gsap.to('.text-wrapper > div', 4, {
    xPercent: "-110",
    ease: Expo.easeInOut,
    delay: 2,
    stagger: 0.1,
  });
  
  // slide out main section
  gsap.to('.text-container', 2, {
    bottom: "-100%",
    ease: Expo.easeInOut,
    delay: 3.6,
  });
  

  
  gsap.from('.all_element .letter', 2, {
    opacity: 0,
    y: 50,
    delay: 7.5,
    stagger: 0.04,
    ease: Expo.easeOut,
  });
  
})

window.onload=function(){
  document.getElementById("linkid").click();
};

//-------------------------------------


setTimeout(function() {
  document.querySelector('.text-wrapper').classList.add('display_none');
}, 8000);

setTimeout(function() {
  document.querySelector('.text-container').classList.add('display_none');
}, 8000);

