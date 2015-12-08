@extends("admin.main")
@section("title", "Admin view")
@section('content')
	
	<div class=" products-dropdown border-bottom">
		<h1>Modify products</h1>
		<label for="products">Select a product:</label> <br/>
		<select name="products" class="form-control" id="products">
			<option value="default">Select a product</option>
			@foreach ($products as $product)
		        	<option value="{{$product->productid}}">{{$product->name}}</option>
		    	@endforeach
		</select>
	</div>
	@foreach ($products as $product)
	<div class="product" style="display:none" class="product" id="id-{{$product->productid}}">
		<form role="form" method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="productid" value="{{$product->productid}}" />
			<div class="form-group">
		  		<label for="name">Product name:</label>
		    	<input type="text" name="name" id="name" class="form-control" value="{{$product->name}}" placeholder="Product name here" />
		  	</div>
		  	<div class="form-group">
		    	<label for="price">Price:</label>
		    	<input type="number" step="0.01" min="0.01" class="form-control" id="price" value="{{formatPrice($product->price)}}" name="price">
		  	</div>
		  	<div class="form-group">
				<label for="desc">Description:</label>
	  			<textarea class="form-control" rows="5" name="description" id="desc">{{$product->description}}</textarea>
			</div>
			<div class="form-group">
		  		<label for="count">Count:</label>
		    	<input type="integer" class="form-control" id="count" name="count" value="{{$product->count}}">
		  	</div>
		  	<div class="form-group">
				<label for="categories">Category:</label>
				<select name="categories[]" class="form-control" id="categories" multiple>
					@foreach ($categories as $category)
	            		<option value="{{$category->categoryid}}"
							@if ($product->hasCategory($category->categoryid))
								selected
							@endif
	            			>{{$category->displayname}}</option>
	        		@endforeach
				</select>
			    
			</div>

		<input type="submit" class="btn btn-success" value="Save"/>	
		</form>

		<form method="post" action="/admin/delete-product">
			{!! csrf_field() !!}
			<input type="hidden" name="productid" value="{{$product->productid}}" />
			<input type="submit" class="btn btn-danger" value="Delete product">
		</form>
	</div>
	@endforeach
@endsection



@section("scripts")
<script type="text/javascript">

(function(){
	var products = document.querySelector("#products");
	products.addEventListener("change", function(event){
		if(products.value != "default") {
			var product = document.querySelector('#id-' + products.value);
			show(product);	
		}
		
	});

	function show(product) {
		Array.prototype.forEach.call(document.querySelectorAll('.product'), function(someProduct){
			someProduct.style.display = "none";
		});

		product.style.display = "block";
	}
})();


</script>

@endsection