<?php
session_start();
if (!isset($_SESSION['user']) || !isset($_GET['char'])) {
    die(var_dump("redirect"));
    header("Location: http://localhost:8080/wip/CharacterCreation/index.php");
}

// ----------------- [ PAGE VARIABLES ] ------------------

$page_title = "Crew Sheets - Personallity";
$styleMobile = "../../styles/css/default.css";
$styleDesktop = "../../styles/css/desktop.css";

// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// -------------------[ NAVIGATIONAL DATA ]-----------------------

$previousPageUrl = "";
$previousPage = "";
$nextPageUrl = "stats.php";
$nextPage = "Stats";

// ----------------------------------------------------------------
include __DIR__ . "/../../views/header.php";
// die(var_dump($_SESSION['userId']));
$template = file_get_contents($templateJSON);
$template = json_decode($template, true);
$users = file_get_contents('../users.json');
$usersData = json_decode($users, true);

// sets up a new user cararters file if none exists.
if (!file_exists('../characters/' . $_SESSION['userId'] . '.json')) {
    // die(var_dump($template));
    $newCharacterFile = $template;

    $newCharacterFile['username'] = $_SESSION['user'];
    file_put_contents('../characters/' . $_SESSION['userId'] . '.json', json_encode($newCharacterFile));
}

// die(var_dump("user exsists: ,", $_SESSION['userId']));
$template = file_get_contents('../characters/' . $_SESSION['userId'] . '.json');
$template = json_decode($template, true);

// checks if current chracter is new character
if (isset($template['characters'][$_GET['char']-1]) && $template['characters'][$_GET['char']-1]['name'] === 'Character') {

    $character = $template['characters'][0];
    // die("No character");
    $_SESSION['charId'] = (int)$_GET['char']-1;
    $template['characters'][$_SESSION['charId']] = $character;
    $template['characters'][$_SESSION['charId']]['slug'] = $_SESSION['charId']+1;
    $template['characters'][$_SESSION['charId']]['name'] .= " " . $_SESSION['charId']+1;




    $jsonData = json_encode($template);
    file_put_contents('../characters/' . $_SESSION['userId'] . '.json', $jsonData);
    $characterName = "Character" . $_SESSION['charId'];
    // die(var_dump($jsonData[]));
}



// die(var_dump("no cheßcks"));
$_SESSION['charId'] = (int)$_GET['char']-1;
$character = find_character($_SESSION['charId'], $template['characters']);
// die(var_dump("character: ", $character));
// $_SESSION['charsJSON'] = $template;
// $_SESSION['character'] = $character;
// die(var_dump($character['slug']));

?>

<section id="inputFields">
    <h1>Personallity</h1>

    <form action="save.php" method="POST" class="personallityFields">
        <input type="hidden" name="name" value="<?= $character['name'] ?>">
        <section>
            <h2 class="fieldLabel">Race</h2>

            <!-- Race -->
            <select name="race" id="race">
                <option <?php if (isset($character['personallity']['race']) && $character['personallity']['race'] === "cathar") echo "selected" ?> value="cathar">Cathar</option>
                <option <?php if (isset($character['personallity']['race']) && $character['personallity']['race'] === "chiss") echo "selected" ?> value="chiss">Chiss</option>
                <option <?php if (isset($character['personallity']['race']) && $character['personallity']['race'] === "cyborg") echo "selected" ?> value="cyborg">Cyborg</option>
                <option <?php if (isset($character['personallity']['race']) && $character['personallity']['race'] === "human") echo "selected" ?> value="human">Human</option>
                <option <?php if (isset($character['personallity']['race']) && $character['personallity']['race'] === "mirialan") echo "selected" ?> value="mirialan">Mirialan</option>
                <option <?php if (isset($character['personallity']['race']) && $character['personallity']['race'] === "twilek") echo "selected" ?> value="twilek">Twi'lek</option>
                <option <?php if (isset($character['personallity']['race']) && $character['personallity']['race'] === "togruta") echo "selected" ?> value="togruta">Togruta</option>
                <option <?php if (isset($character['personallity']['race']) && $character['personallity']['race'] === "zabrack") echo "selected" ?> value="zabrack">Zabrack</option>
            </select>
        </section>

        <!-- Gender -->
        <section>
            <h2 class="fieldLabel">Gender</h2>

            <div>
                <input type="radio" id="male" name="gender" value="male" <?php if (isset($character['personallity']['gender']) && $character['personallity']['gender'] === "male") echo "checked" ?>>
                <label for="male">M</label>
            </div>

            <div>
                <input type="radio" id="female" name="gender" value="female" <?php if (isset($character['personallity']['gender']) && $character['personallity']['gender'] === "female") echo "checked" ?>>
                <label for="female">F</label>
            </div>

            <div>
                <input type="radio" id="na" name="gender" value="na" <?php if (isset($character['personallity']['gender']) && $character['personallity']['gender'] === "na") echo "checked" ?>>
                <label for="na">?</label>
            </div>
        </section>

        <!-- Hobby -->
        <section>
            <h2 class="fieldLabel">Hobby</h2>

            <select name="hobby" id="hobby">
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "driving") echo "selected" ?> value="driving">Drving</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "engineering") echo "selected" ?> value="engineering">Engineering</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "flying") echo "selected" ?> value="flying">Flying</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "gambling") echo "selected" ?> value="gambling">Gambling</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "hunting") echo "selected" ?> value="hunting">Hunting</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "performing") echo "selected" ?> value="perfoming">Perfoming</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "programming") echo "selected" ?> value="programming">Programming</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "reading") echo "selected" ?> value="reading">Reading</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "shooting") echo "selected" ?> value="shooting">Shooting</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "slicing") echo "selected" ?> value="slicing">Slicing</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "sparring") echo "selected" ?> value="sparring">Sparring</option>
                <option <?php if (isset($character['personallity']['hobby']) && $character['personallity']['hobby'] === "whatever") echo "selected" ?> value="whatever">Whatever</option>
            </select>
        </section>

        <!-- Profession -->
        <section>
            <h2 class="fieldLabel">Profession</h2>

            <select name="profession" id="profession">
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "bountyHunter") echo "selected" ?> value="bountyHunter">Bounty Hunter</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "cook") echo "selected" ?> value="cook">Cook</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "craftsman") echo "selected" ?> value="craftsman">Craftsman</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "engineer") echo "selected" ?> value="engineer">Engineer</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "fighter") echo "selected" ?> value="fighter">Fighter</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "infobroker") echo "selected" ?> value="infobroker">Infobroker</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "medic") echo "selected" ?> value="medic">Medic</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "merchant") echo "selected" ?> value="merchant">Merchant</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "mercinary") echo "selected" ?> value="mercinary">Mercinary</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "pilot") echo "selected" ?> value="pilot">Pilot</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "slicer") echo "selected" ?> value="slicer">Slicer</option>
                <option <?php if (isset($character['personallity']['profession']) && $character['personallity']['profession'] === "smuggler") echo "selected" ?> value="smuggler">Smuggler</option>
            </select>
        </section>

        <!-- Primary Weapon(s) -->
        <section>
            <h2 class="fieldLabel">Primary Weapon(s)</h2>

            <select name="primeWeapon" id="primeWeapon">
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "blasters") echo "selected" ?> value="blasters">Blaster(s)</option>
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "blasterRifel") echo "selected" ?> value="blasterRifel">Blaster Rifel</option>
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "blunt") echo "selected" ?> value="blunt">Blunt</option>
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "brawling") echo "selected" ?> value="brawling">Brawling</option>
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "explosives") echo "selected" ?> value="explosives">Explosives</option>
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "grandes") echo "selected" ?> value="granades">Granades</option>
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "missle") echo "selected" ?> value="missile">Missile</option>
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "piercing") echo "selected" ?> value="piercing">Piercing</option>
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "slashing") echo "selected" ?> value="slashing">Slashing</option>
                <option <?php if (isset($character['personallity']['primaryWeapons']) && $character['personallity']['primaryWeapons'] === "slugThrower") echo "selected" ?> value="slugThrower">Slug thrower</option>
            </select>
        </section>

        <!-- Secondary Weapon(s) -->
        <section>
            <h2 class="fieldLabel">Secondary Weapon(s)</h2>

            <select name="secWeapon" id="secWeapon">
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "blasters") echo "selected" ?> value="blasters">Blaster(s)</option>
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "blasterRifel") echo "selected" ?> value="blasterRifel">Blaster Rifel</option>
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "blunt") echo "selected" ?> value="blunt">Blunt</option>
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "brawling") echo "selected" ?> value="blunt">Brawling</option>
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "explosives") echo "selected" ?> value="explosives">Explosives</option>
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "grandes") echo "selected" ?> value="granades">Granades</option>
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "missle") echo "selected" ?> value="missile">Missile</option>
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "piercing") echo "selected" ?> value="piercing">Piercing</option>
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "slashing") echo "selected" ?> value="slashing">Slashing</option>
                <option <?php if (isset($character['personallity']['secondaryWeapons']) && $character['personallity']['secondaryWeapons'] === "slugThrower") echo "selected" ?> value="slugThrower">Slug thrower</option>
            </select>
        </section>

        <section class="navigation">
            <a disabled style="opacity:0.0" href="" class="button yellowBtn">&lt;<?= $previousPage; ?></a>
            <button type="button" class="cancelBtn">X</button>
            <input type="hidden" name="nextPage" value="next" />
            <button name="personalityForm" value="<?= $character['name'] ?>" class="button greenBtn"><?= $nextPage; ?> &gt;</button>
        </section>
    </form>
</section>

<section id="infoBox">

</section>

<?php

include __DIR__ . "/../../views/footer.php";

?>