<template>
  <div class="container">
    <vs-row v-if="annonces.length!=0">
      <vs-breadcrumb align="left">
        <li>
          <i class="fas fa-home"></i>
          <a href="#" title="Home">Accueil</a>
          <span class="vs-breadcrum--separator">/</span>
        </li>
        <li>
          <a href="#" title="Profil">{{ annonces[0].Type_bien }}</a>
          <span class="vs-breadcrum--separator">/</span>
        </li>
        <li aria-current="page" class="active">{{ annonces[0].Transaction }}</li>
      </vs-breadcrumb>
    </vs-row>
    <vs-row vs-justify="center">
      <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="10" vs-sm="12">
        <vs-card>
          <div>
            <vs-row vs-justify="center">
              <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="3" vs-sm="12">
                <div class="con-select-example">
                  <vs-select
                    class="selectExample"
                    label="Region"
                    v-model="regionid"
                    @change="GetVille(regionid)"
                    placeholder="Choisir region"
                  >
                    <vs-select-item
                      :key="index"
                      :value="item.region"
                      :text="item.region"
                      label="Ville"
                      v-for="(item,index) in region"
                    />
                  </vs-select>
                </div>
              </vs-col>
              <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="3" vs-sm="12">
                <div class="con-select-example">
                  <vs-select
                    class="selectExample"
                    label="Ville"
                    v-model="villeid"
                    placeholder="Tout le maroc"
                  >
                    <vs-select-item
                      :key="index"
                      :value="item.ville"
                      :text="item.ville"
                      label="Ville"
                      v-for="(item,index) in ville"
                    />
                  </vs-select>
                </div>
              </vs-col>
              <vs-col type="flex" vs-justify="center" vs-align="center" vs-sm="12" vs-w="3">
                <div class="con-select-example">
                  <vs-select
                    class="selectExample"
                    label="Type de bien"
                    v-model="typebien"
                    placeholder="Appartements"
                  >
                    <vs-select-item value="Appartements" text="Appartements" label="Appartements"/>
                    <vs-select-item value="Maisons" text="Maisons" label="Maisons"/>
                    <vs-select-item
                      value="Villas & maisons de luxe"
                      text="Villas & maisons de luxe"
                      label="Villas & maisons de luxe"
                    />
                    <vs-select-item value="Riad" text="Riad" label="Riad"/>
                    <vs-select-item
                      value="Locaux commerciaux"
                      text="Locaux commerciaux"
                      label="Locaux commerciaux"
                    />
                    <vs-select-item value="Bureaux" text="Bureaux" label="Bureaux"/>
                    <vs-select-item value="Terrains" text="Terrains" label="Terrains"/>
                    <vs-select-item value="Fermes" text="Fermes" label="Fermes"/>
                  </vs-select>
                </div>
              </vs-col>
              <vs-col type="flex" vs-justify="center" vs-align="center" vs-sm="12" vs-w="3">
                <div class="con-select-example">
                  <vs-select
                    class="selectExample"
                    v-model="transaction"
                    label="Transaction"
                    placeholder="Location"
                  >
                    <vs-select-item value="Vente" text="Vente" label="Vente"/>
                    <vs-select-item value="Location" text="Location" label="Location"/>
                    <vs-select-item
                      value="Location Vacances"
                      text="Location Vacances"
                      label="Location Vacances"
                    />
                  </vs-select>
                </div>
              </vs-col>
            </vs-row>
          </div>
          <div slot="footer">
            <vs-row vs-justify="flex-end">
              <!-- <button type="button" @click="recherche">recherche</button> -->
              <router-link
                :to="{ path: '/transaction='+this.transaction+'&'+this.typebien} "
                replace
              >
                <vs-button color="primary" @click="Recherche" icon="search"></vs-button>
              </router-link>
            </vs-row>
          </div>
        </vs-card>
      </vs-col>
    </vs-row>
    <vs-alert color="danger" icon="new_releases" class="mb-3" v-if="invalid">
      <span>
        <b>Aucun</b> Resultat
      </span>
    </vs-alert>
    <div class="centerx example-loading" v-if="annonces.length!=0">
      <div class="fill-row-loading">
        <div
          :class="{'activeLoading':activeLoading}"
          type="default"
          class="vs-con-loading__container loading-example"
        >
          <div class="row">
            <div class="col-lg-8">
              <vs-row class="mb-3">
                <vs-col type="flex" vs-justify="right" vs-align="right" vs-lg="12">
                  <div class="card sticky-top">
                    <div class="card-body p-2">
                      <div class="card-titl d-flex justify-content-center float-left">
                        <span>&nbsp; {{ annonces[0].Type_bien }} à {{ annonces[0].ville }} (19131 annonces)</span>
                      </div>
                    </div>
                  </div>
                </vs-col>
              </vs-row>
              <vs-row>
                <vs-col
                  v-for="(item,key) in annonces"
                  :key="key"
                  type="flex"
                  vs-justify="center"
                  vs-align="center"
                  vs-sm="12"
                  vs-lg="12"
                >
                  <a
                    :href="'/view/'+item.id+'/?ville='+item.ville+'&type='+item.Type_bien+'&transaction='+item.Transaction"
                    class="card card-product-grid"
                    v-if="item.index==1"
                  >
                    <div class>
                      <div class="row">
                        <aside class="col-sm-4 m-0">
                          <!-- <img :src="'/storage/'+item.path" alt srcset> -->
                          <a
                            :href="'/view/'+item.id+'/?ville='+item.ville+'&type='+item.Type_bien+'&transaction='+item.Transaction"
                            class="img-wrap"
                          >
                            <img class="imgapp" :src="'/storage/'+item.path">
                            <!--  -->
                          </a>
                        </aside>
                        <!-- col.// -->
                        <article class="col-sm-7 info-card">
                          <div class="mb-5 mt-4">
                            <span class="float-right heart">
                              <i class="far fa-heart"></i>
                            </span>
                            <div class="price-wrap mt-2">
                              <!-- <i class="fas fa-heart float-right heart"></i> -->
                              <span class="price h5">{{ item.prix }} DH</span>
                            </div>
                            <span class>{{ item.titre }}</span>
                            <!-- <a
                              :href="'/view/'+item.id+'/?ville='+item.ville+'&type='+item.Type_bien+'&transaction='+item.Transaction"
                              class="title mt-2 h5"
                            ></a>-->
                          </div>
                          <div class="bottom mt-4 ti-tle">
                            <small
                              class="text-muted mb-1"
                            >{{ item.Type_bien }} , {{ item.Transaction }}</small>
                            <vs-divider class="mb-1 mt-1"></vs-divider>

                            <small class="text-muted">
                              <i class="fas fa-clock"></i>
                              {{ item.created_at }}&nbsp;
                              <i
                                class="fas fa-map-marker-alt"
                              ></i>
                              {{ item.ville }}
                            </small>
                            <!-- <span class="lbl2 float-right">
                              <i class="fas fa-poll fa-sm"></i>
                            </span>-->
                          </div>
                        </article>
                        <!-- col.// -->
                        <!-- <aside class="col-sm-3">
                          <div class="price-wrap mt-2">
                            <span class="price h5">{{ item.prix }} DH</span>
                          </div>
                          <p class="small text-success">{{ item.Transaction }}</p>
                          <br>
                          <p>
                            <br>
                            <a
                              :href="'/view/'+item.id+'/?ville='+item.ville+'&type='+item.Type_bien+'&transaction='+item.Transaction"
                              class="btn btn-info"
                            >Contacter</a>
                          </p>
                        </aside>-->
                        <!-- col.// -->
                      </div>

                      <!-- row.// -->
                    </div>
                    <!-- card-body .// -->
                  </a>
                </vs-col>
              </vs-row>
            </div>
            <div class="col-lg-4">
              <vs-row class="mb-3">
                <vs-col type="flex" vs-justify="right" vs-align="right" vs-lg="12">
                  <!-- card.// -->
                  <div class="card sticky-top">
                    <div class="card-body p-2">
                      <div class="card-titl d-flex justify-content-center">
                        <!-- <i class="fas fa-tag fa-rotate-270"></i> -->
                        <i class="fas fa-tag fa-rotate-90"></i>
                        <span>&nbsp; ANNONCES PREMIUM</span>
                      </div>
                    </div>
                  </div>
                  <!-- card.// -->
                </vs-col>
              </vs-row>
              <vs-popup
                class="holamundo"
                title="Lorem ipsum dolor sit amet"
                :active.sync="popupActivo"
              >
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </vs-popup>
              <vs-row v-if="countpremium==0">
                <vs-col type="flex" vs-justify="right" vs-align="right" vs-lg="12">
                  <!-- card.// -->
                  <div class="card card-product-grid">
                    <p class="text-muted d-flex justify-content-center">
                      <i class="far fa-plus-square fa-10x"></i>
                    </p>
                    <figcaption class="info-wrap">
                      <!-- <p class="title text-truncate">J{{ item.titre }}</p> -->
                      <!-- <small class="text-muted">{{ item.Type_bien }} , {{ item.Transaction }}</small> -->
                      <div class="price mt-2">
                        <span>Aucun annonces premium</span>
                        <span class="float-right flag">
                          <i class="fas fa-tag fa-xs fa-rotate-90"></i>
                          <span class="title-flag">PREMIUM</span>
                        </span>
                      </div>

                      <!-- price-wrap.// -->
                    </figcaption>
                  </div>
                  <!-- card.// -->
                </vs-col>
              </vs-row>
              <vs-row v-else>
                <vs-col
                  type="flex"
                  vs-justify="right"
                  vs-align="right"
                  vs-lg="12"
                  v-for="(item,key) in annoncesPremium"
                  :key="key"
                >
                  <!-- card.// -->
                  <a
                    :href="'/view/'+item.id+'/?ville='+item.ville+'&type='+item.Type_bien+'&transaction='+item.Transaction"
                    class="card card-product-grid"
                    v-if="item.index==1 &&  item.switchpremium==1"
                  >
                    <div class="img-wrap">
                      <img class="img" :src="'/storage/'+item.path">
                    </div>
                    <figcaption class="info-wrap">
                      <p class="title text-truncate">J{{ item.titre }}</p>
                      <small class="text-muted">{{ item.Type_bien }} , {{ item.Transaction }}</small>
                      <div class="price mt-2">
                        {{ item.prix }} DH
                        <span class="float-right flag">
                          <i class="fas fa-tag fa-xs fa-rotate-90"></i>
                          <span class="title-flag">PREMIUM</span>
                        </span>
                      </div>

                      <!-- price-wrap.// -->
                    </figcaption>
                  </a>
                  <!-- card.// -->
                </vs-col>
              </vs-row>
            </div>
          </div>
          <vs-row vs-justify="center">
            <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6">
              <!-- <div>
                <vs-pagination :data="annonces" :total="5"></vs-pagination>
              </div>-->
              <!-- <pagination
                v-if="paginationRech"
                :data="annonces"
                @pagination-change-page="Recherche"
              ></pagination>-->
              <!-- <pagination v-else :data="annonces" @pagination-change-page="GetAnoonceA"></pagination> -->
            </vs-col>
          </vs-row>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
.card-titl {
  font-size: 13px;
  font-weight: bold;
  color: #00b517 !important;
}
.bottom {
  position: absolute;
  bottom: 0;
  width: 100%;
}
/* .img-wrap {
  height: 180px !important;
} */
.lbl2 {
  background-color: #fdba04;
  padding: 0px;
  padding-left: 5px;
  padding-right: 5px;
  color: white;
  border-radius: 20px;
  margin-bottom: 1px;
}
@media only screen and (max-width: 561px) {
  .img-wrap {
    margin: 0px;
    padding: 0px;
    height: 300px auto;
    width: 100%;
  }
  .info-card {
    margin: 10px;
  }
  .lbl2 {
    margin-right: 15px;
  }
  .ti-tle {
    margin-top: 400px;
  }
}
.price {
  color: #2d6bff !important;
}
.heart {
  margin-right: -20px;
}

@media only screen and (max-width: 600px) {
  .heart {
    margin: 0px;
  }
  .imgapp {
    width: 100% !important;
  }
}
.img {
  width: 100% !important;
}
.flag {
  background-color: #fdba04;
  padding: 0px;
  padding-left: 5px;
  padding-right: 5px;
  color: white;
  border-radius: 14px;
}
.title-flag {
  font-size: 12px;
}
</style>

<script>
import "material-icons/iconfont/material-icons.css";
export default {
  data() {
    return {
      currentx: 1,
      paginationRech: false,
      test1: "",
      annonces: {},
      annoncesPremium: [],
      regionid: "",
      villeid: "",
      typebien: "Appartements",
      transaction: "Location",
      invalid: false,
      region: [],
      ville: [],
      typeCount: [],
      activeLoading: false,
      popupActivo: false,
      countpremium: 0
    };
  },
  methods: {
    GetRegion() {
      axios
        .get("/api/getregion")
        .then(response => {
          if (response.data["status"] == "succsess") {
            this.region = response.data["regions"];
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    GetVille() {
      axios
        .get("/api/getville/" + this.regionid)
        .then(response => {
          if (response.data["status"] == "succsus") {
            this.ville = response.data["villes"];
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    Recherche(page = 1) {
      this.annonces = {};

      axios
        .get("/api/getannonce", {
          params: {
            type: this.typebien,
            tran: this.transaction,
            ville: this.villeid,
            region: this.regionid
          }
        })
        .then(response => {
          if (response.data["status"] == "suscuss") {
            if (response.data["alertville"] == true) {
              this.invalid = true;
            } else {
              this.invalid = false;
            }
            if (response.data["alert2"] == true) {
              this.activeLoading = true;
              this.$vs.loading({
                type: "default"
              });

              setTimeout(() => {
                this.activeLoading = false;
                this.$vs.loading.close();
                this.invalid = true;
              }, 800);
            } else if (this.annonces.length == 0) {
              // alert(this.annonces.length);
              this.activeLoading = true;
              this.$vs.loading({
                type: "default"
              });
            }
            this.annonces = response.data["annones"];
            if (this.annonces.length != 0) {
              // alert(this.annonces.length);
              setTimeout(() => {
                this.activeLoading = false;
                this.$vs.loading.close();
              }, 1000);
            }
          }
        })
        .catch(error => {});
    },
    GetAnoonceA(page = 1) {
      this.paginationRech = false;
      this.annonces = {};
      this.annoncesPremium = {};
      axios
        .get("/api/maroc")
        .then(response => {
          if (response.data["status"] == "suscuss") {
            if (this.annonces.length == 0) {
              // alert(this.annonces.length);
              this.activeLoading = true;
              this.$vs.loading({
                type: "default"
              });
            }
            this.annonces = response.data["annones"];
            this.annoncesPremium = response.data["annoncespremium"];
            this.countpremium = response.data["countpremium"];

            if (this.annonces.length != 0) {
              // alert(this.annonces.length);
              setTimeout(() => {
                this.activeLoading = false;
                this.$vs.loading.close();
              }, 1000);
            }
          }
        })
        .catch(error => {
          console.log("hello");
        });
    },
    CountType() {
      axios.get("/api/counttype").then(response => {
        this.typeCount = response.data;
        // console.log(this.typeCount["countApp"]);
      });
    },
    openLoading() {
      this.$vs.loading();
      setTimeout(() => {
        this.$vs.loading.close();
      }, 300);
    }
  },
  mounted() {},
  created() {
    this.openLoading();
    this.GetRegion();
    this.GetAnoonceA();
    this.CountType();
    // setTimeout(() => {
    //   this.activeLoading = false;
    //   this.$vs.loading.close();
    // }, 3000);
  }
};
</script>