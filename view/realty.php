<?php
/** @var \app\model\Realty $realty */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Агенство Недвижимости</a>
        <div class="d-flex">
            <?php if (empty($_SESSION['user'])) : ?>
                <a class="text-light" href="/security/login">Войти как риэлтор</a>
            <?php endif; ?>
            <?php if (!empty($_SESSION['user'])) : ?>
                <a class="btn btn-secondary text-light" href="/realty/create">Создать объявление</a>
                <a class="text-light" href="/security/logout">Выйти</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row justify-content-md-center mt-3">
        <div class="col-5">
            <div class="d-flex flex-column">
                <img src="https://static.coolhouses.ru/images/4.2015/uyutnaya-stilnaya-kvartira-s-potryasayuschim-vidom-na-goryi-shamao-3.jpg"
                     class="img-fluid rounded float-end" alt="...">
                <?php if (!empty($_SESSION['user'])) : ?>
                    <a class="btn btn-primary" style="width:100px" href="/realty/edit?id=<?= $realty->getId() ?>"
                       role="button">Изменить</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-5 mt-3">
            <div class="mb-3">
                <p class="fs-2 lead">
                    <?= $realty->getName() ?>
                </p>
            </div>
            <div class="mb-3">
                <p class="fs-4">
                    Адрес: <span><?= $realty->getAddress() ?></span>
                </p>

            </div>
            <div class="mb-3">
                <p class="fs-4">
                    Описание: <span><?= $realty->getDescription() ?></span>
                </p>
            </div>
            <div class="mb-3">
                <p class="fs-4">Цена: <span><?= number_format($realty->getPrice()) ?></span></p>
            </div>
        </div>
    </div>


</div>
</body>
</html>