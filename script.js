const { animate, text, stagger } = anime;

const { chars: chars1} =text.split('.home-professoin-1', { chars:true })
const { chars: chars2} =text.split('.home-professoin-2', { chars:true })

animate(chars1, {
  y: [
    { to: ['100%', '0%'] },
    { to: '-100%', delay: 2000, ease: 'in(3)' }
  ],
  duration: 900,
  ease: 'out(3)',
  delay: stagger(80),
  loop: true,
});
animate(chars2, {
  y: [
    { to: ['100%', '0%'] },
    { to: '-100%', delay: 2000, ease: 'in(3)' }
  ],
  duration: 900,
  ease: 'out(3)',
  delay: stagger(80),
  loop: true,
});


let swiper = new Swiper(".projects-swiper", {
  slidesPerView: 3,
  spaceBetween: 30,
  loop: true,
  centeredSlides: false,

  speed:3000,

  autoplay: {
    delay: 1500,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,

  },

  

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});


const tabs = document.querySelectorAll(".work-button");
  const contents = document.querySelectorAll(".work-content");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const target = tab.getAttribute("data-target");

      tabs.forEach((t) => t.classList.remove("work-active"));

 
      contents.forEach((content) =>
        content.classList.remove("work-active")
      );

      
      tab.classList.add("work-active");

      
      document.getElementById(target).classList.add("work-active");
    });
  });