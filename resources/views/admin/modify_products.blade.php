@extends("admin.admin_main")
@section("title", "Admin view - Modify product")
@section("content")
	<p>Modify products</p>

	<label for="products">Products:</label> <br/>
	<select name="products" id="products">
		@foreach ($products as $product)
        	<option value="{{$product->productid}}">{{$product->name}}</option>
    	@endforeach
	</select>

	@foreach ($products as $product)
		<div class="product" style="display:none" class="product" id="id-{{$product->productid}}">
		<form method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="productid" value="{{$product->productid}}" />
			<label for="name">Name: </label> <br/>
			<input type="text" name="name" id="name" value="{{$product->name}}"/>

			<label for="description">Description: </label> <br/>
			<textarea type="text" name="description" id="description">
				{{$product->description}}
			</textarea>

			<label for="count">Count: </label> <br/>
			<input type="number" name="count" id="count" value="{{$product->count}}"/>

			<label for="name">Price: </label> <br/>
			<input type="text" name="price" id="price" value="{{formatPrice($product->price)}}"/>

			Categories: <br/>
			<select name="categories[]" id="categories" multiple>
				@foreach ($categories as $category)
	            	<option value="{{$category->categoryid}}"
						@if ($product->hasCategory($category->categoryid))
							selected
						@endif
	            		>{{$category->displayname}}</option>
	        	@endforeach
			</select>

			<input type="submit" value="Save"/>
		</form>

		<form method="post" action="/admin/delete-product">
			{!! csrf_field() !!}
			<input type="hidden" name="productid" value="{{$product->productid}}" />
			<input type="submit" value="Delete product">
		</form>

		</div>
	@endforeach
	
@endsection

@section("scripts")
<script type="text/javascript">

(function(){
	var products = document.querySelector("#products");
	products.addEventListener("change", function(event){
		var product = document.querySelector('#id-' + products.value);
		show(product);
	});

	function show(product) {
		Array.prototype.forEach.call(document.querySelectorAll('product'), function(someProduct){
			someProduct.style.display = "none";
		});

		product.style.display = "block";
	}
})();


</script>

@endsection