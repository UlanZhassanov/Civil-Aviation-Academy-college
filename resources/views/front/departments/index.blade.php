@extends('front.layouts.app')
@section('title')
    {{ __('Кафедры') }}
@endsection
@section('content')
<section class="wrapper" id="departments_new">
        <div class="container">
            <h1>
                {{ __('Кафедры') }}
            </h1>
            <div class="breadcrumbs">
                <a href="{!! route('front.home') !!}">{{ __('Главная') }}</a>
                <span> > </span>
                <span>{{ __('Кафедры') }}</span>
            </div>
            <div class="row">
                @foreach ($departments as $department)
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <div class="card text-white card-has-bg click-col" style="background-image:url('{!! $department->image !!}');">
                        <img class="card-img d-none" src="{!! $department->image !!}" alt="ddd">
                        <div class="card-img-overlay d-flex flex-column">
                        <div class="card-body">
                            <small class="card-meta mb-2" >---------------------</small>
                            <h3 class="card-title mt-0 "><a class="text-dep stretched-link" href="/departments/{!! $department->slug !!}">{{ __($department->name) }}</a></h3>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
