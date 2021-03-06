@extends('layouts.master')
@section('title2','Section')
@section('title3','Add Section')
@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Section</h5>
                    <!-- <p>Here’s a quick example to demonstrate Bootstrap’s form styles. </p> -->
                    <form method="POST" action="{{ route('section.store') }}">
                        @csrf
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">
                           
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection