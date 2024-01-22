import { gsap } from "gsap";

document.addEventListener("DOMContentLoaded", function(){

  let words = document.querySelectorAll(".homepage_title .word");

  let tlWords = gsap.timeline({
    repeat: -1, // Répéter indéfiniment
    delay: "+=2000ms", // Délai avant de commencer l'animation
  });

  tlWords.from(words, {
    duration: 0.1, // Durée de l'animation pour chaque mot (100ms)
    translateY: "100%", // Commence en bas
    stagger: 0.2, // Délai entre chaque mot
  });

  tlWords.to(words, {
    duration: 0.1,
    translateY: "0%", // Déplace chaque mot à sa position initiale
    stagger: 0.2,
  });

  tlWords.to(words, {
    delay: 2000,
    duration: 0.1,
    translateY: "-100%", // Déplace chaque mot en haut
    stagger: 0.2,
  });

});
