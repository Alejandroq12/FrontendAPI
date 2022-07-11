<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccines</title>
    @include('modules.head')
</head>
<body>
    @include('modules.navbar')
    <section class="gradient-custom d-flex align-items-center mt-5">
        <div class="container py-5 h-100 animate__animated animate__fadeInDown">
            <div class="row">
                <h2>Vaccines</h2>
                @if(session('response'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('response')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                @foreach($vaccines as $vaccine)
                <div class="col-sm-3 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-header-color">{{$vaccine->vaccine_name}}</h5>
                            <dl>
                                <dt>Available Quantity</dt>
                                <dd>{{number_format($vaccine->available_quantity,0,',')}}</dd>
                                <dt>Vaccine Type</dt>
                                <dd>{{$vaccine->vaccine_type}}</dd>
                                <dt>Vaccine Creator</dt>
                                <dd>{{$vaccine->vaccine_creator}}</dd>
                            </dl>
                            @if(session()->has('auth'))
                            <a href="/vaccine/{{$vaccine->id}}" class="btn btn-primary">Edit</a>
                            <form action="/vaccine/deleteVaccine" style="display:inline;" method="post">
                                <input type="hidden" name="id" value="{{$vaccine->id}}">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>  
    @include('modules.footer')  
    </section>
</body>
</html>
