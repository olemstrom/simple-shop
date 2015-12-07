@extends('todo.admin.main')
@section('content')
	<form role="form">
		<div class="form-group">
	  		<label for="productName">Product name:</label>
	    	<input type="text" class="form-control" id="productName">
	  	</div>
	  	<div class="form-group">
	    	<label for="price">Price:</label>
	    	<input type="text" class="form-control" id="price">
	  	</div>
	  	<div class="form-group">
			<label for="comment">Description:</label>
  			<textarea class="form-control" rows="5" id="comment"></textarea>
		</div>
		<div class="form-group">
	  		<label for="count">Count:</label>
	    	<input type="integer" class="form-control" id="count">
	  	</div>
	  	<div class="form-group">
			<label for="sel2">Category:</label>
		    <select multiple class="form-control" id="category">
		    	<option>1</option>
		        <option>2</option>
		        <option>3</option>
		        <option>4</option>
		        <option>5</option>
		    </select>
		</div>
		<div>
			<submit class="btn btn-success" id="add">Submit</submit>
		</div>	
	</form>
@endsection
