document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const problem = document.getElementById('problem').value;

    alert(`Thank you, ${name}! 
Your message has been received.
Thank you for connecting us. 
We'll contact you soon.`);

    this.reset();
});
