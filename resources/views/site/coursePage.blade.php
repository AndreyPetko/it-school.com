@extends('site.pageLayout')

@section('pageContent')

<!--   content-->
<div class="container">
	<div class="courses-title">
		КУРСЫ
	</div>
	<div class="breadcrumbs">
		<a href="/">
			<div class="breadcrumb-item">
				Главная
			</div>
		</a>
		<div class="breadcrumb-icon">
			<img src="{{ url('/site_images/breadcrumbs-item.png') }}" alt="">
		</div>
		<a href="/courses">
			<div class="breadcrumb-item">
				Курсы
			</div>
		</a>
		<div class="breadcrumb-icon">
			<img src="{{ url('/site_images/breadcrumbs-item.png') }}" alt="">
		</div>
		<div class="breadcrumb-item">
			{{$course->name}}
		</div>
	</div>

	<div class="row mt60">
		<div class="col-md-5">
			<div class="course-image">
				<div>
					<div>
						<img src="{{ url('/images/' . $course->logo) }}" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="course-page-title">
				{{$course->name}}
			</div>
			<div class="row mt20">
				<div class="course-page-price">
					Цена: <span>{{$course->price}}р</span>
				</div>
				<div class="course-page-stars">
					<img src="{{ url('/site_images/star.png') }}" alt="">
					<img src="{{ url('/site_images/star.png') }}" alt="">
					<img src="{{ url('/site_images/star.png') }}" alt="">
					<img src="{{ url('/site_images/star.png') }}" alt="">
					<img src="{{ url('/site_images/star.png') }}" alt="">
				</div>
				<div class="course-page-rate">
					Рейтинг: 
				</div>

			</div>
			<div class="row mt20 course-page-text">
				<div class="col-lg-12">
					{!!$course->description!!}
				</div>
			</div>
			<div class="row mt10">

				<div class="col-md-5 sub-button-link">
					<a href="{{ url('/add-zayavka/' . $course->id) }}">
						<div class="sub-button">
							Записаться на курс
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt20">
		<div class="col-lg-12">
			<div class="course-page-full-text">
				{!!$course->fullDescription!!}
			</div>
		</div>
	</div>
	<div class="courses-title">
		РЕКОМЕНДУЕМ
	</div>
	<div class="row">
		@foreach($topCourses as $topCourse)
		<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 grid-item category">
			<div class="course-item">
				<a href="{{ url('/course/' . $topCourse->url)}}">
					<div class="course-logo">
					<img src="{{ url('/images/' . $topCourse->logo) }}" alt="">
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
					<a href="{{ url('/course/' . $topCourse->url)}}">
						<div class="course-title">
							{{$topCourse->name}}
						</div>
					</a>
				</div>

				<div class="row">
					<div class="course-text">
						{!!$topCourse->description!!}
					</div>
				</div>

				<div class="row course-buttons">
					<a href="/course/{{$topCourse->url}}">
						<div class="course-more">
							Подробнее
						</div>
					</a>
					<a href="{{ url('/add-zayavka/' . $topCourse->id) }}">
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
<!-- /content-->

@stop