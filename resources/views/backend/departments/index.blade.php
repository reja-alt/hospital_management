@extends('layouts.admin_layout')

@push('styles')

@endpush
@section('content')
<div class="separator separator-dashed mt-5 mb-5"></div>
<div class="container">
<div class="card ml-6 mr-6">
  <div class="card-body">
  
  <a href="{{ route('department.create') }}" class="btn btn-primary pull-right" style="float: right;"><i class="ti-plus mr-2"></i>Add Category</a>
  
  </div>
</div>
       
<div class="card ml-6 mr-6" >
  <div class="card-body">    
  <table id="myTable" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th>Id</th>
      <th>Depatment Name</th>
      <th>Depatment Description</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach($departments as $department)
    <tr>
    <td>{{ $department->dept_id }}</td>
    <td>{{ $department->dept_name }}</td>
    <td>{{ $department->dept_description }}</td>
    <td>@if($department->status == 1) 
                                 
     <button type="submit" class="btn btn-sm btn-success" name="changeStatus" value="1">Active</button>
                                                
      @else
                                                         
      <button type="submit" class="btn btn-sm btn-danger" name="changeStatus" value="0">Inactive</button>
                                                                              
       @endif</td>
    
    <td class="text-center">
            <div class="btn-group" role="group" aria-label="Second group">
            
            <a href="{{route('department.edit',$department->dept_id)}}" class="btn btn-success" id="edit-category" ><i class="fa fa-edit"></i></button>
                
                @if(Session::has('messege'))
                    Toastr::success('Successfully Registered','Success');
                @endif
                
                
                <a href="department/delete/{{$department->dept_id}}" class="btn btn-sm btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
            </div>
        </td>
    </tr> 
@endforeach
    ...
  </tbody>
</table>
</div>
</div>
</div>

@endsection

@push('scripts')


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
   $('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Are you sure?',
        text: 'This record and it`s details will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>

   <script>
   $(document).ready(function (){
    $('#myTable').DataTable({
        "scrollY": "400px",
        "scrollCollapse": true
    });
});

  </script>
@endpush
