const bigImage = document.querySelector(".big-image");
const smallImages = document.querySelectorAll(".small-images");
smallImages.forEach((image) => {
  image.addEventListener("click", () => {
    const attribute = image.getAttribute("src");
    bigImage.src = attribute;
  });
});
