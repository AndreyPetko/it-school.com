@extends('profile.layout')



@section('content')

<div class="breadcrumbs">
	<div class="breadcrumb-home">
		<img src="{{ url('/profile_images/home-icon.png') }}" alt="">
	</div>
	<div class="breadcrumb-border"></div>
	<div class="breadcrumb-item">
		Консультации
	</div>
</div>

<div class="content">

	<div class="row">
		<div class="col-lg-11 col-md-10 col-sm-10 col-xs-12">
			<div class="title green">Урок №{{$lesson->position}} {{$lesson->name}}</div>
		</div>
		<div class="col-lg-1 col-sm-2 hidden-xs">
			<div class="course-sm-logo">
				<img src="{{ url('/profile_images/logo_excel.png') }}" alt="">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6">
			<div class="lesson-part">
				<a href="{{ url('profile/lesson/' . $lesson->id) }}">
					Текст урока
				</a>
			</div>
		</div>
		<div class="col-md-3 col-xs-6">
			<div class="lesson-part lesson-part-active">
				<a href="{{ url('profile/lesson-homework/' . $lesson->id) }}">
					Домашнее задание
				</a>
			</div>
		</div>


		@if($lesson->more_info)
		<div class="col-md-3 col-xs-6">
			<div class="lesson-part ">
				<a href="{{ url('profile/lesson-more/' . $lesson->id) }}">
					Дополнительная информация
				</a>
			</div>
		</div>
		@endif

		<div class="col-md-2 col-xs-12 lesson-page-mark">
			@if($mark)
			Оценка: <span>{{$mark}}</span>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="lesson-text">
				{!!$lesson->home_text!!}
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-2 visible-lg">
			<img src="{{ url('/profile_images/sov/sova-4.png') }}" alt="">
		</div>
		<div class="col-lg-7 col-md-8">
			<div class="title">
				Отправить домашнее задание
			</div>

			<div class="row">
				<div class="col-sm-2 hidden-xs">
					@if($mark)
					<div class="mt20">
						<img src="{{ url('/profile_images/check-mark-3-xxl.png') }}" alt="">
					</div>
					@endif
				</div>
				<div class="col-sm-7 col-xs-9">
					<div class="homework-title">
						Домашнее задание отправлено
					</div>
					<div class="files-list">
						@foreach($files as $file)
						<div class="themes-item">
							<div class="themes-item-icon"></div>
							<div class="themes-item-text filename">@if($file->comment) {{$file->comment}} @else Новый файл @endif</div>
						</div>
						@endforeach
					</div>
					
					<div class="send-more">
						<!-- <button>Отправить еще</button> -->
						<form method="post" action="/profile/add-homework" enctype="multipart/form-data" class="file-input">
							{{csrf_field()}}
							<input type="hidden" value="{{$lesson->id}}" name="lesson_id"></input>
							<input type="file" id="file" name="file" style="display: none;"></input>
							<label for="file" id="file-label" class="file-label">Выберите файл</label>
							<textarea name="comment"></textarea>
							<div class="row">
								<div class="form-submit col-md-4 col-md-offset-8 mt0">
									<button type="submit">Отправить</button>
								</div>
							</div>
						</form>
					</div>

				</div>
				<div class="col-xs-3 lesson-page-mark-bot">
					@if($mark)
					Оценка <span>{{$mark}}</span>
					@endif
				</div>
			</div>
			<div class="one-disc-line mt10"></div>

			<div class="answer-list">
				@if(count($messages) != 0)
				@foreach($messages as $message)
				<div class="one-answer">
					<div class="row">
						<div class="col-md-offset-1 col-xs-2">
							<div class="user-logo">
								@if($message->admin)
								<img src="{{ url('/profile_images/112965409_suychik.png') }}" alt="">
								@else
								<img src="{{ url('/user_logos/' . Auth::user()->logo) }}">
								@endif
							</div>
							<div class="user-name">
								@if($message->admin)
								Admin
								@else
								{{Auth::user()->name}}
								@endif
							</div>
						</div>
						<div class="col-xs-7">
							<div class="one-disc-text">
								{!!$message->message!!}
							</div>
						</div>
						<div class="col-xs-2">
							<div class="one-disc-date">
								{{$message->created_at->format('h:i:s d.m.y')}}
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<div class="empty-messages">
					Переписка пуста
				</div>
				@endif

			</div>
			@include('pagination.default', ['paginator' => $messages])

			<div class="row">
				<form method="POST" action="/profile/add-lesson-message">
					{{csrf_field()}}
					<input type="hidden" name="lesson_id" value="{{$lesson->id}}"></input>
					<div class="new-answer-row">
						<div class="col-md-11 col-md-offset-1 answer-area">
							<textarea placeholder="Введите сообщение" name="message"></textarea>
						</div>
						<div class="col-md-3 col-md-offset-9 form-submit mt10">
							<button type="submit">Отправить</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-lg-3 col-md-4">
			@include('profile.components.discussion-block', ['discussions' => $discussions])
		</div>

	</div>
</div>

@stop