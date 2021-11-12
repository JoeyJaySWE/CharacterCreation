
document.addEventListener("DOMContentLoaded", (event) => {
    console.log('DOM is ready.')
});



// user.php
if(window.location.href === userPage){
    const deleteBtns = document.querySelectorAll("button.cancelBtn");
    const submitBtn = document.querySelector('button.greenBtn');
    deleteBtns.forEach(delBtn => {
        delBtn.addEventListener("click", () => {
            let character = delBtn.previousElementSibling.textContent;
            console.log(character);
            // delBtn.parentElement.remove();
            let form = document.querySelector("form");
            form.action = "delete.php";
            console.log(form.action);
            delBtn.type = "submit";
            delBtn.click();
            
        })
        
    });

}
