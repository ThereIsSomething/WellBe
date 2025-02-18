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

// Login Form Submission
document.getElementById("login").addEventListener("submit", async (e) => {
    e.preventDefault();
    const email = document.getElementById("loginEmail").value;
    const password = document.getElementById("loginPassword").value;

    const response = await fetch("/api/login", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ email, password }),
    });

    const result = await response.json();
    alert(result.message);
});

// Signup Form Submission
document.getElementById("signup").addEventListener("submit", async (e) => {
    e.preventDefault();
    const name = document.getElementById("signupName").value;
    const email = document.getElementById("signupEmail").value;
    const password = document.getElementById("signupPassword").value;

    console.log(name, email, password);

    const response = await fetch("/api/signup", {

        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name, email, password }),
    });

    console.log(response);

    const result = await response.json();
    alert(result.message);
});
