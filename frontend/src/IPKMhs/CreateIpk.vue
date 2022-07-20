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
                  <div class="card-header">TAMBAH IPK MAHASISWA</div>
                  <div class="card-body">
                    <form @submit.prevent="PostStore">
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label>TAHUN</label>
                            <input
                              type="text"
                              class="form-control"
                              :class="errors.tahun ? 'is-invalid' : ''"
                              placeholder="Masukkan Tahun"
                              v-model="ipk.tahun"
                            />
                            <div class="invalid-feedback">
                              {{ errors.tahun }}
                            </div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>JUMLAH LULUSAN</label>
                            <input
                              type="text"
                              class="form-control"
                              :class="errors.jumlahlulusan ? 'is-invalid' : ''"
                              placeholder="Masukkan Jumlah Lulusan"
                              v-model="ipk.jumlah_lulusan"
                            />
                            <div class="invalid-feedback">
                              {{ errors.jumlahlulusan }}
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label>IPK MIN</label>
                            <input
                              type="text"
                              class="form-control"
                              :class="errors.ipkmin ? 'is-invalid' : ''"
                              placeholder="Masukkan IPK Min"
                              v-model="ipk.min"
                            />
                            <div class="invalid-feedback">
                              {{ errors.ipkmin }}
                            </div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>IPK MAX</label>
                            <input
                              type="text"
                              class="form-control"
                              :class="errors.ipkmax ? 'is-invalid' : ''"
                              placeholder="Masukkan IPK Max"
                              v-model="ipk.max"
                            />
                            <div class="invalid-feedback">
                              {{ errors.ipkmax }}
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label>IPK AVG</label>
                            <input
                              type="text"
                              class="form-control"
                              :class="errors.ipkavg ? 'is-invalid' : ''"
                              placeholder="Masukkan IPK Avg"
                              v-model="ipk.avg"
                            />
                            <div class="invalid-feedback">
                              {{ errors.ipkavg }}
                            </div>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label>PROGRAM STUDI</label>
                            <select
                              class="form-select"
                              :class="errors.idprodi ? 'is-invalid' : ''"
                              id=""
                              v-model="ipk.prodi"
                            >
                              <option value="">Pilih Program Studi</option>
                              <option
                                v-for="prodi in prodis"
                                :key="prodi.id"
                                :value="prodi.id"
                              >
                                {{ prodi.prodi }}
                              </option>
                            </select>
                            <div class="invalid-feedback">
                              {{ errors.idprodi }}
                            </div>
                          </div>
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
import axios from "axios"
import NavbarViewVue from "../layouts/NavbarView.vue"
import SidebarViewVue from "../layouts/SidebarView.vue"
import FooterViewVue from "../layouts/FooterView.vue"
export default {
  created() {
    axios
      .get("http://localhost:8080/api/prodi")
      .then((response) => {
        const { prodi } = response.data
        this.prodis = prodi
        console.log(prodi)
      })
      .catch((error) => {
        console.log(error.response)
      })
  },
  data() {
    return {
      prodis: "",
      ipk: {
        prodi: "",
        min: "",
        max: "",
        avg: "",
        tahun: "",
        jumlah_lulusan: "",
      },
      errors: {},
    }
  },
  methods: {
    onChange(e) {
      console.log(e.target.files[0])
      this.files = e.target.files[0]
    },
    PostStore(e) {
      let formData = new FormData()
      formData.append("tahun", this.ipk.tahun)
      formData.append("jumlahlulusan", this.ipk.jumlah_lulusan)
      formData.append("ipkmin", this.ipk.min)
      formData.append("ipkmax", this.ipk.max)
      formData.append("ipkavg", this.ipk.avg)
      formData.append("idprodi", this.ipk.prodi)
      axios
        .post("http://localhost:8080/api/ipk", formData)
        .then((response) => {
          this.$swal("Sukses!", "Your file has been saved.", "success")
          this.$router.push({
            name: "viewipk",
          })
          console.log(response.data)
        })
        .catch((error) => {
          this.$swal("Failed!", "Your file has not been saved.", "error")
          this.errors = error.response.data.errors
          console.log(error)
        })

      // this.errors = {};

      // if (!this.post.title) {
      //   this.errors.push(errors.titlevue, "Masukkan Title Post.");
      // }

      // if (!this.post.content) {
      //   this.errors.push("Masukkan Konten Post.");
      // }

      e.preventDefault()
    },
  },
  components: {
    "nav-bar": NavbarViewVue,
    "side-bar": SidebarViewVue,
    "footer-vue": FooterViewVue,
  },
}
</script>

<style></style>
