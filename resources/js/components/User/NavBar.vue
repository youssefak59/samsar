<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-2 bg-white rounded">
      <div class="container">
        <a class="navbar-brand link" href="/fr/maroc#/">YSF TEAM</a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav"></div>
          <div class="navbar-nav ml-auto">
            <!-- <div>
              <a href="#" class="navbar-brand link">
                <i class="fas fa-user-circle"></i>
                Se connecter
              </a>
            </div>-->
            <div>
              <vs-button
                color="success"
                type="filled"
                @click="RedirectContactUS"
                icon="photo_camera"
              >DÉPOSER UNE ANNONCE</vs-button>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- <nav class="navbar navbar-expand-lg bg-light">
     
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">
          <div class="d-flex justify-content-between">
            <div>
              <a href="#" class="navbar-brand link">
                <i class="fas fa-user-circle"></i>
                Se connecter
              </a>
            </div>
            <div>
              <vs-button color="success" type="filled" icon="photo_camera">DÉPOSER UNE ANNONCE</vs-button>
            </div>
          </div>
        </form>
      </div>
    </nav>-->

    <!-- <nav class="navbar shadow-sm p-2 mb-3 bg-white rounded">
      <div class="container">
        <a class="navbar-brand link" href="/fr/maroc#/">
          YSF TEAM
        </a>
        <div class="float-right">
          <div class="d-flex justify-content-between">
            <div>
              <a href="#" class="navbar-brand link">
                <i class="fas fa-user-circle"></i>
                Se connecter
              </a>
            </div>
            <div>
              <vs-button color="success" type="filled" icon="photo_camera">DÉPOSER UNE ANNONCE</vs-button>
            </div>
          </div>
        </div>
      </div>
    </nav>-->
  </div>
</template>
<style>
.link {
  color: #545454;
}
.link:hover {
  color: #545454;
}
</style>

<script>
export default {
  data: () => ({
    activeItem: 0,
    test1: ""
  }),
  methods: {
    RedirectContactUS() {
      window.location = "/messages/form";
    },
    rech() {
      alert(this.test1);
      axios
        .get("/api/getelement", {
          params: {
            test: this.test1
          }
        })
        .then(response => {})
        .catch(error => {});
    }
  }
};
</script>