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
                        <label>judul</label>
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
                        <label>Kategori Jurnal</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.kategori_jurnal ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.kategori_jurnal"
                        />
                        <div class="invalid-feedback">
                          {{ errors.kategori_jurnal }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Nama Jurnal</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.nama_jurnal ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.nama_jurnal"
                        />
                        <div class="invalid-feedback">
                          {{ errors.nama_jurnal }}
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
                        <label>Volume</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.volume ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.volume"
                        />
                        <div class="invalid-feedback">
                          {{ errors.volume }}
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
                        <label>Nomor</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.nomor ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.nomor"
                        />
                        <div class="invalid-feedback">
                          {{ errors.nomor }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Halaman</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.halaman ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.halaman"
                        />
                        <div class="invalid-feedback">
                          {{ errors.halaman }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Sitasi</label>
                        <input
                          type="text"
                          class="form-control"
                          :class="errors.sitasi ? 'is-invalid' : ''"
                          rows="5"
                          placeholder="Masukkan Konten"
                          v-model="post.sitasi"
                        />
                        <div class="invalid-feedback">
                          {{ errors.sitasi }}
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
      formData.append("judul", this.post.judul);
      formData.append("kategori_jurnal", this.post.kategori_jurnal);
      formData.append("nama_jurnal", this.post.nama_jurnal);
      formData.append("keterangan", this.post.keterangan);
      formData.append("volume", this.post.volume);
      formData.append("tahun", this.post.tahun);
      formData.append("nomor", this.post.nomor);
      formData.append("halaman", this.post.halaman);
      formData.append("sitasi", this.post.sitasi);
      axios
        .post("http://localhost:8080/api/bukujurnal", formData, {
          headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
          },
        })
        .then((response) => {
          this.$swal("Sukses!", "Your file has been saved.", "success");
          this.$router.push({
            name: "bukujurnal",
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
