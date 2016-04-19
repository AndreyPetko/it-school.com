@extends('site.pageLayout')


@section('js')
<script src="{{ url('dist/js/zayavka.js') }}"></script>
@stop

@section('pageContent')


<div class="courses-title">
	ПОДАТЬ ЗАЯВКУ НА КУРС
</div>


<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-1">
			<div class="course-list-title">
				КУРСЫ
			</div>
			@foreach($directions as $direction)
			<div class="course-list-item">
				{{$direction->name}}
			</div>
			<div class="course-submenu">
				@foreach($direction['courses'] as $course)
				<div class="course-list-item2 col-md-offset-2" data-courseid='{{$course->id}}'>
					<div class="course-list-logo">
						<img src="{{ url('/images/' . $course->logo) }}" alt="">
					</div>
					<div class="course-name">
						{{$course->name}}
					</div>
				</div>
				@endforeach
			</div>
			@endforeach

		</div>
		<div class="col-md-6 col-md-offset-1">
			<div class="choose-course-title">
				ВЫБРАННЫЕ КУРСЫ
			</div>
			<div class="row" id="current-courses-list">
				@foreach($currentCourses as $currentCourse)
				@include('site.components.bid-item', array('course'=> $currentCourse))
				@endforeach
			</div>
			<div class="choose-course-title mt50">
				ИНФОРМАЦИЯ ОБ УЧЕНИКЕ
			</div>


			<form method="POST">
				{{csrf_field()}}
				<div class="row">

					<div class="bid-form mt20">
						<div class="bid-form-label col-md-10">
							Фамилия
						</div>
						<div class="bid-form-input col-md-10">
							<input type="text" name="surname">
						</div>
						<div class="bid-form-label col-md-10">
							Имя
						</div>
						<div class="bid-form-input col-md-10">
							<input type="text" name="name">
						</div>
						<div class="bid-form-label col-md-10">
							Отчество
						</div>
						<div class="bid-form-input col-md-10">
							<input type="text" name="patronymic">
						</div>
						<div class="bid-form-label col-md-10">
							Email
						</div>
						<div class="bid-form-input col-md-10">
							<input type="text" name="email">
						</div>
						<div class="bid-form-label col-md-10">
							Skype
						</div>
						<div class="bid-form-input col-md-10">
							<input type="text" name="skype">
						</div>
						<div class="bid-form-label col-md-10">
							Дата рождения
						</div>
						<div class="bid-form-input col-md-10">
							<input type="date" name="birthday">
						</div>
						<div class="bid-form-label col-md-10">
							Город
						</div>
						<div class="bid-form-input col-md-10">
							<input type="text" name="city"></input>
						</div>
						<input type="hidden" id="totalprice" name="totalprice" value="{{$totalprice}}"></input>

						<div class="bid-form-totalprice col-md-10 mt10">
							Сумма: {{$totalprice}}р
						</div>

						<div class="col-lg-6 col-lg-offset-4 bit-form-submit mt20">
							<input type="submit" value="Оформить заявку">
						</div>
					</div>

				</div>
			</form>
		</div>
	</div>
</div>

@stop