@extends('layouts.master')
@section('title2','Relation')
@section('title3','Class & Teacher')
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
                    <h5 class="card-title">IS Class Teacher</h5>
                    <form method="POST" action="{{ route('relation.class.teacher.store') }}">
                        @csrf
                        <div class="row">
                        	<div class="col-md-5 col-sm-5 col-xs-5">
		                        <div class="form-group">
		                            <label >Class</label>
		                            <select name="class_id" required class="form-control custom-select">
		                                <option value="">Select</option>
		                                @foreach($classes as $class)
		                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
		                                @endforeach
		                            </select>
		                        </div>	
                        	</div>
                        	<div class="col-md-5 col-sm-5 col-xs-5">
		                        <div class="form-group">
		                            <label >Teacher</label>
		                            <select name="teacher_id" required class="form-control custom-select">
		                                <option value="">Select</option>
		                                @foreach($teachers as $teacher)
		                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
		                                @endforeach
		                            </select>
		                        </div>	
                        	</div>
                        	<div class="col-md-2 col-sm-2 col-xs-2">
                        		<div class="form-group">
                        			<label>&nbsp;</label>
		                        	<button class="btn btn-success " style="height: 40px;position: relative;width: 100%;" type="Submit">Submit</button>
		                    	</div>
                        	</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <hr style="height: 3px; background-color: #9a0ae2;" >


    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Class and Their ClassTeacher</h5>
                    <table class="table table-responsive" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">S.no</th>
                                <th id="column3_search" scope="col">Class</th>
                                <th scope="col">Teacher</th>
                                <th scope="col" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@php    
                                $id=1;
                            @endphp
                            @foreach($relations as $relation)
                            <tr>
                                <th scope="row">{{ $id++ }}</th>
                                <td>{{ $relation->Class[0]->name }}</td>
                                <td>{{ $relation->Teacher[0]->name }}</td>
                                <td>
                                	
                                    <a class="btn btn-warning" href="{{ route('relation.class.teacher.edit',$relation->id) }}" >Edit</a>
                                    
                                   <!--  <br> -->
                                        
                                    <a class="btn btn-danger" href="{{ route('relation.class.teacher.delete',$relation->id) }}">DELETE</a>                                  
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>       
                </div>
            </div>
        </div>
    </div>




<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#dataTable').DataTable();
    });
</script>

@endsection