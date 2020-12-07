@extends('layouts.admin_layout')

@section('content')

<div class="separator separator-dashed mt-8 mb-5"></div>
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <form action="{{ route('department.update',$department->dept_id) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label" for="dept_name">Department Name <span class="m-l-5 text-danger"> *</span></label>
                                <input class="form-control " type="text" name="dept_name" id="dept_name" value="{{$department->name}}"/>
                            </div>

                        <div class="form-group">
                            <label class="control-label" for="dept_desciption">Department Description<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control" type="text" name="dept_desciption" id="dept_desciption" value="{{$department->description}}"/>
                        </div>
                       
                        <div class="form-group label-floating" >
                            <label class="control-label">Status</label>
                            <select id="status" name="status"  class="form-control" full-width>
                                <option>--Select--</option>
                                <option value="1">Active </option>
                                <option value="0">Inactive </option>
                            </select>
                        </div>
                    </div>
                    <div class="tile-footer">
                         <button class="btn btn-success btn-uppercase" type="submit"> <i class="ti-check-box mr-2"></i>Save</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger btn-square btn-uppercase" href="{{ route('department.index') }}"><i class="ti-trash mr-2"></i>Cancel</a>
                    </div>
                    </div> 
                </form>
            </div>
        </div>
    
        <div class="separator separator-dashed mt-8 mb-5"></div>
@endsection

