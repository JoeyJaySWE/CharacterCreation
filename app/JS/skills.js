if (page === skillPage) {
	console.log("Listining on skill page...");

	// ----------------- [ DEXTERITY ] ------------------

        let dexterityTemplate = document.querySelector(".templateDex");
        let dexterityList = dexterityTemplate.parentElement;
        let addDexSkill = document.querySelector("button[name=addDexSkill]");
        let dexSkillNo = 0;
        let loadedDex = document.querySelector("section.loadedDexSkills");
        let loadedDexRemoveBtns = loadedDex.querySelectorAll('button.cancelBtn');

        loadedDexRemoveBtns.forEach(cancelBtn => {
            cancelBtn.addEventListener('click', () => {
                cancelBtn.parentElement.parentElement.remove();
                console.log(dexSkillNo);
            })
        });

        addDexSkill.addEventListener("click", () => {
            let dexteritySkill = dexterityTemplate.cloneNode(true);
            dexteritySkill.classList.remove("templateDex");
            dexteritySkill.classList.add("dexSkill");
            dexteritySkill.name = "dexSkill[]";
            dexSkillNo++;
            let dexSkillName = dexteritySkill.querySelector("select");
            let dexSkillDice = dexteritySkill.querySelector("input.diceValue");
            let dexSkillPips = dexteritySkill.querySelector("input.pipValue");
            let dexSkillRemoveBtn = dexteritySkill.querySelector("button.cancelBtn");
            let specDexBtn = dexteritySkill.querySelector("input[type=checkbox");
            let specDexName = dexteritySkill.querySelector("input.specName");
            dexSkillName.name = "dexSkillName[]";
            dexSkillDice.name = "dexSkillDice[]";
            dexSkillPips.name = "dexSkillPips[]";

            dexterityList.insertBefore(dexteritySkill, dexterityTemplate);

            dexSkillRemoveBtn.addEventListener('click', ()=> {
                console.log("clicked X");
                dexSkillRemoveBtn.parentElement.parentElement.remove();
                console.log(dexSkillNo);
            })

            specDexBtn.addEventListener('click', () => {
                console.log('clicked Spec');
                if(specDexBtn.checked){

                    specDexName.style.display="flex";
                }
                else{
                    specDexName.style.display="none";

                }
            })
        });

	// ----------------------------------------------------------------


    // ----------------- [ KNOWLEDGE ] ------------------

    let knowledgeTemplate = document.querySelector(".templateKnow");
    let knowledgeList = knowledgeTemplate.parentElement;
    let addKnowSkill = document.querySelector("button[name=addKnowSkill]");
    let knowSkillNo = 0;

    addKnowSkill.addEventListener("click", () => {
        let knowledgeSkill = knowledgeTemplate.cloneNode(true);
        knowledgeSkill.classList.remove("templateKnow");
        knowledgeSkill.classList.add("knowSkill");
        knowSkillNo++;
        let knowSkillName = knowledgeSkill.querySelector("select");
        let knowSkillDice = knowledgeSkill.querySelector("input.diceValue");
        console.log(knowSkillDice);
        let knowSkillPips = knowledgeSkill.querySelector("input.pipValue");
        let knowSkillRemoveBtn = knowledgeSkill.querySelector("button.cancelBtn");
        let specKnowBtn = knowledgeSkill.querySelector("input[type=checkbox");
        let specKnowName = knowledgeSkill.querySelector("input.specName");
        knowSkillName.name = "knowSkillName[]";
        knowSkillDice.name = "knowSkillDice[]";
        knowSkillPips.name = "knowSkillPips[]";

        knowledgeList.insertBefore(knowledgeSkill, knowledgeTemplate);

        knowSkillRemoveBtn.addEventListener('click', ()=> {
            knowSkillRemoveBtn.parentElement.parentElement.remove();
        })

        specKnowBtn.addEventListener('click', () => {
            console.log('clicked Spec');
            if(specKnowBtn.checked){

                specKnowName.style.display="flex";
            }
            else{
                specKnowName.style.display="none";

            }
        })
    });

	// ----------------------------------------------------------------


    // ----------------- [ MECHANICAL ] ------------------

        let mechanicalTemplate = document.querySelector(".templateMech");
        let mechanicalList = mechanicalTemplate.parentElement;
        let addMechSkill = document.querySelector("button[name=addMechSkill]");
        let mechSkillNo = 0;
    
        addMechSkill.addEventListener("click", () => {
            let mechanicalSkill = mechanicalTemplate.cloneNode(true);
            mechanicalSkill.classList.remove("templateMech");
            mechanicalSkill.classList.add("mechSkill");
            mechSkillNo++;
            let mechSkillName = mechanicalSkill.querySelector("select");
            let mechSkillDice = mechanicalSkill.querySelector("input.diceValue");
            console.log(mechSkillDice);
            let mechSkillPips = mechanicalSkill.querySelector("input.pipValue");
            let mechSkillRemoveBtn = mechanicalSkill.querySelector("button.cancelBtn");
            let specMechBtn = mechanicalSkill.querySelector("input[type=checkbox");
            let specMechName = mechanicalSkill.querySelector("input.specName");
            mechSkillName.name = "mechSkillName[]";
            mechSkillDice.name = "mechSkillDice[]";
            mechSkillPips.name = "mechSkillPips[]";
    
            mechanicalList.insertBefore(mechanicalSkill, mechanicalTemplate);
    
            mechSkillRemoveBtn.addEventListener('click', ()=> {
                mechSkillRemoveBtn.parentElement.parentElement.remove();
            })
            
            specMechBtn.addEventListener('click', () => {
                console.log('clicked Spec');
                if(specMechBtn.checked){

                    specMechName.style.display="flex";
                }
                else{
                    specMechName.style.display="none";

                }
            })

        });
    
    // ----------------------------------------------------------------

    // ----------------- [ PERCEPTION ] ------------------

        let perceptionTemplate = document.querySelector(".templatePerc");
        let perceptionList = perceptionTemplate.parentElement;
        let addPercSkill = document.querySelector("button[name=addPercSkill]");
        let percSkillNo = 0;
    
        addPercSkill.addEventListener("click", () => {
            let perceptionSkill = perceptionTemplate.cloneNode(true);
            perceptionSkill.classList.remove("templatePerc");
            perceptionSkill.classList.add("percSkill");
            percSkillNo++;
            let percSkillName = perceptionSkill.querySelector("select");
            let percSkillDice = perceptionSkill.querySelector("input.diceValue");
            console.log(percSkillDice);
            let percSkillPips = perceptionSkill.querySelector("input.pipValue");
            let percSkillRemoveBtn = perceptionSkill.querySelector("button.cancelBtn");
            let specPercBtn = perceptionSkill.querySelector("input[type=checkbox");
            let specPercName = perceptionSkill.querySelector("input.specName");
            percSkillName.name = "percSkillName[]";
            percSkillDice.name = "percSkillDice[]";
            percSkillPips.name = "percSkillPips[]";
    
            perceptionList.insertBefore(perceptionSkill, perceptionTemplate);
    
            percSkillRemoveBtn.addEventListener('click', ()=> {
                percSkillRemoveBtn.parentElement.parentElement.remove();
            })

            specPercBtn.addEventListener('click', () => {
                console.log('clicked Spec');
                if(specPercBtn.checked){

                    specPercName.style.display="flex";
                }
                else{
                    specPercName.style.display="none";

                }
            })

        });
    
    // ----------------------------------------------------------------


    // ----------------- [ STRENGTH ] ------------------

        let strengthTemplate = document.querySelector(".templateStr");
        let strengthList = strengthTemplate.parentElement;
        let addStrSkill = document.querySelector("button[name=addStrSkill]");
        let strSkillNo = 0;
    
        addStrSkill.addEventListener("click", () => {
            let strengthSkill = strengthTemplate.cloneNode(true);
            console.log(strengthSkill);
            strengthSkill.classList.remove("templateStr");
            strengthSkill.classList.add("strSkill");
            strSkillNo++;
            let strSkillName = strengthSkill.querySelector("select");
            let strSkillDice = strengthSkill.querySelector("input.diceValue");
            console.log(strSkillDice);
            let strSkillPips = strengthSkill.querySelector("input.pipValue");
            let strSkillRemoveBtn = strengthSkill.querySelector("button.cancelBtn");
            let specStrBtn = strengthSkill.querySelector("input[type=checkbox");
            let specStrName = strengthSkill.querySelector("input.specName");
            strSkillName.name = "strSkillName[]";
            strSkillDice.name = "strSkillDice[]";
            strSkillPips.name = "strSkillPips[]";
    
            strengthList.insertBefore(strengthSkill, strengthTemplate);
    
            strSkillRemoveBtn.addEventListener('click', ()=> {
                strSkillRemoveBtn.parentElement.parentElement.remove();
            })

            specStrBtn.addEventListener('click', () => {
                console.log('clicked Spec');
                if(specStrBtn.checked){

                    specStrName.style.display="flex";
                }
                else{
                    specStrName.style.display="none";

                }
            })

        });
    
    // ----------------------------------------------------------------


        // ----------------- [ TECHNICAL ] ------------------

        let technicalTemplate = document.querySelector(".templateTech");
        let technicalList = technicalTemplate.parentElement;
        let addTechSkill = document.querySelector("button[name=addTechSkill]");
        let techSkillNo = 0;
    
        addTechSkill.addEventListener("click", () => {
            let technicalSkill = technicalTemplate.cloneNode(true);
            technicalSkill.classList.remove("templateTech");
            technicalSkill.classList.add("techSkill");
            techSkillNo++;
            let techSkillName = technicalSkill.querySelector("select");
            let techSkillDice = technicalSkill.querySelector("input.diceValue");
            console.log(techSkillDice);
            let techSkillPips = technicalSkill.querySelector("input.pipValue");
            let techSkillRemoveBtn = technicalSkill.querySelector("button.cancelBtn");
            let specTechBtn = technicalSkill.querySelector("input[type=checkbox");
            let specTechName = technicalSkill.querySelector("input.specName");
            techSkillName.name = "techSkillName[]";
            techSkillDice.name = "techSkillDice[]";
            techSkillPips.name = "techSkillPips[]";
    
            technicalList.insertBefore(technicalSkill, technicalTemplate);
    
            techSkillRemoveBtn.addEventListener('click', ()=> {
                techSkillRemoveBtn.parentElement.parentElement.remove();
            })

            specTechBtn.addEventListener('click', () => {
                console.log('clicked Spec');
                if(specTechBtn.checked){

                    specTechName.style.display="flex";
                }
                else{
                    specTechName.style.display="none";

                }
            })

        });
    
    // ----------------------------------------------------------------

	console.log("done with skills.js");
}
