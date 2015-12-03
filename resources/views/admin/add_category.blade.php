@extends("admin.admin_main")
@section("title", "Admin view - Add category")
@section("content")
	<p>Add category</p>

	<form method="post">
		{!! csrf_field() !!}
		<p>Category name: <br/>
			<input type="text" name="name" placeholder="Category here">
		</p>

		<input type="submit" value="Add category"/>	
	</form>
	
@endsection