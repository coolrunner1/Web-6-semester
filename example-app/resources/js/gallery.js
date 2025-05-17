const galleryElements = () => {
    try {
        const images = $(".image-with-border");
        [...images].forEach(image => $(image).on("click", () => fullscreenDisplay([...images], image)));
    } catch (error) {
        console.error(error)
    }
};

const fullscreenDisplay = (images, image) => {
    const src = $(image).attr("src").toString();
    const title = $(image).attr("title").toString();
    let currentImage = images.indexOf(image);
    console.log(currentImage)
    const numberOfImages = images.length;
    const fullscreenImage=$('<img class="resizable-image" alt="'+title.toLowerCase()+'" title="'+title+'" src="'+src+'">');
    const fullscreenView = $("<div id='fullscreen-image-view'></div>");
    fullscreenView.on("click", () => fullscreenView.remove());
    fullscreenView.append(fullscreenImage);
    const backButton = $("<button>Назад</button>");
    backButton.on("click", () => {
        fullscreenView.remove();
        if(currentImage-1<0){
            currentImage=numberOfImages;
        }
        fullscreenDisplay(images, images[currentImage-1]);
    });
    const forwardButton = $("<button>Вперёд</button>");
    forwardButton.on("click", () => {
        fullscreenView.remove();
        if(currentImage+1>=numberOfImages){
            currentImage=-1;
        }
        fullscreenDisplay(images, images[currentImage+1]);
    });
    const navStatus = $("<div id='fullscreen-nav-status' class='hero-secondary'>Фото "+(currentImage+1)+" из "+numberOfImages+"</div>");
    const navigationContainer = $("<div class='fullscreen-view-navigation-container'></div>")
    navigationContainer.append(backButton);
    navigationContainer.append(navStatus);
    navigationContainer.append(forwardButton);
    fullscreenView.append(navigationContainer);
    $("body").prepend(fullscreenView);
}

galleryElements();
