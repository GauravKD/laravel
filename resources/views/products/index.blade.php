@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New product
				</div>

				<div class="panel-body">
					<!-- Display Validation Errors -->
					@include('common.errors')

					<!-- New product Form -->
					<form action="/product" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<!-- product Name -->
						<div class="form-group">
							<label for="product-name" class="col-sm-3 control-label">product</label>

							<div class="col-sm-6">
								<input type="text" name="name" id="product-name" class="form-control" value="{{ old('product') }}">
							</div>
						</div>

						<!-- Add product Button -->
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<button type="submit" class="btn btn-default">
									<i class="fa fa-btn fa-plus"></i>Add Product
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<!-- Current products -->
			@if (count($products) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Current products
					</div>

					<div class="panel-body">
						<table class="table table-striped product-table">
							<thead>
								<th>product</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								@foreach ($products as $product)
									<tr>
										<td class="table-text"><div>{{ $product->name }}</div></td>

										<!-- product Delete Button -->
										<td>
											<form action="/product/{{ $product->id }}" method="POST">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}

												<button type="submit" id="delete-product-{{ $product->id }}" class="btn btn-danger">
													<i class="fa fa-btn fa-trash"></i>Delete
												</button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
