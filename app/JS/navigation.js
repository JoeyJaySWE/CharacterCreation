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
const chractersPage = "http://localhost:8080/wip/CharacterCreation/sheet/characters.php?character=raasPrudii";

// ----------------------------------------------------------------

console.log("navigation initilizing...");

if(page !== userPage && page !== chractersPage){

    abortBtn.addEventListener('click', () => {
        hiddenDirection.value = "abort";
        saveBtn.click();
    })
    
    previousBtn.addEventListener('click', () => {
        hiddenDirection.value = "back";
        saveBtn.click();
    })
}
if(page === userPage){
    const newCharBtn = document.querySelector('#addSheetLnk');
    const charBtns = document.querySelectorAll('button[name="character"]');
    const newCharId = document.querySelector('input[name="newChar"');
    const characeterSelect = document.querySelector('form');
    
    console.log(characeterSelect.action);
    
    newCharBtn.addEventListener('click', ()=>{
        console.log('add new char: ', newCharId.value);
        characeterSelect.action += `?char=${newCharId.value}`;
        console.log(characeterSelect.action);
        window.location.href = characeterSelect.action;
    });

    charBtns.forEach((charBtn, index) => {
        
        charBtn.addEventListener('click', () => {
            console.log('laod character ID: ', index+1 );
            window.location.href=personallityPage+'?char='+(index+1);
        })
    });
}