<?php
$host = '127.0.0.1';
$dbname = 'mynewdb'; 
$user = 'root';
$pass = 'MyNewPass123!';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $new_login = trim($_POST["login"] ?? '');
        $new_pass = trim($_POST["password"] ?? '');
        $new_pass_ver = trim($_POST["password_ver"] ?? '');
        
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE login = :login");
        $stmt->execute(['login' => $new_login]);
        $exists = $stmt->fetchColumn() > 0;

        if ($exists) {
            echo "Такой пользователь уже существует.";
        } else{
            if($new_pass_ver==$new_pass){
                $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
                $stmt->execute(['login' => $new_login, 'password' => $new_pass]);

                echo "Регистрация успешна!";
            } else{
                echo "ПАРОЛИ НЕ СОВПАДАЮТ!";
            }
        }
    } catch(PDOException $e){
        echo "Ошибка: " . $e->getMessage();
    }
}
?>