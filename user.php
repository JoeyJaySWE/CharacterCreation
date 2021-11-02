<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - User Page";
$style = "styles/css/default.css";
$userName = "Raas/Joya (Gsus)";

// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// ----------------------------------------------------------------

// ----------------------------------------------------------------





include __DIR__ . "/views/header.php";

?>

<div id="userBox">
    <img class='avatar' src="https://via.placeholder.com/90x90/" />
    <h2>Welcome<br /><span class="username"><?= $userName; ?></span></h2>
    <details open>
        <summary class="button defaultBtn">
            Sheets
        </summary>

        <a class='button greenBtn subBtn' href="sheet/new-char/personallity.php">+ Add</a>
    </details>
</div>

<?php

include __DIR__ . "/views/footer.php";

?>