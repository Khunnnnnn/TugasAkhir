<template>
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <router-link
      to="/dashboard"
      style="text-decoration: none"
      class="brand-link bg-gradient-blue text-white"
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
            >{{users.email}} <br>
            Roles : {{users.status}}
          </span>
        </div>
      </div>
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li v-if="users.status==='superadmin'" class="nav-item" >
            <a href="#" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>
                Username
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul  class="nav nav-treeview" >
              <li class="nav-item">
                <router-link to="/admin" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item" v-if="users.status==='dosen' || users.status==='admin'" >
            <a href="#" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Sumber Daya Manusia
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="ml-auto nav nav-treeview">
              <li class="nav-item">
                <router-link to="/dosentetap" class="nav-link">
                  <i class="ml-auto far fa-circle nav-icon"></i>
                  <p>Dosen Tetap</p>
                </router-link>
              </li>
            </ul>
            <ul class="ml-auto nav nav-treeview">
              <li class="nav-item">
                <router-link to="/penelitian" class="nav-link">
                  <i class="ml-auto far fa-circle nav-icon"></i>
                  <p>Penelitian</p>
                </router-link>
              </li>
            </ul>
            <ul class="ml-auto nav nav-treeview">
              <li class="nav-item">
                <router-link to="/rekognisidosen" class="nav-link">
                  <i class="ml-auto far fa-circle nav-icon"></i>
                  <p>Rekognisi Dosen</p>
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
            <ul class="nav nav-treeview">
              <li class="nav-item nav-icon">
                  <h6 class="text-white">Lainnya</h6>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/profiledosen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Dosen</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/sertifkompdosen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sertifikat Dosen</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/detildosens" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Detil Dosen</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/riwayatpendidikandosen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Riwayat Pendidikan</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>
                Pendidikan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="ml-auto nav nav-treeview">
              <li class="nav-item">
                <router-link to="/mahasiswa" class="nav-link">
                  <i class="ml-auto far fa-circle nav-icon"></i>
                  <p>Mahasiswa</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/matakuliah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Kuliah</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/kepuasanmahasiswa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kepuasan Mahasiswa</p>
                </router-link>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/capaiankurikulum" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Capaian Kurikulum</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>
                PkM
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="ml-auto nav nav-treeview">
              <li class="nav-item">
                <router-link to="/pkm" class="nav-link">
                  <i class="ml-auto far fa-circle nav-icon"></i>
                  <p>PkM DTPS Mahasiswa</p>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="nav-item" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
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
import axios from "axios";

export default {
  created() {
    axios
      .get("http://localhost:8080/api/profile", {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      })
      .then((response) => {
        this.users = response.data;
        console.log(response.data);
      })
      .catch((error) => {
        console.log(error.response);
      });
  },
  data() {
    return {
      users: {},
      errors: [],
    };
  },
  beforeCreate: function () {
    if (!this.$session.exists()) {
      this.$router.push("/");
    }
    this.$session.getAll();
  },
  methods: {
    logout() {
      localStorage.removeItem("token");

      this.$router.push("/");
    },
    
  },
};
</script>

<style></style>
