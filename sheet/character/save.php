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
    } else if (isset($_POST['inventoryForm'])) {
        echo "Inventory stuff";
        $armorsJSON = file_get_contents("../../app/JS/armor.json");
        $armors = json_decode($armorsJSON, true);
        $armorsArray = $charactersArray[$userId]['characters'][$charId]['inventory']['armors'];
        $statsArray = $charactersArray[$userId]['characters'][$charId]['stats'];
        $armorAmounts = sizeof($_POST['armorName']);
        // die(var_dump($armorAmounts));
        // die(var_dump($armorAmounts, sizeof($armorsArray)));
        if ($armorAmounts === sizeof($armorsArray)) {
            $armorAmounts++;
        } else if ($armorAmounts < sizeof($armorsArray)) {
            // die("Less");
            $armorAmounts++;
            // var_dump("<br>", sizeof($armorsArray));
            $oldAmount = sizeof($armorsArray);
            for ($i = 1; $i < $oldAmount; $i++) {
                echo $armorsArray[$i]['name'] . "<br>";
                unset($armorsArray[$i]);
            }
            // die(var_dump("<br>", sizeof($armorsArray)));
        }
        for ($i = 1; $i < $armorAmounts; $i++) {
            // die(var_dump(sizeof($armorsArray)));
            // die(var_dump($_POST['armorName'][$i]));
            $dbArmor = find_armor($_POST['armorName'][$i], $armors);

            if ($_POST['newArmor'][$i] === "true") {
                // var_dump("new armor!");
                $dbArmor = find_armor($_POST['armorName'][$i], $armors);
                // die(var_dump("armors amount:", $armorAmounts));
                $armorsArray[$armorAmounts - 1] = $dbArmor;
            } else {
                // var_dump("old armor");
                $armor['name'] = $_POST['armorName'][$i];
                // die(var_dump($armorsArray));
                // $oldArmor = find_old_armor($armor['name'], $charactersArray[$userId]['characters'][$charId]['inventory']);
                // die(print_r($oldArmor['name']));
                if (sizeof($_POST['armorLegsEnergyPips']) !== $armorAmounts && $i > 1) {
                    $loopIndex = $i;
                    $i--;
                } else {
                    $loopIndex = $i;
                }
                for ($statsIndex = 0; $statsIndex < sizeof($_POST['armorHeadPhysicalD']); $statsIndex++) {

                    $armor['protection']['head']['physical']['stat'] = "str";
                    $armor['protection']['head']['energy']['stat'] = "str";
                    $armor['protection']['head']['physical']['dice'] = ($_POST['armorHeadPhysicalD'][$statsIndex] - $statsArray['strength']['dice']);
                    $armor['protection']['head']['physical']['pips'] = ($_POST['armorHeadPhysicalPips'][$statsIndex] - $statsArray['strength']['pips']);
                    $armor['protection']['head']['energy']['dice'] = ($_POST['armorHeadEnergyD'][$statsIndex] - $statsArray['strength']['dice']);
                    $armor['protection']['head']['energy']['pips'] = ($_POST['armorHeadEnergyPips'][$statsIndex] - $statsArray['strength']['pips']);
                    $armor['protection']['torso']['physical']['dice'] = ($_POST['armorTorsoPhysicalD'][$statsIndex] - $statsArray['strength']['dice']);
                    $armor['protection']['torso']['physical']['pips'] = ($_POST['armorTorsoPhysicalPips'][$statsIndex] - $statsArray['strength']['pips']);
                    $armor['protection']['torso']['energy']['dice'] = ($_POST['armorTorsoEnergyD'][$statsIndex] - $statsArray['strength']['dice']);
                    $armor['protection']['torso']['energy']['pips'] = ($_POST['armorTorsoEnergyPips'][$statsIndex] - $statsArray['strength']['pips']);
                    $armor['protection']['arms']['physical']['dice'] = ($_POST['armorArmsPhysicalD'][$statsIndex] - $statsArray['strength']['dice']);
                    $armor['protection']['arms']['physical']['pips'] = ($_POST['armorArmsPhysicalPips'][$statsIndex] - $statsArray['strength']['pips']);
                    $armor['protection']['arms']['energy']['dice'] = ($_POST['armorArmsEnergyD'][$statsIndex] - $statsArray['strength']['dice']);
                    $armor['protection']['arms']['energy']['pips'] = ($_POST['armorArmsEnergyPips'][$statsIndex] - $statsArray['strength']['pips']);
                    $armor['protection']['legs']['physical']['dice'] = ($_POST['armorLegsPhysicalD'][$statsIndex] - $statsArray['strength']['dice']);
                    $armor['protection']['legs']['physical']['pips'] = ($_POST['armorLegsPhysicalPips'][$statsIndex] - $statsArray['strength']['pips']);
                    $armor['protection']['legs']['energy']['dice'] = ($_POST['armorLegsEnergyD'][$statsIndex] - $statsArray['strength']['dice']);
                    $armor['protection']['legs']['energy']['pips'] = ($_POST['armorLegsEnergyPips'][$statsIndex] - $statsArray['strength']['pips']);
                }
                $armor['protection']['element'] = $dbArmor['protection']['element'];
                $armor['cost'] = $dbArmor['cost'];
                // $armor['cost'] = $_POST['armorCost'][$i];

                $armor['description'] = $_POST['armorDescription'][$i];
                $armor['gameNote'] = $_POST['armorGameNote'][$i];
                $armor['availabillity'] = $dbArmor['availabillity'];


                $armor['penalties']['dexterity']['dice'] = $_POST['armorDexterityPenaltyD'][$i];
                $armor['penalties']['dexterity']['pips'] = $_POST['armorDexterityPenaltyPips'][$i];
                $armor['penalties']['knowledge']['dice'] = $_POST['armorKnowledgePenaltyD'][$i];
                $armor['penalties']['knowledge']['pips'] = $_POST['armorKnowledgePenaltyPips'][$i];
                $armor['penalties']['mechanical']['dice'] = $_POST['armorMechanicalPenaltyD'][$i];
                $armor['penalties']['mechanical']['pips'] = $_POST['armorMechanicalPenaltyPips'][$i];
                $armor['penalties']['perception']['dice'] = $_POST['armorPerceptionPenaltyD'][$i];
                $armor['penalties']['perception']['pips'] = $_POST['armorPerceptionPenaltyPips'][$i];
                $armor['penalties']['strength']['dice'] = $_POST['armorStrengthPenaltyD'][$i];
                $armor['penalties']['strength']['pips'] = $_POST['armorStrengthPenaltyPips'][$i];
                $armor['penalties']['technical']['dice'] = $_POST['armorTechnicalPenaltyD'][$i];
                $armor['penalties']['technical']['pips'] = $_POST['armorTechnicalPenaltyPips'][$i];
                // $armor['penalities']
                // die(print_r($oldArmor));
                $armorsArray[$loopIndex] = $armor;
            }
            if ($i === 1) {
                // die(var_dump($_POST['armorName'][$i], sizeof($armorsArray)));
                // die(var_dump($armorsArray));
            }
            // die(var_dump("stop"));
        }
        // die(print_r($armorsArray));
        // var_dump('armors done');
        // die(var_dump($armorsArray));
        $charactersArray[$userId]['characters'][$charId]['inventory']['armors'] = $armorsArray;


        // ----------------- [ WEAPONS ] ------------------ 

        $weaponsJSON = file_get_contents("../../app/JS/weapons.json");
        $weapons = json_decode($weaponsJSON, true);
        $weaponsArray = $charactersArray[$userId]['characters'][$charId]['inventory']['weapons'];
        $statsArray = $charactersArray[$userId]['characters'][$charId]['stats'];
        // die(var_dump($_POST['weaponsName']));
        if (isset($_POST['weaponsName'])) {

            $weaponsAmounts = sizeof($_POST['weaponsName']);
        } else {
            $weaponsAmounts = 0;
        }
        // die(var_dump($armorAmounts));
        // die(var_dump($armorAmounts, sizeof($weaponsArray)));
        if ($weaponsAmounts === sizeof($weaponsArray)) {
            $weaponsAmounts++;
        } else if ($weaponsAmounts < sizeof($weaponsArray)) {
            // die("Less");
            // die(var_dump($weaponsAmounts, sizeof($weaponsArray)));
            $weaponsAmounts++;
            var_dump("<br>", sizeof($weaponsArray));
            $oldAmount = sizeof($weaponsArray);
            for ($i = 1; $i < $oldAmount; $i++) {
                echo $weaponsArray[$i]['name'] . "<br>";
                unset($weaponsArray[$i]);
            }
            // die(var_dump("<br>", sizeof($weaponsArray)));
        }
        for ($i = 1; $i < $weaponsAmounts; $i++) {
            // die(var_dump($weaponsAmounts));
            // die(var_dump(sizeof($weaponsArray), $weaponsArray));
            // die(var_dump($_POST['armorName'][$i]));
            $dbWeapon = find_weapon($_POST['weaponsName'][$i], $weapons);
            // die(var_dump($_POST['weaponsName']));
            if ($_POST['newWeapon'][$i] === "true") {
                var_dump("new Weapon!");
                $dbWeapon = find_weapon($_POST['weaponsName'][$i], $weapons);
                // die(var_dump("armors amount:", $armorAmounts));
                $weaponsArray[$weaponsAmounts - 1] = $dbWeapon;
            } else {
                var_dump("old weapon");
                // die(var_dump($_POST['weaponType'][$i]));
                $weapon['name'] = $_POST['weaponsName'][$i];
                $weapon['type'] = $_POST['weaponType'][$i];
                // die(var_dump($armorsArray));
                // die(print_r($oldArmor['name']));
                // if (sizeof($_POST['armorLegsEnergyPips']) !== $armorAmounts && $i > 1) {
                //     $loopIndex = $i;
                //     $i--;
                // } else {
                //     $loopIndex = $i;
                // }
                // die(var_dump($_POST['weaponType']));
                if ($weapon['type'] === 'explosive') {
                    var_dump("Bang!");

                    if ($weapon['name'] === "Fragmentation Granade") {

                        $weapon['cost'] = $dbWeapon['cost'];
                        $weapon['skill'] = $dbWeapon['skill'];
                        $weapon['availability'] = $dbWeapon['availability'];
                        $weapon['description'] = $dbWeapon['description'];

                        $weapon['range'] = $dbWeapon['range'];
                        $weapon['range']['short']['min'] = $_POST['weaponShortMinValue'][$i];
                        $weapon['range']['short']['max'] = $_POST['weaponShortMaxValue'][$i];
                        $weapon['range']['medium']['max'] = $_POST['weaponMediumMaxValue'][$i];
                        $weapon['range']['long']['max'] = $_POST['weaponLongMaxValue'][$i];

                        $weapon['blastRadious'] = $dbWeapon['blastRadious'];
                        $weapon['blastRadious']['direct']['min'] = $_POST['weaponBlastRadiousDirectMinValue'][$i];
                        $weapon['blastRadious']['direct']['max'] = $_POST['weaponBlastRadiousDirectMaxValue'][$i];
                        $weapon['blastRadious']['short']['max'] = $_POST['weaponBlastRadiousShortMaxValue'][$i];
                        $weapon['blastRadious']['medium']['max'] = $_POST['weaponBlastRadiousMediumMaxValue'][$i];
                        $weapon['blastRadious']['long']['max'] = $_POST['weaponBlastRadiousLongMaxValue'][$i];

                        $weapon['damageBasedRange'] = $dbWeapon['damageBasedRange'];
                        $weapon['damageBasedRange']['direct']['dice'] = $_POST['weaponDirectValue'][$i];
                        $weapon['damageBasedRange']['short']['dice'] = $_POST['weaponShortValue'][$i];
                        $weapon['damageBasedRange']['medium']['dice'] = $_POST['weaponMediumValue'][$i];
                        $weapon['damageBasedRange']['long']['dice'] = $_POST['weaponLongValue'][$i];

                        $weapon['gameNote'] = $dbWeapon['gameNote'];
                    } else {
                        $weapon = $dbWeapon;
                    }
                } else if ($weapon['type'] === 'ranged') {
                    var_dump("ranged");

                    $weapon['cost'] = $dbWeapon['cost'];
                    $weapon['skill'] = $dbWeapon['skill'];

                    $weapon['ammo'] =  $_POST['weaponAmmo'][$i];

                    $weapon['availability'] = $dbWeapon['availability'];
                    $weapon['description'] = $dbWeapon['description'];

                    $weapon['range']['short']['min'] = $_POST['weaponShortMinValue'][$i];
                    $weapon['range']['short']['max'] = $_POST['weaponShortMaxValue'][$i];
                    // die(var_dump($weapon));
                    $weapon['range']['medium']['min'] = $dbWeapon['range']['medium']['min'];
                    $weapon['range']['medium']['max'] = $_POST['weaponMediumMaxValue'][$i];
                    $weapon['range']['long']['min'] = $dbWeapon['range']['long']['min'];
                    $weapon['range']['long']['max'] = $_POST['weaponLongMaxValue'][$i];

                    $weapon['damage']['attribute'] = $dbWeapon['damage']['attribute'];
                    $weapon['damage']['dice'] = $_POST['weaponDamageDValue'][$i];
                    $weapon['damage']['pips'] = $_POST['weaponDamagePipValue'][$i];
                    $weapon['damage']['maxDice'] = $dbWeapon['damage']['maxDice'];

                    $weapon['gameNote'] = $dbWeapon['gameNote'];
                } else if ($weapon['type'] === 'mixed') {
                    var_dump("mixed");

                    $weapon['cost'] = $dbWeapon['cost'];
                    $weapon['skill'] = $dbWeapon['skill'];
                    $weapon['availability'] = $dbWeapon['availability'];
                    $weapon['description'] = $dbWeapon['description'];

                    $weapon['difficulty'] = $_POST['weaponDifficulty'][$i];

                    $weapon['range'] = $dbWeapon['range'];
                    $weapon['range']['short']['min'] = $_POST['weaponShortMinValue'][$i];
                    $weapon['range']['short']['max'] = $_POST['weaponShortMaxValue'][$i];
                    $weapon['range']['medium']['max'] = $_POST['weaponMediumMaxValue'][$i];
                    $weapon['range']['long']['max'] = $_POST['weaponLongMaxValue'][$i];

                    $weapon['damage'] = $dbWeapon['damage'];
                    $weapon['damage']['melee']['dice'] = $_POST['weaponDamgeDValue'][$i];
                    $weapon['damage']['melee']['pips'] = $_POST['weaponDamgePipValue'][$i];

                    $weapon['damage']['thrown']['dice'] = $_POST['thrownWeaponDamgeDValue'][$i];
                    $weapon['damage']['thrown']['pips'] = $_POST['thrownWeaponDamgePipValue'][$i];

                    $weapon['gameNote'] = $dbWeapon['gameNote'];
                } else if ($weapon['type'] === 'melee') {
                    var_dump("melee");

                    $weapon['cost'] = $dbWeapon['cost'];
                    $weapon['skill'] = $dbWeapon['skill'];
                    $weapon['availability'] = $dbWeapon['availability'];
                    $weapon['description'] = $dbWeapon['description'];

                    $weapon['difficulty'] = $_POST['weaponDifficulty'][$i];

                    $weapon['damage'] = $dbWeapon['damage'];
                    $weapon['damage']['dice'] = $_POST['weaponDamgeDValue'][$i];
                    $weapon['damage']['pips'] = $_POST['weaponDamgePipValue'][$i];

                    $weapon['gameNote'] = $dbWeapon['gameNote'];
                }
                // $armor['penalities']
                // die(print_r($oldArmor));
                $weaponsArray[$i] = $weapon;
            }
            if ($i === 1) {
                // die(var_dump($_POST['armorName'][$i], sizeof($armorsArray)));
                // die(var_dump($weaponsArray[$i]));
            }
            // die(var_dump("stop"));
        }

        // die(var_dump($weaponsArray[1]));
        $charactersArray[$userId]['characters'][$charId]['inventory']['weapons'] = $weaponsArray;

        // ----------------------------------------------------------------

        // die(var_dump("weapon done", $weaponsArray[1]));
        $jsonData = json_encode($charactersArray);
        file_put_contents('../../app/JS/characters.json', $jsonData);

        switch ($_POST['nextPage']) {
            case 'next':
                header($biographyPage);
                break;
            case 'back':
                header($skillPage);
                break;
            case 'abort':
                die(var_dump("abort triggered"));
                header($userPage);
                break;
            case 'refresh':
                header($inventoryPage);

            default:
                die(var_dump("Default triggered"));
                header($userPage);
                break;
        }

        die(var_dump($armorAmounts));
        $armor = find_armor($_POST['armorName'][0], $armors);
    }
    die(var_dump(print_r($_POST)));
}
