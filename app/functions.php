<?php


function get_skills_dropdown_menu(array $skills, string $selected = null)
{
    foreach ($skills as $skill) :
        var_dump($skill['name'], $selected);

?>
        <option <?php if ($skill['name'] === $selected) {
                    echo "selected ";
                } ?>value="<?= $skill["name"] ?>"><?= $skill["name"] ?></option>
        <!-- <?= $skill["name"] ?> -->
        <br />
        <?php
    endforeach;
}

function get_armor_dropdown_menu(array $menuItems, string $selected = null)
{
    foreach ($menuItems as $armor) :
        if ($armor['name'] === $selected) :    ?>

            <option selected value="<?= $armor["name"] ?>"><?= $armor["name"] ?> &dash; <?= number_format($armor['cost']); ?> credits</option>

        <?php else : ?>
            <option value="<?= $armor["name"] ?>"><?= $armor["name"] ?> &dash; <?= number_format($armor['cost']); ?> credits</option>
        <?php
        endif;
    endforeach;
}

function get_weapons_dropdown_menu(array $menuItems, string $selected = null, string $weaponName = null)
{

    foreach ($menuItems as $weapon) :
        // die(print_r($weapon));
        // echo $weapon["category"];
        // echo "<br>";
        if ($weapon['category'] === "Choose one") :
        ?>
            <option disabled>______________</option>
            <option value="custom">CUSTOM WEAPON</option>
        <?php else : ?>


            <option disabled>&dash;<?= strtoupper($weapon['category']) ?>&dash;</option>
            <?php
        endif;
        foreach ($weapon['weapons'] as $weapon) :
            if ($weapon['name'] === $weaponName || $weapon['name'] === "Custom Weapon") : ?>
                <option selected value="<?= $weapon["name"] ?>"><?= $weapon["name"] ?> &dash; <?= number_format($weapon['cost']); ?> credits</option>
            <?php else : ?>


                <option value="<?= $weapon["name"] ?>"><?= $weapon["name"] ?> &dash; <?= number_format($weapon['cost']); ?> credits</option>
        <?php
            endif;
        endforeach; ?>
        <?php endforeach;
}

function find_weapon($name, $array)
{
    // die(var_dump($name));
    foreach ($array as $category) :
        // die(print_r($category));
        foreach ($category['weapons'] as $key => $weapons) {

            if ($weapons['name'] === $name) {
                return $weapons;
            }
        }
    endforeach;
    return null;
}

function find_armor($name, $array)
{
    // die(var_dump($array));
    foreach ($array as $armor) :
        // die(print_r($category));
        if ($armor['name'] === $name) {
            return $armor;
        }
    endforeach;
    return null;
}
function find_old_armor($name, $armors)
{
    // die(var_dump($armors));
    foreach ($armors['armors'] as $key => $armor) :
        if (sizeof($armor) === 1) {
            continue;
        }
        // var_dump($items['name']);s
        var_dump($armor['name']);

        if ($armor['name'] === $name) {

            return $key;
        }

    endforeach;
}

function find_old_weapon($name, $inventory)
{
    // die(var_dump($armors));
    foreach ($inventory['weapons'] as $key => $weapon) :
        if (sizeof($weapon) === 1) {
            continue;
        }
        // var_dump($items['name']);s
        var_dump($weapon['name']);

        if ($weapon['name'] === $name) {

            return $key;
        }

    endforeach;
}

function get_gears_dropdown_menu(array $menuItems, string $selected = null, string $gearName = null)
{

    foreach ($menuItems as $gear) :
        // die(print_r($menuItems));
        // echo $gear["category"];
        // echo "<br>";
        if ($gear['category'] === "Choose one") :
        ?>
            <option disabled>______________</option>
            <option value="custom">CUSTOM GEAR</option>
        <?php else : ?>


            <option disabled>&dash;<?= strtoupper($gear['category']) ?>&dash;</option>
            <?php
        endif;
        foreach ($gear['items'] as $gear) :
            if ($gear['name'] === $gearName || $gear['name'] === "Custom gear") : ?>
                <option selected value="<?= $gear["name"] ?>"><?= $gear["name"] ?> &dash; <?= number_format($gear['cost']); ?> credits</option>
            <?php else : ?>


                <option value="<?= $gear["name"] ?>"><?= $gear["name"] ?> &dash; <?= number_format($gear['cost']); ?> credits</option>
        <?php
            endif;
        endforeach; ?>
    <?php endforeach;
}
function find_gear($name, $array)
{
    // die(var_dump($name, $array));
    foreach ($array as $category) :
        if ($category['category'] === "Choose one") {
            continue;
        }
        // var_dump(print_r($category) . "<br><br>");
        foreach ($category['items'] as $key => $items) {
            // var_dump($items['name'], "name: " . $name);
            if ($items['name'] === $name) {

                return $items;
            }
        }
    endforeach;
    return null;
}
function find_character($name, $array)
{
    foreach ($array as $character) {
        if ($character['name'] === $name) {
            return $character;
        }
    }
    return null;
}

function load_gear_data($gear)
{
    ?>
    <summary class="defaultBtn subBtn button <?php if (strlen($gear['name']) > 20) {
                                                    echo "threeWrod";
                                                } ?>"><?= $gear['name']; ?></summary>
    <?php if ($gear['gameNote'] !== "") : ?>
        <h2 class="fieldLabel">Game Note:</h2>
        <p>
            <?= $gear['description']; ?>
        </p>
    <?php endif;
    if ($gear['description'] !== "") : ?>
        <h2 class="fieldLabel">Description:</h2>
        <p>
            <?= $gear['description']; ?>
        </p>
        <?php endif;
    if (isset($gear["includes"])) :
        foreach ($gear['includes'] as $key => $incGear) :
            $gearData = file_get_contents('../../app/JS/gear.json');
            $gears = json_decode($gearData, true);
        ?>
            <section class="gearSection">
                <details>
                    <?php if (find_gear($incGear['name'], $gears) !== null) : ?>
                        <?php load_included_gear_data($gears); ?>
                    <?php else :  ?>
                        <summary class="defaultBtn subBtn button disabled <?php if (strlen($gear['name']) > 20) {
                                                                                echo "threeWrod";
                                                                            } ?>"><?= $incGear['name'] ?></summary>
                    <?php endif; ?>
                </details>

                <span class="amount">
                    x
                    <input type="number" value="<?= $incGear['amount'] ?>" />
                </span>
            </section>
    <?php endforeach;
    endif;
}

function load_included_gear_data(array $gear, array $gears = null)
{

    // die(var_dump($gear));
    $gear = find_gear($gear['name'], $gears);
    die(var_dump($gear));
    ?>
    <summary class="defaultBtn subBtn button <?php if (strlen($gear['name']) > 20) {
                                                    echo "threeWrod";
                                                } ?>"><?= $gear['name']; ?></summary>
    <?php
    die(var_dump($gear));
    if ($gear['gameNote'] !== "") : ?>
        <h2 class="fieldLabel">Game Note:</h2>
        <p>
            <?= $gear['description']; ?>
        </p>
    <?php endif;
    if ($gear['description'] !== "") : ?>
        <h2 class="fieldLabel">Description:</h2>
        <p>
            <?= $gear['description']; ?>
        </p>
    <?php endif;
}
function get_weapons_data(array $weapons, string $weapon, array $character, bool $oldWeapon = false, int $i = null)
{

    if ($weapon !== "Custom Weapon") {
        if ($oldWeapon) {
            $weapon = $weapons;
        } else {
            $weapon = find_weapon($weapon, $weapons);
        }
    } else {
        $weapon = $weapons['custom']['weapon'];
    }
    $weaponsAmount = sizeof($character['inventory']['weapons']);


    // die(var_dump($weapon));
    // Expllosive
    // die(var_dump($weapon['type']));
    if ($weapon['type'] === 'explosive') : ?>
        <input type="hidden" value="explosive" name="weaponType[<?= $i ?>]">
        <?php if ($weapon['name'] === "Fragmentation Granade") :
            // die(var_dump($weapon['name']));
        ?>
            <section class="grandeData">
                <!-- PRICE -->
                <section>
                    <label class="fieldLabel">Price:</label>
                    <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
                </section>

                <!-- SKILLS -->
                <section>
                    <label class="fieldLabel">Skills Required:</label>
                    <div class="weaponSkills">
                        <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                            <?= $weaponSkill; ?>
                            <br />
                        <?php endforeach; ?>
                    </div>
                </section>


                <!-- Availabillity -->
                <section>
                    <label class="fieldLabel">Availabillity:</label>
                    <select>
                        <option selected>Readilly Available</option>
                        <option>Normally Available</option>
                        <option>Specialised Weapon</option>
                        <option>Rare Weapon</option>
                    </select>
                </section>

                <!-- Ranges -->
                <section>
                    <label class="fieldLabel">Range:</label>
                    <section class="statsVlues">
                        <span class="dValue">
                            <input name="weaponShortMinValue[<?= $i ?>]" value="<?= $weapon['range']['short']['min'] ?>" type="number" min="0" max="<?= $weapon['range']['short']['max'] ?>">
                            -
                            <input name="weaponShortMaxValue[<?= $i ?>]" value="<?= $weapon['range']['short']['max'] ?>" type="number" min="<?= $weapon['range']['short']['min'] ?>">
                            /
                            <input name="weaponMediumMaxValue[<?= $i ?>]" value="<?= $weapon['range']['medium']['max'] ?>" type="number" min="<?= $weapon['range']['medium']['min'] ?>">
                            /
                            <input name="weaponLongMaxValue[<?= $i ?>]" value="<?= $weapon['range']['long']['max'] ?>" type="number" min="<?= $weapon['range']['long']['min'] ?>">
                            m
                        </span>
                    </section>
                </section>

                <!-- Radious -->
                <section>
                    <label class="fieldLabel">Blast Radious:</label>
                    <section class="statsVlues">
                        <span class="dValue">
                            <input name="weaponBlastRadiousDirectMinValue[<?= $i ?>]" value="<?= $weapon['blastRadious']['direct']['min'] ?>" type="number" min="0" max="<?= $weapon['blastRadious']['direct']['max'] ?>">
                            -
                            <input name="weaponBlastRadiousDirectMaxValue[<?= $i ?>]" value="<?= $weapon['blastRadious']['direct']['max'] ?>" type="number" min="<?= $weapon['blastRadious']['direct']['min'] ?>">
                            /
                            <input name="weaponBlastRadiousShortMaxValue[<?= $i ?>]" value="<?= $weapon['blastRadious']['short']['max'] ?>" type="number" min="<?= $weapon['blastRadious']['short']['min'] ?>">
                            /
                            <input name="weaponBlastRadiousMediumMaxValue[<?= $i ?>]" value="<?= $weapon['blastRadious']['medium']['max'] ?>" type="number" min="<?= $weapon['blastRadious']['medium']['min'] ?>">
                            /
                            <input name="weaponBlastRadiousLongMaxValue[<?= $i ?>]" value="<?= $weapon['blastRadious']['long']['max'] ?>" type="number" min="<?= $weapon['blastRadious']['long']['min'] ?>">
                            m
                        </span>
                    </section>
                </section>

                <!-- Damage -->
                <section>
                    <label class="fieldLabel">Damage:</label>
                    <section class="statsVlues">
                        <span class="dValue">
                            <input name="weaponDirectValue[<?= $i ?>]" value="<?= $weapon['damageBasedRange']['direct']['dice'] ?>" type="number" />
                            D/
                            <input name="weaponShortValue[<?= $i ?>]" value="<?= $weapon['damageBasedRange']['short']['dice'] ?>" type="number">
                            D/
                            <input name="weaponMediumValue[<?= $i ?>]" value="<?= $weapon['damageBasedRange']['medium']['dice'] ?>" type="number">
                            D/
                            <input name="weaponLongValue[<?= $i ?>]" value="<?= $weapon['damageBasedRange']['long']['dice'] ?>" type="number">
                            D
                        </span>
                    </section>
                </section>

                <?php if ($weapon['gameNote'] !== "") : ?>
                    <section>
                        <label class="fieldLabel">Special Note:</label>
                        <section class="statsVlues">
                            <span class="dValue">
                                <?= $weapon['gameNote']; ?>
                            </span>
                        </section>
                    </section>
                <?php endif; ?>
            </section>
        <?php
        else : ?>
            <section class="grandeData">

                <!-- PRICE -->
                <section>
                    <label class="fieldLabel">Price:</label>
                    <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
                </section>

                <!-- SKILLS -->
                <section>
                    <label class="fieldLabel">Skills Required:</label>
                    <div class="weaponSkills">
                        <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                            <?= $weaponSkill; ?>
                            <br />
                        <?php endforeach; ?>
                    </div>
                </section>

                <!-- Availiabillity -->
                <section>
                    <label class="fieldLabel">Availabillity:</label>
                    <select>
                        <option selected>Readilly Available</option>
                        <option>Normally Available</option>
                        <option>Specialised Weapon</option>
                        <option>Rare Weapon</option>
                    </select>
                </section>

                <!-- Game Note -->
                <?php if ($weapon['gameNote'] !== "") : ?>
                    <section>
                        <label class="fieldLabel">Special Note:</label>
                        <section class="statsVlues">
                            <span class="dValue gameNote">
                                <?= $weapon['gameNote']; ?>
                            </span>
                        </section>
                    </section>
                <?php endif; ?>
            </section>
        <?php
            die();
        endif;

    // Ranged
    elseif ($weapon['type'] === "ranged") : ?>
        <section class="rangedData">
            <input type="hidden" value="ranged" name="weaponType[<?= $i ?>]">

            <!-- Cost -->
            <section>
                <label class="fieldLabel">Price:</label>
                <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
            </section>

            <!-- Skills -->
            <section>
                <label class="fieldLabel">Skills Required:</label>
                <div class="weaponSkills">
                    <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                        <?= $weaponSkill; ?>
                        <br />
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Ammo -->
            <section>
                <label class="fieldLabel">Ammo:</label>
                <input type="number" name="weaponAmmo[<?= $i ?>]" value="<?= number_format($weapon['ammo']); ?>" />
            </section>

            <!-- Availabillity -->
            <section>
                <label class="fieldLabel">Availabillity:</label>
                <select>
                    <option selected>Readilly Available</option>
                    <option>Normally Available</option>
                    <option>Specialised Weapon</option>
                    <option>Rare Weapon</option>
                </select>
            </section>

            <!-- Ranges -->
            <section>
                <label class="fieldLabel">Range:</label>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="weaponShortMinValue[<?= $i ?>]" value="<?= $weapon['range']['short']['min'] ?>" type="number" min="0" max="<?= $weapon['range']['short']['max'] ?>">
                        -
                        <input name="weaponShortMaxValue[<?= $i ?>]" value="<?= $weapon['range']['short']['max'] ?>" type="number" min="<?= $weapon['range']['short']['min'] ?>">
                        /
                        <input name="weaponMediumMaxValue[<?= $i ?>]" value="<?= $weapon['range']['medium']['max'] ?>" type="number" min="<?= $weapon['range']['medium']['min'] ?>">
                        /
                        <input name="weaponLongMaxValue[<?= $i ?>]" value="<?= $weapon['range']['long']['max'] ?>" type="number" min="<?= $weapon['range']['long']['min'] ?>">
                        m
                    </span>
                </section>
            </section>

            <!-- Damage -->
            <section class="statsVlues">
                <label class="fieldLabel">Damage:</label>
                <span class="dValue">
                    <input name="weaponDamageDValue[<?= $i ?>]" value="<?= $weapon['damage']['dice'] ?>" type="number" min="0">
                    D
                    +
                    <input name="weaponDamagePipValue[<?= $i ?>]" class="pipValue" value="<?= $weapon['damage']['pips'] ?>" type="number" max="2" min="0">
                </span>
            </section>

            <?php if ($weapon['gameNote'] !== "") : ?>
                <section>
                    <label class="fieldLabel">Special Note:</label>
                    <section class="statsVlues">
                        <span class="dValue gameNote">
                            <?= $weapon['gameNote']; ?>
                        </span>
                    </section>
                </section>
            <?php endif; ?>
        </section>

    <?php
    // Mixed
    elseif ($weapon['type'] === "mixed") : ?>
        <input type="hidden" value="mixed" name="weaponType[<?= $i ?>]">

        <section class="mixedData">

            <!-- Cost -->
            <section>
                <label class="fieldLabel">Price:</label>
                <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
            </section>

            <!-- Skills -->
            <section>
                <label class="fieldLabel">Skills Required:</label>
                <div class="weaponSkills">
                    <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                        <?= $weaponSkill; ?>
                        <br />
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Difficulty -->
            <section>
                <label class="fieldLabel">Difficulty:</label>
                <input type="text" name="weaponDifficulty[<?= $i ?>]" value="<?= $weapon['difficulty'] ?>" />
            </section>

            <!-- Availabilllity -->
            <section>
                <label class="fieldLabel">Availabillity:</label>
                <select>
                    <option selected>Readilly Available</option>
                    <option>Normally Available</option>
                    <option>Specialised Weapon</option>
                    <option>Rare Weapon</option>
                </select>
            </section>

            <!-- Ranges -->
            <section>
                <label class="fieldLabel">Range:</label>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="weaponShortMinValue[<?= $i ?>]" value="<?= $weapon['range']['short']['min'] ?>" type="number" min="0" max="<?= $weapon['range']['short']['max'] ?>">
                        -
                        <input name="weaponShortMaxValue[<?= $i ?>]" value="<?= $weapon['range']['short']['max'] ?>" type="number" min="<?= $weapon['range']['short']['min'] ?>">
                        /
                        <input name="weaponMediumMaxValue[<?= $i ?>]" value="<?= $weapon['range']['medium']['max'] ?>" type="number" min="<?= $weapon['range']['medium']['min'] ?>">
                        /
                        <input name="weaponLongMaxValue[<?= $i ?>]" value="<?= $weapon['range']['long']['max'] ?>" type="number" min="<?= $weapon['range']['long']['min'] ?>">
                        m
                    </span>
                </section>
            </section>

            <!-- Damage Melee -->
            <section class="statsVlues">
                <label class="fieldLabel">Damage Melee:</label>
                <span class="dValue">
                    <?php if ($weapon['damage']['melee']['attribute'] !== "") : ?>
                        <?= $character['stats']['strength']['dice']; ?>D + <?= $character['stats']['strength']['pips']; ?> +
                    <?php endif; ?>
                    <input name="weaponDamgeDValue[<?= $i ?>]" value="<?= $weapon['damage']['melee']['dice'] ?>" type="number" min="0">
                    D
                    +
                    <input name="weaponDamgePipValue[<?= $i ?>]" class="pipValue" value="<?= $weapon['damage']['melee']['pips'] ?>" type="number" max="2" min="0">
                    <?php
                    if ($weapon['damage']['melee']['maxDice'] !== null) : ?>
                        <strong>&lpar;max <?= $weapon['damage']['melee']['maxDice']; ?>D&rpar;</strong>
                    <?php endif; ?>
                </span>
            </section>

            <!-- Damage Thrown -->
            <section class="statsVlues">
                <label class="fieldLabel">Damage Thrown:</label>
                <span class="dValue">
                    <input name="thrownWeaponDamgeDValue[<?= $i ?>]" value="<?= $weapon['damage']['thrown']['dice'] ?>" type="number" min="0">
                    D
                    +
                    <input name="thrownWeaponDamgePipValue[<?= $i ?>]" class="pipValue" value="<?= $weapon['damage']['thrown']['pips'] ?>" type="number" max="2" min="0">
                </span>
            </section>

            <!-- Game Note -->
            <?php if ($weapon['gameNote'] !== "") : ?>
                <section>
                    <label class="fieldLabel">Special Note:</label>
                    <section class="statsVlues">
                        <span class="dValue gameNote">
                            <?= $weapon['gameNote']; ?>
                        </span>
                    </section>
                </section>
            <?php endif; ?>
        </section>

    <?php
    // Melee
    elseif ($weapon['type'] === "melee") : ?>
        <input type="hidden" value="melee" name="weaponType[<?= $i ?>]">

        <section class="mixedData">

            <!-- Cost -->
            <section>
                <label class="fieldLabel">Price:</label>
                <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
            </section>

            <!-- Skills -->
            <section>
                <label class="fieldLabel">Skills Required:</label>
                <div class="weaponSkills">
                    <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                        <?= $weaponSkill; ?>
                        <br />
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Difficulty -->
            <section>
                <label class="fieldLabel">Difficulty:</label>
                <input type="text" name="weaponDifficulty[<?= $i ?>]" value="<?= $weapon['difficulty'] ?>" />
            </section>

            <!-- Availabilllity -->
            <section>
                <label class="fieldLabel">Availabillity:</label>
                <select>
                    <option selected>Readilly Available</option>
                    <option>Normally Available</option>
                    <option>Specialised Weapon</option>
                    <option>Rare Weapon</option>
                </select>
            </section>

            <!-- Damage Melee -->
            <section class="statsVlues">
                <label class="fieldLabel">Damage Melee:</label>
                <span class="dValue">
                    <?php if ($weapon['damage']['attribute'] !== "") : ?>
                        <?= $character['stats']['strength']['dice']; ?>D + <?= $character['stats']['strength']['pips']; ?> +
                    <?php endif; ?>
                    <input name="weaponDamgeDValue[<?= $i ?>]" value="<?= $weapon['damage']['dice'] ?>" type="number" min="0">
                    D
                    +
                    <input name="weaponDamgePipValue[<?= $i ?>]" class="pipValue" value="<?= $weapon['damage']['pips'] ?>" type="number" max="2" min="0">
                    <?php
                    if ($weapon['damage']['maxDice'] !== null) : ?>
                        <strong>&lpar;max <?= $weapon['damage']['maxDice']; ?>D&rpar;</strong>
                    <?php endif; ?>
                </span>
            </section>

            <!-- Game Note -->
            <?php if ($weapon['gameNote'] !== "") : ?>
                <section>
                    <label class="fieldLabel">Special Note:</label>
                    <section class="statsVlues">
                        <span class="dValue gameNote">
                            <?= $weapon['gameNote']; ?>
                        </span>
                    </section>
                </section>
            <?php endif; ?>
        </section>

    <?php
    // die("done with melee");
    // Custom
    else : die("NO!"); ?>
        <section class="customSection">
            <section>
                <label class="fieldLabel">Name:</label>
                <input type="text" value="<?= $weapon['name']; ?>" />
            </section>

            <section>
                <label class="fieldLabel">Base:</label>
                <select>
                    <?php get_weapons_dropdown_menu($weapons, "", "CUSTOm WEAPON"); ?>
                </select>
            </section>
        </section>
<?php endif;
}
?>