<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - Personallity";
$style = "../../styles/css/default.css";
$userName = "Raas/Joya (Gsus)";

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

?>

<section id="inputFields">
    <h1>Personallity</h1>

    <form action="stats.php" method="POST" class="personallityFields">

        <section>
            <h2 class="fieldLabel">Race</h2>

            <!-- Race -->
            <select name="race" id="race">
                <option value="human">Human</option>
                <option value="cyborg">Cyborg</option>
                <option value="twilek">Twi'lek</option>
                <option value="zabrack">Zabrack</option>
                <option value="mirialan">Mirialan</option>
                <option value="chiss">Chiss</option>
                <option value="togruta">Togruta</option>
                <option value="cathar">Cathar</option>
            </select>
        </section>

        <!-- Gender -->
        <section>
            <h2 class="fieldLabel">Gender</h2>

            <div>
                <input type="radio" id="male" name="gender" value="male">
                <label for="male">M</label>
            </div>

            <div>
                <input type="radio" id="female" name="gender" value="female">
                <label for="female">F</label>
            </div>

            <div>
                <input type="radio" id="na" name="gender" value="na">
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
            <a style="opacity:0.0" href="<?= $previousPageUrl; ?>" class="button yellowBtn">&lt;<?= $previousPage; ?></a>
            <a href="../../user.php" class="cancelBtn">X</a>
            <a href="<?= $nextPageUrl; ?>" class="button greenBtn"><?= $nextPage; ?> &gt;</a>
        </section>
    </form>
</section>

<section id="infoBox">

</section>

<?php

include __DIR__ . "/../../views/footer.php";

?>