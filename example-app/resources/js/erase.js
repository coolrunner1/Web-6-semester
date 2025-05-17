$("#but3").on( "click", () => {
    $("body").prepend("<div id='fullscreen-overlay'>" +
        "<div class='pop-up'>Вы точно уверены, что хотите стереть все данные?" +
        "<div class='bottom-buttons'><button id='yes-popup'>Да</button><button id='no-popup'>Нет</button></div></div></div>");
    $("#yes-popup").on("click", () => {
        $("#fullscreen-overlay").remove();
        $("#survey-form").trigger("reset");
        setValidElements();
    });
    $("#no-popup").on("click", () => {
        $("#fullscreen-overlay").remove();
    })
});
