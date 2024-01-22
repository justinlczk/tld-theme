document.addEventListener("DOMContentLoaded", function(){

  let words = document.querySelectorAll(".homepage_title word")

  let tlWords = gsap.timeline({
    repeat: -1,
    duration: 1000,
    delay: 2000,
    stagger: 2500,
  })

  tlWords.from(words, {
    translateY: "100%"
  })

  tlWords.to(words, {
    translateY: "0%"
  })

  tlWords.to(words, {
    translateY: "-100%"
  })

});
