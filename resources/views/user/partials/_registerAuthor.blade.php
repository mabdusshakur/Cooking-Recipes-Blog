<section class="contact-us" style="background-color: #f2709c;">
    <div class="container">
        <div class="row justify-content-center align-items-center z-index-1">
            <div class="col-xl-4 col-lg-6 col-12">
                <div class="contact-from">
                    <h5>Register Now</h5>
                    <form id="submit-form">
                        <input id="name" type="text" placeholder="Full Name*">
                        <input id="email" type="email" placeholder="Your Eamil*">
                        <input id="password" type="password" placeholder="Password">
                        <input id="signUpBtn" type="submit" value="Become An Author">
                    </form>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-12">
                <div class="contact-home-chef">
                    <div class="section-header">
                        <h3>Become An Author.</h3>
                        <p>Now you can make food happen pretty much wherever you are thanks to the free easy-to-use
                        </p>
                    </div>
                    <div class="section-wrapper">
                        <div class="contact-count-item">
                            <div class="contact-count-inner">
                                <div class="contact-count-thumb">
                                    <img src="assets/images/contac/icon/01.png" alt="food-contact">
                                </div>
                                <div class="contact-count-content">
                                    <h5><span class="counter">24896</span>+</h5>
                                    <p>Recipies</p>
                                </div>
                            </div>
                        </div>
                        <div class="contact-count-item">
                            <div class="contact-count-inner">
                                <div class="contact-count-thumb">
                                    <img src="assets/images/contac/icon/03.png" alt="food-contact">
                                </div>
                                <div class="contact-count-content">
                                    <h5><span class="counter">250</span>+</h5>
                                    <p>Authors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const submitForm = document.getElementById('submit-form');

    submitForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (name.value == '' || email.value == '' || password.value == '') {
            alert('Please fill all the fields');
        }

        const data = {
            name: name.value,
            email: email.value,
            password: password.value,
            password_confirmation: password.value,
            role: 'author',
        };

        axios.post('/api/v1/auth/register', data)
            .then(function(response) {
                if (response.data && response.data.success == true) {
                    alert(response.data.message);
                    localStorage.setItem('email', email.value);
                    window.location.href = '{{ route('front.auth.verify-otp') }}';
                }
            }).catch(function(error) {
                console.log(error.response.data);
            });
    });
</script>
