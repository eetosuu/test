<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Риэлтор</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container text-center">
    <div class="d-flex justify-content-center mt-5">
        <form method="post">
            <h3>Авторизация</h3>
            <div class="alert alert-danger <?= empty($error) ? 'visually-hidden' : '' ?>">
                <?= $error ?? '' ?>
            </div>
            <label for="username" class="visually-hidden">Имя пользователя</label>
            <input type="text" id="username" name="username" class="form-control mt-3" placeholder="Имя пользователя"
                   required="" autofocus="">
            <label for="password" class="visually-hidden">Пароль</label>
            <input type="password" id="password" name="password" class="form-control mt-3" placeholder="Пароль"
                   required="">
            <button class="btn btn-primary mt-3" type="submit">Войти</button>
        </form>
    </div>
</div>
</body>
</html>