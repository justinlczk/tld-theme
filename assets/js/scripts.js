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



if(imagesSliderHero.length > 1) {

    let arrayItems = []

    imagesSliderHero.forEach((itemImage, indexImage)=>{
        const activated = itemImage.classList.contains("active");
        arrayItems.push({
            itemImage: itemImage,
            activated: activated,
            index: indexImage,
            dot: dotsSliderHero[indexImage]
        })
    })

    const changeItemActive = () => {
        let currentIndex = arrayItems.findIndex((item) => item.activated === true )
        let nextItemIndex = currentIndex + 1;
        if(nextItemIndex > arrayItems.length - 1) {
            nextItemIndex = 0;
        }

        console.log("next item",nextItemIndex)

        let currentItem = arrayItems[currentIndex];

        currentItem.itemImage.classList.replace("active", "hidden")
        currentItem.dot.classList.replace("bg-primary", "bg-[#E5E5E5]")
        currentItem.dot.classList.remove("active")
        currentItem.activated = false

        let nextItem = arrayItems[nextItemIndex];

        nextItem.itemImage.classList.replace("hidden", "active")
        nextItem.dot.classList.replace("bg-[#E5E5E5]", "bg-primary")
        nextItem.dot.classList.add("active")
        nextItem.activated = true
    }

    let intervalAnimation = setInterval(changeItemActive, 5000);

    dotsSliderHero.forEach((item, index) => {
        item.addEventListener("click", ()=>{
            clearInterval(intervalAnimation)
            let oldItem = arrayItems.find(item => item.activated === true)
            oldItem.activated = false
            arrayItems[index].activated = true;

            console.log(arrayItems)

            const oldImage = oldItem.itemImage

            oldImage.classList.remove("active")
            oldImage.classList.add("hidden")

            imagesSliderHero[index].classList.add("active")
            imagesSliderHero[index].classList.remove("hidden")


            const oldPoint = document.querySelector(".dot-slider-hero.active")
            oldPoint.classList.remove("active")
            oldPoint.classList.replace("bg-primary", "bg-[#E5E5E5]")


            item.classList.add("active")
            item.classList.replace("bg-[#E5E5E5]", "bg-primary")

            intervalAnimation = setInterval(changeItemActive, 5000);
        })
    })


}