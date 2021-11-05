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
        <option value="<?= $armor["name"] ?>"><?= $armor["name"] ?> &dash; <?= $armor['cost']; ?> credits</option>
    <?php endforeach;
}

function get_weapons_dropdown_menu(array $menuItems)
{
    foreach ($menuItems as $weapon) :
        print_r($weapon['name']);
        echo "<br>"
    ?>
        <option value="<?= $weapon["name"] ?>"><?= $weapon["name"] ?> &dash; <?= $weapon['cost']; ?></option>
<?php endforeach;
}

?>