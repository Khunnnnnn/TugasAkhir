import Vue from "vue";
import VueRouter from "vue-router";
import HomeView from "../CRUD/HomeView.vue";
import CreateView from "../CRUD/CreateView.vue";
import AdminView from "../CRUD/HomeAdminView.vue";
import LoginView from "../views/LoginView.vue";
import LayoutsView from "../layouts/LayoutsView.vue";
Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "login",
    component: LoginView,
    meta: { layout: "blank" },
  },
  {
    path: "/about",
    name: "about",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
    meta: {
      requiresAuth: true, 
   }
  },
  {
    path: "/admin",
    name: "admin",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: AdminView,
    meta: {
      requiresAuth: true, 
   }
  },
  {
    path: "/create",
    name: "create",
    component: CreateView,
    meta: {
      requiresAuth: true, 
   }
  },
  {
    path: "/edit",
    name: "edit",
    component: () => import(/* webpackChunkName: "about" */ "../CRUD/EditPostView.vue"),
    meta: {
      requiresAuth: true, 
   }
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: LayoutsView,
    meta: {
      requiresAuth: true, 
   }
  },
  {
    path: "/home",
    name: "home",
    component: HomeView,
    meta: {
      requiresAuth: true, 
   }
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

router.beforeEach((to, from, next) => {
  let token = localStorage.getItem('token') != null;
  if (to.name === 'login' && token){
    next({ name: 'home' })
  }else if(to.matched.some(record => record.meta.requiresAuth)) {
      if (!token) {
        next({
          path: '/',
          query: { redirect: to.fullPath }
        })
      } else { 
         next() 
    }
  }else {
     next()
  }
})

export default router;
