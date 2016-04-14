	@extends('admin.layout')


	@section('content')

	<section class="content-header">
		<h1>
			Изменить значение переменной
		</h1>
	</section>

	<section class="content">
		<div class="row">

			<div class="col-md-12">

				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Форма редактирования переменной</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form method="POST" action="" enctype="multipart/form-data">
							{{csrf_field()}}

							<div class="form-group">
								<label for="description">{{$key}}:</label>
								<textarea name="value" id="value" class="form-control" rows="10">{{$varItem}}</textarea>
							</div>



							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<button type="submit" class="btn btn-block btn-primary btn-flat">Обновить</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>


	</section>

	@stop