<?php

include 'functions/saveInXmlFile.php';
include 'functions/upload_image.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
}

// Збереження зображення
if (isset($_FILES['photo'])) {
    $check = can_upload($_FILES['photo']);

    if ($check === true) {
        $photo = make_upload($_FILES['photo']);
    } else {
        echo "<strong>$check</strong>";
    }
}

// Запис в xml файл
saveInXmlFile('data.xml', $first_name, $last_name, $email, $phone_number, $photo);

// Редірект на попередню сторінку
if (@$_SERVER['HTTP_REFERER'] != null) {
   header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
   Sys::GoHome();
}



