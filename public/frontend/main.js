// Typing Effect
const texts = [
    "Kristian",
    "a Fullstack Developer",
    "an Machine Learning Developer",
];
let count = 0;
let index = 0;
let currentText = "";
let letter = "";
(function type() {
    if (count === texts.length) {
        count = 0;
    }
    currentText = texts[count];
    letter = currentText.slice(0, ++index);

    document.getElementById("typing").textContent = letter;
    if (letter.length === currentText.length) {
        count++;
        index = 0;
        setTimeout(type, 1500); // Delay sebelum mulai kata baru
    } else {
        setTimeout(type, 100);
    }
})();

// Navbar Scroll Effect
window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 50) {
        navbar.style.background = "rgba(255,255,255,0.98)";
        navbar.style.boxShadow = "0 2px 10px rgba(0,0,0,0.1)";
    } else {
        navbar.style.background = "rgba(255,255,255,0.95)";
        navbar.style.boxShadow = "none";
    }
});

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
        });
    });
});

// Project Card Animation
const projectCards = document.querySelectorAll(".project-card");
projectCards.forEach((card) => {
    card.addEventListener("mouseover", () => {
        card.style.transform = "translateY(-10px)";
    });
    card.addEventListener("mouseout", () => {
        card.style.transform = "translateY(0)";
    });
});

// Dynamic Year
document.getElementById("year").textContent = new Date().getFullYear();

// Hover Effect for Tech Icons
document.querySelectorAll(".tech-stack img").forEach((icon) => {
    icon.addEventListener("mouseover", () => {
        icon.style.transform = "scale(1.2)";
    });
    icon.addEventListener("mouseout", () => {
        icon.style.transform = "scale(1)";
    });
});
// Fungsi untuk membuka modal gambar
function openModal(imageSrc) {
    const modal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    modal.style.display = "block";
    modalImage.src = imageSrc;
}

// Fungsi untuk menutup modal gambar
function closeModal() {
    const modal = document.getElementById("imageModal");
    modal.style.display = "none";
}

// Dynamic Year
document.getElementById("year").textContent = new Date().getFullYear();
