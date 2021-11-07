<?php


function get_dropdown_menu(array $menuItems)
{
    foreach ($menuItems as $item) :
        // die(var_dump($skill["name"]));
?>
        <option value="<?= $item["name"] ?>"><?= $item["name"] ?></option>
        <!-- <?= $item["name"] ?> -->
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
        // print_r($weapon);
        // echo $weapon["category"];
        // echo "<br>";
        if ($weapon['category'] === "Choose one") :
        ?>
            <option disabled>______________</option>
            <option value="custom">CUSTOM WEAPON</option>
        <?php else : ?>


            <option disabled><?= strtoupper($weapon['category']) ?></option>
            <?php
        endif;
        foreach ($weapon['weapons'] as $weapon) :
            if ($weapon["skill"][0] === $selected || $weapon['name'] === $weaponName) : ?>
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
function get_weapons_data(array $weapons, string $weapon)
{
    $weaponData = find_weapon($weapon, $weapons);
    $weapon = $weaponData;
    if ($weapon['type'] === 'explosive') :


        if ($weaponData['name'] === "Fragmentation Granade") :
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
                <span class="dValue">
                    <input name="weaponDamgeDValue" value="3" type="number" min="2">
                    D
                </span>
                +
                <input name="weaponDamgePipValue" class="pipValue" value="0" type="number" max="2" min="0">
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

    <?php elseif ($weapon['type'] === "mixed") : ?>
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
                <input type="text" value="<?= number_format($weapon['difficulty']); ?>" />
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
                    <?php if ($weapon['damage']['meele']['attribute'] !== "") : ?>
                        <?= $weapon['damage']['meele']['attribute']; ?> +
                    <?php endif; ?>
                    <input name="weaponDamgeDValue" value="<?= $weapon['damage']['melee']['dice'] ?>" type="number" min="2">
                    D
                </span>
                +
                <input name="weaponDamgePipValue" class="pipValue" value="<?= $weapon['damage']['melee']['pips'] ?>" type="number" max="2" min="0">
                <?php
                if ($weapon['damage']['meele']['maxDice'] !== null) : ?>
                    &lpar;max <?= $weapon['damage']['meele']['maxDice']; ?>D&rpar;
                <?php endif; ?>
            </section>
            <section class="statsVlues">
                <label class="fieldLabel">Damage Trhwon:</label>
                <span class="dValue">
                    <input name="weaponDamgeDValue" value="<?= $weapon['damage']['thrown']['dice'] ?>" type="number" min="2">
                    D
                </span>
                +
                <input name="weaponDamgePipValue" class="pipValue" value="<?= $weapon['damage']['thrown']['pips'] ?>" type="number" max="2" min="0">
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
    <?php elseif ($weapon['type'] === "melee") : ?>
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
                <input type="text" value="<?= number_format($weapon['difficulty']); ?>" />
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
                    <?php if ($weapon['damage']['meele']['attribute'] !== "") : ?>
                        <?= $weapon['damage']['meele']['attribute']; ?> +
                    <?php endif; ?>
                    <input name="weaponDamgeDValue" value="<?= $weapon['damage']['melee']['dice'] ?>" type="number" min="2">
                    D
                </span>
                +
                <input name="weaponDamgePipValue" class="pipValue" value="<?= $weapon['damage']['melee']['pips'] ?>" type="number" max="2" min="0">
                <?php
                if ($weapon['damage']['meele']['maxDice'] !== null) : ?>
                    &lpar;max <?= $weapon['damage']['meele']['maxDice']; ?>D&rpar;
                <?php endif; ?>
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
    <?php else : ?>
        <section class="customSection">
            <section>
                <label class="fieldLabel">Name:</label>
                <input type="text" value="<?= number_format($weapon['name']); ?>" />
            </section>

            <section>
                <label class="fieldLabel">Base:</label>
                <select>
                    <?php get_weapons_dropdown_menu($weapons, "", $weapon['name']); ?>
                </select>
            </section>
        </section>
<?php endif;
}
?>