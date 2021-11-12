<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - Personallity";
$style = "../../styles/css/default.css";
$userName = "Raas/Joya (Gsus)";
$userId = 1;
$characterJSON = '../../app/JS/characters.json';

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

$template = file_get_contents($characterJSON);
$template = json_decode($template, true);
if (isset($_POST['newSheet'])) {
    // $template = file_get_contents('../../app/JS/characters.json');
    // $template = json_decode($template);
    // $templateData = $template->template;
    // die(var_dump($template));
    // $character[1] = $templateData;
    // array_push($template, $character);

    if (!array_key_exists($userId, $template)) {
        var_dump("didn't find 2");
        $templateData = $template['template'];
        $character = $templateData;
        $template[$userId] = $character;
        $template[$userId]['username'] = $userName;
    } else {
        var_dump("Already exsists");
        $templateData = $template['template']['characters']['emptyChar'];
        $character = $templateData;
        $charId = sizeof($template[$userId]['characters']);
        var_dump($charId);
        $template[$userId]['characters'][$charId] = $character;
        $template[$userId]['characters'][$charId]['slug'] = $charId;
        $template[$userId]['characters'][$charId]['name'] .= " " . $charId + 1;
    }




    // $template[$userId] = $character;
    $jsonData = json_encode($template);
    file_put_contents('../../app/JS/characters.json', $jsonData);
    $characterName = "Character";
} else {
    $characterName = $_POST['character'];
}
$character = find_character($characterName, $template[$userId]['characters']);




?>

<section id="inputFields">
    <h1>Personallity</h1>

    <form action="save.php" method="POST" class="personallityFields">
        <input type="hidden" name="name" value="<?= $character['name'] ?>">
        <section>
            <h2 class="fieldLabel">Race</h2>

            <!-- Race -->
            <select name="race" id="race">
                <option <?php if ($character['personallity']['race'] === "human") echo "selected" ?> value="human">Human</option>
                <option <?php if ($character['personallity']['race'] === "cyborg") echo "selected" ?> value="cyborg">Cyborg</option>
                <option <?php if ($character['personallity']['race'] === "twilek") echo "selected" ?> value="twilek">Twi'lek</option>
                <option <?php if ($character['personallity']['race'] === "zabrack") echo "selected" ?> value="zabrack">Zabrack</option>
                <option <?php if ($character['personallity']['race'] === "mirialan") echo "selected" ?> value="mirialan">Mirialan</option>
                <option <?php if ($character['personallity']['race'] === "chiss") echo "selected" ?> value="chiss">Chiss</option>
                <option <?php if ($character['personallity']['race'] === "togruta") echo "selected" ?> value="togruta">Togruta</option>
                <option <?php if ($character['personallity']['race'] === "cathar") echo "selected" ?> value="cathar">Cathar</option>
            </select>
        </section>

        <!-- Gender -->
        <section>
            <h2 class="fieldLabel">Gender</h2>

            <div>
                <input type="radio" id="male" name="gender" value="male" <?php if ($character['personallity']['gender'] === "male") echo "checked" ?>>
                <label for="male">M</label>
            </div>

            <div>
                <input type="radio" id="female" name="gender" value="female" <?php if ($character['personallity']['gender'] === "female") echo "checked" ?>>
                <label for="female">F</label>
            </div>

            <div>
                <input type="radio" id="na" name="gender" value="na" <?php if ($character['personallity']['gender'] === "na") echo "checked" ?>>
                <label for="na">?</label>
            </div>
        </section>

        <!-- Hobby -->
        <section>
            <h2 class="fieldLabel">Hobby</h2>

            <select name="hobby" id="hobby">
                <option value="slicing">Slicing</option>
                <option value="flying">Flying</option>
                <option value="driving">Drving</option>
                <option value="hunting">Hunting</option>
                <option value="shooting">Shooting</option>
                <option value="engineering">Engineering</option>
                <option value="programming">Programming</option>
                <option value="perfoming">Perfoming</option>
                <option value="reading">Reading</option>
                <option value="gambling">Gambling</option>
                <option value="sparring">Sparring</option>
                <option value="whatever">Whatever</option>
            </select>
        </section>

        <!-- Profession -->
        <section>
            <h2 class="fieldLabel">Profession</h2>

            <select name="profession" id="profession">
                <option value="bountyHunter">Bounty Hunter</option>
                <option value="mercinary">Mercinary</option>
                <option value="smuggler">Smuggler</option>
                <option value="pilot">Pilot</option>
                <option value="merchant">Merchant</option>
                <option value="infobroker">Infobroker</option>
                <option value="fighter">Fighter</option>
                <option value="slicer">Slicer</option>
                <option value="medic">Medic</option>
                <option value="engineer">Engineer</option>
                <option value="cook">Cook</option>
                <option value="craftsman">Craftsman</option>
            </select>
        </section>

        <!-- Primary Weapon(s) -->
        <section>
            <h2 class="fieldLabel">Primary Weapon(s)</h2>

            <select name="primeWeapon" id="primeWeapon">
                <option value="blunt">Blunt</option>
                <option value="piercing">Piercing</option>
                <option value="slashing">Slashing</option>
                <option value="blasters">Blaster(s)</option>
                <option value="blasterRifel">Blaster Rifel</option>
                <option value="slugThrower">Slug thrower</option>
                <option value="missile">Missile</option>
                <option value="explosives">Explosives</option>
                <option value="granades">Granades</option>
            </select>
        </section>

        <!-- Secondary Weapon(s) -->
        <section>
            <h2 class="fieldLabel">Secondary Weapon(s)</h2>

            <select name="secWeapon" id="secWeapon">
                <option value="blunt">Blunt</option>
                <option value="piercing">Piercing</option>
                <option value="slashing">Slashing</option>
                <option value="blasters">Blaster(s)</option>
                <option value="blasterRifel">Blaster Rifel</option>
                <option value="slugThrower">Slug thrower</option>
                <option value="missile">Missile</option>
                <option value="explosives">Explosives</option>
                <option value="granades">Granades</option>
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