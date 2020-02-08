<?php

$users = simplexml_load_file('../database/data.xml');

$node = substr('users', 0, -1);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
}
$i = 1;
foreach ($users as $user) {
    if ($user->email == $email) {

        $nodes = $users->xpath('/users/user[' . $i . ']');

        if (count($nodes) > 0) {
            $dom = dom_import_simplexml($nodes[0]);
            $dom->parentNode->removeChild($dom);

            $users->asXML('../database/data.xml');
        }

    }
    $i++;
}


if (@$_SERVER['HTTP_REFERER'] != null) {
    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    Sys::GoHome();
}
