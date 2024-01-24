// main entry point
// include your assets here

// import Swiper JS
import Swiper from 'swiper';
import {Navigation, Pagination} from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/navigation';


// get styles
import "./assets/css/styles.scss"

// get scripts
import './assets/js/scripts.js'

document.querySelectorAll("h1, h2, h3, h4, h5, h6").forEach(title => {
    // if there is a "." in the content of the elements put span before
    if (title.textContent.includes(".")) {
        title.innerHTML = title.textContent.replace(/\./, match => `<span class="text-primary">${match}</span>`);
    }
})

const sliderTestimonial = document.querySelector('.slider-testimonial.swiper');

if (sliderTestimonial) {
    const swiperTestimonial = new Swiper(sliderTestimonial, {
        // configure Swiper to use modules
        modules: [Pagination],
        pagination: {
            el: '.swiper-pagination',
        },
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        breakpoints: {
            640: {
                slidesPerView: 3,
                spaceBetween: 48
            },
        }
    });
}

/*let projectsFilter = document.querySelector(".projects-filter");
if (projectsFilter) {
    let projectsFiltered = document.querySelectorAll(".project-filtered");
    let filters = projectsFilter.querySelectorAll(".selector-type");
    filters.forEach(filter => {
        filter.addEventListener("click", () => {
            const datasetTypeProject = filter.dataset.type;
            document.querySelector(".active.selector-type").classList.replace("active", "inactive");
            filter.classList.replace("inactive", "active")

            projectsFiltered.forEach(projectFiltered => {
                console.log(`project-${datasetTypeProject}`)
                if (projectFiltered.classList.contains(`project-${datasetTypeProject}`)) {
                    projectFiltered.style.display = "block";
                } else {
                    projectFiltered.style.display = "none";
                }
            })

        })
    })

    filters[0].click();
}*/

let sliderProjectPage = document.querySelector(".main-slider-project");
if (sliderProjectPage) {
    const swiperMainProject = new Swiper(sliderProjectPage, {
                modules: [Pagination, Navigation],
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    type: 'fraction',
                    formatFractionTotal: (number) => {
                        if (number < 10) {
                            return "0" + number
                        } else {
                            return number
                        }
                    },
                    formatFractionCurrent: (number) => {
                        if (number < 10) {
                            return "0" + number
                        } else {
                            return number
                        }
                    },
                    renderFraction: function (currentClass, totalClass) {
                        return '<span class="' + currentClass + '"></span>' +
                            ' <span class="separator-fraction"></span> ' +
                            '<span class="' + totalClass + '"></span>';
                    }
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                slidesPerView: 1,
            }
        )
    ;
}

let slidersPerspectives = document.querySelectorAll(".slider-perspective");
slidersPerspectives.forEach(sliderPerspectives => {
    const swiperPerspective = new Swiper(sliderPerspectives, {
        // configure Swiper to use modules
        modules: [Pagination],
        pagination: {
            el: '.swiper-pagination',
        },
        loop: true,
        slidesPerView: 1,
    });
})

let adminBar = document.querySelector("#wpadminbar")
if (adminBar) {
    document.querySelector("header").style.marginTop = `${adminBar.offsetHeight}px`
}


document.addEventListener("DOMContentLoaded", function () {
    let slidersProjectsHome = document.querySelectorAll(".slider-projects-home");
    if (slidersProjectsHome) {

        let titlesToggle = document.querySelectorAll(".selector-type")
        if(titlesToggle) {
            titlesToggle.forEach(titleToggle => {
                titleToggle.addEventListener("click", () => {
                    let type = titleToggle.dataset.type;
                    document.querySelector(".active.selector-type").classList.replace("active", "inactive");
                    titleToggle.classList.replace("inactive", "active");

                    document.querySelectorAll(".slider-projects-home").forEach((slider) => {
                        slider.classList?.add("hidden")
                    })

                    document.querySelector(`.slider-projects-home-${type}`).classList.remove("hidden")


                })
            })
        }

        slidersProjectsHome.forEach((sliderProjectsHome) => {
            const swiperSliderProjectsHome = new Swiper(sliderProjectsHome, {
                modules: [Navigation],
                loop: true,
                slidesPerView: 3,
                spaceBetween: "-25%",
                breakpoints: {
                    640: {
                        slidesPerView: 5,
                        spaceBetween: "-5%",
                    }
                },
                centeredSlides: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            })

            const process = () => {
                console.log(swiperSliderProjectsHome.slides, swiperSliderProjectsHome.activeIndex);
                let allSlides = document.querySelectorAll(".slider-projects-home .swiper-slide");
                //let currentActiveSlide = swiperSliderProjectsHome.slides.find(slide => slide.classList.contains("swiper-slide-active"))
                //let currentActiveSlideIndex = swiperSliderProjectsHome.slides.findIndex(slide => slide.classList.contains("swiper-slide-active"))
                let currentActiveSlideIndex = swiperSliderProjectsHome.activeIndex;
                let totalSlides = swiperSliderProjectsHome.slides.length;

                //console.log(currentActiveSlide, currentActiveSlideIndex)

                console.log(currentActiveSlideIndex, totalSlides)

                // Calculer les indices des slides adjacentes
                const prevIndex = currentActiveSlideIndex === 0 ? totalSlides - 1 : currentActiveSlideIndex - 1;
                const nextIndex = currentActiveSlideIndex === totalSlides - 1 ? 0 : currentActiveSlideIndex + 1;
                const prevPrevIndex = prevIndex === 0 ? totalSlides - 1 : prevIndex - 1;
                const nextNextIndex = nextIndex === totalSlides - 1 ? 0 : nextIndex + 1;


                console.log("next & next next : ", nextIndex, nextNextIndex)
                console.log("active : ", currentActiveSlideIndex)
                console.log("prev & prev prev : ", prevIndex, prevPrevIndex)

                document.querySelector(".swiper-slide-prev-prev")?.classList.remove("swiper-slide-prev-prev")
                document.querySelector(".swiper-slide-next-next")?.classList.remove("swiper-slide-next-next")

                if (allSlides[prevPrevIndex] != null) allSlides[prevPrevIndex].classList.add("swiper-slide-prev-prev");
                if (allSlides[nextNextIndex] != null) allSlides[nextNextIndex].classList.add("swiper-slide-next-next");


                //console.log("nextSlide = ", nextIndex, allSlides[nextIndex]);
                //console.log("nextSlide + 1 = ", nextNextIndex, allSlides[nextNextIndex]);

                // Appliquer le décalage en Y
                /*if (currentActiveSlide) currentActiveSlide.style.zIndex = "5";
                if (allSlides[prevIndex]) allSlides[prevIndex].style.transform = 'translateY(-15%) translateX(5%) scale(.8)';
                if (allSlides[prevIndex]) allSlides[prevIndex].style.zIndex = '4';
                if (allSlides[nextIndex]) allSlides[nextIndex].style.transform = 'translateY(-15%) translateX(-5%) scale(.8)';
                if (allSlides[nextIndex]) allSlides[nextIndex].style.zIndex = '4';
                if (allSlides[prevPrevIndex]) allSlides[prevPrevIndex].style.transform = 'translateY(-30%) translateX(25%) scale(.6)';
                if (allSlides[prevPrevIndex]) allSlides[prevPrevIndex].style.zIndex = '3';
                if (allSlides[nextNextIndex]) allSlides[nextNextIndex].style.transform = 'translateY(-30%) translateX(-25%) scale(.6)';
                if (allSlides[nextNextIndex]) allSlides[nextNextIndex].style.zIndex = '3';


                allSlides.forEach((slide, index) => {
                    if (index == prevIndex || index == prevPrevIndex || index == nextIndex || index == nextNextIndex || index == currentActiveSlideIndex) {
                        slide.style.opacity = "1";
                        if (allSlides[prevIndex]) allSlides[prevIndex].style.opacity = '.6';
                        if (allSlides[nextIndex]) allSlides[nextIndex].style.opacity = '.6';
                        if (allSlides[prevPrevIndex]) allSlides[prevPrevIndex].style.opacity = '.8';
                        if (allSlides[nextNextIndex]) allSlides[nextNextIndex].style.opacity = '.8';

                    } else {
                        slide.style.opacity = "0";
                    }
                })

                if (window.innerWidth <= 640) {
                    if (allSlides[nextNextIndex]) allSlides[nextNextIndex].style.opacity = "0";
                    if (allSlides[prevPrevIndex]) allSlides[prevPrevIndex].style.opacity = "0";
                }*/
            }

            swiperSliderProjectsHome.on("slideChange", function () {
                let allSlides = document.querySelectorAll(".slider-projects-home .swiper-slide");
                console.log(this)
                let currentActiveSlideIndex = this.activeIndex;
                let totalSlides = this.slides.length;
                console.log(currentActiveSlideIndex, totalSlides)
                const prevIndex = currentActiveSlideIndex === 0 ? totalSlides - 1 : currentActiveSlideIndex - 1;
                const nextIndex = currentActiveSlideIndex === totalSlides - 1 ? 0 : currentActiveSlideIndex + 1;
                const prevPrevIndex = prevIndex === 0 ? totalSlides - 1 : prevIndex - 1;
                const nextNextIndex = nextIndex === totalSlides - 1 ? 0 : nextIndex + 1;
                console.log("next & next next : ", nextIndex, nextNextIndex)
                console.log("active : ", currentActiveSlideIndex)
                console.log("prev & prev prev : ", prevIndex, prevPrevIndex)

                document.querySelector(".swiper-slide-prev-prev")?.classList.remove("swiper-slide-prev-prev")
                document.querySelector(".swiper-slide-next-next")?.classList.remove("swiper-slide-next-next")

                if (allSlides[prevPrevIndex] != null) allSlides[prevPrevIndex].classList.add("swiper-slide-prev-prev");
                if (allSlides[nextNextIndex] != null) allSlides[nextNextIndex].classList.add("swiper-slide-next-next");
            })

        })
    }
})


const togglesMobileMenu = document.querySelectorAll(".toggle-mobile");
togglesMobileMenu.forEach(toggleMobileMenu => {
    toggleMobileMenu.addEventListener("click", () => {
        document.querySelector(".menu-mobile").classList.toggle("hidden")
        document.querySelector(".menu-mobile").classList.toggle("flex")
    })
})

