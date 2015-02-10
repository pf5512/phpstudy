<?php
    header("Content-Type:text/html; charset=utf8");
    require_once("./user.class.php");
    $user = new User("HelloWorld","123456");
    $user->insert();
    $users = User::getAllUser();
    foreach ($users as $u) {
        echo "<br/>".$u->name."<br/>".$u->password."<br/>";
    }
?>