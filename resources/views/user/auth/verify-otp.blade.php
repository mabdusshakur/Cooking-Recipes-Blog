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

        .login-container h4 {
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
        <h4>OTP</h4>
        <div class="form-group">
            <input id="otp" name="otp" class="text-center" type="text" required autofocus placeholder=" 4 5 6 7">
        </div>
        <div class="form-group">
            <button id="verifyOtpBtn">Verify</button>
        </div>
    </div>

    
    <script>
        const name = document.getElementById('otp');
        const verifyOtpBtn = document.getElementById('verifyOtpBtn');

        verifyOtpBtn.addEventListener('click', function() {
            const data = {
                email: localStorage.getItem('email'),
                otp: otp.value
            };

            axios.post('/api/v1/auth/verify-otp', data)
            .then(function(response) {
                if(response.data && response.data.success == true) {
                    alert(response.data.message);
                    localStorage.removeItem('email');
                    window.location.href = '{{ route('front.auth.sign-in') }}';
                }
            }).catch(function(error) {
                    console.log(error.response.data);
            });
        });
    </script>
@endsection
