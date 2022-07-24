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
                <h1 class="m-0">Bimbingan Tugas Akhir Page</h1>
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
                    <button
                      @click.prevent="Tambah()"
                      class="btn btn-sm btn-success mr-2"
                    >
                      TAMBAH
                    </button>
                    <button
                      @click.prevent="ExportExcel('Bimbingan_TA')"
                      class="btn btn-sm btn-success mr-2"
                      id="btnExport"
                    >
                      EXPORT
                    </button>
                    <hr />

                    <div class="table-responsive mt-2">
                      <table
                        id="datatable"
                        class="table table-hover table-bordered display"
                        style="width: 100%"
                        data-cols-width="30,30,30,40,30"
                      >
                        <thead>
                          <tr>
                            <th
                              data-f-bold="true"
                              data-fill-color="add8e6"
                              class="text-center"
                              data-f-sz="14"
                              data-a-h="center"
                              data-a-v="middle"
                            >
                              TAHUN AKADEMIK
                            </th>
                            <th
                              data-f-bold="true"
                              data-fill-color="add8e6"
                              class="text-center"
                              data-f-sz="14"
                              data-a-h="center"
                              data-a-v="middle"
                            >
                              NAMA MAHASISWA
                            </th>
                            <th
                              data-f-bold="true"
                              data-fill-color="add8e6"
                              class="text-center"
                              data-f-sz="14"
                              data-a-h="center"
                              data-a-v="middle"
                            >
                              JUDUL TA
                            </th>
                            <th
                              data-f-bold="true"
                              data-fill-color="add8e6"
                              class="text-center"
                              data-f-sz="14"
                              data-a-h="center"
                              data-a-v="middle"
                            >
                              FILE LAPORAN
                            </th>
                            <th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr
                            v-for="(post, index) in tbl_bimbinganta"
                            :key="post.id"
                          >
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">{{ post.tahun_akademik }}</td>
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">{{ post.nama_mahasiswa }}</td>
                            <td data-b-a-s="thin" data-t="s" data-a-h="center">{{ post.judul_ta }}</td>
                            <td>
                              <a v-bind:href="url + post.files">{{
                                post.files
                              }}</a>
                            </td>
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
                              <div class="d-flex justify-content-start">
                                <button
                                  @click.prevent="Edit(post.id, index)"
                                  class="btn btn-sm btn-primary mr-2"
                                >
                                  EDIT
                                </button>
                                <button
                                  @click.prevent="PostDelete(post.id, index)"
                                  class="btn btn-sm btn-danger"
                                >
                                  HAPUS
                                </button>
                              </div>
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
import $ from "jquery";
import "datatables.net";
import jszip from "jszip";
window.jszip = jszip;
import TableToExcel from "@linways/table-to-excel";
export default {
  mounted() {
    axios.get("http://localhost:8080/api/bimbinganta").then((response) => {
      this.tbl_bimbinganta = response.data.data;
      console.log(response.data.data);
      setTimeout(() => {
        $("#datatable").DataTable({
          dom: "Bftrip",
          buttons: [
            {
              extend: "excel",
              exportOptions: {
                columns: ":visible",
              },
            },
            "colvis",
          ],
          columnDefs: [
            {
              targers: -1,
              visible: false,
            },
          ],
          lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"],
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
  name: "bimbinganta",
  components: {
    "nav-bar": NavbarView,
    "side-bar": SidebarView,
    "footer-vue": FooterView,
  },
  data() {
    return {
      tbl_bimbinganta: [],
      url: "http://localhost:8080/dokumentb8/",
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
            name: "createbimbingan",
          });
        }
      });
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
            .delete(`http://localhost:8080/api/post/${id}`)
            .then((response) => {
              this.$swal("Deleted!", "Your file has been deleted.", "success");
              this.posts.splice(index, 1);
              console.log(response);
            })
            .catch((error) => {
              this.$swal(
                "Deleted!",
                "Your file has not been deleted.",
                "error"
              );
              console.log(error.response);
            });
        }
      });
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
            name: "edit",
            params: { id: id },
          });
        }
      });
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
          });
        }
      });
    },
  },
};
</script>
