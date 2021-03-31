<?php

function echoHead($jsFile, $cssFile) {	
    echo '
    <!DOCTYPE html>
    <html>

    <head>
        <title>Customer Sign-Up</title>
        <script src ="' . $jsFile . '"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" type="text/css" href="' . $cssFile . '">
    </head>
';
}//echoHead

function echoHeader($title) {	
    require_once ('../app_config.php');
    echo '
    <body>
    <main>
     <header>
        <h1>' . $title . '</h1>
        </header>
        <div class="menu">
    <li class="topmenu">
        <button class="menuname">Home</button>
        <ul class="submenu">
            <li>Link</li>
            <li>Link</li>
        </ul>
    </li>
    <li class="topmenu">
        <button class="menuname">Account</button>
        <ul class="submenu">
            <li>Login</li>
            <li><a href="' . WEB_ROOT.APP_FOLDER_NAME . '/scripts/landingPage.php">Register</a></li>
            <li>Manage</li>
        </ul>
    </li>
    <li class="topmenu">
        <button class="menuname">Email Us</button>
        <ul class="submenu">
            <li>Link</li>
            <li>Link</li>
        </ul>
    </li>
    <li class="topmenu">
    <button class="menuname">Logout</button>
    <ul class="submenu">
            <li>Link</li>
            <li>Link</li>
        </ul>
    </li>
    <li class="topmenu">
    <button class="menuname"></button>
    </li>
</div><br>
';
}//echoHeader

function echoFooter() {	
    $currDate1 = date('l dS');
    $currDate2 = date('F Y h:i:s A');
    echo '
          <footer class="footer" id="footer">
            ' . $currDate1 . ' of ' . $currDate2 . ' &copy; Copyright by naomi
            </footer><br>
           </div>
    </main>
</body>
</html>';
}
?>