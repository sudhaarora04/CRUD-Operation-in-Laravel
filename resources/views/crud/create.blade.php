<!-- create.blade.php -->

@extends('master')
@section('content')
<!-- Create Header -->
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
      @if (Route::has('login'))
      <ul class="nav navbar-nav" id="navbar-header" style="margin-left: 560px;">
         @auth
        <li class="active"><a href="/crud">Home</a></li>
        <li><a href="/crud">View</a></li>
        <li><a href="" data-toggle="modal" data-target="#myModal">Service</a></li>
        <li class="dropdown dropdown_1">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                {{ Auth::user()->name }} 
            </a>

            <ul class="dropdown-menu dropdown_show_1">
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
</div>
<!-- Create Header -->

<div class="container">
  <form method="post" action="{{url('crud')}}">
    <br><br><div class="form-group row">
      {{csrf_field()}}
      <label id="label_1" for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Title" name="title" required>
      </div>
    </div>
    <div class="form-group row">
      <label id="label_1" for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Post</label>
      <div class="col-sm-10">
        <textarea name="post" class="form-control" rows="8" cols="128" placeholder="&nbsp;Post here..." required=""></textarea>
      </div>
    </div>
    <div class="form-group row">
      <button type="submit" name="submit_post" id="confirmation" class="btn btn-primary">Submit</button>
    </div>
  </form>
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
                <textarea name="post" class="form-control" rows="8" cols="80" placeholder="&nbsp;Post here..." required=""></textarea>
              </div>
            </div>
            <!-- End Description field -->
            <div class="form-group row">
              <div class="col-md-10">
                <center>
                  <button type="submit" data-toggle="modal" data-target="#confirmation" id="confirmation" class="btn btn-primary">Register Here</button>
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

