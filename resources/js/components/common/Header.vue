<template>
  <!-- Header Section Start -->
  <header class="header-section d-xl-block d-none">
    <div class="container-fluid">
      <div class="header-area">
        <div class="logo">
          <router-link to="/">Cooking & Recipes</router-link>
        </div>
        <div class="main-menu">
          <ul>
            <li>
              <router-link class="active" to="/">Home</router-link>
            </li>
            <li>
              <router-link to="/recipes">Recipes</router-link>
            </li>
            <li>
              <router-link to="/blogs">Blogs</router-link>
            </li>
            <li>
              <router-link to="/about">About Us</router-link>
            </li>
          </ul>
        </div>
        <div class="author-option">
          <div class="author-area">
            <template v-if="isLoggedIn">
              <!-- My Account Dropdown -->
              <div class="author-account">
                <div class="author-icon">
                  <img :src="`/user/assets/images/chef/author/08.jpg`" alt="author" />
                </div>
                <div class="author-dropdown">
                  <ul>
                    <li>
                      <router-link to="/account">My Account</router-link>
                    </li>
                    <li>
                      <a href="#" @click.prevent="handleLogout">Log Out</a>
                    </li>
                  </ul>
                </div>
              </div>
            </template>
            <template v-else>
              <!-- Login/Register Option -->
              <div class="login-register">
                <router-link to="/login">Login</router-link> / 
                <router-link to="/register">Register</router-link>
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import axios from "axios";

export default {
  name: "Header",
  data() {
    return {
      isLoggedIn: false,
    };
  },
  created() {
    const userToken = localStorage.getItem("auth_token");
    this.isLoggedIn = !!userToken; // Check if token exists
  },
  methods: {
    async handleLogout() {
      try {
        const token = localStorage.getItem("auth_token");

        // Logout API call
        await axios.post(
          "http://127.0.0.1:8000/api/v1/auth/logout",
          {},
          {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          }
        );

        // Clear token and redirect to the home page
        localStorage.removeItem("auth_token");
        this.isLoggedIn = false;
        this.$router.push({ path: "/" });

        alert("Successfully logged out.");
      } catch (error) {
        console.error("Logout error:", error);
        alert("An error occurred during logout. Please try again.");
      }
    },
  },
};
</script>

<style>
/* Add basic styles for author-dropdown */
.author-dropdown {
  background-color: #fff;
  border: 1px solid #ccc;
  position: absolute;
  margin-top: 10px;
  padding: 10px;
  border-radius: 5px;
  display: none;
}

.author-account:hover .author-dropdown {
  display: block;
}

.author-dropdown ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.author-dropdown ul li {
  margin: 5px 0;
}

.author-dropdown ul li a {
  color: #000;
  text-decoration: none;
}

.author-dropdown ul li a:hover {
  text-decoration: underline;
}
</style>
