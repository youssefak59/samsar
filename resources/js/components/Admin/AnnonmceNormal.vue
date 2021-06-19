<template>
  <div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="float-left">
              <h4 class="card-title">Annonces Normal</h4>
            </div>

            <div class="float-right mt-0">
              <vs-input
                icon-no-border
                icon="search"
                color="black"
                label-placeholder="Recherche par Id"
                v-model="Id_recherche"
                @keyup="ViewAnnonce"
              />
            </div>
          </div>
          <!-- {{ annonces["data"].length }} -->
          <div class="card-body">
            <div v-if="annonces['total']==0">
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
                  <th>Type</th>
                  <th class="d-flex justify-content-center">Action</th>
                </thead>
                <tbody>
                  <tr v-for="(item,key) in annonces.data" :key="key">
                    <td v-if="item.index==1">
                      <img width="40px" :src="'/storage/'+item.path" alt srcset>
                    </td>

                    <td v-if="item.index==1">{{ item.titre.substring(0,37) }} ...</td>
                    <td v-if="item.index==1">{{ item.Transaction }}</td>
                    <td class="text-primary" v-if="item.index==1">{{ item.Type_bien }}</td>
                    <td v-if="item.index==1">{{ item.ville }}</td>
                    <td v-if="item.index==1">
                      <b>Normal</b>
                    </td>
                    <td class="text-primary d-flex justify-content-center" v-if="item.index==1">
                      <vs-button
                        color="primary"
                        type="border"
                        class="mr-2"
                        @click="viewAnnoncePage(item)"
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
                  <pagination :data="annonces" @pagination-change-page="GetAnnonceNormal"></pagination>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
</style>

<script>
import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/src/sweetalert2.scss";
export default {
  data() {
    return {
      annonces: {},
      Id_recherche: ""
    };
  },
  methods: {
    GetAnnonceNormal(page = 1) {
      axios.get("/api/allannonce?page=" + page).then(response => {
        if (response.data["status"] == "sucssus") {
          this.annonces = response.data["allannonce"];
        }
      });
    },
    openLoading() {
      this.$vs.loading();
      setTimeout(() => {
        this.$vs.loading.close();
      }, 300);
    },
    ViewAnnonce(page = 1) {
      if (this.Id_recherche == "") {
        axios.get("/api/allannonce?page=" + page).then(response => {
          if (response.data["status"] == "sucssus") {
            this.annonces = {};
            this.annonces = response.data["allannonce"];
          }
        });
      } else {
        axios
          .get("/api/getannoncebyid/" + this.Id_recherche)
          .then(response => {
            if (response.data["sttaus"] == "succsus") {
              this.annonces = {};
              this.annonces = response.data["annoncebyid"];
            }
          })
          .catch();
      }
    },
    viewAnnoncePage(item) {
      window.open(
        "/view/" +
          item.id +
          "/?ville=" +
          item.ville +
          "&type=" +
          item.Type_bien +
          "&transaction=" +
          item.Transaction,
        "_blank"
      );
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
                this.GetAnnonceNormal();
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
  created() {
    this.GetAnnonceNormal();
    this.openLoading();
  }
};
</script>