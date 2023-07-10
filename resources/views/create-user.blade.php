<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="shortcut icon" href="favicon.png">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="custom.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,
        body {
            background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        .alert-danger {
            color: #ffffff;
            background-color: #fc2539;
            border-color: #f5c6cb;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            height: 350px;
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(233, 233, 233, 0.5) !important;
        }

        .social_icon span {
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
        }

        h3 {
            font-size: 19px;
        }

        .social_icon span:hover {
            color: white;
            cursor: pointer;
        }

        .card-header h3 {
            color: white;
        }

        .social_icon {
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #FFC312;
            color: black;
            border: 0 !important;
        }

        .input-group-prepend label {
            width: 50px;
            background-color: #f58935;
            color: black;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;

        }

        .remember {
            color: white;
        }

        .remember input {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn {
            color: black;
            background-color: #f58935;
            width: 50%;
            margin-left: 25%;
            font-weight: bold;

        }


        .link:hover {
            color: #007bff !important;
            background: transparent !important;

        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
        }
    </style>
</head>

<body style="background-image: url('{{ asset('images/changan-autos.jpeg') }}');">
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                @if (session('msg'))
                    <div id="alertMessage" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('msg') }}</strong>
                    </div>
                @endif
                <center><img src="{{ asset('images/Changan-Auto-logo - black.png') }}" alt=""
                        style="height: 16vh;"></center>
                <center>
                    <h3 style="color: black">Customer Relationship Management</h3>
                </center>
                {{-- <div class="card-header">
                    <h3 style="color: black;">Sign In</h3>
                </div> --}}
                <div class="card-body">
                    <form action="{{ url('login-post') }}" method="POST">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend" style="background-color: #f58935;">
                                <label for="name" class="input-group-text">
                                    <i class="fas fa-user" style="background-color: #f58935;"></i>
                                </label>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="name"
                                id="name">
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <label for="password" class="input-group-text"><i class="fas fa-key"></i></label>
                            </div>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="password">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn login_btn">
                        </div>
                    </form>
                    <center>
                        <p class="text-dark" style="font-weight: bold">Don't have user account?
                            <a href="create-user" class="text-white link">
                                <span class="text-white link">Create</span></a>
                        </p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!--Made with love by Mutiullah Samim -->
