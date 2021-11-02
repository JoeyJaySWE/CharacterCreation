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


?>