<?php
/** @var $DB $title */
$title = 'Главная приюта';

require_once ($_SERVER['DOCUMENT_ROOT'] . '/obj/DB.php');
$services = $DB->selectAll('services');
//print_r($data);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Lab-КС-26">
    <title>Приют для котиков</title>
    <link href="img/favicon.png" rel="shortcut icon" type="image/svg+xml">
    <link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
    <div class="container">
        <a id="logo" href="index.php"><img src="img/logo.png" width="236" height="64" alt=""></a>
        <form action="index.php" method="get">
            <input type="text" name="search_query" placeholder="Введите поисковой запрос">
            <button type="submit"></button>
        </form>
        <a class="header_links" id="header_link_user" href="index.php"></a>
        <a class="header_links" id="header_link_cart" href="index.php"></a>
    </div>
</header>
<main>
    <div id="top_back">
        <div class="container">
            <h1>Приют sweetie</h1>
            <p>Наши питомцы - это настоящие члены семьи, и забота о них для нас безумно важна!</p>
        </div>
    </div>
    <div class="container" id="services">
        <h2>Услуги и уход</h2>
        <p id="services_text">Sweetie - это организация, предоставляющая временное или постоянное убежище
            для бездомных, покинутых или потерявшихся кошек. Мы заботимся о благополучии и комфорте кошек,
            обеспечивая им медицинский уход, кормление, проживание и поиск новых домов через усыновление.</p>
        <ul>
            <?php foreach ($services as $service) { ?>
                <li>
                    <img src="<?php echo $service['img'] ?? '/img/u_default.jpg';?>">
                    <div>
                        <h3><?php echo $service['name'];?></h3>
                        <p><?php echo $service['description'];?></p>
                    </div>
                </li>
            <?php } ?>
        </ul>

    </div>
</main>
<footer>
    <div class="container">
        <div id="contacts">
            <span>Контакты:</span>
            <a href="tel:89159659717">8 915 965 97-17</a>
            <a href="mailto:valeria.du555@mail.ru">valeria.du555@mail.ru</a>
        </div>
        <hr>
        <div id="copy">
            <p>Работу выполнила: Дубкова Валерия, группа Кс-26</p>
            <span>&copy;sweetie.kit</span>
        </div>
    </div>
</footer>
</body>
</html>