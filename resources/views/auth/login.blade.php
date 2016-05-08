@extends('site.layout')


@section('content')



<div  class="auth-block auth-page-block" style="display: block;">
	@if(Session::get('errors'))
	<div class="errors">
			Неправильный логин или пароль
	</div>
	@endif

	<form method="POST" action="../auth/login">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="courses-title">ВОЙТИ</div>
		<div class="auth-label">
			Логин
		</div>
		<div class="auth-input">
			<input name="email">
		</div>
		<div class="auth-label">
			Пароль
		</div>
		<div class="auth-input">
			<input name="password" type="password">
		</div>
		<div class="auth-fogotten-password">
		Забыли пароль
		</div>
		<div class="auth-submit">
			<input type="submit" value="Войти">
		</div>
	</form>
</div>
<div class="clear"></div>
<div class="auth-to-study">
<h4>Стать учеником</h4>
<p>Что б стать нашим учеником - подайте заявку на интересным Вам курс</p>
<a href="/zayavka">Подать заявку на курс</a>
</div>
@stop