<?php
session_start();

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - Stats";
$style = "../../styles/css/default.css";
$userName = $_SESSION['user'];
$userId = $_SESSION['userId'];


// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

include __DIR__ . "/../../views/header.php";

// -------------------[ NAVIGATIONAL DATA ]-----------------------

$previousPageUrl = "personallity.php";
$previousPage = "Personallity";
$nextPageUrl = "skills.php";
$nextPage = "Skills";

// ----------------------------------------------------------------

// ----------------- [ LOAD CHARCATER ] ------------------ 

$template = file_get_contents($characterJSON);
$template = json_decode($template, true);
$character = $template[$_SESSION['userId']]['characters'][$_SESSION['charId']];

// ----------------------------------------------------------------



// die(print_r($character['personallity']));


?>

<section id="inputFields">
    <h1>Stats</h1>

    <form action="save.php" method="POST" class="statsFields">
        <input type="hidden" name="name" value="<?= $character['name'] ?>">

        <!-- Dexterity -->
        <section>
            <label class="fieldLabel" for="">Dexterity</label>
            <section class="statsVlues">
                <span>
                    <input name="dexDValue" value="<?= $character['stats']['dexterity']['dice'] ?>" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="dexPipValue" value="<?= $character['stats']['dexterity']['pips'] ?>" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Knowledge -->
        <section>
            <label class="fieldLabel" for="">Knowledge</label>
            <section class="statsVlues">
                <span>
                    <input name="knowDValue" value="<?= $character['stats']['knowledge']['dice'] ?>" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="knowPipValue" value="<?= $character['stats']['knowledge']['pips'] ?>" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Mechanical -->
        <section>
            <label class="fieldLabel" for="">Mechanical</label>
            <section class="statsVlues">
                <span>
                    <input name="mechDValue" value="<?= $character['stats']['mechanical']['dice'] ?>" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="mechPipValue" value="<?= $character['stats']['mechanical']['pips'] ?>" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Perception -->
        <section>
            <label class="fieldLabel" for="">Perception</label>
            <section class="statsVlues">
                <span>
                    <input name="percDValue" value="<?= $character['stats']['perception']['dice'] ?>" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="percPipValue" value="<?= $character['stats']['perception']['pips'] ?>" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Strength -->
        <section>
            <label class="fieldLabel" for="">Strength</label>
            <section class="statsVlues">
                <span>
                    <input name="strDValue" value="<?= $character['stats']['strength']['dice'] ?>" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="strPipValue" value="<?= $character['stats']['strength']['pips'] ?>" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Technical -->
        <section>
            <label class="fieldLabel" for="">Technical</label>
            <section class="statsVlues">
                <span>
                    <input name="techDValue" value="<?= $character['stats']['technical']['dice'] ?>" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="techPipValue" value="<?= $character['stats']['technical']['pips'] ?>" type="number" max="2" min="0">
            </section>
        </section>

        <section style="display:none">
            <label for="forceUser">Force user?</label>
            <input type="checkbox" name="forcie" style='margin-right:80px' />
        </section>

        <!-- Controll -->
        <section class="forceUserStats" style="display:none">

            <section>
                <label class="fieldLabel" for="">Controll</label>
                <section class="statsVlues">
                    <span>
                        <input name="controllDValue" value="2" type="number" max="4" min="2">
                        D
                    </span>
                    +
                    <input name="controllPipValue" value="0" type="number" max="2" min="0">
                </section>
            </section>

            <!-- Sence -->
            <section>
                <label class="fieldLabel" for="">Sence</label>
                <section class="statsVlues">
                    <span>
                        <input name="senceDValue" value="2" type="number" max="4" min="2">
                        D
                    </span>
                    +
                    <input name="sencePipValue" value="0" type="number" max="2" min="0">
                </section>
            </section>

            <!-- Alter -->
            <section>
                <label class="fieldLabel" for="">Alter</label>
                <section class="statsVlues">
                    <span>
                        <input name="alterDValue" value="2" type="number" max="4" min="2">
                        D
                    </span>
                    +
                    <input name="alterPipValue" value="0" type="number" max="2" min="0">
                </section>
            </section>
        </section>

        <span class="info dicePool">
            <h2 class="fieldLabel">Dice Pool: </h2>
            <input type="number" value="7"> D,
            <input type="number" value="2"> Pips
        </span>

        <section class="navigation">
            <button name="statsForm" class="button yellowBtn">&lt;<?= $previousPage; ?></button>
            <button name="statsForm" type="button" class="cancelBtn">X</button>
            <input type="hidden" name="nextPage" value="next" />
            <button name="statsForm" value="<?= $character['name'] ?>" class="button greenBtn"><?= $nextPage; ?> &gt;</button>
        </section>
    </form>
</section>

<section id="infoBox">
    <div class="visualData">
        <section class="pool">
            <span>7D</span>
            <span>D</span>
        </section>
        <img class="infoImg" src="https://via.placeholder.com/70x80/" alt="info image" />
        <section class="pool">
            <span>2</span>
            <span>Pips</span>
        </section>
    </div>
    <p class="infoText">
        An example text just to allow me to see how much space I might need for this functions.
    </p>
</section>

<?php

include __DIR__ . "/../../views/footer.php";

?>