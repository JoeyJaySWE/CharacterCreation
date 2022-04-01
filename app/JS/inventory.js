// function get_armors() {
//     return fetch("../../app/JS/armor.json")
// 	    .then((response) => response.json());
// }

if (page.indexOf(inventoryPage) === 0 ){
	console.log("Listining on inventory page...");

	// ----------------- [ ARMOR ] ------------------

	let armorTemplate = document.querySelector("#armorTemplate");
	let armorSection = document.querySelector("details[name=armorSection]");
	let addArmorBtn = armorSection.querySelector("button.greenBtn");
	let removeLoadedArmors = document.querySelectorAll(
		"section.subBtnSection.loadedArmor button.cancelBtn"
	);
	console.log(removeLoadedArmors);
	removeLoadedArmors.forEach((removeBtn) => {
		removeBtn.addEventListener("click", () => {
			removeBtn.parentElement.remove();
		});
	});
	// let loadedArmors = document.querySelector('section.loadedArmors');

	addArmorBtn.addEventListener("click", () => {
		console.log("adding Armor");
		let armor = armorTemplate.cloneNode(true);
		armor.removeAttribute("id");
		console.log(armor);
		armor.name = "armor[]";
		armorName = armor.querySelector("select");
		armorNew = armor.querySelector("input[type=hidden]");
		armorNew.value = "true";
		armorAmounts = document.querySelectorAll("section.loadedArmor").length + 1;
		console.log(armorAmounts);
		armorNew.name = `newArmor[${armorAmounts}]`;
		armorName.name = `armorName[${armorAmounts}]`;
		armorStats = armor.querySelector("section.armorStats");

		armorSection.insertBefore(armor, armorTemplate);
		let removeBtn = armor.querySelector("button.cancelBtn");
		console.log(removeBtn);

		armorName.addEventListener("change", () => {
			console.log(armorName.value);

			hiddenDirection.value = "refresh";
			// console.log(hiddenDirection);
			saveBtn.click();
		});
	});

	// ----------------------------------------------------

	// ---------------------- [ WEAPONS ] ----------------------------

	let weaponsTemplate = document.querySelector("#weaponsTemplate");
	let weaponsSection = document.querySelector("details[name=weaponSection]");
	let addWeaponsBtn = weaponsSection.querySelector("button.greenBtn");
	let removeLoadedWeapons = document.querySelectorAll(
		"section.subBtnSection.loadedWeapons button.cancelBtn"
	);

	removeLoadedWeapons.forEach((btn) => {
		// console.log(btn);
		btn.addEventListener("click", () => {
			// console.log("delete weapon");
			btn.parentElement.remove();
		});
	});

	addWeaponsBtn.addEventListener("click", () => {
		console.log("adding Weapons");
		let weapon = weaponsTemplate.cloneNode(true);
		weapon.removeAttribute("id");
		console.log(weapon);
		weaponAmounts =
			document.querySelectorAll("section.subBtnSection.loadedWeapons").length +
			1;
		console.log(weaponAmounts);
		weaponName = weapon.querySelector("select");
		weaponName.name = `weaponsName[${weaponAmounts}]`;
		weaponNew = weapon.querySelector("input[type=hidden]");
		weaponNew.name = `newWeapon[${weaponAmounts}]`;
		weaponNew.value = "true";
		// weaponStats = weapon.querySelector("section.weaponStats");

		weaponsSection.insertBefore(weapon, weaponsTemplate);
		// let removeBtn = weapon.querySelector("button.cancelBtn");
		// console.log(removeBtn);

		weaponName.addEventListener("change", () => {
			console.log(weaponName.value);

			hiddenDirection.value = "refresh";
			console.log(hiddenDirection);
			saveBtn.click();
		});
	});

	// ----------------------------------------------------------------

	// ---------------------- [ FIELD GEAR ] ----------------------------

	let gearTemplate = document.querySelector("#fieldGearTemplate");
	let fieldGearSection = document.querySelector("details[name=fieldGearSection]");
    let personalGearSection = document.querySelector("details[name=personalGearSection]");
    let personalTemplate = personalGearSection.querySelector('section.addGear');
	let addFieldGearBtn = fieldGearSection.querySelector("button.greenBtn");
    let addPersonalGearBtn = personalGearSection.querySelector("button.greenBtn");
	let removeLoadedFieldgear = fieldGearSection.querySelectorAll("button.cancelBtn");
	let removeLoadedPersonalGear = personalGearSection.querySelectorAll("button.cancelBtn");
    console.log(removeLoadedFieldgear);
    let disabledSummaries = fieldGearSection.querySelectorAll('summary.disabled');

    disabledSummaries.forEach(disabledSum => {
        disabledSum.addEventListener('click', (e) => {
            e.preventDefault();
        })
    });

	removeLoadedFieldgear.forEach((btn) => {
		// console.log(btn);
		btn.addEventListener("click", () => {
			// console.log("delete weapon");
			btn.parentElement.remove();
		});
	});

    removeLoadedPersonalGear.forEach((btn) => {
		// console.log(btn);
		btn.addEventListener("click", () => {
			// console.log("delete weapon");
			btn.parentElement.remove();
		});
	});

	addFieldGearBtn.addEventListener("click", () => {
		console.log("adding Field Gear");
		let gear = gearTemplate.cloneNode(true);
		gear.removeAttribute("id");
        gear.classList.value = "gearSection";
		console.log(gear);
		gearAmounts = fieldGearSection.dataset.fieldAmounts;
		console.log(gearAmounts);
		gearName = gear.querySelector("select");
		gearName.name = `fieldGearName[${gearAmounts}]`;
		gearNew = gear.querySelector("input[type=hidden]");
		gearNew.name = `newFieldGear[${gearAmounts}]`;
		gearNew.value = "true";
		// weaponStats = weapon.querySelector("section.weaponStats");

		fieldGearSection.insertBefore(gear, gearTemplate);
		// let removeBtn = weapon.querySelector("button.cancelBtn");
		// console.log(removeBtn);

		gearName.addEventListener("change", () => {
			console.log(gearName.value);

			hiddenDirection.value = "refresh";
			console.log(hiddenDirection);
			saveBtn.click();
		});
	});

    addPersonalGearBtn.addEventListener("click", () => {
		console.log("adding Field Gear");
		let gear = gearTemplate.cloneNode(true);
		gear.removeAttribute("id");
        gear.classList.value = "gearSection";
		console.log(gear);
		gearAmounts = personalGearSection.dataset.personalAmounts;
		console.log(gearAmounts);
		gearName = gear.querySelector("select");
		gearName.name = `personalGearName[${gearAmounts}]`;
		gearNew = gear.querySelector("input[type=hidden]");
		gearNew.name = `newPersonalGear[${gearAmounts}]`;
		gearNew.value = "true";
		// weaponStats = weapon.querySelector("section.weaponStats");

		personalGearSection.insertBefore(gear, personalTemplate);
		// let removeBtn = weapon.querySelector("button.cancelBtn");
		// console.log(removeBtn);

		gearName.addEventListener("change", () => {
			console.log(gearName.value);

			hiddenDirection.value = "refresh";
			console.log(hiddenDirection);
			saveBtn.click();
		});
	});

	// ----------------------------------------------------------------
	console.log("done with inventory.js");
}

// console.log(armorName.value);
//
