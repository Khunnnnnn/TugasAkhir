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
                <h1 class="m-0">Create Rekognisi Dosen Page</h1>
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
                  <div class="card-header">TAMBAH POST</div>
                  <div class="card-body">
                    <form @submit.prevent="PostStore">
                      <div class="form-group">
                        <label>Rekognisi</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.rekognisi ? 'is-invalid' : ''"
                          placeholder="Masukkan Title"
                          v-model="post.rekognisi"
                        />
                        <div class="invalid-feedback">
                          {{ errors.rekognisi }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Bidang Keahlian</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.bidang_keahlian ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.bidang_keahlian"
                        />
                        <div class="invalid-feedback">
                          {{ errors.bidang_keahlian }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Deskripsi Bukti</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.deskripsi_bukti ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.deskripsi_bukti"
                        />
                        <div class="invalid-feedback">
                          {{ errors.deskripsi_bukti }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tahun</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.tahun ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.tahun"
                        />
                        <div class="invalid-feedback">
                          {{ errors.tahun }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Tingkat</label>
                        <select
                          class="form-select"
                          aria-label="Default select example"
                          :class="errors.tingkat ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.tingkat"
                        >
                          <option selected>Open this select menu</option>
                          <option value="wilayah">Wilayah</option>
                          <option value="nasional">Nasional</option>
                          <option value="internasional">Internasional</option>
                        </select>
                        <div class="invalid-feedback">
                          {{ errors.tingkat }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>File</label> <br />
                        <input
                          type="file"
                          @change="onChange"
                          class=""
                          :class="errors.files ? 'is-invalid' : ''"
                        />
                        <div class="invalid-feedback">
                          {{ errors.files }}
                        </div>
                      </div>
                      <button type="submit" class="btn btn-md btn-success mr-2">
                        SIMPAN
                      </button>
                      <button type="reset" class="btn btn-md btn-danger">
                        RESET
                      </button>
                    </form>
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
import NavbarViewVue from "../layouts/NavbarView.vue";
import SidebarViewVue from "../layouts/SidebarView.vue";
import FooterViewVue from "../layouts/FooterView.vue";
export default {
  data() {
    return {
      post: {
        // nama_sertifikat: "",
        // keterangan: "",
      },
      errors: {},
      test: 10,
      files: null,
    };
  },
  methods: {
    onChange(e) {
      console.log(e.target.files[0]);
      this.files = e.target.files[0];
    },
    PostStore(e) {
      // const headers = {
      //   Authorization: "Bearer my-token",
      //   "My-Custom-Header": "foobar",
      // };
      let formData = new FormData();
      formData.append("rekognisi", this.post.rekognisi);
      formData.append("bidang_keahlian", this.post.bidang_keahlian);
      formData.append("deskripsi_bukti", this.post.deskripsi_bukti);
      formData.append("tingkat", this.post.tingkat);
      formData.append("tahun", this.post.tahun);
      formData.append("files", this.files);
      axios
        .post("http://localhost:8080/api/rekogdosen", formData, {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        })
        .then((response) => {
          this.$swal("Sukses!", "Your file has been saved.", "success");
          this.$router.push({
            name: "rekognisidosen",
          });
          console.log(response.data);
        })
        .catch((error) => {
          this.$swal("Failed!", "Your file has not been saved.", "error");
          this.errors = error.response.data.errors;
          console.log(this.errors);
        });

      // this.errors = {};

      // if (!this.post.title) {
      //   this.errors.push(errors.titlevue, "Masukkan Title Post.");
      // }

      // if (!this.post.content) {
      //   this.errors.push("Masukkan Konten Post.");
      // }

      e.preventDefault();
    },
  },
  components: {
    "nav-bar": NavbarViewVue,
    "side-bar": SidebarViewVue,
    "footer-vue": FooterViewVue,
  },
};
</script>

<style></style>
