// Nur Anker-Links mit "#" abfangen
document.querySelectorAll('.navbar a[href^="#"]').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const id = this.getAttribute('href').substring(1);
        const target = document.getElementById(id);
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

