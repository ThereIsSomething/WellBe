
function toggleForms() {
    const loginForm = document.getElementById("loginForm");
    const signupForm = document.getElementById("signupForm");

    loginForm.classList.toggle("hidden");
    signupForm.classList.toggle("hidden");

    if (loginForm.classList.contains("hidden")) {
        signupForm.classList.add("active");
        loginForm.classList.remove("active");
    } else {
        loginForm.classList.add("active");
        signupForm.classList.remove("active");
    }
}