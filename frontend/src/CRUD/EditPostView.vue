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
                  <div class="card-header">EDIT POSTS</div>
                  <div class="card-body">
                    <form @submit.prevent="PostUpdate">
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

                      <div class="form-group">
                        <button type="submit" class="btn btn-md btn-success mr-2">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-danger">RESET</button>
                      </div>
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
import NavbarView from "../layouts/NavbarView.vue";
import SidebarView from "../layouts/SidebarView.vue";
import FooterView from "../layouts/FooterView.vue";
export default {
  name: "home",
  components: {
    "nav-bar": NavbarView,
    "side-bar": SidebarView,
    "footer-vue": FooterView,
  },
  data() {
    return {
      post: {
        title: "",
        content: "",
      },
      errors: {},
      files: null,
      url: "http://localhost:8080/dokumentb8/",
    };
  },
  created() {
    axios.get(`http://localhost:8080/api/post/${this.$route.params.id}`).then((response) => {
      this.post = response.data.data;
    });
  },
  methods: {
    onChange(e) {
      console.log(e.target.files[0]);
      this.files = e.target.files[0];
    },
    PostUpdate(e) {
      let formData = new FormData();
      formData.append("title", this.post.title);
      formData.append("content", this.post.content);
      formData.append("files", this.files);
      formData.append("_method", "PUT");
      axios
        .post(`http://localhost:8080/api/post/${this.$route.params.id}`, formData)
        .then((response) => {
          this.$swal(
          'Sukses!',
      'Your file has been saved.',
      'success'
        )
          this.$router.push({
            name: "home",
          });
          console.log(response);
        })
        .catch((error) => {
           this.$swal(
          'Failed!',
      'Your file has not been saved.',
      'error'
        )
          this.errors = error.response.data.errors;
        });

      e.preventDefault();
    },
  },
};
</script>
