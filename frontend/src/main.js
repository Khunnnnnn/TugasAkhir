import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import axios from "axios";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import vueTopprogress from 'vue-top-progress'
Vue.use(vueTopprogress)

components:{
  vueTopprogress
}

Vue.use(VueSweetalert2);
Vue.use(axios);
Vue.config.productionTip = false;

import NavbarView from "./layouts/NavbarView.vue";
import SidebarView from "./layouts/SidebarView.vue";
import FooterView from "./layouts/FooterView.vue";

Vue.component("sidebar-layout", SidebarView);
Vue.component("navbar-layout", NavbarView);
Vue.component("footer-layout", FooterView);

new Vue({
  router,
  render: (h) => h(App),
}).$mount("#app");
