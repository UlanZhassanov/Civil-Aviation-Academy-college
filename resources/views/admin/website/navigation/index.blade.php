@extends('admin.layouts.app')
@php $parrentCat  = 'Управление сайтом' @endphp
@php $active_menu  = 'Меню' @endphp
@section('content')
    @if (session('alert'))
        <div class="alert alert-success">
            <h3>{!! session('alert') !!}</h3>
        </div>
    @endif
    <h1>Управление меню сайта</h1>
    <section id="nav">
        <div class="nav">
            <div class="nav__top">
                <h2>Главное меню</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    Добавить
                </button>
            </div>
            <div class="nav__links">
                <div class="d-flex flex-wrap">
                    <div class="col-md-4 pl-0">
                        <p><b>Название</b></p>
                    </div>
                    <div class="col-md-3">
                        <p><b>Ссылка</b></p>
                    </div>
                    <div class="col-md-1 text-center">
                        <p><b>Сортировка</b></p>
                    </div>
                    <div class="col-md-2 text-center">
                        <p><b>Удалить</b></p>
                    </div>
                    <div class="col-md-2 pr-0 text-right">
                        <p class="text-right"><b>Редактирование</b></p>
                    </div>
                </div>
                @foreach ($tree as $item)
                    <div class="d-flex flex-wrap">
                        <div class="col-md-4 pl-0">
                            <p>{!! $item->title_ru !!}</p>
                        </div>
                        <div class="col-md-3">
                            <p>
                                @if (isset($item->link))
                                    {!! $item->link !!}
                                @else
                                    #
                                @endif
                            </p>
                        </div>
                        <div class="col-md-1 text-center">
                            <p>{!! $item->sort !!}</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <form class="p-0"
                                action="{{ route('admin.website.navigation.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Вы уверены что хотите удалить?')">
                                    Удалить
                                </button>
                            </form>
                        </div>
                        <div class="col-md-2 pr-0 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#editModalItem{!! $item->id !!}">
                                Редактировать
                            </button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="editModalItem{!! $item->id !!}" tabindex="-1">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="modal-form" action="{!! route('admin.website.navigation.update', $item->id) !!}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{!! $item->id !!}">
                                        <div>
                                            <label>Название</label>
                                            <input type="text" name="title_ru" value="{!! $item->title_ru !!}">
                                        </div>
                                        <div>
                                            <label>Аты</label>
                                            <input type="text" name="title_kk" value="{!! $item->title_kk !!}">
                                        </div>
                                        <div>
                                            <label>Title</label>
                                            <input type="text" name="title_en" value="{!! $item->title_en !!}">
                                        </div>
                                        <div>
                                            <label>Ссылка</label>
                                            <input type="text" name="link" value="{!! $item->link !!}">
                                        </div>
                                        <div>
                                            <label>Сортировка</label>
                                            <input type="number" name="sort" value="{!! $item->sort !!}">
                                        </div>
                                        <div>
                                            <label for="active">Активен</label>
                                            <select name="active" id="active" class="form-control">
                                                <option value="1" checked>Да</option>
                                                <option value="0">Нет</option>
                                            </select>
                                        </div>
                                        <div class="block">
                                            <button type="submit" class="btn btn-primary">Сохранить
                                                изменения</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (isset($item->children))
                        @foreach ($item->children as $child)
                            <div class="d-flex flex-wrap">
                                <div class="col-md-4 pl-2">
                                    <p>{!! $child->title_ru !!}</p>
                                </div>
                                <div class="col-md-3">
                                    <p>
                                        @if (isset($child->link))
                                            {!! $child->link !!}
                                        @else
                                            #
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-1 text-center">
                                    <p>{!! $child->sort !!}</p>
                                </div>
                                <div class="col-md-2 text-center">
                                    <form class="p-0"
                                        action="{{ route('admin.website.navigation.destroy', $child->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Вы уверены что хотите удалить?')">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                                <div class="col-md-2 pr-0 text-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#editModalChild{!! $child->id !!}">
                                        Редактировать
                                    </button>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="editModalChild{!! $child->id !!}" tabindex="-1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="modal-form" action="{!! route('admin.website.navigation.update', $child->id) !!}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{!! $child->id !!}">
                                                <div>
                                                    <label>Название</label>
                                                    <input type="text" name="title_ru" value="{!! $child->title_ru !!}">
                                                </div>
                                                <div>
                                                    <label>Аты</label>
                                                    <input type="text" name="title_kk" value="{!! $child->title_kk !!}">
                                                </div>
                                                <div>
                                                    <label>Title</label>
                                                    <input type="text" name="title_en" value="{!! $child->title_en !!}">
                                                </div>
                                                <div>
                                                    <label>Родительская категория</label>
                                                    <select name="parrent_id">
                                                        @foreach ($data as $item)
                                                            @if ($child->id !== $item->id)
                                                                <option value="{!! $item->id !!}"
                                                                    @if ($child->parrent_id === $item->id) selected @endif>
                                                                    {!! $item->title_ru !!} @if ($item->college === 1) *(категория: колледж) @endif</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div>
                                                    <label>Ссылка</label>
                                                    <input type="text" name="link" value="{!! $child->link !!}">
                                                </div>
                                                <div>
                                                    <label>Сортировка</label>
                                                    <input type="number" name="sort" value="{!! $child->sort !!}">
                                                </div>
                                                <div>
                                                    <label for="active">Активен</label>
                                                    <select name="active" id="active" class="form-control">
                                                        <option value="1" checked>Да</option>
                                                        <option value="0">Нет</option>
                                                    </select>
                                                </div>
                                                <div class="block">
                                                    <button type="submit" class="btn btn-primary">Сохранить
                                                        изменения</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (isset($child->children))
                                @foreach ($child->children as $chi)
                                    <div class="d-flex flex-wrap">
                                        <div class="col-md-4 pl-4">
                                            <p> {!! $chi->title_ru !!}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>
                                                @if (isset($chi->link))
                                                    {!! $chi->link !!}
                                                @else
                                                    #
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-1 text-center">
                                            <p>{!! $chi->sort !!}</p>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <form class="p-0"
                                                action="{{ route('admin.website.navigation.destroy', $chi->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Вы уверены что хотите удалить?')">
                                                    Удалить
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-2 pr-0 text-right">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#editModalChi{!! $chi->id !!}">
                                                Редактировать
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="editModalChi{!! $chi->id !!}" tabindex="-1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="modal-form" action="{!! route('admin.website.navigation.update', $chi->id) !!}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" value="{!! $chi->id !!}">
                                                        <div>
                                                            <label>Название</label>
                                                            <input type="text" name="title_ru"
                                                                value="{!! $chi->title_ru !!}">
                                                        </div>
                                                        <div>
                                                            <label>Аты</label>
                                                            <input type="text" name="title_kk"
                                                                value="{!! $chi->title_kk !!}">
                                                        </div>
                                                        <div>
                                                            <label>Title</label>
                                                            <input type="text" name="title_en"
                                                                value="{!! $chi->title_en !!}">
                                                        </div>
                                                        <div>
                                                            <label>Родительская категория</label>
                                                            <select name="parrent_id">
                                                                @foreach ($data as $item)
                                                                    @if ($chi->id !== $item->id)
                                                                        <option value="{!! $item->id !!}"
                                                                            @if ($chi->parrent_id === $item->id) selected @endif>
                                                                            {!! $item->title_ru !!} @if ($item->college === 1) *(категория: колледж) @endif</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label>Ссылка</label>
                                                            <input type="text" name="link" value="{!! $chi->link !!}">
                                                        </div>
                                                        <div>
                                                            <label>Сортировка</label>
                                                            <input type="number" name="sort" value="{!! $chi->sort !!}">
                                                        </div>
                                                        <div>
                                                            <label for="active">Активен</label>
                                                            <select name="active" id="active" class="form-control">
                                                                <option value="1" checked>Да</option>
                                                                <option value="0">Нет</option>
                                                            </select>
                                                        </div>
                                                        <div class="block">
                                                            <button type="submit" class="btn btn-primary">Сохранить
                                                                изменения</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (isset($chi->children))
                                        @foreach ($chi->children as $ch)
                                            <div class="d-flex flex-wrap">
                                                <div class="col-md-4 pl-4">
                                                    <p> {!! $ch->title_ru !!}</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p>
                                                        @if (isset($ch->link))
                                                            {!! $ch->link !!}
                                                        @else
                                                            #
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    <p>{!! $ch->sort !!}</p>
                                                </div>
                                                <div class="col-md-2 text-center">
                                                    <form class="p-0"
                                                        action="{{ route('admin.website.navigation.destroy', $ch->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Вы уверены что хотите удалить?')">
                                                            Удалить
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-md-2 pr-0 text-right">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#editModalCh{!! $ch->id !!}">
                                                        Редактировать
                                                    </button>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="editModalCh{!! $ch->id !!}"
                                                tabindex="-1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="modal-form" action="{!! route('admin.website.navigation.update', $ch->id) !!}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id"
                                                                    value="{!! $ch->id !!}">
                                                                <div>
                                                                    <label>Название</label>
                                                                    <input type="text" name="title_ru"
                                                                        value="{!! $ch->title_ru !!}">
                                                                </div>
                                                                <div>
                                                                    <label>Аты</label>
                                                                    <input type="text" name="title_kk"
                                                                        value="{!! $ch->title_kk !!}">
                                                                </div>
                                                                <div>
                                                                    <label>Title</label>
                                                                    <input type="text" name="title_en"
                                                                        value="{!! $ch->title_en !!}">
                                                                </div>
                                                                <div>
                                                                    <label>Родительская категория</label>
                                                                    <select name="parrent_id">
                                                                        @foreach ($data as $item)
                                                                            @if ($ch->id !== $item->id)
                                                                                <option value="{!! $item->id !!}"
                                                                                    @if ($ch->parrent_id === $item->id) selected @endif>
                                                                                    {!! $item->title_ru !!} @if ($item->college === 1) *(категория: колледж) @endif</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <label>Ссылка</label>
                                                                    <input type="text" name="link"
                                                                        value="{!! $ch->link !!}">
                                                                </div>
                                                                <div>
                                                                    <label>Сортировка</label>
                                                                    <input type="number" name="sort"
                                                                        value="{!! $ch->sort !!}">
                                                                </div>
                                                                <div>
                                                                    <label for="active">Активен</label>
                                                                    <select name="active" id="active"
                                                                        class="form-control">
                                                                        <option value="1" checked>Да</option>
                                                                        <option value="0">Нет</option>
                                                                    </select>
                                                                </div>
                                                                <div class="block">
                                                                    <button type="submit" class="btn btn-primary">Сохранить
                                                                        изменения</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
           		 @endforeach
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="modal-form" action="{!! route('admin.website.navigation.store') !!}" method="POST">
                            @csrf
                            @method('POST')
                            @if ($user_department != 'Авиационный колледж')
                                <div>
                                    <label>Родительское меню:</label>
                                    <input type="checkbox" id="parrent" value="">
                                </div>
                            @endif
                            <div id="select_parrent">
                                <label>Выберите родительскую категорию:</label>
                                <select name="parrent_id">
                                    @foreach ($data as $item)
                                        <option value="{!! $item->id !!}">{!! $item->title_ru !!} @if ($item->college === 1) *(категория: колледж) @endif</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label>Название (ru):</label>
                                <input type="text" name="title_ru" required>
                            </div>
                            <div>
                                <label>Название (kk):</label>
                                <input type="text" name="title_kk" required>
                            </div>
                            <div>
                                <label>Название (en):</label>
                                <input type="text" name="title_en" required>
                            </div>
                            <div>
                                <label>Ссылка:</label>
                                <input type="text" name="link">
                            </div>
                            <div>
                                <label>Сортировка</label>
                                <input type="number" name="sort">
                            </div>
                            <div class="block">
                                <button type="submit" class="btn btn-primary">Добавить элемент</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#parrent').on('click', function() {
                    if ($(this).is(':checked')) {
                        $(this).attr('name', 'parrent_id');
                        $('#select_parrent').slideUp(300);
                        $('#select_parrent select').removeAttr('name');
                    } else {
                        $(this).removeAttr('name');
                        $('#select_parrent').slideDown(300);
                        $('#select_parrent select').attr('name', 'parrent_id');
                    }
                });

                $('.link a').on('click', function() {
                    $(this).parent().parent().parent().find('.sublink').toggle(300);
                    $(this).parent().parent().parent().find('.sublink').toggleClass('flexbox')
                })

                $('.sublink a').on('click', function() {
                    $(this).parent().parent().parent().find('.sub-sublink').toggle(300);
                    $(this).parent().parent().parent().find('.sub-sublink').toggleClass('flexbox')
                })

            })
        </script>
    </section>
@endsection
