import './bootstrap';

import Alpine from 'alpinejs';
import Swal from 'sweetalert2';
import confetti from 'canvas-confetti';

window.Alpine = Alpine;
window.Swal = Swal;
window.confetti = confetti;

Alpine.start();

// Intersection Observer for scroll animations
document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.animate-on-scroll').forEach((el) => {
        observer.observe(el);
    });
});
