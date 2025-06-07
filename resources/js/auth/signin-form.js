import {
    customRegexValidatorWithMessage,
    customRequiredValidatorWithMessage,
    formValidator,
} from "../utils/form-validator";

const signinForm = document.getElementById("signin-form");
const emailInput = signinForm.elements.email;
const passwordInput = signinForm.elements.password;

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

formValidator(emailInput, "Email wajib diisi.", validateEmail);
formValidator(passwordInput, "Password wajib diisi.");