@extends('front.layouts.app')
@section('title')Академия Гражданской Авиации@endsection
@section('content')
    <section id="news">
        <div class="container pt-3 pb-3">
            <div class="d-flex flex-wrap">
                <div class="col-md-1 col-lg-2 col-0 pl-0 pr-1 pb-1"></div>
                <div class="col-md-10 col-lg-8 col-12 pl-0 pr-1 pb-1">
                    <h1>
                        @if (Config::get('app.locale') === 'ru')
                            {!! unserialize($data->titles)->ru !!}
                        @elseif(Config::get('app.locale') === 'kk')
                            {!! unserialize($data->titles)->kk !!}
                        @else
                            {!! unserialize($data->titles)->en !!}
                        @endif
                    </h1>
                    <div class="breadcrumbs">
                        <a href="{!! route('front.home') !!}">Главная</a>
                        <span> > </span>
                        <a href="{!! route('front.news') !!}">Новости</a>
                        <span> > </span>
                        <span>
                            @if (Config::get('app.locale') === 'ru')
                                {!! unserialize($data->titles)->ru !!}
                            @elseif(Config::get('app.locale') === 'kk')
                                {!! unserialize($data->titles)->kk !!}
                            @else
                                {!! unserialize($data->titles)->en !!}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="col-md-1 col-lg-2 col-0 pl-0 pr-1 pb-1"></div>
            </div>
        </div>
		<div class="container pt-3 pb-3">
						<div class="d-flex flex-wrap">
                            <div class="col-md-1 col-lg-2 col-0 pl-0 pr-1 pb-1"></div>
							<div class="col-md-10 col-lg-8 col-12 pl-0 pr-1 pb-1">
								<div class="main-image">
										<a class="group main-image__link" data-fancybox="images"
											href="/storage/news/@if(Config::get('app.locale') === 'ru'){!! unserialize($data->bg_images)->ru !!}@elseif(Config::get('app.locale') === 'kk')@if(empty(unserialize($data->bg_images)->kk)){!! unserialize($data->bg_images)->ru !!}@else{!! unserialize($data->bg_images)->kk !!}@endif @elseif(Config::get('app.locale') === 'en')@if(empty(unserialize($data->bg_images)->en)){!! unserialize($data->bg_images)->ru !!}@else{!! unserialize($data->bg_images)->en !!}@endif @endif">
											<div class="main-image__bg"></div>
											<img src="/storage/news/@if(Config::get('app.locale') === 'ru'){!! unserialize($data->bg_images)->ru !!}@elseif(Config::get('app.locale') === 'kk')@if(empty(unserialize($data->bg_images)->kk)){!! unserialize($data->bg_images)->ru !!}@else{!! unserialize($data->bg_images)->kk !!}@endif @elseif(Config::get('app.locale') === 'en')@if(empty(unserialize($data->bg_images)->en)){!! unserialize($data->bg_images)->ru !!}@else{!! unserialize($data->bg_images)->en !!}@endif @endif" class="h-100 w-100" alt="" />
										</a>
								</div>
							</div>
                            <div class="col-md-1 col-lg-2 col-0 pl-0 pr-1 pb-1"></div>
                            <div class="col-md-1 col-lg-2 col-0 pl-0 pr-1 pb-1"></div>
							<div class="col-md-10 col-lg-8 col-12 p-0">
								<div class="more-images">
										<div @if (count($more_images) > 7) class="d-flex flex-wrap h-100" @else class="d-flex flex-wrap" @endif>
											@foreach ($more_images as $image)
												<div class="col-md-2 col-3 pr-1 mb-1 pl-0">
														<a class="group more-images__link" data-fancybox="images"
															href="/storage/news/{!! $image !!}">
															<div class="more-images__bg"></div>
															<img src="/storage/news/{!! $image !!}" @if (count($more_images) > 7) class="h-100 w-100" @else class="w-100" @endif alt="">
														</a>
												</div>
											@endforeach
										</div>
								</div>
							</div>
                            <div class="col-md-1 col-lg-2 col-0 pl-0 pr-1 pb-1"></div>
                        <div class="col-md-1 col-lg-2 col-0 pl-0 pr-1 pb-1"></div>
						<div class="col-md-10 col-lg-8 col-12 detail-news">
							@if (Config::get('app.locale') === 'ru')
								{!! unserialize($data->descriptions)->ru !!}
							@elseif(Config::get('app.locale') === 'kk')
								{!! unserialize($data->descriptions)->kk !!}
							@else
								{!! unserialize($data->descriptions)->en !!}
							@endif
						</div>
                        <div class="col-md-1 col-lg-2 col-0 pl-0 pr-1 pb-1"></div>
                    </div>
				</div>
    </section>
@endsection
@section('fancybox')
    @include('front.fancybox')
@endsection
