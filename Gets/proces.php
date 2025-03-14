<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["login"]);
    $password = htmlspecialchars($_POST["password"]);
    echo "Вы успешно зарегестрировались";
    $file = fopen("example.txt", "w"); // "w" - write, перезапишет файл
    fwrite($file, "$name\n$password"); // Записываем текст
    fclose($file);   
}
?>
