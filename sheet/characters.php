<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Profile";
$style = "../styles/css/default.css";
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
include __DIR__ . "/../views/header.php";
// ----------------- [ LOAD CHARCATER ] ------------------ 

$template = file_get_contents("../app/JS/characters.json");
$template = json_decode($template, true);
// die(var_dump($_SESSION['charId']));
// $characterName = 
$charId = parse_str($_SERVER['QUERY_STRING'], $query);
// die(var_dump($query));
$character = load_character($query['character'], $template);
// die(var_dump($character));
$page_title = $character['name'];
// ----------------------------------------------------------------



// var_dump($statsData);
// die(var_dump($stats->knowledge->skills));





?>
<section id="inputFields">
    <h1>Profile</h1>

    <section class="container">

        <figure>
            <img src="<?= $character['img'] ?>">
        </figure>
        <section class="introSection">
            <h2><?= $character['name'] ?></h2>
            <p> <?= $character['biography']['description'] ?></p>
        </section>

        <details>
            <summary class="defaultBtn button">Quirks</summary>
            <p><?= $character['biography']['quirks'] ?></p>
        </details>

        <details>
            <summary class="defaultBtn button">Goals</summary>
            <?php foreach ($character['biography']['goals'] as $goal) : ?>
                <p <?php if ($goal['completed'] === "true") {
                        echo "class='completedTask'";
                    } ?>><?= $goal['objective'] ?></p>
            <?php endforeach; ?>
        </details>

        <details>
            <summary class="defaultBtn button">Backstory</summary>
            <p><?= $character['biography']['backstory'] ?></p>
        </details>
    </section>
    <?php

    include __DIR__ . "/../views/footer.php";

    ?>