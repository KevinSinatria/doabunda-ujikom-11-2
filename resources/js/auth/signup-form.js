import {
    customRegexValidatorWithMessage,
    customRequiredValidatorWithMessage,
    formValidator,
} from "../utils/form-validator";

const signupForm = document.getElementById("signup-form");
const usernameInput = signupForm.elements.username;
const emailInput = signupForm.elements.email;
const passwordInput = signupForm.elements.password;
const passwordConfirmationInput = signupForm.elements.password_confirmation;

signupForm.addEventListener("submit", (e) => {
    e.preventDefault();
});

function validateUsername(event) {
    const usernameRegex = /^[a-zA-Z0-9_]{8,}$/;
    customRegexValidatorWithMessage(
        event,
        usernameRegex,
        "Username minimal 8 karakter & tanpa spasi"
    );
}

function validateEmail(event) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    customRegexValidatorWithMessage(
        event,
        emailRegex,
        "Format email tidak sesuai"
    );
}

function validatePassword(event) {
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    customRegexValidatorWithMessage(
        event,
        passwordRegex,
        "Password minimal 8 karakter & harus mengandung huruf dan angka"
    );
}

function validatePasswordConfimation(event) {
    const errorElement = document.getElementById(`${event.target.id}-error`);
    if (event.target.value !== passwordInput.value) {
        event.target.setCustomValidity("Password tidak cocok.");
        if (errorElement) {
            errorElement.textContent = "Password tidak cocok.";
            errorElement.classList.add("text-red-500");
        }
        event.classList.add("border-red-500");
    } else {
        event.target.setCustomValidity("");
        if (errorElement) {
            errorElement.textContent = "";
            errorElement.classList.remove("text-red-500");
        }
        event.classList.remove("border-red-500");
    }
}

formValidator(usernameInput, "Username wajib diisi.", validateUsername);
formValidator(emailInput, "Email wajib diisi.", validateEmail);
formValidator(passwordInput, "Password wajib diisi.", validatePassword);
formValidator(
    passwordConfirmationInput,
    "Konfirmasi Password wajib diisi.",
    validatePasswordConfimation
);
