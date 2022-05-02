<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<? foreach ($newsList as $news): ?>
    <a href="<?=route("news.show",['id'=>$news['id']])?>"><h1><?= $news["title"] ?></h1></a>
    <br>
    <img src="<?= $news["img"] ?>">
    <p><?= $news["desc"] ?></p>
    <br>
    <p><?= $news["author"] ?></p>
    <br>
    <p><?= $news['date_create'] ?></p>
    <hr>
<? endforeach; ?>
</body>
</html>
