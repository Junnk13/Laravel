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
<?foreach ($categoryList as $category):?>
    <a href="<?=route("news.catnews",['idCategory'=>$category['id']])?>"><h3><?= $category["title"] ?></h3></a>
    <br>
<?endforeach;?>
</body>
</html
