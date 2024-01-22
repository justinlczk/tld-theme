import {gsap} from "gsap";

document.addEventListener("DOMContentLoaded", function () {

    let words = document.querySelectorAll(".homepage_title .word");

    words.forEach((word, index) => {
        let tl = gsap.timeline({
            delay: (index + 1) * 2, // Décalage pour chaque élément
            repeat: -1,
            repeatDelay: words.length * 2,
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
