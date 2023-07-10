<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sign up</title>
    <link rel="shortcut icon" href="favicon.png">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="custom.css">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,
        body {
            background-image: url('{{ asset('images/changan-autos.jpeg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
        }

        #crm-heading {
            font-weight: bold !important;
        }

        .bg-orange {
            color: #f58935 !important;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            height: 500px !important;
            margin-top: auto !important;
            margin-bottom: auto !important;
            width: 400px !important;
            background-color: rgba(233, 233, 233, 0.5) !important;
        }

        .input-group-prepend label {
            width: 50px !important;
            background-color: #f58935 !important;
            color: black !important;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;
        }

        .create_button {
            color: black !important;
            background-color: #f58935 !important;
            width: 50% !important;
            font-weight: bold !important;
        }

        .link:hover {
            color: #007bff !important;
            background: transparent !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                @if (session('error'))
                    <div id="alertMessage" class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                    </div>
                @endif
                <center><img src="{{ asset('images/Changan-Auto-logo - black.png') }}" alt=""
                        style="height: 12vh;">
                </center>
                <center>
                    <h6 id="crm-heading">Customer Relationship Management</h6>
                </center>

                <div class="card-body">

                    <form action="{{ url('add-crm-user') }}" method="POST">
                        @csrf
                        {{-- name --}}
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <label for="name" class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </label>
                            </div>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Full Name">
                        </div>
                        {{-- email --}}
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <label for="email" class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </label>
                            </div>
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Enter Active Email" title="Enter active & valid @ address">
                        </div>
                        {{-- phone --}}
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <label for="phone" class="input-group-text">
                                    <i class="fas fa-phone fa-flip-horizontal"></i>
                                </label>
                            </div>
                            <input type="text" name="phone" id="phone" class="form-control" id="phone"
                                pattern="[0-9]{12}" placeholder="923001234567"
                                title="Pattern is 92xxxxxxxx. Max lenth is 12" required>
                        </div>
                        {{-- username --}}
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <label for="username" class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </label>
                            </div>
                            <input type="text" name="username" id="username" class="form-control"
                                placeholder="username">
                        </div>
                        {{-- password --}}
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <label for="password" class="input-group-text"><i class="fas fa-key"></i></label>
                            </div>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="password">
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <label for="role" class="input-group-text">
                                    <i class="fas fa-users"></i>
                                </label>
                            </div>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">Select Role</option>
                                <option value="1|Super Admin">Admin</option>
                                <option value="2|Agent">Agent</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <center> <input type="submit" value="submit" class="btn create_button"></center>
                        </div>
                    </form>
                    <center>
                        <p class="text-white" style="font-weight: bold">Already have an account?
                            <a href="{{ url('login') }}" class="text-white link">
                                <span class="text-primary link">Login</span></a>
                        </p>
                    </center>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    setTimeout(function() {
        $('#alertMessage').fadeOut('fast');
    }, 1000);
</script>

</html>
<!--Made with love by Mutiullah Samim -->
