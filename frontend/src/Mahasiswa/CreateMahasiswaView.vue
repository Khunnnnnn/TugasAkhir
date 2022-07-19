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
                  <div class="card-header">TAMBAH POST</div>
                  <div class="card-body">
                    <form @submit.prevent="PostStore">
                      <div class="form-group">
                        <label>NIM</label>
                        <input type="text" class="form-control" :class="errors.nim ? 'is-invalid' : ''" placeholder="Masukkan NIM" v-model="post.nim" required />
                        <div class="invalid-feedback">
                          {{ errors.nim }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" :class="errors.nama ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Nama" v-model="post.nama" required />
                        <div class="invalid-feedback">
                          {{ errors.nama }}
                        </div>
                      </div>
                      <button type="submit" class="btn btn-md btn-success mr-2">SIMPAN</button>
                      <button type="reset" class="btn btn-md btn-danger">RESET</button>
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
import axios from 'axios';
import NavbarViewVue from '../layouts/NavbarView.vue';
import SidebarViewVue from '../layouts/SidebarView.vue';
import FooterViewVue from '../layouts/FooterView.vue';
export default {
  data() {
    return {
      post: {
        nim: '',
        nama: '',
      },
      errors: {},
      test: 10,
    };
  },
  methods: {
  //   onChange(e) {
  //     console.log(e.target.files[0]);
  //     this.files = e.target.files[0];
  //   },
    PostStore(e) {
      let formData = new FormData();
      formData.append('nim', this.post.nim);
      formData.append('nama', this.post.nama);
      axios
        .post('http://localhost:8080/api/mahasiswa', formData)
        .then((response) => {
          this.$swal('Sukses!', 'Your file has been saved.', 'success');
          this.$router.push({
            name: 'mahasiswa',
          });
          console.log(response.data);
        })
        .catch((error) => {
          this.$swal('Failed!', 'Your file has not been saved.', 'error');
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
    'nav-bar': NavbarViewVue,
    'side-bar': SidebarViewVue,
    'footer-vue': FooterViewVue,
  },
};
</script>

<style></style>
