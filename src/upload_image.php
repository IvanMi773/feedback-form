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

        // Ограничение по ширине в пикселях
        $max_size = 300;

        // Cоздаём исходное изображение на основе исходного файла
        if ($file ['type'] == 'image/jpeg')
            $source = imagecreatefromjpeg($file['tmp_name']);
        elseif ($file ['type'] == 'image/png')
            $source = imagecreatefrompng($file ['tmp_name']);
        else
            return false;

        $src = $source;

        // Определяем ширину и высоту изображения
        $w_src = imagesx($src);
        $h_src = imagesy($src);

        // В зависимости от типа (эскиз или большое изображение) устанавливаем ограничение по ширине.
        $w = $max_size;

        // Если ширина больше заданной
        if ($w_src > $w) {
            // Вычисление пропорций
            $ratio = $w_src / $w;
            $w_dest = round($w_src / $ratio);
            $h_dest = round($h_src / $ratio);

            // Создаём пустую картинку
            $dest = imagecreatetruecolor($w_dest, $h_dest);

            // Копируем старое изображение в новое с изменением параметров
            imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);

            // Вывод картинки и очистка памяти
            imagejpeg($dest, $tmp_path . $file['name']);
            imagedestroy($dest);
            imagedestroy($src);

            return $file['name'];
        } else {
            // Вывод картинки и очистка памяти
            imagejpeg($src, $tmp_path . $file['name']);
            imagedestroy($src);

            return $file['name'];
        }
    }


