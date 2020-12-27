@extends('layouts.master')
@section('title2','School')
@section('title3','Add School')
@section('content')
	<div class="row">
        <div class="col-xl">
        @if($errors->any())
        <div>
            <ul>
            @foreach($errors->all() as $error)
            <li class="alert alert-danger alert-dismissable list-unstyled">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
             {{$error}}
            </li>
            @endforeach
            </ul>
        </div>    
        @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add School</h5>
                    <!-- <p>Here’s a quick example to demonstrate Bootstrap’s form styles. </p> -->
                    <form method="POST" action="{{ url('school') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" name="name" class="form-control 
                            @error('name') is-invalid @enderror" required autocomplete="name" autofocus placeholder="Enter Name">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                        	<label >Logo</label>
                        	<div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input form-control" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label >City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter City">
                        </div>
                        <div class="form-group">
                            <label >State</label>
                            <input type="text" name="state" class="form-control" placeholder="Enter State">
                        </div>
                        <div class="form-group">
                            <label >PIN-CODE</label>
                            <input type="number" name="pin_code" class="form-control" placeholder="Enter PIN-CODE" >
                        </div>
                        <div class="form-group">
                            <label >Phone Number</label>
                            <input type="number"  name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" required autocomplete="phone_no" autofocus placeholder="Enter Phone Number" >
                            @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" placeholder="Enter Email">
                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <input type="password" name="password" required autocomplete="password" autofocus class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Affilation Number</label>
                            <input type="alpha_num" name="affilation_no" class="form-control" placeholder="Enter Affilation Number">
                        </div>
                        <div class="form-group">
                            <label >Board</label>
                            <input type="text" name="board_name"  required autocomplete="board_name" autofocus class="form-control @error('board_name') is-invalid @enderror" placeholder="Enter Affilation Board">
                            @error('board_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
