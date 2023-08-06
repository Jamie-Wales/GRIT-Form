 export class Validator {
    static textInput(input) {
        return input.length > 0 && input.length < 100;
    }

    static emailInput(input) {
        const emailRegex = new RegExp("^[A-Z0-9._%+-]+@[A-Z0-9.-]+\\.[A-Z]{2,63}$", 'i');
        return emailRegex.test(input);
    }

    static telephoneInput(input) {
        if (input === '') {
            return true; // Return true if the input is an empty string
        }
        const telephoneRegex = new RegExp("^(?:(?:\\(?(?:0(?:0|11)\\)?[\\s-]?\\(?|\\+)44\\)?[\\s-]?(?:\\(?0\\)?[\\s-]?)?)|(?:\\(?0))(?:(?:\\d{5}\\)?[\\s-]?\\d{4,5})|(?:\\d{4}\\)?[\\s-]?(?:\\d{5}|\\d{3}[\\s-]?\\d{3}))|(?:\\d{3}\\)?[\\s-]?\\d{3}[\\s-]?\\d{3,4})|(?:\\d{2}\\)?[\\s-]?\\d{4}[\\s-]?\\d{4}))(?:[\\s-]?(?:x|ext\\.?|\\#)\\d{3,4})?$");
        return telephoneRegex.test(input);
    }

    static dateInput(input) {
        const dateInput = new Date(input);
        return dateInput < Date.now();
    }

    static checkboxChecked(checkboxes) {

        for (let i = 0; i < checkboxes.length - 1; i++) {
            if (checkboxes[i].checked === true) {
                return true;
            }
        }
        return false;
    }
}
