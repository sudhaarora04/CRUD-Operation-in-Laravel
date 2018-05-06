<!-- mains.blade.php -->

@extends('master')
@section('content')
<div class="header">
	<!-- <h1><center>Post Details</center></h1>
	
	<form method="post" class="form-inline" action="{{route('srch')}}">
			<div class="row">
				<div class="col-md-6 left">
					{{csrf_field()}}
					<input type="text" name="searchinput" placeholder="Search Here..." class="form-control" >
					<button type="submit" class="btn btn-success" value="Search">Search
					</button>
				</div>
				<div class="col-md-6 right">
					<a id="post_here_button" href="" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="float: right;">Post Here</a>
				</div>
			</div>
		</form> -->

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <h1><center>Post Details</center></h1>
	    </div>
	    <ul class="nav navbar-nav" id="navbar-header">
	      <li class="active"><a href="/crud">Home</a></li>
	      <li><a href="/crud">View</a></li>
	      <li><a href="" data-toggle="modal" data-target="#myModal">Service</a></li>
	    </ul>
	    <form method="post" class="navbar-form navbar-left" action="{{route('srch')}}">
			<div class="input-group">
				{{csrf_field()}}
				<input type="text" class="form-control" name="searchinput" placeholder="Search here..." class="form-control" required>
				<div class="input-group-btn">
		          <button class="btn btn-default" type="submit">
		            <i id="search_option" class="glyphicon glyphicon-search"></i>
		          </button>
		        </div>
			</div>
		</form>
	  </div>
	</nav>
</div>
<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Title</th>
				<th>Post</th>
				<th>Posted Date</th>
				<th>Action</th>
				<th>Action</th>
			</tr>
		</thead>
		@foreach($cruds as $post)
	</table>
	
	

</div>
@endsection

