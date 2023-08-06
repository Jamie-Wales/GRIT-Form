import {Form} from "./Form.js";
import {handleResponse} from "./handleResponse";
import {DomHandler} from "./DomHandler";


async function postData(formattedFormData) {
    const response = await fetch("../formHandler.php", {
        method: 'POST',
        body: formattedFormData,
        credentials: 'include',
    });
    return {
        'data': await response.text(),
        'responseCode': response.status
    };
}


const contactForm = new Form();

const button = DomHandler.getSubmitButton();
const formElement = DomHandler.getFormElement();
let lastClickTime = 0;

button.addEventListener("click", (e) => {
    e.preventDefault();
    const now = Date.now();
    if (now - lastClickTime < 5000) { // 5seconds
        DomHandler.error("Please wait 30 seconds between submissions.");
        return;
    }
    lastClickTime = now;
    contactForm.updateForm(
        DomHandler.getNameElement(),
        DomHandler.getEmailElement(),
        DomHandler.getTelephoneElement(),
        DomHandler.getBirthdayElement(),
        DomHandler.getCheckboxes()
    );
    if (contactForm.formIsValid()) {
        const formattedFormData = new FormData(formElement);
        postData(formattedFormData).then((response) => {
            handleResponse(response);
        });
    }
});

DomHandler.getNameElement().addEventListener("change", (e) => contactForm.validateName(DomHandler.getNameElement()));
DomHandler.getEmailElement().addEventListener("change", (e) => contactForm.validateEmail(DomHandler.getEmailElement()));
DomHandler.getTelephoneElement().addEventListener("change", (e) => contactForm.validateTelephone(DomHandler.getTelephoneElement()));
DomHandler.getBirthdayElement().addEventListener("change", (e) => contactForm.validateBirthday(DomHandler.getBirthdayElement()));