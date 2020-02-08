<?php
$users = simplexml_load_file('database/data.xml');
?>
<table id="table">
    <tr id="tr">
        <th>Ім'я</th>
        <th>Прізвище</th>
        <th>Email</th>
        <th>Номер телефону</th>
        <th>Фото</th>
    </tr>
        <?php foreach ($users as $key => $user):
            $photo = 'public/img/'.$user->photo; ?>
            <tr>
                <td><?php echo $user->first_name; ?></td>
                <td><?php echo $user->last_name; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->phone_number; ?></td>
                <td><img src="<?php echo $photo ?>"></td>
                <td>
                    <form action="./src/delete_data.php" method="post">
                        <input type="hidden" name="email" value="<?php echo $user->email; ?>">
                        <button type="submit" id="button" style="background-color: red">Видалити</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
</table>




