<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game</title>
    <link href = style/style.css rel="stylesheet"/>

</head>
<body>
<div class="circle1">

</div>
<div class="circle2"></div>
<div class="circle3"></div>
<div class="circle4"></div>
<div class="circle5"></div>
<div class="container">
    
    <div class="user-name"> <?php  echo 'Hello, ' . ($_SESSION['user_name'] ?? 'unknown friend'); ?></div>
    <?php echo $game->toggleNameField() ?>
    <?php echo $game->toggleGameFields()?>
    <?php echo $game->getCorrectAnswer()?>
</div>

</body>
</html>
