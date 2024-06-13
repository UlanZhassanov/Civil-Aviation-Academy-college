<div class="modal fade" id="userModal{!! $item->id !!}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.graduate.graduates.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{!! $item->id !!}">
                    <div class="blocks">
                        <div class="block">
                            <h5 class="block__title">Фамилия</h5>
                            <p class="block__info">{!! $item->surname !!}</p>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Имя</h5>
                            <p class="block__info">{!! $item->name !!}</p>
                        </div>
                        @if (isset($item->patronymic))
                            <div class="block">
                                <h5 class="block__title">Отчество</h5>
                                <p class="block__info">{!! $item->patronymic !!}</p>
                            </div>
                        @endif
                        <div class="block">
                            <h5 class="block__title">Группа</h5>
                            <p class="block__info">{!! $item->groupe !!}</p>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Общая группа</h5>
                            <select class="block__info" name="unification">
                                <option value="">-----</option>
                                <option value="АТ-(МХ)" @if ($item->unification === 'АТ-(МХ)') selected @endif>АТ-(МХ)</option>
                                <option value="АТ-(АВ)" @if ($item->unification === 'АТ-(АВ)') selected @endif>АТ-(АВ)</option>
                                <option value="АТ-(ОНО)" @if ($item->unification === 'АТ-(ОНО)') selected @endif>АТ-(ОНО)</option>
                                <option value="АТ-АБ" @if ($item->unification === 'АТ-АБ') selected @endif>АТ-АБ</option>
                                <option value="АТ-ОВД" @if ($item->unification === 'АТ-ОВД') selected @endif>АТ-ОВД</option>
                                <option value="ОП-ЛГ" @if ($item->unification === 'ОП-ЛГ') selected @endif>ОП-ЛГ</option>
                                <option value="ОП" @if ($item->unification === 'ОП') selected @endif>ОП</option>
                                <option value="Д-ЛЭ" @if ($item->unification === 'Д-ЛЭ') selected @endif>Д-ЛЭ</option>
                                <option value="Д-МХ" @if ($item->unification === 'Д-МХ') selected @endif>Д-МХ</option>
                                <option value="Д-АВ" @if ($item->unification === 'Д-АВ') selected @endif>Д-АВ</option>
                                <option value="Д-ОВД" @if ($item->unification === 'Д-ОВД') selected @endif>Д-ОВД</option>
                                <option value="Д-АБ" @if ($item->unification === 'Д-АБ') selected @endif>Д-АБ</option>
                                <option value="Д-ОНО" @if ($item->unification === 'Д-ОНО') selected @endif>Д-ОНО</option>
                                <option value="Д-ОП" @if ($item->unification === 'Д-ОП') selected @endif>Д-ОП</option>
                                <option value="Д-ОП-ЛГ" @if ($item->unification === 'Д-ОП-ЛГ') selected @endif>Д-ОП-ЛГ</option>
                                <option value="МНП-АТ" @if ($item->unification === 'МНП-АТ') selected @endif>МНП-АТ</option>
                                <option value="МП-ТУ" @if ($item->unification === 'МП-ТУ') selected @endif>МП-ТУ</option>
                                <option value="МНП-ТУ" @if ($item->unification === 'МНП-ТУ') selected @endif>МНП-ТУ</option>
                                <option value="ДОК-АТ" @if ($unification === 'ДОК-АТ') selected @endif>ДОК-АТ</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">GPA</h5>
                            <input type="text" class="block__info" name="gpa" value="{!! $item->gpa !!}">
                        </div>
                        <div class="block">
                            <h5 class="block__title">ИИН</h5>
                            <p class="block__info">{!! $item->iin !!}</p>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Форма обучения</h5>
                            <p class="block__info">{!! $item->form_study !!}</p>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Адрес прописки</h5>
                            <textarea rows="5" class="block__info" name="reg_address">{!! $item->reg_address !!}</textarea>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Адрес проживания</h5>
                            <textarea rows="5" class="block__info"
                                name="res_address">{!! $item->res_address !!}</textarea>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Регион</h5>
                            <select class="block__info" name="region">
                                <option value="">-----</option>
                                <option value="г. Алматы" @if ($item->region === 'г. Алматы') selected @endif>г. Алматы</option>
                                <option value="г. Астана" @if ($item->region === 'г. Астана') selected @endif>г. Астана</option>
                                <option value="г. Шымкент" @if ($item->region === 'г. Шымкент') selected @endif>г. Шымкент</option>
                                <option value="Акмолинская обл." @if ($item->region === 'Акмолинская обл.') selected @endif>Акмолинская обл.</option>
                                <option value="Актюбинская обл." @if ($item->region === 'Актюбинская обл.') selected @endif>Актюбинская обл.</option>
                                <option value="Алматинская обл." @if ($item->region === 'Алматинская обл.') selected @endif>Алматинская обл.</option>
                                <option value="Атырауская обл." @if ($item->region === 'Атырауская обл.') selected @endif>Атырауская обл.</option>
                                <option value="Восточно-Казахстанская обл." @if ($item->region === 'Восточно-Казахстанская обл.') selected @endif>Восточно-Казахстанская обл.</option>
                                <option value="Жамбыльская обл." @if ($item->region === 'Жамбыльская обл.') selected @endif>Жамбыльская обл.</option>
                                <option value="Западно-Казахстанская обл." @if ($item->region === 'Западно-Казахстанская обл.') selected @endif>Западно-Казахстанская обл.</option>
                                <option value="Карагандинская обл." @if ($item->region === 'Карагандинская обл.') selected @endif>Карагандинская обл.</option>
                                <option value="Костанайская обл." @if ($item->region === 'Костанайская обл.') selected @endif>Костанайская обл.</option>
                                <option value="Кызылординская обл." @if ($item->region === 'Кызылординская обл.') selected @endif>Кызылординская обл.</option>
                                <option value="Мангистауская обл." @if ($item->region === 'Мангистауская обл.') selected @endif>Мангистауская обл.</option>
                                <option value="Павлодарская обл." @if ($item->region === 'Павлодарская обл.') selected @endif>Павлодарская обл.</option>
                                <option value="Северо-Казахстанская обл." @if ($item->region === 'Северо-Казахстанская обл.') selected @endif>Северо-Казахстанская обл.</option>
                                <option value="Туркестанская обл." @if ($item->region === 'Туркестанская обл.') selected @endif>Туркестанская обл.</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Специальность</h5>
                            <p class="block__info">{!! $item->speciality !!}</p>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Поступление на магистратуру</h5>
                            <select class="block__info" name="magister">
                                <option value="0" @if ($item->magister === 0) selected @endif>Нет</option>
                                <option value="1" @if ($item->magister === 1) selected @endif>Да</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Имеется работа</h5>
                            <select class="block__info" name="work">
                                <option value="">-----</option>
                                <option value="0" @if ($item->work === 0) selected @endif>Нет</option>
                                <option value="1" @if ($item->work === 1) selected @endif>Да</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Работа</h5>
                            <input type="text" class="block__info" name="work_place" value="{!! $item->work_place !!}">
                        </div>
                        <div class="block">
                            <h5 class="block__title">Получили справку</h5>
                            <select class="block__info" name="reference">
                                <option value="0" @if ($item->reference === 0) selected @endif>Нет</option>
                                <option value="1" @if ($item->reference === 1) selected @endif>Да</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Получили резюме</h5>
                            <select class="block__info" name="resume">
                                <option value="0" @if ($item->resume === 0) selected @endif>Нет</option>
                                <option value="1" @if ($item->resume === 1) selected @endif>Да</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Заполнены документы</h5>
                            <select class="block__info" name="document">
                                <option value="0" @if ($item->document === 0) selected @endif>Нет</option>
                                <option value="1" @if ($item->document === 1) selected @endif>Да</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Вручено направление</h5>
                            <select class="block__info" name="direction" id="direction">
                                <option value="0" @if ($item->direction === 0) selected @endif>Нет</option>
                                <option value="1" @if ($item->direction === 1) selected @endif>Да</option>
                            </select>
                        </div>
                        @if ($item->direction === 1)
                            <div class="block">
                                <h5 class="block__title">Место 1</h5>
                                <input type="text" name="directionPlace1" class="block__info"
                                    value="{!! $item->direction_place1 !!}">
                            </div>
                            <div class="block">
                                <h5 class="block__title">Место 2</h5>
                                <input type="text" name="directionPlace2" class="block__info"
                                    value="{!! $item->direction_place2 !!}">
                            </div>
                            <div class="block">
                                <h5 class="block__title">Место 3</h5>
                                <input type="text" name="directionPlace3" class="block__info"
                                    value="{!! $item->direction_place3 !!}">
                            </div>
                        @endif
                        <div class="block">
                            <h5 class="block__title">Телефон</h5>
                            <input type="text" name="phone" class="block__info" value="{!! $item->phone !!}">
                        </div>
                        <div class="block">
                            <h5 class="block__title">Год окончания</h5>
                            <select class="block__info" name="graduation_year">
                                <option value="" @if ($item->graduation_year === null) selected @endif>-----</option>
                                <option value="2021" @if ($item->graduation_year === 2021) selected @endif>2021</option>
                                <option value="2022" @if ($item->graduation_year === 2022) selected @endif>2022</option>
                                <option value="2023" @if ($item->graduation_year === 2023) selected @endif>2023</option>
                                <option value="2024" @if ($item->graduation_year === 2024) selected @endif>2024</option>
                                <option value="2025" @if ($item->graduation_year === 2025) selected @endif>2025</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Квартал окончания</h5>
                            <select class="block__info" name="quarter">
                                <option value="" @if ($item->quarter === null) selected @endif>-----</option>
                                <option value="1" @if ($item->quarter === 1) selected @endif>1-й квартал</option>
                                <option value="2" @if ($item->quarter === 2) selected @endif>2-й квартал</option>
                            </select>
                        </div>
                        <div class="block">
                            <h5 class="block__title">Процесс</h5>
                            <select name="process" class="block__info">
                                <option value="-----">-----</option>
                                <option value="Армия" @if ($item->process === 'Армия') selected @endif>Армия</option>
                                <option value="Декрет" @if ($item->process === 'Декрет') selected @endif>Декрет</option>
                                <option value="Повторный курс" @if ($item->process === 'Повторный курс') selected @endif>
                                    Повторный курс</option>
                                <option value="Выписано направление" @if ($item->process === 'Выписано направление') selected @endif>Выписано направление</option>
                                <option value="Обработанный" @if ($item->process === 'Обработанный') selected @endif>Обработанный</option>
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
