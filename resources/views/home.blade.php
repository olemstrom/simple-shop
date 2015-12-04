@extends('todo.user.main')


@section('content')

@foreach($allCategories as $index => $category)
@if($index % 2 == 0 && $index > 0)
	</div>
@endif
@if($index % 2 == 0 && $index < count($allCategories) - 1)
	<div class="row text-center">
@endif

		<div class="col-md-6 well well-lg bg-1">
			<a  href="/category/{{$category->name}}">
				<span class="glyphicon glyphicon-question-sign"></span> {{$category->displayname}}
			</a>
		</div>

@endforeach

@endsection