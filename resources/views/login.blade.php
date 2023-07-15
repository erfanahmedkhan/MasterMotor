<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Custom styles-->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body style="background-image: url('{{ asset('images/changan-autos.jpeg') }}');">
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card p-2">
                <div>
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif
                    @if (session('error'))
                        <div id="alertMessage" class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session('error') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="div">
                    <center><img src="{{ asset('images/Changan-Auto-logo - black.png') }}" alt="Logo"
                            id="logo-image">
                        <h6 id="crm-heading">Customer Relationship Management</h6>
                    </center>
                </div>
                <div class="card-body">
                    <form action="{{ url('login-post') }}" method="POST">
                        @csrf
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <label for="username" class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </label>
                            </div>
                            <input type="text" class="form-control" placeholder="username" name="username"
                                id="username">
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
                    {{-- <div class="footer text-center">
                        <p class="text-white m-1" style="font-weight: bold">Don't have an user account?
                            <a href="{{ url('crm-user-signup') }}" class="text-white link">
                                <span class="text-primary link">Create</span></a>
                        </p>
                    </div> --}}
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
