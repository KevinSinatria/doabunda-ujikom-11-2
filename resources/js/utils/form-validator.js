const customRequiredValidatorWithMessage = (
    event,
    message = "Field ini harus diisi"
) => {
    event.target.setCustomValidity("");

    if (event.target.validity.valueMissing) {
        return event.target.setCustomValidity(message);
    }
};

const customRegexValidatorWithMessage = (
    event,
    regex,
    message = "Format tidak sesuai"
) => {
    event.target.setCustomValidity("");

    const value = event.target.value;
    const errorElement = document.getElementById(`${event.target.id}-error`);

    if (!regex.test(value)) {
        return event.target.setCustomValidity(message);
    } else {
        return event.target.setCustomValidity("");
    }
};

const formValidator = (field, requiredMessage, validateHandler = null) => {
    const handleValidation = (event) => {
        customRequiredValidatorWithMessage(event, requiredMessage);

        if (validateHandler && typeof validateHandler === "function") {
            validateHandler(event);
        }

        const isValid = event.target.validity.valid;
        const errorMessage = event.target.validationMessage;

        const errorElement = document.getElementById(
            `${event.target.id}-error`
        );
        const inputElement = document.getElementById(`${event.target.id}`);
        const showPassword = document.getElementById(`show-password`);
        const hidePassword = document.getElementById(`hide-password`);
        const showPasswordConfirmation = document.getElementById(
            `show-password-confirmation`
        );
        const hidePasswordConfirmation = document.getElementById(
            `hide-password-confirmation`
        );

        if (errorElement && !isValid && errorMessage) {
            errorElement.textContent = errorMessage;
            errorElement.classList.add("text-red-500");
            inputElement.classList.add("border-2", "border-red-500");
            if (
                (showPassword || hidePassword) &&
                event.target.name === "password"
            ) {
                showPassword.classList.add("border-2", "border-red-500");
                hidePassword.classList.add("border-2", "border-red-500");
            } else if (
                (showPasswordConfirmation || hidePasswordConfirmation) &&
                event.target.name === "password_confirmation"
            ) {
                showPasswordConfirmation.classList.add(
                    "border-2",
                    "border-red-500"
                );
                hidePasswordConfirmation.classList.add(
                    "border-2",
                    "border-red-500"
                );
            }
        } else {
            errorElement.textContent = "";
            errorElement.classList.remove("text-red-500");
            inputElement.classList.remove("border-2", "border-red-500");
            if (
                (showPassword || hidePassword) &&
                event.target.name === "password"
            ) {
                showPassword.classList.remove("border-2", "border-red-500");
                hidePassword.classList.remove("border-2", "border-red-500");
            } else if (
                (showPasswordConfirmation || hidePasswordConfirmation) &&
                event.target.name === "password_confirmation"
            ) {
                showPasswordConfirmation.classList.remove(
                    "border-2",
                    "border-red-500"
                );
                hidePasswordConfirmation.classList.remove(
                    "border-2",
                    "border-red-500"
                ); 
            }
        }
    };

    field.addEventListener("change", handleValidation);
    field.addEventListener("invalid", handleValidation);
    field.addEventListener("blur", handleValidation);
};

export {
    formValidator,
    customRequiredValidatorWithMessage,
    customRegexValidatorWithMessage,
};
