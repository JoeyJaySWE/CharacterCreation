<?php
session_start();
// $_SESSION['charId'] = "emptyChar";
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
// die(var_dump($_SESSION['charId']));
$armors = json_decode($armorsData, true);
$weapons = json_decode($weaponsData, true);
$gear = json_decode($gearData, true);




?>

<section id="inputFields">
    <h1>Portrait</h1>

    <form action="save.php" method="POST" class="portraitFields">

        <?php if ($character['img'] !== "" || $character['name'] !== "") : ?>
            <figure>
                <?php if ($character['img'] !== "") : ?>
                    <img name="avatar" src="<?= $character['img'] ?>">
                    <input type="hidden" name="avatarLnk" value="<?php if ($character['img'] !== "") {
                                                                        echo $character['img'];
                                                                    } ?>">
                <?php else : ?>
                    <img name="avatar" src="https://media.discordapp.net/attachments/379442391775707156/907990057695195136/skull_iconpng.png">
                    <input type="hidden" name="avatarLnk" value="">
                <?php endif; ?>
                <button type="button" class="defaultBtn">Paste URL</button>
            </figure>

            <input type="text" placeholder="Your characters name" value="<?= $character['name'] ?>" name="charName" />

            <a href="../characters.php?character=<?= $character['slug'] ?>" target="_blank">Your public Bio page</a>

        <?php else : ?>
            <figure>
                <img name="avatar" src="https://media.discordapp.net/attachments/379442391775707156/907990057695195136/skull_iconpng.png">
                <input type="hidden" name="avatarLnk" value="">
                <button type="button" class="defaultBtn">Paste URL</button>
            </figure>

            <input type="text" placeholder="Your characters name" name="charName" />

            <a href="../characters.php" target="_blank">Your public Bio page</a>

        <?php endif; ?>

        <section class="navigation">
            <button type="button" name="portraitForm" class="button yellowBtn">&lt;<?= $previousPage; ?></button>
            <button type="button" name="portraitForm" type="button" class="cancelBtn">X</button>
            <input type="hidden" name="nextPage" value="next" />
            <button name="portraitForm" class="button greenBtn"><?= $nextPage; ?> &gt;</button>
        </section>
    </form>
</section>

<?php

include __DIR__ . "/../../views/footer.php";

?>