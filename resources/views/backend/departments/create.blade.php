@extends('layouts.admin_layout')
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@section('content')

<div class="separator separator-dashed mt-8 mb-5"></div>
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <form action="{{ route('department.store') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
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
                                <input class="form-control " type="text" name="dept_name" id="dept_name" value="{{old('dept_name')}}"/>
                            </div>

                        <div id="form-group">
                            <label class="control-label" for="dept_description">Department Description <span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control" id="summernote" name="dept_description" ></textarea>
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
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 100
    });
</script>
@endpush
