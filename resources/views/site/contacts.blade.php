@extends('site.pageLayout')


@section('pageContent')

<div class="courses-title">КОНТАКТЫ</div>


<div class="container">
	<div class="row contacts-info">
		<div class="col-md-1 col-xs-12">
			<img src="{{ url('/site_images/icon-mail.png') }}" alt="">
		</div>
		<div class="col-md-2 col-xs-12 contacts-text">
			<div>
				mymail@mail.ru
			</div>
		</div>

		<div class="col-md-1 col-md-offset-1 col-xs-12">
			<img src="{{ url('/site_images/icon-phone.png') }}" alt="">
		</div>
		<div class="col-md-2 col-xs-12 contacts-text">
			<div>
				555-5555
				<br>
				555-5555
			</div>
		</div>
		<div class="col-md-1 col-md-offset-1 col-xs-12">
			<img src="{{ url('/site_images/icon-skype.png') }}" alt="">
		</div>
		<div class="col-md-2  col-xs-12 contacts-text">
			<div>
				myskype
			</div>
		</div>
	</div>
	<div class="row mt80">
		<div class="col-md-4">

			<div class="contacts-form">
				<h4>Обратная связь</h4>
				<form method="POST" action="add-feedback">
					{{csrf_field()}}
					<div class="contacts-form-input mt10">
						<input type="text" name="name" placeholder="Имя">
					</div>
					<div class="contacts-form-input mt10">
						<input type="text" name="email" placeholder="Email">
					</div>
					<div class="contacts-form-input mt10">
						<textarea placeholder="Сообщение" name="text"></textarea>
					</div>

					<div class="row">
						<div class="contacts-form-submit bit-form-submit col-md-6 col-md-offset-6">
							<input type="submit" value="Отправить">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-7 col-md-offset-1 contacts-page-text">
			<div class="contacts-logo col-md-4">
				<img src="{{ url('/site_images/logo-copy.png') }}" alt="">
			</div>
			<div class="contacts-text-block col-md-8">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. At non beatae, iure, iusto sed, doloribus ut odio dicta, velit alias eos quia. Ad libero, ipsa aperiam, beatae quam rerum sunt excepturi eligendi a assumenda qui, laboriosam inventore voluptates veritatis facere debitis autem officiis eos, placeat officia quaerat maiores esse accusamus.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, id. Ad laborum, eius earum fuga dolores veritatis officia hic deleniti?
			</div>
		</div>
	</div>
</div>


@stop