<?php
    echo "<h1>My FIRST app on PHP</h1>";
    //varibals
    $name = "Alex";
    $age = 18;
    $price = 1.1;
    $isAdmin = true;
    //arrays
    $fruits=["apple","pen","itp"];
    $user=[
        "name"=> $name,
        "age" => $age,
        "city"=>"krg",
    ];
    function getAllArrays(){
        for($i=0;$i<3;$i++){
            echo "$i - ";
            echo $fruits[$i];
            echo "<br>";
        }
        $x=1;
        while($x <= 3){
            echo "Number $x <br>";
            $x++;
        }
    }; 
    $colors = ["red","green","blue"];

    function lol($colors){
        foreach($colors as $color){
            echo "color: $color <br>";
        }    
    }
    $a = [1, 14, 423, 423, 3, 4342, 3, 23, 23, 6, 8, 6, 567];

    $maxi = function() use ($a) { // Используем "use ($a)", чтобы передать массив внутрь
        $max = $a[0];
        foreach ($a as $num) {
            if ($max < $num) {
                $max = $num;
            }
        }
        return $max;
    };
    // echo "Максимальное число: " . $maxi();

    //////////////////////////////////////////////////////
    //Reads files
    echo "<h2>Files</h2>";
    //If files is BIIIG:
    $file = fopen("TestText.txt", "r"); // Открываем файл для чтения (r - read)
    function EchoFile(){
        if ($file) {
            while (($line = fgets($file)) !== false) { // Читаем построчно
                echo $line . "<br>";
            }
            fclose($file); // Закрываем файл
        } else {
            echo "Ошибка при открытии файла.";
        }
    }

    //If file is normal
    $lines = file("TestText.txt"); // Читаем файл в массив
    function EchoFileAlt(){
        foreach ($lines as $line) {
            echo $line . "<br>";
        }
    }
    
    //Write file
    $file = fopen("example.txt", "w"); // "w" - write, перезапишет файл
    function writeFil(){
        fwrite($file, "Привет, мир!\n"); // Записываем текст
        fwrite($file, "Это новая строка.\n");
        fclose($file);
    }

    //Add line to file
    $file = fopen("example.txt", "a"); // "a" - append, добавляет к существующему файлу
    function addFile(){
        fwrite($file, "Добавляем новую строку.\n");
        fclose($file);
    }
    
    //check file
    if (file_exists("example.txt")) {
        echo "Файл найден!";
    } else {
        echo "Файл не найден!";
    }

    //delete file
    function deleteFile(){
        if (file_exists("example.txt")) {
            unlink("example.txt"); // Удаляет файл
            echo "Файл удалён!";
        } else {
            echo "Файл не найден!";
        }
    }

    /////////////////////////////////
    // Gets
    echo "<br><h2>Gets from site</h2>";
?>

<form action="form_get.php" method="get">
    <label for="name">Введите имя:</label>
    <input type="text" id="name" name="name">
    <button type="submit">Отправить</button>
</form>
