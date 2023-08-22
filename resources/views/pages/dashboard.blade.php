@extends('master')
@section('title','Dashboard')
@section('content')
<div class="container">
@if (session('success'))
<div class="alert alert-success" role="alert">
   {{session('success')}}
</div>
@endif
<table class="table table-striped table-hover">
   <thead>
      <tr>
         <th>SL</th>
         <th>Company</th>
         <th>Name</th>
         <th>Email</th>
         <th>Phone</th>
         <th>Actions</th>
      </tr>
   </thead>
   <tbody>
      @if (count($employee)>0)
      @foreach ($employee as $key => $item)
      <tr>
         <td>{{$key+1}}</td>
         <td>{{$item->company->name}}</td>
         <td>{{$item->f_name.' '. $item->l_name}}</td>
         <td>{{$item->email}}</td>
         <td>{{$item->phone}}</td>
         <td>
            <a href="{{route('employer.edit',$item->id)}}" class="btn btn-primary">Edit</a>    
            <a href="{{route('employer.destroy',$item->id)}}" class="btn btn-danger">Delete</a>    
            {{-- <form id="deleteForm" action="{{route('employer.destroy',$item->id)}}" method="POST">
               @csrf
               @method('delete')
               <input class="btn btn-danger"  type="submit" value="Delete" >  
            </form> --}}
         </td>
      </tr>
      @endforeach
      @else
      <p>No data found</p>
      @endif
   </tbody>
</table>
<div class="clearfix">
   {{$employee->links('vendor.pagination.custom') }}
</div>

<script>
   $(document).ready(function() {
   $('#deleteForm').submit(function(e) {
       e.preventDefault(); // Prevent the default form submission
       var form = this;
       var confirmDelete = confirm('Are you sure? You will not be able to recover this blog!');
       if (confirmDelete) {
           form.submit();
       }
   });
   });
   
           
</script>
@endsection