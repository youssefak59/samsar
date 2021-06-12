require("./bootstrap");
window.Vue = require("vue").default;
import Vue from "vue";

Vue.component(
    "login-admin",
    require("./components/LoginAdmin/AdminLogin.vue").default
);
Vue.component(
    "statictic-dash",
    require("./components/Admin/StatistiqueDash.vue").default
);
Vue.component(
    "VueUploadMultipleImage",
    require("./components/Admin/VueUploadMultipleImage.vue").default
);
Vue.component("nav-bar", require("./components/User/NavBar.vue").default);
Vue.component(
    "appartements",
    require("./components/User/Appartements.vue").default
);
Vue.component("foo-ter", require("./components/User/Footer.vue").default);
Vue.component(
    "view-article",
    require("./components/User/ViewArticle.vue").default
);
Vue.component(
    "nav-bar-admin",
    require("./components/Admin/NavBarAdmin.vue").default
);

Vue.component("pagination", require("laravel-vue-pagination"));
//

//
//validate
import Vuelidate from "vuelidate";
Vue.use(Vuelidate);
//vue router
import routes from "./Routes";
import VueRouter from "vue-router";
Vue.use(VueRouter);
const router = new VueRouter({
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
    routes // short for `routes: routes`
});

//swet alert?
import Swal from "sweetalert2";

window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: toast => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    }
});
Vue.filter("formatDate", function(value) {
    if (value) {
        return moment(String(value)).format("MM/DD/YYYY hh:mm");
    }
});
Vue.use(VueRouter);
window.Toast = Toast;
///sweet alert

import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyA42aX9lpl3CC7SVWw0sddlmGl8gujq0Js",
        libraries: "places" // This is required if you use the Autocomplete plugin
    }
});

//upload multip pictures
import VueLazyload from "vue-lazyload";
//
// import Notifications from "./components/NotificationPlugin";
// Vue.use(Notifications);

Vue.use(VueLazyload);

import Vuesax from "vuesax";

import "vuesax/dist/vuesax.css"; //Vuesax styles
Vue.use(Vuesax, {
    // options here
});

const app = new Vue({
    router,
    el: "#app"
});
