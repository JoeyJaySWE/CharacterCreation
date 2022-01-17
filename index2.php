<?php

// ----------------- [ PAGE VARIABLES ] ------------------ 

$page_title = "Crew Sheets - Sign in";
$style = "styles/css/default.css";

// ----------------- [ META DATA ] --------------------------------

$meta_title = "Crew Sheets";
$meta_desc = "What makes your chracter tic? Well, we sure as hell don't know, so how about you help us out here?";
$meta_img = "http://vengefulscars.com/img/Flag_logo.png";
$meta_card = "summary";
$meta_card_alt = "Vengeful Scars";

// ----------------------------------------------------------------

// ----------------------------------------------------------------


require 'vendor/autoload.php';

(Dotenv\Dotenv::createImmutable(__DIR__))->load();

$auth0 = new \Auth0\SDK\Auth0([
    'domain' => $_ENV['AUTH0_DOMAIN'],
    'clientId' => $_ENV['AUTH0_CLINET_ID'],
    'clientSecrete' => $_ENV['AUTH0_CLIENT_SECRETE'],
    'cookeiSecrete' => $_ENV['AUTH0_COOKIE_SECRETE']
]);


include __DIR__ . "/views/header.php";

?>
<div id="userBox">
    <h1>Crew Sheets</h1>
    <a href="user.php" class="discordBtn">Sign in through discord</a>
    <p class="finePrint">
        In order to use this site,
        you need to sign in using your discord account.
        This way we can directly integrate your sheet to your discord
        and inform about CP and other event realted effects.
    </p>
</div>

<?php

include __DIR__ . "/views/footer.php";

?>