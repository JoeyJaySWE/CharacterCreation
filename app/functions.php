<?php


function get_skills_dropdown_menu(array $skills)
{
    foreach ($skills as $skill) :
        // die(var_dump($skill["name"]));
?>
        <option value="<?= $skill["name"] ?>"><?= $skill["name"] ?></option>
        <!-- <?= $skill["name"] ?> -->
        <br />
    <?php
    endforeach;
}

function get_armor_dropdown_menu(array $menuItems)
{
    foreach ($menuItems as $armor) :
        // print_r($armor['name']);
    ?>
        <option value="<?= $armor["name"] ?>"><?= $armor["name"] ?> &dash; <?= number_format($armor['cost']); ?> credits</option>
        <?php endforeach;
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
        // die(print_r($category));
        foreach ($category['items'] as $key => $items) {
            // var_dump($items['name']);s
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
    <summary class="defaultBtn subBtn button"><?= $gear['name']; ?></summary>
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
}
function get_weapons_data(array $weapons, string $weapon)
{
    if ($weapon !== "Custom Weapon") {
        $weaponData = find_weapon($weapon, $weapons);
        $weapon = $weaponData;
    } else {
        $weapon = $weapons['custom']['weapon'];
    }
    if ($weapon['type'] === 'explosive') :

        if ($weapon['name'] === "Fragmentation Granade") :
            // die(var_dump($weapon['name']));
        ?>
            <section class="grandeData">
                <section>
                    <label class="fieldLabel">Type:</label>
                    <select>
                        <?php get_weapons_dropdown_menu($weapons, "", $weapon['name']); ?>
                    </select>
                </section>

                <section>
                    <label class="fieldLabel">Skills Required:</label>
                    <div class="weaponSkills">
                        <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                            <?= $weaponSkill; ?>
                            <br />
                        <?php endforeach; ?>
                    </div>
                </section>

                <section>
                    <label class="fieldLabel">Price:</label>
                    <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
                </section>

                <section>
                    <label class="fieldLabel">Availabillity:</label>
                    <select>
                        <option selected>Readilly Available</option>
                        <option>Normally Available</option>
                        <option>Specialised Weapon</option>
                        <option>Rare Weapon</option>
                    </select>
                </section>

                <section>
                    <label class="fieldLabel">Range:</label>
                    <section class="statsVlues">
                        <span class="dValue">
                            <input name="shortMinValue" value="<?= $weapon['range']['short']['min'] ?>" type="number" min="0" max="<?= $weapon['range']['short']['max'] ?>">
                            -
                            <input name="shortMaxValue" value="<?= $weapon['range']['short']['max'] ?>" type="number" min="<?= $weapon['range']['short']['min'] ?>">
                            /
                            <input name="mediumMaxValue" value="<?= $weapon['range']['medium']['max'] ?>" type="number" min="<?= $weapon['range']['medium']['min'] ?>">
                            /
                            <input name="longMaxValue" value="<?= $weapon['range']['long']['max'] ?>" type="number" min="<?= $weapon['range']['long']['min'] ?>">
                            m
                        </span>
                    </section>
                </section>

                <section>
                    <label class="fieldLabel">Blast Radious:</label>
                    <section class="statsVlues">
                        <span class="dValue">
                            <input name="directMinValue" value="<?= $weapon['blastRadious']['direct']['min'] ?>" type="number" min="0" max="<?= $weapon['blastRadious']['direct']['max'] ?>">
                            -
                            <input name="directMaxValue" value="<?= $weapon['blastRadious']['direct']['max'] ?>" type="number" min="<?= $weapon['blastRadious']['direct']['min'] ?>">
                            /
                            <input name="shortMaxValue" value="<?= $weapon['blastRadious']['short']['max'] ?>" type="number" min="<?= $weapon['blastRadious']['short']['min'] ?>">
                            /
                            <input name="mediumMaxValue" value="<?= $weapon['blastRadious']['medium']['max'] ?>" type="number" min="<?= $weapon['blastRadious']['medium']['min'] ?>">
                            /
                            <input name="longMaxValue" value="<?= $weapon['blastRadious']['long']['max'] ?>" type="number" min="<?= $weapon['blastRadious']['long']['min'] ?>">
                            m
                        </span>
                    </section>
                </section>

                <section>
                    <label class="fieldLabel">Damage:</label>
                    <section class="statsVlues">
                        <span class="dValue">
                            <input name="grandeDirectValue" value="<?= $weapon['damageBasedRange']['direct']['dice'] ?>" type="number" />
                            D/
                            <input name="grandeShortValue" value="<?= $weapon['damageBasedRange']['short']['dice'] ?>" type="number">
                            D/
                            <input name="grandeMediumValue" value="<?= $weapon['damageBasedRange']['medium']['dice'] ?>" type="number">
                            D/
                            <input name="granadeLongValue" value="<?= $weapon['damageBasedRange']['long']['dice'] ?>" type="number">
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
                <section>
                    <label class="fieldLabel">Type:</label>
                    <select>
                        <?php get_weapons_dropdown_menu($weapons, "", $weapon['name']); ?>
                    </select>
                </section>

                <section>
                    <label class="fieldLabel">Skills Required:</label>
                    <div class="weaponSkills">
                        <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                            <?= $weaponSkill; ?>
                            <br />
                        <?php endforeach; ?>
                    </div>
                </section>

                <section>
                    <label class="fieldLabel">Price:</label>
                    <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
                </section>

                <section>
                    <label class="fieldLabel">Availabillity:</label>
                    <select>
                        <option selected>Readilly Available</option>
                        <option>Normally Available</option>
                        <option>Specialised Weapon</option>
                        <option>Rare Weapon</option>
                    </select>
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
        endif;

    // Ranged
    elseif ($weapon['type'] === "ranged") : ?>
        <section class="rangedData">
            <section>
                <label class="fieldLabel">Type:</label>
                <select>
                    <?php get_weapons_dropdown_menu($weapons, "", $weapon['name']); ?>
                </select>
            </section>

            <section>
                <label class="fieldLabel">Skills Required:</label>
                <div class="weaponSkills">
                    <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                        <?= $weaponSkill; ?>
                        <br />
                    <?php endforeach; ?>
                </div>
            </section>

            <section>
                <label class="fieldLabel">Price:</label>
                <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
            </section>

            <section>
                <label class="fieldLabel">Ammo:</label>
                <input type="number" value="<?= number_format($weapon['ammo']); ?>" />
            </section>

            <section>
                <label class="fieldLabel">Availabillity:</label>
                <select>
                    <option selected>Readilly Available</option>
                    <option>Normally Available</option>
                    <option>Specialised Weapon</option>
                    <option>Rare Weapon</option>
                </select>
            </section>

            <section>
                <label class="fieldLabel">Range:</label>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="shortMinValue" value="<?= $weapon['range']['short']['min'] ?>" type="number" min="0" max="<?= $weapon['range']['short']['max'] ?>">
                        -
                        <input name="shortMaxValue" value="<?= $weapon['range']['short']['max'] ?>" type="number" min="<?= $weapon['range']['short']['min'] ?>">
                        /
                        <input name="mediumMaxValue" value="<?= $weapon['range']['medium']['max'] ?>" type="number" min="<?= $weapon['range']['medium']['min'] ?>">
                        /
                        <input name="longMaxValue" value="<?= $weapon['range']['long']['max'] ?>" type="number" min="<?= $weapon['range']['long']['min'] ?>">
                        m
                    </span>
                </section>
            </section>

            <section class="statsVlues">
                <label class="fieldLabel">Damage:</label>
                <span class="dValue">
                    <input name="weaponDamgeDValue" value="3" type="number" min="2">
                    D
                    +
                    <input name="weaponDamgePipValue" class="pipValue" value="0" type="number" max="2" min="0">
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
        <section class="mixedData">
            <section>
                <label class="fieldLabel">Type:</label>
                <select>
                    <?php get_weapons_dropdown_menu($weapons, "", $weapon['name']); ?>
                </select>
            </section>

            <section>
                <label class="fieldLabel">Skills Required:</label>
                <div class="weaponSkills">
                    <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                        <?= $weaponSkill; ?>
                        <br />
                    <?php endforeach; ?>
                </div>
            </section>

            <section>
                <label class="fieldLabel">Price:</label>
                <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
            </section>

            <section>
                <label class="fieldLabel">Difficulty:</label>
                <input type="text" value="<?= $weapon['difficulty'] ?>" />
            </section>

            <section>
                <label class="fieldLabel">Availabillity:</label>
                <select>
                    <option selected>Readilly Available</option>
                    <option>Normally Available</option>
                    <option>Specialised Weapon</option>
                    <option>Rare Weapon</option>
                </select>
            </section>

            <section>
                <label class="fieldLabel">Range:</label>
                <section class="statsVlues">
                    <span class="dValue">
                        <input name="shortMinValue" value="<?= $weapon['range']['short']['min'] ?>" type="number" min="0" max="<?= $weapon['range']['short']['max'] ?>">
                        -
                        <input name="shortMaxValue" value="<?= $weapon['range']['short']['max'] ?>" type="number" min="<?= $weapon['range']['short']['min'] ?>">
                        /
                        <input name="mediumMaxValue" value="<?= $weapon['range']['medium']['max'] ?>" type="number" min="<?= $weapon['range']['medium']['min'] ?>">
                        /
                        <input name="longMaxValue" value="<?= $weapon['range']['long']['max'] ?>" type="number" min="<?= $weapon['range']['long']['min'] ?>">
                        m
                    </span>
                </section>
            </section>

            <section class="statsVlues">
                <label class="fieldLabel">Damage Melee:</label>
                <span class="dValue">
                    <?php if ($weapon['damage']['melee']['attribute'] !== "") : ?>
                        <?= $weapon['damage']['melee']['attribute']; ?> +
                    <?php endif; ?>
                    <input name="weaponDamgeDValue" value="<?= $weapon['damage']['melee']['dice'] ?>" type="number" min="2">
                    D
                    +
                    <input name="weaponDamgePipValue" class="pipValue" value="<?= $weapon['damage']['melee']['pips'] ?>" type="number" max="2" min="0">
                    <?php
                    if ($weapon['damage']['melee']['maxDice'] !== null) : ?>
                        &lpar;max <?= $weapon['damage']['melee']['maxDice']; ?>D&rpar;
                    <?php endif; ?>
                </span>
            </section>
            <section class="statsVlues">
                <label class="fieldLabel">Damage Trhwon:</label>
                <span class="dValue">
                    <input name="weaponDamgeDValue" value="<?= $weapon['damage']['thrown']['dice'] ?>" type="number" min="2">
                    D
                    +
                    <input name="weaponDamgePipValue" class="pipValue" value="<?= $weapon['damage']['thrown']['pips'] ?>" type="number" max="2" min="0">
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
    // Melee
    elseif ($weapon['type'] === "melee") : ?>
        <section class="mixedData">
            <section>
                <label class="fieldLabel">Type:</label>
                <select>
                    <?php get_weapons_dropdown_menu($weapons, "", $weapon['name']); ?>
                </select>
            </section>

            <section>
                <label class="fieldLabel">Skills Required:</label>
                <div class="weaponSkills">
                    <?php foreach ($weapon['skill'] as $weaponSkill) : ?>
                        <?= $weaponSkill; ?>
                        <br />
                    <?php endforeach; ?>
                </div>
            </section>

            <section>
                <label class="fieldLabel">Price:</label>
                <input type="text" value="<?= number_format($weapon['cost']); ?> credits" />
            </section>

            <section>
                <label class="fieldLabel">Difficulty:</label>
                <input type="text" value="<?= $weapon['difficulty']; ?>" />
            </section>

            <section>
                <label class="fieldLabel">Availabillity:</label>
                <select>
                    <option selected>Readilly Available</option>
                    <option>Normally Available</option>
                    <option>Specialised Weapon</option>
                    <option>Rare Weapon</option>
                </select>
            </section>

            <section class="statsVlues">
                <label class="fieldLabel">Damage:</label>
                <span class="dValue">
                    <?php if ($weapon['damage']['attribute'] !== "") : ?>
                        <?= $weapon['damage']['attribute']; ?> +
                    <?php endif; ?>
                    <input name="weaponDamgeDValue" value="<?= $weapon['damage']['dice'] ?>" type="number" min="2">
                    D
                    +
                    <input name="weaponDamgePipValue" class="pipValue" value="<?= $weapon['damage']['pips'] ?>" type="number" max="2" min="0">
                    <?php
                    if ($weapon['damage']['maxDice'] !== null) : ?>
                        &lpar;max <?= $weapon['damage']['maxDice']; ?>D&rpar;
                    <?php endif; ?>
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
    // Custom
    else : ?>
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