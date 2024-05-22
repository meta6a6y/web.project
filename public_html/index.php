<?php
/** @var $DB $title */

require_once ($_SERVER['DOCUMENT_ROOT'] . '/obj/DB.php');
$services = $DB->selectAll('services');
$adoption = $DB->selectAll('adoption');
//print_r($data);

require_once ($_SERVER['DOCUMENT_ROOT'] . '/themes/header.php');
?>
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
                    <img src="<?php echo $service['img'] ?? 'img/u_default.jpg';?>">
                    <div>
                        <h3><?php echo $service['name'];?></h3>
                        <p><?php echo $service['description'];?></p>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div id="adoption">
        <div class="container">
            <hr>
            <h2>Усыновление</h2>
            <p class="adoption_text">В нашем приюте Sweeties вас ждут очаровательные котята, ищущие дом и любящую семью!</p>
            <ul>
                <?php foreach ($adoption as $adopt) { ?>
                    <li>
                        <div>
                            <h3><?php echo $adopt['title'];?></h3>
                            <p><?php echo $adopt['description'];?></p>
                            <a class="button" href="<?php echo $adopt['link'];?>">Подробнее</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <p class="adoption_text">P.S.  Не забудьте взять с собой переноску для котёнка ♡</p>
            <hr>
            <h2>Немного наших малышей, которые оказались дома:</h2>
            <ul id="home_cats">
                <li><img src="img/home_1.jpg" alt="Гришка"></li>
                <li><img src="img/home_2.jpg" alt="Умка"></li>
                <li><img src="img/home_3.jpg" alt="Наггетс"></li>
            </ul>
        </div>
    </div>
</main>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/themes/footer.php');
?>