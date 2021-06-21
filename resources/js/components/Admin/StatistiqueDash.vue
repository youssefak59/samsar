<template>
  <div>
    <div class="container-fluid">
      <!-- <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
      </div>-->
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <span class="material-icons 24dp">article</span>
              </div>
              <p class="card-category">Annonces Normal</p>

              <h3 class="card-title">{{countInfo["countAnnonce"]}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <!-- <i class="material-icons text-danger">warning</i>
                <a href="javascript:;">Get More Space...</a>-->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <span class="material-icons">bookmarks</span>
              </div>
              <p class="card-category">Annonces Premium</p>
              <h3 class="card-title">{{countInfo["countPremium"]}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <!-- <i class="material-icons">local_offer</i> Tracked from Github -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <span class="material-icons">mark_email_unread</span>
              </div>
              <p class="card-category">Messages Done</p>
              <h3 class="card-title">{{ countInfo["CountMsgNotDone"] }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <!-- <i class="material-icons">date_range</i>
                Last 24 Hours-->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <span class="material-icons">mark_email_read</span>
              </div>
              <p class="card-category">Messages Valider</p>
              <h3 class="card-title">{{ countInfo["CountMsgDone"] }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <!-- <i class="material-icons">update</i> Just Updated -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <span class="nav-tabs-title">Tâches :</span>
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="far fa-envelope"></i> Messages
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="fas fa-envelope-open-text"></i> Message done
                        <div class="ripple-container"></div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active overflow-msg" id="profile">
                  <table class="table">
                    <tbody>
                      <tr v-for="(item,index) in messages" :key="index">
                        <td v-if="item.done==0">
                          <div class="form-check">
                            <vs-switch color="success" v-model="item.done" disabled>
                              <span slot="on">Validé</span>
                              <span slot="off">Non Validé</span>
                            </vs-switch>
                          </div>
                        </td>
                        <td v-if="item.done==0">{{ item.msg.substring(0,40) }}</td>
                        <td class="td-actions text-right" v-if="item.done==0">
                          <vs-button
                            radius
                            @click="GetMsgUser(item)"
                            color="primary"
                            type="flat"
                            icon="visibility"
                          ></vs-button>

                          <vs-button
                            @click="Done(item)"
                            radius
                            color="success"
                            type="flat"
                            icon="done"
                          ></vs-button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div class="tab-pane overflow-msg" id="messages">
                  <table class="table">
                    <tbody>
                      <tr v-for="(item,index) in messages" :key="index">
                        <td v-if="item.done==true">
                          <div class="form-check">
                            <vs-switch color="success" v-model="item.done" disabled>
                              <span slot="on">Validé</span>
                              <span slot="off">Non Validé</span>
                            </vs-switch>
                          </div>
                        </td>
                        <td v-if="item.done==true">{{ item.msg.substring(0,40) }}</td>
                        <td v-if="item.done==true" class="td-actions text-right">
                          <vs-button
                            radius
                            @click="GetMsgUser(item)"
                            color="primary"
                            type="flat"
                            icon="visibility"
                          ></vs-button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Messages</h4>
              <p class="card-category">Annonce Premium</p>
            </div>

            <div class="card-body table-responsive">
              <div class="tab-pane active overflow-msg" id="profile">
                <table class="table">
                  <tbody>
                    <tr v-for="(item,index) in mgsPremium" :key="index">
                      <td>
                        <div class="form-check">
                          <vs-switch color="success" v-model="item.done" disabled>
                            <span slot="on">Validé</span>
                            <span slot="off">Non Validé</span>
                          </vs-switch>
                        </div>
                      </td>
                      <td>{{ item.msg.substring(0,40) }}</td>
                      <td class="td-actions text-right">
                        <vs-button
                          radius
                          @click="GetMsgIfo(item)"
                          color="primary"
                          type="flat"
                          icon="visibility"
                        ></vs-button>

                        <vs-button
                          @click="DonePremium(item)"
                          radius
                          color="success"
                          type="flat"
                          icon="done"
                        ></vs-button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modals -->
    <vs-popup class="holamundo" :title="InfoMsg.name" :active.sync="popupActivoMsg">
      <div class="d-flex justify-content-center">{{ this.InfoMsg.created_at }}</div>
      <!-- <div class="icontext align-items-start"> -->
      <div class="row">
        <div class="col-lg-1 mr-0">
          <vs-avatar color="primary"/>
        </div>
        <div class="col-lg-10">
          <div class="msg-div">
            <p class="content-ms m-2">{{ this.InfoMsg.msg }}</p>
          </div>
          <!-- <small class="text-muted float-right mt-0">{{ this.InfoMsg.created_at | formatDate }}</small> -->
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-lg-6 col-sm-12 mb-2">
          <div class="ml-5">
            <vs-button icon="visibility" @click="ViewAnnonce" type="border">Voir annonce</vs-button>
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="float-right mr-5">
            <a :href="'tel::'+InfoMsg.tele">
              <vs-button icon="call" type="border">{{ this.InfoMsg.tele }}</vs-button>
            </a>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </vs-popup>
    <!-- <navbar :count="countInfo['CountMsgNotDone']"></navbar> -->
    <vs-popup class="holamundo" :title="InfoMsgPremium.name" :active.sync="popupActivoMsgPremuim">
      <div class="d-flex justify-content-center">{{ this.InfoMsgPremium.created_at }}</div>
      <!-- <div class="icontext align-items-start"> -->
      <div class="row">
        <div class="col-lg-1 mr-0">
          <vs-avatar color="primary"/>
        </div>
        <div class="col-lg-10">
          <div class="msg-div">
            <p class="content-ms m-2">{{ this.InfoMsgPremium.msg }}</p>
          </div>
          <!-- <small class="text-muted float-right mt-0">{{ this.InfoMsg.created_at | formatDate }}</small> -->
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-lg-6 col-sm-12 mb-2">
          <div class="ml-5">
            <vs-button
              icon="alternate_email"
              @click="copyTestingCode"
              color="primary"
              type="border"
            >
              <span style="color:blue !important">{{ this.InfoMsgPremium.email }}</span>
            </vs-button>
            <input type="hidden" id="email-code" :value="InfoMsgPremium.email">
          </div>
        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="float-right mr-5">
            <a :href="'tel::'+InfoMsgPremium.tele">
              <vs-button icon="call" type="border">{{ this.InfoMsgPremium.tele }}</vs-button>
            </a>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </vs-popup>
  </div>
</template>
<style>
.overflow-msg {
  height: 400px;
  overflow-y: scroll;
}
.msg-div {
  background-color: #f2f2f2e3;
  border-radius: 7px;
  /* width: 20px !important; */
}
.content-ms {
  word-wrap: break-word !important;
}
</style>

<script>
import navbar from "./NavBarAdmin.vue";
import moment from "moment";
// import nav from "./components/Admin/NavBar.vue";

// import { fetchDataList } from "api";
export default {
  name: "StatistiqueDash",
  components: {
    navbar: navbar
  },
  data() {
    return {
      messages: [],
      popupActivoMsg: false,
      popupActivoMsgPremuim: false,
      InfoMsg: {},
      InfoMsgPremium: {},
      annonceById: {},
      countInfo: {},
      annonces: {},
      mgsPremium: {}
    };
  },
  methods: {
    GetMsg() {
      axios
        .get("/getmsgs")
        .then(response => {
          if (response.data["status"] == "sucssus") {
            this.messages = response.data["messages"];
          } else console.log("error");
        })
        .catch(error => {
          console.log(error);
        });
    },
    GetMsgUser(item) {
      this.popupActivoMsg = true;
      this.InfoMsg = item;
      // alert(item.id);
      axios
        .get("/getannonce/" + item.id_annonce)
        .then(response => {
          if (response.data["status"] == "succsus") {
            this.annonceById = response.data["annonceById"];
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    Done(item) {
      axios
        .put("/putdone/" + item.id)
        .then(response => {
          if (response.data["status"] == "succsus") {
            this.messages = {};
            this.messages = response.data["msgUpdate"];
            this.CountInfo();
            Toast.fire({
              icon: "success",
              title: "Message validé "
            });
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    DonePremium(item) {
      axios
        .put("/putdonepremium/" + item.id)
        .then(response => {
          if (response.data["status"] == "succsus") {
            this.mgsPremium = {};
            this.mgsPremium = response.data["msgUpdate"];

            Toast.fire({
              icon: "success",
              title: "Message validé "
            });
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    ViewAnnonce() {
      // alert(this.annonceById.id);
      window.open(
        "/view/" +
          this.annonceById.id +
          "/?ville=" +
          this.annonceById.ville +
          "&type=" +
          this.annonceById.Type_bien +
          "&transaction=" +
          this.annonceById.Transaction,
        "_blank"
      );
    },
    CountInfo() {
      axios
        .get("/getcountinfo")
        .then(response => {
          this.countInfo = response.data["CountInfo"];
        })
        .catch(error => {});
    },
    openLoading() {
      this.$vs.loading();
      setTimeout(() => {
        this.$vs.loading.close();
      }, 800);
    },
    getMsgPremium() {
      axios
        .get("/message/premium/view")
        .then(response => {
          if (response.data["status"] === "success") {
            this.mgsPremium = response.data["msgpremium"];
          }
        })
        .catch(error => {});
    },
    GetMsgIfo(item) {
      this.popupActivoMsgPremuim = true;
      this.InfoMsgPremium = item;
      // console.log(this.InfoMsgPremium);
      // axios
      //   .get("/api/getannonce/" + item.id_annonce)
      //   .then(response => {
      //     if (response.data["status"] == "succsus") {
      //       this.annonceById = response.data["annonceById"];
      //       console.log(this.annonceById);
      //     }
      //   })
      //   .catch(error => {
      //     console.log(error);
      //   });
    },
    copyTestingCode() {
      let testingCodeToCopy = document.querySelector("#email-code");
      testingCodeToCopy.setAttribute("type", "text"); // 不是 hidden 才能複製
      testingCodeToCopy.select();

      try {
        var successful = document.execCommand("copy");
        var msg = successful ? "successful" : "unsuccessful";

        Toast.fire({
          icon: "success",
          title: "copied " + msg
        });
      } catch (err) {
        alert("Oops, unable to copy");
      }

      /* unselect the range */
      testingCodeToCopy.setAttribute("type", "hidden");
      window.getSelection().removeAllRanges();
    }
  },
  created() {
    this.getMsgPremium();
    this.GetMsg();
    this.CountInfo();
    this.openLoading();
  }
};
</script>