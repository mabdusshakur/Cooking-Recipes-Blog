<template>
     <section class="login-section">
       <div class="login-wrapper">
         <h2>Login</h2>
         <form @submit.prevent="handleLogin">
           <div class="form-group">
             <label for="email">Email</label>
             <input
               type="email"
               id="email"
               v-model="email"
               placeholder="Enter your email"
               required
             />
           </div>
           <div class="form-group">
             <label for="password">Password</label>
             <input
               type="password"
               id="password"
               v-model="password"
               placeholder="Enter your password"
               required
             />
           </div>
           <button type="submit" class="btn btn-primary">Login</button>
           <p>Don't have an account? <router-link to="/register" class="register-link">Register here</router-link></p>
         </form>
       </div>
     </section>
   </template>
   
   <script>
   import axios from 'axios';
   
   export default {
     name: 'Login',
     data() {
       return {
         email: '',
         password: '',
       };
     },
     methods: {
          async handleLogin() {
  try {
    const response = await axios.post('http://127.0.0.1:8000/api/v1/auth/login', {
      email: this.email, // Make sure this is bound to your input field
      password: this.password, // Make sure this is bound to your input field
    }, {
      headers: {
        'Content-Type': 'application/json', // Ensure correct content type
      },
    });
    

    if (response.data.access_token) {
      localStorage.setItem('auth_token', response.data.access_token);
      this.$router.push({ path: '/' });
    }
  } catch (error) {
    console.error('Login error:', error);

    if (error.response && error.response.status === 401) {
      alert('Invalid credentials. Please check your email and password.');
    } else {
      alert('An error occurred. Please try again.');
    }
  }
}

},

   };
   
   </script>
   <style scoped>
   /* Ensures the login box is vertically and horizontally centered */
   .login-section {
     display: flex;
     justify-content: center;
     align-items: center;
     height: 100vh; /* Full height of the viewport */
     background-color: #f8f9fa;
     margin: 0; /* Removes any potential margin */
   }
   
   .login-wrapper {
     background: #fff;
     padding: 30px;
     border-radius: 8px;
     box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
     width: 100%;
     max-width: 400px;
   }
   
   .login-wrapper h2 {
     margin-bottom: 20px;
     font-size: 24px;
     text-align: center;
   }
   
   .form-group {
     margin-bottom: 15px;
   }
   
   .form-group label {
     display: block;
     margin-bottom: 5px;
     font-weight: 600;
   }
   
   .form-group input {
     width: 100%;
     padding: 10px;
     border: 1px solid #ddd;
     border-radius: 4px;
   }
   
   .btn-primary {
     display: block;
     width: 100%;
     padding: 10px;
     background-color: #007bff;
     color: #fff;
     border: none;
     border-radius: 4px;
     font-size: 16px;
     cursor: pointer;
   }
   
   .btn-primary:hover {
     background-color: #0056b3;
   }
   </style>
   
   
  