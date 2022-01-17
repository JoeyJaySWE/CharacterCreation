<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 
session_start();
$_SESSION['user'] = "Raas/Joya (Gsus)";
$_SESSION['userId'] = 1;
$page_title = "Crew Sheets - User Page";
$style = "styles/css/default.css";
$userName = $_SESSION['user'];
$userId = $_SESSION['userId'];

// ----------------------------------------------------------------


// ----------------- [ META DATA ] --------------------------------

$meta_title = "User Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// ----------------------------------------------------------------


// Import the Composer Autoloader to make the SDK classes accessible:
require 'vendor/autoload.php';

// Load our environment variables from the .env file:
(Dotenv\Dotenv::createImmutable(__DIR__))->load();
// die(var_dump(print_r($_ENV)));
// Now instantiate the Auth0 class with our configuration:
$auth0 = new \Auth0\SDK\Auth0([
    'domain' => $_ENV['AUTH0_DOMAIN'],
    'clientId' => $_ENV['AUTH0_CLIENT_ID'],
    'clientSecret' => $_ENV['AUTH0_CLIENT_SECRET'],
    'cookieSecret' => $_ENV['AUTH0_COOKIE_SECRET']
]);

use Steampixel\Route;

define('ROUTE_URL_INDEX', rtrim($_ENV['AUTH0_BASE_URL'], '/'));
define('ROUTE_URL_LOGIN', ROUTE_URL_INDEX . '/login');
define('ROUTE_URL_CALLBACK', ROUTE_URL_INDEX . '/callback');
// die(var_dump(ROUTE_URL_CALLBACK));
define('ROUTE_URL_LOGOUT', ROUTE_URL_INDEX . '/logout');

Route::add('/', function () use ($auth0) {
    $session = $auth0->getCredentials();


    if ($session === null) {
        echo '<p>Please <a href="/login">log in</a>!</p>';
        return;
    }
    renderPage();
});

Route::add('/login', function () use ($auth0) {
    $auth0->clear();

    header("Location: " . $auth0->login(ROUTE_URL_CALLBACK));
    exit;
});

Route::add('/callback', function () use ($auth0) {

    // Have the SDK complete the authentication flow:
    $auth0->exchange(ROUTE_URL_CALLBACK);
    die(var_dump("test"));
    // Finally, redirect our end user back to the / index route, to display their user profile:
    header("Location: " . ROUTE_URL_INDEX);
    exit;
});

Route::add('/logout', function () use ($auth0) {
    header("Location: " . $auth0->logout(ROUTE_URL_INDEX));
    exit;
});

Route::run('/');

function renderPage()
{
    include __DIR__ . "/views/header.php";
    // $_SESSION['charId'] = "raasPrudii";
?>

    <div id="userBox">
        <section class="scrollWrapper">

            <img class='avatar' src="https://cdn.discordapp.com/attachments/771005073056464926/864953362399363083/unknown.png" />
            <h2>Welcome<br /><span class="username"><?= $userName; ?></span></h2>
            <details open>
                <summary class="button defaultBtn">
                    Sheets
                </summary>
                <form action="sheet/character/personallity.php" method="POST">
                    <?php

                    $jsonCharacters = file_get_contents('app/JS/characters.json');
                    $fileChracters = json_decode($jsonCharacters, true);
                    if (array_key_exists($userId, $fileChracters)) :
                        $characters = $fileChracters[$userId]['characters'];
                        $i = 1;
                        foreach ($characters as $character) : ?>
                            <div>
                                <button name="character" class="defaultBtn subBtn" value="<?= $character['name'] ?>"><?= $character['name'] ?></button>
                                <button name="deleteCharacter" type="button" value="<?= $character['slug'] ?>" class="cancelBtn" id="deleteChar<?= $i; ?>">X</button>
                            </div>
                    <?php
                            $i++;
                        endforeach;
                    endif;


                    ?>
                    <button name="newSheet" id="addSheetLnk" class='button greenBtn subBtn'>+ Add</button>
                </form>
            </details>
        </section>
    </div>

<?php

    include __DIR__ . "/views/footer.php";

    echo "<pre>";
    print_r($session->user);
    echo "</pre>";

    echo "<p>You can now <a href='/logout'>log out</a>.</p>";
}
?>