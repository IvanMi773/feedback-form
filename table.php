<?php
$users = simplexml_load_file('database/data.xml');
?>
<table id="table">
    <tr id="tr">
        <th id="td">Ім'я</th>
        <th>Прізвище</th>
        <th>Email</th>
        <th>Номер телефону</th>
        <th>Фото</th>
    </tr>
        <?php foreach ($users as $user):
            $photo = 'public/img/'.$user->photo; ?>
            <tr>
                <td><?php echo $user->first_name; ?></td>
                <td><?php echo $user->last_name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->phone_number; ?></td>
                <td><img src="<?php echo $photo ?>"></td>
                <td><button id="button" style="background-color: red">Видалити</button></td>
            </tr>
        <?php endforeach; ?>
</table>




