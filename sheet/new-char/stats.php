<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - Stats";
$style = "../../styles/css/default.css";
$userName = "Raas/Joya (Gsus)";

// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// -------------------[ NAVIGATIONAL DATA ]-----------------------

$previousPageUrl = "personallity.php";
$previousPage = "Personallity";
$nextPageUrl = "skills.php";
$nextPage = "Skills";

// ----------------------------------------------------------------





include __DIR__ . "/../../views/header.php";

?>

<section id="inputFields">
    <h1>Stats</h1>

    <form action="skills.php" method="POST" class="statsFields">

        <!-- Dexterity -->
        <section>
            <label class="fieldLabel" for="">Dexterity</label>
            <section class="statsVlues">
                <span>
                    <input name="dexDValue" value="2" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="dexPipValue" value="0" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Knowledge -->
        <section>
            <label class="fieldLabel" for="">Knowledge</label>
            <section class="statsVlues">
                <span>
                    <input name="knowDValue" value="2" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="knowPipValue" value="0" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Mechanical -->
        <section>
            <label class="fieldLabel" for="">Mechanical</label>
            <section class="statsVlues">
                <span>
                    <input name="mechDValue" value="2" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="mechPipValue" value="0" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Perception -->
        <section>
            <label class="fieldLabel" for="">Perception</label>
            <section class="statsVlues">
                <span>
                    <input name="percDValue" value="2" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="percPipValue" value="0" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Strength -->
        <section>
            <label class="fieldLabel" for="">Strength</label>
            <section class="statsVlues">
                <span>
                    <input name="strDValue" value="2" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="strPipValue" value="0" type="number" max="2" min="0">
            </section>
        </section>

        <!-- Technical -->
        <section>
            <label class="fieldLabel" for="">Technical</label>
            <section class="statsVlues">
                <span>
                    <input name="techDValue" value="2" type="number" max="4" min="2">
                    D
                </span>
                +
                <input name="techPipValue" value="0" type="number" max="2" min="0">
            </section>
        </section>

        <section>
            <label for="forceUser">Force user?</label>
            <input type="checkbox" name="forcie" style='margin-right:80px' />
        </section>

        <!-- Controll -->
        <section style="display:none">
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
        <section style="display:none">
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
        <section style="display:none">
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


        <section class="navigation">
            <a href="<?= $previousPageUrl; ?>" class="button yellowBtn">&lt;<?= $previousPage; ?></a>
            <a href="../../user.php" class="cancelBtn">X</a>
            <a href="<?= $nextPageUrl; ?>" class="button greenBtn"><?= $nextPage; ?> &gt;</a>
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