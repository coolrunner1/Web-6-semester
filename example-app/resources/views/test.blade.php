<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <x-title/>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body id="contact">
        <x-navbar/>
        @if ($success)
            <div id='fullscreen-overlay'>
                <div class='pop-up'>
                    Тест был успешно отправлен!
                    <div class='bottom-buttons'>
                        <a href="{{url("/")}}"><button id='yes-popup'>Вернуться домой</button></a>
                        <a href="{{url("/test")}}"><button id='yes-popup'>Вернуться к тесту</button></a>
                    </div>
                </div>
            </div>
        @endif
        @if (count($errors) > 0)
            <div id='fullscreen-overlay'>
                <div class='pop-up'>
                    <ul class="error-list">
                        <lh>Ошибки</lh>
                        @foreach($errors as $error)
                            <li class="hero-secondary">{{$error}}</li>
                        @endforeach
                    </ul>
                    <div class='bottom-buttons'>
                        <a href="{{url("/")}}"><button id='yes-popup'>Вернуться домой</button></a>
                        <a href="{{url("/test")}}"><button id='yes-popup'>Вернуться к тесту</button></a>
                    </div>
                </div>
            </div>
        @endif
        <div class="content-container">
            <div class="information">Тест по дисциплине "Инженерная графика"</div>
            <form id="survey-form" action="{{url("/test")}}" method="POST">
                @csrf <!-- {{ csrf_field() }} -->
                <label id="name-label" for="name" class="test"><span class="label-text">Фамилия Имя Отчество</span>
                    <span class="input-container input-container-test" id="name-container">
                        <input id="name" name="name" type="text" placeholder="Введите своё имя" required />
                    </span>
                </label>
                <label for="dropdown" class="test">
                    <span class="label-text">Группа</span>
                    <select id="dropdown" name="group">
                        <option>ИТ/б-24-1-о</option>
                        <option>ИТ/б-24-2-о</option>
                        <option>ИТ/б-24-3-о</option>
                        <option>ИТ/б-24-4-о</option>
                        <option>ИТ/б-24-5-о</option>
                        <option>ИТ/б-24-6-о</option>
                        <option>ИТ/б-24-7-о</option>
                        <option>ИТ/б-24-8-о</option>
                        <option>ИТ/б-23-1-о</option>
                        <option>ИТ/б-23-2-о</option>
                        <option>ИТ/б-23-3-о</option>
                        <option>ИТ/б-23-4-о</option>
                        <option>ИТ/б-23-5-о</option>
                        <option>ИТ/б-23-6-о</option>
                        <option>ИТ/б-23-7-о</option>
                        <option>ИТ/б-23-8-о</option>
                        <option>ИВТ/б-22-1-о</option>
                        <option>ИС/б-22-1-о</option>
                        <option>ИС/б-22-2-о</option>
                        <option>ПИ/б-22-1-о</option>
                        <option>ПИ/б-22-2-о</option>
                        <option>ПИН/б-22-1-о</option>
                        <option>ПИН/б-22-2-о</option>
                        <option>ИВТ/б-21-1-о</option>
                        <option>ИВТ/б-21-2-о</option>
                        <option>ИВТ/б-21-3-о</option>
                        <option>ИС/б-21-1-о</option>
                        <option>ИС/б-21-2-о</option>
                        <option>ИС/б-21-3-о</option>
                        <option>ПИ/б-21-1-о</option>
                        <option>ПИН/б-21-1-о</option>
                    </select>
                </label>
                <label id="age-label"  for="age" class="test">
                    <span class="label-text">Возраст</span>
                    <input id="age" name="age" type="number" min=0 max=150 placeholder="Введите свой возраст" required />
                </label>
                <div class="input-container" id="question1-container">
                    <label id="question1-label" for="question1" class="test">
                        <span class="label-text">Документ, определяющий состав сборочной единицы, комплекса или комплекта, называется </span>
                        <input id="question1" name="question1" type="text" placeholder="Введите ответ" required />
                    </label>
                </div>
                <div id="myboxes" class="test">
                    <label class="label-text">К группе деталей относят изделие</label>
                    <label class="check" id="plane-label">Самолёт
                        <input type="checkbox" id="plane" name="question2_1" value="plane" class="checkboxes"/>
                    </label>
                    <label class="check" id="bolt-label">Болт
                        <input type="checkbox" id="bolt" name="question2_2" value="bolt" class="checkboxes"/>
                    </label>
                    <label class="check" id="vent-label">Вентиль
                        <input type="checkbox" id="vent" name="question2_3" value="vent" class="checkboxes"/>
                    </label>
                    <label class="check" id="scissors-label">Ножницы
                        <input type="checkbox" id="scissors" name="question2_4" value="scissors" class="checkboxes"/>
                    </label>
                </div>
                <label for="dropdown2" class="test"><span class="label-text">Из чего состоит квадрат?</span></label>
                <select id="dropdown2" name="question3">
                    <optgroup label="Линии">
                        <option>Прямые линии</option>
                        <option>Прерывистые линии</option>
                        <option>Пунктирные линии</option>
                    </optgroup>
                    <optgroup label="Кривые">
                        <option>Прямые кривые</option>
                        <option>Прерывистые кривые</option>
                        <option>Пунктирные кривые</option>
                    </optgroup>
                    <optgroup label="Ломаные">
                        <option>Прямые ломаные</option>
                        <option>Прерывистые ломаные</option>
                        <option>Пунктирные ломаные</option>
                    </optgroup>
                </select>
                <div id="result"></div>
                <div class="bottom-buttons">
                    <!--<button id="but4" type="button">Проверить</button>-->
                    <button id="but2" type="submit">Отправить</button>
                    <button id="but3" type="reset">Очистить</button>
                </div>
            </form>
            <div class="secondary-contact-text">Результаты выполнения теста</div>
            <div class="results-container">
                @if (count($results) > 0)
                    @foreach($results as $result)
                        <div class="result-container">
                            <div class="result-header">{{$result->name}} ({{$result->group}}) {{$result->created_at}}</div>
                            <div class={{$result->answer1IsCorrect ? "valid-input" : "invalid-input"}}>Вопрос №1: {{$result->answer1}}</div>
                            <div class={{$result->answer2IsCorrect ? "valid-input" : "invalid-input"}}>Вопрос №2: {{$result->answer2}}</div>
                            <div class={{$result->answer3IsCorrect ? "valid-input" : "invalid-input"}}>Вопрос №3: {{$result->answer3}}</div>
                        </div>
                    @endforeach
                @else
                    <div class="hero-secondary">Результаты тестов отсутствуют</div>
                @endif
            </div>
        </div>
        <x-footer/>
    </body>
</html>
