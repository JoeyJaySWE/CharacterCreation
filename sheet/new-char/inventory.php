<?php

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


$armorsData = file_get_contents('../../app/JS/armor.json');
$weaponsData = file_get_contents('../../app/JS/weapons.json');
$gearData = file_get_contents('../../app/JS/gear.json');

// var_dump($statsData);
// die(var_dump($stats->knowledge->skills));

$armors = json_decode($armorsData, true);
$weapons = json_decode($weaponsData, true);
$gear = json_decode($gearData, true);


include __DIR__ . "/../../views/header.php";


?>

<section id="inputFields">
    <h1>Inventory</h1>

    <form action="skills.php" method="POST" class="skillsFields">

        <!-- Armor -->
        <details>
            <summary class="defaultBtn button">Dexterity<span></span></summary>
            <section>
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_armor_dropdown_menu($dexteritySkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Weapons -->
        <details>
            <summary class="defaultBtn button">Dexterity<span></span></summary>
            <section>
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($dexteritySkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Field Gear -->
        <details>
            <summary class="defaultBtn button">Dexterity<span></span></summary>
            <section>
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($dexteritySkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Personal Gear -->
        <details>
            <summary class="defaultBtn button">Dexterity<span></span></summary>
            <section>
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($dexteritySkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <section class="navigation">
            <a href="<?= $previousPageUrl; ?>" class="button yellowBtn">&lt; <?= $previousPage; ?></a>
            <a href="../../user.php" class="cancelBtn">X</a>
            <a href="<?= $nextPageUrl; ?>" class="button greenBtn"><?= $nextPage; ?> &gt;</a>
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