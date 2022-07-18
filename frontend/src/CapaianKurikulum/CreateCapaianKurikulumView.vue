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
                            <label>SEMESTER</label>
                            <input type="text" class="form-control" :class="errors.semester ? 'is-invalid' : ''" placeholder="Masukkan Semester" v-model="capkrklm.semester" required />
                            <div class="invalid-feedback">
                              {{ errors.semester }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>TAHUN</label>
                            <input class="form-control" :class="errors.tahun ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Tahun" v-model="capkrklm.tahun" required />
                            <div class="invalid-feedback">
                              {{ errors.tahun }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>MATA KULIAH KOMPETENSI</label>
                            <input class="form-control" :class="errors.mata_kuliah_kompetensi ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Mata Kuliah Kompetensi" v-model="capkrklm.mata_kuliah_kompetensi" required />
                            <div class="invalid-feedback">
                              {{ errors.mata_kuliah_kompetensi }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>KULIAH RESPONSI TUTORIAL</label>
                            <input class="form-control" :class="errors.kuliah_responsi_tutorial ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Kuliah Responsi Tutorial" v-model="capkrklm.kuliah_responsi_tutorial" required />
                            <div class="invalid-feedback">
                              {{ errors.kuliah_responsi_tutorial }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>SEMINAR</label>
                            <input class="form-control" :class="errors.seminar ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Seminar" v-model="capkrklm.seminar" required />
                            <div class="invalid-feedback">
                              {{ errors.seminar }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>PRAKTIKUM</label>
                            <input class="form-control" :class="errors.praktikum ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Praktikum" v-model="capkrklm.praktikum" required />
                            <div class="invalid-feedback">
                              {{ errors.praktikum }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>KONVERSI KREDIT JAM</label>
                            <input class="form-control" :class="errors.konversi_kredit_jam ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Konversi Kredit Jam" v-model="capkrklm.konversi_kredit_jam" required />
                            <div class="invalid-feedback">
                              {{ errors.konversi_kredit_jam }}
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>PROGRAM STUDI</label>
                            <select class="form-select" :class="errors.idprodi ? 'is-invalid' : ''" id="" v-model="capkrklm.prodi">
                              <option value="">Pilih Program Studi</option>
                              <option v-for="prodi in prodis" :key="prodi.id" :value="prodi.id">
                                {{ prodi.prodi }}
                              </option>
                            </select>
                            <div class="invalid-feedback">
                              {{ errors.idprodi }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>SIKAP</label>
                            <input class="form-control" :class="errors.sikap ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Sikap" v-model="capkrklm.sikap" required />
                            <div class="invalid-feedback">
                              {{ errors.sikap }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>PENGETAHUAN</label>
                            <input class="form-control" :class="errors.pengetahuan ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Pengetahuan" v-model="capkrklm.pengetahuan" required />
                            <div class="invalid-feedback">
                              {{ errors.pengetahuan }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>KETERAMPILAN UMUM</label>
                            <input class="form-control" :class="errors.keterampilan_umum ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Keterampilan Umum" v-model="capkrklm.keterampilan_umum" required />
                            <div class="invalid-feedback">
                              {{ errors.keterampilan_umum }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>KETERAMPILAN KHUSUS</label>
                            <input class="form-control" :class="errors.keterampilan_khusus ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Keterampilan Khusus" v-model="capkrklm.keterampilan_khusus" required />
                            <div class="invalid-feedback">
                              {{ errors.keterampilan_khusus }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>DOKUMEN RENCANA PEMBELAJARAN</label>
                            <input
                              class="form-control"
                              :class="errors.dokumen_rencana_pembelajaran ? 'is-invalid' : ''"
                              rows="5"
                              placeholder="Masukkan Dokumen Rencana Pembelajaran"
                              v-model="capkrklm.dokumen_rencana_pembelajaran"
                              required
                            />
                            <div class="invalid-feedback">
                              {{ errors.dokumen_rencana_pembelajaran }}
                            </div>
                          </div>
                          <div class="form-group">
                            <label>UNIT PENYELENGGARA</label>
                            <input class="form-control" :class="errors.unit_penyelenggara ? 'is-invalid' : ''" rows="5" placeholder="Masukkan Unit Penyelenggara" v-model="capkrklm.unit_penyelenggara" required />
                            <div class="invalid-feedback">
                              {{ errors.unit_penyelenggara }}
                            </div>
                          </div>
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
  created() {
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
      capkrklm: {
        prodi: '',
        semester: '',
        tahun: '',
      },
      errors: {},
      test: 10,
    };
  },

  methods: {
    PostStore(e) {
      let formData = new FormData();
      formData.append('semester', this.capkrklm.semester);
      formData.append('tahun', this.capkrklm.tahun);
      formData.append('mata_kuliah_kompetensi', this.capkrklm.mata_kuliah_kompetensi);
      formData.append('kuliah_responsi_tutorial', this.capkrklm.kuliah_responsi_tutorial);
      formData.append('seminar', this.capkrklm.seminar);
      formData.append('praktikum', this.capkrklm.praktikum);
      formData.append('konversi_kredit_jam', this.capkrklm.konversi_kredit_jam);
      formData.append('sikap', this.capkrklm.sikap);
      formData.append('pengetahuan', this.capkrklm.pengetahuan);
      formData.append('keterampilan_umum', this.capkrklm.keterampilan_umum);
      formData.append('keterampilan_khusus', this.capkrklm.keterampilan_khusus);
      formData.append('dokumen_rencana_pembelajaran', this.capkrklm.dokumen_rencana_pembelajaran);
      formData.append('unit_penyelenggara', this.capkrklm.unit_penyelenggara);
      formData.append('idprodi', this.capkrklm.prodi);

      axios
        .post('http://localhost:8080/api/capaiankurikulum', formData)
        .then((response) => {
          this.$swal('Sukses!', 'Your file has been saved.', 'success');
          this.$router.push({
            name: 'capaiankurikulum',
          });
          console.log(response.data);
        })
        .catch((error) => {
          this.$swal('Failed!', 'Your file has not been saved.', 'error');
          this.errors = error.response.data.errors;
          console.log(this.errors);
          console.log(formData);
        });
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
