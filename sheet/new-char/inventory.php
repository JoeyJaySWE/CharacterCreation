<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - Inventory";
$style = "../../styles/css/default.css";
$userName = "Raas/Joya (Gsus)";

// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// -------------------[ NAVIGATIONAL DATA ]-----------------------

$previousPageUrl = "skills.php";
$previousPage = "Skills";
$nextPageUrl = "biography.php";
$nextPage = "Biography";

// ----------------------------------------------------------------


$armorsData = file_get_contents('../../app/JS/armor.json');
$weaponsData = file_get_contents('../../app/JS/weapons.json');
$gearData = file_get_contents('../../app/JS/gear.json');

// var_dump($statsData);
// die(var_dump($stats->knowledge->skills));

$armors = json_decode($armorsData, true);
$weapons = json_decode($weaponsData, true);
$gear = json_decode($gearData, true);


include __DIR__ . "/../../views/header.php";


?>

<section id="inputFields">
    <h1>Inventory</h1>

    <form action="skills.php" method="POST" class="inventoryFields">

        <!-- Armor -->
        <details>
            <summary class="defaultBtn button">Armor</summary>
            <button class="cancelBtn">X</button>
            <details>
                <summary class="defaultBtn subBtn button">Medium Battle Armor<span></span></summary>
                <section style="color:aqua">
                    <select class="fieldLabel" name="armor1">
                        <?php
                        get_armor_dropdown_menu($armors);
                        ?>
                    </select>
                </section>
                <section class="armorStats">
                    <!-- Head -->
                    <section class="headArmor">
                        <h2 class="fieldLabel">Head</h2>
                        <section class="armorValues physical">

                            <span class="dValue">
                                <input name="armor1HeadPhysicalDValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="armor1HeadPhysicalPipValue" class="pipValue" value="0" type="number" max="2" min="0">
                        </section>
                        <section class="armorValues energy">

                            <span class="dValue">
                                <input name="armor1EnergyDValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="armor1HeadEnergyPipValue" class="pipValue" value="0" type="number" max="2" min="0">
                        </section>
                    </section>

                    <!-- Torso -->
                    <section class="torsoArmor">
                        <h2 class="fieldLabel">Torso</h2>
                        <section class="armorValues physical">

                            <span class="dValue">
                                <input name="armor1TorsoPhysicalDValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="armor1TorsoPhysicalPipValue" class="pipValue" value="0" type="number" max="2" min="0">
                        </section>
                        <section class="armorValues energy">

                            <span class="dValue">
                                <input name="armor1TorsoEnergyDValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="armor1TorsoEnergyPipValue" class="pipValue" value="0" type="number" max="2" min="0">
                        </section>
                    </section>

                    <!-- Arms -->
                    <section class="armsArmor">
                        <h2 class="fieldLabel">Arms</h2>
                        <section class="armorValues physical">

                            <span class="dValue">
                                <input name="armor1ArmsPhysicalDValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="armor1ArmsPhysicalPipValue" class="pipValue" value="0" type="number" max="2" min="0">
                        </section>
                        <section class="armorValues energy">

                            <span class="dValue">
                                <input name="armor1ArmsEnergyDValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="armor1ArmsEnergyPipValue" class="pipValue" value="0" type="number" max="2" min="0">
                        </section>
                    </section>

                    <!-- Legs -->
                    <section class="legArmor">
                        <h2 class="fieldLabel">Legs</h2>
                        <section class="armorValues physical">

                            <span class="dValue">
                                <input name="armor1LegsPhysicalDValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="armor1LegsPhysicalPipValue" class="pipValue" value="0" type="number" max="2" min="0">
                        </section>
                        <section class="armorValues energy">

                            <span class="dValue">
                                <input name="armor1LegsEnergyDValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="armor1LegsEnergyPipValue" class="pipValue" value="0" type="number" max="2" min="0">
                        </section>
                    </section>
                </section>
            </details>
            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Weapons -->
        <details>
            <summary class="defaultBtn button">Weapons</summary>
            <section class="subBtnSection">
                <button class="cancelBtn">X</button>
                <details>
                    <summary class="defaultBtn subBtn button">Fragmentation Granade<span></span></summary>
                    <section style="color:aqua">
                        <section class="statsVlues">

                            <?php get_weapons_data($weapons, $weapons['explosives']['weapons']['fragGrande']['name']); ?>
                            <!-- <span class="dValue">
                                <input name="dex1DValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                            <button class="cancelBtn">X</button> -->
                        </section>
                    </section>
                </details>
            </section>

            <section class="subBtnSection">
                <button class="cancelBtn">X</button>
                <details>
                    <summary class="defaultBtn subBtn button">Explosive Charge<span></span></summary>
                    <section style="color:aqua">
                        <section class="statsVlues">

                            <?php get_weapons_data($weapons, $weapons['explosives']['weapons']['exlosiveChrage']['name']); ?>
                            <!-- <span class="dValue">
                                <input name="dex1DValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                            <button class="cancelBtn">X</button> -->
                        </section>
                    </section>
                </details>
            </section>
            <!-- Spear -->
            <section class="subBtnSection">
                <button class="cancelBtn">X</button>
                <details>
                    <summary class="defaultBtn subBtn button">Spear<span></span></summary>
                    <section style="color:aqua">
                        <section class="statsVlues">

                            <?php get_weapons_data($weapons, $weapons['melee']['weapons']['spear']['name']); ?>
                            <!-- <span class="dValue">
                                <input name="dex1DValue" value="3" type="number" min="2">
                                D
                            </span>
                            +
                            <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                            <button class="cancelBtn">X</button> -->
                        </section>
                    </section>
                </details>
            </section>

            <!-- Vibrosword -->
            <section class="subBtnSection">
                <button class="cancelBtn">X</button>
                <details>
                    <summary class="defaultBtn subBtn button">Vibroblade<span></span></summary>
                    <section style="color:aqua">
                        <section class="statsVlues">

                            <?php get_weapons_data($weapons, $weapons['melee']['weapons']['vibroblade']['name']); ?>
                        </section>
                    </section>
                </details>
            </section>
            <!-- Blaster Pistol -->
            <section class="subBtnSection">
                <button class="cancelBtn">X</button>
                <details>
                    <summary class="defaultBtn subBtn button">Blaster Pistol<span></span></summary>
                    <section style="color:aqua">
                        <section class="statsVlues">

                            <?php get_weapons_data($weapons, $weapons['blasters']['weapons']['blasterPistol']['name']); ?>

                        </section>
                    </section>
                </details>
            </section>

            <!-- Custom -->
            <section class="subBtnSection">
                <button class="cancelBtn">X</button>
                <details>
                    <summary class="defaultBtn subBtn button">Xantha<span></span></summary>
                    <section style="color:aqua">
                        <section class="statsVlues">

                            <?php get_weapons_data($weapons, $weapons['custom']['weapon']['name']); ?>

                        </section>
                    </section>
                </details>
            </section>
            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Field Gear -->
        <details>
            <summary class="defaultBtn button">Field Gear</summary>
            <button class="cancelBtn">X</button>
            <span class="amount">
                x
                <input type="number" value="1" />
            </span>
            <section class="gearSection">
                <details>
                    <?php $item = find_gear("Jet Pack", $gear);

                    // $jsonString = json_encode($string);
                    // var_dump(json_decode($jsonString), "test");
                    load_gear_data($item);
                    ?>

                </details>

            </section>
            <button class="cancelBtn">X</button>
            <span class="amount">
                x
                <input type="number" value="1" />
            </span>
            <section class="gearSection">
                <details>
                    <?php $item = find_gear("Medpac", $gear);

                    // $jsonString = json_encode($string);
                    // var_dump(json_decode($jsonString), "test");
                    load_gear_data($item);
                    ?>
                </details>
            </section>
            <section class="addGear">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_gears_dropdown_menu($gear, "Custom Gear");
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>

        <!-- Personal Gear -->
        <details class="personalGear">
            <summary class="defaultBtn button">Personal Gear</summary>
            <button class="cancelBtn">X</button>
            <span class="amount">
                x
                <input type="number" value="1" />
            </span>
            <section class="gearSection">
                <details>
                    <?php $item = find_gear("Standard Tool Kit", $gear);

                    // $jsonString = json_encode($string);
                    // var_dump(json_decode($jsonString), "test");
                    load_gear_data($item);
                    ?>

                </details>

            </section>
            <section class="addGear">
                <select class="fieldLabel" name="dexSkill1">
                    <?php
                    get_gears_dropdown_menu($gear, "Custom Gear");
                    ?>
                </select>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="dex1DValue" value="3" type="number" min="2">
                        D
                    </span>
                    +
                    <input name="dex1PipValue" class="pipValue" value="0" type="number" max="2" min="0">
                </section>
            </section>

            <button class="button greenBtn">+ Add</button>
        </details>
        <span class="info">
            <h2 class="fieldLabel">Account Balance: </h2>
            <input type="number" value="5000"> Credits
        </span>
        <section class="navigation">
            <a href="<?= $previousPageUrl; ?>" class="button yellowBtn">&lt; <?= $previousPage; ?></a>
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