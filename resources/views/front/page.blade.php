@extends('front.layouts.app')
@section('title')Академия Гражданской Авиации@endsection
@section('content')
    <section id="pages">
        <div class="container">
            <h1>
                {!! $data->title !!}
            </h1>
				<div class="breadcrumbs">
					<a href="{!! route('front.home') !!}">{{ __('Главная') }}</a>
					<span> > </span>
					<span>{!! $data->title !!}</span>
				</div>
            <div>
                {!! $data->desc !!}
            </div>
        </div>
    </section>
    @if ( $data->slug =="materialy-po-zashchite-doktorskoy-dissertacii-kalekeevoy-m-e-266" || $data->slug =="materialy-po-zashchite-doktorskoy-dissertacii-keribaevoy-t-b-264" || $data->slug =="materialy-po-zashchite-doktorskoy-dissertacii-perminova-i-a-265" )
       <section class="wrapper" id="review">
        @foreach ($revR as $value)
            @if(!empty($value->star_rating))
                    @if($value->booking_id == $data->slug)
                                            <div class="container">
                                                <div class="row">
                                                <div class="col mt-4">
                                                        <p class="font-weight-bold ">{{ $value->name }}</p>
                                                        <div class="form-group row">
                                                            <input type="hidden" name="booking_id" value={{ $data->slug }}>
                                                            <div class="col">
                                                            <div class="rated">
                                                                @for($i=1; $i<=$value->star_rating; $i++)
                                                                {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                                                                <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                                                @endfor
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mt-4">
                                                            <div class="col">
                                                                <p>{{ $value->comments }}</p>
                                                            </div>
                                                        </div>
                                                </div>
                                                </div>
                                                <hr>
                                            </div>

                    @endif
                @endif
        @endforeach
                            <div class="container">
                                    <div class="row">
                                       <div class="col mt-4">
                                          <form class="py-2 px-4" action="{{route('front.review.store')}}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                                             @csrf
                                             <p class="font-weight-bold "> Вы можете оставить отзыв </p>
                                             <div class="form-group row">
                                                <input type="hidden" name="booking_id" value={{ $data->slug }}>
                                                <div class="col">
                                                   <div class="rate">
                                                      <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                                      <label for="star5" title="text">5 stars</label>
                                                      <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                                      <label for="star4" title="text">4 stars</label>
                                                      <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                                      <label for="star3" title="text">3 stars</label>
                                                      <input type="radio" id="star2" class="rate" name="rating" value="2">
                                                      <label for="star2" title="text">2 stars</label>
                                                      <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                                      <label for="star1" title="text">1 star</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group row mt-4">
                                                <div class="col">
                                                   <label for="exampleInputEmail1">Имя</label>
                                                   <input type="name" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите имя" required>
                                                   <br>
                                                   <textarea class="form-control" name="comment" rows="6 " placeholder="Что думаете о работе?" maxlength="150" required></textarea>
                                                </div>
                                             </div>
                                             <div class="mt-3 text-right">
                                                <button class="btn btn-sm py-2 px-3 btn-info" style="background-color:#00008b;">Отправить</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
</section>
      @endif
@endsection


@section('fancybox')
    @include('front.fancybox')
@endsection
