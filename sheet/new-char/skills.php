<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - skills";
$style = "../../styles/css/default.css";
$userName = "Raas/Joya (Gsus)";

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

// ----------------------------------------------------------------


$statsData = file_get_contents('../../app/JS/stats.json');
// var_dump($statsData);
$stats = json_decode($statsData, true);
// die(var_dump($stats->knowledge->skills));

$dexteritySkills = $stats["dexterity"]["skills"];
$knowledgeSkills = $stats["knowledge"]["skills"];
$mechanicalSkills = $stats["mechanical"]["skills"];
$perceptionSkills = $stats["perception"]["skills"];
$strengthSkills = $stats["strength"]["skills"];
$technicalSkills = $stats["technical"]["skills"];

include __DIR__ . "/../../views/header.php";


?>

<section id="inputFields">
    <h1>Skills</h1>

    <form action="skills.php" method="POST" class="skillsFields">

        <!-- Dexterity -->
        <details>
            <summary class="defaultBtn button">Dexterity<span></span></summary>
            <section>
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($dexteritySkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <section>
                <select class="fieldLabel" name="dexSkill2">
                    <option value="acrobatic">
                        Acrobatic
                    </option>
                    <option value="archaicGuns">
                        Archaic Guns
                    </option>
                    <option value="artillery">
                        Artillery
                    </option>
                    <option value="blasters">
                        Blasters
                    </option>
                    <option value="blasterArtillery">
                        Blaster Artillery
                    </option>
                    <option value="bowcaster">
                        Bowcaster
                    </option>
                    <option value="bows">
                        Bows
                    </option>
                    <option value="brawlingParry">
                        Brawling Parry
                    </option>
                    <option value="dodge">
                        Dodge
                    </option>
                    <option value="firearms">
                        Firearms
                    </option>
                    <option value="flamethrower">
                        Flamethrower
                    </option>
                    <option value="granade">
                        Granade
                    </option>
                    <option value="lightsaber">
                        Lightsaber
                    </option>
                    <option value="meeleCombat" selected>
                        Meele Combat
                    </option>
                    <option value="meleeParry">
                        Melee Parry
                    </option>
                    <option value="missleWeapons">
                        Missle Weapons
                    </option>
                    <option value="pickPocket">
                        Pick Pocket
                    </option>
                    <option value="running">
                        Running
                    </option>
                    <option value="thrownWeapons">
                        Thrown Weapons
                    </option>
                    <option value="vehicleBlasters">
                        Vehicle Blasters
                    </option>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex2DValue" value="4" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="dex2PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Knowledge -->
        <details>
            <summary class="defaultBtn button">Knowledge<span></span></summary>
            <section style="color:aqua">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_skills_dropdown_menu($knowledgeSkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Mechanical -->
        <details>
            <summary class="defaultBtn button">Mechanical<span></span></summary>
            <section style="color:aqua">
                <select class="fieldLabel" name="mechSkill1">
                    <?php
                    get_skills_dropdown_menu($mechanicalSkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="mech1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="mech1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Perception -->
        <details>
            <summary class="defaultBtn button">Perception<span></span></summary>
            <section style="color:aqua">
                <select class="fieldLabel" name="percSkill1">
                    <?php
                    get_skills_dropdown_menu($perceptionSkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="perc1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="perc1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Strength -->
        <details>
            <summary class="defaultBtn button">Strength<span></span></summary>
            <section style="color:aqua">
                <select class="fieldLabel" name="strSkill1">
                    <?php
                    get_skills_dropdown_menu($strengthSkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="str1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="str1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Technical -->
        <details>
            <summary class="defaultBtn button">Technical<span></span></summary>
            <section style="color:aqua">
                <select class="fieldLabel" name="strSkill1">
                    <?php
                    get_skills_dropdown_menu($technicalSkills);
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="tech1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="tech1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                    <button class="cancelBtn">X</button>
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <section>
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


        <section class="navigation">
            <a href="<?= $previousPageUrl; ?>" class="button yellowBtn">&lt; <?= $previousPage; ?></a>
            <a href="../../user.php" class="cancelBtn">X</a>
            <a href="<?= $previousPageUrl; ?>" class="button greenBtn"><?= $nextPage; ?> &gt;</a>
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