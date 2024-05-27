<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Custom Login and Registration - Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #007bff, #ffffff);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        .card-body {
            padding: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        .password-strength {
            margin-top: 10px;
        }

        .password-strength .progress {
            height: 10px;
            border-radius: 5px;
            overflow: hidden; /* Fix for red line issue */
        }

        .password-strength .progress-bar {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            border-radius: 8px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                            <div class="password-strength">
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Password strength indicator
    var passwordInput = document.getElementById('password');
    var progressBar = document.querySelector('.progress-bar');

    passwordInput.addEventListener('input', function() {
        var password = passwordInput.value;
        var strength = 0;
        var regex = new Array();

        regex.push("[A-Z]"); // Uppercase letters
        regex.push("[a-z]"); // Lowercase letters
        regex.push("[0-9]"); // Numbers
        regex.push("[$&+,:;=?@#|'<>.^*()%!-]"); // Special characters

        // Test each regular expression against the password string
        for (var i = 0; i < regex.length; i++) {
            if (new RegExp(regex[i]).test(password)) {
                strength++;
            }
        }

        // Update progress bar width based on strength
        progressBar.style.width = ((strength / 4) * 100) + '%';
    });
</script>
</body>
</html>
