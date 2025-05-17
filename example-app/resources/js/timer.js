const setTime = async() => {
    const date = new Date();
    $("#clock").text(date.toLocaleString("ru-RU"));
    setTimeout(await setTime, 1000);
}

(async () => {
    await setTime();
})();

