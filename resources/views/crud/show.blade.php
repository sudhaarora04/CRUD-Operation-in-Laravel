@extends('master')
@section('content')

<!-- Create  Header -->
<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <h1><center>Post Details</center></h1>
	    </div>
	    @if (Route::has('login'))
	    <ul class="nav navbar-nav" id="navbar-header" style="margin-left: 560px;">
	       @auth
	      <li class="active"><a href="/crud">Home</a></li>
	      <li><a href="/crud">View</a></li>
	      <li><a href="" data-toggle="modal" data-target="#myModal">Service</a></li>
	      <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                {{ Auth::user()->name }} 
            </a>

            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
	      @else
	      <li><a href="" data-toggle="modal" data-target="#login">Login</a></li>
	      <li><a href="" data-toggle="modal" data-target="#register">Register</a></li>
	      @endauth
	    </ul>
	    @endif
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
<!-- End Create  Header -->

<div class="container">
	<div class="jumbotron">
		<table class="table table-striped">
		<thead>
			<tr>
				<td align="center"><strong>Title</strong></td>
				<td align="center"><strong>Post</strong></td>
				@if (Route::has('login'))
				@auth
				<td align="center"><strong>Action</strong></td>
				<td align="center"><strong>Action</strong></td>
				@endauth
				@endif
			</tr>
		</thead>
		<tbody>
			<tr>
				<td align="center"><strong>{{$crud->title}}</strong></td>
				<td align="center">{{$crud->post}}</td>
				@if (Route::has('login'))
				@auth
				<td align="center"><a href="{{action('CRUDController@edit', $crud->id)}}" class="btn btn-warning">
                    <i title="Edit" class="fa fa-pencil"></i>            
                </a></td>
				<td align="center">
					<form action="{{action('CRUDController@destroy', $crud->id)}}" method="post">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="DELETE">
						<button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to Delete the Post?')">
                            <i title="Delete" class="fa fa-trash"></i>                  
                        </button>
					</form>
				</td>
				@endauth
				@endif
			</tr>
		</tbody>
	</table><br />
	<a href="{{action('CRUDController@index')}}" class="btn btn-info" style="float: right;">Cancel</a>
	</div>
</div>
@endsection

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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
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