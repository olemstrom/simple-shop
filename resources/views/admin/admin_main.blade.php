<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield("title")</title>
</head>
<body>
	<a href="/admin/add-product">add product</a> ;
	<a href="/admin/add-category">add category</a> ;
	<a href="/admin/modify-products">modify products</a> ;
	<a href="/admin/modify-categories">modify categories</a>
	<div>
		@yield('content')
	</div>

	@yield('scripts')
</body>
</html>