<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new population</title>
    @include('modules.head')
</head>
<body>
    @include('modules.navbar')
    <section class="gradient-custom d-flex align-items-center">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="form-box card text-dark animate__animated animate__fadeInDown">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Create New Population</h2>
                                <form action="/registerPopulation" method="post">
                                    @csrf
                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">State name</label>
                                        <input type="text" name="state" class="form-control form-control">
                                    </div>

                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">Total population</label>
                                        <input type="text" name="total_population" class="form-control form-control">
                                    </div>
                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">Unvaccinated population</label>
                                        <input type="text" name="unvaccinated_population" class="form-control form-control">
                                    </div>
                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">Vaccinated population</label>
                                        <input type="text" name="vaccinated_population" class="form-control form-control">
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <strong>Check the data entered</strong>
                                        @foreach ($errors->all() as $error)

                                        <p class="myError">- {{$error}}</p>
                                        @endforeach
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </ul>
                                    </div>
                                    @endif
                                    <button class="name-button bg-dark btn btn-outline-light btn-lg px-5" type="submit">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('modules.footer')
</body>
</html>