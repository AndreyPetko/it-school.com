@extends('admin.layout')


@section('content')

<section class="content-header">
	<h1>
		Информация о пользователе
	</h1>
</section>

<section class="my-content">
	<div class="box-body table-responsive no-padding info-table">
		<table class="table table-bordered">
			<tbody>

				<tr>
					<th>Поле</th>
					<th>Значение</th>
				</tr>

				<tr>
					<td>Имя</td>
					<td>{{$user->name}}</td>
				</tr>

				<tr>
					<td>Фамилия</td>
					<td>{{$user->surname}}</td>
				</tr>

				<tr>
					<td>Отчество</td>
					<td>{{$user->patronymic}}</td>
				</tr>


				<tr>
					<td>Email</td>
					<td>{{$user->email}}</td>
				</tr>

				<tr>
					<td>Skype</td>
					<td>{{$user->skype}}</td>
				</tr>

				<tr>
					<td>Дата рождения</td>
					<td>{{$user->birthday}}</td>
				</tr>


				<tr>
					<td>Город</td>
					<td>{{$user->city}}</td>
				</tr>




			</tbody>
		</table>
	</div>
</section>

<section class="content-header">
	<h1>
		Курсы пользователя
	</h1>
</section>


<section class="my-content">
	<div class="box-body table-responsive no-padding info-table">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th>Курс</th>
					<th>Текуший урок</th>
					<th>Домашние задания</th>
					<th>Удалить</th>
				</tr>

				@foreach($courses as $course)
				<tr>
					<td>{{$course->name}}</td>
					<td>{{$course->current_lesson_id}}</td>
					<td><a href="/admin/users/course-homework/{{$user->id}}/{{$course->id}}">Посмотреть</a></td>
					<td><a href="/admin/users/users-course-delete/{{$user->id}}/{{$course->id}}">Удалить</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</section>

@stop