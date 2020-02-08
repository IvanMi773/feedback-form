<form action="./src/save_data.php" method="post" id="form" enctype="multipart/form-data">
    <h1>Форма зворотнього звязку</h1>
    <input type="text" name="first_name" id="field" placeholder="Введіть ім'я"><br>
    <input type="text" name="last_name" id="field" placeholder="Введіть прізвище"><br>
    <input type="text" name="email" id="field" placeholder="Введіть email" ><br>
    <input type="text" name="phone_number" id="field" placeholder="Введіть номер телефону" ><br>
    <input type="file" name="photo"> <br>

    <button id="button" type="submit">Надіслати</button>
</form>