const loginInput = document.querySelector("#login");

loginInput.addEventListener('blur', () => {
    const login = loginInput.value;
    if (!login) {
        return;
    }
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(xhr.responseText)
            addLoginAvailability(xhr.responseText);
        }
    };
    xhr.open("POST", `http://${window.location.host}/api/check-login`, true);
    xhr.send(login);
});

const addLoginAvailability = (textContent) => {
    if ($("#login-tip").length){
        return;
    }

    const content = $(`<div class='pop-up-tip ${textContent === "Логин свободен" ? "valid-input" : "invalid-input"}' id='login-tip'> ${textContent} </div>`);
    $("#login-tip-container").append(content);
    setTimeout(() => {
        $("#login-tip").remove();
    }, 3000);
};
