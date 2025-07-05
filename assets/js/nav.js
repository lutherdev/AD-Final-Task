document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.querySelector('.navbar');
    
    // Check immediately in case page loads scrolled
    checkScroll();
    
    // Listen for scroll events with slight debounce
    window.addEventListener('scroll', function() {
        requestAnimationFrame(checkScroll);
    });
    
    function checkScroll() {
        if (window.scrollY > 30) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
});