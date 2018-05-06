<!-- edit.blade.php -->

@extends('master')
@section('content')
<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <h1><center>Edit Post</center></h1>
      </div>
      @if (Route::has('login'))
      <ul class="nav navbar-nav" id="navbar-header" style="margin-left: 145px;">
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
<br/><br/>
  <form method="post" action="{{action('CRUDController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" id="label_1" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title" value="{{$crud->title}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" id="label_1" class="col-sm-2 col-form-label col-form-label-lg">Post</label>
      <div class="col-sm-10">
        <textarea name="post" class="form-control" rows="8" cols="128">&nbsp;&nbsp;{{$crud->post}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-danger">Update</button>
      <!-- <button type="submit" id="update_btn" class="btn btn-primary">Update Sucessfully</button> -->
      <button href="{{action('CRUDController@index')}}" class="btn btnprimary" style="margin-left: 12px;">Cancel</button>
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
            <form method="post" action="">
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

<div class="modal fade" id="updated" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Successfull...</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  


<!-- Create Successfully Update Alert -->
<!-- <div class="alert alert-dismissable alert-success" id="editedsuccess">
  <button type="button" data-dismiss="alert" aria-label="Close" class="close"></button>
  <strong>Record Edited Successfully!!</strong>
</div> -->

<!-- Create Successfully Update Alert -->