@extends('front.layouts.app')
@section('title')
    Поступление на магистратуру в Академию Гражданской Авиации
@endsection
@section('content')
    <section id="enrollee">
        <div class="container">
            <h1>Онлайн регистрация на магистратуру</h1>
            <div class="enrollee">
                <form action="{{ route('front.enrollee.master.store') }}" method="POST" id="form">
                    @csrf
                    <input type="hidden" name="type" value="Магистратура">
                    <input type="hidden" name="status" value="0">
                    <div class="flex">
                        <div id="programmsBlock">
                            <label for="programms">Образовательная программа</label>
                            <select name="programms" id="programms" onchange="programmsFunc()" required>
                                <option value="null" disabled selected>-----</option>
                                <option value="Авиационная техника и технологии (профильная магистратура)">Авиационная
                                    техника и
                                    технологии (профильная магистратура)</option>
                                <option value="Авиационная техника и технологии (научно-педагогическая магистратура)">
                                    Авиационная техника и технологии (научно-педагогическая магистратура)</option>
                                <option
                                    value="Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая магистратура)">
                                    Летная эксплуатация летательных аппаратов и двигателей (научно-педагогическая
                                    магистратура)
                                </option>
                                <option
                                    value="Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)">
                                    Летная эксплуатация летательных аппаратов и двигателей (профильная магистратура)
                                </option>
                                <option
                                    value="Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)">
                                    Организация перевозок, движения и эксплуатация транспорта (профильная магистратура)
                                </option>
                                <option
                                    value="Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая магистратура)">
                                    Организация перевозок, движения и эксплуатация транспорта (научно-педагогическая
                                    магистратура)</option>
                            </select>
                        </div>
                        <div class="disabled" id="languageBlock">
                            <label for="language">Язык обучения:</label>
                            <select name="language" id="language" onchange="languageFunc()" required>
                                <option value="" disabled selected>-----</option>
                                <option value="Русский">Русский</option>
                            </select>
                        </div>
                        <div class="disabled" id="haveTestBlock">
                            <label for="have_test">Имеются ли результаты комплексного тестирования (КТ)?</label>
                            <select name="have_test" id="have_test" onchange="haveTestFunction()" required>
                                <option value="" disabled selected>-----</option>
                                <option value="0">Нет</option>
                                <option value="1">Да</option>
                            </select>
                        </div>
                        <div class="disabled" id="tgoMagisterBlock">
                            <label for="tgo_magister">Тест на готовность к обучению:</label>
                            <select name="tgo_magister" id="tgo_magister" onchange="tgoFunction()">
                                <option value="" disabled selected>-----</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                        <div class="disabled" id="profSubMagister1Block">
                            <label for="prof_sub_magister_1">Тест с 1 правильным ответом</label>
                            <select name="prof_sub_magister_1" id="prof_sub_magister_1" onchange="profSubMagister1Func()">
                                <option value="" disabled selected>-----</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="disabled" id="profSubMagister2Block">
                            <label for="prof_sub_magister_2">Тест с 1 и несколькими правильными ответами</label>
                            <select name="prof_sub_magister_2" id="prof_sub_magister_2" onchange="profSubMagister2Func()">
                                <option value="" disabled selected>-----</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="disabled" id="engMagisterBlock">
                            <label for="eng_magister">Английский язык:</label>
                            <select name="eng_magister" id="eng_magister" onchange="englishMasterFunc()">
                                <option value="" disabled selected>-----</option>
                                <option value="0">0</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                                <option value="32">32</option>
                                <option value="33">33</option>
                                <option value="34">34</option>
                                <option value="35">35</option>
                                <option value="36">36</option>
                                <option value="37">37</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                                <option value="46">46</option>
                                <option value="47">47</option>
                                <option value="48">48</option>
                                <option value="49">49</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="disabled" id="citizenBlock">
                            <label for="citizen">Гражданство:</label>
                            <select name="citizen" id="citizen" onchange="citizenFunc()" required>
                                <option value="null" disabled selected>-----</option>
                                <option value="Резидент РК">Резидент РК</option>
                                <option value="Нерезидент РК">Нерезидент РК</option>
                            </select>
                        </div>
                        <div id="countryBlock" class="disabled">
                            <label for="countries">Страна</label>
                            <select name="countries" id="countries" onchange="countryFunc()">
                                <option value="null" disabled selected>-----</option>
                                <option value="Австралия">Австралия</option>
                                <option value="Австрия">Австрия</option>
                                <option value="Азербайджан">Азербайджан</option>
                                <option value="Албания">Албания</option>
                                <option value="Алжир">Алжир</option>
                                <option value="Американское Самоа">Американское Самоа</option>
                                <option value="Ангилья">Ангилья</option>
                                <option value="Ангола">Ангола</option>
                                <option value="Андорра">Андорра</option>
                                <option value="Антигуа и Барбуда">Антигуа и Барбуда</option>
                                <option value="Аргентина">Аргентина</option>
                                <option value="Армения">Армения</option>
                                <option value="Аруба">Аруба</option>
                                <option value="Афганистан">Афганистан</option>
                                <option value="Багамы">Багамы</option>
                                <option value="Бангладеш">Бангладеш</option>
                                <option value="Барбадос">Барбадос</option>
                                <option value="Бахрейн">Бахрейн</option>
                                <option value="Беларусь">Беларусь</option>
                                <option value="Белиз">Белиз</option>
                                <option value="Бельгия">Бельгия</option>
                                <option value="Бенин">Бенин</option>
                                <option value="Бермуды">Бермуды</option>
                                <option value="Болгария">Болгария</option>
                                <option value="Боливия">Боливия</option>
                                <option value="Бонайре, Синт-Эстатиус и Саба">Бонайре, Синт-Эстатиус и Саба</option>
                                <option value="Босния и Герцеговина">Босния и Герцеговина</option>
                                <option value="Ботсвана">Ботсвана</option>
                                <option value="Бразилия">Бразилия</option>
                                <option value="Бруней-Даруссалам">Бруней-Даруссалам</option>
                                <option value="Буркина-Фасо">Буркина-Фасо</option>
                                <option value="Бурунди">Бурунди</option>
                                <option value="Бутан">Бутан</option>
                                <option value="Вануату">Вануату</option>
                                <option value="Ватикан">Ватикан</option>
                                <option value="Великобритания">Великобритания</option>
                                <option value="Венгрия">Венгрия</option>
                                <option value="Венесуэла">Венесуэла</option>
                                <option value="Виргинские острова, Британские">Виргинские острова, Британские</option>
                                <option value="Виргинские острова, США">Виргинские острова, США</option>
                                <option value="Восточный Тимор">Восточный Тимор</option>
                                <option value="Вьетнам">Вьетнам</option>
                                <option value="Габон">Габон</option>
                                <option value="Гаити">Гаити</option>
                                <option value="Гайана">Гайана</option>
                                <option value="Гамбия">Гамбия</option>
                                <option value="Гана">Гана</option>
                                <option value="Гваделупа">Гваделупа</option>
                                <option value="Гватемала">Гватемала</option>
                                <option value="Гвинея">Гвинея</option>
                                <option value="Гвинея-Бисау">Гвинея-Бисау</option>
                                <option value="Германия">Германия</option>
                                <option value="Гибралтар">Гибралтар</option>
                                <option value="Гондурас">Гондурас</option>
                                <option value="Гонконг">Гонконг</option>
                                <option value="Гренада">Гренада</option>
                                <option value="Гренландия">Гренландия</option>
                                <option value="Греция">Греция</option>
                                <option value="Грузия">Грузия</option>
                                <option value="Гуам">Гуам</option>
                                <option value="Дания">Дания</option>
                                <option value="Джибути">Джибути</option>
                                <option value="Доминика">Доминика</option>
                                <option value="Доминиканская Республика">Доминиканская Республика</option>
                                <option value="Египет">Египет</option>
                                <option value="Замбия">Замбия</option>
                                <option value="Западная Сахара">Западная Сахара</option>
                                <option value="Зимбабве">Зимбабве</option>
                                <option value="Израиль">Израиль</option>
                                <option value="Индия">Индия</option>
                                <option value="Индонезия">Индонезия</option>
                                <option value="Иордания">Иордания</option>
                                <option value="Ирак">Ирак</option>
                                <option value="Иран">Иран</option>
                                <option value="Ирландия">Ирландия</option>
                                <option value="Исландия">Исландия</option>
                                <option value="Испания">Испания</option>
                                <option value="Италия">Италия</option>
                                <option value="Йемен">Йемен</option>
                                <option value="Кабо-Верде">Кабо-Верде</option>
                                <option value="Казахстан">Казахстан</option>
                                <option value="Камбоджа">Камбоджа</option>
                                <option value="Камерун">Камерун</option>
                                <option value="Канада">Канада</option>
                                <option value="Катар">Катар</option>
                                <option value="Кения">Кения</option>
                                <option value="Кипр">Кипр</option>
                                <option value="Кирибати">Кирибати</option>
                                <option value="Китай">Китай</option>
                                <option value="Колумбия">Колумбия</option>
                                <option value="Коморы">Коморы</option>
                                <option value="Конго">Конго</option>
                                <option value="Конго, демократическая республика">Конго, демократическая республика</option>
                                <option value="Коста-Рика">Коста-Рика</option>
                                <option value="Кот д`Ивуар">Кот д`Ивуар</option>
                                <option value="Куба">Куба</option>
                                <option value="Кувейт">Кувейт</option>
                                <option value="Кыргызстан">Кыргызстан</option>
                                <option value="Кюрасао">Кюрасао</option>
                                <option value="Лаос">Лаос</option>
                                <option value="Латвия">Латвия</option>
                                <option value="Лесото">Лесото</option>
                                <option value="Либерия">Либерия</option>
                                <option value="Ливан">Ливан</option>
                                <option value="Ливия">Ливия</option>
                                <option value="Литва">Литва</option>
                                <option value="Лихтенштейн">Лихтенштейн</option>
                                <option value="Люксембург">Люксембург</option>
                                <option value="Маврикий">Маврикий</option>
                                <option value="Мавритания">Мавритания</option>
                                <option value="Мадагаскар">Мадагаскар</option>
                                <option value="Макао">Макао</option>
                                <option value="Македония">Македония</option>
                                <option value="Малави">Малави</option>
                                <option value="Малайзия">Малайзия</option>
                                <option value="Мали">Мали</option>
                                <option value="Мальдивы">Мальдивы</option>
                                <option value="Мальта">Мальта</option>
                                <option value="Марокко">Марокко</option>
                                <option value="Мартиника">Мартиника</option>
                                <option value="Маршалловы Острова">Маршалловы Острова</option>
                                <option value="Мексика">Мексика</option>
                                <option value="Микронезия, федеративные штаты">Микронезия, федеративные штаты</option>
                                <option value="Мозамбик">Мозамбик</option>
                                <option value="Молдова">Молдова</option>
                                <option value="Монако">Монако</option>
                                <option value="Монголия">Монголия</option>
                                <option value="Монтсеррат">Монтсеррат</option>
                                <option value="Мьянма">Мьянма</option>
                                <option value="Намибия">Намибия</option>
                                <option value="Науру">Науру</option>
                                <option value="Непал">Непал</option>
                                <option value="Нигер">Нигер</option>
                                <option value="Нигерия">Нигерия</option>
                                <option value="Нидерланды">Нидерланды</option>
                                <option value="Никарагуа">Никарагуа</option>
                                <option value="Ниуэ">Ниуэ</option>
                                <option value="Новая Зеландия">Новая Зеландия</option>
                                <option value="Новая Каледония">Новая Каледония</option>
                                <option value="Норвегия">Норвегия</option>
                                <option value="Объединенные Арабские Эмираты">Объединенные Арабские Эмираты</option>
                                <option value="Оман">Оман</option>
                                <option value="Остров Мэн">Остров Мэн</option>
                                <option value="Остров Норфолк">Остров Норфолк</option>
                                <option value="Острова Кайман">Острова Кайман</option>
                                <option value="Острова Кука">Острова Кука</option>
                                <option value="Острова Теркс и Кайкос">Острова Теркс и Кайкос</option>
                                <option value="Пакистан">Пакистан</option>
                                <option value="Палау">Палау</option>
                                <option value="Палестинская автономия">Палестинская автономия</option>
                                <option value="Панама">Панама</option>
                                <option value="Папуа - Новая Гвинея">Папуа - Новая Гвинея</option>
                                <option value="Парагвай">Парагвай</option>
                                <option value="Перу">Перу</option>
                                <option value="Питкерн">Питкерн</option>
                                <option value="Польша">Польша</option>
                                <option value="Португалия">Португалия</option>
                                <option value="Пуэрто-Рико">Пуэрто-Рико</option>
                                <option value="Реюньон">Реюньон</option>
                                <option value="Россия">Россия</option>
                                <option value="Руанда">Руанда</option>
                                <option value="Румыния">Румыния</option>
                                <option value="США">США</option>
                                <option value="Сальвадор">Сальвадор</option>
                                <option value="Самоа">Самоа</option>
                                <option value="Сан-Марино">Сан-Марино</option>
                                <option value="Сан-Томе и Принсипи">Сан-Томе и Принсипи</option>
                                <option value="Саудовская Аравия">Саудовская Аравия</option>
                                <option value="Свазиленд">Свазиленд</option>
                                <option value="Святая Елена">Святая Елена</option>
                                <option value="Северная Корея">Северная Корея</option>
                                <option value="Северные Марианские острова">Северные Марианские острова</option>
                                <option value="Сейшелы">Сейшелы</option>
                                <option value="Сенегал">Сенегал</option>
                                <option value="Сент-Винсент">Сент-Винсент</option>
                                <option value="Сент-Китс и Невис">Сент-Китс и Невис</option>
                                <option value="Сент-Люсия">Сент-Люсия</option>
                                <option value="Сент-Пьер и Микелон">Сент-Пьер и Микелон</option>
                                <option value="Сербия">Сербия</option>
                                <option value="Сингапур">Сингапур</option>
                                <option value="Синт-Мартен">Синт-Мартен</option>
                                <option value="Сирийская Арабская Республика">Сирийская Арабская Республика</option>
                                <option value="Словакия">Словакия</option>
                                <option value="Словения">Словения</option>
                                <option value="Соломоновы Острова">Соломоновы Острова</option>
                                <option value="Сомали">Сомали</option>
                                <option value="Судан">Судан</option>
                                <option value="Суринам">Суринам</option>
                                <option value="Сьерра-Леоне">Сьерра-Леоне</option>
                                <option value="Таджикистан">Таджикистан</option>
                                <option value="Таиланд">Таиланд</option>
                                <option value="Тайвань">Тайвань</option>
                                <option value="Танзания">Танзания</option>
                                <option value="Того">Того</option>
                                <option value="Токелау">Токелау</option>
                                <option value="Тонга">Тонга</option>
                                <option value="Тринидад и Тобаго">Тринидад и Тобаго</option>
                                <option value="Тувалу">Тувалу</option>
                                <option value="Тунис">Тунис</option>
                                <option value="Туркменистан">Туркменистан</option>
                                <option value="Турция">Турция</option>
                                <option value="Уганда">Уганда</option>
                                <option value="Узбекистан">Узбекистан</option>
                                <option value="Украина">Украина</option>
                                <option value="Уоллис и Футуна">Уоллис и Футуна</option>
                                <option value="Уругвай">Уругвай</option>
                                <option value="Фарерские острова">Фарерские острова</option>
                                <option value="Фиджи">Фиджи</option>
                                <option value="Филиппины">Филиппины</option>
                                <option value="Финляндия">Финляндия</option>
                                <option value="Фолклендские острова">Фолклендские острова</option>
                                <option value="Франция">Франция</option>
                                <option value="Французская Гвиана">Французская Гвиана</option>
                                <option value="Французская Полинезия">Французская Полинезия</option>
                                <option value="Хорватия">Хорватия</option>
                                <option value="Центрально-Африканская Республика">Центрально-Африканская Республика</option>
                                <option value="Чад">Чад</option>
                                <option value="Черногория">Черногория</option>
                                <option value="Чехия">Чехия</option>
                                <option value="Чили">Чили</option>
                                <option value="Швейцария">Швейцария</option>
                                <option value="Швеция">Швеция</option>
                                <option value="Шпицберген и Ян Майен">Шпицберген и Ян Майен</option>
                                <option value="Шри-Ланка">Шри-Ланка</option>
                                <option value="Эквадор">Эквадор</option>
                                <option value="Экваториальная Гвинея">Экваториальная Гвинея</option>
                                <option value="Эритрея">Эритрея</option>
                                <option value="Эстония">Эстония</option>
                                <option value="Эфиопия">Эфиопия</option>
                                <option value="Южная Корея">Южная Корея</option>
                                <option value="Южно-Африканская Республика">Южно-Африканская Республика</option>
                                <option value="Южный Судан">Южный Судан</option>
                                <option value="Ямайка">Ямайка</option>
                                <option value="Япония">Япония</option>
                            </select>
                        </div>
                        <div id="regionBlock" class="disabled">
                            <label for="region">Регион</label>
                            <select name="region" id="region" onchange="regionFunc()">
                                <option value="null" disabled selected>-----</option>
                                <option value="г. Алматы">г. Алматы</option>
                                <option value="г. Астана">г. Астана</option>
                                <option value="г. Шымкент">г. Шымкент</option>
                                <option value="Абайская обл.">Абайская обл.</option>
                                <option value="Акмолинская обл.">Акмолинская обл.</option>
                                <option value="Актюбинская обл.">Актюбинская обл.</option>
                                <option value="Алматинская обл.">Алматинская обл.</option>
                                <option value="Атырауская обл.">Атырауская обл.</option>
                                <option value="Восточно-Казахстанская обл.">Восточно-Казахстанская обл.</option>
                                <option value="Жамбыльская обл.">Жамбыльская обл.</option>
                                <option value="Жетысуская обл.">Жетысуская обл.</option>
                                <option value="Западно-Казахстанская обл.">Западно-Казахстанская обл.</option>
                                <option value="Карагандинская обл.">Карагандинская обл.</option>
                                <option value="Костанайская обл.">Костанайская обл.</option>
                                <option value="Кызылординская обл.">Кызылординская обл.</option>
                                <option value="Мангистауская обл.">Мангистауская обл.</option>
                                <option value="Павлодарская обл.">Павлодарская обл.</option>
                                <option value="Северо-Казахстанская обл.">Северо-Казахстанская обл.</option>
                                <option value="Туркестанская обл.">Туркестанская обл.</option>
                                <option value="Улытауская обл.">Улытауская обл.</option>
                            </select>
                        </div>
                        <div id="iinBlock" class="disabled">
                            <label for="iin">ИИН</label>
                            <input type="text" name="iin" id="iin" placeholder="Введите номер ИИН">
                        </div>
                        <div id="surnameBlock" class="disabled">
                            <label for="surname">Фамилия</label>
                            <input type="text" name="surname" placeholder="Согласно документу" required>
                        </div>

                        <div id="nameBlock" class="disabled">
                            <label for="name">Имя</label>
                            <input type="text" name="name" placeholder="Согласно документу" required>
                        </div>

                        <div id="patronymicBlock" class="disabled">
                            <label for="patronymic">Отчество (при наличии)</label>
                            <input type="text" name="patronymic" placeholder="Согласно документу">
                        </div>
                        <div id="birthdateBlock" class="disabled">
                            <label for="birthdate">Дата рождения</label>
                            <input type="date" name="birthdate" placeholder="Введите дату рождения" required>
                        </div>
                        <div id="genderBlock" class="disabled">
                            <label for="gender">Выберите пол</label>
                            <select name="gender" id="gender" required>
                                <option value="">-----</option>
                                <option value="мужской">мужской</option>
                                <option value="женский">женский</option>
                            </select>
                        </div>

                        <div id="nationalityBlock" class="disabled">
                            <label for="nationality">Национальность</label>
                            <select name="nationality" id="nationality" class="nationality">
                                <option value="" disabled selected>-----</option>
                                @foreach ($nationality_list as $nationality)
                                    @if (Config::get('app.locale') == 'kk')
                                        <option value="{{ $nationality->id }}">{{ mb_strtolower($nationality->nationality_kz, 'UTF-8') }}</option>
                                    @elseif (Config::get('app.locale') == 'ru')
                                        <option value="{{ $nationality->id }}">{{ mb_strtolower($nationality->nationality_ru, 'UTF-8') }}</option>
                                    @else
                                        <option value="{{ $nationality->id }}">{{ mb_strtolower($nationality->nationality_en, 'UTF-8') }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div id="phoneBlock-1" class="disabled">
                            <label for="phone_1">Телефон</label>
                            <input type="tel" name="phone_1" class="phone" placeholder="Введите телефон" required>
                        </div>
                        <div id="phoneBlock-2" class="disabled">
                            <label for="phone_2">Телефон</label>
                            <input type="tel" name="phone_2" class="phone" placeholder="Введите телефон">
                        </div>
                        <div id="emailBlock" class="disabled">
                            <label for="email">E-mail</label>
                            <input type="mail" name="email" id="email" placeholder="Введите вашу почту" required>
                        </div>
                    </div>
                    <div id="buttonBlock">
                        <button type="submit" id="button" class="disabled">Отправить анкету</button>
                    </div>
                </form>
                @if (session('alert'))
                    <!-- The Modal -->
                    <div id="myModal" class="modal" style="display: block">
                        <div class="container">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <p>{{ session('alert') }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

<script src="//code.jivo.ru/widget/bYmff7N0x8" async></script>
