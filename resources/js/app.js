import "./bootstrap";
import AOS from "aos";
import "aos/dist/aos.css";

window.AOS = AOS;
window.onload = function () {
    AOS.refresh();
};

document.addEventListener("DOMContentLoaded", () => {
    AOS.init({
        duration: 800,
        easing: "ease-in-out",
        once: true,
        offset: 100,
    });

    // Smooth scrolling with ease-in-out
    const scrollLinks = document.querySelectorAll("a.scroll-link");

    scrollLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault(); // Prevent default anchor behavior

            const targetId = link.getAttribute("href").slice(1); // Get target ID without "#"
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                smoothScroll(targetElement); // Call custom smooth scroll
            }
        });
    });

    // Custom smooth scroll function with ease-in-out
    function smoothScroll(target) {
        const targetPosition =
            target.getBoundingClientRect().top + window.scrollY;
        const startPosition = window.scrollY;
        const distance = targetPosition - startPosition;
        const duration = 1500; // Duration in ms
        let startTime = null;

        function animation(currentTime) {
            if (!startTime) startTime = currentTime;
            const timeElapsed = currentTime - startTime;

            // Ease-in-out function
            const run = easeInOutQuad(
                timeElapsed,
                startPosition,
                distance,
                duration
            );
            window.scrollTo(0, run);

            if (timeElapsed < duration) {
                requestAnimationFrame(animation);
            }
        }

        // Ease-in-out function
        function easeInOutQuad(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return (c / 2) * t * t + b;
            t--;
            return (-c / 2) * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
    }

    // Hide/Show navbar on scroll
    const navbar = document.getElementById("mainnav");
    let lastScrollTop = window.scrollY;

    window.addEventListener("scroll", () => {
        const currentScrollTop = window.scrollY;

        if (currentScrollTop > lastScrollTop + 20) {
            navbar.style.transform = "translateY(-100%)";
        } else if (currentScrollTop < lastScrollTop - 10) {
            navbar.style.transform = "translateY(0)";
        }

        lastScrollTop = currentScrollTop;
    });
});
