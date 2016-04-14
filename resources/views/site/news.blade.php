@extends('site.pageLayout')


@section('pageContent')

<div class="courses-title">
	НОВОСТИ
</div>

<div class="container">
	<div class="row">
		<div class="col-md-9">

			@foreach($news as $newItem)

			<div class="news-item mt20">
				<div class="row">
					<div class="col-md-12">
						<a href=""><div class="news-title">
							{{$newItem->name}}
						</div></a>
					</div>
				</div>
				<div class="row mt10">
					<div class="col-md-4 max-img">
						<a href=""> <img src="{{ url('news_images/' . $newItem->image) }}" alt=""></a>
					</div>
					<div class="col-md-8">
						<div class="news-text">
							{!!$newItem->description!!}
						</div>


						<div class="hr"></div>
						<div class="row">
							<div class="col-md-8">
								<div class="news-date mt10">
									{{$newItem->created_at}}
								</div>
								<div class="news-comments">
									Комментарии(22)
								</div>
							</div>
							<div class="col-md-4 more-block mt10">
								<a href="">
									<div class="news-more">
										Узнать больше
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			@endforeach


			<div class="row">
				<div class="paginator">
					<?php echo $news->render(); ?>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-4">
					<div class="stay-logo max-img mt20">
						<img src="/site_images/staylogo.png" alt="">
					</div>
				</div>
				<div class="col-md-8">
					<div class="stay-text mt20">
						БУДЬ В КУРСЕ!
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="sub-input mt20">
						<input type="text" placeholder="Email">
					</div>
				</div>
			</div>

			<div class="bit-form-submit sub-submit mt5">
				<input type="submit" value="Подписаться на рассылку">
			</div>

			<div class="courses-title">РЕКОМЕНДУЕМ</div>
			<div class="row">

				<div class="col-md-12" >
					@foreach($courses as $course)
					<div class="course-item-side">
						<a href=""><div class="course-logo course-logo-side">
						<img src="{{ url('images/' . $course->logo ) }}" alt="">
						</div>
					</a>
					<div class="row">
						<div class="course-stars">
							<img src="{{ url('site_images/star.png') }}" alt="">
							<img src="{{ url('site_images/star.png') }}" alt="">
							<img src="{{ url('site_images/star.png') }}" alt="">
							<img src="{{ url('site_images/star.png') }}" alt="">
							<img src="{{ url('site_images/star.png') }}" alt="">
						</div>
					</div>

					<div class="row">
						<a href=""><div class="course-title">
							{{$course->name}}
						</div>
					</a>
				</div>

				<div class="row course-buttons">
					<div class="course-more">
						Подробнее
					</div>
					<div class="course-buy">
						Записаться на курс
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
</div>
</div>


@stop