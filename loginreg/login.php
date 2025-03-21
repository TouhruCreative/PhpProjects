<?php
$host = '127.0.0.1';
$dbname = 'mynewdb'; 
$user = 'root';
$pass = 'MyNewPass123!';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST["login"] ?? '';
        $password = $_POST["password"] ?? '';

        // Подготовленный запрос (теперь он правильно работает)
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :user");
        $stmt->execute(['user' => $name]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password==$user['password']){//password_verify($password, $user['password'])) {
            echo "ALL GOOD";
        } else {
            echo "no-no-no mister FISH";
        }
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage(); // Покажет ошибку, если есть
    }
}
?>
