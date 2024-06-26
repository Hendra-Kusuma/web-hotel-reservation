<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-image: url('{{ asset('images/bg-login.jpeg') }}')">
    @auth
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Reservation App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <li class="nav-item active">
                                <a class="nav-link" href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/hotel">Hotel</a>
                            </li>
                            @role('admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="/user">User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/report">Report</a>
                                </li>
                            @endrole
                            <form action="/logout" method="post" onclick="return confirm('are you sure want to logout')">
                                @csrf
                                <button class="btn btn-primary">Logout</button>
                            </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    @endauth
    <div>
        @yield('content')
    </div>
    @auth
        <footer class="footer mt-auto py-3 bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Contact Us</h5>
                        <p>SAI Residence blok C2, Tajurhalang, Bogor</p>
                        <p>Email: hendrakusuma.vegas@gmail.com</p>
                        <p>Phone: 0858-1154-0061</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Follow Us</h5>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    @endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
