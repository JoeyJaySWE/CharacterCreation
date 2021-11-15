<?php
include(__DIR__ . '/../../app/functions.php');

// ----------------- [ SESSION DATA ] ------------------ 
session_start();
$userName = $_SESSION['user'];
$userId = $_SESSION['userId'];
$charId = $_SESSION['charId'];
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
    $JSONchars = file_get_contents($characterJSON);
    $charactersArray = json_decode($JSONchars, true);

    $characterData = $charactersArray[$userId]['characters'][$charId];

    echo "You Got Mail! <br>";
    // print_r($_POST);


    if (isset($_POST['personalityForm'])) {

        echo "Personal data: " . $characterData['name'] . "<br>";
        $character = $characterData['personallity'];
        $character['gender'] = $_POST['gender'];
        $character['race'] = $_POST['race'];
        $character['hobby'] = $_POST['hobby'];
        $character['profession'] = $_POST['profession'];
        $character['primaryWeapons'] = $_POST['primeWeapon'];
        $character['secondaryWeapons'] = $_POST['secWeapon'];

        $characterData['personallity'] = $character;
        $charactersArray[$userId]['characters'][$charId] = $characterData;
        // die(print_r($charactersArray[$userId]['characters'][$charId]['personallity']));
        // print_r($jsonData);
        $jsonData = json_encode($charactersArray);
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
    } else if (isset($_POST['statsForm'])) {
        echo "From Stats <br><br>";
        $character = $characterData['stats'];
        $character['dexterity']['dice'] = (int)$_POST['dexDValue'];
        $character['dexterity']['pips'] = (int)$_POST['dexPipValue'];

        $character['knowledge']['dice'] = (int)$_POST['knowDValue'];
        $character['knowledge']['pips'] = (int)$_POST['knowPipValue'];

        $character['mechanical']['dice'] = (int)$_POST['mechDValue'];
        $character['mechanical']['pips'] = (int)$_POST['mechPipValue'];

        $character['perception']['dice'] = (int)$_POST['percDValue'];
        $character['perception']['pips'] = (int)$_POST['percPipValue'];

        $character['strength']['dice'] = (int)$_POST['strDValue'];
        $character['strength']['pips'] = (int)$_POST['strPipValue'];

        $character['technical']['dice'] = (int)$_POST['techDValue'];
        $character['technical']['pips'] = (int)$_POST['techPipValue'];
        $characterData['stats'] = $character;

        $charactersArray[$userId]['characters'][$charId] = $characterData;
        $jsonData = json_encode($charactersArray);
        file_put_contents('../../app/JS/characters.json', $jsonData);

        switch ($_POST['nextPage']) {
            case 'next':
                header($skillPage);
                break;
            case 'back':
                header($personallityPage);
                break;
            case 'abort':
                header($userPage);

            default:
                header($userPage);
                break;
        }
    } else if (isset($_POST['skillsForm'])) {
        echo "From: skills<br/><br/>";
        // print_r($_POST['dexSkillName']);
        echo "<br><br/>";
        // echo $_POST['dexSkillName'][1] . "<br/>";

        // ----------------- [ DEXTERITY SKILLS ] ------------------ 

        if (isset($_POST['dexSkillName'])) {


            $numbersOfDexSkills = sizeof($_POST['dexSkillName']);
            $dexSkillsArray = $characterData['stats']['dexterity']['skills'];
            for ($i = 0; $i < $numbersOfDexSkills; $i++) {
                $dexSkill['name'] = $_POST['dexSkillName'][$i];
                $dexSkill['dice'] = $_POST['dexSkillDice'][$i];
                $dexSkill['pips'] = $_POST['dexSkillPips'][$i];

                if ($_POST['specDexName'][$i] !== "") {
                    $dexSkill['specialized'] = true;
                    $dexSkill['specName'] = $_POST['specDexName'][$i];
                } else {
                    $dexSkill['specialized'] = false;
                    $dexSkill['specName'] = "";
                }
                $dexSkillsArray[$i + 1] = $dexSkill;
                // $charactersArray[$_SESSION['user']['characters'][$_SESSION['character']['slug']]] = $character;
            }
            $characterData['stats']['dexterity']['skills'] = $dexSkillsArray;
        }

        // ----------------------------------------------------------------



        // ----------------- [ KNOWLEDGE SKILLS ] ------------------ 

        if (isset($_POST['knowSkillName'])) {

            $numbersOfKnowSkills = sizeof($_POST['knowSkillName']);
            $knowSkillsArray = $characterData['stats']['knowledge']['skills'];
            for ($i = 0; $i < $numbersOfKnowSkills; $i++) {
                $knowSkill['name'] = $_POST['knowSkillName'][$i];
                $knowSkill['dice'] = $_POST['knowSkillDice'][$i];
                $knowSkill['pips'] = $_POST['knowSkillPips'][$i];

                if ($_POST['specKnowName'][$i] !== "") {
                    $knowSkill['specialized'] = true;
                    $knowSkill['specName'] = $_POST['specKnowName'][$i];
                } else {
                    $knowSkill['specialized'] = false;
                    $knowSkill['specName'] = "";
                }
                $knowSkillsArray[$i + 1] = $knowSkill;
                // $charactersArray[$_SESSION['user']['characters'][$_SESSION['character']['slug']]] = $character;
            }
            $characterData['stats']['knowledge']['skills'] = $knowSkillsArray;
        }

        // ----------------------------------------------------------------


        // ----------------- [ MECHANICAL SKILLS ] ------------------ 

        if (isset($_POST['mechSkillName'])) {
            $numbersOfMechSkills = sizeof($_POST['mechSkillName']);
            $mechSkillsArray = $characterData['stats']['mechanical']['skills'];
            for ($i = 0; $i < $numbersOfMechSkills; $i++) {
                $mechSkill['name'] = $_POST['mechSkillName'][$i];
                $mechSkill['dice'] = $_POST['mechSkillDice'][$i];
                $mechSkill['pips'] = $_POST['mechSkillPips'][$i];

                if ($_POST['specMechName'][$i] !== "") {
                    $mechSkill['specialized'] = true;
                    $mechSkill['specName'] = $_POST['specMechName'][$i];
                } else {
                    $mechSkill['specialized'] = false;
                    $mechSkill['specName'] = "";
                }
                $mechSkillsArray[$i + 1] = $mechSkill;
                // $charactersArray[$_SESSION['user']['characters'][$_SESSION['character']['slug']]] = $character;
            }
            $characterData['stats']['mechanical']['skills'] = $mechSkillsArray;
        }

        // ----------------------------------------------------------------


        // ----------------- [ PERCEPTION SKILLS ] ------------------ 

        if (isset($_POST['percSkillName'])) {
            // die(var_dump("Hold"));
            $numbersOfPercSkills = sizeof($_POST['percSkillName']);
            $percSkillsArray = $characterData['stats']['perception']['skills'];
            for ($i = 0; $i < $numbersOfPercSkills; $i++) {
                $percSkill['name'] = $_POST['percSkillName'][$i];
                $percSkill['dice'] = $_POST['percSkillDice'][$i];
                $percSkill['pips'] = $_POST['percSkillPips'][$i];

                if ($_POST['specPercName'][$i] !== "") {
                    $percSkill['specialized'] = true;
                    $percSkill['specName'] = $_POST['specPercName'][$i];
                } else {
                    $percSkill['specialized'] = false;
                    $percSkill['specName'] = "";
                }
                $percSkillsArray[$i + 1] = $percSkill;
                // $charactersArray[$_SESSION['user']['characters'][$_SESSION['character']['slug']]] = $character;
            }
            $characterData['stats']['perception']['skills'] = $percSkillsArray;
        }

        // ----------------------------------------------------------------


        // ----------------- [ STRENGTH SKILLS ] ------------------ 

        if (isset($_POST['strSkillName'])) {
            $numbersOfStrSkills = sizeof($_POST['strSkillName']);
            $strSkillsArray = $characterData['stats']['strength']['skills'];
            for ($i = 0; $i < $numbersOfStrSkills; $i++) {
                $strSkill['name'] = $_POST['strSkillName'][$i];
                $strSkill['dice'] = $_POST['strSkillDice'][$i];
                $strSkill['pips'] = $_POST['strSkillPips'][$i];

                if ($_POST['specStrName'][$i] !== "") {
                    $strSkill['specialized'] = true;
                    $strSkill['specName'] = $_POST['specStrName'][$i];
                } else {
                    $strSkill['specialized'] = false;
                    $strSkill['specName'] = "";
                }
                $strSkillsArray[$i + 1] = $strSkill;
                // $charactersArray[$_SESSION['user']['characters'][$_SESSION['character']['slug']]] = $character;
            }
            $characterData['stats']['strength']['skills'] = $strSkillsArray;
        }

        // ----------------------------------------------------------------


        // ----------------- [ TECHNICAL SKILLS ] ------------------ 

        if (isset($_POST['techSkillName'])) {
            $numbersOfTechSkills = sizeof($_POST['techSkillName']);
            $techSkillsArray = $characterData['stats']['technical']['skills'];
            for ($i = 0; $i < $numbersOfTechSkills; $i++) {
                $techSkill['name'] = $_POST['techSkillName'][$i];
                $techSkill['dice'] = $_POST['techSkillDice'][$i];
                $techSkill['pips'] = $_POST['techSkillPips'][$i];

                if ($_POST['specTechName'][$i] !== "") {
                    $techSkill['specialized'] = true;
                    $techSkill['specName'] = $_POST['specTechName'][$i];
                } else {
                    $techSkill['specialized'] = false;
                    $techSkill['specName'] = "";
                }
                $techSkillsArray[$i + 1] = $techSkill;
                // $charactersArray[$_SESSION['user']['characters'][$_SESSION['character']['slug']]] = $character;
            }
            $characterData['stats']['technical']['skills'] = $techSkillsArray;
        }

        // ----------------------------------------------------------------

        // print_r($characterData['stats']['dexterity']);
        // echo "<br/><br/>";

        $charactersArray[$_SESSION['userId']]['characters'][$characterData['slug']] = $characterData;
        $jsonData = json_encode($charactersArray);
        file_put_contents('../../app/JS/characters.json', $jsonData);


        switch ($_POST['nextPage']) {
            case 'next':
                header($inventoryPage);
                break;
            case 'back':
                header($statsPage);
                break;
            case 'abort':
                header($userPage);
                break;

            default:
                header($userPage);
                break;
        }
    }
}
