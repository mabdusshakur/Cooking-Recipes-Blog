@extends('layouts.app')
@section('content')
    <style>
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-container .form-group {
            margin-bottom: 15px;
        }

        .login-container .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .login-container .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #fb524f;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container .form-group button:hover {
            background-color: #ff5f5d;
        }
    </style>

    <div class="login-container my-5">
        <h2>Sign Up</h2>
        <div class="form-group">
            <label for="name">Full Name</label>
            <input id="name" name="name" type="text" required autofocus>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" name="email" type="email" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>
        </div>
        <div class="form-group">
            <button id="sign-up-btn">Sign Up</button>
        </div>
        <div class="form-group">
            <a class="btn text-dark d-block" href="{{ route('front.auth.sign-in') }}" style="outline: 2px solid #fb524f; background-color: transparent;">Sign In</a>
        </div>
    </div>

    <script>
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const signUpBtn = document.getElementById('sign-up-btn');

        signUpBtn.addEventListener('click', function() {
            const data = {
                name: name.value,
                email: email.value,
                password: password.value,
                password_confirmation: password.value,
                role : 'user',
            };

            axios.post('/api/v1/auth/register', data)
            .then(function(response) {
                if(response.data && response.data.success == true) {
                    alert(response.data.message);
                    localStorage.setItem('email', email.value);
                    window.location.href = '{{ route('front.auth.verify-otp') }}';
                }
            }).catch(function(error) {
                    console.log(error.response.data);
            });
        });
    </script>
@endsection
