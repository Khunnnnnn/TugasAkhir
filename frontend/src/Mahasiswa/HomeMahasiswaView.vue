<template>
  <div class="mahasiswas">
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
                    <button @click.prevent="Tambah()" class="btn btn-sm btn-success mr-2">TAMBAH</button>
                    <hr />

                    <div class="table-responsive mt-2">
                      <table id="datatable" class="table table-hover table-bordered display">
                        <thead>
                          <tr>
                            <th>NIM</th>
                            <th>NAMA MAHASISWA</th>
                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(post, index) in mahasiswas" :key="post.id">
                            <td>{{ post.nim }}</td>
                            <td>{{ post.nama }}</td>
                            <!-- <td>
                              <a v-bind:href="url + post.files">{{ post.files }}</a>
                            </td> -->
                            <!-- <a v-bind:href="url + post.files">
                              <td>{{ post.files }}</td></a
                            > -->
                            <!-- <td><img :src="url + post.files" alt="" height="100" /></td> -->
                            <td class="text-center">
                              <!-- <router-link
                                :to="{
                                  name: 'edit',
                                  params: { id: post.id },
                                }"
                                class="btn btn-sm btn-primary mr-2"
                                >EDIT</router-link
                              > -->
                              <button @click.prevent="Edit(post.id, index)" class="btn btn-sm btn-primary mr-2">EDIT</button>
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
import axios from 'axios';
import NavbarView from '../layouts/NavbarView.vue';
import SidebarView from '../layouts/SidebarView.vue';
import FooterView from '../layouts/FooterView.vue';
import 'jquery/dist/jquery.min.js';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'datatables.net-dt/js/dataTables.dataTables';
import 'datatables.net-dt/css/jquery.dataTables.min.css';
import $ from 'jquery';

export default {
  mounted() {
    axios.get('http://localhost:8080/api/mahasiswa').then((response) => {
      this.mahasiswas = response.data.data;
      // console.log(response.data.data)
      setTimeout(() => {
        $('#datatable').DataTable({
          lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All'],
          ],
          pageLength: 5,
        });
      });
    });
  },
  // name: "home",
  components: {
    'nav-bar': NavbarView,
    'side-bar': SidebarView,
    'footer-vue': FooterView,
  },
  data() {
    return {
      mahasiswas: [],
      // url: "http://localhost:8080/dokumentb8/",
    };
  },
  // created() {
  //   axios.get("http://localhost:8080/api/post").then((response) => {
  //     this.posts = response.data.data;
  //   });
  // },
  methods: {
    Tambah() {
      this.$swal({
        title: 'Tambah',
        text: 'Are you sure? ',
        icon: 'warning',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes !',
      }).then((result) => {
        // <--
        if (result.value) {
          // <-- if confirmed
          this.$router.push({
            name: 'createmahasiswa',
          });
        }
      });
    },
    PostDelete(id, index) {
      this.$swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
      }).then((result) => {
        // <--
        if (result.isConfirmed) {
          // <-- if confirmed
          axios
            .delete(`http://localhost:8080/api/mahasiswa/${id}`)
            .then((response) => {
              this.$swal('Deleted!', 'Your file has been deleted.', 'success');
              this.mahasiswas.splice(index, 1);
              console.log(response);
            })
            .catch((error) => {
              this.$swal('Deleted!', 'Your file has not been deleted.', 'error');
              console.log(error.response);
            });
        }
      });
    },
    Edit(id) {
      //Edit(id, index) {

      this.$swal({
        title: 'Edit',
        text: 'Are you sure? ',
        icon: 'warning',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes !',
      }).then((result) => {
        // <--
        if (result.value) {
          // <-- if confirmed
          this.$router.push({
            name: 'editmahasiswa',
            params: { id: id },
          });
        }
      });
    },
  },
};
</script>
