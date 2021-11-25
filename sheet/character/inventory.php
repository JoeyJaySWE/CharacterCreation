<?php
session_start();
// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - Inventory";
$style = "../../styles/css/default.css";
$userName = "Raas/Joya (Gsus)";

// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// -------------------[ NAVIGATIONAL DATA ]-----------------------

$previousPageUrl = "skills.php";
$previousPage = "Skills";
$nextPageUrl = "biography.php";
$nextPage = "Biography";

// ----------------------------------------------------------------

include __DIR__ . "/../../views/header.php";

// ----------------- [ LOAD CHARCATER ] ------------------ 

$template = file_get_contents($characterJSON);
$template = json_decode($template, true);
// die(var_dump($_SESSION['charId']));
// $characterName = 
$character = $template[$_SESSION['userId']]['characters'][$_SESSION['charId']];

// ----------------------------------------------------------------

$armorsData = file_get_contents('../../app/JS/armor.json');
$weaponsData = file_get_contents('../../app/JS/weapons.json');
$gearData = file_get_contents('../../app/JS/gear.json');

// var_dump($statsData);
// die(var_dump($stats->knowledge->skills));

$armors = json_decode($armorsData, true);
$weapons = json_decode($weaponsData, true);
$gear = json_decode($gearData, true);



?>

<section id="inputFields">
    <h1>Inventory</h1>

    <form action="save.php" method="POST" class="inventoryFields">

        <!-- Armor -->
        <details name="armorSection">
            <summary class="defaultBtn button">Armor</summary>
            <?php if (sizeof($character['inventory']['armors']) > 1) :
                $index = 1;
                foreach ($character['inventory']['armors'] as $armor) :
                    if (sizeof($armor) === 1) {
                        continue;
                    }
            ?>

                    <section class="subBtnSection loadedArmor">
                        <button type="button" class="cancelBtn">X</button>
                        <details>

                            <summary class="defaultBtn subBtn button"><?= $armor['name'] ?></summary>
                            <input type="hidden" name="armorName[<?= $index ?>]" value="<?= $armor['name'] ?>">
                            <section>
                                <input type="hidden" name="newArmor[<?= $index ?>]" value="false">
                                <!-- Something around here makes form not submittiing named fields any more -->
                                <h2 class="fieldLabel">Pirce:</h2>
                                <input type="text" disabled name='armorCost[<?= $index; ?>]' value="<?= number_format($armor['cost']) ?>">
                            </section>

                            <section class="armorStats">
                                <!-- Head -->
                                <section class="headArmor">
                                    <h2 class="fieldLabel">Head</h2>
                                    <section class="armorValues physical">

                                        <span class="dValue">
                                            <input name="armorHeadPhysicalD[]" value="<?= $armor['protection']['head']['physical']['dice'] + $character['stats']['strength']['dice'] ?>" type="number" min="0">
                                            D
                                        </span>
                                        +
                                        <input name="armorHeadPhysicalPips[]" class="pipValue" value="<?= $armor['protection']['head']['physical']['pips'] + $character['stats']['strength']['pips'] ?>" type="number" max="2" min="0">
                                    </section>
                                    <section class="armorValues energy">

                                        <span class="dValue">
                                            <input name="armorHeadEnergyD[]" value="<?= $armor['protection']['head']['energy']['dice'] + $character['stats']['strength']['dice'] ?>" type="number" min="0">
                                            D
                                        </span>
                                        +
                                        <input name="armorHeadEnergyPips[]" class="pipValue" value="<?= $armor['protection']['head']['energy']['pips'] + $character['stats']['strength']['pips'] ?>" type="number" max="2" min="0">
                                    </section>
                                </section>

                                <!-- Torso -->
                                <section class="torsoArmor">
                                    <h2 class="fieldLabel">Torso</h2>
                                    <section class="armorValues physical">

                                        <span class="dValue">
                                            <input name="armorTorsoPhysicalD[]" value="<?= $armor['protection']['torso']['physical']['dice'] + $character['stats']['strength']['dice'] ?>" type="number" min="0">
                                            D
                                        </span>
                                        +
                                        <input name="armorTorsoPhysicalPips[]" class="pipValue" value="<?= $armor['protection']['torso']['physical']['pips'] + $character['stats']['strength']['pips'] ?>" type="number" max="2" min="0">
                                    </section>
                                    <section class="armorValues energy">

                                        <span class="dValue">
                                            <input name="armorTorsoEnergyD[]" value="<?= $armor['protection']['torso']['energy']['dice'] + $character['stats']['strength']['dice'] ?>" type="number" min="0">
                                            D
                                        </span>
                                        +
                                        <input name="armorTorsoEnergyPips[]" class="pipValue" value="<?= $armor['protection']['torso']['energy']['pips'] + $character['stats']['strength']['pips'] ?>" type="number" max="2" min="0">
                                    </section>
                                </section>

                                <!-- Arms -->
                                <section class="armsArmor">
                                    <h2 class="fieldLabel">Arms</h2>
                                    <section class="armorValues physical">

                                        <span class="dValue">
                                            <input name="armorArmsPhysicalD[]" value="<?= $armor['protection']['arms']['physical']['dice'] + $character['stats']['strength']['dice'] ?>" type="number" min="0">
                                            D
                                        </span>
                                        +
                                        <input name="armorArmsPhysicalPips[]" class="pipValue" value="<?= $armor['protection']['arms']['physical']['pips'] + $character['stats']['strength']['pips'] ?>" type="number" max="2" min="0">
                                    </section>
                                    <section class="armorValues energy">

                                        <span class="dValue">
                                            <input name="armorArmsEnergyD[]" value="<?= $armor['protection']['arms']['energy']['dice'] + $character['stats']['strength']['dice'] ?>" type="number" min="0">
                                            D
                                        </span>
                                        +
                                        <input name="armorArmsEnergyPips[]" class="pipValue" value="<?= $armor['protection']['arms']['energy']['pips'] + $character['stats']['strength']['pips'] ?>" type="number" max="2" min="0">
                                    </section>
                                </section>

                                <!-- Legs -->
                                <section class="legArmor">
                                    <h2 class="fieldLabel">Legs</h2>
                                    <section class="armorValues physical">

                                        <span class="dValue">
                                            <input name="armorLegsPhysicalD[]" value="<?= $armor['protection']['legs']['physical']['dice'] + $character['stats']['strength']['dice'] ?>" type="number" min="0">
                                            D
                                        </span>
                                        +
                                        <input name="armorLegsPhysicalPips[]" class="pipValue" value="<?= $armor['protection']['legs']['physical']['pips'] + $character['stats']['strength']['pips'] ?>" type="number" max="2" min="0">
                                    </section>
                                    <section class="armorValues energy">

                                        <span class="dValue">
                                            <input name="armorLegsEnergyD[]" value="<?= $armor['protection']['legs']['energy']['dice'] + $character['stats']['strength']['dice'] ?>" type="number" min="0">
                                            D
                                        </span>
                                        +
                                        <input name="armorLegsEnergyPips[]" class="pipValue" value="<?= $armor['protection']['legs']['energy']['pips'] + $character['stats']['strength']['pips'] ?>" type="number" max="2" min="0">
                                    </section>
                                </section>
                            </section>
                            <details class="penalties">
                                <summary class="defaultBtn subBtn button">Penalties</summary>
                                <?php $penalties = $armor['penalties'];
                                // var_dump("penalty check");
                                foreach ($penalties as $stat => $penalty) :
                                    if ($penalties['technical']['dice'] === null) :
                                        // die(var_dump($penalty['dice'] + $character['stats'][$stat]['dice']));
                                        // die(var_dump($penalty));
                                        if (($penalty['pips'] + $character['stats'][$stat]['pips']) < 0) {
                                            $penalty['pips'] = 0;
                                            $penalty['dice']--;
                                        }
                                        if (($penalty['dice'] + $character['stats'][$stat]['dice']) < 1) {
                                            $penalty['dice'] = ($character['stats'][$stat]['dice'] - $character['stats'][$stat]['dice'] + 1);
                                        }

                                ?>
                                        <section class="penalty">
                                            <h2 class="fieldLabel"><?= ucfirst($stat) ?>:</h2>
                                            <section class="armorValues">

                                                <span class="dValue">
                                                    <input name="armor<?= ucfirst($stat) ?>PenaltyD[<?= $index ?>]" value="<?= $penalty['dice'] + $character['stats'][$stat]['dice'] ?>" type="number" min="0">
                                                    D
                                                </span>
                                                +
                                                <input name="armor<?= ucfirst($stat) ?>PenaltyPips[<?= $index ?>]" class="pipValue" value="<?= $penalty['pips'] + $character['stats'][$stat]['pips'] ?>" type="number" max="2" min="0">
                                            </section>
                                        </section>

                                    <?php else : ?>
                                        <section class="penalty">
                                            <h2 class="fieldLabel"><?= ucfirst($stat) ?>:</h2>
                                            <section class="armorValues">

                                                <span class="dValue">
                                                    <input name="armor<?= ucfirst($stat) ?>PenaltyD[<?= $index ?>]" value="<?= $penalty['dice'] ?>" type="number" min="0">
                                                    D
                                                </span>
                                                +
                                                <input name="armor<?= ucfirst($stat) ?>PenaltyPips[<?= $index ?>]" class="pipValue" value="<?= $penalty['pips'] ?>" type="number" max="2" min="0">
                                            </section>
                                        </section>
                                <?php endif;
                                endforeach; ?>
                            </details>
                            <details>
                                <summary class="defaultBtn subBtn button">Description</summary>
                                <textarea class="displayData" name="armorDescription[<?= $index; ?>]">
                                    <?= $armor['description'] ?>
                                </textarea>
                            </details>

                            <details>
                                <summary class="defaultBtn subBtn button">Game note</summary>
                                <p>
                                    <?= $armor['gameNote'] ?>
                                </p>
                                <!-- somehow this works -->
                                <input type="hidden" name="armorGameNote[<?= $index; ?>]" value="<?= $armor['gameNote'] ?>">
                            </details>
                        </details>
                    </section>
            <?php
                endforeach;
            endif;
            ?>
            <section class="subBtnSection" id="armorTemplate">
                <input type="hidden" name="newArmor[]">
                <section>
                    <select class="fieldLabel" name="armor1">
                        <?php
                        get_armor_dropdown_menu($armors);
                        ?>
                    </select>
                </section>
            </section>
            <button type="button" class="button greenBtn">+ Add</button>
        </details>

        <!-- Weapons -->
        <details name="weaponSection">
            <summary class="defaultBtn button">Weapons</summary>

            <?php if (sizeof($character['inventory']['weapons']) > 1) :
                $index = 1;
                foreach ($character['inventory']['weapons'] as $weapon) :
                    if (sizeof($weapon) === 1) {
                        continue;
                    }
            ?>
                    <section class="subBtnSection loadedWeapons">
                        <button type="button" class="cancelBtn">X</button>
                        <details>
                            <summary class="defaultBtn subBtn button"><?= $weapon['name'] ?></summary>
                            <section>
                                <section class="statsVlues">
                                    <input type="hidden" value="<?= $weapon['name'] ?>" name="weaponsName[<?= $index ?>]">
                                    <input type="hidden" value="false" name="newWeapon[<?= $index ?>]">
                                    <?php get_weapons_data($weapon, $weapon['name'], $character, true, $index); ?>
                                </section>
                            </section>
                        </details>
                    </section>
            <?php $index++;
                endforeach;
            endif; ?>
            <section id="weaponsTemplate">
                <input type="hidden" name="newWeapon[]">

                <select>
                    <?php get_weapons_dropdown_menu($weapons) ?>
                </select>
            </section>
            <button type="button" class="button greenBtn">+ Add</button>
        </details>

        <!-- Field Gear -->
        <details name="fieldGearSection" data-field-amounts="<?= sizeof($character['inventory']['fieldGear']) ?>">
            <summary class="defaultBtn button">Field Gear</summary>
            <?php if (sizeof($character['inventory']['fieldGear']) > 1) :
                $index = 1;
                $printedGears = [];
                foreach ($character['inventory']['fieldGear'] as $fieldGear) :
                    if (sizeof($fieldGear) === 1) {
                        continue;
                    }
                    $fieldGear['amount'] = 0;
                    foreach ($character['inventory']['fieldGear'] as $fieldGearIndex) {
                        // var_dump(sizeof($fieldGearIndex));
                        if (sizeof($fieldGearIndex) === 1) {
                            continue;
                        };
                        if ($fieldGearIndex['name'] === $fieldGear['name']) {
                            $fieldGear['amount']++;
                        }
                    }

                    // die(var_dump($fieldGear['amount']));
            ?>
                    <section class="gearSection">
                        <input type="hidden" name="fieldGearName[<?= $index; ?>]" value="<?= $fieldGear['name'] ?>">
                        <input type="hidden" name="newFieldGear[<?= $index; ?>]" value="false">
                        <?php
                        if (array_search($fieldGear['name'], $printedGears)) {
                            echo "</section>";
                            $index++;
                            continue;
                        } ?>
                        <details>
                            <?php

                            // $jsonString = json_encode($string);
                            // var_dump(json_decode($jsonString), "test");
                            load_gear_data($fieldGear);
                            $printedGears[$index] = $fieldGear['name'];

                            ?>

                        </details>
                        <span class="amount">
                            x
                            <input type="number" value="<?= $fieldGear['amount'] ?>" />
                        </span>
                        <button type="button" class="cancelBtn">X</button>
                    </section>
            <?php $index++;
                endforeach;
            endif; ?>


            <section class="addGear" id="fieldGearTemplate">
                <input type="hidden" name="newFieldGear[<?= $index; ?>]" value="true">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_gears_dropdown_menu($gear, "Custom Gear");
                    ?>
                </select>
            </section>
            <button type="button" class="button greenBtn">+ Add</button>

        </details>

        <!-- Personal Gear -->
        <details name="personalGearSection" data-personal-amounts="<?= sizeof($character['inventory']['personalGear']) ?>">
            <summary class="defaultBtn button">Personal Gear</summary>
            <?php if (sizeof($character['inventory']['personalGear']) > 1) :
                $index = 1;
                $printedGears = [];
                foreach ($character['inventory']['personalGear'] as $personalGear) :
                    // var_dump(sizeof($personalGear));
                    if (sizeof($personalGear) === 1) {
                        continue;
                    }
                    $personalGear['amount'] = 0;
                    foreach ($character['inventory']['personalGear']  as $personalGearIndex) {
                        if (sizeof($personalGearIndex) === 1) {
                            continue;
                        };
                        if ($personalGearIndex['name'] === $personalGear['name']) {
                            $personalGear['amount']++;
                        }
                    }
                    // die(var_dump($fieldGear['amount']));
            ?>
                    <section class="gearSection">
                        <input type="hidden" name="personalGearName[<?= $index; ?>]" value="<?= $personalGear['name'] ?>">
                        <input type="hidden" name="newPersonalGear[<?= $index; ?>]" value="false">
                        <?php
                        if (array_search($personalGear['name'], $printedGears)) {
                            echo "</section>";
                            $index++;
                            continue;
                        } ?>
                        <details>
                            <?php

                            // $jsonString = json_encode($string);
                            // var_dump(json_decode($jsonString), "test");
                            load_gear_data($personalGear);
                            $printedGears[$index] = $personalGear['name'];
                            ?>

                        </details>
                        <span class="amount">
                            x
                            <input type="number" value="<?= $personalGear['amount'] ?>" />
                        </span>
                        <button type="button" class="cancelBtn">X</button>
                    </section>
            <?php $index++;
                endforeach;
            endif; ?>


            <section class="addGear" id="fieldGearTemplate">
                <input type="hidden" name="newFieldGear[]" value="true">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_gears_dropdown_menu($gear, "Custom Gear");
                    ?>
                </select>
            </section>
            <button type="button" class="button greenBtn">+ Add</button>

        </details>

        <span class="info">
            <h2 class="fieldLabel">Account Balance: </h2>
            <input type="number" value="5000"> Credits
        </span>
        <section class="navigation">
            <button name="inventoryForm" class="button yellowBtn">&lt;<?= $previousPage; ?></button>
            <button name="inventoryForm" type="button" class="cancelBtn">X</button>
            <input type="hidden" name="nextPage" value="next" />
            <button name="inventoryForm" class="button greenBtn"><?= $nextPage; ?> &gt;</button>
        </section>
    </form>
</section>

<section id="infoBox">
    <div class="visualData">
        <section class="pool">
            <span>7D</span>
            <span>D</span>
        </section>
        <img class="infoImg" src="https://via.placeholder.com/70x80/" alt="info image" />
        <section class="pool">
            <span>2</span>
            <span>Pips</span>
        </section>
    </div>
    <p class="infoText">
        An example text just to allow me to see how much space I might need for this functions.
    </p>
</section>

<?php

include __DIR__ . "/../../views/footer.php";

?>