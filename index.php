<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="index_files/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Лабораторная работа №3</a>
            <form class="form-inline">
                <input type="text" placeholder="Поиск" aria-label="Поиск">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>
        </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <h1 class="mt-5">Задание</h1>
        

        <button type="button" id="button_5" class="btn btn-success">Всем 5</button>
        <button type="button" class="btn btn-info">Всем 4</button>
        <button type="button" class="btn btn-warning">Всем 3</button>
        <button type="button" class="btn btn-danger">Всем 2</button>
        <button type="button" class="btn btn-primary">Очистить оценки</button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Оценка за экзамен</th>
                </tr>
            </thead>
            <tbody id="studentsTableBody">
                <!-- Здесь будут добавляться строки -->
            </tbody>
        </table>
        <button type="button" id="button_avg" class="btn btn-primary">Подсчитать средний балл</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Средняя оценка по группе:</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" id="average">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">

    </footer>

    <script src="index_files/jquery-3.6.0.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="index_files/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var students = ["Иванов Иван Иванович",
                "Петров Петр Петрович",
                "Сидоров Сидор Сидорович"
            ];

            // Добавляем строки для студентов в таблицу, если их еще нет
            if ($("#studentsTableBody").children().length === 0) {
                for (var i = 0; i < students.length; i++) {
                    $("#studentsTableBody").append("<tr><th scope='row'>" + (i + 1) + "</th><td>" + students[i] + "</td><td><input class='rating' type='text' placeholder='Балл'></td></tr>");
                }
            }

            // Обработчик нажатия кнопки "Всем 5"
            $("#button_5").click(function() {
                $(".rating").val("5");
            });

            // Обработчик нажатия кнопки "Очистить оценки"
            $(".btn-primary").click(function() {
                $(".rating").val("");
            });

            // Обработчик нажатия кнопки "Подсчитать средний балл"
            $("#button_avg").click(function() {
                var sum = 0;
                var count = 0;

                $(".rating").each(function() {
                    var rating = parseInt($(this).val(), 10);
                    if (!isNaN(rating)) {
                        sum += rating;
                        count++;
                    }
                });

                if (count === 0) {
                    $("#average").text("Все оценки пусты. Нельзя рассчитать средний балл.");
                    $("#exampleModal").modal('show');
                } else {
                    var average = sum / count;

                    // Вывод среднего результата в модальном окне
                    $("#average").text("Средняя оценка по группе: " + average.toFixed(2));
                    $("#exampleModal").modal('show');
                }
            });
        });
    </script>

</body>

</html>
