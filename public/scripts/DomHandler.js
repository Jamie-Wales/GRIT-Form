// DomHandler.js
export class DomHandler {
    static getNameElement() {
        return document.getElementById("name");
    }

    static getEmailElement() {
        return document.getElementById("email");
    }

    static getTelephoneElement() {
        return document.getElementById("telephone");
    }

    static getBirthdayElement() {
        return document.getElementById("dob");
    }

    static getCheckboxes() {
        return document.querySelectorAll('input[type="checkbox"]');
    }

    static getSubmitButton() {
        return document.querySelector("input[type=submit]");
    }

    static getFormElement() {
        return document.querySelector("form");
    }

    static getCheckboxesParent() {
        return document.querySelector(".form__interests");
    }

    static invalid(element) {
        element.nextElementSibling.classList.remove("none");
        element.classList.add("invalid");
        element.classList.remove("valid");
    }

    static valid(element) {
        element.nextElementSibling.classList.add("none");
        element.classList.remove("invalid");
        element.classList.add("valid");
    }

    static error(text) {
        const existingErrors = document.querySelectorAll(".errorBox");
        existingErrors.forEach(error => error.remove());
        const errorDiv = document.createElement("div");
        errorDiv.className = "errorBox";
        errorDiv.innerHTML = `<p> Error: ${text} </p>`;
        this.getFormElement().appendChild(errorDiv);
    }

    static success(text) {
        const existingSuccess = document.querySelector(".successBox");
        if (existingSuccess) {
            existingSuccess.remove();
        }
        const successDiv = document.createElement("div");
        successDiv.className = "successBox";
        successDiv.innerHTML = `<p> Success: ${text} </p>`;
        this.getFormElement().appendChild(successDiv);
    }

    static clearInputs() {
        this.getNameElement().value = "";
        this.getEmailElement().value = "";
        this.getBirthdayElement().value = "";
        this.getTelephoneElement().value = "";
        this.getCheckboxes().forEach((ele) => {
            ele.checked = false;
        })


    }
}
