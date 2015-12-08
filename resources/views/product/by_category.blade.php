@extends('main')

@section('content')
	<div class="col-md-8 text-left">

		@forelse($products as $product)
			<div >
				<table class="table table-bordered ">
					<thead>
						<tr class="success">
							<td><strong>Product name</strong></td>
							<td><h3>{{$product->name}}</h3></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong>Description</strong></td>
							<td><p>{{$product->description}}</p></td>
						</tr>
						<tr>
							<td><strong>In stock</strong></td>
							<td>{{$product->count}} kpl</td>
						</tr>
						<tr>
							<td><strong>Price per unit</strong></td>
							<td>{{formatPrice($product->price)}} €</td>
						</tr>
					</tbody>
					<tfoot>
						
					</tfoot>
				</table>
					
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>Add to cart</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="/add-to-cart" method="post">
							{!! csrf_field() !!}
							<input type="hidden" name="product" value="{{$product->productid}}">
							<div class="form-group">
								<label for="count">Amount</label> 
								<input type="number" value="1" name="count" id="amount" class="form-control">
							</div>
							<div>
								<input type="submit" value="Add to cart" class="btn btn-success">
							</div>
						</form>
					</div>
				</div>
			</div>
		@empty
			<h1>No products in this category. Sad panda :<</h1>
			<img src="//i.imgur.com/74B6GaH.gif" alt="Panda fail">
		@endforelse	
	</div>
@endsection