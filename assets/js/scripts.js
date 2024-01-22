import {gsap} from "gsap";

document.addEventListener("DOMContentLoaded", function () {

    let words = document.querySelectorAll(".homepage_title .word");

    words.forEach((word, index) => {
        let tl = gsap.timeline({
            delay: (index + 1) * 2, // Décalage pour chaque élément
            repeat: -1,
            repeatDelay: words.length + 1,
            onComplete: () => {
                if (index < words.length - 1) {
                    //tl.reverse(); // Inverse l'animation après son achèvement
                }
            }
        });

        // Ajouter des animations à la timeline
        tl.fromTo(word, {
                translateY: "100%",
                autoAlpha: 0
            },
            {
                autoAlpha: 1,
                translateY: "0%",
                duration: 1
            })

            .to(word, {
                autoAlpha: 0,
                duration: 1,
                translateY: "-100%",
            }, "+=1"); // Délai avant la disparition
    })

});

let imagesSliderHero = document.querySelectorAll(".image-slider-hero");
let dotsSliderHero = document.querySelectorAll(".dot-slider-hero");

dotsSliderHero.forEach((item, index) => {
    item.addEventListener("click", ()=>{
        const oldImage = Array.from(imagesSliderHero).find((image) => image.classList.contains("active"))

        oldImage.classList.remove("active")
        oldImage.classList.add("hidden")

        imagesSliderHero[index].classList.add("active")
        imagesSliderHero[index].classList.remove("hidden")

        const oldPoint = document.querySelector(".dot-slider-hero.active")
        oldPoint.classList.remove("active")
        oldPoint.classList.replace("bg-primary", "bg-[#E5E5E5]")

        item.classList.add("active")
        item.classList.replace("bg-[#E5E5E5]", "bg-primary")
    })
})