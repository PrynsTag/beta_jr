<?php
require_once "dbConnection.inc";
session_start();

if (isset($_POST["resetPass"])) {
    $newPass = $_POST["newPass"];
    $username = $_SESSION["username"];
    $oldPass = $_SESSION["password"];
    $currPass = $_POST["currPass"];

    if (isset($conn) && $conn) {
        $query = "UPDATE sa4_database.sa4_table SET password = '$newPass' WHERE username = '$username' AND password = '$oldPass';";

        if ($oldPass !== $currPass) { echo "Current password is not the same with the old password"; }
        else {
            mysqli_query($conn, $query);
            $_SESSION["password"] = $newPass;
            header("Location: ./profile_panel.php?status=success");
        }
    }
}