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
                <h1 class="m-0">Penelitian Page</h1>
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
                  <div class="card-header">IPK Mahasiswa</div>
                  <div class="card-body">
                    <vue-topprogress ref="topProgress"></vue-topprogress>
                    <button
                      @click.prevent="Tambah()"
                      class="btn btn-sm btn-success mr-2"
                    >
                      TAMBAH
                    </button>
                    <button
                      @click.prevent="ExportExcel('IPK Mahasiswa')"
                      class="btn btn-sm btn-success mr-2"
                      id="btnExport"
                    >
                      EXPORT
                    </button>
                    <hr />

                    <div class="table-responsive mt-2">
                      <table
                        id="datatable"
                        class="table-hover table-bordered display"
                        data-cols-width="20,20,20,20,20,20"
                      >
                        <thead>
                          <tr>
                            <th rowspan="2" class="text-center">NO</th>
                            <th rowspan="2" class="text-center">PRODI</th>
                            <!-- <th rowspan="2" class="text-center">PRODI</th> -->
                            <th rowspan="2" class="text-center">TAHUN</th>
                            <th rowspan="2" class="text-center">
                              JUMLAH LULUSAN
                            </th>
                            <th rowspan="2" class="text-center">
                              JUMLAH LULUSAN TERLACAK
                            </th>
                            <th colspan="7" class="text-center">
                              Jumlah Tanggapan
                            </th>
                            <th rowspan="2" class="text-center">AKSI</th>
                          </tr>
                          <tr>
                            <th>Etika</th>
                            <th>Keahlian Bidang</th>
                            <th>Bahasa Asing</th>
                            <th>Penggunaan TI</th>
                            <th>Komunikasi</th>
                            <th>Kerjasama</th>
                            <th>Pengembangan Diri</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="(persentase, index) in tbl_persentase"
                            :key="persentase.id"
                          >
                            <td data-a-h="center">
                              {{ index + 1 }}
                            </td>
                            <td>{{ persentase.prodi }}</td>
                            <td>{{ persentase.tahun }}</td>
                            <td>{{ persentase.jmlh_lulusan }}</td>
                            <td>{{ persentase.jmlh_terlacak }}</td>
                            <td>
                              {{
                                parseInt(persentase.etika1) +
                                parseInt(persentase.etika2) +
                                parseInt(persentase.etika3) +
                                parseInt(persentase.etika4)
                              }}
                            </td>
                            <td>
                              {{
                                parseInt(persentase.keahlianbidang1) +
                                parseInt(persentase.keahlianbidang2) +
                                parseInt(persentase.keahlianbidang3) +
                                parseInt(persentase.keahlianbidang4)
                              }}
                            </td>
                            <td>
                              {{
                                parseInt(persentase.keahlianbidang1) +
                                parseInt(persentase.keahlianbidang2) +
                                parseInt(persentase.keahlianbidang3) +
                                parseInt(persentase.keahlianbidang4)
                              }}
                            </td>
                            <td>
                              {{
                                parseInt(persentase.bahasaasing1) +
                                parseInt(persentase.bahasaasing2) +
                                parseInt(persentase.bahasaasing3) +
                                parseInt(persentase.bahasaasing4)
                              }}
                            </td>
                            <td>
                              {{
                                parseInt(persentase.penggunaanti1) +
                                parseInt(persentase.penggunaanti2) +
                                parseInt(persentase.penggunaanti3) +
                                parseInt(persentase.penggunaanti4)
                              }}
                            </td>
                            <td>
                              {{
                                parseInt(persentase.komunikasi1) +
                                parseInt(persentase.komunikasi3) +
                                parseInt(persentase.komunikasi2) +
                                parseInt(persentase.komunikasi4)
                              }}
                            </td>
                            <td>
                              {{
                                parseInt(persentase.pengembangandiri1) +
                                parseInt(persentase.pengembangandiri2) +
                                parseInt(persentase.pengembangandiri3) +
                                parseInt(persentase.pengembangandiri4)
                              }}
                            </td>
                            <td class="text-center d-flex">
                              <button
                                @click.prevent="Edit(ipk.id, index)"
                                class="btn btn-sm btn-primary mr-2"
                              >
                                EDIT
                              </button>
                              <button
                                @click.prevent="PostDelete(ipk.id, index)"
                                class="btn btn-sm btn-danger mr-2"
                              >
                                HAPUS
                              </button>
                              <button
                                @click.prevent="
                                  ViewExport(persentase.id, index)
                                "
                                class="btn btn-sm btn-primary"
                              >
                                EXPORT
                              </button>
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
import axios from "axios"
import NavbarView from "../layouts/NavbarView.vue"
import SidebarView from "../layouts/SidebarView.vue"
import FooterView from "../layouts/FooterView.vue"
import "jquery/dist/jquery.min.js"
import "bootstrap/dist/css/bootstrap.min.css"
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"
import $ from "jquery"
import TableToExcel from "@linways/table-to-excel"

export default {
  created() {
    // mengecek user yang login apakah admin atau bukan
    axios
      .get("http://localhost:8080/getuser", {
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      })
      .then((response) => {
        let { status } = response.data
        if (status == "admin") {
        } else {
          this.$router.push({
            name: "dashboard",
          })
        }
      })
      .catch((error) => {
        console.log(error.response)
      })
  },

  mounted() {
    axios.get("http://localhost:8080/api/persentasekp").then((response) => {
      this.tbl_persentase = response.data.persentase
      console.log(response.data.persentase)
      setTimeout(() => {
        $("#datatable").DataTable({
          pageLength: 5,
          dom: "Bftrip",
          buttons: ["colvis"],
        })
      })
    })
    this.$refs.topProgress.start()

    // Use setTimeout for demo
    setTimeout(() => {
      this.$refs.topProgress.done()
    }, 2000)
  },
  components: {
    "nav-bar": NavbarView,
    "side-bar": SidebarView,
    "footer-vue": FooterView,
  },
  data() {
    return {
      tbl_persentase: {},
      no: 1,
    }
  },
  // created() {
  //   axios.get("http://localhost:8080/api/post").then((response) => {
  //     this.posts = response.data.data;
  //   });
  // },
  methods: {
    Tambah() {
      this.$swal({
        title: "Tambah",
        text: "Are you sure? ",
        icon: "warning",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Yes !",
      }).then((result) => {
        // <--
        if (result.value) {
          // <-- if confirmed
          this.$router.push({
            name: "createipk",
          })
        }
      })
    },
    PostDelete(id, index) {
      this.$swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        // <--
        if (result.isConfirmed) {
          // <-- if confirmed
          axios
            .delete(`http://localhost:8080/api/ipk/${id}`)
            .then((response) => {
              this.$swal("Deleted!", "Your file has been deleted.", "success")
              this.tbl_ipk.splice(index, 1)
              console.log(response)
            })
            .catch((error) => {
              this.$swal("Deleted!", "Your file has not been deleted.", "error")
              console.log(error)
            })
        }
      })
    },
    Edit(id, index) {
      this.$swal({
        title: "Edit",
        text: "Are you sure? ",
        icon: "warning",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Yes !",
      }).then((result) => {
        // <--
        if (result.value) {
          // <-- if confirmed
          this.$router.push({
            name: "editipk",
            params: { id: id },
          })
        }
      })
    },
    ViewExport(id, index) {
      this.$swal({
        title: "Edit",
        text: "Are you sure? ",
        icon: "warning",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Yes !",
      }).then((result) => {
        // <--
        if (result.value) {
          // <-- if confirmed
          this.$router.push({
            name: "viewtabelkp",
            params: { id: id },
          })
        }
      })
    },
    ExportExcel(nama = "") {
      this.$swal({
        title: "Export",
        text: "Are you sure? ",
        icon: "warning",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Yes !",
      }).then((result) => {
        // <--
        if (result.value) {
          // <-- if confirmed

          TableToExcel.convert(document.getElementById("datatable"), {
            name: nama + ".xlsx",
            sheet: {
              name: nama,
            },
          })
        }
      })
    },
  },
}
</script>
