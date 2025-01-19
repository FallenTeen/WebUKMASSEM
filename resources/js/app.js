import "./bootstrap";
import Alpine from "alpinejs";
import AOS from "aos";
import "aos/dist/aos.css";

window.Alpine = Alpine;
Alpine.start();

window.AOS = AOS;
window.onload = function () {
    AOS.refresh();
};


document.addEventListener("DOMContentLoaded", () => {
    AOS.init({
        duration: 800,
        easing: "ease-in-out",
        once: true,
        offset: -5,
    });

    const targetId = window.location.hash.slice(1); // Ambil hash tanpa "#"
    if (targetId) {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            // Gunakan smoothScroll jika elemen ditemukan
            smoothScroll(targetElement);
        }
    }
    // Smooth scrolling with ease-in-out
    // Select all anchor links with href starting with "#"
    const anchorLinks = document.querySelectorAll('a[href*="#"]');

    anchorLinks.forEach((link) => {
        link.addEventListener("click", (e) => {
            const href = link.getAttribute("href");
            if (href.startsWith("#")) {
                e.preventDefault(); // Smooth scroll untuk hash di halaman yang sama
                const targetId = href.slice(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    smoothScroll(targetElement);
                }
            } else if (href.includes("#")) {
                e.preventDefault(); // Untuk hash di halaman lain
                const [url, hash] = href.split("#");
                window.location.href = `${url}#${hash}`;
            }
        });
    });

    // Custom smooth scroll function with ease-in-out
    function smoothScroll(target) {
        const offset = -60; // Offset value to adjust scroll position
        const targetPosition =
            target.getBoundingClientRect().top + window.scrollY + offset;
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

        // Adjust scroll offset for navbar behavior
        if (currentScrollTop > lastScrollTop + 20) {
            navbar.style.transform = "translateY(-100%)"; // Hide navbar when scrolling down
        } else if (currentScrollTop < lastScrollTop - 10) {
            navbar.style.transform = "translateY(0)"; // Show navbar when scrolling up
        }

        lastScrollTop = currentScrollTop;
    });
});
