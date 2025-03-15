<?php
$host = '127.0.0.1';
$dbname = 'testdb'; // Замени на свою БД
$user = 'root';
$pass = 'MyNewPass123!';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Запрос на выборку данных
    $stmt = $pdo->query("SELECT * FROM users"); // Замени my_table на свою таблицу

    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Имя</th><th>Email</th></tr>"; // Заголовки (замени на свои)

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";     // Замени 'id' на своё поле
        echo "<td>{$row['name']}</td>";   // Замени 'name' на своё поле
        echo "<td>{$row['email']}</td>";  // Замени 'email' на своё поле
        echo "</tr>";
    }

    echo "</table>";
    
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>
