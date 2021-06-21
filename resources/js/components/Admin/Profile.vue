
<template>
  <div>
    <div>
      <div class="padding">
        <div class="row">
          <div class="col-xl-6 col-md-12 col-lg-6">
            <div class="card user-card-full">
              <div class="row">
                <div class="col-sm-4 bg-c-lite-green user-profile">
                  <div class="card-block text-center text-white">
                    <div class="m-b-25">
                      <vs-avatar
                        size="70px"
                        v-if="infoadminauth.image"
                        :src="'/storage/'+infoadminauth.image"
                      />
                      <vs-avatar v-else size="70px"/>
                    </div>
                    <h6 class="f-w-600">{{ infoadminauth.name }}</h6>
                    <!-- <p>Web Designer</p> -->
                    <i class="mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="card-block">
                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                    <div class="row">
                      <div class="col-sm-12">
                        <p class="m-b-10 f-w-600">Email</p>
                        <h6 class="text-muted f-w-400">{{ infoadminauth.email }}</h6>
                      </div>
                      <!-- <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Phone</p>
                        <h6 class="text-muted f-w-400">98979989898</h6>
                      </div>-->
                    </div>
                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Fonction</p>
                        <h6 class="text-muted f-w-400">{{ infoadminauth.fonctiontype }}</h6>
                      </div>
                      <div class="col-sm-6">
                        <p class="m-b-10 f-w-600">Status</p>
                        <vs-switch color="success" v-model="switch2" disabled>
                          <span slot="on">Connecté</span>
                        </vs-switch>
                      </div>
                    </div>
                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                      <li>
                        <a
                          href="#!"
                          data-toggle="tooltip"
                          data-placement="bottom"
                          title
                          data-original-title="facebook"
                          data-abc="true"
                        >
                          <i
                            class="mdi mdi-facebook feather icon-facebook facebook"
                            aria-hidden="true"
                          ></i>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#!"
                          data-toggle="tooltip"
                          data-placement="bottom"
                          title
                          data-original-title="twitter"
                          data-abc="true"
                        >
                          <i
                            class="mdi mdi-twitter feather icon-twitter twitter"
                            aria-hidden="true"
                          ></i>
                        </a>
                      </li>
                      <li>
                        <a
                          href="#!"
                          data-toggle="tooltip"
                          data-placement="bottom"
                          title
                          data-original-title="instagram"
                          data-abc="true"
                        >
                          <i
                            class="mdi mdi-instagram feather icon-instagram instagram"
                            aria-hidden="true"
                          ></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-12 col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">
                  <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Ajouter Admin</h6>
                </h5>
                <div class="row">
                  <div class="col">
                    <vs-input
                      icon="person_pin"
                      label="Nom et Prenom"
                      v-model="profile.name"
                      placeholder="Name"
                    />
                  </div>
                  <div class="col">
                    <vs-input
                      icon="email"
                      v-model="profile.email"
                      type="email"
                      label="Email"
                      placeholder="Email"
                    />
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                    <vs-input
                      icon="lock"
                      type="password"
                      v-model="profile.password"
                      label="Mot de passe"
                      placeholder="Password"
                    />
                  </div>
                  <div class="col">
                    <vs-select
                      icon="admin_panel_settings"
                      class="selectExample"
                      label="Fonction"
                      v-model="profile.fonction"
                    >
                      <vs-select-item value="Super admin" text="Super admin"/>
                      <vs-select-item value="Admin" text="Admin"/>
                    </vs-select>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col">
                    <vs-input
                      icon="phone"
                      label="Tele (212...)"
                      v-model="profile.tele"
                      placeholder="Tele"
                    />
                  </div>
                  <div class="col">
                    <div class="float-right mt-4">
                      <vs-button
                        @click="AddAdmin"
                        icon="group_add"
                        color="primary"
                        type="border"
                      >Ajouter</vs-button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header card-header-primary">
                <div class="float-left">
                  <h4 class="card-title">Admins</h4>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table m-4">
                  <thead class="text-primary">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Tele</th>
                    <th>Fonction</th>
                    <th>Status</th>
                    <th class="d-flex justify-content-center">Action</th>
                  </thead>
                  <tbody>
                    <tr v-for="(item,key)  in admins.data" :key="key">
                      <td>{{ item.name }}</td>
                      <td>{{ item.email }}</td>
                      <td>{{ item.tele }}</td>
                      <td class="text-primary">
                        <b>{{ item.fonctiontype }}</b>
                      </td>
                      <td v-if="item.id===infoadminauth.id">
                        <vs-switch color="success" v-model="switch2" disabled>
                          <span slot="on">Connecté</span>
                        </vs-switch>
                      </td>
                      <td v-else>
                        <vs-switch color="danger" v-model="switch3" disabled>
                          <span slot="on">déconnecté</span>
                        </vs-switch>
                      </td>
                      <td class="text-primary d-flex justify-content-center">
                        <vs-button
                          color="primary"
                          @click="EditAdmin(item)"
                          type="border"
                          class="mr-2"
                          icon="edit"
                        ></vs-button>
                        <vs-button
                          color="danger"
                          v-if="item.id!=infoadminauth.id"
                          @click="DeleteAdmin(item)"
                          icon="delete"
                        ></vs-button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="col-12 mt-4">
                  <div class="d-flex justify-content-center">
                    <pagination :data="admins" @pagination-change-page="GetAdmin"></pagination>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <vs-popup class="holamundo" title="Modifier" :active.sync="popupActivoEdit">
      <div>
        <div class="row mb-2">
          <div class="col-lg-6 col-sm-12">
            <vs-input
              class="input-name"
              icon="person_pin"
              label="Nom et Prenom"
              v-model="editprofil.name"
              placeholder="Name"
            />
          </div>
          <div class="col-lg-6 col-sm-12">
            <vs-input
              class="input-name"
              icon="phone"
              label="Tele (212...)"
              v-model="editprofil.tele"
              placeholder="Tele"
            />
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-lg-6 col-sm-12">
            <vs-input
              class="input-name"
              icon="email"
              v-model="editprofil.email"
              type="email"
              label="Email"
              placeholder="Email"
            />
          </div>
          <div class="col-lg-6 col-sm-12">
            <vs-input
              class="input-name"
              icon="lock"
              type="password"
              v-model="editprofil.oldpassword"
              label="Ancien mot de passe"
              placeholder="mot de passe"
            />
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-lg-6 col-sm-12">
            <vs-input
              class="input-name"
              icon="lock"
              type="password"
              v-model="editprofil.password"
              label="Nouveau mot de passe"
              placeholder="mot de passe"
            />
          </div>
          <div class="col-lg-6 col-sm-12">
            <vs-select
              class="input-name"
              icon="admin_panel_settings"
              label="Fonction"
              v-model="editprofil.fonction"
            >
              <vs-select-item value="Super admin" text="Super admin"/>
              <vs-select-item value="Admin" text="Admin"/>
            </vs-select>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="float-right mt-3">
              <vs-button
                @click="UpdateAdmin"
                icon="group_add"
                color="primary"
                type="border"
              >Modifier</vs-button>
            </div>
          </div>
        </div>
      </div>
    </vs-popup>
  </div>
</template>
<style>
.input-name {
  width: 100% !important;
}
.padding {
  padding: 3rem !important;
}

.user-card-full {
  overflow: hidden;
}

.card {
  border-radius: 5px;
  -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
  box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
  border: none;
  margin-bottom: 30px;
}

.m-r-0 {
  margin-right: 0px;
}

.m-l-0 {
  margin-left: 0px;
}

.user-card-full .user-profile {
  border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
  background: -webkit-gradient(
    linear,
    left top,
    right top,
    from(#f29263),
    to(#ee5a6f)
  );
  /* background: linear-gradient(to right, #ee5a6f, #f29263);
   */
  background: linear-gradient(to right, #3598d9, #8fcdf7);
}

.user-profile {
  padding: 20px 0;
}

.card-block {
  padding: 1.25rem;
}

.m-b-25 {
  margin-bottom: 25px;
}

.img-radius {
  border-radius: 5px;
}

h6 {
  font-size: 14px;
}

.card .card-block p {
  line-height: 25px;
}

@media only screen and (min-width: 1400px) {
  p {
    font-size: 14px;
  }
}

.card-block {
  padding: 1.25rem;
}

.b-b-default {
  border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
  margin-bottom: 20px;
}

.p-b-5 {
  padding-bottom: 5px !important;
}

.card .card-block p {
  line-height: 25px;
}

.m-b-10 {
  margin-bottom: 10px;
}

.text-muted {
  color: #919aa3 !important;
}

.b-b-default {
  border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
  font-weight: 600;
}

.m-b-20 {
  margin-bottom: 20px;
}

/* .m-t-40 {
  margin-top: 20px;
} */

.p-b-5 {
  padding-bottom: 5px !important;
}

.m-b-10 {
  margin-bottom: 10px;
}

/* .m-t-40 {
  margin-top: 20px;
} */

.user-card-full .social-link li {
  display: inline-block;
}

.user-card-full .social-link li a {
  font-size: 20px;
  margin: 0 10px 0 0;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
</style>

<script>
import Swal from "sweetalert2/dist/sweetalert2.js";

import "sweetalert2/src/sweetalert2.scss";
export default {
  data() {
    return {
      switch2: true,
      switch3: true,
      profile: {
        name: "",
        email: "",
        password: "",
        fonction: "Admin",
        tele: ""
      },
      editprofil: {
        id: "",
        name: "",
        email: "",
        password: "",
        oldpassword: "",
        fonction: "",
        tele: ""
      },
      admins: {},
      errors: {},
      infoadminauth: {},
      popupActivoEdit: false
    };
  },
  methods: {
    AddAdmin() {
      axios
        .post("/addadmin", this.profile)
        .then(response => {
          if (response.data["stats"] == "succsus") {
            let color = `success`;

            this.$vs.notify({
              title: "success",
              text: "l'administrateur a été enregistré",
              color: color
            });
            this.openLoading();
            this.GetAdmin();
            this.profile.name = "";
            this.profile.email = "";
            this.profile.password = "";
          } else {
            // this.errors = response.data[errors];
          }
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
            let color = `danger`;

            this.$vs.notify({
              title: "Error",
              text: "Les données fournies sont invalides.",
              color: color
            });
          }
        });
    },
    GetAdmin(page = 1) {
      axios
        .get("/getadmins?page=" + page)
        .then(response => {
          if (response.data["status"] == "succsus") {
            this.admins = response.data["admins"];
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    openLoading() {
      this.$vs.loading();
      setTimeout(() => {
        this.$vs.loading.close();
      }, 300);
    },
    DeleteAdmin(item) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
      });

      swalWithBootstrapButtons
        .fire({
          title: "Êtes-vous sûr?",
          text: "Vous ne pourrez pas revenir en arrière !",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Oui, supprimez-le !",
          cancelButtonText: "Non, annulez !",
          reverseButtons: true
        })
        .then(result => {
          if (result.isConfirmed) {
            axios
              .delete("/deleteadmin/" + item.id)
              .then(response => {
                if (response.data["status"] == "success") {
                  let color = `success`;
                  swalWithBootstrapButtons.fire(
                    "Supprimé !",
                    "Votre Annonce a été supprimé.",
                    "success"
                  );
                  this.openLoading();
                  this.GetAdmin();
                }
              })
              .catch(error => {});
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Annulé",
              "Votre annonce imaginaire est en sécurité :)",
              "error"
            );
          }
        });
    },

    EditAdmin(item) {
      this.popupActivoEdit = true;
      this.editprofil.id = item.id;
      this.editprofil.name = item.name;
      this.editprofil.email = item.email;
      this.editprofil.tele = item.tele;

      this.editprofil.fonction = item.fonctiontype;
    },
    UpdateAdmin() {
      axios
        .put("/updateadmin/" + this.editprofil.id, this.editprofil)
        .then(response => {
          if (response.data["status"] == "error") {
            let color = `danger`;
            this.$vs.notify({
              title: "Error",
              text: response.data["msg"],
              color: color
            });
          } else {
            this.openLoading();
            this.GetAdmin();
            let color = `success`;

            this.$vs.notify({
              title: "success",
              text: "l'administrateur a été modifié",
              color: color
            });

            this.popupActivoEdit = false;
          }
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;

            let color = `danger`;

            this.$vs.notify({
              title: "Error",
              text: "Les données fournies sont invalides.",
              color: color
            });
          }
        });
    },
    InfoAdmin() {
      axios
        .get("/adminauth0")
        .then(response => {
          if (response.data["status"] == "success") {
            this.infoadminauth = response.data["infoadminauth"];
          }
        })
        .catch(error => {});
    }
  },
  created() {
    this.GetAdmin();
    this.openLoading();
    this.InfoAdmin();
  }
};
</script>