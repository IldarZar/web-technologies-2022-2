<!-- 
  1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
  если $a и $b положительные, вывести их разность;
  если $а и $b отрицательные, вывести их произведение;
  если $а и $b разных знаков, вывести их сумму;
  Ноль можно считать положительным числом.
 -->
 <?php
  $a = 12;
  $b = 40;

  function firstScript(float $first, float $second) {
    if ($first >= 0 && $second >= 0) {
      return $first - $second;
    } elseif ($first < 0 && $second < 0) {
      return $first * $second;
    } else { 
      return $first + $second;
    }
  }

  echo firstScript($a, $b);
?>



<!-- 
  2. Присвоить переменной $а значение в промежутке [0..15].
  С помощью оператора switch организовать вывод чисел от $a до 15.
-->

<?php
  function secondScript(float $startNumber) {
    for ($i=$startNumber; $i < 15; $i++) { 
      echo '<br>';
      switch ($i) {
        case 0:
          print_r($i);
          break;
        case 1:
          print_r($i);
          break;
        case 2:
          print_r($i);
          break;
        case 3:
          print_r($i);
          break;  
        case 4:
          print_r($i);
          break;
        case 5:
          print_r($i);
          break;
        case 6:
          print_r($i);
          break;
        case 7:
          print_r($i);
          break;   
        case 8:
          print_r($i);
          break;
        case 9:
          print_r($i);
          break;
        case 10:
          print_r($i);
          break;
        case 11:
          print_r($i);
          break;  
        case 12:
          print_r($i);
          break;
        case 13:
          print_r($i);
          break;
        case 14:
          print_r($i);
          break;
        case 15:
          print_r($i);
          break;    
      }
    }
  }

  secondScript(6);

?>

<!-- 
  3. ​​Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. 
  Обязательно использовать оператор return.
 -->
<?php 

  function operatorPlus($first, $second) {
    return $first + $second;
  }

  function operatorMinus($first, $second) {
    return $first - $minus;
  }

  function operatorMultiply($first, $second) {
    return $first * $second;
  }

  function operatorDivision($first, $second) {
    return $first / $second;
  }

?>

<!-- 
  4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, 
  $operation – строка с названием операции. 
  В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из п.3) 
  и вернуть полученное значение (использовать switch).
 -->
<br>
<?php

  function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
      case '+':
        return $arg1 + $arg2;
      case '-':
        return $arg1 - $arg2;
      case '*':
        return $arg1 * $arg2;
      case '/':
        return $arg1 / $arg2;
    }
  }
?>


<!-- 
  6. С помощью рекурсии организовать функцию возведения числа в степень.
  Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
 -->
<br>
 <?php

  function power($val, $pow) {
    if ($pow == 0) {
      return 1;
    } else {
      return power($val, $pow - 1) * $val;
    }
  }

  echo power(3, 4);
?>



<?
  $title = "Мой заголовок";
  $firstHeader = "Заголовок первого уровня";
  $currentYear = "2023";

  // 2-й способ - подключение php файла с версткой через required
  $date =  date('H:i', time());
  // require('site.php');

  // 3-ий способ - подключение html файла с версткой и заменой переменных через str_replace
  $content = file_get_contents('site.html');
  $content = str_replace("{{ date }}", $date, $content);
  $content = str_replace("{{ title }}", $title, $content);

  echo $content;
?>

<!-- 1-й способ - данные и верстка в одном файле. Плюс такого способа - среда разработки распознает переменные и не подсвечивает их красным. -->
<!--  
  5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год при помощи встроенных функций PHP. 
  Попробовать вывести 3 разными способами, как было показано на лекции.
 -->
<!-- Первый способ -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>
<body>
  <h1> <?= $firstHeader ?> </h1>
  <span> <?= $currentYear ?> </span>


  <h4>Практика 17 пункт 5. Вывод даты разными способами:</h4>
  <div>
    <?= $date ?>
  </div>

</body>
</html> -->


