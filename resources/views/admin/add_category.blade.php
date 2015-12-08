@extends("admin.main")
@section("title", "Admin view - Add category")
@section("content")
	<h1>Add category</h1>

	<form method="post">
		{!! csrf_field() !!}
		<p><strong>Category name</strong>: <br/>
			<input type="text" name="name" class="form-control" placeholder="Category here">
		</p>

		<p>
			Navitem <input type="checkbox" name="navitem" value="true">
		</p>

		<input type="submit" value="Add category"/>	
	</form>
	
@endsection