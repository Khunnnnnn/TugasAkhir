<template>
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <router-link
      to="/dashboard"
      style="text-decoration: none"
      class="brand-link bg-danger text-white"
    >
      <span class="brand-text font-weight-bold mr-5 ml-5"
        >Admin LKPS</span
      ></router-link
    >
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img
            src="img/avatar.svg"
            class="img-circle elevation-2"
            alt="User Image"
          />
        </div>
        <div class="info">
          <span class="brand-text font-italic font-weight-bolder text-white"
            >Kelompok 2</span
          >
        </div>
      </div>
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>
                Username
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Sumber Daya Manusia
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="ml-auto nav nav-treeview">
              <li class="nav-item">
                <router-link to="/penelitian" class="nav-link">
                  <i class="ml-auto far fa-circle nav-icon"></i>
                  <p>Penelitian</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/bimbinganta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bimbingan TA</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-university nav-icon"></i>
              <p>
                Tridarma
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="ml-auto nav nav-treeview">
              <li class="nav-item">
                <router-link to="/viewipk" class="nav-link">
                  <i class="ml-auto far fa-circle nav-icon"></i>
                  <p>IPK Mahasiswa</p>
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
    <div class="card no-gutters no-border bg-blue">
      <button type="submit" @click="logout" class="btn text-white">
        <h5>Logout</h5>
      </button>
    </div>
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </aside>
</template>

<script>
import axios from "axios"

export default {
  data() {
    return {
      post: {},
      errors: [],
    }
  },
  methods: {
    logout() {
      localStorage.removeItem("token")

      this.$router.push("/")
    },
  },
}
</script>

<style></style>
