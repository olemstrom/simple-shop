@extends("admin.admin_main")
@section("title", "Admin view")
@section("content")
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<p>Add product</<p></p>

	<form method="post">
		{!! csrf_field() !!}
		<p>
			<label for="name">
				Name: <br/> 
				<input type="text" name="name" id="name" placeholder="Product name here" />
			</label>
		</p>

		<p>
			<label for="desc">
				Product description: <br/>
				<textarea type="textbox" name="description" id="desc" placeholder="Product description here">
					
				</textarea>	
			</label>
		</p>

		<p>
			<label for="categories">
				Categories: <br/>
				<select name="categories[]" id="categories" multiple>
					@foreach ($categories as $category)
	                	<option value="{{$category->categoryid}}">{{$category->name}}</option>
	            	@endforeach
				</select>	
			</label>
		</p>

		
		<p>
			<label for="price">
				Price: <br/>
				<input type="number" name="price" id="price" placeholder="Product price">
			</label>
		</p>
		<p>
			<label for="count">
				<input type="number" name="count" id="count" placeholder="Product count">
			</label>
		</p>

		<input type="submit" value="Add product"/>
	</form>
	
@endsection