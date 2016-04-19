@extends('admin.layout')


@section('content')

<section class="content-header">
	<h1>
		Переменные
	</h1>

</section>



<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Список переменных</h3>
				</div>
				<div class="box-body">
					<table  class="table table-bordered table-hover">
						<tr>
							<th>Название</th>
						</tr>
						@foreach($vars as $varItem)
						<tr>
							<td><a href="/admin/variables/edit/{{$varItem->key}}">{{$varItem->key}}</a></td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Список страниц</h3>
				</div>
				<div class="box-body">
					<table  class="table table-bordered table-hover">
						<tr>
							<th>Название</th>
							<!-- <th>Удалить</th> -->
						</tr>
						@foreach($pages as $page)
						<tr>
							<td><a href="/admin/variables/page-edit/{{$page->id}}">{{$page->title}}</a></td>
							<!-- <td>Удалить</td> -->
						</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</section>


@stop