@extends("todo.admin.main")
@section("title", "Admin view - Modify category")
@section("content")
	<p>Modify categories</p>


		@foreach ($categories as $category)
		
		<div class="clearfix row" style="padding-left:0;">
			<form method="post" style="margin:0;">
				<div class="col-md-2">
					<label for="navitem">
						Navitem 
					</label>
					<input type="checkbox" name="navitem" id="navitem" class="pull-right" value="show"
					@if($category->navitem)
						checked
					@endif
					>
				</div>
				<div class="col-md-6">
						{!! csrf_field() !!}
						<input type="hidden" name="id" value="{{$category->categoryid}}" />
						<input type="text" class="form-control" name="name" value="{{$category->displayname}}" />
				</div>

				<div class="col-md-2">
					<input type="submit" class="btn btn-success" value="Save">
				</div>
			</form>
			<div class="col-md-2">
				<form action="/admin/delete-category" method="post">
					{!! csrf_field() !!}
					<input type="hidden" name="id" value="{{$category->categoryid}}" />
					<input type="submit" class="btn btn-danger" value="Delete">
				</form>
			</div>
		</div>
		
		@endforeach

@endsection