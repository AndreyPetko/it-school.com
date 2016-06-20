<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<title>Document</title>
	<title> Сертификат</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
</head>
<body>
	<style type="text/css">

		@page {
			/*size: a4;*/
			/*margin: 72px 76px;*/
		}


		html{
			font-family: Roboto;
		}
		#outside {
			/*position: relative;*/
			z-index: -1;
		}

		#outside img {
			max-width: 100%;
		}

		#inside{
			position: absolute;
			z-index: 99;
			width: 100%;
			text-align: center;
			top: 800px;
		}

		h2{
			font-size: 100px;
			color: #436D52;
			font-weight: normal;
			text-transform: uppercase;
			line-height: 100px;
		}

		#name{

		}

		p{
			color: #444873;
			font-size: 60px;
			/*margin-top: 450px;*/
			text-align: left;
			width: 40%;
			/*margin-left: 450px;*/
		}
		#date{
			font-size: 50px;
			/*margin-top: 600px;*/
			text-align: left;
			/*margin-left: 450px;*/
		}

	</style>
	<div id="outside">
		<img src="{{ url('/site_images/sertificat.jpg') }}">
		<div id="inside">
			<div id="name">
				<h2>Иванов</h2>
				<h2>Иван</h2>
			</div>
			<p>Microsoft Word - 
				текстовый редактор</p>
				<div id="date">10.11.2016</div>
			</div>
		</div>

	</body>
	</html>