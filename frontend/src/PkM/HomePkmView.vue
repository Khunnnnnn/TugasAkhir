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
                <h1 class="m-0">Pengabdian Kepada Masyarakat Page</h1>
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
                    <button @click.prevent="Tambah()" class="btn btn-sm btn-success mr-2">TAMBAH</button>
                    <hr />

                    <div class="table-responsive mt-2">
                      <table id="datatable" class="table table-hover table-bordered display">
                        <thead>
                          <tr>
                            <th>TEMA SESUAI ROADMAP</th>
                            <th>JUDUL KEGIATAN</th>
                            <th>LOKASI</th>
                            <th>TAHUN</th>
                            <th>SUMBER DANA PT MANDIRI</th>
                            <th>DANA PT MANDIRI</th>
                            <th>SUMBER DALAM NEGERI</th>
                            <th>DANA DALAM NEGERI</th>
                            <th>SUMBER LUAR NEGERI</th>
                            <th>DANA LUAR NEGERI</th>
                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(pkm, index) in pkms" :key="pkm.id">
                            <td>{{ pkm.tema_sesuai_roadmap }}</td>
                            <td>{{ pkm.judul_kegiatan }}</td>
                            <td>{{ pkm.lokasi }}</td>
                            <td>{{ pkm.tahun }}</td>
                            <td>{{ pkm.sumber_dana_pt_mandiri }}</td>
                            <td>{{ pkm.dana_pt_mandiri }}</td>
                            <td>{{ pkm.sumber_dalam_negri }}</td>
                            <td>{{ pkm.dana_dalam_negri }}</td>
                            <td>{{ pkm.sumber_luar_negri }}</td>
                            <td>{{ pkm.dana_luar_negri }}</td>
                            <!-- <a v-bind:href="url + pkm.files">
                              <td>{{ pkm.files }}</td></a
                            > -->
                            <!-- <td><img :src="url + pkm.files" alt="" height="100" /></td> -->
                            <td class="text-center">
                              <!-- <router-link
                                :to="{
                                  name: 'edit',
                                  params: { id: pkm.id },
                                }"
                                class="btn btn-sm btn-primary mr-2"
                                >EDIT</router-link
                              > -->
                              <button @click.prevent="Edit(pkm.id, index)" class="btn btn-sm btn-primary mr-2">EDIT</button>
                              <button @click.prevent="PostDelete(pkm.id, index)" class="btn btn-sm btn-danger">HAPUS</button>
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
import 'datatables.net-buttons/js/buttons.colVis.min';
import 'datatables.net-buttons/js/dataTables.buttons';
import 'datatables.net-buttons/js/buttons.flash.min';
import 'datatables.net-buttons/js/buttons.html5.min';
import $ from 'jquery';
import 'datatables.net';
import jszip from 'jszip';
window.jszip = jszip;

export default {
  created() {
    // mengecek user yang login apakah admin atau bukan
    axios
      .get('http://localhost:8080/getuser', {
        headers: {
          Authorization: 'Bearer ' + localStorage.getItem('token'),
        },
      })
      .then((response) => {
        let { status } = response.data;
        if (status == 'admin') {
        } else {
          this.$router.push({
            name: 'dashboard',
          });
        }
      })
      .catch((error) => {
        console.log(error.response);
      });
  },
  mounted() {
    axios.get('http://localhost:8080/api/pkm').then((response) => {
      this.pkms = response.data.pkm;
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
    this.$refs.topProgress.start();
    // Use setTimeout for demo
    setTimeout(() => {
      this.$refs.topProgress.done();
    }, 2000);
  },
  // name: "home",
  components: {
    'nav-bar': NavbarView,
    'side-bar': SidebarView,
    'footer-vue': FooterView,
  },
  data() {
    return {
      pkms: [],
    };
  },

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
            name: 'createpkm',
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
            .delete(`http://localhost:8080/api/pkm/${id}`)
            .then((response) => {
              this.$swal('Deleted!', 'Your file has been deleted.', 'success');
              this.pkms.splice(index, 1);
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
            name: 'editpkm',
            params: { id: id },
          });
        }
      });
    },
  },
};
</script>
