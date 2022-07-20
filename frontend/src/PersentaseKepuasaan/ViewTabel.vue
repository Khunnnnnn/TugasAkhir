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
                        data-cols-width="20,50,20,20,20,20,50"
                      >
                        <thead>
                          <tr>
                            <th
                              data-a-h="center"
                              data-a-v="middle"
                              data-b-a-s="thin"
                              data-fill-color="add8e6"
                              data-f-sz="14"
                              data-f-bold="true"
                              rowspan="2"
                              class="text-center"
                            >
                              NO
                            </th>
                            <!-- <th rowspan="2" class="text-center">PRODI</th> -->
                            <th
                              data-a-h="center"
                              data-a-v="middle"
                              data-b-a-s="thin"
                              data-fill-color="add8e6"
                              data-f-sz="14"
                              data-f-bold="true"
                              rowspan="2"
                              class="text-center"
                            >
                              JENIS KEMAMPUAN
                            </th>
                            <th
                              data-a-h="center"
                              data-a-v="middle"
                              data-b-a-s="thin"
                              data-fill-color="add8e6"
                              data-f-sz="14"
                              data-f-bold="true"
                              class="text-center"
                              colspan="4"
                            >
                              TINGKAT KEPUASAAN PENGGUNA
                            </th>
                            <th
                              data-a-h="center"
                              data-a-v="middle"
                              data-b-a-s="thin"
                              data-fill-color="add8e6"
                              data-f-sz="14"
                              data-f-bold="true"
                              class="text-center"
                              rowspan="2"
                            >
                              RENCANA TINDAK LANJUT OLEH UPPS/PS
                            </th>
                          </tr>
                          <tr>
                            <th
                              data-a-h="center"
                              data-a-v="middle"
                              data-b-a-s="thin"
                              data-fill-color="add8e6"
                              data-f-sz="14"
                              data-f-bold="true"
                              class="text-center"
                            >
                              SANGAT BAIK
                            </th>
                            <th
                              data-a-h="center"
                              data-a-v="middle"
                              data-b-a-s="thin"
                              data-fill-color="add8e6"
                              data-f-sz="14"
                              data-f-bold="true"
                              class="text-center"
                            >
                              BAIK
                            </th>
                            <th
                              data-a-h="center"
                              data-a-v="middle"
                              data-b-a-s="thin"
                              data-fill-color="add8e6"
                              data-f-sz="14"
                              data-f-bold="true"
                              class="text-center"
                            >
                              CUKUP
                            </th>
                            <th
                              data-a-h="center"
                              data-a-v="middle"
                              data-b-a-s="thin"
                              data-fill-color="add8e6"
                              data-f-sz="14"
                              data-f-bold="true"
                              class="text-center"
                            >
                              KURANG
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              1
                            </td>
                            <td data-b-a-s="thin" data-t="" data-a-h="center">
                              Etika
                            </td>
                            <td data-b-a-s="thin" data-t="" data-a-h="center">
                              {{ view_tabel[0].etika4 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].etika3 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].etika2 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].etika1 }}
                            </td>
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">
                              {{ view_tabel[0].tindak_etika }}
                            </td>
                          </tr>
                          <tr>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              2
                            </td>
                            <td data-b-a-s="thin" data-t="" data-a-h="center">
                              Keahlian pada bidang ilmu (kompetensi utama)
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].keahlianbidang4 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].keahlianbidang3 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].keahlianbidang2 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].keahlianbidang1 }}
                            </td>
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">
                              {{ view_tabel[0].tindak_bidang }}
                            </td>
                          </tr>
                          <tr>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              3
                            </td>
                            <td data-b-a-s="thin" data-t="" data-a-h="center">
                              Kemampuan berbahasa asing
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].bahasaasing4 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].bahasaasing3 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].bahasaasing2 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].bahasaasing1 }}
                            </td>
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">
                              {{ view_tabel[0].tindak_bahasa }}
                            </td>
                          </tr>
                          <tr>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              4
                            </td>
                            <td data-b-a-s="thin" data-t="" data-a-h="center">
                              Penggunaan teknologi informasi
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].penggunaanti4 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].penggunaanti3 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].penggunaanti2 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].penggunaanti1 }}
                            </td>
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">
                              {{ view_tabel[0].tindak_ti }}
                            </td>
                          </tr>
                          <tr>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              5
                            </td>
                            <td data-b-a-s="thin" data-t="" data-a-h="center">
                              Kemampuan berkomunikasi
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].komunikasi4 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].komunikasi3 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].komunikasi2 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].komunikasi1 }}
                            </td>
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">
                              {{ view_tabel[0].tindak_komunikasi }}
                            </td>
                          </tr>
                          <tr>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              6
                            </td>
                            <td data-b-a-s="thin" data-t="" data-a-h="center">
                              Kerjasama
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].kerjasama4 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].kerjasama3 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].kerjasama2 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].kerjasama1 }}
                            </td>
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">
                              {{ view_tabel[0].tindak_kerjasama }}
                            </td>
                          </tr>
                          <tr>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              7
                            </td>
                            <td data-b-a-s="thin" data-t="" data-a-h="center">
                              Pengembangan diri
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].pengembangandiri4 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].pengembangandiri3 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].pengembangandiri2 }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{ view_tabel[0].pengembangandiri1 }}
                            </td>
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">
                              {{ view_tabel[0].tindak_pengembangan }}
                            </td>
                          </tr>
                          <tr>
                            <td
                              data-b-a-s="thin"
                              data-t="s"
                              colspan="2"
                              class="text-center"
                              data-a-h="center"
                            >
                              Jumlah
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{
                                parseInt(view_tabel[0].etika4) +
                                parseInt(view_tabel[0].keahlianbidang4) +
                                parseInt(view_tabel[0].bahasaasing4) +
                                parseInt(view_tabel[0].penggunaanti4) +
                                parseInt(view_tabel[0].komunikasi4) +
                                parseInt(view_tabel[0].kerjasama4) +
                                parseInt(view_tabel[0].pengembangandiri4)
                              }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{
                                parseInt(view_tabel[0].etika3) +
                                parseInt(view_tabel[0].keahlianbidang3) +
                                parseInt(view_tabel[0].bahasaasing3) +
                                parseInt(view_tabel[0].penggunaanti3) +
                                parseInt(view_tabel[0].komunikasi3) +
                                parseInt(view_tabel[0].kerjasama3) +
                                parseInt(view_tabel[0].pengembangandiri3)
                              }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{
                                parseInt(view_tabel[0].etika2) +
                                parseInt(view_tabel[0].keahlianbidang2) +
                                parseInt(view_tabel[0].bahasaasing2) +
                                parseInt(view_tabel[0].penggunaanti2) +
                                parseInt(view_tabel[0].komunikasi2) +
                                parseInt(view_tabel[0].kerjasama2) +
                                parseInt(view_tabel[0].pengembangandiri2)
                              }}
                            </td>
                            <td data-b-a-s="thin" data-t="n" data-a-h="center">
                              {{
                                parseInt(view_tabel[0].etika1) +
                                parseInt(view_tabel[0].keahlianbidang1) +
                                parseInt(view_tabel[0].bahasaasing1) +
                                parseInt(view_tabel[0].penggunaanti1) +
                                parseInt(view_tabel[0].komunikasi1) +
                                parseInt(view_tabel[0].kerjasama1) +
                                parseInt(view_tabel[0].pengembangandiri1)
                              }}
                            </td>
                            <td
                              data-b-a-s="thin"
                              data-t="s"
                              data-a-h="center"
                            ></td>
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
    this.Getdata()
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
      view_tabel: {},
      no: 1,
    }
  },
  // created() {
  //   axios.get("http://localhost:8080/api/post").then((response) => {
  //     this.posts = response.data.data;
  //   });
  // },
  methods: {
    Getdata() {
      let id = this.$route.params.id
      // ketika refresh halaman nilai id tidak hilang
      if (id) {
        localStorage.setItem("id", id)
      } else {
      }

      axios
        .get(
          `http://localhost:8080/api/persentasekp/${localStorage.getItem("id")}`
        )
        .then((response) => {
          this.view_tabel = response.data.viewtabel
          console.log(this.view_tabel)
        })
    },
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
