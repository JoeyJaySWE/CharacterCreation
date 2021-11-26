// ----------------- [ NAV BUTTON ] -------------------------- 

let form = document.querySelector("form");
const previousBtn = document.querySelector("section.navigation .yellowBtn");
const abortBtn = document.querySelector("section.navigation button.cancelBtn");
const saveBtn = document.querySelector("section.navigation button.greenBtn");
const hiddenDirection = document.querySelector("section.navigation input[type=hidden]");

// ----------------------------------------------------------------


// ----------------- [ PAGE URLS ] ------------------ 

let page = window.location.href;
const userPage = "http://localhost:8080/wip/CharacterCreation/user.php";
const personallityPage = "http://localhost:8080/wip/CharacterCreation/sheet/character/personallity.php";
const statsPage = "http://localhost:8080/wip/CharacterCreation/sheet/character/stats.php";
const skillPage = "http://localhost:8080/wip/CharacterCreation/sheet/character/skills.php";
const inventoryPage = "http://localhost:8080/wip/CharacterCreation/sheet/character/inventory.php";
const biographyPage = "http://localhost:8080/wip/CharacterCreation/sheet/character/biography.php";
const portraitPage = "http://localhost:8080/wip/CharacterCreation/sheet/character/portrait.php";

// ----------------------------------------------------------------

console.log("navigation initilizing...");

if(page !== userPage){

    abortBtn.addEventListener('click', () => {
        hiddenDirection.value = "abort";
        saveBtn.click();
    })
    
    previousBtn.addEventListener('click', () => {
        hiddenDirection.value = "back";
        saveBtn.click();
    })
}