@extends('layout.main')
@section('tabs')
<li class="active"><a href="http://users.metropolia.fi/~aleksniv/awsomeWebstore/user/user1.html">Home</a></li>
<li><a href="http://users.metropolia.fi/~aleksniv/awsomeWebstore/user/user2.html">Computers</a></li>
<li><a href="http://users.metropolia.fi/~aleksniv/awsomeWebstore/user/user3.html">Electronics</a></li>
<li><a href="http://users.metropolia.fi/~aleksniv/awsomeWebstore/user/user4.html">Home Appliance</a></li>
<li><a href="http://users.metropolia.fi/~aleksniv/awsomeWebstore/user/user5.html">Gaming</a></li>
@endsection

@section('content')
<div class="row text-center">
	<div class="col-md-6 well well-lg bg-1">
		<a class="a" href="http://users.metropolia.fi/~aleksniv/awsomeWebstore/user/user2.html"><span class="glyphicon glyphicon-hdd"></span>Computer</a>
	</div>
	<div class="col-md-6 well well-lg bg-1">
		<a class="a" href="http://users.metropolia.fi/~aleksniv/awsomeWebstore/user/user3.html"><span class="glyphicon glyphicon-camera"></span>Electronics</a>
	</div>
</div>
<div class="row text-center">
	<div class="col-md-6 well well-lg bg-1">
		<a class="a" href="http://users.metropolia.fi/~aleksniv/awsomeWebstore/user/user4.html"><span class="glyphicon glyphicon-lamp"></span>Home Appliance</a>
	</div>
	<div class="col-md-6 well well-lg bg-1">
		<a class="a" href="http://users.metropolia.fi/~aleksniv/awsomeWebstore/user/user5.html"><span class="glyphicon glyphicon-pawn"></span>Gaming</a>
	</div>
</div>
@endsection