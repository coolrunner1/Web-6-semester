const loginInput = document.querySelector("#login");

loginInput.addEventListener('blur', () => {
    const login = loginInput.value;
    if (!login) {
        return;
    }
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            console.log(xhttp.responseText)
            addLoginAvailability(xhttp.responseText);
        }
    };
    xhttp.open("GET", `http://${window.location.host}/api/check-login?login=${login}`, true);
    xhttp.send();
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
