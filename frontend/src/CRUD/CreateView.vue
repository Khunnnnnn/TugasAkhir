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
                        <label>TITLE</label>
                        <input type="text" class="form-control" :class="errors.title ? 'is-invalid' : ''" placeholder="Masukkan Title" v-model="post.title" />
                        <div class="invalid-feedback">
                          {{ errors.title }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label>KONTEN</label>
                        <textarea class="form-control" :class="errors.content ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Konten" v-model="post.content"></textarea>
                        <div class="invalid-feedback">
                          {{ errors.content }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>File</label> <br />
                        <input type="file" @change="onChange" class="" :class="errors.files ? 'is-invalid' : ''" />
                        <div class="invalid-feedback">
                          {{ errors.files }}
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
import axios from "axios";
import NavbarViewVue from "../layouts/NavbarView.vue";
import SidebarViewVue from "../layouts/SidebarView.vue";
import FooterViewVue from "../layouts/FooterView.vue";
export default {
  data() {
    return {
      post: {
        title: "",
        content: "",
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
      let formData = new FormData();
      formData.append("title", this.post.title);
      formData.append("content", this.post.content);
      formData.append("files", this.files);
      axios
        .post("http://localhost:8080/api/post", formData)
        .then((response) => {
          
            this.$swal(
          'Sukses!',
      'Your file has been saved.',
      'success'
        )
          
          this.$router.push({
            name: "home",
          });
          console.log(response.data);
        })
        .catch((error) => {
           this.$swal(
          'Failed!',
      'Your file has not been saved.',
      'error'
        )
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
