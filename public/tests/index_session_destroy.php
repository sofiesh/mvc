<?php
include(__DIR__ . "/config.php");
include(__DIR__ . "/../src/autoload.php");

/**
 * Destroy the session
 */

session_name("sofiesh");
session_start();

 // Unset session variables (ALL)
$_SESSION = [];

 // If killing the session, also delete cookies not just session data
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
      session_name(),
      '',
      time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
   );
}

 // Destroying the session
session_destroy();
echo "The session is destroyed.";
