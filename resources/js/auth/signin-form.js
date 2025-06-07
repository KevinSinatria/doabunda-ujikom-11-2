import {
    customRegexValidatorWithMessage,
    customRequiredValidatorWithMessage,
    formValidator,
} from "../utils/form-validator";

const signinForm = document.getElementById("signin-form");
const emailInput = signinForm.elements.email;
const passwordInput = signinForm.elements.password;

signinForm.addEventListener("submit", (e) => {
    e.preventDefault();
});

function validateEmail(event) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (event.target.value.length > 0) {
        customRegexValidatorWithMessage(
            event,
            emailRegex,
            "Format email tidak sesuai"
        );
    }
}

function validatePassword(event) {
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (event.target.value.length > 0) {
        customRegexValidatorWithMessage(
            event,
            passwordRegex,
            "Password minimal 8 karakter & harus mengandung huruf dan angka"
        );
    }
}

formValidator(emailInput, "Email wajib diisi.", validateEmail);
formValidator(passwordInput, "Password wajib diisi.");