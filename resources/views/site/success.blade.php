@extends('site.layout')


@section('content')
<!-- 	<div id="window" class="window-up">
		<div id="close-window">x</div>
		<div class="clear"></div>
		<div class="title-window">
			СПАСИБО
		</div>
		<div class="txt-window">
			Nulla laoreet lacus libero, et sodales enim rutrum at. Praesent elit enim, placerat finibus porta in, tincidunt sed mauris. Integer eros felis, facilisis quis placerat tempor, posuere consectetur lacus. 
		</div>
		<div class="more-info"><a href="#">Кнопка</a></div>
	</div> -->

	<div class="courses-title">
		СПАСИБО
	</div>
	<div class="container">
		<div class="sucess">
			<div class="row">
				<div class="course-title">
					Ваша заявка отправлена успешно
				</div>
				<!-- <div class="col-sm-9">
					Nulla laoreet lacus libero, et sodales enim rutrum at. Praesent elit enim, placerat finibus porta in, tincidunt sed mauris. Integer eros felis, facilisis quis placerat tempor, posuere consectetur lacus. 
				</div>
				<div class="col-sm-3">
					<div class="more-info"><a href="#">Узнать больше</a></div>
				</div> -->
			</div>
		</div>
	</div>

	@include('site.components.newsBlock', ['news' => $news])

	@stop