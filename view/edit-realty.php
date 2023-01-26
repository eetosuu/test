<?php
/** @var \app\model\Realty $realty */
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактор</title>
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
    <div class="row justify-content-md-center">
        <div class="col-5">
            <img src="https://static.coolhouses.ru/images/4.2015/uyutnaya-stilnaya-kvartira-s-potryasayuschim-vidom-na-goryi-shamao-3.jpg"
                 class="mt-3 img-fluid" alt="...">
        </div>
        <form method="post" class="col-5">
            <div class="mb-3">
                <label for="name" class="form-label">Название объекта</label>
                <input name="name" type="text" class="form-control" id="name" value="<?= $realty->getName() ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Адрес</label>
                <input name="address" type="text" class="form-control" id="address"
                       value="<?= $realty->getAddress() ?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input name="price" type="text" class="form-control" id="price" value="<?= $realty->getPrice() ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea name="description" class="form-control" id="description"
                          rows="3"><?= $realty->getDescription() ?></textarea>
            </div>
            <select name="is_relevance" class="form-select mb-3">
                <option value="1" <?= $realty->isRelevance() ? 'selected' : '' ?> >Актуальное</option>
                <option value="0" <?= !$realty->isRelevance() ? 'selected' : '' ?>>Неактуальное</option>
            </select>
            <div class="mb-3">
                <label for="formFile" class="form-label">Загрузить фото</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>


</div>
</body>
</html>