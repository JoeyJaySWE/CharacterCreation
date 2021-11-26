<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - Portrait";
$style = "../../styles/css/default.css";
$userName = "Raas/Joya (Gsus)";

// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// -------------------[ NAVIGATIONAL DATA ]-----------------------

$previousPageUrl = "biography.php";
$previousPage = "Biography";
$nextPageUrl = "../../user.php";
$nextPage = "Finish";

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
    <h1>Portrait</h1>

    <form action="" method="POST" class="portraitFields">

        <figure>
            <button class="defaultBtn">Paste URL</button>
        </figure>

        <input type="text" placeholder="Your characters name" name="charName" />

        <a href="../characters.php" target="_blank">Your public Bio page</a>

        <section class="navigation">
            <a href="<?= $previousPageUrl; ?>" class="button yellowBtn">&lt; <?= $previousPage; ?></a>
            <a href="../../user.php" class="cancelBtn">X</a>
            <a href="<?= $nextPageUrl; ?>" class="button greenBtn"><?= $nextPage; ?></a>
        </section>
    </form>
</section>

<?php

include __DIR__ . "/../../views/footer.php";

?>