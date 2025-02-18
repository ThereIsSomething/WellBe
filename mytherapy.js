document.addEventListener('DOMContentLoaded', () => {
    const serviceCards = document.querySelectorAll('.service-card');

    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.classList.add('shadow-2xl');
        });

        card.addEventListener('mouseleave', function() {
            this.classList.remove('shadow-2xl');
        });
    });

    // document.querySelectorAll('button').forEach(button => {
    //     button.addEventListener('click', function() {
    //         alert(`You clicked on: ${this.textContent}`);
    //     });
    // });
});