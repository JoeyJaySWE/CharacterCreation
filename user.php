<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 
session_start();
$_SESSION['user'] = "Raas/Joya (Gsus)";
$_SESSION['userId'] = 1;
$page_title = "Crew Sheets - User Page";
$style = "styles/css/default.css";
$userName = $_SESSION['user'];
$userId = $_SESSION['userId'];

// ----------------------------------------------------------------


// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// ----------------------------------------------------------------






include __DIR__ . "/views/header.php";
// $_SESSION['charId'] = "raasPrudii";
?>

<div id="userBox">
    <section class="scrollWrapper">

        <img class='avatar' src="https://cdn.discordapp.com/attachments/771005073056464926/864953362399363083/unknown.png" />
        <h2>Welcome<br /><span class="username"><?= $userName; ?></span></h2>
        <details open>
            <summary class="button defaultBtn">
                Sheets
            </summary>
            <form action="sheet/character/personallity.php" method="POST">
                <?php

                $jsonCharacters = file_get_contents('app/JS/characters.json');
                $fileChracters = json_decode($jsonCharacters, true);
                if (array_key_exists($userId, $fileChracters)) :
                    $characters = $fileChracters[$userId]['characters'];
                    $i = 1;
                    foreach ($characters as $character) : ?>
                        <div>
                            <button name="character" class="defaultBtn subBtn" value="<?= $character['name'] ?>"><?= $character['name'] ?></button>
                            <button name="deleteCharacter" type="button" value="<?= $character['slug'] ?>" class="cancelBtn" id="deleteChar<?= $i; ?>">X</button>
                        </div>
                <?php
                        $i++;
                    endforeach;
                endif;


                ?>
                <button name="newSheet" id="addSheetLnk" class='button greenBtn subBtn'>+ Add</button>
            </form>
        </details>
    </section>
</div>

<?php

include __DIR__ . "/views/footer.php";

?>