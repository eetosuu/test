<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <script>
        function updateRealty() {
            let numberRealty = document.getElementById('inputNumRealty').value;
            let sortRealty = document.getElementById('sortRealty').value;

            let xhr = new XMLHttpRequest();
            xhr.open('POST', '/realty/updateList', true);
            xhr.send(JSON.stringify({
                'sort': sortRealty,
                'number_home': numberRealty
            }));

            xhr.onreadystatechange = function () {
                if (xhr.readyState != 4) return;

                if (xhr.status == 200) {
                    let objects = document.querySelectorAll('.card');
                    let responseJson = JSON.parse(xhr.responseText);
                    objects.forEach((card) => {
                        card.remove();
                    })
                    responseJson.forEach((card) => {
                        document.getElementById('cards').insertAdjacentHTML("beforeend", `<div id="${card.id}" class="card col-5 mt-3 mb-3">
                       <div class="row g-0">
                      <div class="col-md-5">
                       <img src="R3.jpg" class="img-fluid rounded-start" alt="...">
                       </div>
                   <div class="col-md-7">
                       <div class="card-body">
                           <h5 class="card-title"><a href="/realty/view?id=${card.id}">${card.name}</a></h5>
                         <p class="card-text">${card.address}</p>
                         <p class="card-text">${card.description}</p>
                          <p class="card-text">${card.price}</p>
                        </div>
                    </div>
                </div>
                </div>`)
                    })
                }
            }
        }
    </script>
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
                <a class="btn btn-secondary text-light " href="/realty/create">Создать объявление</a>
                <a class="text-light" href="/security/logout">Выйти</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container">
    <div class="d-flex justify-content-around mt-3">
        <select id="sortRealty" class="form-select mb-3" style="width: 30%" onchange="updateRealty()">
            <option value="DESC" selected>Сортировка по убыванию цены</option>
            <option value="ASC">Сортировка по возрастанию цены</option>
        </select>
        <div class="">
            <form action="" class="d-flex">
                <input id="inputNumRealty" type="text" class="form-control" placeholder="Поиск по № дома">
                <button onclick="updateRealty()" class="btn btn-outline-secondary" type="button">Поиск</button>
            </form>
        </div>
    </div>
    <div id="cards" class="d-flex flex-wrap justify-content-center" style="gap: 10px">
        <?php /** @var \app\model\Realty $realty */ ?>
        <?php foreach ($realtyAll as $realty): ?>
            <div id="<?= $realty->getId() ?>" class="card col-5 mt-3 mb-3">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="https://static.coolhouses.ru/images/4.2015/uyutnaya-stilnaya-kvartira-s-potryasayuschim-vidom-na-goryi-shamao-3.jpg"
                             class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title"><a
                                        href="/realty/view?id=<?= $realty->getId() ?>"><?= $realty->getName() ?></a>
                            </h5>
                            <p class="card-text"><?= $realty->getAddress() ?></p>
                            <p class="card-text"><?= $realty->getDescription() ?></p>
                            <p class="card-text"><?= $realty->getPrice() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


</div>
</body>
</html>