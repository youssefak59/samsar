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
      <!-- <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success">
                  <i class="fa fa-long-arrow-up"></i> 55%
                </span> increase in today sales.
              </p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Email Subscriptions</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div>-->
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
                    <!-- <li class="nav-item">
                      <a class="nav-link" href="#settings" data-toggle="tab">
                        <i class="material-icons">cloud</i> Server
                        <div class="ripple-container"></div>
                      </a>
                    </li>-->
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
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                v-model="item.done"
                                disabled
                                value
                              >
                              <!-- <vs-checkbox disabled="true" v-model=""></vs-checkbox> -->
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>{{ item.msg.substring(0,40) }}</td>
                        <td class="td-actions text-right">
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
                            <label class="form-check-label">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                v-model="item.done"
                                disabled
                                value
                              >
                              <!-- <vs-checkbox disabled="true" v-model=""></vs-checkbox> -->
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
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
                <div class="tab-pane" id="settings">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                        <td class="td-actions text-right">
                          <button
                            type="button"
                            rel="tooltip"
                            title="Edit Task"
                            class="btn btn-primary btn-link btn-sm"
                          >
                            <i class="material-icons">edit</i>
                          </button>
                          <button
                            type="button"
                            rel="tooltip"
                            title="Remove"
                            class="btn btn-danger btn-link btn-sm"
                          >
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit</td>
                        <td class="td-actions text-right">
                          <button
                            type="button"
                            rel="tooltip"
                            title="Edit Task"
                            class="btn btn-primary btn-link btn-sm"
                          >
                            <i class="material-icons">edit</i>
                          </button>
                          <button
                            type="button"
                            rel="tooltip"
                            title="Remove"
                            class="btn btn-danger btn-link btn-sm"
                          >
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value checked>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>Sign contract for "What are conference organizers afraid of?"</td>
                        <td class="td-actions text-right">
                          <button
                            type="button"
                            rel="tooltip"
                            title="Edit Task"
                            class="btn btn-primary btn-link btn-sm"
                          >
                            <i class="material-icons">edit</i>
                          </button>
                          <button
                            type="button"
                            rel="tooltip"
                            title="Remove"
                            class="btn btn-danger btn-link btn-sm"
                          >
                            <i class="material-icons">close</i>
                          </button>
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
              <h4 class="card-title">Annonces</h4>
              <p class="card-category">Annonce Premium / Annonces Normal</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>image</th>
                  <th>Name</th>
                  <th>Salary</th>
                  <th>Country</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>$36,738</td>
                    <td>Niger</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modals -->
    <vs-popup class="holamundo" :title="InfoMsg.name" :active.sync="popupActivoMsg">
      <div class="d-flex justify-content-center">{{ this.InfoMsg.created_at | formatDate }}</div>
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
        <div class="col-lg-6">
          <div class="ml-5">
            <vs-button icon="visibility" @click="ViewAnnonce" type="border">Voir annonce</vs-button>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="float-right mr-5">
            <vs-button icon="call" disabled type="border">{{ this.InfoMsg.tele }}</vs-button>
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
// import NabBar from "./components/Admin/NavBarAdmin.vue";
import moment from "moment";
// import nav from "./components/Admin/NavBar.vue";

export default {
  name: "StatistiqueDash",
  components: {
    // navbar: nav
  },
  data() {
    return {
      messages: [],
      popupActivoMsg: false,
      InfoMsg: {},
      annonceById: {},
      countInfo: {},
      annonces: {}
    };
  },
  methods: {
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
    GetMsgUser(item) {
      this.popupActivoMsg = true;
      this.InfoMsg = item;
      // alert(item.id);
      axios
        .get("/api/getannonce/" + item.id_annonce)
        .then(response => {
          if (response.data["status"] == "succsus") {
            this.annonceById = response.data["annonceById"];
            console.log(this.annonceById);
          }
        })
        .catch(error => {
          console.log(error);
        });
    },
    Done(item) {
      axios
        .put("/api/putdone/" + item.id)
        .then(response => {
          if (response.data["status"] == "succsus") {
            this.messages = {};
            this.messages = response.data["msgUpdate"];
            this.CountInfo();
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
        .get("/api/getcountinfo")
        .then(response => {
          this.countInfo = response.data["CountInfo"];
          console.log(this.countInfo["CountMsgDone"]);
        })
        .catch(error => {});
    },
    openLoading() {
      this.$vs.loading();
      setTimeout(() => {
        this.$vs.loading.close();
      }, 800);
    }
  },
  created() {
    this.GetMsg();
    this.CountInfo();
    this.openLoading();
  }
};
</script>