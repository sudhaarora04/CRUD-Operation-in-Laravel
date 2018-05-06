<!-- index.blade.php -->

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
	      <li><a href="" data-toggle="modal" data-target="#login">Login</a></li>
	      <li><a href="" data-toggle="modal" data-target="#register">Register</a></li>
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
		<tbody> 
			<?php $i = 0; ?>
			@foreach($cruds as $post)
			<tr>
				<?php //$date = date_format($post->created_at, "Y/m/d"); ?>
			<?php $i++; ?>
				<td><?php echo $i; ?></td>
				<td>{{$post->title}}</td>
				<td>{{substr($post->post,0,30)}}<?php echo " ... "; ?>&nbsp;<a href="{{action('CRUDController@show',$post->id)}}"><span id="read_more_text"> read more</span></a></td>
				<td>{{$post->created_at}}</td>
				<td><a href="{{action('CRUDController@edit', $post->id)}}" class="btn btn-warning">Edit</a></td>
				<td>
					<form action="{{action('CRUDController@destroy', $post->id)}}" method="post">
						{{csrf_field()}}

						<input type="hidden" name="_method" value="DELETE">
						<button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Delete the Post?')">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div style="float: right;">
		{{$cruds->links()}}
	</div>
	

</div>
@endsection

<!-- Create modal for Registration modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    	<!-- Modal content-->
      	<div class="modal-content ">
        	<div class="modal-header">
        		<center><h1 class="modal-title">Register Post</h1></center>
        	</div>
        	<!-- Modal body here.. -->
        	<div class="modal-body">
        		<form method="post" action="{{url('crud')}}">
        			{{csrf_field()}}
        			<!-- Titile field -->
				    <div class="form-group row">
				    	<div class="col-md-2">
				    		<label for="lgFormGroupInput" class="col-form-label ">Title</label>
				    	</div>
				      <div class="col-md-10">
				        <input type="text" class="form-control " id="lgFormGroupInput" placeholder="title" size="50px" name="title" required>
				      </div>
				    </div>
				    <!-- End Titile field -->
				    <!-- Description field -->
				    <div class="form-group row">
				    	<div class="col-md-2">
				    		<label for="lgFormGroupInput" class="col-form-label ">Post</label>
				    	</div>
				      <div class="col-md-10">
				        <textarea name="post" class="form-control " rows="8" cols="80" placeholder="&nbsp;Post here..." required=""></textarea>
				      </div>
				    </div>
				    <!-- End Description field -->
				    <div class="form-group row">
				    	<div class="col-md-10">
				    		<center>
				    		<button type="submit" data-toggle="modal" data-target="#confirmation" id="confirmation" class="btn btn-primary">Register</button>
				    		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				    		</center>
				    	</div>
				    </div>
				</form>
        	</div>
        </div>
    </div>
</div>
<!-- End Create modal for Registration modal -->

<!-- Create Login Modal -->
<div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Login User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
<!-- End of Login Modal -->


<!-- Create Register Modal -->
<div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Registration</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
        </div>
      </div>
      
    </div>
  </div>
  
<!-- End of Register Modal -->	