if(page === biographyPage){
    console.log("Listening on Biography page....");
    let goalsSection = document.querySelector('details.charGoals');
    let goals = goalsSection.querySelectorAll('section.missionObjectives');
    let addGoal = goalsSection.querySelector('button.greenBtn');
    let removeGoals = goalsSection.querySelectorAll('button.cancelBtn');

    removeGoals.forEach(btn => {
        btn.addEventListener('click', ()=> {
            btn.parentElement.remove();
        })
    });

    addGoal.addEventListener('click', () => {
        let goalTemplate = goalsSection.querySelector('#goalsTemplate');
        let goal = goalTemplate.cloneNode(true);
        let goalsAmount;
        goals = goalsSection.querySelectorAll('section.missionObjective');

        console.log(goals.length);
        if(goalsSection.dataset.goals > goals.length){
            console.log("More on char");
            goalsAmount = goalsSection.dataset.goals;
        }
        else{
            console.log("more unsaved");
            goalsAmount = goals.length;
        }
        goal.removeAttribute("id");
        let completed = goal.querySelector('input[type=checkbox]');
        console.log({completed});
        let task = goal.querySelector('textarea');
        let completedHidden = goal.querySelector('input[type=hidden]');
        completedHidden.name = `goalCheck[${goalsAmount}]`;
        task.name = `goalTask[${goalsAmount}]`;
        task.value="";
        task.placeholder = "Add a goal...";
        task.focus();
        goalsSection.insertBefore(goal, goalTemplate);

        completed.addEventListener('change', ()=> {
            if(completed.checked){
                console.log("checked");
                task.classList.add('completedTask');
                completedHidden.value = true;

            }
            else{
                console.log("unchecked");
                task.classList.remove('completedTask');
                completedHidden.value = false;
            }
        })

        console.log(goal);
    })

    console.log("Done with Biography page.");
}