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
                        <label>TEMA SESUAI ROADMAP</label>
                        <input type="text" class="form-control" :class="errors.tema_sesuai_roadmap ? 'is-invalid' : ''" placeholder="Masukkan Title" v-model="pkm.tema_sesuai_roadmap" />
                        <div class="invalid-feedback">
                          {{ errors.tema_sesuai_roadmap }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>JUDUL KEGIATAN</label>
                        <input type="text" class="form-control" :class="errors.judul_kegiatan ? 'is-invalid' : ''" placeholder="Masukkan Title" v-model="pkm.judul_kegiatan" />
                        <div class="invalid-feedback">
                          {{ errors.judul_kegiatan }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>LOKASI</label>
                        <input type="text" class="form-control" :class="errors.lokasi ? 'is-invalid' : ''" placeholder="Masukkan Title" v-model="pkm.lokasi" />
                        <div class="invalid-feedback">
                          {{ errors.lokasi }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>TAHUN</label>
                        <input type="text" class="form-control" :class="errors.tahun ? 'is-invalid' : ''" placeholder="Masukkan Title" v-model="pkm.tahun" />
                        <div class="invalid-feedback">
                          {{ errors.tahun }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>SUMBER DANA PT MANDIRI</label>
                        <input type="text" class="form-control" :class="errors.sumber_dana_pt_mandiri ? 'is-invalid' : ''" placeholder="Masukkan Title" v-model="pkm.sumber_dana_pt_mandiri" />
                        <div class="invalid-feedback">
                          {{ errors.sumber_dana_pt_mandiri }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>DANA PT MANDIRI</label>
                        <input type="text" class="form-control" :class="errors.dana_pt_mandiri ? 'is-invalid' : ''" placeholder="Masukkan Title" v-model="pkm.dana_pt_mandiri" />
                        <div class="invalid-feedback">
                          {{ errors.dana_pt_mandiri }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>SUMBER DALAM NEGERI</label>
                        <input type="text" class="form-control" :class="errors.sumber_dalam_negri ? 'is-invalid' : ''" placeholder="Masukkan Title" v-model="pkm.sumber_dalam_negri" />
                        <div class="invalid-feedback">
                          {{ errors.sumber_dalam_negri }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>DANA DALAM NEGERI</label>
                        <input type="text" class="form-control" :class="errors.dana_dalam_negri ? 'is-invalid' : ''" placeholder="Masukkan Title" v-model="pkm.dana_dalam_negri" />
                        <div class="invalid-feedback">
                          {{ errors.dana_dalam_negri }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label>SUMBER LUAR NEGERI</label>
                        <input class="form-control" :class="errors.sumber_luar_negri ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Konten" v-model="pkm.sumber_luar_negri" />
                        <div class="invalid-feedback">
                          {{ errors.sumber_luar_negri }}
                        </div>
                      </div>

                      <div class="form-group">
                        <label>DANA LUAR NEGERI</label>
                        <input class="form-control" :class="errors.dana_luar_negri ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Konten" v-model="pkm.dana_luar_negri" />
                        <div class="invalid-feedback">
                          {{ errors.dana_luar_negri }}
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
      pkm: {
        tema_sesuai_roadmap: '',
        judul_kegiatan: '',
        lokasi: '',
        tahun: '',
        sumber_dana_pt_mandiri: '',
        dana_pt_mandiri: '',
        sumber_dalam_negri: '',
        dana_dalam_negri: '',
        sumber_luar_negri: '',
        dana_luar_negri: '',
      },
      errors: {},
      test: 10,
    };
  },
  methods: {
    PostStore(e) {
      let formData = new FormData();
      formData.append('tema_sesuai_roadmap', this.pkm.tema_sesuai_roadmap);
      formData.append('judul_kegiatan', this.pkm.judul_kegiatan);
      formData.append('lokasi', this.pkm.lokasi);
      formData.append('tahun', this.pkm.tahun);
      formData.append('sumber_dana_pt_mandiri', this.pkm.sumber_dana_pt_mandiri);
      formData.append('dana_pt_mandiri', this.pkm.dana_pt_mandiri);
      formData.append('sumber_dalam_negri', this.pkm.sumber_dalam_negri);
      formData.append('dana_dalam_negri', this.pkm.dana_dalam_negri);
      formData.append('sumber_luar_negri', this.pkm.sumber_luar_negri);
      formData.append('dana_luar_negri', this.pkm.dana_luar_negri);
      axios
        .post('http://localhost:8080/api/pkm', formData)
        .then((response) => {
          this.$swal('Sukses!', 'Your file has been saved.', 'success');
          this.$router.push({
            name: 'pkm',
          });
          console.log(response.data);
        })
        .catch((error) => {
          this.$swal('Failed!', 'Your file has not been saved.', 'error');
          this.errors = error.response.data.errors;
          console.log(this.errors);
          console.log(formData);
        });

      // this.errors = {};

      // if (!this.pkm.title) {
      //   this.errors.push(errors.titlevue, "Masukkan Title Post.");
      // }

      // if (!this.pkm.content) {
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
