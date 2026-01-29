import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    document.querySelector('.purple').style.transform = `translateY(${scrollY * 0.15}px)`;
    document.querySelector('.blue').style.transform = `translateY(${scrollY * -0.1}px)`;
});

