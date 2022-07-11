<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccine Update</title>
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
                                <h1>Update Vaccine {{$vaccine->vaccine_name}}</h1>
                                <form action="/vaccine/update" method="post">
                                @csrf
                                    <input type="hidden" name="id" value="{{$vaccine->id}}">
                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">Vaccine Name</label>
                                        <input type="text" name="vaccine_name" class="form-control form-control" value="{{$vaccine->vaccine_name}}">
                                    </div>

                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">Available Quantity</label>
                                        <input type="text" name="available_quantity" class="form-control form-control" value="{{$vaccine->available_quantity}}">
                                    </div>

                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">Vaccine Type</label>
                                        <input type="text" name="vaccine_type" class="form-control form-control" value="{{$vaccine->vaccine_type}}">
                                    </div>

                                    <div class="label form-outline form-white mb-4">
                                        <label class="form-label text-start">Vaccine Creator</label>
                                        <input type="text" name="vaccine_creator" class="form-control form-control" value="{{$vaccine->vaccine_creator}}">
                                    </div>

                                    <button class="name-button bg-dark btn btn-outline-light btn-lg px-5" type="submit">Update</button>
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
