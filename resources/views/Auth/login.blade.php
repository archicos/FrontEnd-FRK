<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRK & FED - LOGIN</title>
    <link rel="stylesheet" href="{{ asset('dist/bs/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-icons-1.11.2/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> --}}
</head>

<body>

    <section class="vh-100" style="background-color: #ECECEC">
        <div class="container py-lg-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-white text-black" style="border-radius: 1rem;">
                        <div class="card-body py-4 px-5 text-center">

                            <div class="mb-md-5 px-4 mt-md-4">

                                <form action="{{ route('user.login.post') }}" method="post">
                                    @csrf
                                    <h2 class="fw-bold mb-5" style="font-size: 42px">Login</h2>

                                    <div class="form-outline form-white mb-2">
                                        <label class="d-flex align-items-start form-label"
                                            for="typeEmailX">Username</label>
                                        <input type="text" name="username" id="typeEmailX"
                                            class="shadow form-control form-control-lg border-dark @error('username') is-invalid @enderror"
                                            style="background-color: #FBFBFB; height: 58px" />
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="d-flex align-items-start form-label" for="typePasswordX">Kata
                                            Sandi</label>
                                        <input type="password" name="password" id="typePasswordX"
                                            class="shadow form-control form-control-lg border-dark"
                                            style="background-color: #FBFBFB; height: 58px" />
                                    </div>

                                    <p class="small mb-2 pb-lg-2 d-flex align-items-start "><a
                                            class="text-decoration-none" style="color: #696969" href="#!">Lupa kata
                                            sandi?</a></p>

                                    <button
                                        style="background-color: #69839C; font-size: 2rem;font-weight: 600; width: 100%; height: 75px"
                                        class="btn text-white btn-lg px-5" type="submit">Masuk
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="mt-3">Belum punya akun? <a href="#!" style="color: #3553BF"
                                class="fw-bold text-decoration-none">Daftar Sekarang</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- <script src="{{ asset('assets/bootstrap-5.3.3-dist/js/bootstrap.min.js') }}">
</script> --}}
    <script src="{{ asset('dist/bs/bootstrap-5.3.3-dist/js/bootstrap.min.js') }}"></script>
</body>

</html>
