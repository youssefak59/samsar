<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="javascript:;">Dashboard</a>
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          aria-controls="navigation-index"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <!-- <form class="navbar-form">
            <div class="input-group no-border">
              <input type="text" value class="form-control" placeholder="Search...">
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
            </div>
          </form>-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/fr/cms">
                <i class="material-icons">dashboard</i>
                <p class="d-lg-none d-md-block">Stats</p>
              </router-link>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="http://example.com"
                id="navbarDropdownMenuLink"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="material-icons">notifications</i>
                <span class="notification">{{ count }}</span>
                <p class="d-lg-none d-md-block">Some Actions</p>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <a class="dropdown-item" href="#">Mike John responded to your email</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="javascript:;"
                id="navbarDropdownProfile"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">Account</p>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdownProfile"
              >
                <router-link class="dropdown-item mb-1" to="/fr/cms/profile">Profile</router-link>
                <!-- <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="dash?#/fr/cms/profile">Log out</a>-->
              </div>
            </li>
          </ul>
          <!-- <vs-button radius color="danger" @click="logout" type="flat" icon="settings_power"></vs-button> -->
          <vs-button radius color="danger" @click="logout" type="flat" icon="settings_power"></vs-button>
        </div>
      </div>
    </nav>
  </div>
</template>


<style>
</style>

<script>
// import NabBar from "./components/Admin/StatistiqueDash.vue";
import Swal from "sweetalert2/dist/sweetalert2.js";

import "sweetalert2/src/sweetalert2.scss";
export default {
  props: ["count"],
  data() {
    return {
      countMsgNotDon: 0,
      countInfo: {},
      messages: {}
    };
  },
  methods: {
    CountInfo() {
      this.polling = setInterval(() => {
        axios
          .get("/api/getcountinfo")
          .then(response => {
            this.countInfo = response.data["CountInfo"];

            setTimeout(CountInfo, 200);
          })
          .catch(error => {});
      }, 3000);
    },
    GetMsg() {
      axios
        .get("/api/getmsgs")
        .then(response => {
          if (response.data["status"] == "sucssus") {
            this.messages = response.data["messages"];
          } else console.log("error");
        })
        .catch(error => {
          console.log(error);
        });
    },
    logout() {
      Swal.fire({
        title: "Êtes-vous sûr?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Se déconnecter"
      }).then(result => {
        if (result.isConfirmed) {
          axios
            .post("/logout")
            .then(response => {
              if (response.data["status"] == "success") {
                window.location.href = "/login";
              }
            })
            .catch(error => {});
        }
      });
    }
  },
  created() {
    this.CountInfo();
    this.GetMsg();
    // this.countMsgNotDon = this.countmsg;
    alert(this.count);
  }
};
</script>
