<?php

// Функція перевіряє, чи зображення повністю підлягає всім вимогам
function can_upload($file) {
    if($file['name'] == '')
        return 'Ви не вибрали файл.';

    if($file['size'] == 0)
        return 'Файл занадто великий.';

    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    $types = array('jpg', 'png', 'jpeg');

    if(!in_array($mime, $types))
        return 'Недопустимий тип файла.';

    return true;
}

    // Завантажує зображення на сервер
    function make_upload($file)
    {
        $tmp_path = '../public/img/';
        $file['name'] = mt_rand(0, 10000) . $file['name'];

        // Створюємо вихідне зображення на основі вихідного файлу
        if ($file ['type'] == 'image/jpeg')
            $src = imagecreatefromjpeg($file['tmp_name']);
        elseif ($file ['type'] == 'image/png')
            $src = imagecreatefrompng($file ['tmp_name']);
        else
            return false;

        // Визначаємо висоту і шарину зображення
        $w_src = imagesx($src);
        $h_src = imagesy($src);

        // Обмеження по ширині в пікселях
        $w = 300;

        // Якщо ширина більше заданої
        if ($w_src > $w) {
            // Вирахування пропорцій
            $ratio = $w_src / $w;
            $w_dest = round($w_src / $ratio);
            $h_dest = round($h_src / $ratio);

            // Створюємо пусту картинку
            $dest = imagecreatetruecolor($w_dest, $h_dest);

            // Копіюємо старе зображення в нове, зі зміною параметрів
            imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);

            // Вивід картинки і очишчення памяті
            imagejpeg($dest, $tmp_path . $file['name']);
            imagedestroy($dest);
            imagedestroy($src);

            return $file['name'];
        } else {
            // Вивід картинки і очишчення памяті
            imagejpeg($src, $tmp_path . $file['name']);
            imagedestroy($src);

            return $file['name'];
        }
    }


