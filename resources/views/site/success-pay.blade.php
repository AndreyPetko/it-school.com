@extends('site.layout')


@section('content')


<div class="courses-title">
	СПАСИБО
</div>
<div class="container">
	<div class="success">
		<div class="row">
			<div class="course-title">
				Вы успешно оплатили заказ
			</div>
		</div>
	</div>
</div>

@include('site.components.newsBlock', ['news' => $news])

@stop