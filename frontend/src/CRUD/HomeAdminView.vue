<template>
  <div class="posts">
    
    <div class="wrapper">
      <nav-bar></nav-bar>
      <side-bar></side-bar>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Post Page</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">CRUD</a></li>
                  <li class="breadcrumb-item active">Post Page</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">POSTS</div>
                  <div class="card-body">
                    <vue-topprogress ref="topProgress"></vue-topprogress>
                    <router-link :class="['btn btn-md btn-success mb-2']" to="/create">TAMBAH POST</router-link>
                    <hr />

                    <div class="table-responsive mt-2">
                      <table class="table table-hover table-bordered" id="datatable" style="width: 100%;">
                        <thead>
                          <tr>
                            <th>NIDN</th>
                            <th>email</th>
                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(user, index) in users" :key="user.id">
                            <td>{{ user.nidn }}</td>
                            <td>{{ user.email }}</td>
                            <td class="text-center">
                              <router-link
                                :to="{
                                  name: 'edit',
                                  params: { id: user.id },
                                }"
                                class="btn btn-sm btn-primary mr-2"
                                >EDIT</router-link
                              >
                              <button @click.prevent="PostDelete(post.id, index)" class="btn btn-sm btn-danger">HAPUS</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer-vue></footer-vue>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import NavbarView from "../layouts/NavbarView.vue";
import SidebarView from "../layouts/SidebarView.vue";
import FooterView from "../layouts/FooterView.vue";
import "jquery/dist/jquery.min.js";
import "bootstrap/dist/css/bootstrap.min.css";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import "datatables.net-buttons/js/buttons.colVis.min";
import "datatables.net-buttons/js/dataTables.buttons";
import "datatables.net-buttons/js/buttons.flash.min";
import "datatables.net-buttons/js/buttons.html5.min";
import "datatables.net";
import jszip from "jszip";
window.jszip = jszip;
import $ from "jquery";
export default {
  mounted () {
    this.$refs.topProgress.start()
 
    // Use setTimeout for demo
    setTimeout(() => {
      this.$refs.topProgress.done()
    }, 2000)
  },
  name: "home",
  components: {
    "nav-bar": NavbarView,
    "side-bar": SidebarView,
    "footer-vue": FooterView,
  },
  data() {
    return {
      users: [],
    };
  },

  created() {
    axios
      .get("http://localhost:8080/api/users", {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      })
      .then((response) => {
        this.users = response.data.users;
        console.log(response.data.data)
      setTimeout(() => {
        $("#datatable").DataTable({
          dom:"Bftrip",
          buttons:[
              "excel","csv"
          ],
          lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
          ],
          pageLength: 5,
        });
      });
            }).catch((error) => {
          
          this.errors = error.response.data.errors;
          console.log(this.errors);
        });
  },

methods : {
  testt() {
    
  }
}
};
</script>
