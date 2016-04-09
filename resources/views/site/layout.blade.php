<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="{{ url('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('dist/css/site.css') }}">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


	<div id="auth-block" class="auth-block">
		<div class="auth-title">Войти</div>
		<div class="auth-label">
			Логин
		</div>
		<div class="auth-input">
			<input></input>
		</div>
		<div class="auth-label">
			Пароль
		</div>
		<div class="auth-input">
			<input></input>
		</div>
		<div class="auth-submit">
			<input type="submit"></input>
		</div>
	</div>



	<div id="nav-bg"></div>


	<div id="nav">
		<ul>
			<li><a href="index.html" >Главная</a></li>
			<li><a href="#" >О школе</a></li>
			<li id="subMenuButton"><a href="courses.html" >Курсы</a></li>
			<ul id="subMenu">
				<ul class="ulList">
					<a href=""><li>Название курса </li></a>
					<a  href=""><li>Название курса</li></a>
					<a  href=""><li>Название курса </li></a>
					<a  href=""> <li>Название курса </li></a>


				</ul>
				<a href=""  class="subMenuA" > <li>Название категории Название категории Название категории Название категории Название категории  </li></a>
				<ul class="ulList">
					<a class="subMenuA" href=""><li>Название курса </li></a>
					<a class="subMenuA" href=""><li>Название курса</li></a>
					<a class="subMenuA" href=""><li>Название курса </li></a>
					<a class="subMenuA" href=""> <li>Название курса </li></a>
				</ul>
				<a href=""  class="subMenuA" > <li>Название категории </li></a>
				<ul class="ulList">
					<a  href=""><li>Название курса </li></a>
					<a  href=""><li>Название курса</li></a>
					<a  href=""><li>Название курса </li></a>
					<a   href=""> <li>Название курса </li></a>
				</ul>
				<a href=""  class="subMenuA" > <li>Название категории </li></a>
				<ul class="ulList">
					<a  href=""><li>Название курса </li></a>
					<a  href=""><li>Название курса</li></a>
					<a  href=""><li>Название курса </li></a>
					<a  href=""> <li>Название курса </li></a>
				</ul>
				<a href=""  class="subMenuA" > <li>Название категории </li></a>

			</ul>
			<li><a href="#" >Партнерам</a></li>
			<li><a href="news.html" >Новости</a></li>
			<li><a href="contacts.html" >Контакты</a></li>
		</ul>
		<div id="mobile-button">
			<div></div>
			<div></div>
			<div></div>
		</div>

		<div id="student" class="button-student">Я УЧЕНИК</div>
		<a href="zayavka.html"><div id="new-student" class="button-new-student">ПОДАТЬ ЗАЯВКУ</div></a>
	</div>


	<div id="mobile-menu">
		<ul>
			<li><a href="index.html" >Главная</a></li>
			<li><a href="#" >О школе</a></li>
			<li><a href="courses.html" >Курсы</a></li>
			<li><a href="#" >Партнерам</a></li>
			<li><a href="news.html" >Новости</a></li>
			<li><a href="contacts.html" >Контакты</a></li>
		</ul>
	</div>

	@yield('content')

	<div id="arrow-up"><img src="{{ url('site_images/arrow-up.png') }}"></div>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-2 hidden-xs">
					<div class="footer-logo">
						<img src="{{ url('site_images/logo-footer.png') }}" alt="">
					</div>
				</div>
				<div class="col-md-10">
					<div class="footer-links">
						<div class="footer-link"><a href="index.html">Главная</a></div>
						<div class="footer-link"><a href="news.html">Новости</a></div>
						<div class="footer-link"><a href="">Партнерам</a></div>
						<div class="footer-link"><a href="contacts.html">Контакты</a></div>
						<div class="footer-link"><a href="">Подписка на рассылку</a></div>
						<div class="footer-link"><a href="">О школе</a></div>
						<div class="footer-link"><a href="courses.html">Курсы</a></div>
						<div class="footer-link"><a href="">Отзывы</a></div>
						<div class="footer-link"><a href="">FAQ</a></div>
						<div class="footer-link"><a href="">Способы оплаты</a></div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-copy-social">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="copyright">
							IT школа Ирины Бузиковой. Все права защишены.
						</div>
					</div>
					<div class="col-md-6 col-sm-12">
						<div class="footer-social">
							<a href="#"><img src="{{ url('site_images/icon-insta.jpg') }}" alt=""></a>
							<a href="#"><img src="{{ url('site_images/icon-google.png') }}" alt=""></a>
							<a href="#"><img src="{{ url('site_images/icon-vk.png') }}" alt=""></a>
							<a href="#"><img src="{{ url('site_images/icon-ok.png') }}" alt=""></a>
							<a href="#"><img src="{{ url('site_images/icon-fb.jpg') }}" alt=""></a>
							<a href="#"><img src="{{ url('site_images/icon-tw.jpg') }}" alt=""></a>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="create">
						Создание сайт <a href="http://ap-studio.com.ua/">AP-studio</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ url('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
	@yield('js')
</body>
</html>