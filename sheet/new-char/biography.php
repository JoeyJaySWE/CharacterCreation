<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - Biography";
$style = "../../styles/css/default.css";
$userName = "Raas/Joya (Gsus)";

// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// -------------------[ NAVIGATIONAL DATA ]-----------------------

$previousPageUrl = "inventory.php";
$previousPage = "Inventory";
$nextPageUrl = "portrait.php";
$nextPage = "Portrait";

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
    <h1>Biography</h1>

    <form action="skills.php" method="POST" class="biographyFields">

        <!-- Description -->
        <details class="charDescription">
            <summary class="defaultBtn button">Description</summary>
            <textarea placeholder="Character description..." name="charDescription"></textarea>
        </details>

        <!-- Quirks -->
        <details class="charQuriks">
            <summary class="defaultBtn button">Quirks</summary>
            <textarea placeholder="Character quirks..." name="charQuriks"></textarea>
        </details>

        <!-- Goals -->
        <details class="charGoals">
            <summary class="defaultBtn button">Goals</summary>
            <section class="missionObjective">
                <input type="checkbox" name="goal1" checked>
                <textarea name="goal1">Get base strucutre done</textarea>
            </section>
            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Backstory -->
        <details class="charBackstory">
            <summary class="defaultBtn button">Backstory</summary>
            <textarea placeholder="Character backstory..." name="charBackstory"></textarea>
        </details>

        <section class="navigation">
            <a href="<?= $previousPageUrl; ?>" class="button yellowBtn">&lt; <?= $previousPage; ?></a>
            <a href="../../user.php" class="cancelBtn">X</a>
            <a href="<?= $nextPageUrl; ?>" class="button greenBtn"><?= $nextPage; ?> &gt;</a>
        </section>
    </form>
</section>

<?php

include __DIR__ . "/../../views/footer.php";

?>