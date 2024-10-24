<?php
// Перевірка, чи була форма надіслана
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отримання даних з форми
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $question1 = htmlspecialchars($_POST['question1']);
    $question2 = htmlspecialchars($_POST['question2']);
    $question3 = htmlspecialchars($_POST['question3']);
    $question4 = htmlspecialchars($_POST['question4']);
    
    // Форматування дати і часу для назви файлу та відображення на сторінці
    $timestamp = date("Y-m-d H:i:s"); // Для виведення на сторінці
    $filename_timestamp = date("Y-m-d_H-i-s"); // Для назви файлу
    
    // Назва файлу з датою і часом
    $filename = "survey/response_" . $filename_timestamp . ".txt";
    
    // Перевіряємо, чи існує папка "survey", якщо ні — створюємо її
    if (!is_dir("survey")) {
        mkdir("survey", 0777, true);
    }

    // Формуємо зміст файлу
    $content = "Ім'я: " . $name . "\n";
    $content .= "Email: " . $email . "\n";
    $content .= "Ваш вік: " . $question1 . "\n";
    $content .= "Чим ви займаєтесь?: " . $question2 . "\n";
    $content .= "Чи подобається вам навчання?: " . $question3 . "\n";
    $content .= "Улюблена дисципліна: " . $question4 . "\n";
    $content .= "Дата і час заповнення: " . $timestamp . "\n";
    
    // Записуємо зміст у файл
    file_put_contents($filename, $content);

    // Виводимо підтвердження на екран разом з датою і часом
    echo "<h1>Результати опитування збережено!</h1>";
    echo "Ім'я: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Ваш вік: " . $question1 . "<br>";
    echo "Чим ви займаєтесь?: " . $question2 . "<br>";
    echo "Чи подобається вам навчання?: " . $question3 . "<br>";
    echo "Улюблена дисципліна: " . $question4 . "<br>";
    echo "<br><strong>Дата і час заповнення форми: " . $timestamp . "</strong><br>";
} else {
    echo "Будь ласка, надішліть форму.";
}
?>
