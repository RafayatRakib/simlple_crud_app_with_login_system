@extends('master')

@section('title','Edit Employer')
@section('content')
<div class="container">


    <form action="{{route('employer.update',$em->id)}}" method="post">
        @csrf
        @method('put')
        <div class="modal-header">						
            <h4 class="modal-title">Edit Employee</h4>
        </div>
        <div class="modal-body">					
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{$em->f_name}}" />
                @error('first_name')<strong class="text-danger">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control  @error('last_name') is-invalid @enderror" value="{{$em->l_name}}" >
                @error('last_name')<strong class="text-danger">{{ $message }}</strong>@enderror
          
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"  class="form-control @error('email') is-invalid @enderror" value="{{$em->email}}"/>
                @error('email')<strong class="text-danger">{{ $message }}</strong>@enderror
            </div>
            
            <div class="form-group">
                <label>Phone</label>
                <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$em->phone}}">
                @error('phone')<strong class="text-danger">{{ $message }}</strong>@enderror
            </div>
            <div class="form-group">
                <label>Company</label>
                <select class="form-control  @error('company_name') is-invalid @enderror" name="company_name">
                    <option selected disabled> --Select Company Name</option>
                    <option selected value="{{$em->company_id}}" >--{{$em->company->name}}</option>
                    @foreach ($company as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('company_name')<strong class="text-danger">{{ $message }}</strong>@enderror
            </div>
            
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success" id="add" value="Add">
        </div>
    </form>


</div>
@endsection