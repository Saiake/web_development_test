<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Тестовое задание</title>
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>

    <body>

        

        <div class="wrapper">

            <header>
                <img src="images/logo.png" alt="World Bank Publications" id="logo">
                <img src="images/phone.png" alt="Numbers" id="phone">
            </header>

            <nav>
                <ul><!--
                 --><li onclick="location.href='#'">Кредитные карты</li><!--
                 --><li class="active" onclick="location.href='#'">Вклады</li><!--
                 --><li onclick="location.href='#'">Дебетовая карта</li><!--
                 --><li onclick="location.href='#'">Страхование</li><!--
                 --><li onclick="location.href='#'">Друзья</li><!--
                 --><li onclick="location.href='#'">Интернет-банк</li><!--
             --></ul>
            </nav>

            <main>

                <div id="breadcrumbs">
                    <span><a href="#">Главная</a> - <a href="#">Вклады</a> - Калькулятор</span>
                </div>

                    <form method="POST" action="#" id="myform">
                        <h1>Калькулятор</h1>
                        
                        <ul>
                            <li>
                                <label for="date">Дата оформления вклада</label>
                                <input id="datepicker" name="date" type="text" required>
                                
                                <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
                                <script src="https://snipp.ru/cdn/jqueryui/1.12.1/jquery-ui.min.js"></script>
                                
                                <script>
                                $.datepicker.regional['ru'] = {
                                    closeText: 'Закрыть',
                                    prevText: 'Предыдущий',
                                    nextText: 'Следующий',
                                    currentText: 'Сегодня',
                                    monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                                    monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
                                    dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                                    dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                                    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                                    weekHeader: 'Не',
                                    dateFormat: 'dd.mm.yy',
                                    firstDay: 1,
                                    isRTL: false,
                                    showMonthAfterYear: false,
                                    yearSuffix: ''
                                };
                                $.datepicker.setDefaults($.datepicker.regional['ru']);

                                $(function(){
                                    $("#datepicker").datepicker();
                                });
                                </script>

                            </li>
                            <li>
                                <label for="sum">Сумма вклада</label>
                                <input id="sum" name="sum" type="number" min="1000" max="3000000" value="10000">
                                <input class="slider" id="sumslide" type="range" min="1000" max="3000000" step="1000" value="10000">
                            </li>
                            <li>
                                <label for="term">Срок вклада</label>
                                <select id="term" name="term" size="1" required>
                                    <option value="1 год">1 год</option>
                                    <option value="2 года">2 года</option>
                                    <option value="3 года">3 года</option>
                                    <option value="4 года">4 года</option>
                                    <option value="5 лет">5 лет</option>
                                </select>
                            </li>
                            <li>
                                <label for="rep">Пополнение вклада</label>
                                <input id="rep" name="rep" type="radio" value="Нет" checked>
                                <span>Нет</span>
                                <input id="rep" name="rep" type="radio" value="Да">
                                <span>Да</span>
                            </li>
                            <li>
                                <label for="sumpop">Сумма пополнения вклада</label>
                                <input id="sumpop" name="sumpop" type="number" min="1000" max="3000000" value="10000">
                                <input class="slider" id="sumpopslide" type="range" min="1000" max="3000000" step="1000" value="10000">
                            </li>
                        </ul>
                        <button type="submit">Рассчитать</button>
                        <p><b>Результат:</b> <span id="result">10250 руб.</span></p>

                        <script>
                            document.getElementById("sumslide").oninput = function () {
                                document.getElementById("sum").value = document.getElementById("sumslide").value;
                            }
                            document.getElementById("sum").oninput = function () {
                                document.getElementById("sumslide").value = document.getElementById("sum").value
                            }

                            document.getElementById("sumpopslide").oninput = function () {
                                document.getElementById("sumpop").value = document.getElementById("sumpopslide").value;
                            }
                            document.getElementById("sumpop").oninput = function () {
                                document.getElementById("sumpopslide").value = document.getElementById("sumpop").value
                            }

                            $(document).ready(function() {
                                $('#myform').submit(function(){
                                        $.ajax({
                                            url: 'calc.php',
                                            type: 'POST',
                                            data: $('#myform').serialize(), // <input id="id_name">
                                            success: function ( data ) {
                                                $('#result').html(data);
                                            }
                                        });
                                        return false;
                                    });
                                });
                        </script>

                    </form>

            </main>
        </div>
            
            <footer>
                <ul><!--
                 --><li onclick="location.href='#'">Кредитные карты</li><!--
                 --><li onclick="location.href='#'">Вклады</li><!--
                 --><li onclick="location.href='#'">Дебетовая карта</li><!--
                 --><li onclick="location.href='#'">Страхование</li><!--
                 --><li onclick="location.href='#'">Друзья</li><!--
                 --><li onclick="location.href='#'">Интернет-банк</li><!--
             --></ul>
            </footer>
            
        

    </body>
</html>
