<?php
session_start();
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
    <h1>Biography</h1>

    <form action="save.php" method="POST" class="biographyFields">

        <!-- Description -->
        <details class="charDescription">
            <summary class="defaultBtn button">Description</summary>
            <textarea placeholder="Character description..." name="charDescription"><?= $character['biography']['description'] ?></textarea>
        </details>

        <!-- Quirks -->
        <details class="charQuriks">
            <summary class="defaultBtn button">Quirks</summary>
            <textarea placeholder="Character quirks..." name="charQuriks"><?= $character['biography']['quirks'] ?></textarea>
        </details>

        <!-- Goals -->
        <details class="charGoals" data-goals="<?= sizeof($character['biography']['goals']) ?>">
            <summary class="defaultBtn button">Goals</summary>
            <?php
            if (sizeof($character['biography']['goals']) > 1) :
                $index = 1;
                foreach ($character['biography']['goals'] as $goal) :
            ?>
                    <section class="missionObjective">
                        <input type="hidden" name="goalCheck[<?= $index ?>]" value="<?= $goal['completed'] ?>">
                        <input type="checkbox" <?php if ($goal['completed'] === "true") {
                                                    echo "checked";
                                                } ?>>
                        <textarea <?php if ($goal['completed'] === "true") {
                                        echo "class='completedTask'";
                                    } ?> name="goalTask[<?= $index ?>]"><?= $goal['objective'] ?></textarea>
                        <button type="button" class="cancelBtn">X</button>
                    </section>
            <?php
                    $index++;
                endforeach;
            endif; ?>
            <section class="missionObjective" id="goalsTemplate">
                <input type="hidden" value="false">
                <input type="checkbox">
                <textarea>Get base strucutre done</textarea>
                <button type="button" class="cancelBtn">X</button>
            </section>
            <button type="button" class="button greenBtn">+ Add</button>
        </details>

        <!-- Backstory -->
        <details class="charBackstory">
            <summary class="defaultBtn button">Backstory</summary>
            <textarea placeholder="Character backstory..." name="charBackstory"><?= $character['biography']['backstory'] ?></textarea>
        </details>

        <section class="navigation">
            <button type="button" name="biographyForm" class="button yellowBtn">&lt;<?= $previousPage; ?></button>
            <button type="button" name="biographyForm" type="button" class="cancelBtn">X</button>
            <input type="hidden" name="nextPage" value="next" />
            <button name="biographyForm" class="button greenBtn"><?= $nextPage; ?> &gt;</button>
        </section>
    </form>
</section>

<?php

include __DIR__ . "/../../views/footer.php";

?>