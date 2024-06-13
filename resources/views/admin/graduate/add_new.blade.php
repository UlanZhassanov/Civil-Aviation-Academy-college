@extends('admin.layouts.app')
@php $parrentCat  = 'Выпускники' @endphp
@php $active_menu  = 'Добавление выпускников' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
    <h1>Добавление выпускников</h1>
    <form action="{{ route('admin.graduate.graduates.store_new') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="blocks">
            <div class="block">
                <h5 class="block__title">Академическая степень</h5>
                <select class="block__info" name="type" id="type" onchange="typeFunc();" required>
                    <option value="" selected>-----</option>
                    <option value="1">Бакаклавриат</option>
                    <option value="2">Магистратура</option>
                    <option value="3">Докторантура</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Фамилия</h5>
                <input type="text" class="block__info" name="surname" required>
            </div>
            <div class="block">
                <h5 class="block__title">Имя</h5>
                <input type="text" class="block__info" name="name" required>
            </div>
            <div class="block">
                <h5 class="block__title">Отчество</h5>
                <input type="text" class="block__info" name="patronymic">
            </div>
            <div class="block">
                <h5 class="block__title">ИИН</h5>
                <input type="number" class="block__info" name="iin" maxlength="12">
            </div>
            <div class="block" id="groupeBlock">
                <h5 class="block__title">Группа</h5>
                <input type="text" class="block__info" name="groupe" id="groupe">
            </div>
            <div class="block" id="specialityBlock">
                <h5 class="block__title">Специальность</h5>
                <select class="block__info" name="speciality" id="speciality">
                    <option value="" disabled selected>-----</option>
                    <option value="Техническая эксплуатация летательных аппаратов и двигателей (механик)">Техническая эксплуатация летательных аппаратов и двигателей (механик)</option>
                    <option value="Техническая эксплуатация систем авионики летательных аппаратов (авионик)">Техническая эксплуатация систем авионики летательных аппаратов (авионик)</option>
                    <option value="Обеспечение авиационной безопасности">Обеспечение авиационной безопасности</option>
                    <option value="Обслуживание наземного радиоэлектронного оборудования аэропортов">Обслуживание наземного радиоэлектронного оборудования аэропортов</option>
                    <option value="Организация аэропортовой деятельности">Организация аэропортовой деятельности</option>
                    <option value="Летная эксплуатация гражданских самолетов (пилот)">Летная эксплуатация гражданских самолетов (пилот)</option>
                    <option value="Летная эксплуатация гражданских вертолетов (пилот)">Летная эксплуатация гражданских вертолетов (пилот)</option>
                    <option value="Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)">Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)</option>
                    <option value="Организация авиационных перевозок">Организация авиационных перевозок</option>
                    <option value="Логистика на транспорте">Логистика на транспорте</option>
                </select>
            </div>
            <div class="block" id="edu_programBlock">
                <h5 class="block__title">Образовательная программа</h5>
                <input type="text" class="block__info" name="edu_program" id="edu_program">
            </div>
            <div class="block" id="edu_directionBlock">
                <h5 class="block__title">Направление</h5>
                <select class="block__info" name="edu_direction" id="edu_direction">
                    <option value="" disabled selected>-----</option>
                    <option value="Научно - педагогическое">Научно - педагогическое</option>
                    <option value="Профильное">Профильное</option>
                </select>
            </div>
            <div class="block" id="op_groupBlock">
                <h5 class="block__title">Группа образовательных программ</h5>
                <select class="block__info" name="op_group" id="op_group">
                    <option value="" disabled selected>-----</option>
                    <option value="Авиационная техника и технологии">Авиационная техника и технологии</option>
                    <option value="Летная эксплуатация летательных аппаратов и двигателей">Летная эксплуатация летательных аппаратов и двигателей</option>
                    <option value="Транспортные услуги">Транспортные услуги</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">GPA</h5>
                <input type="text" class="block__info" name="gpa">
            </div>
            <div class="block">
                <h5 class="block__title">Отделение</h5>
                <select class="block__info" name="form_study">
                    <option value="" disabled selected>-----</option>
                    <option value="грант">грант</option>
                    <option value="платное">платное</option>
                </select>
            </div>
            <div class="block" id="international_grantBlock">
                <h5 class="block__title">Международный грант</h5>
                <select class="block__info" name="international_grant" id="international_grant">
                    <option value="" disabled selected>-----</option>
                    <option value="1">да</option>
                    <option value="0">нет</option>
                </select>
            </div>
            <div class="block" id="edu_formBlock">
                <h5 class="block__title">Форма обучения</h5>
                <select class="block__info" name="edu_form" id="edu_form">
                    <option value="" disabled selected>-----</option>
                    <option value="очное">очное</option>
                    <option value="очное с применением ДОТ">очное с применением ДОТ</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Адрес</h5>
                <textarea rows="3" class="block__info" name="reg_address"></textarea>
            </div>
            <div class="block">
                <h5 class="block__title">Регион</h5>
                <select class="block__info" name="region">
                    <option value="" disabled selected>-----</option>
                    <option value="Город Алматы">г. Алматы</option>
                    <option value="Город Астана">г. Астана</option>
                    <option value="Город Шымкент">г. Шымкент</option>
                    <option value="Абайская область">Абайская обл.</option>
                    <option value="Акмолинская область">Акмолинская обл.</option>
                    <option value="Актюбинская область">Актюбинская обл.</option>
                    <option value="Алматинская область">Алматинская обл.</option>
                    <option value="Атырауская область">Атырауская обл.</option>
                    <option value="Восточно-Казахстанская область">Восточно-Казахстанская обл.</option>
                    <option value="Жамбыльская область">Жамбыльская обл.</option>
                    <option value="Жетысуская область">Жетысуская обл.</option>
                    <option value="Западно-Казахстанская область">Западно-Казахстанская обл.</option>
                    <option value="Карагандинская область">Карагандинская обл.</option>
                    <option value="Костанайская область">Костанайская обл.</option>
                    <option value="Кызылординская область">Кызылординская обл.</option>
                    <option value="Мангистауская область">Мангистауская обл.</option>
                    <option value="Павлодарская область">Павлодарская обл.</option>
                    <option value="Северо-Казахстанская область">Северо-Казахстанская обл.</option>
                    <option value="Туркестанская область">Туркестанская обл.</option>
                    <option value="Улытауская область">Улытауская обл.</option>
                    <option value="Иностранец">Иностранец</option>
                </select>
            </div>
            <div class="block" id="continue_educationBlock">
                <h5 class="block__title">Продолжение обучения</h5>
                <select class="block__info" name="continue_education" id="continue_education">
                    <option value="" disabled selected>-----</option>
                    <option value="0">Нет</option>
                    <option value="Магистратура АГА">Магистратура АГА</option>
                    <option value="Магистратура другой ВУЗ">Магистратура другой ВУЗ</option>
                    <option value="Докторантура АГА">Докторантура АГА</option>
                    <option value="Докторантура другой ВУЗ">Докторантура другой ВУЗ</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Тип занятости</h5>
                <select class="block__info" name="work">
                    <option value="" disabled selected>-----</option>
                    <option value="1">Трудоустроен</option>
                    <option value="0">Не трудоустроен</option>
                </select>
            </div>
            <div class="block" id="employment_typeBlock">
                <h5 class="block__title">Вид трудоустройства</h5>
                <select class="block__info" name="employment_type" id="employment_type">
                    <option value="0">-----</option>
                    <option value="Трудоустроен, по специальности">Трудоустроен, по специальности</option>
                    <option value="Трудоустроен, в авиации">Трудоустроен, в авиации</option>
                    <option value="Трудоустроен, не в авиации">Трудоустроен, не в авиации</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Место работы</h5>
                <select class="block__info" name="work_place">
                    <option value="0">-----</option>
                    <option value="АО «Эйр Астана»">АО «Эйр Астана»</option>
                    <option value="АО «Авиакомпания «SCAT»">АО «Авиакомпания «SCAT»</option>
                    <option value="АО Авиакомпания «Жезказган Эйр»">АО Авиакомпания «Жезказган Эйр»</option>
                    <option value="АО «Бурундайавиа»">АО «Бурундайавиа»</option>
                    <option value="АО «Евро-Азия Эйр«">АО «Евро-Азия Эйр»</option>
                    <option value="ТОО «Авиакомпания Comlux-Kz»">ТОО «Авиакомпания Comlux-Kz»</option>
                    <option value="АО «Qazaq Air»">АО «Qazaq Air»</option>
                    <option value="АО «KAZ AIR JET»">АО «KAZ AIR JET»</option>
                    <option value="АО «FlyJet.kz»">АО «FlyJet.kz»</option>
                    <option value="ТОО «Авиакомпания «Jupiter jet»">ТОО «Авиакомпания «Jupiter jet»</option>
                    <option value="РГП на ПХВ «Беркут»">РГП на ПХВ «Беркут»</option>
                    <option value="АО «East Wing»">АО «East Wing»</option>
                    <option value="АО «Международный аэропорт Алматы» ">АО «Международный аэропорт Алматы» </option>
                    <option value="АО «Международный аэропорт Нурсултан Назарбаев»">АО «Международный аэропорт Нурсултан Назарбаев»</option>
                    <option value="АО «Международный аэропорт Сары-Арка» (г.Караганды)">АО «Международный аэропорт Сары-Арка» (г.Караганды)</option>
                    <option value="ТОО «Международный аэропорт Семей»">ТОО «Международный аэропорт Семей»</option>
                    <option value="АО «Международный аэропорт Аулие-Ата» (г. Тараз)">АО «Международный аэропорт Аулие-Ата» (г. Тараз)</option>
                    <option value="АО «Авиакомпания Жетысу» (г. Талдыкорган)">АО «Авиакомпания Жетысу» (г. Талдыкорган)</option>
                    <option value="АО «Аэропорт Павлодар»">АО «Аэропорт Павлодар»</option>
                    <option value="ТОО «Международный аэропорт Орал»">ТОО «Международный аэропорт Орал»</option>
                    <option value="ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)">ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)</option>
                    <option value="ТОО «Международный аэропорт Туркистан»">ТОО «Международный аэропорт Туркистан»</option>
                    <option value="АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)">АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)</option>
                    <option value="АО «Международный аэропорт Актау»">АО «Международный аэропорт Актау»</option>
                    <option value="АО «Международный аэропорт Алия Молдагулова» (г.Актобе)">АО «Международный аэропорт Алия Молдагулова» (г.Актобе)</option>
                    <option value="АО «Аэропорт Шымкент»">АО «Аэропорт Шымкент»</option>
                    <option value="АО «Аэропорт Коркыт Ата» (г. Кызылорда)">АО «Аэропорт Коркыт Ата» (г. Кызылорда)</option>
                    <option value="АО «Международный аэропорт Усть-Каменогорск»">АО «Международный аэропорт Усть-Каменогорск»</option>
                    <option value="Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»">Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»</option>
                    <option value="АО «Международный аэропорт Костанай»">АО «Международный аэропорт Костанай»</option>
                    <option value="ТОО «Аэропорт Боралдай»">ТОО «Аэропорт Боралдай»</option>
                    <option value="ТОО «Транзит Казахстан»">ТОО «Транзит Казахстан»</option>
                    <option value="ТОО «Star jet»">ТОО «Star jet»</option>
                    <option value="U project">U project</option>
                    <option value="Golden Line Logistics">Golden Line Logistics</option>
                    <option value="ТОО «Глоббинг»">ТОО «Глоббинг»</option>
                    <option value="ИП «Транслогистик»">ИП «Транслогистик»</option>
                    <option value="GTL Logistics uty">GTL Logistics uty</option>
                    <option value="ТОО «Ics Kazakhstan» ">ТОО «Ics Kazakhstan» </option>
                    <option value="ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)">ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)</option>
                    <option value="ТОО «Шынгар Транс» ">ТОО «Шынгар Транс» </option>
                    <option value="ТОО «Felix Logistic» ">ТОО «Felix Logistic» </option>
                    <option value="Free Line Service">Free Line Service</option>
                    <option value="H. B. KazTransService">H. B. KazTransService</option>
                    <option value="DHL">DHL</option>
                    <option value="ТОО «Алем-ТАТ»">ТОО «Алем-ТАТ»</option>
                    <option value="Транслайн">Транслайн</option>
                    <option value="Your Logistics Partner">Your Logistics Partner</option>
                    <option value="EurAsiaTransit">EurAsiaTransit</option>
                    <option value="Кедентранссервис">Кедентранссервис</option>
                    <option value="MultiModal Logistics">MultiModal Logistics</option>
                    <option value="Rhenus intermodal systems">Rhenus intermodal systems</option>
                    <option value="Al Jayed Company Logistics">Al Jayed Company Logistics</option>
                    <option value="Easy Express ">Easy Express </option>
                    <option value="Jet Logistic">Jet Logistic</option>
                    <option value="Fedex">Fedex</option>
                    <option value="ТОО «Aviata»">ТОО «Aviata»</option>
                    <option value="ТОО «ТРАНСАВИА»">ТОО «ТРАНСАВИА»</option>
                    <option value="АО «Авиаремонтный завод №405»">АО «Авиаремонтный завод №405»</option>
                    <option value="ОАО «Авиаремонтный завод №406»">ОАО «Авиаремонтный завод №406»</option>
                    <option value="ТОО «Казахстанская Авиационная Индустрия»">ТОО «Казахстанская Авиационная Индустрия»</option>
                    <option value="РГП «КАЗАЭРОНАВИГАЦИЯ»">РГП «КАЗАЭРОНАВИГАЦИЯ»</option>
                    <option value="АО «Казавиаспас»">АО «Казавиаспас»</option>
                    <option value="ТОО «Еврокоптер Казахстан Инжиниринг»">ТОО «Еврокоптер Казахстан Инжиниринг»</option>
                    <option value="ТОО «КазАвиация»">ТОО «КазАвиация»</option>
                    <option value="Caspian Radio Services LLP">Caspian Radio Services LLP</option>
                    <option value="ТОО «АУТЦ «Болапан»">ТОО «АУТЦ «Болапан»</option>
                    <option value="ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»">ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»</option>
                    <option value="ОЮЛ «Казахстанская ассоциация малой авиации»">ОЮЛ «Казахстанская ассоциация малой авиации»</option>
                    <option value="АО «Академия Гражданской Авиации»">АО «Академия Гражданской Авиации»</option>
                    <option value="Другие">Другие</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Должность</h5>
                <input type="text" name="position" class="block__info">
            </div>
            <div class="block">
                <h5 class="block__title">Статус должности</h5>
                <select class="block__info" name="position_status">
                    <option value="0">-----</option>
                    <option value="Высший руководящий состав">Высший руководящий состав</option>
                    <option value="Средний руководящий состав">Средний руководящий состав</option>
                    <option value="Исполнитель">Исполнитель</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Наличие справки с места работы</h5>
                <select class="block__info" name="reference" required>
                    <option value="" disabled selected>-----</option>
                    <option value="0">Отсутствует</option>
                    <option value="1">Имеется</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Справка с места работы</h5>
                <input type="file" name="reference_doc" id="reference_doc"
                    class="block__info">
            </div>
            <div class="block" id="have_portfolioBlock">
                <h5 class="block__title">Наличие портфолио</h5>
                <select class="block__info" name="have_portfolio" id="have_portfolio">
                    <option value="" disabled selected>-----</option>
                    <option value="Отсутствует">Отсутствует</option>
                    <option value="Имеется">Имеется</option>
                </select>
            </div>
            <div class="block" id="portfolio_docBlock">
                <h5 class="block__title">Портфолио выпускника</h5>
                <input type="file" name="portfolio_doc" id="portfolio_doc"
                    class="block__info">
            </div>
            <div class="block">
                <h5 class="block__title">Наличие документов для Фин центра</h5>
                <select class="block__info" name="have_fincenter_doc" required>
                    <option value="" disabled selected>-----</option>
                    <option value="Отсутствует">Отсутствует</option>
                    <option value="Имеется">Имеется</option>
                </select>
            </div>
            <div class="block" id="directionBlock">
                <h5 class="block__title">Вручено направление </h5>
                <select class="block__info" name="direction" id="direction">
                    <option value="0" selected>-----</option>
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select>
            </div>
            <div class="block" id="direction_place1Block">
                <h5 class="block__title">Направление №1</h5>
                <select class="block__info" name="direction_place1" id="direction_place1">
                    <option value="0">-----</option>
                    <option value="АО «Эйр Астана»">АО «Эйр Астана»</option>
                    <option value="АО «Авиакомпания «SCAT»">АО «Авиакомпания «SCAT»</option>
                    <option value="АО Авиакомпания «Жезказган Эйр»">АО Авиакомпания «Жезказган Эйр»</option>
                    <option value="АО «Бурундайавиа»">АО «Бурундайавиа»</option>
                    <option value="АО «Евро-Азия Эйр«">АО «Евро-Азия Эйр»</option>
                    <option value="ТОО «Авиакомпания Comlux-Kz»">ТОО «Авиакомпания Comlux-Kz»</option>
                    <option value="АО «Qazaq Air»">АО «Qazaq Air»</option>
                    <option value="АО «KAZ AIR JET»">АО «KAZ AIR JET»</option>
                    <option value="АО «FlyJet.kz»">АО «FlyJet.kz»</option>
                    <option value="ТОО «Авиакомпания «Jupiter jet»">ТОО «Авиакомпания «Jupiter jet»</option>
                    <option value="РГП на ПХВ «Беркут»">РГП на ПХВ «Беркут»</option>
                    <option value="АО «East Wing»">АО «East Wing»</option>
                    <option value="АО «Международный аэропорт Алматы» ">АО «Международный аэропорт Алматы» </option>
                    <option value="АО «Международный аэропорт Нурсултан Назарбаев»">АО «Международный аэропорт Нурсултан Назарбаев»</option>
                    <option value="АО «Международный аэропорт Сары-Арка» (г.Караганды)">АО «Международный аэропорт Сары-Арка» (г.Караганды)</option>
                    <option value="ТОО «Международный аэропорт Семей»">ТОО «Международный аэропорт Семей»</option>
                    <option value="АО «Международный аэропорт Аулие-Ата» (г. Тараз)">АО «Международный аэропорт Аулие-Ата» (г. Тараз)</option>
                    <option value="АО «Авиакомпания Жетысу» (г. Талдыкорган)">АО «Авиакомпания Жетысу» (г. Талдыкорган)</option>
                    <option value="АО «Аэропорт Павлодар»">АО «Аэропорт Павлодар»</option>
                    <option value="ТОО «Международный аэропорт Орал»">ТОО «Международный аэропорт Орал»</option>
                    <option value="ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)">ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)</option>
                    <option value="ТОО «Международный аэропорт Туркистан»">ТОО «Международный аэропорт Туркистан»</option>
                    <option value="АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)">АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)</option>
                    <option value="АО «Международный аэропорт Актау»">АО «Международный аэропорт Актау»</option>
                    <option value="АО «Международный аэропорт Алия Молдагулова» (г.Актобе)">АО «Международный аэропорт Алия Молдагулова» (г.Актобе)</option>
                    <option value="АО «Аэропорт Шымкент»">АО «Аэропорт Шымкент»</option>
                    <option value="АО «Аэропорт Коркыт Ата» (г. Кызылорда)">АО «Аэропорт Коркыт Ата» (г. Кызылорда)</option>
                    <option value="АО «Международный аэропорт Усть-Каменогорск»">АО «Международный аэропорт Усть-Каменогорск»</option>
                    <option value="Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»">Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»</option>
                    <option value="АО «Международный аэропорт Костанай»">АО «Международный аэропорт Костанай»</option>
                    <option value="ТОО «Аэропорт Боралдай»">ТОО «Аэропорт Боралдай»</option>
                    <option value="ТОО «Транзит Казахстан»">ТОО «Транзит Казахстан»</option>
                    <option value="ТОО «Star jet»">ТОО «Star jet»</option>
                    <option value="U project">U project</option>
                    <option value="Golden Line Logistics">Golden Line Logistics</option>
                    <option value="ТОО «Глоббинг»">ТОО «Глоббинг»</option>
                    <option value="ИП «Транслогистик»">ИП «Транслогистик»</option>
                    <option value="GTL Logistics uty">GTL Logistics uty</option>
                    <option value="ТОО «Ics Kazakhstan» ">ТОО «Ics Kazakhstan» </option>
                    <option value="ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)">ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)</option>
                    <option value="ТОО «Шынгар Транс» ">ТОО «Шынгар Транс» </option>
                    <option value="ТОО «Felix Logistic» ">ТОО «Felix Logistic» </option>
                    <option value="Free Line Service">Free Line Service</option>
                    <option value="H. B. KazTransService">H. B. KazTransService</option>
                    <option value="DHL">DHL</option>
                    <option value="ТОО «Алем-ТАТ»">ТОО «Алем-ТАТ»</option>
                    <option value="Транслайн">Транслайн</option>
                    <option value="Your Logistics Partner">Your Logistics Partner</option>
                    <option value="EurAsiaTransit">EurAsiaTransit</option>
                    <option value="Кедентранссервис">Кедентранссервис</option>
                    <option value="MultiModal Logistics">MultiModal Logistics</option>
                    <option value="Rhenus intermodal systems">Rhenus intermodal systems</option>
                    <option value="Al Jayed Company Logistics">Al Jayed Company Logistics</option>
                    <option value="Easy Express ">Easy Express </option>
                    <option value="Jet Logistic">Jet Logistic</option>
                    <option value="Fedex">Fedex</option>
                    <option value="ТОО «Aviata»">ТОО «Aviata»</option>
                    <option value="ТОО «ТРАНСАВИА»">ТОО «ТРАНСАВИА»</option>
                    <option value="АО «Авиаремонтный завод №405»">АО «Авиаремонтный завод №405»</option>
                    <option value="ОАО «Авиаремонтный завод №406»">ОАО «Авиаремонтный завод №406»</option>
                    <option value="ТОО «Казахстанская Авиационная Индустрия»">ТОО «Казахстанская Авиационная Индустрия»</option>
                    <option value="РГП «КАЗАЭРОНАВИГАЦИЯ»">РГП «КАЗАЭРОНАВИГАЦИЯ»</option>
                    <option value="АО «Казавиаспас»">АО «Казавиаспас»</option>
                    <option value="ТОО «Еврокоптер Казахстан Инжиниринг»">ТОО «Еврокоптер Казахстан Инжиниринг»</option>
                    <option value="ТОО «КазАвиация»">ТОО «КазАвиация»</option>
                    <option value="Caspian Radio Services LLP">Caspian Radio Services LLP</option>
                    <option value="ТОО «АУТЦ «Болапан»">ТОО «АУТЦ «Болапан»</option>
                    <option value="ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»">ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»</option>
                    <option value="ОЮЛ «Казахстанская ассоциация малой авиации»">ОЮЛ «Казахстанская ассоциация малой авиации»</option>
                    <option value="АО «Академия Гражданской Авиации»">АО «Академия Гражданской Авиации»</option>
                    <option value="Другие">Другие</option>
                </select>
            </div>
            <div class="block" id="direction_place2Block">
                <h5 class="block__title">Направление №2</h5>
                <select class="block__info" name="direction_place2" id="direction_place2">
                    <option value="0">-----</option>
                    <option value="АО «Эйр Астана»">АО «Эйр Астана»</option>
                    <option value="АО «Авиакомпания «SCAT»">АО «Авиакомпания «SCAT»</option>
                    <option value="АО Авиакомпания «Жезказган Эйр»">АО Авиакомпания «Жезказган Эйр»</option>
                    <option value="АО «Бурундайавиа»">АО «Бурундайавиа»</option>
                    <option value="АО «Евро-Азия Эйр«">АО «Евро-Азия Эйр»</option>
                    <option value="ТОО «Авиакомпания Comlux-Kz»">ТОО «Авиакомпания Comlux-Kz»</option>
                    <option value="АО «Qazaq Air»">АО «Qazaq Air»</option>
                    <option value="АО «KAZ AIR JET»">АО «KAZ AIR JET»</option>
                    <option value="АО «FlyJet.kz»">АО «FlyJet.kz»</option>
                    <option value="ТОО «Авиакомпания «Jupiter jet»">ТОО «Авиакомпания «Jupiter jet»</option>
                    <option value="РГП на ПХВ «Беркут»">РГП на ПХВ «Беркут»</option>
                    <option value="АО «East Wing»">АО «East Wing»</option>
                    <option value="АО «Международный аэропорт Алматы» ">АО «Международный аэропорт Алматы» </option>
                    <option value="АО «Международный аэропорт Нурсултан Назарбаев»">АО «Международный аэропорт Нурсултан Назарбаев»</option>
                    <option value="АО «Международный аэропорт Сары-Арка» (г.Караганды)">АО «Международный аэропорт Сары-Арка» (г.Караганды)</option>
                    <option value="ТОО «Международный аэропорт Семей»">ТОО «Международный аэропорт Семей»</option>
                    <option value="АО «Международный аэропорт Аулие-Ата» (г. Тараз)">АО «Международный аэропорт Аулие-Ата» (г. Тараз)</option>
                    <option value="АО «Авиакомпания Жетысу» (г. Талдыкорган)">АО «Авиакомпания Жетысу» (г. Талдыкорган)</option>
                    <option value="АО «Аэропорт Павлодар»">АО «Аэропорт Павлодар»</option>
                    <option value="ТОО «Международный аэропорт Орал»">ТОО «Международный аэропорт Орал»</option>
                    <option value="ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)">ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)</option>
                    <option value="ТОО «Международный аэропорт Туркистан»">ТОО «Международный аэропорт Туркистан»</option>
                    <option value="АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)">АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)</option>
                    <option value="АО «Международный аэропорт Актау»">АО «Международный аэропорт Актау»</option>
                    <option value="АО «Международный аэропорт Алия Молдагулова» (г.Актобе)">АО «Международный аэропорт Алия Молдагулова» (г.Актобе)</option>
                    <option value="АО «Аэропорт Шымкент»">АО «Аэропорт Шымкент»</option>
                    <option value="АО «Аэропорт Коркыт Ата» (г. Кызылорда)">АО «Аэропорт Коркыт Ата» (г. Кызылорда)</option>
                    <option value="АО «Международный аэропорт Усть-Каменогорск»">АО «Международный аэропорт Усть-Каменогорск»</option>
                    <option value="Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»">Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»</option>
                    <option value="АО «Международный аэропорт Костанай»">АО «Международный аэропорт Костанай»</option>
                    <option value="ТОО «Аэропорт Боралдай»">ТОО «Аэропорт Боралдай»</option>
                    <option value="ТОО «Транзит Казахстан»">ТОО «Транзит Казахстан»</option>
                    <option value="ТОО «Star jet»">ТОО «Star jet»</option>
                    <option value="U project">U project</option>
                    <option value="Golden Line Logistics">Golden Line Logistics</option>
                    <option value="ТОО «Глоббинг»">ТОО «Глоббинг»</option>
                    <option value="ИП «Транслогистик»">ИП «Транслогистик»</option>
                    <option value="GTL Logistics uty">GTL Logistics uty</option>
                    <option value="ТОО «Ics Kazakhstan» ">ТОО «Ics Kazakhstan» </option>
                    <option value="ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)">ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)</option>
                    <option value="ТОО «Шынгар Транс» ">ТОО «Шынгар Транс» </option>
                    <option value="ТОО «Felix Logistic» ">ТОО «Felix Logistic» </option>
                    <option value="Free Line Service">Free Line Service</option>
                    <option value="H. B. KazTransService">H. B. KazTransService</option>
                    <option value="DHL">DHL</option>
                    <option value="ТОО «Алем-ТАТ»">ТОО «Алем-ТАТ»</option>
                    <option value="Транслайн">Транслайн</option>
                    <option value="Your Logistics Partner">Your Logistics Partner</option>
                    <option value="EurAsiaTransit">EurAsiaTransit</option>
                    <option value="Кедентранссервис">Кедентранссервис</option>
                    <option value="MultiModal Logistics">MultiModal Logistics</option>
                    <option value="Rhenus intermodal systems">Rhenus intermodal systems</option>
                    <option value="Al Jayed Company Logistics">Al Jayed Company Logistics</option>
                    <option value="Easy Express ">Easy Express </option>
                    <option value="Jet Logistic">Jet Logistic</option>
                    <option value="Fedex">Fedex</option>
                    <option value="ТОО «Aviata»">ТОО «Aviata»</option>
                    <option value="ТОО «ТРАНСАВИА»">ТОО «ТРАНСАВИА»</option>
                    <option value="АО «Авиаремонтный завод №405»">АО «Авиаремонтный завод №405»</option>
                    <option value="ОАО «Авиаремонтный завод №406»">ОАО «Авиаремонтный завод №406»</option>
                    <option value="ТОО «Казахстанская Авиационная Индустрия»">ТОО «Казахстанская Авиационная Индустрия»</option>
                    <option value="РГП «КАЗАЭРОНАВИГАЦИЯ»">РГП «КАЗАЭРОНАВИГАЦИЯ»</option>
                    <option value="АО «Казавиаспас»">АО «Казавиаспас»</option>
                    <option value="ТОО «Еврокоптер Казахстан Инжиниринг»">ТОО «Еврокоптер Казахстан Инжиниринг»</option>
                    <option value="ТОО «КазАвиация»">ТОО «КазАвиация»</option>
                    <option value="Caspian Radio Services LLP">Caspian Radio Services LLP</option>
                    <option value="ТОО «АУТЦ «Болапан»">ТОО «АУТЦ «Болапан»</option>
                    <option value="ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»">ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»</option>
                    <option value="ОЮЛ «Казахстанская ассоциация малой авиации»">ОЮЛ «Казахстанская ассоциация малой авиации»</option>
                    <option value="АО «Академия Гражданской Авиации»">АО «Академия Гражданской Авиации»</option>
                    <option value="Другие">Другие</option>
                </select>
            </div>
            <div class="block" id="direction_place3Block">
                <h5 class="block__title">Направление №3</h5>
                <select class="block__info" name="direction_place3" id="direction_place3Block">
                    <option value="0">-----</option>
                    <option value="АО «Эйр Астана»">АО «Эйр Астана»</option>
                    <option value="АО «Авиакомпания «SCAT»">АО «Авиакомпания «SCAT»</option>
                    <option value="АО Авиакомпания «Жезказган Эйр»">АО Авиакомпания «Жезказган Эйр»</option>
                    <option value="АО «Бурундайавиа»">АО «Бурундайавиа»</option>
                    <option value="АО «Евро-Азия Эйр«">АО «Евро-Азия Эйр»</option>
                    <option value="ТОО «Авиакомпания Comlux-Kz»">ТОО «Авиакомпания Comlux-Kz»</option>
                    <option value="АО «Qazaq Air»">АО «Qazaq Air»</option>
                    <option value="АО «KAZ AIR JET»">АО «KAZ AIR JET»</option>
                    <option value="АО «FlyJet.kz»">АО «FlyJet.kz»</option>
                    <option value="ТОО «Авиакомпания «Jupiter jet»">ТОО «Авиакомпания «Jupiter jet»</option>
                    <option value="РГП на ПХВ «Беркут»">РГП на ПХВ «Беркут»</option>
                    <option value="АО «East Wing»">АО «East Wing»</option>
                    <option value="АО «Международный аэропорт Алматы» ">АО «Международный аэропорт Алматы» </option>
                    <option value="АО «Международный аэропорт Нурсултан Назарбаев»">АО «Международный аэропорт Нурсултан Назарбаев»</option>
                    <option value="АО «Международный аэропорт Сары-Арка» (г.Караганды)">АО «Международный аэропорт Сары-Арка» (г.Караганды)</option>
                    <option value="ТОО «Международный аэропорт Семей»">ТОО «Международный аэропорт Семей»</option>
                    <option value="АО «Международный аэропорт Аулие-Ата» (г. Тараз)">АО «Международный аэропорт Аулие-Ата» (г. Тараз)</option>
                    <option value="АО «Авиакомпания Жетысу» (г. Талдыкорган)">АО «Авиакомпания Жетысу» (г. Талдыкорган)</option>
                    <option value="АО «Аэропорт Павлодар»">АО «Аэропорт Павлодар»</option>
                    <option value="ТОО «Международный аэропорт Орал»">ТОО «Международный аэропорт Орал»</option>
                    <option value="ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)">ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)</option>
                    <option value="ТОО «Международный аэропорт Туркистан»">ТОО «Международный аэропорт Туркистан»</option>
                    <option value="АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)">АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)</option>
                    <option value="АО «Международный аэропорт Актау»">АО «Международный аэропорт Актау»</option>
                    <option value="АО «Международный аэропорт Алия Молдагулова» (г.Актобе)">АО «Международный аэропорт Алия Молдагулова» (г.Актобе)</option>
                    <option value="АО «Аэропорт Шымкент»">АО «Аэропорт Шымкент»</option>
                    <option value="АО «Аэропорт Коркыт Ата» (г. Кызылорда)">АО «Аэропорт Коркыт Ата» (г. Кызылорда)</option>
                    <option value="АО «Международный аэропорт Усть-Каменогорск»">АО «Международный аэропорт Усть-Каменогорск»</option>
                    <option value="Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»">Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»</option>
                    <option value="АО «Международный аэропорт Костанай»">АО «Международный аэропорт Костанай»</option>
                    <option value="ТОО «Аэропорт Боралдай»">ТОО «Аэропорт Боралдай»</option>
                    <option value="ТОО «Транзит Казахстан»">ТОО «Транзит Казахстан»</option>
                    <option value="ТОО «Star jet»">ТОО «Star jet»</option>
                    <option value="U project">U project</option>
                    <option value="Golden Line Logistics">Golden Line Logistics</option>
                    <option value="ТОО «Глоббинг»">ТОО «Глоббинг»</option>
                    <option value="ИП «Транслогистик»">ИП «Транслогистик»</option>
                    <option value="GTL Logistics uty">GTL Logistics uty</option>
                    <option value="ТОО «Ics Kazakhstan» ">ТОО «Ics Kazakhstan» </option>
                    <option value="ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)">ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)</option>
                    <option value="ТОО «Шынгар Транс» ">ТОО «Шынгар Транс» </option>
                    <option value="ТОО «Felix Logistic» ">ТОО «Felix Logistic» </option>
                    <option value="Free Line Service">Free Line Service</option>
                    <option value="H. B. KazTransService">H. B. KazTransService</option>
                    <option value="DHL">DHL</option>
                    <option value="ТОО «Алем-ТАТ»">ТОО «Алем-ТАТ»</option>
                    <option value="Транслайн">Транслайн</option>
                    <option value="Your Logistics Partner">Your Logistics Partner</option>
                    <option value="EurAsiaTransit">EurAsiaTransit</option>
                    <option value="Кедентранссервис">Кедентранссервис</option>
                    <option value="MultiModal Logistics">MultiModal Logistics</option>
                    <option value="Rhenus intermodal systems">Rhenus intermodal systems</option>
                    <option value="Al Jayed Company Logistics">Al Jayed Company Logistics</option>
                    <option value="Easy Express ">Easy Express </option>
                    <option value="Jet Logistic">Jet Logistic</option>
                    <option value="Fedex">Fedex</option>
                    <option value="ТОО «Aviata»">ТОО «Aviata»</option>
                    <option value="ТОО «ТРАНСАВИА»">ТОО «ТРАНСАВИА»</option>
                    <option value="АО «Авиаремонтный завод №405»">АО «Авиаремонтный завод №405»</option>
                    <option value="ОАО «Авиаремонтный завод №406»">ОАО «Авиаремонтный завод №406»</option>
                    <option value="ТОО «Казахстанская Авиационная Индустрия»">ТОО «Казахстанская Авиационная Индустрия»</option>
                    <option value="РГП «КАЗАЭРОНАВИГАЦИЯ»">РГП «КАЗАЭРОНАВИГАЦИЯ»</option>
                    <option value="АО «Казавиаспас»">АО «Казавиаспас»</option>
                    <option value="ТОО «Еврокоптер Казахстан Инжиниринг»">ТОО «Еврокоптер Казахстан Инжиниринг»</option>
                    <option value="ТОО «КазАвиация»">ТОО «КазАвиация»</option>
                    <option value="Caspian Radio Services LLP">Caspian Radio Services LLP</option>
                    <option value="ТОО «АУТЦ «Болапан»">ТОО «АУТЦ «Болапан»</option>
                    <option value="ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»">ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»</option>
                    <option value="ОЮЛ «Казахстанская ассоциация малой авиации»">ОЮЛ «Казахстанская ассоциация малой авиации»</option>
                    <option value="АО «Академия Гражданской Авиации»">АО «Академия Гражданской Авиации»</option>
                    <option value="Другие">Другие</option>
                </select>
            </div>
            <div class="block">
                <h5 class="block__title">Телефон</h5>
                <input type="text" name="phone" class="block__info">
            </div>
            <div class="block">
                <h5 class="block__title">Год и месяц окончания обучения</h5>
                <input type="month" name="grad_year" class="block__info" required>
            </div>
            <div class="block">
                <h5 class="block__title">Статус выпускника</h5>
                <select class="block__info" name="graduate_status">
                    <option value="" disabled selected  >-----</option>
                    <option value="Трудоустроен">Трудоустроен</option>
                    <option value="Призван в ряды вооруженных сил">Призван в ряды вооруженных сил</option>
                    <option value="Отпуск по уходу за ребенком">Отпуск по уходу за ребенком</option>
                    <option value="Повторный курс обучения">Повторный курс обучения</option>
                    <option value="Выдано направление">Выдано направление</option>
                    <option value="Нет обратной связи">Нет обратной связи</option>
                </select>
            </div>
            <div class="block">
                <button type="submit" class="button">Добавить выпускника</button>
            </div>
    </form>

    <script src="/js/admin/graduates/graduates.js"></script>
@endsection
