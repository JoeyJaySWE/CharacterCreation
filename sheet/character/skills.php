<?php
session_start();
// ----------------- [ PAGE VARIABLES ] ------------------

$page_title = "Crew Sheets - skills";
$styleMobile = "../../styles/css/default.css";
$styleDesktop = "../../styles/css/desktop.css";
$userId = $_SESSION['userId'];


// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// -------------------[ NAVIGATIONAL DATA ]-----------------------

$previousPageUrl = "stats.php";
$previousPage = "Stats";
$nextPageUrl = "inventory.php";
$nextPage = "Ineventory";
include __DIR__ . "/../../views/header.php";

// ----------------------------------------------------------------

// ----------------- [ LOAD CHARCATER ] ------------------

$template = file_get_contents($characterJSON);
$template = json_decode($template, true);
// die(var_dump($_SESSION['charId']));
// $characterName =
$character = $template['characters'][$_SESSION['charId']];

// ----------------------------------------------------------------

$statsData = file_get_contents('../../app/JS/stats.json');
// var_dump($statsData);
$stats = json_decode($statsData, true);
// die(var_dump($stats->knowledge->skills));

$dexD = $character['stats']['dexterity']['dice'];
$dexPips = $character['stats']['dexterity']['pips'];
$knowD = $character['stats']['knowledge']['dice'];
$knowPips = $character['stats']['knowledge']['pips'];
$mechD = $character['stats']['mechanical']['dice'];
$mechPips = $character['stats']['mechanical']['pips'];
$percD = $character['stats']['perception']['dice'];
$percPips = $character['stats']['perception']['pips'];
$strD = $character['stats']['strength']['dice'];
$strPips = $character['stats']['strength']['pips'];
$techD = $character['stats']['technical']['dice'];
$techPips = $character['stats']['technical']['pips'];

$dexteritySkills = $stats["dexterity"]["skills"];
$knowledgeSkills = $stats["knowledge"]["skills"];
$mechanicalSkills = $stats["mechanical"]["skills"];
$perceptionSkills = $stats["perception"]["skills"];
$strengthSkills = $stats["strength"]["skills"];
$technicalSkills = $stats["technical"]["skills"];



?>

<section id="inputFields">
    <h1>Skills</h1>

    <form action="save.php" name="skillsForm" method="POST" class="skillsFields">

        <!-- Dexterity -->
        <details>
            <summary class="defaultBtn button">Dexterity<span><?= $dexD ?>D + <?= $dexPips ?></span></summary>
            <?php if (sizeof($character['stats']['dexterity']['skills']) > 1) : ?>
                <section class="loadedDexSkills">
                    <?php foreach ($character['stats']['dexterity']['skills'] as $skill) :
                        if ($skill['name'] === "") {
                            continue;
                        }


                    ?>

                        <section>
                            <select class="fieldLabel" name="dexSkill[]">
                                <?php
                                get_skills_dropdown_menu($dexteritySkills, $skill['name']);
                                ?>
                            </select>
                            <section class="statsVlues">
                                <span class="dValue">
                                    <input name="dexSkillDice[]" value="<?= $skill['dice'] ?>" type="number" min="0">
                                    D
                                </span>
                                +
                                <input name="dexSkillPips[]" class="pipValue" value="<?= $skill['pips'] ?>" type="number" max="2" min="0">
                                <button type="button" class="cancelBtn">X</button>
                            </section>
                            <input type="text" name="specDexName[]" <?php if ($skill['specName'] !== "") {
                                                                        echo "style='display:flex;'";
                                                                    } ?> value="<?= $skill['specName'] ?>" placeholder="Speclization..." class="specName">
                            <section class="specilized">

                                <h2 class="fieldLabel">Specialized?</h2>
                                <input type="checkbox" <?php if ($skill['specialized'] === true) {
                                                            echo "checked ";
                                                        } ?> name="speclizedDex[]">
                            </section>
                        </section>
                    <?php
                    endforeach; ?>
                </section>
            <?php endif; ?>

            <section class="templateDex">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($dexteritySkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" class="diceValue" value="0" type="number" min="0">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button type="button" class="cancelBtn">X</button>
                </section>
                <input type="text" name="specDexName[]" placeholder="Speclization..." class="specName">
                <section class="specilized">

                    <h2 class="fieldLabel">Specialized?</h2>
                    <input type="checkbox" name="speclizedDex[]">
                </section>
            </section>
            <button type="button" name="addDexSkill" class="button greenBtn">+ Add</button>
        </details>

        <!-- Knowledge -->
        <details>
            <summary class="defaultBtn button">Knowledge<span><?= $knowD ?>D + <?= $knowPips ?></span></summary>
            <?php if (sizeof($character['stats']['knowledge']['skills']) > 1) : ?>
                <section class="loadedKnowSkills">
                    <?php foreach ($character['stats']['knowledge']['skills'] as $skill) :
                        if ($skill['name'] === "") {
                            continue;
                        }


                    ?>

                        <section>
                            <select class="fieldLabel" name="knowSkill[]">
                                <?php
                                get_skills_dropdown_menu($knowledgeSkills, $skill['name']);
                                ?>
                            </select>
                            <section class="statsVlues">
                                <span class="dValue">
                                    <input name="knowSkillDice[]" value="<?= $skill['dice'] ?>" type="number" min="0">
                                    D
                                </span>
                                +
                                <input name="knowSkillPips[]" class="pipValue" value="<?= $skill['pips'] ?>" type="number" max="2" min="0">
                                <button type="button" class="cancelBtn">X</button>
                            </section>
                            <input type="text" name="specKnowName[]" <?php if ($skill['specName'] !== "") {
                                                                        echo "style='display:flex;'";
                                                                    } ?> value="<?= $skill['specName'] ?>" placeholder="Speclization..." class="specName">
                            <section class="specilized">

                                <h2 class="fieldLabel">Specialized?</h2>
                                <input type="checkbox" <?php if ($skill['specialized'] === true) {
                                                            echo "checked ";
                                                        } ?> name="speclizedDex[]">
                            </section>
                        </section>
                    <?php
                    endforeach; ?>
                </section>
            <?php endif; ?>

            <section class="templateKnow">
                <select class="fieldLabel" name="knowSkill1">
                    <?php
                    get_skills_dropdown_menu($knowledgeSkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="know1DValue" class="diceValue" value="0" type="number" min="0">
                        D
                    </span>
                    +
                    <input name="know1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button type="button" class="cancelBtn">X</button>
                </section>
                <input type="text" name="specKnowName[]" placeholder="Speclization..." class="specName">
                <section class="specilized">

                    <h2 class="fieldLabel">Specialized?</h2>
                    <input type="checkbox" name="speclizedKnow[]">
                </section>
            </section>

            <button type="button" name="addKnowSkill" class="button greenBtn">+ Add</button>
        </details>

        <!-- Mechanical -->
        <details>
            <summary class="defaultBtn button">Mechanical<span><?= $mechD ?>D + <?= $mechPips ?></span></summary>
            <?php if (sizeof($character['stats']['mechanical']['skills']) > 1) : ?>
                <section class="loadedMechSkills">
                    <?php foreach ($character['stats']['mechanical']['skills'] as $skill) :
                        if ($skill['name'] === "") {
                            continue;
                        }



                    ?>

                        <section>
                            <select class="fieldLabel" name="mechSkill[]">
                                <?php
                                get_skills_dropdown_menu($mechanicalSkills, $skill['name']);
                                ?>
                            </select>
                            <section class="statsVlues">
                                <span class="dValue">
                                    <input name="mechSkillDice[]" value="<?= $skill['dice'] ?>" type="number" min="0">
                                    D
                                </span>
                                +
                                <input name="mechSkillPips[]" class="pipValue" value="<?= $skill['pips'] ?>" type="number" max="2" min="0">
                                <button type="button" class="cancelBtn">X</button>
                            </section>
                            <input type="text" name="specMechName[]" <?php if ($skill['specName'] !== "") {
                                                                            echo "style='display:flex;'";
                                                                        } ?> value="<?= $skill['specName'] ?>" placeholder="Speclization..." class="specName">
                            <section class="specilized">

                                <h2 class="fieldLabel">Specialized?</h2>
                                <input type="checkbox" <?php if ($skill['specialized'] === true) {
                                                            echo "checked ";
                                                        } ?> name="speclizedMech[]">
                            </section>
                        </section>
                    <?php
                    endforeach; ?>
                </section>
            <?php endif; ?>
            <section class="templateMech">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($mechanicalSkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" class="diceValue" value="0" type="number" min="0">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button type="button" class="cancelBtn">X</button>
                </section>
                <input type="text" name="specMechName[]" placeholder="Speclization..." class="specName">
                <section class="specilized">

                    <h2 class="fieldLabel">Specialized?</h2>
                    <input type="checkbox" name="speclizedMech[]">
                </section>
            </section>
            <button type="button" name="addMechSkill" class="button greenBtn">+ Add</button>
        </details>

        <!-- Perception -->
        <details>
            <summary class="defaultBtn button">Perception<span><?= $percD ?>D + <?= $percPips ?></span></summary>
            <?php if (sizeof($character['stats']['perception']['skills']) > 1) : ?>

                <section class="loadedPercSkills">
                    <?php foreach ($character['stats']['perception']['skills'] as $skill) :
                        if ($skill['name'] === "") {
                            continue;
                        }

                    ?>

                        <section>
                            <select class="fieldLabel" name="percSkill[]">
                                <?php
                                get_skills_dropdown_menu($perceptionSkills, $skill['name']);
                                ?>
                            </select>
                            <section class="statsVlues">
                                <span class="dValue">
                                    <input name="percSkillDice[]" value="<?= $skill['dice'] ?>" type="number" min="0">
                                    D
                                </span>
                                +
                                <input name="percSkillPips[]" class="pipValue" value="<?= $skill['pips'] ?>" type="number" max="2" min="0">
                                <button type="button" class="cancelBtn">X</button>
                            </section>
                            <input type="text" name="specPercName[]" <?php if ($skill['specName'] !== "") {
                                                                            echo "style='display:flex;'";
                                                                        } ?> value="<?= $skill['specName'] ?>" placeholder="Speclization..." class="specName">
                            <section class="specilized">

                                <h2 class="fieldLabel">Specialized?</h2>
                                <input type="checkbox" <?php if ($skill['specialized'] === true) {
                                                            echo "checked ";
                                                        } ?> name="speclizedPerc[]">
                            </section>
                        </section>
                    <?php
                    endforeach; ?>
                </section>
            <?php endif; ?>
            <section class="templatePerc">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($perceptionSkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" class="diceValue" value="0" type="number" min="0">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button type="button" class="cancelBtn">X</button>
                </section>
                <input type="text" name="specPercName[]" placeholder="Speclization..." class="specName">
                <section class="specilized">

                    <h2 class="fieldLabel">Specialized?</h2>
                    <input type="checkbox" name="speclizedPerc[]">
                </section>
            </section>
            <button type="button" name="addPercSkill" class="button greenBtn">+ Add</button>
        </details>

        <!-- Strength -->
        <details>
            <summary class="defaultBtn button">Strength<span><?= $strD ?>D + <?= $strPips ?></span></summary>
            <?php if (sizeof($character['stats']['strength']['skills']) > 1) : ?>
                <section class="loadedStrSkills">
                    <?php foreach ($character['stats']['strength']['skills'] as $skill) :
                        if ($skill['name'] === "") {
                            continue;
                        }


                    ?>

                        <section>
                            <select class="fieldLabel" name="strSkill[]">
                                <?php
                                get_skills_dropdown_menu($strengthSkills, $skill['name']);
                                ?>
                            </select>
                            <section class="statsVlues">
                                <span class="dValue">
                                    <input name="strSkillDice[]" value="<?= $skill['dice'] ?>" type="number" min="0">
                                    D
                                </span>
                                +
                                <input name="strSkillPips[]" class="pipValue" value="<?= $skill['pips'] ?>" type="number" max="2" min="0">
                                <button type="button" class="cancelBtn">X</button>
                            </section>
                            <input type="text" name="specStrName[]" <?php if ($skill['specName'] !== "") {
                                                                        echo "style='display:flex;'";
                                                                    } ?> value="<?= $skill['specName'] ?>" placeholder="Speclization..." class="specName">
                            <section class="specilized">

                                <h2 class="fieldLabel">Specialized?</h2>
                                <input type="checkbox" <?php if ($skill['specialized'] === true) {
                                                            echo "checked ";
                                                        } ?> name="speclizedDex[]">
                            </section>
                        </section>
                    <?php
                    endforeach; ?>
                </section>
            <?php endif; ?>
            <section class="templateStr">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($strengthSkills);
                    ?>
                </select>

                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" class="diceValue" value="0" type="number" min="0">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button type="button" class="cancelBtn">X</button>
                </section>
                <input type="text" name="specStrName[]" placeholder="Speclization..." class="specName">
                <section class="specilized">

                    <h2 class="fieldLabel">Specialized?</h2>
                    <input type="checkbox" name="speclizedStr[]">
                </section>
            </section>
            <button type="button" name="addStrSkill" class="button greenBtn">+ Add</button>
        </details>

        <!-- Technical -->
        <details>
            <summary class="defaultBtn button">Technical<span><?= $techD ?>D + <?= $techPips ?></span></summary>
            <?php if (sizeof($character['stats']['technical']['skills']) > 1) : ?>
                <section class="loadedTechSkills">
                    <?php foreach ($character['stats']['technical']['skills'] as $skill) :
                        if ($skill['name'] === "") {
                            continue;
                        }


                    ?>

                        <section>
                            <select class="fieldLabel" name="techSkill[]">
                                <?php
                                get_skills_dropdown_menu($technicalSkills, $skill['name']);
                                ?>
                            </select>
                            <section class="statsVlues">
                                <span class="dValue">
                                    <input name="techSkillDice[]" value="<?= $skill['dice'] ?>" type="number" min="0">
                                    D
                                </span>
                                +
                                <input name="techSkillPips[]" class="pipValue" value="<?= $skill['pips'] ?>" type="number" max="2" min="0">
                                <button type="button" class="cancelBtn">X</button>
                            </section>
                            <input type="text" name="specTechName[]" <?php if ($skill['specName'] !== "") {
                                                                            echo "style='display:flex;'";
                                                                        } ?> value="<?= $skill['specName'] ?>" placeholder="Speclization..." class="specName">
                            <section class="specilized">

                                <h2 class="fieldLabel">Specialized?</h2>
                                <input type="checkbox" <?php if ($skill['specialized'] === true) {
                                                            echo "checked ";
                                                        } ?> name="speclizedTech[]">
                            </section>
                        </section>
                    <?php
                    endforeach; ?>
                </section>
            <?php endif; ?>
            <section class="templateTech">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($technicalSkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" class="diceValue" value="0" type="number" min="0">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button type="button" class="cancelBtn">X</button>
                </section>
                <input type="text" name="specTechName[]" placeholder="Speclization..." class="specName">
                <section class="specilized">

                    <h2 class="fieldLabel">Specialized?</h2>
                    <input type="checkbox" name="speclizedTech[]">
                </section>
            </section>
            <button type="button" name="addTechSkill" class="button greenBtn">+ Add</button>
        </details>

        <section style="display: none">
            <label for="forceUser">Force user?</label>
            <input type="checkbox" name="forcie" style='margin-right:80px' />
        </section>

        <!-- Controll -->
        <details style="display:none">
            <summary class="defaultBtn button">Controll<span></span></summary>
            <section style="color:aqua">
                <input type="text" name="controlSkill1" placeholder="Skill1">
                <span class="fieldLabel">
                    <input type="checkbox" value="specialacrobatic">
                    Specialised Skill?
                </span>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="control1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="control1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Sence -->
        <details style="display:none">
            <summary class="defaultBtn button">Sence<span></span></summary>
            <section style="color:aqua">
                <input type="text" name="senceSkill1" placeholder="Skill1">
                <span class="fieldLabel">
                    <input type="checkbox" value="specialacrobatic">
                    Specialised Skill?
                </span>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="sence1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="sence1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Alter -->
        <details style="display:none">
            <summary class="defaultBtn button">Alter<span></span></summary>
            <section style="color:aqua">
                <input type="text" name="alterSkill1" placeholder="Skill1">
                <span class="fieldLabel">
                    <input type="checkbox" value="specialacrobatic">
                    Specialised Skill?
                </span>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="alter1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="alter1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>


        <span class="info dicePool">
            <h2 class="fieldLabel">Dice Pool: </h2>
            <input type="number" value="7"> D,
            <input type="number" value="2"> Pips
        </span>

        <section class="navigation">
            <button name="skillsForm" class="button yellowBtn">&lt;<?= $previousPage; ?></button>
            <button name="skillsForm" type="button" class="cancelBtn">X</button>
            <input type="hidden" name="nextPage" value="next" />
            <button name="skillsForm" class="button greenBtn"><?= $nextPage; ?> &gt;</button>
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