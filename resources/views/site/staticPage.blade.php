@extends('site.pageLayout')


@section('pageContent')

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="breadcrumbs mt10">
				<a href="/">
					<div class="breadcrumb-item">
						Главная
					</div>
				</a>
				<div class="breadcrumb-icon">
					<img src="{{ url('/site_images/breadcrumbs-item.png') }}" alt="">
				</div>
				<div class="breadcrumb-item">
					{{$page->title}}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="news-title mt20">
				{{$page->title}}
			</div>
		</div>
	</div>

	<div class="page-text mt20">
		{!!$page->text!!}
	</div>
</div>

@stop