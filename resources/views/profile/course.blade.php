
@extends('profile.layout')


@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="breadcrumbs">
			<div class="breadcrumb-home">
				<img src="{{ url('/profile_images/home-icon.png') }}" alt="">
			</div>
			<div class="breadcrumb-border"></div>
			<div class="breadcrumb-item">
				Консультации
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="course-page-progress">
			<div class="course-progress-text">
				Пройден на <span>{{$course->progress}}%</span>
			</div>
		</div>
		<div class="course-progress-bar hidden-xs">
			<div class="course-progress-bg" style="width: {{$course->progress}}%"></div>
		</div>
	</div>
</div>

<div class="content">
	<div class="col-lg-2 visible-lg">
		<img src="{{ url('/profile_images/%D1%81%D0%BE%D0%B2%D0%B03.png') }}" alt="">
	</div>
	<div class="col-lg-7 col-md-8">
		<div class="row">
			<div class="col-md-10 col-sm-10 col-xs-12">
				<div class="title green">
					{{$course->name}}
				</div>
			</div>
			<div class="col-md-2 hidden-xs ">
				<div class="course-sm-logo">
					<img src="{{ url('/profile_images/logo_excel.png') }}" alt="">
				</div>
			</div>
		</div>


		<div class="lessons-list">
	<!-- 		<a href="./lesson-1.html">
				<div class="lesson">
					<div class="lesson-name">
						№1 Название урока
					</div>
					<div class="lesson-mark">

					</div>
					<div class="lesson-message hidden-xs">
						<img src="{{ url('/profile_images/mail.png') }}" alt="">
					</div>
				</div>
			</a> -->
			@foreach($lessons as $key => $lesson)
			@if($lesson->unavail)
			<div class="lesson lesson-unavail">
				<div class="lesson-name">
					№{{$key + 1}} {{$lesson->name}}
				</div>
				<div class="lesson-mark">

				</div> 
			</div>
			@else
			<a href="{{ url('/profile/lesson/' . $lesson->id) }}">
				<div class="lesson">
					<div class="lesson-name">
						№{{$key + 1}} {{$lesson->name}}
					</div>
					<div class="lesson-mark good">
					@if($lesson->mark)
						{{$lesson->mark}}
					@endif
					</div>
					<div class="lesson-message hidden-xs">
						<img src="{{ url('/profile_images/mail.png') }}" alt="">
					</div>
				</div>
			</a>
			@endif


			@endforeach
<!-- 			<div class="lesson">
				<div class="lesson-name">
					№1 Название урока
				</div>
				<div class="lesson-mark good">
					5
				</div>
				<div class="lesson-message hidden-xs">
					<img src="{{ url('/profile_images/mail.png') }}" alt="">
				</div>
			</div>
			<div class="lesson lesson-avail">
				<div class="lesson-name">
					№1 Название урока №1 Название урока
				</div>
				<div class="lesson-mark good">
					5
				</div>
				<div class="lesson-message hidden-xs">
					<img src="{{ url('/profile_images/mail.png') }}" alt="">
				</div>
			</div>
			<div class="lesson lesson-avail">
				<div class="lesson-name">
					№1 Название урока
				</div>
				<div class="lesson-mark good">
					5
				</div>
				<div class="lesson-message hidden-xs">
					<img src="{{ url('/profile_images/mail.png') }}" alt="">
				</div>
			</div>
			<div class="lesson lesson-unavail">
				<div class="lesson-name">
					№1 Название урока №1 Название урока
				</div>
				<div class="lesson-mark">

				</div> 
			</div>
			<div class="lesson lesson-unavail">
				<div class="lesson-name">
					№1 Название урока
				</div>
				<div class="lesson-mark">

				</div> 
			</div> -->
		</div>
	</div>
	<div class="col-lg-3 col-md-4">
		<div class="title">
			Обсуждения
		</div>
		<div class="ask-question">
			<div class="ask-image">
				<img src="{{ url('/profile_images/question.png') }}" alt="">
			</div>
			<div class="ask-text">
				Задать вопрос
			</div>
		</div>

		<div class="discussion">
			<div class="discussion-title">
				Заголовок обсуждения
			</div>
			<div class="discussion-bottom">
				<div class="discussion-date">
					14.11.15
				</div>
				<div class="disscution-answers">
					Ответов(3)
				</div>
			</div>
		</div>
		<div class="discussion">
			<div class="discussion-title">
				Заголовок обсуждения
				Заголовок обсуждения
				Заголовок обсуждения
			</div>
			<div class="discussion-bottom">
				<div class="discussion-date">
					14.11.15
				</div>
				<div class="disscution-answers">
					Ответов(3)
				</div>
			</div>
		</div>
		<div class="discussion">
			<div class="discussion-title">
				Заголовок обсуждения
			</div>
			<div class="discussion-bottom">
				<div class="discussion-date">
					14.11.15
				</div>
				<div class="disscution-answers">
					Ответов(3)
				</div>
			</div>
		</div>
		<div class="discussion">
			<div class="discussion-title">
				Заголовок обсуждения
			</div>
			<div class="discussion-bottom">
				<div class="discussion-date">
					14.11.15
				</div>
				<div class="disscution-answers">
					Ответов(3)
				</div>
			</div>
		</div>
		<div class="discussion">
			<div class="discussion-title">
				Заголовок обсуждения
			</div>
			<div class="discussion-bottom">
				<div class="discussion-date">
					14.11.15
				</div>
				<div class="disscution-answers">
					Ответов(3)
				</div>
			</div>
		</div>
		<div class="discussion">
			<div class="discussion-title">
				Заголовок обсуждения
			</div>
			<div class="discussion-bottom">
				<div class="discussion-date">
					14.11.15
				</div>
				<div class="disscution-answers">
					Ответов(3)
				</div>
			</div>
		</div>
		<div class="discussion">
			<div class="discussion-title">
				Заголовок обсуждения
			</div>
			<div class="discussion-bottom">
				<div class="discussion-date">
					14.11.15
				</div>
				<div class="disscution-answers">
					Ответов(3)
				</div>
			</div>
		</div>
	</div>
</div>

@stop