<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>States</title>
    @include('modules.head')
</head>
<body>
    @include('modules.navbar')
    @php
    if(session()->has("populations")){
    $populations = session()->get("populations");
    }
    @endphp
    <section class="gradient-custom d-flex align-items-center mt-5">
        <div class="container py-5 h-100 animate__animated animate__fadeInDown">
            <div class="row">
                @if(count($populations) == 0)
                <p class="text-bg-danger p-3 container fs-5 fw-semibold text-light rounded text-center">There are not states found, consult your state again</p>
                @else
                <h2>States</h2>
                @if(session('response'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('response')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                @foreach($populations as $population)
                <div class="col-sm-3 mt-4">
                    @if(count($populations) < 5)
                    <div class="card cardC">
                    @else
                    <div class="card">
                    @endif
                    <div class="card-body">
                            <h5 class="card-header-color">{{$population->states}}</h5>
                            <dl>
                                <dt>Total Population</dt>
                                <dd>{{number_format($population->total_population,'0',',')}}</dd>
                                <dt>Vaccinated Population</dt>
                                <dd>{{number_format($population->vaccinated_population,0,',');}}</dd>
                                <dt>Unvaccinated Population</dt>
                                <dd>{{number_format($population->unvaccinated_population,0,',')}}</dd>
                            </dl>
                            @if(session()->has('auth'))
                            <a href="/state/{{$population->id}}" class="btn btn-primary">Edit</a>
                            <form action="/state/deleteState" style="display:inline;" method="post">
                                <input type="hidden" name="id" value="{{$population->id}}">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
    @include('modules.footer')
</body>
</html>
