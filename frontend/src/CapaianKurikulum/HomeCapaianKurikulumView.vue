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
                    <button @click.prevent="Tambah()" class="btn btn-sm btn-success mr-2">TAMBAH</button>
                    <hr />

                    <div class="table-responsive mt-2">
                      <table id="datatable" class="table table-hover table-bordered display">
                        <thead>
                          <tr>
                            <th>PRODI</th>
                            <th>SEMESTER</th>
                            <th>TAHUN</th>
                            <th>MATA KULIAH KOMPETENSI</th>
                            <th>KULIAH RESPONSI TUTORIAL</th>
                            <th>SEMINAR</th>
                            <th>PRAKTIKUM</th>
                            <th>KONVERSI KREDIT JAM</th>
                            <th>SIKAP</th>
                            <th>PENGETAHUAN</th>
                            <th>KETERAMPILAN UMUM</th>
                            <th>KETERAMPILAN KHUSUS</th>
                            <th>DOKUMEN RENCANA PEMBELAJARAN</th>
                            <th>UNIT PENYELENGGARA</th>
                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(capkrklm, index) in capaiankurikulums" :key="capkrklm.id">
                            <td>{{ capkrklm.prodi }}</td>
                            <td>{{ capkrklm.semester }}</td>
                            <td>{{ capkrklm.tahun }}</td>
                            <td>{{ capkrklm.mata_kuliah_kompetensi }}</td>
                            <td>{{ capkrklm.kuliah_responsi_tutorial }}</td>
                            <td>{{ capkrklm.seminar }}</td>
                            <td>{{ capkrklm.praktikum }}</td>
                            <td>{{ capkrklm.konversi_kredit_jam }}</td>
                            <td>{{ capkrklm.sikap }}</td>
                            <td>{{ capkrklm.pengetahuan }}</td>
                            <td>{{ capkrklm.keterampilan_umum }}</td>
                            <td>{{ capkrklm.keterampilan_khusus }}</td>
                            <td>{{ capkrklm.dokumen_rencana_pembelajaran }}</td>
                            <td>{{ capkrklm.unit_penyelenggara }}</td>
                            <!-- <td>
                              <a v-bind:href="url + capkrklm.files">{{ capkrklm.files }}</a>
                            </td> -->
                            <!-- <a v-bind:href="url + capkrklm.files">
                              <td>{{ capkrklm.files }}</td></a
                            > -->
                            <!-- <td><img :src="url + capkrklm.files" alt="" height="100" /></td> -->
                            <td class="text-center">
                              <!-- <router-link
                                :to="{
                                  name: 'edit',
                                  params: { id: capkrklm.id },
                                }"
                                class="btn btn-sm btn-primary mr-2"
                                >EDIT</router-link
                              > -->
                              <button @click.prevent="Edit(capkrklm.id, index)" class="btn btn-sm btn-primary mr-2">EDIT</button>
                              <button @click.prevent="PostDelete(capkrklm.id, index)" class="btn btn-sm btn-danger">HAPUS</button>
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
    axios.get('http://localhost:8080/api/capaiankurikulum').then((response) => {
      this.capaiankurikulums = response.data.capkrklm;
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
      capaiankurikulums: [],
      // url: "http://localhost:8080/dokumentb8/",
    };
  },
  // created() {
  //   axios.get("http://localhost:8080/api/capkrklm").then((response) => {
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
            name: 'createcapaiankurikulum',
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
            .delete(`http://localhost:8080/api/capaiankurikulum/${id}`)
            .then((response) => {
              this.$swal('Deleted!', 'Your file has been deleted.', 'success');
              this.capaian_kurikulums.splice(index, 1);
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
            name: 'editcapaiankurikulum',
            params: { id: id },
          });
        }
      });
    },
  },
};
</script>
