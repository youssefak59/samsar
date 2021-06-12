<template>
  <div class="container">
    <vs-breadcrumb class="pb-0" align="left">
      <li>
        <i class="fas fa-home"></i>
        <a href="#" title="Home">Accueil</a>
        <span class="vs-breadcrum--separator">/</span>
      </li>
      <li>
        <a href="#" title="Profil">{{ annonces.region }}</a>
        <span class="vs-breadcrum--separator">/</span>
      </li>
      <li>
        <a href="#" title="Profil">{{ annonces.ville }}</a>
        <span class="vs-breadcrum--separator">/</span>
      </li>
      <li>
        <a href="#" title="Profil">{{ annonces.Type_bien }}</a>
        <span class="vs-breadcrum--separator">/</span>
      </li>
      <li aria-current="page" class="active">{{ annonces.Transaction }}</li>
    </vs-breadcrumb>

    <vs-row vs-justify="center">
      <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="12" vs-sm="12">
        <div class="row mb-2">
          <div class="col-lg-8">
            <div>
              <vs-button @click="BackHome" radius color="dark" type="line" icon="arrow_back"></vs-button>
            </div>
            <div class="float-right">
              <!--  -->
              <a
                :href="'https://www.facebook.com/sharer/sharer.php?u=http://127.0.0.1:8000/view/'+this.id+'/?ville='+annonces.ville+'&type='+annonces.Type_bien+'&transaction='+annonces.Transactions+'#/'"
                class="sharebox"
              >
                <vs-button class="mr-4" radius color="dark" type="line" icon="offline_share"></vs-button>
              </a>
              <a
                :href="'https://wa.me/?text=127.0.0.1:8000/view/'+this.id+'/?ville='+annonces.ville+'&type='+annonces.Type_bien+'&transaction='+annonces.Transactions+'#//fr-fr/optional-extras%2F'"
              >
                <vs-button radius color="dark" type="line" icon="perm_phone_msg"></vs-button>
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li
                    height="500px"
                    data-target="#carouselExampleIndicators"
                    v-for="(item,index) in images"
                    :key="index"
                    :data-slide-to="item.index"
                  ></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img
                      class="d-block img-view w-100"
                      :src="'/storage/'+images[0].path"
                      alt="First slide"
                    >
                  </div>
                  <div class="carousel-item" v-for="(item,index) in images" :key="index">
                    <img class="d-block img-view w-100" :src="'/storage/'+item.path">
                  </div>
                </div>
                <a
                  class="carousel-control-prev"
                  href="#carouselExampleIndicators"
                  role="button"
                  data-slide="prev"
                >
                  <span class>
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  </span>

                  <span class="sr-only">Previous</span>
                </a>
                <a
                  class="carousel-control-next"
                  href="#carouselExampleIndicators"
                  role="button"
                  data-slide="next"
                >
                  <span class>
                    <span class="carousel-control-next-icon m-1 mb-0" aria-hidden="true"></span>
                    <!-- <i class="far fa-arrow-alt-circle-right"></i> -->
                    <!-- <i class="fas fa-arrow-circle-right "></i> -->
                  </span>

                  <span class="sr-only">Next</span>
                </a>
              </div>
              <!-- gallery-wrap .end// -->
            </div>
          </div>
          <div class="col-lg-3">
            <div class="text-center card contact">
              <div class="pt-2 pb-2">
                <div>
                  <div class="thumb-lg member-thumb mx-auto mb-3">
                    <!-- <vs-avatar size="large"/> -->
                    <span class="icon icon-md rounded-circle border border-primary">
                      <i class="fa fa-user text-primary"></i>
                    </span>
                  </div>
                  <span class="lbl">
                    <i class="fas fa-poll"></i>
                    BOUTIQUE
                  </span>
                  <div class="mt-2">
                    <h5>Vip Services</h5>

                    <vs-button class="mt-3" @click="popupActivo=true" color="primary">
                      <i class="fas fa-phone-alt"></i>
                      <span class="text">AFFICHER LE NUMÉRO</span>
                    </vs-button>
                    <vs-button
                      class="mt-2"
                      @click="popupActivo2=true"
                      color="primary"
                      type="border"
                    >
                      <i class="fas fa-comments"></i>
                      <span class="text">CHAT</span>
                    </vs-button>
                    <!-- modal -->
                    <vs-popup
                      class="holamundo"
                      title="Envoyer un message à « Vip Services »"
                      :active.sync="popupActivo2"
                    >
                      <div class="con-exemple-prompt">
                        <div class="row mt-3 d-flex justify-content-center">
                          <div class="col-lg-10">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                  <i class="fas fa-user-circle"></i>
                                </span>
                              </div>
                              <input
                                type="text"
                                v-model="contact.name"
                                placeholder="Nom et prénom"
                                class="form-control"
                              >
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                  <i class="fas fa-phone-alt"></i>
                                </span>
                              </div>
                              <input
                                type="text"
                                v-model="contact.tele"
                                class="form-control"
                                placeholder="Tele"
                                aria-label="Tele"
                                aria-describedby="basic-addon1"
                              >
                            </div>
                            <div class="form-group">
                              <label>Description</label>
                              <textarea
                                class="form-control"
                                id="exampleFormControlTextarea1"
                                placeholder="ecrire votre message ici"
                                rows="3"
                                v-model="contact.msg"
                              ></textarea>
                              <small
                                class="form-text text-muted"
                              >Le caractère maximum est de 250 lettres</small>
                            </div>
                          </div>
                        </div>
                        <vs-button
                          @click="SendMsg"
                          color="primary"
                          class="float-right"
                          type="border"
                        >Envoyer un message</vs-button>
                      </div>
                    </vs-popup>

                    <div class="mt-4">
                      <i class="fas fa-calendar-week"></i>
                      <span>&nbsp;Sur Samsar Depuis 2020</span>
                    </div>

                    <div class="mt-3">
                      <i class="fas fa-globe"></i>
                      <span>
                        <a
                          href="http://vip-services.ma"
                          class="text-pink"
                        >&nbsp;http://vip-services.ma</a>
                      </span>
                    </div>
                    <div class="mt-3">
                      <i class="fas fa-map-marker-alt"></i>

                      <span>&nbsp;Fes centre ville</span>
                    </div>

                    <div class="centerx">
                      <vs-popup title="Vip Services" :active.sync="popupActivo">
                        <vs-row>
                          <vs-col
                            vs-offset="2"
                            vs-type="flex"
                            vs-justify="center"
                            vs-align="center"
                            vs-w="8"
                          >
                            <img src="/images/tele.png" width="350px" alt srcset>
                          </vs-col>
                        </vs-row>
                        <vs-row>
                          <vs-col
                            vs-offset="2"
                            vs-type="flex"
                            vs-justify="center"
                            vs-align="center"
                            vs-w="8"
                          >
                            <b>Attention !</b>
                          </vs-col>
                        </vs-row>
                        <vs-row>
                          <vs-col
                            vs-offset="2"
                            vs-type="flex"
                            vs-justify="center"
                            vs-align="center"
                            vs-w="8"
                          >
                            <span
                              class="mt-3"
                            >Il ne faut jamais envoyer de l’argent à l’avance au vendeur par virement bancaire ou à travers une agence de transfert d’argent lors de l’achat des biens disponibles sur le site.</span>
                          </vs-col>
                        </vs-row>
                        <vs-row>
                          <vs-col
                            vs-offset="2"
                            vs-type="flex"
                            vs-justify="center"
                            vs-align="center"
                            vs-w="8"
                          >
                            <b class="mt-3">Appeler Vip Services</b>
                          </vs-col>
                        </vs-row>
                        <vs-row>
                          <vs-col
                            vs-offset="2"
                            vs-type="flex"
                            vs-justify="center"
                            vs-align="center"
                            vs-w="8"
                          >
                            <vs-button color="primary" class="mt-4" type="border">
                              <i class="fas fa-phone-alt"></i>
                              <span class="text">
                                &nbsp;
                                <a :href="'tel::'+annonces.tele">{{ annonces.tele }}</a>
                              </span>
                            </vs-button>
                          </vs-col>
                        </vs-row>
                      </vs-popup>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- col.// -->

          <!-- row.// -->
        </div>
        <!-- card.// -->
        <div class="row">
          <main class="col-lg-8">
            <div class="card">
              <article class="content-body">
                <h5 class="title">{{ annonces.titre }}</h5>

                <div class="my-3">
                  <i class="fas fa-map-marker-alt"></i>
                  <small class="text-muted">{{ annonces.region }}</small>
                  <small class="label-rating text-success">
                    <i class="fa fa-clipboard-check"></i>
                    {{ annonces.ville }}
                  </small>
                </div>
                <!-- rating-wrap.// -->

                <div class="mb-3">
                  <var class="price h4">{{ annonces.prix }}</var>
                  <span class="text-muted">/DH</span>
                  <br>
                </div>
                <div class="row mb-4">
                  <div class="col-lg-4 d-flex justify-content-center">
                    <table>
                      <tr>
                        <i class="fas fa-compress-arrows-alt fa-2x"></i>
                      </tr>
                      <tr>
                        <td class="d-flex justify-content-center">
                          <p>{{ annonces.surface }} m²</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-4 d-flex justify-content-center">
                    <table>
                      <tr>
                        <i class="fas fa-couch fa-2x"></i>
                      </tr>
                      <tr>
                        <td class="d-flex justify-content-center">
                          <p>{{ annonces.chambres }}</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-4 d-flex justify-content-center">
                    <table class>
                      <tr>
                        <i class="fas fa-shower fa-2x"></i>
                      </tr>
                      <tr class>
                        <td>
                          <p class>{{ annonces.salles }}</p>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="table-responsive mb-4">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Type</td>
                        <td>
                          <b>{{ annonces.Type_bien }},{{annonces.Transaction}}</b>
                        </td>
                        <td>Étage</td>
                        <td>
                          <b>{{ annonces.etage }}</b>
                        </td>
                      </tr>
                      <tr>
                        <td>ville</td>
                        <td>
                          <b>{{annonces.ville}}</b>
                        </td>
                        <td>Etat</td>
                        <td>
                          <b>{{ annonces.Etat }}</b>
                        </td>
                      </tr>
                      <tr>
                        <td>Salles</td>
                        <td>
                          <b>{{annonces.salles}}</b>
                        </td>
                        <td>Chambres</td>
                        <td>
                          <b>{{annonces.chambres}}</b>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <!-- price-detail-wrap .// -->
                <h5>Description</h5>
                <p>{{ annonces.description }}</p>
                <hr>
                <h5>Équipements</h5>
                <span>
                  <i class="fas fa-check"></i>
                </span>
                <span>{{ annonces.Caracteristiques }},</span>
                <span>{{ annonces.Interieur }},</span>
                <span>{{ annonces.Options }}</span>
              </article>
              <!-- product-info-aside .// -->
            </div>
          </main>
        </div>
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="m-3">
                <div class="icontext align-items-start mr-4" style="max-width: 300px;">
                  <span class="icon icon-md rounded-circle border border-primary">
                    <i class="fa fa-user text-primary"></i>
                  </span>
                  <div class="text mt-2">
                    <span class="lbl">
                      <i class="fas fa-poll"></i>
                      BOUTIQUE
                    </span>
                    <h6 class="title mt-2">Vip Services</h6>
                  </div>
                </div>
                <div class="float-right">
                  <vs-button class="mt-3" @click="popupActivo=true" color="primary">
                    <i class="fas fa-phone-alt"></i>
                    <span class="text">AFFICHER LE NUMÉRO</span>
                  </vs-button>
                  <vs-button
                    class="mt-2 ml-2"
                    @click="popupActivo2=true"
                    color="primary"
                    type="border"
                  >
                    <i class="fas fa-comments"></i>
                    <span class="text">CHAT</span>
                  </vs-button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-4">
            <div>
              <b>Autres annonces</b>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="float-right">
              <a href="/fr/maroc#/">
                Voir plus
                <i class="fas fa-angle-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-8">
            <div class="container-fluid scrollmenu">
              <div class="row flex-row flex-nowrap">
                <div v-for="(item,key) in suggestion" :key="key" class="mr-1 ml-1">
                  <a
                    v-if="item.index==1"
                    :href="'/view/'+item.id+'/?ville='+item.ville+'&type='+item.Type_bien+'&transaction='+item.Transaction"
                    class="card card-product-grid"
                  >
                    <div class="img-wrap" v-if="item.index==1">
                      <img class="imgSUG" :src="'/storage/'+item.path">
                    </div>
                    <figcaption class="info-wrap" v-if="item.index==1">
                      <div class="price mt-2">{{ item.prix }} DH</div>
                      <small class="text-muted">{{ item.Transaction }}, {{ item.Type_bien }}</small>
                      <p class="title text-truncate">{{ item.titre.substring(0,15) }} ...</p>
                      <!-- price-wrap.// -->
                    </figcaption>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </vs-col>
    </vs-row>
  </div>
</template>
<style>
.lbl {
  background-color: #fdba04;
  padding: 1px;
  padding-left: 5px;
  padding-right: 5px;
  color: white;
  border-radius: 14px;
}
@media only screen and (max-width: 992px) {
  .contact {
    display: none;
  }
}
.card-block {
  min-height: 220px;
}
div.scrollmenu {
  overflow: auto;
  white-space: nowrap;
}
.img-view {
  height: 470px;
}
.rotate {
  background-color: #6b6b6b2e;
  padding: 1px;

  /* padding-left: 10px;   */
  /* padding-right: 10px;  */
  /* padding-bottom: 10px; */
  /* padding-top: 10px;    */
  /* border-radius: 14px;  */
}

/* .imgSUG { */
/* width: 20px !important; */
/* } */
</style>

<script>
export default {
  props: ["id"],
  data() {
    return {
      popupActivo: false,
      popupActivo2: false,
      name: "",
      images: {},
      annonces: {},
      suggestion: {},
      contact: {
        name: "",
        tele: "",
        msg: ""
      }
    };
  },
  methods: {
    GetArticle() {
      axios
        .get("/api/getarticleview/" + this.id)
        .then(response => {
          if (response.data["status"] == "suscuss") {
            this.images = response.data["images"];
            this.annonces = response.data["annones"];
          }
        })
        .catch();
    },
    SendMsg() {
      axios
        .post("/api/sendmsg/" + this.annonces.id, this.contact)
        .then(response => {
          if (response.data["status"] == "succsus") {
            let color = `success`;

            this.$vs.notify({
              title: "Message",
              text: "Message envoyé",
              color: color
            });
          } else {
            let color = `danger`;

            this.$vs.notify({
              title: "Error",
              text: "Remplir formulaire",
              color: color
            });
          }
        })
        .catch(error => {
          if (error.response.status == 422) {
            let color = `danger`;

            this.$vs.notify({
              title: "Error",
              text: "Remplir formulaire",
              color: color
            });
          }
        });
    },
    Getsuggestion() {
      axios
        .get("/api/suggestion", {
          params: {
            id: this.id
          }
        })
        .then(response => {
          if (response.data["status"] == "succsus") {
            this.suggestion = response.data["suggestion"];
          }
        })
        .catch(error => {});
    },
    BackHome() {
      window.location.href = "/fr/maroc#/";
    }
  },
  created() {
    // alert(this.id);
    this.GetArticle();
    this.Getsuggestion();
  }
};
</script>