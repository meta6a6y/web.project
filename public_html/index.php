<?php
/** @var $DB $title */
$title = 'Главная приюта';

require_once ($_SERVER['DOCUMENT_ROOT'] . '/obj/DB.php');
$services = $DB->selectAll('services');
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
                    <img src="<?php echo $service['img'] ?? '/img/u_default.jpg';?>">
                    <div>
                        <h3><?php echo $service['name'];?></h3>
                        <p><?php echo $service['description'];?></p>
                    </div>
                </li>
            <?php } ?>
        </ul>
<!--        <a id="arrow" href="second_index.php"><img src="img/arrow.png" width="228" height="32" alt=""></a>-->
    </div>
</main>
<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/themes/footer.php');
?>