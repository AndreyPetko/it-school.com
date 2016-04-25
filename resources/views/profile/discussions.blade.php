@extends('profile.layout')

@section('js')
<script src="{{ url('dist/js/discussions.js') }}"></script>
@stop


@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="breadcrumbs">
			<div class="breadcrumb-home">
				<img src="{{ url('/profile_images/home-icon.png') }}" alt="">
			</div>
			<div class="breadcrumb-border"></div>
			<div class="breadcrumb-item">
				Обсуждения
			</div>
		</div>
	</div>

</div>

<div class="content">
	<div class="col-lg-10 col-md-12">
		<div class="row">
			<!--               <div class="col-lg-12">-->
			<div class="title">
				Обсуждения
			</div>
			<!--                </div>-->
		</div>


		<div class="row mt20">
			<div class="col-md-1">
				<div class="disc-logo">
					<img src="{{ url('/profile_images/no-logo.png') }}" alt="">
				</div>
			</div>
			<div class="col-md-2 visible-lg visible-md">
				<div class="disc-label">Выберите курс</div>
				<div class="disc-label">Выберите урок</div>
			</div>
			<div class="col-md-3">
				<div class="disc-input">
					<select id="course">
						<option>Выберите курс</option>
						@foreach($courses as $course)
						<option value="{{$course->id}}">{{$course->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="disc-input">
				<select id="lesson" disabled>
						<option>Выберите урок</option>
						@foreach($courses as $course)
						<option value="{{$course->id}}">{{$course->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="disc-textarea">
					<textarea name="" placeholder="Задайте вопрос" ></textarea>
				</div>
			</div>
			<div class="col-md-2 form-submit disc-submit">
				<button>Отправить</button>
			</div>
		</div>

		<div class="add-disc-line"></div>

		<div class="row mt10">
			<div class="col-md-4">
				<div class="title">Темя обсуждения</div>


				@foreach($courses as $course)

				<div class="course-item">
					{{$course->name}}
				</div>

				@if(count($course->lessons))
				<div class="themes-list">
					@foreach($course->lessons as $lesson)
					<div class="themes-item">
						<div class="themes-item-icon"></div>
						<div class="themes-item-text">{{$lesson->name}}</div>
					</div>
					@endforeach
				</div>
				@endif
				@endforeach

			</div>

			<div class="col-md-8">
				<div class="disc-list">
					@foreach($discussions as $discussion)
					<a href="./one-obsugdenie.html">
						<div class="disc-item">
							<div class="disc-title">
								{{$discussion->title}}
							</div>
							<div class="disc-date hidden-xs">
								{{$discussion->created_at->format('d.m.y')}}
							</div>
							<div class="disc-date hidden-xs">
								Ответов(3)
							</div>
						</div>
					</a>
					@endforeach

				</div>
				<div class="disc-paginator">
					<div class="disc-paginator-item">1</div>
					<div class="disc-paginator-item disc-paginator-item-active">2</div>
					<div class="disc-paginator-item">3</div>
				</div>
			</div>
		</div>

	</div>
	<div class="col-lg-2 visible-lg">
		<img src="{{ url('/profile_images/sov/sova-1.png') }}" alt="">
	</div>
</div>
</div>

@stop