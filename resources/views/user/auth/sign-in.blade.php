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
        <h2>Sign In</h2>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" name="email" type="email" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required>
        </div>
        <div class="form-group">
            <button id="sign-in-btn">Sign In</button>
        </div>
        <div class="form-group">
            <a class="btn text-dark d-block" href="{{ route('front.auth.sign-up') }}" style="outline: 2px solid #fb524f; background-color: transparent;">Sign Up</a>
        </div>
        <div class="form-group text-center">
            <a href="">Forgot Your Password?</a>
        </div>
    </div>

    <script>
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const signInBtn = document.getElementById('sign-in-btn');

        signInBtn.addEventListener('click', async function() {
            const data = {
                email: email.value,
                password: password.value
            };

            await axios.post('/api/v1/auth/login', data).then(async function(response) {
                if (response.data && response.data.access_token) {
                    alert('Login successful');
                    localStorage.setItem('token', response.data.access_token);
                    console.log(response.data);

                    await axios.get('/api/v1/profile', {
                        headers: {
                            'Authorization' : 'Bearer ' + localStorage.getItem('token')
                        }
                    }).then(function(response) {
                        console.log(response.data);
                        localStorage.setItem('user', JSON.stringify(response.data[0]));
                    }).catch(function(error) {
                        console.log(error.response.data);
                    });

                    const role = JSON.parse(localStorage.getItem('user')).role;

                    if (role == 'admin') {
                        window.location.href = '{{ route('front.admin.dashboard') }}';
                    } else if (role == 'author') {
                        window.location.href = '{{ route('front.author.dashboard') }}';
                    } else {
                        window.location.href = '{{ route('front.user.dashboard') }}';
                    }
                }
            }).catch(function(error) {
                console.log(error.response.data);
                alert(error.response.data.message);
            });
        });
    </script>
@endsection
