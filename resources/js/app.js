import "./bootstrap";
import Alpine from "alpinejs";
import "@phosphor-icons/web/light";
import "@phosphor-icons/web/bold";
import "@phosphor-icons/web/fill";
import "@phosphor-icons/web/duotone";
import "@phosphor-icons/web/regular";
import AOS from "aos";
import Swal from "sweetalert2";
import Swup from "swup";
import Swiper from "swiper/bundle";

import.meta.glob(["../fonts/**"]);

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.start();

const swiper = new Swiper("#swiper-rtl", {
    loop: true,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
    speed: 2500, 
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    scrollbar: {
        el: ".swiper-scrollbar",
    },
    slidesPerView: 'auto'
});

const swiperLtr = new Swiper("#swiper-ltr", {
    loop: true,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
        reverseDirection: true
    },
    speed: 3000, 
    spaceBetween: 20,
    pagination: {
        el: ".swiper-pagination",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    scrollbar: {
        el: ".swiper-scrollbar",
    },
    slidesPerView: 'auto'
});

AOS.init();
function updateNavbar() {
    const headerHome = document.getElementById("header-home");
    const headerOther = document.getElementById("header-other");

    if (headerHome) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 80) {
                headerHome.classList.add(
                    "lg:mx-12",
                    "lg:bg-white/20",
                    "lg:mt-2",
                    "lg:w-[93%]",
                    "lg:rounded-full",
                    "lg:shadow",
                    "lg:border",
                    "lg:border-gray-400",
                    "lg:backdrop-blur-2xl"
                );
                headerHome.classList.remove(
                    "lg:backdrop-blur-none",
                    "lg:shadow-none",
                    "hover:mx-12",
                    "hover:mt-2",
                    "hover:w-[93%]",
                    "hover:rounded-full",
                    "hover:shadow",
                    "hover:border",
                    "hover:border-gray-400",
                    "lg:hover:backdrop-blur"
                );
            } else {
                headerHome.classList.remove(
                    "lg:mx-12",
                    "lg:bg-white/20",
                    "lg:mt-2",
                    "lg:w-[93%]",
                    "lg:rounded-full",
                    "lg:shadow",
                    "lg:border",
                    "lg:border-gray-400",
                    "lg:backdrop-blur-2xl"
                );
                headerHome.classList.add(
                    "lg:backdrop-blur-none",
                    "lg:shadow-none",
                    "hover:mx-12",
                    "hover:mt-2",
                    "hover:w-[93%]",
                    "hover:rounded-full",
                    "hover:shadow",
                    "hover:border",
                    "hover:border-gray-400",
                    "lg:hover:backdrop-blur"
                );
            }
        });
    }

    if (headerOther) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 80) {
                headerOther.classList.add(
                    "lg:mx-12",
                    "lg:bg-white/20",
                    "lg:mt-2",
                    "lg:w-[93%]",
                    "lg:rounded-full",
                    "lg:shadow-lg",
                    "lg:border",
                    "lg:border-gray-400",
                    "lg:backdrop-blur-2xl"
                );
                headerOther.classList.remove(
                    "lg:backdrop-blur-none",
                    "lg:shadow-none"
                );
            } else {
                headerOther.classList.remove(
                    "lg:mx-12",
                    "lg:bg-white/20",
                    "lg:mt-2",
                    "lg:w-[93%]",
                    "lg:rounded-full",
                    "lg:shadow-lg",
                    "lg:border",
                    "lg:border-gray-400",
                    "lg:backdrop-blur-2xl"
                );
                headerOther.classList.add("lg:backdrop-blur", "lg:shadow-none");
            }
        });
    }
}

export const swup = new Swup({
    containers: ["#swup"],
    linkSelector: "a[href]:not([data-no-swup])",
});

window.addEventListener("DOMContentLoaded", updateNavbar);
swup.hooks.on("content:replace", updateNavbar);
