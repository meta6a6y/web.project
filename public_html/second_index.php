<?php
/** @var $DB $title */

require_once ($_SERVER['DOCUMENT_ROOT'] . '/obj/DB.php');
$pets = $DB->selectAll('pets');

if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];
    $DB->deletePet($delete_id);
}
$form = $DB->selectAll('form');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $experience = $_POST['experience'];
    $cause = $_POST['cause'];

    // Проверка корректности данных
    $allowed_experience_values = ['Нет опыта', 'Немного опыта', 'Много опыта'];
    if (in_array($experience, $allowed_experience_values)) {
        $DB->insertAll($name, $email, $phone, $city, $experience, $cause);
//        echo "Заявка принята, скоро мы вам перезвоним!";
    }
}
$sexes = $DB->getPetsWithSex(true);
require_once ($_SERVER['DOCUMENT_ROOT'] . '/themes/header.php');

?>
<script src="js/script.js"></script>
<main>
        <div class="container" id="about_pets">
            <h2>Наши котики</h2>
            <hr class="transparent">
            <div id="settings">
                <p class="pets_text">Настройка фильтра</p>
                <div id="search_gender">
                    <h4>Пол</h4>
                    <?php
                    if (!empty($sexes)) { ?>
                        <div data-filter="0">
                            <input class="button" id="sex0" type="checkbox" name="sex">
                            <label class="filter" for="sex0"><?php echo $sexes[1]['sex_name']; ?></label>
                        </div>
                        <div data-filter="1">
                            <input class="button" id="sex1" type="checkbox" name="sex">
                            <label class="filter" for="sex1"><?php echo $sexes[2]['sex_name']; ?></label>
                        </div>
                        <?php } ?>
                </div>
                <div id="search_coat">
                    <h4>Окрас шерсти</h4>
                    <div data-filter="0">
                        <input class="button" id="color0" type="checkbox" name="coat color">
                        <label class="filter" for="color0">Полосатый</label>
                    </div>
                    <div data-filter="1">
                        <input class="button" id="color1" type="checkbox" name="coat color">
                        <label class="filter" for="color1">Рыжий</label>
                    </div>
                    <div data-filter="2">
                        <input class="button" id="color2" type="checkbox" name="coat color">
                        <label class="filter" for="color2">Трёхцветный</label>
                    </div>
                    <div data-filter="3">
                        <input class="button" id="color3" type="checkbox" name="coat color">
                        <label class="filter" for="color3">Чёрный с белым</label>
                    </div>
                    <div data-filter="4">
                        <input class="button" id="color4" type="checkbox" name="coat color">
                        <label class="filter" for="color4">Серый с белым</label>
                    </div>
                    <div data-filter="5">
                        <input class="button" id="color5" type="checkbox" name="coat color">
                        <label class="filter" for="color5">Белый</label>
                    </div>
                    <div data-filter="6">
                        <input id="color6" type="checkbox" name="coat color">
                        <label class="filter" for="color6">Рыжий с белым</label>
                    </div>
                </div>
                <button type="submit">Найти</button>
            </div>
            <div id="pets">
                <ul>
                    <?php foreach ($pets as $pet) { ?>
                        <li>
                            <div class="pet-container">
                                <img class="img_pets" src="<?php echo $pet['img'] ?? '/img/p_default.jpg';?>">
                                <p><?php echo $pet['name'];?></p>
                                <p><?php echo $pet['age'];?></p>
                                <a href="javascript:void(0);" onclick="showModal()" class="hover-link"></a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="hideModal()">&times;</span>
            <p>Котёнка забрали?</p>
            <button onclick="confirmDelete(<?php echo $pet['id']; ?>)">Да</button>
            <button>Нет</button>
        </div>
    </div>
    <div class="container" id="form">
        <hr>
        <h2>Взять котика</h2>
        <p class="pets_text">Заполните форму, и мы с Вами свяжемся ♡</p>
        <div class="container" id="form_adoption">
            <form action="second_index.php" method="post">
                <input class="input_form" type="text" placeholder="Ваше имя" name="name">
                <input class="input_form" type="email" placeholder="Ваш email *" name="email" required>
                <input class="input_form" type="tel" placeholder="Ваш телефон *" name="phone" required>
                <input class="input_form" type="text" placeholder="Ваш город" name="city">
                <p>Опыт содержания животных:</p>
                <div data-filter="0">
                    <input class="button" id="experience0" type="radio" value="Нет опыта" name="experience" required>
                    <label class="filter" for="experience0">Нет опыта</label>
                </div>
                <div data-filter="1">
                    <input class="button" id="experience1" type="radio" value="Немного опыта" name="experience">
                    <label class="filter" for="experience1">Немного опыта</label>
                </div>
                <div data-filter="2">
                    <input class="button" id="experience2" type="radio" value="Много опыта" name="experience">
                    <label class="filter" for="experience2">Много опыта</label>
                </div>
                <input class="input_form" type="text" id="cause" name="cause" placeholder="Почему вы хотите взять котика?" required>

                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
</main>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/themes/footer.php');
?>
