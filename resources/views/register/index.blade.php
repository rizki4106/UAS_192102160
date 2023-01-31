<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>kampus.com - {{ $title }}</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body style="background-color: rgb(27, 29, 37)">
    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-lg-5 mb-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-white text-center">Form Registrasi Peserta</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating mb-1">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-1">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" required value="{{ old('username') }}">
                        <label for="Username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 
                    <div class="form-floating mb-1">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control rounded-bottom @error ('password') is-invalid @enderror" placeholder="Password" required>
                        <label for="Password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                <button class="w-100 btn btn-lg btn-info mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3 mb-4 text-white">Sudah Terdaftar? <a href="/login" style="color: rgb(240, 240, 13)">Login</a></small>
            </main>
        </div>
        </div>
    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</html>
