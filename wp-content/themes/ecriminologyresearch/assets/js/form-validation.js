const contactForm = document.getElementById("contact-form");

if (contactForm) {
    const contactFormElements = contactForm.querySelectorAll(".form-group");
    const contactName = document.getElementById("contact_name");
    const contactEmail = document.getElementById("contact_email");
    const contactMessage = document.getElementById("contact_message");
    const contactSubmit = document.getElementById("contact_submit");

    const contactNameError = document.getElementById("contact_name_error");
    const contactEmailError = document.getElementById("contact_email_error");
    const contactMessageError = document.getElementById(
        "contact_message_error"
    );

    const arrayValidationTrue = {
        contact_name: "Ha registrado un nombre",
        contact_email: "Ha registrado in dirección de email",
        contact_message: "Su mensaje ha sido enviado",
    };

    const arrayValidationFalse = {
        name_missing: "No has registrado ningún nombre",
        email_missing: "No ingresó una dirección de correo electrónico",
        email_incorrect: "Esta dirección de email no es correcta",
        message_missing: "No has enviado ningún mensaje",
        message_too_short: "Su mensaje es demasiado corto",
        message_too_long: "Su mensaje es demasiado largo",
    };

    for (let i = 0; i < contactFormElements.length; i++) {
        const input = contactFormElements[i].children[0];

        if (input.type != "submit") {
            input.addEventListener("input", function () {
                if (input.validity.valid) {
                    document
                        .getElementById(this.id + "_error")
                        .classList.remove("active");
                    // document.getElementById(this.id + "_error").innerHTML = "";
                } else {
                    showError(this.id);
                }
            });
        }
    }

    contactForm.addEventListener("submit", function (event) {
        if (!contactForm.checkValidity()) {
            showError(contactSubmit.id);
            event.preventDefault();
        }
    });

    function showError(submit) {
        if (submit === contactName.id || submit === contactSubmit.id) {
            if (contactName.validity.valueMissing) {
                contactNameError.classList.add("active");
                contactNameError.innerHTML =
                    arrayValidationFalse["name_missing"];
            }
        }

        if (submit === contactEmail.id || submit === contactSubmit.id) {
            if (contactEmail.validity.valueMissing) {
                contactEmailError.innerHTML =
                    arrayValidationFalse["email_missing"];
                contactEmailError.classList.add("active");
            } else if (contactEmail.validity.typeMismatch) {
                if (contactEmailError.classList.contains("active")) {
                    // contactEmailError.classList.add("active");
                    contactEmailError.innerHTML =
                        arrayValidationFalse["email_incorrect"];
                }
            }
        }

        if (submit === contactMessage.id || submit === contactSubmit.id) {
            if (contactMessage.validity.valueMissing) {
                contactMessageError.classList.add("active");
                contactMessageError.innerHTML =
                    arrayValidationFalse["message_missing"];
            } else if (contactMessage.validity.tooShort) {
                if (contactMessageError.classList.contains("active")) {
                    // contactMessageError.classList.add("active");
                    contactMessageError.innerHTML =
                        arrayValidationFalse["message_too_short"];
                }
            } else if (contactMessage.validity.tooLong) {
                contactMessageError.classList.add("active");
                contactMessageError.innerHTML =
                    arrayValidationFalse["message_too_long"];
            }
        }
    }
}

const registerForm = document.getElementById("register-form");

if (registerForm) {
    const registerFormElements = registerForm.querySelectorAll("input");
    let stateExtraInputs = false;
    const registerUsername = document.getElementById("register_username");
    const registerEmail = document.getElementById("register_email");
    const registerPassword = document.getElementById("register_password");
    const registerPasswordRepeat = document.getElementById(
        "register_password_repeat"
    );
    const registerCheckbox = document.getElementById("register_checkbox");
    const registerSubmit = document.getElementById("register_submit");

    const registerUsernameError = document.getElementById(
        "register_username_error"
    );
    const registerEmailError = document.getElementById("register_email_error");
    const registerPasswordError = document.getElementById(
        "register_password_error"
    );
    const registerPasswordRepeatError = document.getElementById(
        "register_password_repeat_error"
    );
    const registerCheckboxError = document.getElementById(
        "register_checkbox_error"
    );

    const arrayValidationTrue = {
        register_username: "Rellene el nombre de usuario",
        register_email: "Has registrado una dirección de email válida",
        register_password: "Tú contraseña es correcta",
        register_password_repeat: "La contraseña es la misma",
        register_checkbox: "La casilla de verificación ha sido marcada",
    };

    const arrayValidationFalse = {
        username_missing: "No registraste tu nombre de usuario",
        email_missing: "No registraste una dirección de email",
        email_incorrect: "Dirección de email incorrecta",
        password_missing: "No ha registrado ninguna contraseña",
        password_short: "La contraseña es muy corta",
        password_repeat: "La contraseña no es la misma",
        checkbox_not_checked: "La casilla de verificación no ha sido marcada",
    };

    for (let i = 0; i < registerFormElements.length; i++) {
        const input = registerFormElements[i];

        if (
            input.type != "submit" &&
            input.id != "register_password_repeat" &&
            input.id != "register_checkbox" &&
            input.id != "first_name" &&
            input.id != "last_name"
        ) {
            input.addEventListener("input", function () {
                if (input.validity.valid) {
                    document
                        .getElementById(this.id + "_error")
                        .classList.remove("active");
                    // document.getElementById(this.id + "_error").innerHTML =
                    //     arrayValidationTrue[input.id];
                    // document.getElementById(this.id + "_error").innerHTML = "";
                } else {
                    showError(this.id);
                }
                if (input.id === "register_password") {
                    registerPasswordRepeat.value = "";
                    registerPasswordRepeatError.innerHTML = "";
                }
            });
        } else if (input.id === "register_password_repeat") {
            input.addEventListener("input", function () {
                if (input.value === registerPassword.value) {
                    stateExtraInputs = true;
                    // registerPasswordRepeatError.innerHTML =
                    //     arrayValidationTrue[input.id];
                    // registerPasswordRepeatError.innerHTML = "";
                    document
                        .getElementById(this.id + "_error")
                        .classList.remove("active");
                } else {
                    showError(this.id);
                }
            });
        } else if (input.id === "register_checkbox") {
            input.addEventListener("click", function () {
                if (input.checked) {
                    document
                        .getElementById(this.id + "_error")
                        .classList.remove("active");
                    // document.getElementById(this.id + "_error").innerHTML =
                    //     arrayValidationTrue[input.id];
                } else {
                    showError(this.id);
                }
            });
        }
    }

    registerForm.addEventListener("submit", function (event) {
        if (!registerForm.checkValidity() || !stateExtraInputs) {
            showError(registerSubmit.id);
            event.preventDefault();
        }
    });

    function showError(submit) {
        if (submit === registerUsername.id || submit === registerSubmit.id) {
            if (registerUsername.validity.valueMissing) {
                registerUsernameError.innerHTML =
                    arrayValidationFalse["username_missing"];
                registerUsernameError.classList.add("active");
            }
        }

        if (submit === registerEmail.id || submit === registerSubmit.id) {
            if (registerEmail.validity.valueMissing) {
                registerEmailError.innerHTML =
                    arrayValidationFalse["email_missing"];
                registerEmailError.classList.add("active");
            } else if (registerEmail.validity.typeMismatch) {
                if (registerEmailError.classList.contains("active")) {
                    registerEmailError.innerHTML =
                        arrayValidationFalse["email_incorrect"];
                }
            }
        }

        if (submit === registerPassword.id || submit === registerSubmit.id) {
            if (registerPassword.validity.valueMissing) {
                registerPasswordError.classList.add("active");
                registerPasswordError.innerHTML =
                    arrayValidationFalse["password_missing"];
            } else if (registerPassword.validity.tooShort) {
                if (registerPasswordError.classList.contains("active")) {
                    // contactMessageError.classList.add("active");
                    registerPasswordError.innerHTML =
                        arrayValidationFalse["password_short"];
                }
            }
        }

        if (
            submit === registerPasswordRepeat.id ||
            submit === registerSubmit.id
        ) {
            if (registerPasswordRepeat.value) {
                if (registerPasswordRepeat.value != registerPassword.value) {
                    stateExtraInputs = false;
                    registerPasswordRepeatError.classList.add("active");
                    registerPasswordRepeatError.innerHTML =
                        arrayValidationFalse["password_repeat"];
                }
            }
        }

        if (submit === registerCheckbox.id || submit === registerSubmit.id) {
            if (!registerCheckbox.checked) {
                registerCheckboxError.classList.add("active");
                registerCheckboxError.innerHTML =
                    arrayValidationFalse["checkbox_not_checked"];
            }
        }
    }
}
