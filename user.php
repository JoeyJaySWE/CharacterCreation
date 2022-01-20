<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 
session_start();
$_SESSION['user'] = "Shadowland Viper";
$_SESSION['userId'] = 2;
$page_title = "Crew Sheets - User Page";
$styleMobile = "styles/css/default.css";
$styleDesktop = "styles/css/desktop.css";
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


$users = file_get_contents('sheet/users.json');
$usersData = json_decode($users, true);
$_SESSION['userId'] = 1;
// $_SESSION['userId'] = sizeof($usersData);

// die(var_dump($usersData[$_SESSION['userId']]));

if (!isset($usersData[$_SESSION['userId']])) {
    // die(var_dump('new user'));

    $newUser = $usersData["0"];
    $newUser['userId'] = $_SESSION['userId'];
    $newUser['joined'] = date('Y-M-d');

    $_SESSION['charId'] = 1;
    $newUser['characters'][0]["id"] = $_SESSION['charId'];
    $newUser['characters'][0]['name'] = "Character " . $_SESSION['charId'];
    $usersData[$_SESSION['userId']] = $newUser;
    $newUserData = json_encode($usersData);
    file_put_contents('sheet/users.json', $newUserData);
    $newChar = $_SESSION['charId'];
} else {
    $newChar = sizeof($usersData[$_SESSION['userId']]['characters']);
    // die(var_dump($newChar));
}




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

                $jsonCharacters = file_get_contents('sheet/characters/' . $_SESSION['userId'] . '.json');
                $fileChracters = json_decode($jsonCharacters, true);
                if (sizeof($fileChracters['characters']) > 1) :
                    $characters = $fileChracters['characters'];
                    $i = 1;
                    foreach ($characters as $character) :
                        if ($character['name'] === 'Character') {
                            continue;
                        } ?>
                        <div>
                            <button name="character" type="button" class="defaultBtn subBtn" value="<?= $character['name'] ?>"><?= $character['name'] ?></button>
                            <button name="deleteCharacter" type="button" value="<?= $character['slug'] ?>" class="cancelBtn" id="deleteChar<?= $i; ?>">X</button>
                        </div>
                <?php
                        $i++;
                    endforeach;
                endif;


                ?>
                <input type="hidden" value="<?= $newChar ?>" name="newChar" />
                <button name="newSheet" type="button" id="addSheetLnk" class='button greenBtn subBtn'>+ Add</button>
            </form>
        </details>
    </section>
</div>

<?php

include __DIR__ . "/views/footer.php";

?>