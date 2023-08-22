
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="VZvYLBj8L0ERD6H8m6SqsKQcdDiJ0cSuVGVvb7RN">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title')</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <link rel="stylesheet" href="css.css"> --}}
@include('src.css')
</head>
<body>
    @if (Auth::user())
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            @php
                                $company = App\Models\Company::where('status','active')->first();
                            @endphp
                            {{-- if --}}
                            <a href="{{route('dashboard')}}"> 
                                <img class="rounded-circle p-1 bg-primary" src="{{ isset($admin->logo) ? asset($companie->logo):asset('/logo/no_image.jpg')}}" style="width: 60px" alt="" srcset="">
                            </a>
                             
                                @if (isset($company->name))
                                <h3>{{$company->name}}</h3>
                            @else
                            <h2>X company </h2>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <h4 class="mt-5">Employees List</h4>
                        </div>
                        <div class="col-sm-4">
                            <div class="mt-5">
                            <a href="{{route('employer.index')}}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                            <a href="{{route('profile.index')}}" class="btn btn-danger"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span>Profile</span></a>						
                        </div>
                        </div>
                    </div>
                </div>  
    @endif
@yield('content')



@if (Auth::user())

    </div>
    </div>        
    </div>
    </div>
@endif
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('src.js')
</body>
</html>