function validateForm(form, totalQuestions) {
    for (let i = 1; i <= totalQuestions; i++) {
        let elems = form.querySelectorAll('[name="q['+i+']"]');
        let answered = false;
        if (elems.length === 1 && elems[0].type !== 'checkbox') {
            if (elems[0].value.trim() !== "") {
                answered = true;
            }
        } else {
            for (let elem of elems) {
                if (elem.checked) {
                    answered = true;
                    break;
                }
            }
        }
        if (!answered) {
            alert("Відповідь на питання " + i + " не заповнена");
            return false;
        }
    }
    return true;
}
