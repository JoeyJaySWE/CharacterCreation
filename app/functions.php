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


?>