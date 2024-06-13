<div class="modal fade" id="userModal{!! $item->id !!}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.graduate.graduates.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{!! $item->id !!}">
                    <input type="hidden" name="magister" value="0">
                    <input type="hidden" name="resume" value="0">
                    <div class="blocks">
                        <div class="block">
                            <h5 class="block__title">Академическая степень</h5>
                            <select class="block__info" name="type" required>
                                <option value="" @if ($item->type === null) selected @endif>-----</option>
                                <option value="1" @if ($item->type === 1) selected @endif>Бакаклавриат
                                </option>
                                <option value="2" @if ($item->type === 2) selected @endif>Магистратура
                                </option>
                                <option value="3" @if ($item->type === 3) selected @endif>Докторантура
                                </option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Фамилия</h5>
                            <input type="text" value="{!! $item->surname !!}" name="surname" class="block__info">
                        </div>
                        <div class="block">
                            <h5 class="block__title">Имя</h5>
                            <input type="text" value="{!! $item->name !!}" name="name" class="block__info">
                        </div>
                        <div class="block">
                            <h5 class="block__title">Отчество</h5>
                            <input type="text" value="{!! $item->patronymic !!}" name="patronymic" class="block__info">
                        </div>
                        @if ($item->type !== 3)
                            <div class="block">
                                <h5 class="block__title">Группа</h5>
                                <input type="text" value="{!! $item->groupe !!}" name="groupe" class="block__info">
                            </div>
                        @endif
                        @if ($item->type === 1)
                            <div class="block">
                                <h5 class="block__title">Специальность</h5>
                                <select class="block__info" name="speciality">
                                    <option value="">-----</option>
                                    <option
                                        value="Техническая эксплуатация летательных аппаратов и двигателей (механик)"
                                        @if ($item->speciality === 'Техническая эксплуатация летательных аппаратов и двигателей (механик)') selected @endif>Техническая эксплуатация
                                        летательных аппаратов и двигателей (механик)
                                    </option>
                                    <option
                                        value="Техническая эксплуатация систем авионики летательных аппаратов (авионик)"
                                        @if ($item->speciality === 'Техническая эксплуатация систем авионики летательных аппаратов (авионик)') selected @endif>Техническая эксплуатация
                                        систем авионики летательных аппаратов (авионик)
                                    </option>
                                    <option value="Обеспечение авиационной безопасности"
                                        @if ($item->speciality === 'Обеспечение авиационной безопасности') selected @endif>Обеспечение авиационной
                                        безопасности
                                    </option>
                                    <option value="Обслуживание наземного радиоэлектронного оборудования аэропортов"
                                        @if ($item->speciality === 'Обслуживание наземного радиоэлектронного оборудования аэропортов') selected @endif>Обслуживание наземного
                                        радиоэлектронного оборудования аэропортов</option>
                                    <option value="Организация аэропортовой деятельности"
                                        @if ($item->speciality === 'Организация аэропортовой деятельности') selected @endif>Организация аэропортовой
                                        деятельности</option>
                                    <option value="Летная эксплуатация гражданских самолетов (пилот)"
                                        @if ($item->speciality === 'Летная эксплуатация гражданских самолетов (пилот)') selected @endif>Летная эксплуатация
                                        гражданских самолетов (пилот)</option>
                                    <option value="Летная эксплуатация гражданских вертолетов (пилот)"
                                        @if ($item->speciality === 'Летная эксплуатация гражданских вертолетов (пилот)') selected @endif>Летная эксплуатация
                                        гражданских вертолетов (пилот)</option>
                                    <option value="Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)"
                                        @if ($item->speciality === 'Обслуживание воздушного движения и аэронавигационное обеспечение полетов (авиадиспетчер)') selected @endif>Обслуживание воздушного
                                        движения (авиадиспетчер)</option>
                                    <option value="Организация авиационных перевозок"
                                        @if ($item->speciality === 'Организация авиационных перевозок') selected @endif>Организация авиационных
                                        перевозок</option>
                                    <option value="Логистика на транспорте"
                                        @if ($item->speciality === 'Логистика на транспорте') selected @endif>Логистика на транспорте
                                    </option>
                                </select>
                            </div>
                        @endif
                        @if ($item->type === 1 || $item->type === 3)
                            <div class="block">
                                <h5 class="block__title">Образовательная программа</h5>
                                <input type="text" value="{!! $item->edu_program !!}" name="edu_program"
                                    class="block__info">
                            </div>
                        @endif
                        @if ($item->type === 2)
                            <div class="block">
                                <h5 class="block__title">Направление</h5>
                                <select class="block__info" name="edu_direction">
                                    <option value="" @if ($item->edu_direction === null) selected @endif>-----
                                    </option>
                                    <option value="Научно - педагогическое"
                                        @if ($item->edu_direction === 'Научно - педагогическое') selected @endif>Научно - педагогическое
                                    </option>
                                    <option value="Профильное" @if ($item->edu_direction === 'Профильное') selected @endif>
                                        Профильное</option>
                                </select>
                            </div>
                            <div class="block">
                                <h5 class="block__title">Группа образовательных программ</h5>
                                <select class="block__info" name="op_group">
                                    <option value="" @if ($item->op_group === null) selected @endif>-----
                                    </option>
                                    <option value="Авиационная техника и технологии"
                                        @if ($item->op_group === 'Авиационная техника и технологии') selected @endif>Авиационная техника и
                                        технологии</option>
                                    <option value="Летная эксплуатация летательных аппаратов и двигателей"
                                        @if ($item->edu_direction === 'Летная эксплуатация летательных аппаратов и двигателей') selected @endif>Летная эксплуатация
                                        летательных аппаратов и двигателей</option>
                                    <option value="Транспортные услуги"
                                        @if ($item->op_group === 'Транспортные услуги') selected @endif>Транспортные услуги</option>
                                </select>
                            </div>
                        @endif
                        <div class="block">
                            <h5 class="block__title">GPA</h5>
                            <input type="text" class="block__info" name="gpa" value="{!! $item->gpa !!}">
                        </div>
                        <div class="block">
                            <h5 class="block__title">ИИН</h5>
                            <input type="number" value="{!! $item->iin !!}" name="iin" class="block__info"
                                maxlength="12">
                        </div>
                        <div class="block">
                            <h5 class="block__title">Отделение</h5>
                            <select class="block__info" name="form_study">
                                <option value="" disabled selected>-----</option>
                                <option value="грант" @if ($item->form_study === 'грант') selected @endif>грант
                                </option>
                                <option value="платное" @if ($item->form_study === 'платное') selected @endif>платное
                                </option>
                            </select>
                        </div>
                        @if ($item->type === 1)
                            <div class="block">
                                <h5 class="block__title">Международный грант</h5>
                                <select class="block__info" name="international_grant">
                                    <option value="0">-----</option>
                                    <option value="0" @if ($item->international_grant === 0) selected @endif>Нет
                                    </option>
                                    <option value="1" @if ($item->international_grant === 1) selected @endif>Да
                                    </option>
                                </select>
                            </div>
                            <div class="block">
                                <h5 class="block__title">Форма обучения</h5>
                                <select class="block__info" name="edu_form">
                                    <option value="">-----</option>
                                    <option value="очное" @if ($item->edu_form === 'очное') selected @endif>очное
                                    </option>
                                    <option value="очное с применением ДОТ"
                                        @if ($item->edu_form === 'очное с применением ДОТ') selected @endif>очное с применением ДОТ
                                    </option>
                                </select>
                            </div>
                        @elseif($item->type !== 1)
                            <input type="hidden" name="international_grant" value="0">
                        @endif
                        <div class="block">
                            <h5 class="block__title">Адрес</h5>
                            <textarea rows="5" class="block__info" name="reg_address">{!! $item->reg_address !!}</textarea>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Регион</h5>

                            <select class="block__info" name="region">
                                <option value="">-----</option>
                                <option value="Город Алматы" @if ($item->region == 'Город Алматы' || $item->region == 'Город Алматы') selected @endif>Город
                                    Алматы</option>
                                <option value="Город Астана" @if ($item->region === 'Город Астана') selected @endif>
                                    Город Астана</option>
                                <option value="Город Шымкент" @if ($item->region === 'Город Шымкент') selected @endif>Город
                                    Шымкент</option>
                                <option value="Абайская область" @if ($item->region === 'Абайская область') selected @endif>
                                    Абайская область</option>
                                <option value="Акмолинская область"
                                    @if ($item->region === 'Акмолинская область') selected @endif>
                                    Акмолинская область</option>
                                <option value="Актюбинская область"
                                    @if ($item->region === 'Актюбинская область') selected @endif>
                                    Актюбинская область</option>
                                <option value="Алматинская область"
                                    @if ($item->region === 'Алматинская область') selected @endif>
                                    Алматинская область</option>
                                <option value="Атырауская область" @if ($item->region === 'Атырауская область') selected @endif>
                                    Атырауская область</option>
                                <option value="Восточно-Казахстанская область"
                                    @if ($item->region === 'Восточно-Казахстанская область') selected @endif>
                                    Восточно-Казахстанская область</option>
                                <option value="Жамбыльская область"
                                    @if ($item->region === 'Жамбылская область') selected @endif>
                                    Жамбыльская область</option>
                                <option value="Жетысуская область" @if ($item->region === 'Жетысуская обл.') selected @endif>
                                    Жетысуская область</option>
                                <option value="Западно-Казахстанская область"
                                    @if ($item->region === 'Западно-Казахстанская область') selected @endif>
                                    Западно-Казахстанская область</option>
                                <option value="Карагандинская область"
                                    @if ($item->region === 'Карагандинская область') selected @endif>Карагандинская область</option>
                                <option value="Костанайская область"
                                    @if ($item->region === 'Костанайская область') selected @endif>Костанайская область</option>
                                <option value="Кызылординская область"
                                    @if ($item->region === 'Кызылординская область') selected @endif>Кызылординская область</option>
                                <option value="Мангистауская область"
                                    @if ($item->region === 'Мангистауская область') selected @endif>Мангистауская область</option>
                                <option value="Павлодарская область"
                                    @if ($item->region === 'Павлодарская область') selected @endif>Павлодарская область</option>
                                <option value="Северо-Казахстанская область"
                                    @if ($item->region === 'Северо-Казахстанская область') selected @endif>
                                    Северо-Казахстанская область</option>
                                <option value="Туркестанская область"
                                    @if ($item->region === 'Туркестанская область') selected @endif>Туркестанская область</option>
                                <option value="Улытауская область" @if ($item->region === 'Улытауская область') selected @endif>
                                    Улытауская область</option>
                                <option value="Иностранец" @if ($item->region === 'Иностранец') selected @endif>
                                    Иностранец</option>
                            </select>
                        </div>
                        @if ($item->type !== 3)
                            <div class="block">
                                <h5 class="block__title">Продолжение обучения</h5>
                                <select class="block__info" name="continue_education">
                                    <option value="">-----</option>
                                    <option value="0" @if ($item->continue_education === '0') selected @endif>Нет
                                    </option>
                                    @if ($item->type === null)
                                        <option value="Магистратура АГА"
                                            @if ($item->continue_education === 'Магистратура АГА') selected @endif>Магистратура АГА
                                        </option>
                                        <option value="Магистратура другой ВУЗ"
                                            @if ($item->continue_education === 'Магистратура другой ВУЗ') selected @endif>Магистратура другой ВУЗ
                                        </option>
                                        <option value="Докторантура АГА"
                                            @if ($item->continue_education === 'Докторантура АГА') selected @endif>Докторантура АГА
                                        </option>
                                        <option value="Докторантура другой ВУЗ"
                                            @if ($item->continue_education === 'Докторантура другой ВУЗ') selected @endif>Докторантура другой ВУЗ
                                        </option>
                                    @elseif ($item->type === 1)
                                        <option value="Магистратура АГА"
                                            @if ($item->continue_education === 'Магистратура АГА') selected @endif>Магистратура АГА
                                        </option>
                                        <option value="Магистратура другой ВУЗ"
                                            @if ($item->continue_education === 'Магистратура другой ВУЗ') selected @endif>Магистратура другой ВУЗ
                                        </option>
                                    @elseif ($item->type === 2)
                                        <option value="Докторантура АГА"
                                            @if ($item->continue_education === 'Докторантура АГА') selected @endif>Докторантура АГА
                                        </option>
                                        <option value="Докторантура другой ВУЗ"
                                            @if ($item->continue_education === 'Докторантура другой ВУЗ') selected @endif>Докторантура другой ВУЗ
                                        </option>
                                    @endif
                                </select>
                            </div>
                        @endif
                        <div class="block">
                            <h5 class="block__title">Тип занятости</h5>
                            <select class="block__info" name="work">
                                <option value="">-----</option>
                                <option value="0" @if ($item->work === 0) selected @endif>Не
                                    трудоустроен</option>
                                <option value="1" @if ($item->work === 1) selected @endif>Трудоустроен
                                </option>
                            </select>
                        </div>
                        @if ($item->type !== 3)
                            <div class="block">
                                <h5 class="block__title">Вид трудоустройства</h5>
                                <select class="block__info" name="employment_type">
                                    <option value="0">-----</option>
                                    <option value="Трудоустроен, по специальности"
                                        @if ($item->employment_type === 'Трудоустроен, по специальности') selected @endif>Трудоустроен, по
                                        специальности</option>
                                    <option value="Трудоустроен, в авиации"
                                        @if ($item->employment_type === 'Трудоустроен, в авиации') selected @endif>Трудоустроен, в авиации
                                    </option>
                                    <option value="Трудоустроен, не в авиации"
                                        @if ($item->employment_type === 'Трудоустроен, не в авиации') selected @endif>Трудоустроен, не в авиации
                                    </option>
                                </select>
                            </div>
                        @endif
                        <div class="block">
                            <h5 class="block__title">Место работы</h5>
                            <select class="block__info" name="work_place" id="work_place">
                                <option value="0" @if ($item->work_place === '0') selected @endif>-----
                                </option>
                                <option value="АО «Эйр Астана»" @if ($item->work_place === 'АО «Эйр Астана»') selected @endif>АО
                                    «Эйр Астана»</option>
                                <option value="АО «Авиакомпания «SCAT»"
                                    @if ($item->work_place === 'АО «Авиакомпания «SCAT»') selected @endif>АО «Авиакомпания «SCAT»</option>
                                <option value="АО Авиакомпания «Жезказган Эйр»"
                                    @if ($item->work_place === 'АО Авиакомпания «Жезказган Эйр»') selected @endif>АО Авиакомпания «Жезказган Эйр»
                                </option>
                                <option value="АО «Бурундайавиа»" @if ($item->work_place === 'АО «Бурундайавиа»') selected @endif>
                                    АО «Бурундайавиа»</option>
                                <option value="АО «Евро-Азия Эйр»" @if ($item->work_place === 'АО «Евро-Азия Эйр»') selected @endif>
                                    АО «Евро-Азия Эйр»</option>
                                <option value="ТОО «Авиакомпания Comlux-Kz»"
                                    @if ($item->work_place === 'ТОО «Авиакомпания Comlux-Kz»') selected @endif>ТОО «Авиакомпания Comlux-Kz»
                                </option>
                                <option value="АО «Qazaq Air»" @if ($item->work_place === 'АО «Qazaq Air»') selected @endif>АО
                                    «Qazaq Air»</option>
                                <option value="АО «KAZ AIR JET»" @if ($item->work_place === 'АО «KAZ AIR JET»') selected @endif>АО
                                    «KAZ AIR JET»</option>
                                <option value="АО «FlyJet.kz»" @if ($item->work_place === 'АО «FlyJet.kz»') selected @endif>АО
                                    «FlyJet.kz»</option>
                                <option value="ТОО «Авиакомпания «Jupiter jet»"
                                    @if ($item->work_place === 'ТОО «Авиакомпания «Jupiter jet»') selected @endif>ТОО «Авиакомпания «Jupiter jet»
                                </option>
                                <option value="РГП на ПХВ «Беркут»"
                                    @if ($item->work_place === 'РГП на ПХВ «Беркут»') selected @endif>РГП на ПХВ «Беркут»</option>
                                <option value="АО «East Wing»" @if ($item->work_place === 'АО «East Wing»') selected @endif>АО
                                    «East Wing»</option>
                                <option value="АО «Международный аэропорт Алматы»"
                                    @if ($item->work_place === 'АО «Международный аэропорт Алматы»') selected @endif>АО «Международный аэропорт
                                    Алматы»</option>
                                <option value="АО «Международный аэропорт Нурсултан Назарбаев»"
                                    @if ($item->work_place === 'АО «Международный аэропорт Нурсултан Назарбаев»') selected @endif>
                                    АО «Международный аэропорт Нурсултан Назарбаев»
                                </option>
                                <option value="АО «Международный аэропорт Сары-Арка» (г.Караганды)"
                                    @if ($item->work_place === 'АО «Международный аэропорт Сары-Арка» (г.Караганды)') selected @endif>АО «Международный аэропорт
                                    Сары-Арка» (г.Караганды)</option>
                                <option value="ТОО «Международный аэропорт Семей»"
                                    @if ($item->work_place === 'ТОО «Международный аэропорт Семей»') selected @endif>ТОО «Международный аэропорт
                                    Семей»</option>
                                <option value="АО «Международный аэропорт Аулие-Ата» (г. Тараз)"
                                    @if ($item->work_place === 'АО «Международный аэропорт Аулие-Ата» (г. Тараз)') selected @endif>АО «Международный аэропорт
                                    Аулие-Ата» (г. Тараз)</option>
                                <option value="АО «Авиакомпания Жетысу» (г. Талдыкорган)"
                                    @if ($item->work_place === 'АО «Авиакомпания Жетысу» (г. Талдыкорган)') selected @endif>АО «Авиакомпания Жетысу» (г.
                                    Талдыкорган)</option>
                                <option value="АО «Аэропорт Павлодар»"
                                    @if ($item->work_place === 'АО «Аэропорт Павлодар»') selected @endif>АО «Аэропорт Павлодар»</option>
                                <option value="ТОО «Международный аэропорт Орал»"
                                    @if ($item->work_place === 'ТОО «Международный аэропорт Орал»') selected @endif>ТОО «Международный аэропорт
                                    Орал»
                                </option>
                                <option value="ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)"
                                    @if ($item->work_place === 'ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)') selected @endif>ТОО
                                    «Международный аэропорт Кызыл-Жар» (г. Петропавловск)</option>
                                <option value="ТОО «Международный аэропорт Туркистан»"
                                    @if ($item->work_place === 'ТОО «Международный аэропорт Туркистан»') selected @endif>ТОО «Международный аэропорт
                                    Туркистан»</option>
                                <option value="АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)"
                                    @if ($item->work_place === 'АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)') selected @endif>
                                    АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)</option>
                                <option value="АО «Международный аэропорт Актау»"
                                    @if ($item->work_place === 'АО «Международный аэропорт Актау»') selected @endif>АО «Международный аэропорт
                                    Актау»
                                </option>
                                <option value="АО «Международный аэропорт Алия Молдагулова» (г.Актобе)"
                                    @if ($item->work_place === 'АО «Международный аэропорт Алия Молдагулова» (г.Актобе)') selected @endif>АО
                                    «Международный аэропорт Алия Молдагулова» (г.Актобе)</option>
                                <option value="АО «Аэропорт Шымкент»"
                                    @if ($item->work_place === 'АО «Аэропорт Шымкент»') selected @endif>АО «Аэропорт Шымкент»</option>
                                <option value="АО «Аэропорт Коркыт Ата» (г. Кызылорда)"
                                    @if ($item->work_place === 'АО «Аэропорт Коркыт Ата» (г. Кызылорда)') selected @endif>АО «Аэропорт Коркыт Ата» (г.
                                    Кызылорда)</option>
                                <option value="АО «Международный аэропорт Усть-Каменогорск»"
                                    @if ($item->work_place === 'АО «Международный аэропорт Усть-Каменогорск»') selected @endif>АО «Международный аэропорт
                                    Усть-Каменогорск»</option>
                                <option
                                    value="Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»"
                                    @if ($item->work_place === 'Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»') selected @endif>
                                    Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»
                                </option>
                                <option value="АО «Международный аэропорт Костанай»"
                                    @if ($item->work_place === 'АО «Международный аэропорт Костанай»') selected @endif>АО «Международный аэропорт
                                    Костанай»</option>
                                <option value="ТОО «Аэропорт Боралдай»"
                                    @if ($item->work_place === 'ТОО «Аэропорт Боралдай»') selected @endif>ТОО «Аэропорт Боралдай»
                                </option>
                                <option value="ТОО «Транзит Казахстан»"
                                    @if ($item->work_place === 'ТОО «Транзит Казахстан»') selected @endif>ТОО «Транзит Казахстан»
                                </option>
                                <option value="ТОО «Star jet»" @if ($item->work_place === 'ТОО «Star jet»') selected @endif>ТОО
                                    «Star jet»</option>
                                <option value="U project" @if ($item->work_place === 'U project') selected @endif>U
                                    project</option>
                                <option value="Golden Line Logistics"
                                    @if ($item->work_place === 'Golden Line Logistics') selected @endif>Golden Line Logistics</option>
                                <option value="ТОО «Глоббинг»" @if ($item->work_place === 'ТОО «Глоббинг»') selected @endif>ТОО
                                    «Глоббинг»</option>
                                <option value="ИП «Транслогистик»"
                                    @if ($item->work_place === 'ИП «Транслогистик»') selected @endif>ИП «Транслогистик»</option>
                                <option value="GTL Logistics uty"
                                    @if ($item->work_place === 'GTL Logistics uty') selected @endif>GTL Logistics uty</option>
                                <option value="ТОО «Ics Kazakhstan»"
                                    @if ($item->work_place === 'ТОО «Ics Kazakhstan»') selected @endif>ТОО «Ics Kazakhstan»</option>
                                <option value="ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)"
                                    @if ($item->work_place === 'ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)') selected @endif>ТОО «Алферт»
                                    (грузоперевозки по Казахстану и СНГ)</option>
                                <option value="ТОО «Шынгар Транс»"
                                    @if ($item->work_place === 'ТОО «Шынгар Транс»') selected @endif>ТОО «Шынгар Транс»</option>
                                <option value="ТОО «Felix Logistic»"
                                    @if ($item->work_place === 'ТОО «Felix Logistic»') selected @endif>ТОО «Felix Logistic»</option>
                                <option value="Free Line Service"
                                    @if ($item->work_place === 'Free Line Service') selected @endif>Free Line Service</option>
                                <option value="H. B. KazTransService"
                                    @if ($item->work_place === 'H. B. KazTransService') selected @endif>H. B. KazTransService</option>
                                <option value="DHL" @if ($item->work_place === 'DHL') selected @endif>DHL
                                </option>
                                <option value="ТОО «Алем-ТАТ»" @if ($item->work_place === 'ТОО «Алем-ТАТ»') selected @endif>
                                    ТОО «Алем-ТАТ»</option>
                                <option value="Транслайн" @if ($item->work_place === 'Транслайн') selected @endif>
                                    Транслайн</option>
                                <option value="Your Logistics Partner"
                                    @if ($item->work_place === 'Your Logistics Partner') selected @endif>Your Logistics Partner
                                </option>
                                <option value="EurAsiaTransit" @if ($item->work_place === 'EurAsiaTransit') selected @endif>
                                    EurAsiaTransit</option>
                                <option value="Кедентранссервис" @if ($item->work_place === 'Кедентранссервис') selected @endif>
                                    Кедентранссервис</option>
                                <option value="MultiModal Logistics"
                                    @if ($item->work_place === 'MultiModal Logistics') selected @endif>MultiModal Logistics</option>
                                <option value="Rhenus intermodal systems"
                                    @if ($item->work_place === 'Rhenus intermodal systems') selected @endif>Rhenus intermodal systems
                                </option>
                                <option value="Al Jayed Company Logistics"
                                    @if ($item->work_place === 'Al Jayed Company Logistics') selected @endif>Al Jayed Company Logistics
                                </option>
                                <option value="Easy Express" @if ($item->work_place === 'Easy Express') selected @endif>Easy
                                    Express</option>
                                <option value="Jet Logistic" @if ($item->work_place === 'Jet Logistic') selected @endif>Jet
                                    Logistic</option>
                                <option value="Fedex" @if ($item->work_place === 'Fedex') selected @endif>Fedex
                                </option>
                                <option value="ТОО «Aviata»" @if ($item->work_place === 'ТОО «Aviata»') selected @endif>ТОО
                                    «Aviata»</option>
                                <option value="ТОО «ТРАНСАВИА»" @if ($item->work_place === 'ТОО «ТРАНСАВИА»') selected @endif>
                                    ТОО «ТРАНСАВИА»</option>
                                <option value="АО «Авиаремонтный завод №405»"
                                    @if ($item->work_place === 'АО «Авиаремонтный завод №405»') selected @endif>АО «Авиаремонтный завод №405»
                                </option>
                                <option value="ОАО «Авиаремонтный завод №406»"
                                    @if ($item->work_place === 'ОАО «Авиаремонтный завод №406»') selected @endif>ОАО «Авиаремонтный завод №406»
                                </option>
                                <option value="ТОО «Казахстанская Авиационная Индустрия»"
                                    @if ($item->work_place === 'ТОО «Казахстанская Авиационная Индустрия»') selected @endif>ТОО «Казахстанская
                                    Авиационная Индустрия»</option>
                                <option value="РГП «КАЗАЭРОНАВИГАЦИЯ»"
                                    @if ($item->work_place === 'РГП «КАЗАЭРОНАВИГАЦИЯ»') selected @endif>РГП «КАЗАЭРОНАВИГАЦИЯ»
                                </option>
                                <option value="АО «Казавиаспас»" @if ($item->work_place === 'АО «Казавиаспас»') selected @endif>
                                    АО «Казавиаспас»</option>
                                <option value="ТОО «Еврокоптер Казахстан Инжиниринг»"
                                    @if ($item->work_place === 'ТОО «Еврокоптер Казахстан Инжиниринг»') selected @endif>ТОО «Еврокоптер Казахстан
                                    Инжиниринг»</option>
                                <option value="ТОО «КазАвиация»" @if ($item->work_place === 'ТОО «КазАвиация»') selected @endif>
                                    ТОО «КазАвиация»</option>
                                <option value="Caspian Radio Services LLP"
                                    @if ($item->work_place === 'Caspian Radio Services LLP') selected @endif>Caspian Radio Services LLP
                                </option>
                                <option value="ТОО «АУТЦ «Болапан»"
                                    @if ($item->work_place === 'ТОО «АУТЦ «Болапан»') selected @endif>ТОО «АУТЦ «Болапан»</option>
                                <option value="ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»"
                                    @if ($item->work_place === 'ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»') selected @endif>ОЮЛ «Эксплуатанты
                                    легкой и сверхлегкой авиации»</option>
                                <option value="ОЮЛ «Казахстанская ассоциация малой авиации»"
                                    @if ($item->work_place === 'ОЮЛ «Казахстанская ассоциация малой авиации»') selected @endif>ОЮЛ «Казахстанская
                                    ассоциация малой авиации»</option>
                                <option value="АО «Академия Гражданской Авиации»"
                                    @if ($item->work_place === 'АО «Академия Гражданской Авиации»') selected @endif>АО «Академия Гражданской
                                    Авиации»
                                </option>
                                <option value="Другие" @if ($item->work_place === 'Другие') selected @endif>Другие
                                </option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Должность</h5>
                            <input type="text" class="block__info" name="position"
                                value="{!! $item->position !!}">
                        </div>
                        <div class="block">
                            <h5 class="block__title">Статус должности</h5>
                            <select class="block__info" name="position_status">
                                <option value="0">-----</option>
                                <option value="Высший руководящий состав"
                                    @if ($item->position_status === 'Высший руководящий состав') selected @endif>Высший руководящий состав
                                </option>
                                <option value="Средний руководящий состав"
                                    @if ($item->position_status === 'Средний руководящий состав') selected @endif>Средний руководящий состав
                                </option>
                                <option value="Исполнитель" @if ($item->position_status === 'Исполнитель') selected @endif>
                                    Исполнитель</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Наличие справки с места работы</h5>
                            <select class="block__info" name="reference">
                                <option value="0" @if ($item->reference === 0) selected @endif>
                                    Отсутствует
                                </option>
                                <option value="1" @if ($item->reference === 1) selected @endif>Имеется
                                </option>
                            </select>
                        </div>
                        @if (isset($item->reference_doc) && $item->reference_doc !== '')
                            <div class="block">
                                <h5 class="block__title">Справка с места работы</h5>
                                <p class="block__info">
                                    <a href="{!! $item->reference_doc !!}" target="_blank">Справка</a>
                                </p>
                            </div>
                        @else
                            <div class="block">
                                <h5 class="block__title">Прикрепить справку с места работы</h5>
                                <input type="file" name="reference_doc" id="reference_doc" class="block__info">
                            </div>
                        @endif
                        @if ($item->type !== 3)
                            <div class="block">
                                <h5 class="block__title">Наличие портфолио</h5>
                                <select class="block__info" name="have_portfolio">
                                    <option value="Отсутствует" @if ($item->resume === 'Отсутствует') selected @endif>
                                        Отсутствует</option>
                                    <option value="Имеется" @if ($item->resume === 'Имеется') selected @endif>
                                        Имеется
                                    </option>
                                </select>
                            </div>
                        @endif
                        @if ($item->type !== 3 && isset($item->portfolio_doc) && $item->portfolio_doc !== '')
                            <div class="block">
                                <h5 class="block__title">Портфолио выпускника</h5>
                                <p class="block__info">
                                    <a href="{!! $item->portfolio_doc !!}" target="_blank">Портфолио</a>
                                </p>
                            </div>
                        @elseif($item->type !== 3 && (!isset($item->portfolio_doc) || $item->portfolio_doc == ''))
                            <div class="block">
                                <h5 class="block__title">Прикрепить портфолио выпускника</h5>
                                <input type="file" name="portfolio_doc" id="portfolio_doc" class="block__info">
                            </div>
                        @endif
                        <div class="block">
                            <h5 class="block__title">Наличие документов для Фин центра</h5>
                            <select class="block__info" name="have_fincenter_doc">
                                <option value="Отсутствует" @if ($item->resume === 'Отсутствует') selected @endif>
                                    Отсутствует</option>
                                <option value="Имеется" @if ($item->resume === 'Имеется') selected @endif>Имеется
                                </option>
                            </select>
                        </div>
                        @if ($item->type !== 3)
                            <div class="block">
                                <h5 class="block__title">Вручено направление</h5>
                                <select class="block__info" name="direction" id="direction">
                                    <option value="0" @if ($item->direction === 0) selected @endif>Нет
                                    </option>
                                    <option value="1" @if ($item->direction === 1) selected @endif>Да
                                    </option>
                                </select>
                            </div>
                        @endif
                        @if ($item->direction === 1)
                            <div class="block">
                                <h5 class="block__title">Место 1</h5>
                                <select class="block__info" name="direction_place1" id="direction_place1">
                                    <option value="0" @if ($item->direction_place1 === '0') selected @endif>-----
                                    </option>
                                    <option value="АО «Эйр Астана»" @if ($item->direction_place1 === 'АО «Эйр Астана»') selected @endif>АО
                                        «Эйр Астана»</option>
                                    <option value="АО «Авиакомпания «SCAT»"
                                        @if ($item->direction_place1 === 'АО «Авиакомпания «SCAT»') selected @endif>АО «Авиакомпания «SCAT»</option>
                                    <option value="АО Авиакомпания «Жезказган Эйр»"
                                        @if ($item->direction_place1 === 'АО Авиакомпания «Жезказган Эйр»') selected @endif>АО Авиакомпания «Жезказган Эйр»
                                    </option>
                                    <option value="АО «Бурундайавиа»" @if ($item->direction_place1 === 'АО «Бурундайавиа»') selected @endif>
                                        АО «Бурундайавиа»</option>
                                    <option value="АО «Евро-Азия Эйр»" @if ($item->direction_place1 === 'АО «Евро-Азия Эйр»') selected @endif>
                                        АО «Евро-Азия Эйр»</option>
                                    <option value="ТОО «Авиакомпания Comlux-Kz»"
                                        @if ($item->direction_place1 === 'ТОО «Авиакомпания Comlux-Kz»') selected @endif>ТОО «Авиакомпания Comlux-Kz»
                                    </option>
                                    <option value="АО «Qazaq Air»" @if ($item->direction_place1 === 'АО «Qazaq Air»') selected @endif>АО
                                        «Qazaq Air»</option>
                                    <option value="АО «KAZ AIR JET»" @if ($item->direction_place1 === 'АО «KAZ AIR JET»') selected @endif>АО
                                        «KAZ AIR JET»</option>
                                    <option value="АО «FlyJet.kz»" @if ($item->direction_place1 === 'АО «FlyJet.kz»') selected @endif>АО
                                        «FlyJet.kz»</option>
                                    <option value="ТОО «Авиакомпания «Jupiter jet»"
                                        @if ($item->direction_place1 === 'ТОО «Авиакомпания «Jupiter jet»') selected @endif>ТОО «Авиакомпания «Jupiter jet»
                                    </option>
                                    <option value="РГП на ПХВ «Беркут»"
                                        @if ($item->direction_place1 === 'РГП на ПХВ «Беркут»') selected @endif>РГП на ПХВ «Беркут»</option>
                                    <option value="АО «East Wing»" @if ($item->direction_place1 === 'АО «East Wing»') selected @endif>АО
                                        «East Wing»</option>
                                    <option value="АО «Международный аэропорт Алматы»"
                                        @if ($item->direction_place1 === 'АО «Международный аэропорт Алматы»') selected @endif>АО «Международный аэропорт
                                        Алматы»</option>
                                    <option value="АО «Международный аэропорт Нурсултан Назарбаев»"
                                        @if ($item->direction_place1 === 'АО «Международный аэропорт Нурсултан Назарбаев»') selected @endif>
                                        АО «Международный аэропорт Нурсултан Назарбаев»
                                    </option>
                                    <option value="АО «Международный аэропорт Сары-Арка» (г.Караганды)"
                                        @if ($item->direction_place1 === 'АО «Международный аэропорт Сары-Арка» (г.Караганды)') selected @endif>АО «Международный аэропорт
                                        Сары-Арка» (г.Караганды)</option>
                                    <option value="ТОО «Международный аэропорт Семей»"
                                        @if ($item->direction_place1 === 'ТОО «Международный аэропорт Семей»') selected @endif>ТОО «Международный аэропорт
                                        Семей»</option>
                                    <option value="АО «Международный аэропорт Аулие-Ата» (г. Тараз)"
                                        @if ($item->direction_place1 === 'АО «Международный аэропорт Аулие-Ата» (г. Тараз)') selected @endif>АО «Международный аэропорт
                                        Аулие-Ата» (г. Тараз)</option>
                                    <option value="АО «Авиакомпания Жетысу» (г. Талдыкорган)"
                                        @if ($item->direction_place1 === 'АО «Авиакомпания Жетысу» (г. Талдыкорган)') selected @endif>АО «Авиакомпания Жетысу» (г.
                                        Талдыкорган)</option>
                                    <option value="АО «Аэропорт Павлодар»"
                                        @if ($item->direction_place1 === 'АО «Аэропорт Павлодар»') selected @endif>АО «Аэропорт Павлодар»</option>
                                    <option value="ТОО «Международный аэропорт Орал»"
                                        @if ($item->direction_place1 === 'ТОО «Международный аэропорт Орал»') selected @endif>ТОО «Международный аэропорт
                                        Орал»
                                    </option>
                                    <option value="ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)"
                                        @if ($item->direction_place1 === 'ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)') selected @endif>ТОО
                                        «Международный аэропорт Кызыл-Жар» (г. Петропавловск)</option>
                                    <option value="ТОО «Международный аэропорт Туркистан»"
                                        @if ($item->direction_place1 === 'ТОО «Международный аэропорт Туркистан»') selected @endif>ТОО «Международный аэропорт
                                        Туркистан»</option>
                                    <option value="АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)"
                                        @if ($item->direction_place1 === 'АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)') selected @endif>
                                        АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)</option>
                                    <option value="АО «Международный аэропорт Актау»"
                                        @if ($item->direction_place1 === 'АО «Международный аэропорт Актау»') selected @endif>АО «Международный аэропорт
                                        Актау»
                                    </option>
                                    <option value="АО «Международный аэропорт Алия Молдагулова» (г.Актобе)"
                                        @if ($item->direction_place1 === 'АО «Международный аэропорт Алия Молдагулова» (г.Актобе)') selected @endif>АО
                                        «Международный аэропорт Алия Молдагулова» (г.Актобе)</option>
                                    <option value="АО «Аэропорт Шымкент»"
                                        @if ($item->direction_place1 === 'АО «Аэропорт Шымкент»') selected @endif>АО «Аэропорт Шымкент»</option>
                                    <option value="АО «Аэропорт Коркыт Ата» (г. Кызылорда)"
                                        @if ($item->direction_place1 === 'АО «Аэропорт Коркыт Ата» (г. Кызылорда)') selected @endif>АО «Аэропорт Коркыт Ата» (г.
                                        Кызылорда)</option>
                                    <option value="АО «Международный аэропорт Усть-Каменогорск»"
                                        @if ($item->direction_place1 === 'АО «Международный аэропорт Усть-Каменогорск»') selected @endif>АО «Международный аэропорт
                                        Усть-Каменогорск»</option>
                                    <option
                                        value="Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»"
                                        @if ($item->direction_place1 === 'Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»') selected @endif>
                                        Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»
                                    </option>
                                    <option value="АО «Международный аэропорт Костанай»"
                                        @if ($item->direction_place1 === 'АО «Международный аэропорт Костанай»') selected @endif>АО «Международный аэропорт
                                        Костанай»</option>
                                    <option value="ТОО «Аэропорт Боралдай»"
                                        @if ($item->direction_place1 === 'ТОО «Аэропорт Боралдай»') selected @endif>ТОО «Аэропорт Боралдай»
                                    </option>
                                    <option value="ТОО «Транзит Казахстан»"
                                        @if ($item->direction_place1 === 'ТОО «Транзит Казахстан»') selected @endif>ТОО «Транзит Казахстан»
                                    </option>
                                    <option value="ТОО «Star jet»" @if ($item->direction_place1 === 'ТОО «Star jet»') selected @endif>ТОО
                                        «Star jet»</option>
                                    <option value="U project" @if ($item->direction_place1 === 'U project') selected @endif>U
                                        project</option>
                                    <option value="Golden Line Logistics"
                                        @if ($item->direction_place1 === 'Golden Line Logistics') selected @endif>Golden Line Logistics</option>
                                    <option value="ТОО «Глоббинг»" @if ($item->direction_place1 === 'ТОО «Глоббинг»') selected @endif>ТОО
                                        «Глоббинг»</option>
                                    <option value="ИП «Транслогистик»"
                                        @if ($item->direction_place1 === 'ИП «Транслогистик»') selected @endif>ИП «Транслогистик»</option>
                                    <option value="GTL Logistics uty"
                                        @if ($item->direction_place1 === 'GTL Logistics uty') selected @endif>GTL Logistics uty</option>
                                    <option value="ТОО «Ics Kazakhstan»"
                                        @if ($item->direction_place1 === 'ТОО «Ics Kazakhstan»') selected @endif>ТОО «Ics Kazakhstan»</option>
                                    <option value="ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)"
                                        @if ($item->direction_place1 === 'ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)') selected @endif>ТОО «Алферт»
                                        (грузоперевозки по Казахстану и СНГ)</option>
                                    <option value="ТОО «Шынгар Транс»"
                                        @if ($item->direction_place1 === 'ТОО «Шынгар Транс»') selected @endif>ТОО «Шынгар Транс»</option>
                                    <option value="ТОО «Felix Logistic»"
                                        @if ($item->direction_place1 === 'ТОО «Felix Logistic»') selected @endif>ТОО «Felix Logistic»</option>
                                    <option value="Free Line Service"
                                        @if ($item->direction_place1 === 'Free Line Service') selected @endif>Free Line Service</option>
                                    <option value="H. B. KazTransService"
                                        @if ($item->direction_place1 === 'H. B. KazTransService') selected @endif>H. B. KazTransService</option>
                                    <option value="DHL" @if ($item->direction_place1 === 'DHL') selected @endif>DHL
                                    </option>
                                    <option value="ТОО «Алем-ТАТ»" @if ($item->direction_place1 === 'ТОО «Алем-ТАТ»') selected @endif>
                                        ТОО «Алем-ТАТ»</option>
                                    <option value="Транслайн" @if ($item->direction_place1 === 'Транслайн') selected @endif>
                                        Транслайн</option>
                                    <option value="Your Logistics Partner"
                                        @if ($item->direction_place1 === 'Your Logistics Partner') selected @endif>Your Logistics Partner
                                    </option>
                                    <option value="EurAsiaTransit" @if ($item->direction_place1 === 'EurAsiaTransit') selected @endif>
                                        EurAsiaTransit</option>
                                    <option value="Кедентранссервис" @if ($item->direction_place1 === 'Кедентранссервис') selected @endif>
                                        Кедентранссервис</option>
                                    <option value="MultiModal Logistics"
                                        @if ($item->direction_place1 === 'MultiModal Logistics') selected @endif>MultiModal Logistics</option>
                                    <option value="Rhenus intermodal systems"
                                        @if ($item->direction_place1 === 'Rhenus intermodal systems') selected @endif>Rhenus intermodal systems
                                    </option>
                                    <option value="Al Jayed Company Logistics"
                                        @if ($item->direction_place1 === 'Al Jayed Company Logistics') selected @endif>Al Jayed Company Logistics
                                    </option>
                                    <option value="Easy Express" @if ($item->direction_place1 === 'Easy Express') selected @endif>Easy
                                        Express</option>
                                    <option value="Jet Logistic" @if ($item->direction_place1 === 'Jet Logistic') selected @endif>Jet
                                        Logistic</option>
                                    <option value="Fedex" @if ($item->direction_place1 === 'Fedex') selected @endif>Fedex
                                    </option>
                                    <option value="ТОО «Aviata»" @if ($item->direction_place1 === 'ТОО «Aviata»') selected @endif>ТОО
                                        «Aviata»</option>
                                    <option value="ТОО «ТРАНСАВИА»" @if ($item->direction_place1 === 'ТОО «ТРАНСАВИА»') selected @endif>
                                        ТОО «ТРАНСАВИА»</option>
                                    <option value="АО «Авиаремонтный завод №405»"
                                        @if ($item->direction_place1 === 'АО «Авиаремонтный завод №405»') selected @endif>АО «Авиаремонтный завод №405»
                                    </option>
                                    <option value="ОАО «Авиаремонтный завод №406»"
                                        @if ($item->direction_place1 === 'ОАО «Авиаремонтный завод №406»') selected @endif>ОАО «Авиаремонтный завод №406»
                                    </option>
                                    <option value="ТОО «Казахстанская Авиационная Индустрия»"
                                        @if ($item->direction_place1 === 'ТОО «Казахстанская Авиационная Индустрия»') selected @endif>ТОО «Казахстанская
                                        Авиационная Индустрия»</option>
                                    <option value="РГП «КАЗАЭРОНАВИГАЦИЯ»"
                                        @if ($item->direction_place1 === 'РГП «КАЗАЭРОНАВИГАЦИЯ»') selected @endif>РГП «КАЗАЭРОНАВИГАЦИЯ»
                                    </option>
                                    <option value="АО «Казавиаспас»" @if ($item->direction_place1 === 'АО «Казавиаспас»') selected @endif>
                                        АО «Казавиаспас»</option>
                                    <option value="ТОО «Еврокоптер Казахстан Инжиниринг»"
                                        @if ($item->direction_place1 === 'ТОО «Еврокоптер Казахстан Инжиниринг»') selected @endif>ТОО «Еврокоптер Казахстан
                                        Инжиниринг»</option>
                                    <option value="ТОО «КазАвиация»" @if ($item->direction_place1 === 'ТОО «КазАвиация»') selected @endif>
                                        ТОО «КазАвиация»</option>
                                    <option value="Caspian Radio Services LLP"
                                        @if ($item->direction_place1 === 'Caspian Radio Services LLP') selected @endif>Caspian Radio Services LLP
                                    </option>
                                    <option value="ТОО «АУТЦ «Болапан»"
                                        @if ($item->direction_place1 === 'ТОО «АУТЦ «Болапан»') selected @endif>ТОО «АУТЦ «Болапан»</option>
                                    <option value="ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»"
                                        @if ($item->direction_place1 === 'ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»') selected @endif>ОЮЛ «Эксплуатанты
                                        легкой и сверхлегкой авиации»</option>
                                    <option value="ОЮЛ «Казахстанская ассоциация малой авиации»"
                                        @if ($item->direction_place1 === 'ОЮЛ «Казахстанская ассоциация малой авиации»') selected @endif>ОЮЛ «Казахстанская
                                        ассоциация малой авиации»</option>
                                    <option value="АО «Академия Гражданской Авиации»"
                                        @if ($item->direction_place1 === 'АО «Академия Гражданской Авиации»') selected @endif>АО «Академия Гражданской
                                        Авиации»
                                    </option>
                                    <option value="Другие" @if ($item->direction_place1 === 'Другие') selected @endif>Другие
                                    </option>
                                </select>
                            </div>
                            <div class="block">
                                <h5 class="block__title">Место 2</h5>
                                <select class="block__info" name="direction_place2" id="direction_place2">
                                    <option value="0" @if ($item->direction_place2 === '0') selected @endif>-----
                                    </option>
                                    <option value="АО «Эйр Астана»" @if ($item->direction_place2 === 'АО «Эйр Астана»') selected @endif>АО
                                        «Эйр Астана»</option>
                                    <option value="АО «Авиакомпания «SCAT»"
                                        @if ($item->direction_place2 === 'АО «Авиакомпания «SCAT»') selected @endif>АО «Авиакомпания «SCAT»</option>
                                    <option value="АО Авиакомпания «Жезказган Эйр»"
                                        @if ($item->direction_place2 === 'АО Авиакомпания «Жезказган Эйр»') selected @endif>АО Авиакомпания «Жезказган Эйр»
                                    </option>
                                    <option value="АО «Бурундайавиа»" @if ($item->direction_place2 === 'АО «Бурундайавиа»') selected @endif>
                                        АО «Бурундайавиа»</option>
                                    <option value="АО «Евро-Азия Эйр»" @if ($item->direction_place2 === 'АО «Евро-Азия Эйр»') selected @endif>
                                        АО «Евро-Азия Эйр»</option>
                                    <option value="ТОО «Авиакомпания Comlux-Kz»"
                                        @if ($item->direction_place2 === 'ТОО «Авиакомпания Comlux-Kz»') selected @endif>ТОО «Авиакомпания Comlux-Kz»
                                    </option>
                                    <option value="АО «Qazaq Air»" @if ($item->direction_place2 === 'АО «Qazaq Air»') selected @endif>АО
                                        «Qazaq Air»</option>
                                    <option value="АО «KAZ AIR JET»" @if ($item->direction_place2 === 'АО «KAZ AIR JET»') selected @endif>АО
                                        «KAZ AIR JET»</option>
                                    <option value="АО «FlyJet.kz»" @if ($item->direction_place2 === 'АО «FlyJet.kz»') selected @endif>АО
                                        «FlyJet.kz»</option>
                                    <option value="ТОО «Авиакомпания «Jupiter jet»"
                                        @if ($item->direction_place2 === 'ТОО «Авиакомпания «Jupiter jet»') selected @endif>ТОО «Авиакомпания «Jupiter jet»
                                    </option>
                                    <option value="РГП на ПХВ «Беркут»"
                                        @if ($item->direction_place2 === 'РГП на ПХВ «Беркут»') selected @endif>РГП на ПХВ «Беркут»</option>
                                    <option value="АО «East Wing»" @if ($item->direction_place2 === 'АО «East Wing»') selected @endif>АО
                                        «East Wing»</option>
                                    <option value="АО «Международный аэропорт Алматы»"
                                        @if ($item->direction_place2 === 'АО «Международный аэропорт Алматы»') selected @endif>АО «Международный аэропорт
                                        Алматы»</option>
                                    <option value="АО «Международный аэропорт Нурсултан Назарбаев»"
                                        @if ($item->direction_place2 === 'АО «Международный аэропорт Нурсултан Назарбаев»') selected @endif>
                                        АО «Международный аэропорт Нурсултан Назарбаев»
                                    </option>
                                    <option value="АО «Международный аэропорт Сары-Арка» (г.Караганды)"
                                        @if ($item->direction_place2 === 'АО «Международный аэропорт Сары-Арка» (г.Караганды)') selected @endif>АО «Международный аэропорт
                                        Сары-Арка» (г.Караганды)</option>
                                    <option value="ТОО «Международный аэропорт Семей»"
                                        @if ($item->direction_place2 === 'ТОО «Международный аэропорт Семей»') selected @endif>ТОО «Международный аэропорт
                                        Семей»</option>
                                    <option value="АО «Международный аэропорт Аулие-Ата» (г. Тараз)"
                                        @if ($item->direction_place2 === 'АО «Международный аэропорт Аулие-Ата» (г. Тараз)') selected @endif>АО «Международный аэропорт
                                        Аулие-Ата» (г. Тараз)</option>
                                    <option value="АО «Авиакомпания Жетысу» (г. Талдыкорган)"
                                        @if ($item->direction_place2 === 'АО «Авиакомпания Жетысу» (г. Талдыкорган)') selected @endif>АО «Авиакомпания Жетысу» (г.
                                        Талдыкорган)</option>
                                    <option value="АО «Аэропорт Павлодар»"
                                        @if ($item->direction_place2 === 'АО «Аэропорт Павлодар»') selected @endif>АО «Аэропорт Павлодар»</option>
                                    <option value="ТОО «Международный аэропорт Орал»"
                                        @if ($item->direction_place2 === 'ТОО «Международный аэропорт Орал»') selected @endif>ТОО «Международный аэропорт
                                        Орал»
                                    </option>
                                    <option value="ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)"
                                        @if ($item->direction_place2 === 'ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)') selected @endif>ТОО
                                        «Международный аэропорт Кызыл-Жар» (г. Петропавловск)</option>
                                    <option value="ТОО «Международный аэропорт Туркистан»"
                                        @if ($item->direction_place2 === 'ТОО «Международный аэропорт Туркистан»') selected @endif>ТОО «Международный аэропорт
                                        Туркистан»</option>
                                    <option value="АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)"
                                        @if ($item->direction_place2 === 'АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)') selected @endif>
                                        АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)</option>
                                    <option value="АО «Международный аэропорт Актау»"
                                        @if ($item->direction_place2 === 'АО «Международный аэропорт Актау»') selected @endif>АО «Международный аэропорт
                                        Актау»
                                    </option>
                                    <option value="АО «Международный аэропорт Алия Молдагулова» (г.Актобе)"
                                        @if ($item->direction_place2 === 'АО «Международный аэропорт Алия Молдагулова» (г.Актобе)') selected @endif>АО
                                        «Международный аэропорт Алия Молдагулова» (г.Актобе)</option>
                                    <option value="АО «Аэропорт Шымкент»"
                                        @if ($item->direction_place2 === 'АО «Аэропорт Шымкент»') selected @endif>АО «Аэропорт Шымкент»</option>
                                    <option value="АО «Аэропорт Коркыт Ата» (г. Кызылорда)"
                                        @if ($item->direction_place2 === 'АО «Аэропорт Коркыт Ата» (г. Кызылорда)') selected @endif>АО «Аэропорт Коркыт Ата» (г.
                                        Кызылорда)</option>
                                    <option value="АО «Международный аэропорт Усть-Каменогорск»"
                                        @if ($item->direction_place2 === 'АО «Международный аэропорт Усть-Каменогорск»') selected @endif>АО «Международный аэропорт
                                        Усть-Каменогорск»</option>
                                    <option
                                        value="Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»"
                                        @if ($item->direction_place2 === 'Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»') selected @endif>
                                        Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»
                                    </option>
                                    <option value="АО «Международный аэропорт Костанай»"
                                        @if ($item->direction_place2 === 'АО «Международный аэропорт Костанай»') selected @endif>АО «Международный аэропорт
                                        Костанай»</option>
                                    <option value="ТОО «Аэропорт Боралдай»"
                                        @if ($item->direction_place2 === 'ТОО «Аэропорт Боралдай»') selected @endif>ТОО «Аэропорт Боралдай»
                                    </option>
                                    <option value="ТОО «Транзит Казахстан»"
                                        @if ($item->direction_place2 === 'ТОО «Транзит Казахстан»') selected @endif>ТОО «Транзит Казахстан»
                                    </option>
                                    <option value="ТОО «Star jet»" @if ($item->direction_place2 === 'ТОО «Star jet»') selected @endif>ТОО
                                        «Star jet»</option>
                                    <option value="U project" @if ($item->direction_place2 === 'U project') selected @endif>U
                                        project</option>
                                    <option value="Golden Line Logistics"
                                        @if ($item->direction_place2 === 'Golden Line Logistics') selected @endif>Golden Line Logistics</option>
                                    <option value="ТОО «Глоббинг»" @if ($item->direction_place2 === 'ТОО «Глоббинг»') selected @endif>ТОО
                                        «Глоббинг»</option>
                                    <option value="ИП «Транслогистик»"
                                        @if ($item->direction_place2 === 'ИП «Транслогистик»') selected @endif>ИП «Транслогистик»</option>
                                    <option value="GTL Logistics uty"
                                        @if ($item->direction_place2 === 'GTL Logistics uty') selected @endif>GTL Logistics uty</option>
                                    <option value="ТОО «Ics Kazakhstan»"
                                        @if ($item->direction_place2 === 'ТОО «Ics Kazakhstan»') selected @endif>ТОО «Ics Kazakhstan»</option>
                                    <option value="ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)"
                                        @if ($item->direction_place2 === 'ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)') selected @endif>ТОО «Алферт»
                                        (грузоперевозки по Казахстану и СНГ)</option>
                                    <option value="ТОО «Шынгар Транс»"
                                        @if ($item->direction_place2 === 'ТОО «Шынгар Транс»') selected @endif>ТОО «Шынгар Транс»</option>
                                    <option value="ТОО «Felix Logistic»"
                                        @if ($item->direction_place2 === 'ТОО «Felix Logistic»') selected @endif>ТОО «Felix Logistic»</option>
                                    <option value="Free Line Service"
                                        @if ($item->direction_place2 === 'Free Line Service') selected @endif>Free Line Service</option>
                                    <option value="H. B. KazTransService"
                                        @if ($item->direction_place2 === 'H. B. KazTransService') selected @endif>H. B. KazTransService</option>
                                    <option value="DHL" @if ($item->direction_place2 === 'DHL') selected @endif>DHL
                                    </option>
                                    <option value="ТОО «Алем-ТАТ»" @if ($item->direction_place2 === 'ТОО «Алем-ТАТ»') selected @endif>
                                        ТОО «Алем-ТАТ»</option>
                                    <option value="Транслайн" @if ($item->direction_place2 === 'Транслайн') selected @endif>
                                        Транслайн</option>
                                    <option value="Your Logistics Partner"
                                        @if ($item->direction_place2 === 'Your Logistics Partner') selected @endif>Your Logistics Partner
                                    </option>
                                    <option value="EurAsiaTransit" @if ($item->direction_place2 === 'EurAsiaTransit') selected @endif>
                                        EurAsiaTransit</option>
                                    <option value="Кедентранссервис" @if ($item->direction_place2 === 'Кедентранссервис') selected @endif>
                                        Кедентранссервис</option>
                                    <option value="MultiModal Logistics"
                                        @if ($item->direction_place2 === 'MultiModal Logistics') selected @endif>MultiModal Logistics</option>
                                    <option value="Rhenus intermodal systems"
                                        @if ($item->direction_place2 === 'Rhenus intermodal systems') selected @endif>Rhenus intermodal systems
                                    </option>
                                    <option value="Al Jayed Company Logistics"
                                        @if ($item->direction_place2 === 'Al Jayed Company Logistics') selected @endif>Al Jayed Company Logistics
                                    </option>
                                    <option value="Easy Express" @if ($item->direction_place2 === 'Easy Express') selected @endif>Easy
                                        Express</option>
                                    <option value="Jet Logistic" @if ($item->direction_place2 === 'Jet Logistic') selected @endif>Jet
                                        Logistic</option>
                                    <option value="Fedex" @if ($item->direction_place2 === 'Fedex') selected @endif>Fedex
                                    </option>
                                    <option value="ТОО «Aviata»" @if ($item->direction_place2 === 'ТОО «Aviata»') selected @endif>ТОО
                                        «Aviata»</option>
                                    <option value="ТОО «ТРАНСАВИА»" @if ($item->direction_place2 === 'ТОО «ТРАНСАВИА»') selected @endif>
                                        ТОО «ТРАНСАВИА»</option>
                                    <option value="АО «Авиаремонтный завод №405»"
                                        @if ($item->direction_place2 === 'АО «Авиаремонтный завод №405»') selected @endif>АО «Авиаремонтный завод №405»
                                    </option>
                                    <option value="ОАО «Авиаремонтный завод №406»"
                                        @if ($item->direction_place2 === 'ОАО «Авиаремонтный завод №406»') selected @endif>ОАО «Авиаремонтный завод №406»
                                    </option>
                                    <option value="ТОО «Казахстанская Авиационная Индустрия»"
                                        @if ($item->direction_place2 === 'ТОО «Казахстанская Авиационная Индустрия»') selected @endif>ТОО «Казахстанская
                                        Авиационная Индустрия»</option>
                                    <option value="РГП «КАЗАЭРОНАВИГАЦИЯ»"
                                        @if ($item->direction_place2 === 'РГП «КАЗАЭРОНАВИГАЦИЯ»') selected @endif>РГП «КАЗАЭРОНАВИГАЦИЯ»
                                    </option>
                                    <option value="АО «Казавиаспас»" @if ($item->direction_place2 === 'АО «Казавиаспас»') selected @endif>
                                        АО «Казавиаспас»</option>
                                    <option value="ТОО «Еврокоптер Казахстан Инжиниринг»"
                                        @if ($item->direction_place2 === 'ТОО «Еврокоптер Казахстан Инжиниринг»') selected @endif>ТОО «Еврокоптер Казахстан
                                        Инжиниринг»</option>
                                    <option value="ТОО «КазАвиация»" @if ($item->direction_place2 === 'ТОО «КазАвиация»') selected @endif>
                                        ТОО «КазАвиация»</option>
                                    <option value="Caspian Radio Services LLP"
                                        @if ($item->direction_place2 === 'Caspian Radio Services LLP') selected @endif>Caspian Radio Services LLP
                                    </option>
                                    <option value="ТОО «АУТЦ «Болапан»"
                                        @if ($item->direction_place2 === 'ТОО «АУТЦ «Болапан»') selected @endif>ТОО «АУТЦ «Болапан»</option>
                                    <option value="ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»"
                                        @if ($item->direction_place2 === 'ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»') selected @endif>ОЮЛ «Эксплуатанты
                                        легкой и сверхлегкой авиации»</option>
                                    <option value="ОЮЛ «Казахстанская ассоциация малой авиации»"
                                        @if ($item->direction_place2 === 'ОЮЛ «Казахстанская ассоциация малой авиации»') selected @endif>ОЮЛ «Казахстанская
                                        ассоциация малой авиации»</option>
                                    <option value="АО «Академия Гражданской Авиации»"
                                        @if ($item->direction_place2 === 'АО «Академия Гражданской Авиации»') selected @endif>АО «Академия Гражданской
                                        Авиации»
                                    </option>
                                    <option value="Другие" @if ($item->direction_place2 === 'Другие') selected @endif>Другие
                                    </option>
                                </select>
                            </div>
                            <div class="block">
                                <h5 class="block__title">Место 3</h5>
                                <select class="block__info" name="direction_place3" id="direction_place3">
                                    <option value="0" @if ($item->direction_place3 === '0') selected @endif>-----
                                    </option>
                                    <option value="АО «Эйр Астана»" @if ($item->direction_place3 === 'АО «Эйр Астана»') selected @endif>АО
                                        «Эйр Астана»</option>
                                    <option value="АО «Авиакомпания «SCAT»"
                                        @if ($item->direction_place3 === 'АО «Авиакомпания «SCAT»') selected @endif>АО «Авиакомпания «SCAT»</option>
                                    <option value="АО Авиакомпания «Жезказган Эйр»"
                                        @if ($item->direction_place3 === 'АО Авиакомпания «Жезказган Эйр»') selected @endif>АО Авиакомпания «Жезказган Эйр»
                                    </option>
                                    <option value="АО «Бурундайавиа»" @if ($item->direction_place3 === 'АО «Бурундайавиа»') selected @endif>
                                        АО «Бурундайавиа»</option>
                                    <option value="АО «Евро-Азия Эйр»" @if ($item->direction_place3 === 'АО «Евро-Азия Эйр»') selected @endif>
                                        АО «Евро-Азия Эйр»</option>
                                    <option value="ТОО «Авиакомпания Comlux-Kz»"
                                        @if ($item->direction_place3 === 'ТОО «Авиакомпания Comlux-Kz»') selected @endif>ТОО «Авиакомпания Comlux-Kz»
                                    </option>
                                    <option value="АО «Qazaq Air»" @if ($item->direction_place3 === 'АО «Qazaq Air»') selected @endif>АО
                                        «Qazaq Air»</option>
                                    <option value="АО «KAZ AIR JET»" @if ($item->direction_place3 === 'АО «KAZ AIR JET»') selected @endif>АО
                                        «KAZ AIR JET»</option>
                                    <option value="АО «FlyJet.kz»" @if ($item->direction_place3 === 'АО «FlyJet.kz»') selected @endif>АО
                                        «FlyJet.kz»</option>
                                    <option value="ТОО «Авиакомпания «Jupiter jet»"
                                        @if ($item->direction_place3 === 'ТОО «Авиакомпания «Jupiter jet»') selected @endif>ТОО «Авиакомпания «Jupiter jet»
                                    </option>
                                    <option value="РГП на ПХВ «Беркут»"
                                        @if ($item->direction_place3 === 'РГП на ПХВ «Беркут»') selected @endif>РГП на ПХВ «Беркут»</option>
                                    <option value="АО «East Wing»" @if ($item->direction_place3 === 'АО «East Wing»') selected @endif>АО
                                        «East Wing»</option>
                                    <option value="АО «Международный аэропорт Алматы»"
                                        @if ($item->direction_place3 === 'АО «Международный аэропорт Алматы»') selected @endif>АО «Международный аэропорт
                                        Алматы»</option>
                                    <option value="АО «Международный аэропорт Нурсултан Назарбаев»"
                                        @if ($item->direction_place3 === 'АО «Международный аэропорт Нурсултан Назарбаев»') selected @endif>
                                        АО «Международный аэропорт Нурсултан Назарбаев»
                                    </option>
                                    <option value="АО «Международный аэропорт Сары-Арка» (г.Караганды)"
                                        @if ($item->direction_place3 === 'АО «Международный аэропорт Сары-Арка» (г.Караганды)') selected @endif>АО «Международный аэропорт
                                        Сары-Арка» (г.Караганды)</option>
                                    <option value="ТОО «Международный аэропорт Семей»"
                                        @if ($item->direction_place3 === 'ТОО «Международный аэропорт Семей»') selected @endif>ТОО «Международный аэропорт
                                        Семей»</option>
                                    <option value="АО «Международный аэропорт Аулие-Ата» (г. Тараз)"
                                        @if ($item->direction_place3 === 'АО «Международный аэропорт Аулие-Ата» (г. Тараз)') selected @endif>АО «Международный аэропорт
                                        Аулие-Ата» (г. Тараз)</option>
                                    <option value="АО «Авиакомпания Жетысу» (г. Талдыкорган)"
                                        @if ($item->direction_place3 === 'АО «Авиакомпания Жетысу» (г. Талдыкорган)') selected @endif>АО «Авиакомпания Жетысу» (г.
                                        Талдыкорган)</option>
                                    <option value="АО «Аэропорт Павлодар»"
                                        @if ($item->direction_place3 === 'АО «Аэропорт Павлодар»') selected @endif>АО «Аэропорт Павлодар»</option>
                                    <option value="ТОО «Международный аэропорт Орал»"
                                        @if ($item->direction_place3 === 'ТОО «Международный аэропорт Орал»') selected @endif>ТОО «Международный аэропорт
                                        Орал»
                                    </option>
                                    <option value="ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)"
                                        @if ($item->direction_place3 === 'ТОО «Международный аэропорт Кызыл-Жар» (г. Петропавловск)') selected @endif>ТОО
                                        «Международный аэропорт Кызыл-Жар» (г. Петропавловск)</option>
                                    <option value="ТОО «Международный аэропорт Туркистан»"
                                        @if ($item->direction_place3 === 'ТОО «Международный аэропорт Туркистан»') selected @endif>ТОО «Международный аэропорт
                                        Туркистан»</option>
                                    <option value="АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)"
                                        @if ($item->direction_place3 === 'АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)') selected @endif>
                                        АО «Международный аэропорт Атырау» имени Хиуаз Доспановой» (г. Атырау)</option>
                                    <option value="АО «Международный аэропорт Актау»"
                                        @if ($item->direction_place3 === 'АО «Международный аэропорт Актау»') selected @endif>АО «Международный аэропорт
                                        Актау»
                                    </option>
                                    <option value="АО «Международный аэропорт Алия Молдагулова» (г.Актобе)"
                                        @if ($item->direction_place3 === 'АО «Международный аэропорт Алия Молдагулова» (г.Актобе)') selected @endif>АО
                                        «Международный аэропорт Алия Молдагулова» (г.Актобе)</option>
                                    <option value="АО «Аэропорт Шымкент»"
                                        @if ($item->direction_place3 === 'АО «Аэропорт Шымкент»') selected @endif>АО «Аэропорт Шымкент»</option>
                                    <option value="АО «Аэропорт Коркыт Ата» (г. Кызылорда)"
                                        @if ($item->direction_place3 === 'АО «Аэропорт Коркыт Ата» (г. Кызылорда)') selected @endif>АО «Аэропорт Коркыт Ата» (г.
                                        Кызылорда)</option>
                                    <option value="АО «Международный аэропорт Усть-Каменогорск»"
                                        @if ($item->direction_place3 === 'АО «Международный аэропорт Усть-Каменогорск»') selected @endif>АО «Международный аэропорт
                                        Усть-Каменогорск»</option>
                                    <option
                                        value="Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»"
                                        @if ($item->direction_place3 === 'Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»') selected @endif>
                                        Филиал АО «Международный аэропорт Нурсултан Назарбаев - АО «Аэропорт «Кокшетау»
                                    </option>
                                    <option value="АО «Международный аэропорт Костанай»"
                                        @if ($item->direction_place3 === 'АО «Международный аэропорт Костанай»') selected @endif>АО «Международный аэропорт
                                        Костанай»</option>
                                    <option value="ТОО «Аэропорт Боралдай»"
                                        @if ($item->direction_place3 === 'ТОО «Аэропорт Боралдай»') selected @endif>ТОО «Аэропорт Боралдай»
                                    </option>
                                    <option value="ТОО «Транзит Казахстан»"
                                        @if ($item->direction_place3 === 'ТОО «Транзит Казахстан»') selected @endif>ТОО «Транзит Казахстан»
                                    </option>
                                    <option value="ТОО «Star jet»" @if ($item->direction_place3 === 'ТОО «Star jet»') selected @endif>ТОО
                                        «Star jet»</option>
                                    <option value="U project" @if ($item->direction_place3 === 'U project') selected @endif>U
                                        project</option>
                                    <option value="Golden Line Logistics"
                                        @if ($item->direction_place3 === 'Golden Line Logistics') selected @endif>Golden Line Logistics</option>
                                    <option value="ТОО «Глоббинг»" @if ($item->direction_place3 === 'ТОО «Глоббинг»') selected @endif>ТОО
                                        «Глоббинг»</option>
                                    <option value="ИП «Транслогистик»"
                                        @if ($item->direction_place3 === 'ИП «Транслогистик»') selected @endif>ИП «Транслогистик»</option>
                                    <option value="GTL Logistics uty"
                                        @if ($item->direction_place3 === 'GTL Logistics uty') selected @endif>GTL Logistics uty</option>
                                    <option value="ТОО «Ics Kazakhstan»"
                                        @if ($item->direction_place3 === 'ТОО «Ics Kazakhstan»') selected @endif>ТОО «Ics Kazakhstan»</option>
                                    <option value="ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)"
                                        @if ($item->direction_place3 === 'ТОО «Алферт» (грузоперевозки по Казахстану и СНГ)') selected @endif>ТОО «Алферт»
                                        (грузоперевозки по Казахстану и СНГ)</option>
                                    <option value="ТОО «Шынгар Транс»"
                                        @if ($item->direction_place3 === 'ТОО «Шынгар Транс»') selected @endif>ТОО «Шынгар Транс»</option>
                                    <option value="ТОО «Felix Logistic»"
                                        @if ($item->direction_place3 === 'ТОО «Felix Logistic»') selected @endif>ТОО «Felix Logistic»</option>
                                    <option value="Free Line Service"
                                        @if ($item->direction_place3 === 'Free Line Service') selected @endif>Free Line Service</option>
                                    <option value="H. B. KazTransService"
                                        @if ($item->direction_place3 === 'H. B. KazTransService') selected @endif>H. B. KazTransService</option>
                                    <option value="DHL" @if ($item->direction_place3 === 'DHL') selected @endif>DHL
                                    </option>
                                    <option value="ТОО «Алем-ТАТ»" @if ($item->direction_place3 === 'ТОО «Алем-ТАТ»') selected @endif>
                                        ТОО «Алем-ТАТ»</option>
                                    <option value="Транслайн" @if ($item->direction_place3 === 'Транслайн') selected @endif>
                                        Транслайн</option>
                                    <option value="Your Logistics Partner"
                                        @if ($item->direction_place3 === 'Your Logistics Partner') selected @endif>Your Logistics Partner
                                    </option>
                                    <option value="EurAsiaTransit" @if ($item->direction_place3 === 'EurAsiaTransit') selected @endif>
                                        EurAsiaTransit</option>
                                    <option value="Кедентранссервис" @if ($item->direction_place3 === 'Кедентранссервис') selected @endif>
                                        Кедентранссервис</option>
                                    <option value="MultiModal Logistics"
                                        @if ($item->direction_place3 === 'MultiModal Logistics') selected @endif>MultiModal Logistics</option>
                                    <option value="Rhenus intermodal systems"
                                        @if ($item->direction_place3 === 'Rhenus intermodal systems') selected @endif>Rhenus intermodal systems
                                    </option>
                                    <option value="Al Jayed Company Logistics"
                                        @if ($item->direction_place3 === 'Al Jayed Company Logistics') selected @endif>Al Jayed Company Logistics
                                    </option>
                                    <option value="Easy Express" @if ($item->direction_place3 === 'Easy Express') selected @endif>Easy
                                        Express</option>
                                    <option value="Jet Logistic" @if ($item->direction_place3 === 'Jet Logistic') selected @endif>Jet
                                        Logistic</option>
                                    <option value="Fedex" @if ($item->direction_place3 === 'Fedex') selected @endif>Fedex
                                    </option>
                                    <option value="ТОО «Aviata»" @if ($item->direction_place3 === 'ТОО «Aviata»') selected @endif>ТОО
                                        «Aviata»</option>
                                    <option value="ТОО «ТРАНСАВИА»" @if ($item->direction_place3 === 'ТОО «ТРАНСАВИА»') selected @endif>
                                        ТОО «ТРАНСАВИА»</option>
                                    <option value="АО «Авиаремонтный завод №405»"
                                        @if ($item->direction_place3 === 'АО «Авиаремонтный завод №405»') selected @endif>АО «Авиаремонтный завод №405»
                                    </option>
                                    <option value="ОАО «Авиаремонтный завод №406»"
                                        @if ($item->direction_place3 === 'ОАО «Авиаремонтный завод №406»') selected @endif>ОАО «Авиаремонтный завод №406»
                                    </option>
                                    <option value="ТОО «Казахстанская Авиационная Индустрия»"
                                        @if ($item->direction_place3 === 'ТОО «Казахстанская Авиационная Индустрия»') selected @endif>ТОО «Казахстанская
                                        Авиационная Индустрия»</option>
                                    <option value="РГП «КАЗАЭРОНАВИГАЦИЯ»"
                                        @if ($item->direction_place3 === 'РГП «КАЗАЭРОНАВИГАЦИЯ»') selected @endif>РГП «КАЗАЭРОНАВИГАЦИЯ»
                                    </option>
                                    <option value="АО «Казавиаспас»" @if ($item->direction_place3 === 'АО «Казавиаспас»') selected @endif>
                                        АО «Казавиаспас»</option>
                                    <option value="ТОО «Еврокоптер Казахстан Инжиниринг»"
                                        @if ($item->direction_place3 === 'ТОО «Еврокоптер Казахстан Инжиниринг»') selected @endif>ТОО «Еврокоптер Казахстан
                                        Инжиниринг»</option>
                                    <option value="ТОО «КазАвиация»" @if ($item->direction_place3 === 'ТОО «КазАвиация»') selected @endif>
                                        ТОО «КазАвиация»</option>
                                    <option value="Caspian Radio Services LLP"
                                        @if ($item->direction_place3 === 'Caspian Radio Services LLP') selected @endif>Caspian Radio Services LLP
                                    </option>
                                    <option value="ТОО «АУТЦ «Болапан»"
                                        @if ($item->direction_place3 === 'ТОО «АУТЦ «Болапан»') selected @endif>ТОО «АУТЦ «Болапан»</option>
                                    <option value="ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»"
                                        @if ($item->direction_place3 === 'ОЮЛ «Эксплуатанты легкой и сверхлегкой авиации»') selected @endif>ОЮЛ «Эксплуатанты
                                        легкой и сверхлегкой авиации»</option>
                                    <option value="ОЮЛ «Казахстанская ассоциация малой авиации»"
                                        @if ($item->direction_place3 === 'ОЮЛ «Казахстанская ассоциация малой авиации»') selected @endif>ОЮЛ «Казахстанская
                                        ассоциация малой авиации»</option>
                                    <option value="АО «Академия Гражданской Авиации»"
                                        @if ($item->direction_place3 === 'АО «Академия Гражданской Авиации»') selected @endif>АО «Академия Гражданской
                                        Авиации»
                                    </option>
                                    <option value="Другие" @if ($item->direction_place3 === 'Другие') selected @endif>Другие
                                    </option>
                                </select>
                            </div>
                        @endif
                        <div class="block">
                            <h5 class="block__title">Телефон</h5>
                            <input type="text" name="phone" class="block__info"
                                value="{!! $item->phone !!}">
                        </div>
                        <div class="block">
                            <h5 class="block__title">Год и месяц окончания обучения</h5>
                            <input type="month" name="grad_year" class="block__info"
                                value="{!! substr($item->grad_year, 0, 7) !!}">
                        </div>
                        <div class="block">
                            <h5 class="block__title">Статус выпускника</h5>
                            <select name="graduate_status" class="block__info">
                                <option value="">-----</option>
                                <option value="Трудоустроен" @if ($item->graduate_status === 'Трудоустроен') selected @endif>
                                    Трудоустроен
                                </option>
                                <option value="Призван в ряды вооруженных сил"
                                    @if ($item->graduate_status === 'Призван в ряды вооруженных сил') selected @endif>Призван в ряды вооруженных сил
                                </option>
                                <option value="Отпуск по уходу за ребенком"
                                    @if ($item->graduate_status === 'Отпуск по уходу за ребенком') selected @endif>Отпуск по уходу за ребенком
                                </option>
                                <option
                                    value="Повторный курс обучения"@if ($item->graduate_status === 'Повторный курс обучения') selected @endif>
                                    Повторный курс обучения</option>
                                <option value="Выдано направление"
                                    @if ($item->graduate_status === 'Выдано направление') selected @endif>Выдано направление</option>
                                <option value="Нет обратной связи"
                                    @if ($item->graduate_status === 'Нет обратной связи') selected @endif>Нет обратной связи</option>
                            </select>
                        </div>
                        <div class="block">
                            <button type="submit" class="button">Сохранить изменения</button>
                        </div>
                </form>
                <div class="block">
                    <form action="{{ route('admin.graduate.graduates.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button" onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
