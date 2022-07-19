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
                            <th rowspan="2">TAHUN</th>
                            <th rowspan="2">PRODI</th>
                            <th style="text-align: center" colspan="5">KEANDALAN</th>
                            <th style="text-align: center" colspan="5">DAYA TANGGAP</th>
                            <th style="text-align: center" colspan="5">KEPASTIAN</th>
                            <th style="text-align: center" colspan="5">EMPATI</th>
                            <th style="text-align: center" colspan="5">TANGIBLE</th>
                          </tr>
                          <tr>
                            <th>SANGAT BAIK</th>
                            <th>BAIK</th>
                            <th>CUKUP</th>
                            <th>KURANG</th>
                            <th>TOTAL</th>

                            <th>SANGAT BAIK</th>
                            <th>BAIK</th>
                            <th>CUKUP</th>
                            <th>KURANG</th>
                            <th>TOTAL</th>

                            <th>SANGAT BAIK</th>
                            <th>BAIK</th>
                            <th>CUKUP</th>
                            <th>KURANG</th>
                            <th>TOTAL</th>

                            <th>SANGAT BAIK</th>
                            <th>BAIK</th>
                            <th>CUKUP</th>
                            <th>KURANG</th>
                            <th>TOTAL</th>

                            <th>SANGAT BAIK</th>
                            <th>BAIK</th>
                            <th>CUKUP</th>
                            <th>KURANG</th>
                            <th>TOTAL</th>

                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(kepmhs, index) in kepuasan_mahasiswas" :key="kepmhs.id">
                            <td>{{ kepmhs.tahun }}</td>
                            <td>{{ kepmhs.prodi }}</td>
                            <td>{{ kepmhs.keandalan_4 }}</td>
                            <td>{{ kepmhs.keandalan_3 }}</td>
                            <td>{{ kepmhs.keandalan_2 }}</td>
                            <td>{{ kepmhs.keandalan_1 }}</td>
                            <td>{{ kepmhs.tl_keandalan }}</td>

                            <td>{{ kepmhs.daya_tanggap_4 }}</td>
                            <td>{{ kepmhs.daya_tanggap_3 }}</td>
                            <td>{{ kepmhs.daya_tanggap_2 }}</td>
                            <td>{{ kepmhs.daya_tanggap_1 }}</td>
                            <td>{{ kepmhs.tl_daya_tanggap }}</td>

                            <td>{{ kepmhs.kepastian_4 }}</td>
                            <td>{{ kepmhs.kepastian_3 }}</td>
                            <td>{{ kepmhs.kepastian_2 }}</td>
                            <td>{{ kepmhs.kepastian_1 }}</td>
                            <td>{{ kepmhs.tl_kepastian }}</td>

                            <td>{{ kepmhs.empati_4 }}</td>
                            <td>{{ kepmhs.empati_3 }}</td>
                            <td>{{ kepmhs.empati_2 }}</td>
                            <td>{{ kepmhs.empati_1 }}</td>
                            <td>{{ kepmhs.tl_empati }}</td>

                            <td>{{ kepmhs.tangible_4 }}</td>
                            <td>{{ kepmhs.tangible_3 }}</td>
                            <td>{{ kepmhs.tangible_2 }}</td>
                            <td>{{ kepmhs.tangible_1 }}</td>
                            <td>{{ kepmhs.tl_tangible }}</td>

                            <td class="text-center">
                              <button @click.prevent="Edit(kepmhs.id, index)" class="btn btn-sm btn-primary mr-2">EDIT</button>
                              <button @click.prevent="PostDelete(kepmhs.id, index)" class="btn btn-sm btn-danger">HAPUS</button>
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
    axios.get('http://localhost:8080/api/kepuasanmahasiswa').then((response) => {
      this.kepuasan_mahasiswas = response.data.kepmhs;
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
      kepuasan_mahasiswas: [],
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
            name: 'createkepuasanmahasiswa',
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
            .delete(`http://localhost:8080/api/kepuasanmahasiswa/${id}`)
            .then((response) => {
              this.$swal('Deleted!', 'Your file has been deleted.', 'success');
              this.kepuasan_mahasiswas.splice(index, 1);
              console.log(response);
            })
            .catch((error) => {
              this.$swal('Deleted!', 'Your file has not been deleted.', 'error');
              console.log(error.response);
            });
        }
      });
    },
    Edit(id, index) {
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
            name: 'editkepuasanmahasiswa',
            params: { id: id },
          });
        }
      });
    },
  },
};
</script>
