<?php
$userId = "1";

if (isset($_POST)) {
    echo "Here comes data!<br>";
    $char2delete = $_POST['deleteCharacter'];
    echo "remove: " . $char2delete . "<br/>";
    $jsonCharacters = file_get_contents('app/JS/characters.json');
    $charactersArray = json_decode($jsonCharacters, true);
    // print_r($charactersArray[$userId]['characters']);
    echo "<br/><br/>";
    unset($charactersArray[$userId]['characters'][$char2delete]);
    // print_r($charactersArray[$userId]['characters']);

    $jsonData = json_encode($charactersArray);
    print_r($charactersArray[$userId]['characters']);
    file_put_contents('app/JS/characters.json', $jsonData);
    header("Location: user.php");
}
