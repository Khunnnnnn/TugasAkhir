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
                    <form @submit.prevent="PostUpdate">
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
import NavbarView from '../layouts/NavbarView.vue';
import SidebarView from '../layouts/SidebarView.vue';
import FooterView from '../layouts/FooterView.vue';
export default {
  name: 'home',
  components: {
    'nav-bar': NavbarView,
    'side-bar': SidebarView,
    'footer-vue': FooterView,
  },
  data() {
    return {
      post: {
        nim: '',
        nama: '',
      },
      errors: {},
      // files: null,
      //   url: "http://localhost:8080/dokumentb8/",
    };
  },
  created() {
    axios.get(`http://localhost:8080/api/mahasiswa/${this.$route.params.id}`).then((response) => {
      this.post = response.data.data;
    });
  },
  methods: {
    // onChange(e) {
    //   console.log(e.target.files[0]);
    //   this.files = e.target.files[0];
    // },
    PostUpdate(e) {
      let formData = new FormData();
      formData.append('nim', this.post.nim);
      formData.append('nama', this.post.nama);
      formData.append('_method', 'PUT');

      axios
        .post(`http://localhost:8080/api/mahasiswa/${this.$route.params.id}`, formData)
        .then((response) => {
          this.$swal('Sukses!', 'Your file has been saved.', 'success');
          this.$router.push({
            name: 'mahasiswa',
          });
          console.log(response);
        })
        .catch((error) => {
          this.$swal('Failed!', 'Your file has not been saved.', 'error');
          this.errors = error.response.data.errors;
        });

      e.preventDefault();
    },
  },
};
</script>
