// Функция для отображения модального окна
function showModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
}

// Функция для скрытия модального окна
function hideModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}

// Функция для удаление строки в DB
function confirmDelete(id) {
    showModal();
    var modal = document.getElementById("myModal");
    modal.dataset.id = id;

    // Отправляем запрос на сервер с помощью AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "second_index.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // После успешного удаления перезагрузка страница
            window.location.reload();
        }
    };
    xhr.send("delete_id=" + id);
}