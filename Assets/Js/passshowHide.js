//password hide show
function showpass() {
    var x = document.getElementById("validationCucstom03");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// username not use space validation
const inputField = document.getElementById("validationCustomUsername");
inputField.addEventListener("input", function (event) {
    const inputValue = event.target.value;
    if (inputValue.includes(" ")) {
        event.target.value = inputValue.replace(/\s/g, "");
    }
});