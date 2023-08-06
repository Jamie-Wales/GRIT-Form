import { DomHandler } from "./DomHandler.js";
import { Validator } from "./Validator.js";

export class Form  {
    nameIsValid;
    emailIsValid;
    telephoneIsValid;
    birthdayIsValid;
    checkboxesIsValid;

    constructor() {
        this.nameIsValid = false;
        this.emailIsValid = false;
        this.telephoneIsValid = false;
        this.birthdayIsValid = false;
        this.checkboxesIsValid = false;

    }

    validateName(name){
        if (!Validator.textInput(name.value)) {
            DomHandler.invalid(name);
        } else {
            this.nameIsValid = true;
            DomHandler.valid(name);
        }
    }


    validateEmail(email){
        if (!Validator.emailInput(email.value)) {
            DomHandler.invalid(email);
        } else {
            this.emailIsValid = true;
            DomHandler.valid(email)
        }
    }

    validateTelephone(telephone){
        if (!Validator.telephoneInput(telephone.value)) {
            DomHandler.invalid(telephone);
        } else {
            this.telephoneIsValid = true;
            DomHandler.valid(telephone)
        }
    }


    validateBirthday(birthday){
        if (!Validator.dateInput(birthday.value)) {
            DomHandler.invalid(birthday)
        } else {
            this.birthdayIsValid = true;
            DomHandler.valid(birthday);
        }
    }

    validateCheckboxes(checkboxes) {
        if (!Validator.checkboxChecked(checkboxes)) {
            DomHandler.invalid(DomHandler.getCheckboxesParent());
        } else {
            this.checkboxesIsValid = true;
            DomHandler.valid(DomHandler.getCheckboxesParent());
        }
    }

    updateForm(name, email, telephone, birthday, checkboxes) {
        this.validateName(name);
        this.validateEmail(email);
        this.validateTelephone(telephone);
        this.validateBirthday(birthday);
        this.validateCheckboxes(checkboxes);
    }


    formIsValid() {
        return this.nameIsValid === true && this.emailIsValid === true && this.telephoneIsValid === true && this.birthdayIsValid === true && this.checkboxesIsValid === true;
    }
}