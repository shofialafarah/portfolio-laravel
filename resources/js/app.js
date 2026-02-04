import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// =========================
// PAGE LOADER
// =========================
window.addEventListener('load', () => {
    const loader = document.querySelector('.page-loader');
    if (loader) {
        setTimeout(() => {
            loader.classList.add('fade-out');
            setTimeout(() => {
                loader.style.display = 'none';
            }, 800);
        }, 1000);
    }
});

// =========================
// PARALLAX BACKGROUND SHAPES
// =========================
window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    
    const purple = document.querySelector('.purple');
    const blue = document.querySelector('.blue');
    const pink = document.querySelector('.pink');
    
    if (purple) purple.style.transform = `translateY(${scrollY * 0.15}px) rotate(${scrollY * 0.05}deg)`;
    if (blue) blue.style.transform = `translateY(${scrollY * -0.1}px) rotate(${scrollY * -0.03}deg)`;
    if (pink) pink.style.transform = `translate(-50%, -50%) translateY(${scrollY * 0.08}px) rotate(${scrollY * 0.02}deg)`;
});

// =========================
// SCROLL REVEAL ANIMATIONS
// =========================
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
        }
    });
}, observerOptions);

document.querySelectorAll('.scroll-reveal').forEach(el => {
    observer.observe(el);
});

// =========================
// BOUNCY TYPING EFFECT FOR SECTION TITLES
// =========================
class BouncyTyping {
    constructor(element, text, speed = 80) {
        this.element = element;
        this.text = text;
        this.speed = speed;
        this.charIndex = 0;
        this.isTyping = false;
        this.observer = null;
        this.hasTyped = false;
    }

    init() {
        this.observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !this.hasTyped) {
                    this.startTyping();
                    this.hasTyped = true;
                } else if (!entry.isIntersecting && this.hasTyped) {
                    this.reset();
                }
            });
        }, {
            threshold: 0.5
        });

        this.observer.observe(this.element);
    }

    startTyping() {
        this.element.innerHTML = '';
        this.charIndex = 0;
        this.isTyping = true;
        this.type();
    }

    type() {
        if (this.charIndex < this.text.length) {
            const char = this.text[this.charIndex];
            const span = document.createElement('span');
            span.className = 'bouncy-text';
            span.textContent = char;
            span.style.animationDelay = `${this.charIndex * 0.05}s`;
            this.element.appendChild(span);
            this.charIndex++;
            setTimeout(() => this.type(), this.speed);
        } else {
            this.isTyping = false;
        }
    }

    reset() {
        const chars = this.element.querySelectorAll('.bouncy-text');
        chars.forEach((char, index) => {
            setTimeout(() => {
                char.classList.add('hide');
            }, index * 30);
        });
        
        setTimeout(() => {
            this.element.innerHTML = '';
            this.hasTyped = false;
            this.charIndex = 0;
        }, chars.length * 30 + 400);
    }
}

// Initialize bouncy typing for section titles
document.addEventListener('DOMContentLoaded', () => {
    // Tech Stack & Tools
    const skillsTitle = document.querySelector('#skills h2');
    if (skillsTitle) {
        const originalText = skillsTitle.textContent.trim();
        new BouncyTyping(skillsTitle, originalText, 70).init();
    }

    // Projects
    const projectsTitle = document.querySelector('#projects h2');
    if (projectsTitle) {
        const originalText = projectsTitle.textContent.trim();
        new BouncyTyping(projectsTitle, originalText, 70).init();
    }

    // Certifications
    const certificationsTitle = document.querySelector('#certifications h2');
    if (certificationsTitle) {
        const originalText = certificationsTitle.textContent.trim();
        new BouncyTyping(certificationsTitle, originalText, 70).init();
    }

    // Comments section (find the "Komentar:" h3)
    const commentsTitle = document.querySelector('#certifications h3');
    if (commentsTitle && commentsTitle.textContent.includes('Komentar')) {
        const originalText = commentsTitle.textContent.trim();
        new BouncyTyping(commentsTitle, originalText, 70).init();
    }
});

// =========================
// SMOOTH SCROLL
// =========================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// =========================
// FILTER ANIMATION
// =========================
document.addEventListener('DOMContentLoaded', () => {
    const filterBtns = document.querySelectorAll('.filter-btn');
    
    // Set initial active state
    if (filterBtns.length > 0) {
        filterBtns[0].classList.add('active');
    }

    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active from all
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active to clicked
            btn.classList.add('active');

            const filter = btn.dataset.filter;
            const cards = document.querySelectorAll('.project-card');

            cards.forEach((card, index) => {
                const shouldShow = filter === 'all' || card.classList.contains(filter);
                
                if (shouldShow) {
                    setTimeout(() => {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 50);
                    }, index * 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Initialize card transitions
    document.querySelectorAll('.project-card').forEach(card => {
        card.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    });
});

// =========================
// GRID BACKGROUND SCROLL EFFECT
// =========================
window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    const gridLayer = document.querySelector('.grid-layer');
    
    if (gridLayer) {
        // Add parallax effect to grid
        gridLayer.style.transform = `translate(${scrollY * 0.05}px, ${scrollY * 0.05}px)`;
    }
});

// =========================
// CARD HOVER GLOW EFFECT
// =========================
document.querySelectorAll('.card-glass, .card-inner, .project-card').forEach(card => {
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        card.style.setProperty('--mouse-x', `${x}px`);
        card.style.setProperty('--mouse-y', `${y}px`);
    });
});

// =========================
// STAGGER ANIMATION FOR SKILLS
// =========================
document.addEventListener('DOMContentLoaded', () => {
    const skillCards = document.querySelectorAll('#skills .card-inner');
    
    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 200);
            }
        });
    }, { threshold: 0.2 });

    skillCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        skillObserver.observe(card);
    });
});