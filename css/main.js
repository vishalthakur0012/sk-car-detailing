// toggler icon change in close icon js....
function toggleIcon() {
    var icon = document.getElementById('menuIcon');

    // Toggle between 'fas fa-bars' and 'fas fa-times'
    if (icon.classList.contains('fa-bars')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
}


window.addEventListener('scroll', function () {
    var header = document.querySelector('.navbar-area');
    var scrollPosition = window.scrollY;

    if (scrollPosition > 0) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
});


// Get the button
var scrollToTopBtn = document.getElementById("scrollToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
};

// Scroll to the top of the document when the button is clicked
function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


// gsap animation


gsap.from(
    "#one",
    {
        x: -200,
        duration: 1,
        delay: 0,
        opacity: 0,
        stagger: 1,
        yoyo: true,
    }
)

gsap.from(
    "#two",
    {
        x: -200,
        duration: 1,
        delay: 1,
        opacity: 0,
        stagger: 2,
        yoyo: true
    }
)

gsap.from(
    "#three",
    {
        x: -200,
        duration: 1,
        delay: 2,
        opacity: 0,
        stagger: 2,
        yoyo: true
    }
)

gsap.from(
    "#btn_ani",
    {
        y: 100,
        duration: 1,
        delay: 2,
        opacity: 0,
        stagger: 2,
        yoyo: true
    }
)

gsap.from(
    "#four",
    {
        y: -200,
        duration: 1,
        delay: 2,
        opacity: 0,
        stagger: 1,
        yoyo: true
    }
)


gsap.from(
    "#five",
    {
        y: -200,
        duration: 1,
        delay: 2,
        opacity: 0,
        stagger: 2,
        yoyo: true
    }
)

gsap.from(
    "#six",
    {
        y: -200,
        duration: 1,
        delay: 3,
        opacity: 0,
        stagger: 3,
        yoyo: true
    }
)
