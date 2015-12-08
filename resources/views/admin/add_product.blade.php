@extends("admin.main")
@section("title", "Admin view")
@section('content')
	<h1>Add product</h1>
	<form role="form" method="post">
		{!! csrf_field() !!}
		<div class="form-group">
	  		<label for="name">Product name:</label>
	    	<input type="text" name="name" id="name" class="form-control" placeholder="Product name here" />
	  	</div>
	  	<div class="form-group">
	    	<label for="price">Price:</label>
	    	<input type="number" step="0.01" min="0.01" class="form-control" id="price" name="price">
	  	</div>
	  	<div class="form-group">
			<label for="desc">Description:</label>
  			<textarea class="form-control" rows="5" name="description" id="desc"></textarea>
		</div>
		<div class="form-group">
	  		<label for="count">Count:</label>
	    	<input type="integer" class="form-control" id="count" name="count">
	  	</div>
	  	<div class="form-group">
			<label for="categories">Category:</label>
			<select name="categories[]" class="form-control" id="categories" multiple>
				@foreach ($categories as $category)
                	<option value="{{$category->categoryid}}">{{$category->displayname}}</option>
            	@endforeach
			</select>
		    
		</div>
		<div>
			<input type="submit" value="Add product" class="btn btn-success">
		</div>	
	</form>
@endsection
