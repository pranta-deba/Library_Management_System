// username not use space validation
const inputField = document.getElementById("validationCustomUsername11");
inputField.addEventListener("input", function(event) {
    const inputValue = event.target.value;
    if (inputValue.includes(" ")) {
        event.target.value = inputValue.replace(/\s/g, "");
    }
});



// 11 digit number alert validation
function validateNumberInput() {
    const numberInput = document.getElementById("validation3Custom03");
    const password = document.getElementById("validationCustomoo").value;
    const cpassword = document.getElementById("validationCustom03tgh").value;
    const inputValue = numberInput.value;

    if (inputValue.length !== 11) {
        alert("Please enter a number with exactly 11 digits.");
        return false; // Prevent form submission
    };
    if (password != cpassword) {
        alert("Password Not Match.");
        return false;
    }
    return true; // Allow form submission
}