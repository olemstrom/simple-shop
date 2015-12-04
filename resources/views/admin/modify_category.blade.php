@extends("admin.admin_main")
@section("title", "Admin view - Modify category")
@section("content")
	<p>Modify categories</p>


		@foreach ($categories as $category)
		
		<div style="overflow:auto; clear:both;">
			<form method="post">
			<div style="max-width:70%; float:left;">
					{!! csrf_field() !!}
					<input type="hidden" name="id" value="{{$category->categoryid}}" />
					<input type="text" name="name" value="{{$category->displayname}}" />
			</div>
			<div style="max-width:15%; float:left;">
				<input type="submit" value="Save">
			</div>
			</form>
			<div style="max-width:14%; float:left;">
				<form action="/admin/delete-category" method="post">
					{!! csrf_field() !!}
					<input type="hidden" name="id" value="{{$category->categoryid}}" />
					<input type="submit" value="Delete">
				</form>
			</div>
		</div>
		
		@endforeach

@endsection