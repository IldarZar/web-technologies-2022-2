<?
  $title = "Мой заголовок";
  $firstHeader = "Заголовок первого уровня";
  $currentYear = "2023";

  function transform_date() {

    list($hours, $minutes) = explode(':', date('H:i', time()));

    if ($hours % 100 >= 10 && $hours % 100 <= 20) {
      $hours .= ' часов';
    } else {
      if ($hours % 10 == 1) {
        $hours .= ' час';
      } elseif ($hours % 10 <= 4) {
        $hours .= ' часа';
      } elseif ($hours % 10 <= 9) {
        $hours .= ' часов';
      }
    }


    if ($minutes % 100 >= 10 && $minutes % 100 <= 20) {
      $minutes .= ' минут';
    } else {
      if ($minutes % 10 == 1) {
        $minutes .= ' минута';
      } elseif ($minutes % 10 <= 4) {
        $minutes .= ' минуты';
      } elseif ($minutes % 10 <= 9) {
        $minutes .= ' минут';
      }
    }

    return $hours . ' ' . $minutes;
  }
?>


<!DOCTYPE html>
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

  <div>  
    <? print_r(transform_date()) ?>
  </div>

</body>
</html>