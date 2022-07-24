<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-gradient-blue ">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"
                ><i class="fas fa-bars"></i
              ></a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
              <a href="index3.html" class="nav-link"><h6 class="text-white">Home</h6></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link"><h6 class="text-white">Contact</h6></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              <a href="#" class="nav-link"><h6 class="text-white"></h6></a>
            </li>
          </ul>
          
        </nav>
</template>

<script>
export default {
  created(){
    axios.get("http://localhost:8080/api/profile",{
        headers: {
          Authorization: "Bearer " + localStorage.getItem("token"),
        },
      })
  },

}
</script>

<style>

</style>