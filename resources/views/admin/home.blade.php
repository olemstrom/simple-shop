@extends("todo.admin.main")
@section("title", "Admin view")
@section('content')


	<div class="col-md-6 well well-lg bg-1">
		<a  href="/admin/add-product">
			<span class="glyphicon glyphicon-question-sign"></span> Add product
		</a>
	</div>
	<div class="col-md-6 well well-lg bg-1">
		<a  href="/admin/add-category">
			<span class="glyphicon glyphicon-question-sign"></span> Add category
		</a>
	</div>
	<div class="col-md-6 well well-lg bg-1">
		<a  href="/admin/modify-products">
			<span class="glyphicon glyphicon-question-sign"></span> Manage products
		</a>
	</div>
	<div class="col-md-6 well well-lg bg-1">
		<a  href="/admin/modify-categories">
			<span class="glyphicon glyphicon-question-sign"></span> Manage categories
		</a>
	</div>
	<div class="col-md-6 well well-lg bg-1">
		<a  href="/admin/manage-orders">
			<span class="glyphicon glyphicon-question-sign"></span> Manage orders
		</a>
	</div>
@endsection
