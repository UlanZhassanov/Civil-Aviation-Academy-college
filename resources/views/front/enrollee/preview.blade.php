@extends('front.layouts.app')
@section('title')Поступление в Академию Гражданской Авиации@endsection
@section('content')
    <section id="enrollee">
        <div class="container">
            <h1>{{ __('Онлайн регистрация абитуриентов') }}</h1>
            <div class="preview">
                <a href="{{ route('front.enrollee.bachelor.index') }}" class="preview__item">{{ __('Бакалавриат') }}</a>
                <a href="{{ route('front.enrollee.master.index') }}" class="preview__item">{{ __('Магистратура') }}</a>
                <a href="{{ route('front.enrollee.doctoral.index') }}" class="preview__item">{{ __('Докторантура') }}</a>
            </div>
        </div>
    </section>
@endsection

<script src="//code.jivo.ru/widget/bYmff7N0x8" async></script>
