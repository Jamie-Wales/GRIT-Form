import {DomHandler} from "./DomHandler";

export function handleResponse(response) {
    let data = JSON.parse(response.data);

    console.log(data);
    if (response.responseCode === 400) {

        if ("name" in data.errors) {
            DomHandler.invalid(DomHandler.getNameElement());
        }

        if ("email" in data.errors) {
            DomHandler.invalid(DomHandler.getEmailElement());
        }

        if ("telephone" in data.errors) {
            DomHandler.invalid(DomHandler.getTelephoneElement());
        }

        if ("dob" in data.errors) {
            DomHandler.invalid(DomHandler.getBirthdayElement());
        }

        if ("checkbox" in data.errors) {
             DomHandler.invalid(DomHandler.getCheckboxesParent())
        }

        DomHandler.error("You have failed Validation");


    } else if (response.responseCode === 200) {
        DomHandler.valid(DomHandler.getNameElement());
        DomHandler.valid(DomHandler.getEmailElement());
        DomHandler.valid(DomHandler.getTelephoneElement());
        DomHandler.valid(DomHandler.getBirthdayElement());
        DomHandler.valid(DomHandler.getCheckboxesParent())
        DomHandler.clearInputs();
        DomHandler.success("Form has successfully submitted");
    } else {
        DomHandler.error("Unexpected error");
    }
}