if(page === statsPage){
    console.log("Tracking changes on stats page...");

    const forcie = document.querySelector("input[name=forcie]");
    const forceSection = document.querySelector("section.forceUserStats");
    
    forcie.addEventListener("click", () => {
        if(forcie.checked){
            console.log({forceSection});
            forceSection.style.display = "flex";
            
        }
        else{
            console.log(forceSection.checked);
            forceSection.style.display = "none";
        }
    })
}