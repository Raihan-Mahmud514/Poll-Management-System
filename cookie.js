const cookieContainer = document.querySelector(".cookie-container");
const cookieButton = document.querySelector(".cookie-btn");

cookieButton.addEventListener("click", () => 
{
	cookieContainer.classList.remove("active");

});

setTimeout( () => {
	if(!localStorage.getItem("cookieBannerDisplayed"));
	cookieContainer.classList.add("active");
}, 2000);
