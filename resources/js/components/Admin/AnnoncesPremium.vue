<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Annonces Premium</h4>
          </div>
          <div class="card-body">
            <div v-if="annoncePremium['total']==0">
              <div class="d-flex justify-content-center">
                <vs-alert
                  color="danger"
                  icon="new_releases"
                  class="mb-3 d-flex justify-content-center"
                >
                  <span>
                    <b>Aucun</b> Resultat
                  </span>
                </vs-alert>
              </div>
            </div>
            <div v-else class="table-responsive">
              <table class="table">
                <thead class="text-primary">
                  <th>Image</th>
                  <th>Titre</th>
                  <th>Transaction</th>
                  <th>Type de bien</th>
                  <th>Ville</th>
                  <th>Status</th>
                  <th class="d-flex justify-content-center">Action</th>
                </thead>
                <tbody>
                  <tr v-for="(item,key) in annoncePremium.data" :key="key">
                    <td v-if="item.index==1">
                      <img width="40px" :src="'/storage/'+item.path" alt srcset>
                    </td>

                    <td v-if="item.index==1">{{ item.titre.substring(0,37) }} ...</td>
                    <td v-if="item.index==1">{{ item.Transaction }}</td>
                    <td class="text-primary" v-if="item.index==1">{{ item.Type_bien }}</td>
                    <td v-if="item.index==1">{{ item.ville }}</td>
                    <td v-if="item.index==1">
                      <vs-switch
                        color="success"
                        v-model="item.switchpremium"
                        @click="ActiverAnnonce(item.switchpremium,item.id_annonce)"
                      >
                        <span slot="on">On</span>
                        <span slot="off">Off</span>
                      </vs-switch>
                    </td>
                    <td class="text-primary d-flex justify-content-center" v-if="item.index==1">
                      <vs-button
                        color="primary"
                        type="border"
                        class="mr-2"
                        @click="GetInfoAnnonce(item)"
                        icon="visibility"
                      ></vs-button>
                      <vs-button
                        color="danger"
                        @click="DeleteAnnonce(item)"
                        type="border"
                        icon="delete"
                      ></vs-button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="col-12 mt-4">
                <div class="d-flex justify-content-center">
                  <pagination :data="annoncePremium" @pagination-change-page="GetAnnoncePremium"></pagination>
                </div>
              </div>
              <vs-popup
                class="holamundo"
                :title="InfoannoncePremium.titre"
                :active.sync="popupActivo"
              >
                <!-- <p>{{ InfoannoncePremium }}</p> -->
                <div class="d-flex justify-content-center">
                  <vs-row>
                    <vs-col type="flex" vs-justify="right" vs-align="right" vs-lg="12">
                      <a href="#" class v-if="InfoannoncePremium.index==1">
                        <div class="img-wrap">
                          <img class="img" :src="'/storage/'+InfoannoncePremium.path">
                        </div>

                        <figcaption class="info-wrap">
                          <div class="float-right">
                            <vs-switch
                              color="success"
                              v-model="InfoannoncePremium.switchpremium"
                              @click="ActiverAnnonce(InfoannoncePremium.switchpremium,InfoannoncePremium.id_annonce)"
                            >
                              <span slot="on">On</span>
                              <span slot="off">Off</span>
                            </vs-switch>
                          </div>
                          <h3>
                            <b>{{ InfoannoncePremium.prix }} DH</b>
                          </h3>

                          <!-- <p class="title text-truncate">J{{ InfoannoncePremium.titre }}</p> -->
                          <div class>
                            <i class="fas fa-map-marker-alt"></i>
                            <small class="text-muted mr-2">{{ InfoannoncePremium.region }}</small>
                            <small class="label-rating text-success">
                              <i class="fa fa-clipboard-check"></i>
                              {{ InfoannoncePremium.ville }}
                            </small>
                          </div>
                          <div class="price mt-2">
                            <small
                              class="text-muted"
                            >{{ InfoannoncePremium.Type_bien }} , {{ InfoannoncePremium.Transaction }}</small>
                            <span class="float-right flag">
                              <i class="fas fa-tag fa-xs fa-rotate-90"></i>
                              <span class="title-flag">PREMIUM</span>
                            </span>
                          </div>

                          <!-- price-wrap.// -->
                        </figcaption>
                      </a>
                    </vs-col>
                  </vs-row>
                </div>
              </vs-popup>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/src/sweetalert2.scss";
export default {
  data() {
    return {
      annoncePremium: {},
      popupActivo: false,
      execute: false,
      InfoannoncePremium: [],
      countPremium: 0
    };
  },

  methods: {
    GetAnnoncePremium(page = 1) {
      axios.get("/api/annoncepremium?page=" + page).then(response => {
        if (response.data["status"] == "succsus") {
          this.annoncePremium = response.data["annoncepremium"];
          this.countPremium = response.data["countPremium"];
        }
      });
    },
    GetInfoAnnonce(item) {
      this.InfoannoncePremium = item;
      this.popupActivo = true;
    },
    ActiverAnnonce(bollswitch, id_annonce) {
      axios
        .put("/api/activeannonce", {
          switch: !bollswitch,
          id: id_annonce
        })
        .then(response => {})
        .catch(error => {});
    },
    openLoading() {
      this.$vs.loading();
      setTimeout(() => {
        this.$vs.loading.close();
      }, 300);
    },
    DeleteAnnonce(item) {
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
            axios.delete("/api/deleteannonce/" + item.id).then(response => {
              if (response.data["status"] == "succsus") {
                this.GetAnnoncePremium();
                swalWithBootstrapButtons.fire(
                  "Supprimé !",
                  "Votre Annonce a été supprimé.",
                  "success"
                );
              } else {
                swalWithBootstrapButtons.fire(
                  "Annulé",
                  "Votre annonce imaginaire est en sécurité :)",
                  "error"
                );
              }
            });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
            );
          }
        });
      //   Swal.fire("Good job!", "You clicked the button!", "success");
    }
  },
  mounted() {},

  created() {
    this.GetAnnoncePremium();
    this.openLoading();
  }
};
</script>