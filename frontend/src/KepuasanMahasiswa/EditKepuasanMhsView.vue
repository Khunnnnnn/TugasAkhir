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
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>TAHUN</label>
                            <input type="number" class="form-control" :class="errors.tahun ? 'is-invalid' : ''" placeholder="Masukkan Tahun" v-model="kepmhs.tahun" required />
                            <div class="invalid-feedback">
                              {{ errors.tahun }}
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>PROGRAM STUDI</label>
                            <select class="form-select" :class="errors.idprodi ? 'is-invalid' : ''" id="" v-model="kepmhs.prodi">
                              <option value="">Pilih Program Studi</option>
                              <option v-for="prodi in prodis" :key="prodi.id" :value="prodi.id">
                                {{ prodi.prodi }}
                              </option>
                            </select>
                            <div class="invalid-feedback">
                              {{ errors.idprodi }}
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- form kebawah -->
                      <div class="row">
                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div class="form-group">
                            <p><b>KEANDALAN</b></p>
                            <label>SANGAT BAIK</label>

                            <input type="number" class="form-control" :class="errors.keandalan_4 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.keandalan_4" required />
                            <div class="invalid-feedback">
                              {{ errors.keandalan_4 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>BAIK</label>
                            <input type="number" class="form-control" :class="errors.keandalan_3 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.keandalan_3" required />
                            <div class="invalid-feedback">
                              {{ errors.keandalan_3 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>CUKUP</label>
                            <input type="number" class="form-control" :class="errors.keandalan_2 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.keandalan_2" required />
                            <div class="invalid-feedback">
                              {{ errors.keandalan_2 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>KURANG</label>
                            <input type="number" class="form-control" :class="errors.keandalan_1 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.keandalan_1" required />
                            <div class="invalid-feedback">
                              {{ errors.keandalan_1 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>TOTAL</label>
                            <input type="number" class="form-control" :class="errors.tl_keandalan ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.tl_keandalan" required />
                            <div class="invalid-feedback">
                              {{ errors.tl_keandalan }}
                            </div>
                          </div>
                        </div>

                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div class="form-group">
                            <p><b>DAYA TANGGAP</b></p>
                            <label>SANGAT BAIK</label>
                            <input type="number" class="form-control" :class="errors.daya_tanggap_4 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.daya_tanggap_4" required />
                            <div class="invalid-feedback">
                              {{ errors.daya_tanggap_4 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>BAIK</label>
                            <input type="number" class="form-control" :class="errors.daya_tanggap_3 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.daya_tanggap_3" required />
                            <div class="invalid-feedback">
                              {{ errors.daya_tanggap_3 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>CUKUP</label>
                            <input type="number" class="form-control" :class="errors.daya_tanggap_2 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.daya_tanggap_2" required />
                            <div class="invalid-feedback">
                              {{ errors.daya_tanggap_2 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>KURANG</label>
                            <input type="number" class="form-control" :class="errors.daya_tanggap_1 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.daya_tanggap_1" required />
                            <div class="invalid-feedback">
                              {{ errors.daya_tanggap_1 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>TOTAL</label>
                            <input type="number" class="form-control" :class="errors.tl_daya_tanggap ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.tl_daya_tanggap" required />
                            <div class="invalid-feedback">
                              {{ errors.tl_daya_tanggap }}
                            </div>
                          </div>
                        </div>

                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div class="form-group">
                            <p><b>KEPASTIAN</b></p>
                            <label>SANGAT BAIK</label>
                            <input type="number" class="form-control" :class="errors.kepastian_4 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.kepastian_4" required />
                            <div class="invalid-feedback">
                              {{ errors.kepastian_4 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>BAIK</label>
                            <input type="number" class="form-control" :class="errors.kepastian_3 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.kepastian_3" required />
                            <div class="invalid-feedback">
                              {{ errors.kepastian_3 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>CUKUP</label>
                            <input type="number" class="form-control" :class="errors.kepastian_2 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.kepastian_2" required />
                            <div class="invalid-feedback">
                              {{ errors.kepastian_2 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>KURANG</label>
                            <input type="number" class="form-control" :class="errors.kepastian_1 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.kepastian_1" required />
                            <div class="invalid-feedback">
                              {{ errors.kepastian_1 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>TOTAL</label>
                            <input type="number" class="form-control" :class="errors.tl_kepastian ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.tl_kepastian" required />
                            <div class="invalid-feedback">
                              {{ errors.tl_kepastian }}
                            </div>
                          </div>
                        </div>

                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div class="form-group">
                            <p><b>EMPATI</b></p>
                            <label>SANGAT BAIK</label>
                            <input type="number" class="form-control" :class="errors.empati_4 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.empati_4" required />
                            <div class="invalid-feedback">
                              {{ errors.empati_4 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>BAIK</label>
                            <input type="number" class="form-control" :class="errors.empati_3 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.empati_3" required />
                            <div class="invalid-feedback">
                              {{ errors.empati_3 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label> CUKUP</label>
                            <input type="number" class="form-control" :class="errors.empati_2 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.empati_2" required />
                            <div class="invalid-feedback">
                              {{ errors.empati_2 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label> KURANG</label>
                            <input type="number" class="form-control" :class="errors.empati_1 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.empati_1" required />
                            <div class="invalid-feedback">
                              {{ errors.empati_1 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>TOTAL</label>
                            <input type="number" class="form-control" :class="errors.tl_empati ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.tl_empati" required />
                            <div class="invalid-feedback">
                              {{ errors.tl_empati }}
                            </div>
                          </div>
                        </div>

                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div class="form-group">
                            <p><b>TANGIBLE</b></p>
                            <label>SANGAT BAIK</label>
                            <input type="number" class="form-control" :class="errors.tangible_4 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.tangible_4" required />
                            <div class="invalid-feedback">
                              {{ errors.tangible_4 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>BAIK</label>
                            <input type="number" class="form-control" :class="errors.tangible_3 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.tangible_3" required />
                            <div class="invalid-feedback">
                              {{ errors.tangible_3 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>CUKUP</label>
                            <input type="number" class="form-control" :class="errors.tangible_2 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.tangible_2" required />
                            <div class="invalid-feedback">
                              {{ errors.tangible_2 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>KURANG</label>
                            <input type="number" class="form-control" :class="errors.tangible_1 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.tangible_1" required />
                            <div class="invalid-feedback">
                              {{ errors.tangible_1 }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>TOTAL</label>
                            <input type="number" class="form-control" :class="errors.tl_tangible ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.tl_tangible" required />
                            <div class="invalid-feedback">
                              {{ errors.tl_tangible }}
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- form kesamping -->
                      <!-- <div class="row align-items-center">
                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div><b>KEANDALAN</b></div>
                        </div>
                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div class="form-group">
                            <label>SANGAT BAIK</label>

                            <input type="number" class="form-control" :class="errors.keandalan_4 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.keandalan_4" required />
                            <div class="invalid-feedback">
                              {{ errors.keandalan_4 }}
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div class="form-group">
                            <label>SANGAT BAIK</label>

                            <input type="number" class="form-control" :class="errors.keandalan_4 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.keandalan_4" required />
                            <div class="invalid-feedback">
                              {{ errors.keandalan_4 }}
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div class="form-group">
                            <label>SANGAT BAIK</label>

                            <input type="number" class="form-control" :class="errors.keandalan_4 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.keandalan_4" required />
                            <div class="invalid-feedback">
                              {{ errors.keandalan_4 }}
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-6 col-sm-1-5 col-lg-2-5">
                          <div class="form-group">
                            <label>SANGAT BAIK</label>

                            <input type="number" class="form-control" :class="errors.keandalan_4 ? 'is-invalid' : ''" placeholder="Masukkan nilai" v-model="kepmhs.keandalan_4" required />
                            <div class="invalid-feedback">
                              {{ errors.keandalan_4 }}
                            </div>
                          </div>
                        </div>
                      </div> -->

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
  created() {
    this.Getdata();
    axios
      .get('http://localhost:8080/api/prodi')
      .then((response) => {
        const { prodi } = response.data;
        this.prodis = prodi;
        console.log(prodi);
      })
      .catch((error) => {
        console.log(error.response);
      });
  },
  data() {
    return {
      prodis: '',
      kepmhs: {
        prodi: '',
        tahun: '',
        keandalan_4: '',
      },
      errors: {},
    };
  },
  methods: {
    // onChange(e) {
    //   console.log(e.target.files[0]);
    //   this.files = e.target.files[0];
    // },
    Getdata() {
      let id = this.$route.params.id;
      // ketika refresh halaman nilai id tidak hilang
      if (id) {
        localStorage.setItem('id', id);
      } else {
      }

      axios.get(`http://localhost:8080/api/kepuasanmahasiswa/${localStorage.getItem('id')}`).then((response) => {
        this.kepmhs = response.data.kepmhs;
        console.log(this.kepmhs);
      });
    },
    PostStore(e) {
      let formData = new FormData();
      formData.append('tahun', this.kepmhs.tahun);
      formData.append('keandalan_4', this.kepmhs.keandalan_4);
      formData.append('keandalan_3', this.kepmhs.keandalan_3);
      formData.append('keandalan_2', this.kepmhs.keandalan_2);
      formData.append('keandalan_1', this.kepmhs.keandalan_1);
      formData.append('tl_keandalan', this.kepmhs.tl_keandalan);

      formData.append('daya_tanggap_4', this.kepmhs.daya_tanggap_4);
      formData.append('daya_tanggap_3', this.kepmhs.daya_tanggap_3);
      formData.append('daya_tanggap_2', this.kepmhs.daya_tanggap_2);
      formData.append('daya_tanggap_1', this.kepmhs.daya_tanggap_1);
      formData.append('tl_daya_tanggap', this.kepmhs.tl_daya_tanggap);

      formData.append('kepastian_4', this.kepmhs.kepastian_4);
      formData.append('kepastian_3', this.kepmhs.kepastian_3);
      formData.append('kepastian_2', this.kepmhs.kepastian_2);
      formData.append('kepastian_1', this.kepmhs.kepastian_1);
      formData.append('tl_kepastian', this.kepmhs.tl_kepastian);

      formData.append('empati_4', this.kepmhs.empati_4);
      formData.append('empati_3', this.kepmhs.empati_3);
      formData.append('empati_2', this.kepmhs.empati_2);
      formData.append('empati_1', this.kepmhs.empati_1);
      formData.append('tl_empati', this.kepmhs.tl_empati);

      formData.append('tangible_4', this.kepmhs.tangible_4);
      formData.append('tangible_3', this.kepmhs.tangible_3);
      formData.append('tangible_2', this.kepmhs.tangible_2);
      formData.append('tangible_1', this.kepmhs.tangible_1);
      formData.append('tl_tangible', this.kepmhs.tl_tangible);

      formData.append('idprodi', this.kepmhs.prodi);

      formData.append('_method', 'PUT');
      axios
        .post(`http://localhost:8080/api/kepuasanmahasiswa/${localStorage.getItem('id')}`, formData)
        .then((response) => {
          this.$swal('Sukses!', 'Your file has been saved.', 'success');

          this.$router.push({
            name: 'kepuasanmahasiswa',
          });
          console.log(response.data);
        })
        .catch((error) => {
          this.$swal('Failed!', 'Your file has not been saved.', 'error');
          this.errors = error.response.data.errors;
          console.log(this.errors);
        });
      e.preventDefault();
    },
  },
  components: {
    'nav-bar': NavbarView,
    'side-bar': SidebarView,
    'footer-vue': FooterView,
  },
};
</script>

<style>
/** Responsive Layout **/
@media (min-width: 992px) {
  .col-md-1-5 {
    width: 20%;
  }
  .col-md-2-5 {
    width: 40%;
  }
  .col-md-3-5 {
    width: 60%;
  }
  .col-md-4-5 {
    width: 80%;
  }
  .col-md-5-5 {
    width: 100%;
  }
}
@media (min-width: 1200px) {
  .col-lg-1-5 {
    width: 20%;
  }
  .col-lg-2-5 {
    width: 40%;
  }
  .col-lg-3-5 {
    width: 60%;
  }
  .col-lg-4-5 {
    width: 80%;
  }
  .col-lg-5-5 {
    width: 100%;
  }
}
@media (min-width: 768px) {
  .col-sm-1-5 {
    width: 20%;
  }
  .col-sm-2-5 {
    width: 40%;
  }
  .col-sm-3-5 {
    width: 60%;
  }
  .col-sm-4-5 {
    width: 80%;
  }
  .col-sm-5-5 {
    width: 100%;
  }
}

/* styling */
.show-grid [class^='col-'] span,
.container-fluid .show-grid [class^='col-'] {
  display: block;
  padding-top: 10px;
  padding-bottom: 10px;
  background-color: #eee;
  background-color: rgba(86, 61, 124, 0.15);
  text-align: center;
  border: 1px solid #ddd;
  border: 1px solid rgba(86, 61, 124, 0.2);
}

[class^='col-'] {
  margin-bottom: 30px;
}
</style>

