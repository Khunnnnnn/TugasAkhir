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
                <h1 class="m-0">Create Luaran Dosen Page</h1>
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
                        <label>Judul</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.judul ? 'is-invalid' : ''"
                          placeholder="Masukkan Title"
                          v-model="post.judul"
                        />
                        <div class="invalid-feedback">
                          {{ errors.judul }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Keterangan</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.keterangan ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.keterangan"
                        />
                        <div class="invalid-feedback">
                          {{ errors.keterangan }}
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
                        <label>Jenis Luaran</label>
                        <select
                          class="form-select" :class="errors.tahun ? 'is-invalid' : ''"
                          aria-label="Default select example" v-model="post.jenis"
                        >
                          <!-- <option selected>Open this select menu</option> -->
                          <option value="hki1">Hki Paten</option>
                          <option value="hki2">Hki Hak Cipta</option>
                          <option value="teknologi">Teknologi</option>
                          <option value="buku">Buku</option>
                        </select>
                        <div class="invalid-feedback">
                          {{ errors.tahun }}
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
    PostStore(e) {
      // const headers = {
      //   Authorization: "Bearer my-token",
      //   "My-Custom-Header": "foobar",
      // };
      let formData = new FormData();
      formData.append("judul", this.post.judul);
      formData.append("keterangan", this.post.keterangan);
      formData.append("tahun", this.post.tahun);
      formData.append("jenis_luaran", this.post.jenis);
      axios
        .post("http://localhost:8080/api/luarandosen", formData, {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        })
        .then((response) => {
          this.$swal("Sukses!", "Your file has been saved.", "success");
          this.$router.push({
            name: "luarandosen",
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
