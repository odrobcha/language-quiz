<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game</title>
</head>
<body>
    <div> <?php  echo 'Hello, ' . ($_SESSION['user_name'] ?? 'unknown friend'); ?></div>
    <?php echo $game->toggleNameField() ?>
    <?php echo $game->toggleGameFields()?>
    <?php echo $game->getCorrectAnswer()?>
</body>
</html>
