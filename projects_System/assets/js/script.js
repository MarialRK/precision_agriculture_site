// Show notifications
function showNotification(message, isSuccess = true) {
    const notification = document.getElementById("notification");
    notification.className = `alert ${isSuccess ? "alert-success" : "alert-danger"}`;
    notification.textContent = message;
    notification.classList.remove("d-none");
    setTimeout(() => notification.classList.add("d-none"), 3000);
}

// Show the registration form
function showRegister() {
    document.getElementById("loginForm").classList.add("d-none");
    document.getElementById("registerForm").classList.remove("d-none");
}

// Show the login form
function showLogin() {
    document.getElementById("registerForm").classList.add("d-none");
    document.getElementById("loginForm").classList.remove("d-none");
}

// Show the dashboard based on user role
function showDashboard(role) {
    document.getElementById("loginForm").classList.add("d-none");
    document.getElementById("registerForm").classList.add("d-none");
    document.getElementById("farmerDashboard").classList.toggle("d-none", role !== "farmer");
    document.getElementById("adminDashboard").classList.toggle("d-none", role !== "admin");
}

// Register user function
async function register() {
    const username = document.getElementById("registerUsername").value;
    const email = document.getElementById("registerEmail").value;
    const phone = document.getElementById("registerPhone").value;
    const password = document.getElementById("registerPassword").value;
    const role = document.getElementById("registerRole").value;
    const language = document.getElementById("languageSelect").value;

    try {
        const response = await fetch("http://localhost:5000/auth/register", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ username, email, phone, password, role, language }),
        });

        const data = await response.json();
        if (data.success) {
            showNotification("Registration successful!", true);
            showLogin();
        } else {
            showNotification(data.message || "Registration failed.", false);
        }
    } catch (error) {
        showNotification("Error during registration. Please try again.", false);
        console.error(error);
    }
}

// Login function
async function login() {
    const username = document.getElementById("loginUsername").value;
    const password = document.getElementById("loginPassword").value;

    try {
        const response = await fetch("http://localhost:5000/auth/login", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ username, password }),
        });

        const data = await response.json();
        if (data.success) {
            showNotification("Login successful!", true);
            showDashboard(data.role);
        } else {
            showNotification(data.message || "Invalid credentials.", false);
        }
    } catch (error) {
        showNotification("Error during login. Please try again.", false);
        console.error(error);
    }
}
