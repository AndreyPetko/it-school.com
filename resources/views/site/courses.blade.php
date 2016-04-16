@extends('site.pageLayout')


@section('js')
<script src="{{ url('dist/js/isetop.js') }}"></script>
<script src="{{ url('dist/js/direction.js') }}"></script>
@stop

@section('pageContent')
<!--   content-->
<div class="container">

    <div class="content">
        <div class="courses-title">
            КУРСЫ
        </div>
        
        <div class="row categories-list">
            <div class="col-md-2 category-list-active col-sm-4 col-xs-6 category-button" id="all">
                Все категории
            </div>
            @foreach($directions as $direction)
            <div class="col-md-2 col-sm-4 col-xs-6 category-button" id="direc-{{$direction->id}}">
                {{$direction->name}}
            </div>
            @endforeach
        </div>
        
        <div class="row grid">

            @foreach($courses as $course)
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 grid-item direc-{{$course->direction_id}}">
             <div class="course-item">
                 <a href="/course/{{$course->url}}">
                    <div class="course-logo">
                        <img src="{{ url('/images/' . $course->logo) }}" alt="">
                    </div>
                </a>
                <div class="row">
                    <div class="course-stars">
                        <img src="{{ url('/site_images/star.png') }}" alt="">
                        <img src="{{ url('/site_images/star.png') }}" alt="">
                        <img src="{{ url('/site_images/star.png') }}" alt="">
                        <img src="{{ url('/site_images/star.png') }}" alt="">
                        <img src="{{ url('/site_images/star.png') }}" alt="">
                    </div>
                </div>

                <div class="row">
                 <a href="/course/{{$course->url}}">
                     <div class="course-title">
                        {{$course->name}}
                    </div>
                </a>
            </div>

            <div class="row">
                <div class="course-text">
                    {!!$course->description!!}
                </div>
            </div>

            <div class="row course-buttons">
                <a href="/course/{{$course->url}}">
                    <div class="course-more">
                     Подробнее
                 </div>
             </a>
             <a href="zayavka.html">
                 <div class="course-buy">
                    Записаться на курс
                </div>
            </a>
        </div>
    </div>
</div>

@endforeach



</div>
</div>

</div>
<!--    /content-->

@stop