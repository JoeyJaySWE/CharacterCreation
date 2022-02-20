<?php
session_start();
$userId = $_SESSION['userId'];
if (isset($_POST)) {
    echo "Here comes data!<br>";
    $char2delete = (int)$_POST['deleteCharacter'];
    echo "remove: " . $char2delete . "<br/>";
    $jsonCharacters = file_get_contents('sheet/characters/'.$userId.'.json');
    $charactersArray = json_decode($jsonCharacters, true);
    // print_r($charactersArray[$userId]['characters']);
    echo "<br/><br/>";
    unset($charactersArray['characters'][$char2delete]);

    // print_r($charactersArray[$userId]['characters']);
    if(sizeof($charactersArray['characters']) === 0){
        unlink('sheet/characters/'.$userId.'.json');
    }
    else{

        $jsonData = json_encode($charactersArray);
        print_r($charactersArray[(int)$userId]['characters']);
        file_put_contents('sheet/characters/'.$userId.'.json', $jsonData);
    }
    header("Location: user.php");
}
