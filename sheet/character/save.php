<?php
include(__DIR__ . '/../../app/functions.php');

// ----------------- [ SESSION DATA ] ------------------ 

$userName = "Raas/Joya (Gsus)";
$userId = 1;
$charId = "emptyChar";
$characterJSON = '../../app/JS/characters.json';
$JSONchars = file_get_contents($characterJSON);
$charactersArray = json_decode($JSONchars, true);

// ----------------------------------------------------------------

// ----------------- [ PAG URLs ] ------------------ 

$userPage = "Location: http://localhost:8080/wip/CharacterCreation/user.php";
$personallityPage = "Location: http://localhost:8080/wip/CharacterCreation/sheet/character/personallity.php";
$statsPage = "Location: http://localhost:8080/wip/CharacterCreation/sheet/character/stats.php";
$skillPage = "Location: http://localhost:8080/wip/CharacterCreation/sheet/character/skills.php";
$inventoryPage = "Location: http://localhost:8080/wip/CharacterCreation/sheet/character/inventory.php";
$biographyPage = "Location: http://localhost:8080/wip/CharacterCreation/sheet/character/biography.php";
$portraitPage = "Location: http://localhost:8080/wip/CharacterCreation/sheet/character/portrait.php";

// ----------------------------------------------------------------



if (isset($_POST)) {
    $characterData = find_character($_POST['name'], $charactersArray[$userId]['characters']);

    echo "You Got Mail! <br>";
    if (isset($_POST['personalityForm'])) {
        echo "Personal data: " . $characterData['name'] . "<br>";
        $character = $characterData['personallity'];
        // die(var_dump($_POST['gender']));
        $character['gender'] = $_POST['gender'];
        $character['race'] = $_POST['race'];
        $characterData['personallity'] = $character;
        $charactersArray[$userId]['characters'][$charId] = $characterData;
        // die(print_r($charactersArray));
        $jsonData = json_encode($charactersArray);
        // print_r($jsonData);
        file_put_contents('../../app/JS/characters.json', $jsonData);

        switch ($_POST['nextPage']) {
            case 'next':
                header($statsPage);
                break;
            case 'back':
                header($userPage);
                break;

            default:
                header($userPage);
                break;
        }
    } else {
        echo "something else...";
    }
}
