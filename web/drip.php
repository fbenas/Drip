<?php
if (!$user = $_GET["user"]) {
    echo "no user";
}
if (!($method = $_GET["method"])) {
    $method = "";
}

switch ($method) {
    case "message":
        echo json_encode(["message" => "<li> User: " . $user .  ". Welcome to the game.</li>"]);
        break;
    case "new-user":
        echo json_encode(
            [
                "created" => date('Y-m-d H:i:s'),
                "updated"  => date('Y-m-d H:i:s'),
                "user"    => uniqid()
            ]
        );
        break;
    default:
        echo "Method '" . $method . "' not supported";
        break;
}