if (page.indexOf(skillPage) === 0) {
  console.log('Listining on skill page...');

  function loadedSkills(attribute) {
    switch (attribute) {
      case 'dex':
        loadedDex = document.querySelector('section.loadedDexSkills');
        loadedDexRemoveBtns = loadedDex.querySelectorAll('button.cancelBtn');
        specChecks = loadedDex.querySelectorAll("input[type = 'checkbox']");
        dexSkillNo = loadedDexRemoveBtns.length;

        loadedDexRemoveBtns.forEach((cancelBtn) => {
          cancelBtn.addEventListener('click', () => {
            console.log('STOP');
            cancelBtn.parentElement.parentElement.remove();
            dexSkillNo--;
            console.log(dexSkillNo);
          });
        });

        specChecks.forEach((specBtn) => {
          specBtn.addEventListener('click', () => {
            console.log('clicked Spec');
            const specDexName = specBtn.parentElement.previousElementSibling;
            if (specBtn.checked) {
              specDexName.style.display = 'flex';
            } else {
              console.log('click again');
              specDexName.value = '';
              specDexName.style.display = 'none';
            }
          });
        });
        break;

      case 'know':
        loadedKnow = document.querySelector('section.loadedKnowSkills');
        loadedKnowRemoveBtns = loadedKnow.querySelectorAll('button.cancelBtn');
        specChecks = loadedKnow.querySelectorAll("input[type = 'checkbox']");

        knowSkillNo = loadedKnowRemoveBtns.length;
        console.log('know skills: ', knowSkillNo);
        loadedKnowRemoveBtns.forEach((cancelBtn) => {
          cancelBtn.addEventListener('click', () => {
            console.log('STOP');
            cancelBtn.parentElement.parentElement.remove();
            knowSkillNo--;
            console.log(knowSkillNo);
          });
        });

        specChecks.forEach((specBtn) => {
          const specKnowName = specBtn.parentElement.previousElementSibling;
          specBtn.addEventListener('click', () => {
            console.log('clicked Spec');
            if (specBtn.checked) {
              specKnowName.style.display = 'flex';
            } else {
              specKnowName.value = '';
              specKnowName.style.display = 'none';
            }
          });
        });
        break;

      case 'mech':
        console.log('test');
        loadedMech = document.querySelector('section.loadedMechSkills');
        loadedMechRemoveBtns = loadedMech.querySelectorAll('button.cancelBtn');
        mechSkillNo = loadedMechRemoveBtns.length;
        specChecks = loadedMech.querySelectorAll("input[type = 'checkbox']");

        console.log('mech skills: ', mechSkillNo);
        loadedMechRemoveBtns.forEach((cancelBtn) => {
          cancelBtn.addEventListener('click', () => {
            console.log('STOP');
            cancelBtn.parentElement.parentElement.remove();
            mechSkillNo--;
            console.log(mechSkillNo);
          });
        });

        specChecks.forEach((specCheck) => {
          const specMechName = specCheck.parentElement.previousElementSibling;
          specCheck.addEventListener('click', () => {
            console.log('clicked Spec');
            if (specCheck.checked) {
              specMechName.style.display = 'flex';
            } else {
              specMechName.value = '';
              specMechName.style.display = 'none';
            }
          });
        });
        break;

      case 'perc':
        loadedPerc = document.querySelector('section.loadedPercSkills');
        loadedPercRemoveBtns = loadedPerc.querySelectorAll('button.cancelBtn');
        mechSkillNo = loadedPercRemoveBtns.length;
        specChecks = loadedPerc.querySelectorAll("input[type = 'checkbox']");

        console.log('perc skills: ', percSkillNo);
        loadedPercRemoveBtns.forEach((cancelBtn) => {
          cancelBtn.addEventListener('click', () => {
            console.log('STOP');
            cancelBtn.parentElement.parentElement.remove();
            percSkillNo--;
            console.log(percSkillNo);
          });
        });

        specChecks.forEach((specCheck) => {
          const specPercName = specCheck.parentElement.previousElementSibling;
          specCheck.addEventListener('click', () => {
            console.log('clicked Spec');
            if (specCheck.checked) {
              specPercName.style.display = 'flex';
            } else {
              specPercName.value = '';
              specPercName.style.display = 'none';
            }
          });
        });
        break;

      case 'str':
        loadedStr = document.querySelector('section.loadedStrSkills');
        loadedStrRemoveBtns = loadedStr.querySelectorAll('button.cancelBtn');
        strSkillNo = loadedStrRemoveBtns.length;
        specChecks = loadedStr.querySelectorAll("input[type = 'checkbox']");

        console.log('str skills: ', strSkillNo);
        loadedStrRemoveBtns.forEach((cancelBtn) => {
          cancelBtn.addEventListener('click', () => {
            console.log('STOP');
            cancelBtn.parentElement.parentElement.remove();
            strSkillNo--;
            console.log(strSkillNo);
          });
        });

        specChecks.forEach((specCheck) => {
          const specStrName = specCheck.parentElement.previousElementSibling;
          specCheck.addEventListener('click', () => {
            console.log('clicked Spec');
            if (specCheck.checked) {
              specStrName.style.display = 'flex';
            } else {
              specStrName.value = '';
              specStrName.style.display = 'none';
            }
          });
        });
        break;

      case 'tech':
        loadedTech = document.querySelector('section.loadedTechSkills');
        loadedTechRemoveBtns = loadedTech.querySelectorAll('button.cancelBtn');
        techSkillNo = loadedTechRemoveBtns.length;
        console.log('tech skills: ', techSkillNo);
        specChecks = loadedTech.querySelectorAll("input[type = 'checkbox']");

        loadedTechRemoveBtns.forEach((cancelBtn) => {
          cancelBtn.addEventListener('click', () => {
            console.log('STOP');
            cancelBtn.parentElement.parentElement.remove();
            techSkillNo--;
            console.log(techSkillNo);
          });
        });

        specChecks.forEach((specCheck) => {
          const specTechName = specCheck.parentElement.previousElementSibling;
          specCheck.addEventListener('click', () => {
            console.log('clicked Spec');
            if (specCheck.checked) {
              specTechName.style.display = 'flex';
            } else {
              specTechName.value = '';
              specTechName.style.display = 'none';
            }
          });
        });
        break;
    }
  }
  // ----------------- [ DEXTERITY ] ------------------

  let dexterityTemplate = document.querySelector('.templateDex');
  let dexterityList = dexterityTemplate.parentElement;
  let addDexSkill = document.querySelector('button[name=addDexSkill]');

  console.log(addDexSkill);
  let dexSkillNo = 0;
  let loadedDex;
  let loadedDexRemoveBtns;
  if (document.querySelector('section.loadedDexSkills') !== null) {
    loadedSkills('dex');
  }

  addDexSkill.addEventListener('click', () => {
    console.log('adding skill...');
    let dexteritySkill = dexterityTemplate.cloneNode(true);
    dexteritySkill.classList.remove('templateDex');
    dexteritySkill.classList.add('dexSkill');
    dexteritySkill.name = 'dexSkill[]';
    dexSkillNo++;
    let dexSkillName = dexteritySkill.querySelector('select');
    let dexSkillDice = dexteritySkill.querySelector('input.diceValue');
    let dexSkillPips = dexteritySkill.querySelector('input.pipValue');
    let dexSkillRemoveBtn = dexteritySkill.querySelector('button.cancelBtn');
    let specDexBtn = dexteritySkill.querySelector('input[type=checkbox');
    let specDexName = dexteritySkill.querySelector('input.specName');
    dexSkillName.name = 'dexSkill[]';
    dexSkillDice.name = 'dexSkillDice[]';
    dexSkillPips.name = 'dexSkillPips[]';

    dexterityList.insertBefore(dexteritySkill, dexterityTemplate);

    dexSkillRemoveBtn.addEventListener('click', () => {
      console.log('clicked X');
      dexSkillRemoveBtn.parentElement.parentElement.remove();
      dexSkillNo--;
      console.log(dexSkillNo);
    });

    specDexBtn.addEventListener('click', () => {
      console.log('clicked Spec');
      if (specDexBtn.checked) {
        specDexName.style.display = 'flex';
      } else {
        specDexName.style.display = 'none';
      }
    });
  });

  // ----------------------------------------------------------------

  // ----------------- [ KNOWLEDGE ] ------------------

  let knowledgeTemplate = document.querySelector('.templateKnow');
  let knowledgeList = knowledgeTemplate.parentElement;
  let addKnowSkill = document.querySelector('button[name=addKnowSkill]');
  let knowSkillNo = 0;

  if (document.querySelector('section.loadedKnowSkills') !== null) {
    loadedSkills('know');
  }
  addKnowSkill.addEventListener('click', () => {
    let knowledgeSkill = knowledgeTemplate.cloneNode(true);
    knowledgeSkill.classList.remove('templateKnow');
    knowledgeSkill.classList.add('knowSkill');
    knowSkillNo++;
    let knowSkillName = knowledgeSkill.querySelector('select');
    let knowSkillDice = knowledgeSkill.querySelector('input.diceValue');
    console.log(knowSkillDice);
    let knowSkillPips = knowledgeSkill.querySelector('input.pipValue');
    let knowSkillRemoveBtn = knowledgeSkill.querySelector('button.cancelBtn');
    let specKnowBtn = knowledgeSkill.querySelector('input[type=checkbox');
    let specKnowName = knowledgeSkill.querySelector('input.specName');
    knowSkillName.name = 'knowSkill[]';
    knowSkillDice.name = 'knowSkillDice[]';
    knowSkillPips.name = 'knowSkillPips[]';

    knowledgeList.insertBefore(knowledgeSkill, knowledgeTemplate);

    console.log('remove btn: ', knowSkillRemoveBtn);
    knowSkillRemoveBtn.addEventListener('click', () => {
      knowSkillRemoveBtn.parentElement.parentElement.remove();
    });

    specKnowBtn.addEventListener('click', () => {
      console.log('clicked Spec');
      if (specKnowBtn.checked) {
        specKnowName.style.display = 'flex';
      } else {
        specKnowName.style.display = 'none';
      }
    });
  });

  // ----------------------------------------------------------------

  // ----------------- [ MECHANICAL ] ------------------

  let mechanicalTemplate = document.querySelector('.templateMech');
  let mechanicalList = mechanicalTemplate.parentElement;
  let addMechSkill = document.querySelector('button[name=addMechSkill]');
  let mechSkillNo = 0;

  // This allows us to fix a delete function for when we are loading old skills.
  if (document.querySelector('section.loadedMechSkills') !== null) {
    loadedSkills('mech');
  } else {
    console.log('no skilsl found');
  }

  addMechSkill.addEventListener('click', () => {
    let mechanicalSkill = mechanicalTemplate.cloneNode(true);
    mechanicalSkill.classList.remove('templateMech');
    mechanicalSkill.classList.add('mechSkill');
    mechSkillNo++;
    let mechSkillName = mechanicalSkill.querySelector('select');
    let mechSkillDice = mechanicalSkill.querySelector('input.diceValue');
    console.log(mechSkillDice);
    let mechSkillPips = mechanicalSkill.querySelector('input.pipValue');
    let mechSkillRemoveBtn = mechanicalSkill.querySelector('button.cancelBtn');
    let specMechBtn = mechanicalSkill.querySelector('input[type=checkbox');
    let specMechName = mechanicalSkill.querySelector('input.specName');
    mechSkillName.name = 'mechSkill[]';
    mechSkillDice.name = 'mechSkillDice[]';
    mechSkillPips.name = 'mechSkillPips[]';

    mechanicalList.insertBefore(mechanicalSkill, mechanicalTemplate);
    mechSkillRemoveBtn.addEventListener('click', () => {
      mechSkillRemoveBtn.parentElement.parentElement.remove();
    });

    specMechBtn.addEventListener('click', () => {
      console.log('clicked Spec');
      if (specMechBtn.checked) {
        specMechName.style.display = 'flex';
      } else {
        specMechName.style.display = 'none';
      }
    });
  });

  // ----------------------------------------------------------------

  // ----------------- [ PERCEPTION ] ------------------

  let perceptionTemplate = document.querySelector('.templatePerc');
  let perceptionList = perceptionTemplate.parentElement;
  let addPercSkill = document.querySelector('button[name=addPercSkill]');
  let percSkillNo = 0;
  if (document.querySelector('section.loadedPercSkills') !== null) {
    loadedSkills('perc');
  }

  addPercSkill.addEventListener('click', () => {
    let perceptionSkill = perceptionTemplate.cloneNode(true);
    perceptionSkill.classList.remove('templatePerc');
    perceptionSkill.classList.add('percSkill');
    percSkillNo++;
    let percSkillName = perceptionSkill.querySelector('select');
    let percSkillDice = perceptionSkill.querySelector('input.diceValue');
    console.log(percSkillDice);
    let percSkillPips = perceptionSkill.querySelector('input.pipValue');
    let percSkillRemoveBtn = perceptionSkill.querySelector('button.cancelBtn');
    let specPercBtn = perceptionSkill.querySelector('input[type=checkbox');
    let specPercName = perceptionSkill.querySelector('input.specName');
    percSkillName.name = 'percSkill[]';
    percSkillDice.name = 'percSkillDice[]';
    percSkillPips.name = 'percSkillPips[]';

    perceptionList.insertBefore(perceptionSkill, perceptionTemplate);

    percSkillRemoveBtn.addEventListener('click', () => {
      percSkillRemoveBtn.parentElement.parentElement.remove();
    });

    specPercBtn.addEventListener('click', () => {
      console.log('clicked Spec');
      if (specPercBtn.checked) {
        specPercName.style.display = 'flex';
      } else {
        specPercName.style.display = 'none';
      }
    });
  });

  // ----------------------------------------------------------------

  // ----------------- [ STRENGTH ] ------------------

  let strengthTemplate = document.querySelector('.templateStr');
  let strengthList = strengthTemplate.parentElement;
  let addStrSkill = document.querySelector('button[name=addStrSkill]');
  let strSkillNo = 0;
  if (document.querySelector('section.loadedStrSkills') !== null) {
    loadedSkills('str');
  }

  addStrSkill.addEventListener('click', () => {
    let strengthSkill = strengthTemplate.cloneNode(true);
    console.log(strengthSkill);
    strengthSkill.classList.remove('templateStr');
    strengthSkill.classList.add('strSkill');
    strSkillNo++;
    let strSkillName = strengthSkill.querySelector('select');
    let strSkillDice = strengthSkill.querySelector('input.diceValue');
    console.log(strSkillDice);
    let strSkillPips = strengthSkill.querySelector('input.pipValue');
    let strSkillRemoveBtn = strengthSkill.querySelector('button.cancelBtn');
    let specStrBtn = strengthSkill.querySelector('input[type=checkbox');
    let specStrName = strengthSkill.querySelector('input.specName');
    strSkillName.name = 'strSkill[]';
    strSkillDice.name = 'strSkillDice[]';
    strSkillPips.name = 'strSkillPips[]';

    strengthList.insertBefore(strengthSkill, strengthTemplate);

    strSkillRemoveBtn.addEventListener('click', () => {
      strSkillRemoveBtn.parentElement.parentElement.remove();
    });

    specStrBtn.addEventListener('click', () => {
      console.log('clicked Spec');
      if (specStrBtn.checked) {
        specStrName.style.display = 'flex';
      } else {
        specStrName.style.display = 'none';
      }
    });
  });

  // ----------------------------------------------------------------

  // ----------------- [ TECHNICAL ] ------------------

  let technicalTemplate = document.querySelector('.templateTech');
  let technicalList = technicalTemplate.parentElement;
  let addTechSkill = document.querySelector('button[name=addTechSkill]');
  let techSkillNo = 0;
  if (document.querySelector('section.loadedTechSkills') !== null) {
    loadedSkills('tech');
  }

  addTechSkill.addEventListener('click', () => {
    let technicalSkill = technicalTemplate.cloneNode(true);
    technicalSkill.classList.remove('templateTech');
    technicalSkill.classList.add('techSkill');
    techSkillNo++;
    let techSkillName = technicalSkill.querySelector('select');
    let techSkillDice = technicalSkill.querySelector('input.diceValue');
    console.log(techSkillDice);
    let techSkillPips = technicalSkill.querySelector('input.pipValue');
    let techSkillRemoveBtn = technicalSkill.querySelector('button.cancelBtn');
    let specTechBtn = technicalSkill.querySelector('input[type=checkbox');
    let specTechName = technicalSkill.querySelector('input.specName');
    techSkillName.name = 'techSkill[]';
    techSkillDice.name = 'techSkillDice[]';
    techSkillPips.name = 'techSkillPips[]';

    technicalList.insertBefore(technicalSkill, technicalTemplate);

    techSkillRemoveBtn.addEventListener('click', () => {
      techSkillRemoveBtn.parentElement.parentElement.remove();
    });

    specTechBtn.addEventListener('click', () => {
      console.log('clicked Spec');
      if (specTechBtn.checked) {
        specTechName.style.display = 'flex';
      } else {
        specTechName.style.display = 'none';
      }
    });
  });

  // ----------------------------------------------------------------

  console.log('done with skills.js');
}
