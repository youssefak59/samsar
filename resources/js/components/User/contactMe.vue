<template>
  <div>
    <div class="container contact-form shadow-sm">
      <div class="contact-image">
        <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact">
      </div>
      <h5 class="d-flex justify-content-center">Envoyer un message sur whatsapp</h5>
      <span class="d-flex justify-content-center">
        <i class="fab fa-whatsapp fa-lg"></i>
        <a href="https://wa.me/212674507844">&nbsp;Contactez nous</a>
      </span>

      <div>
        <h2 class="d-flex justify-content-center mb-3 mt-3">OU</h2>
        <h4
          class="d-flex justify-content-center"
        >Envoyer un message à « Vip Services » pour publier votre annonce</h4>
        <div class="row mt-3">
          <div class="col-md-6">
            <div class="form-group">
              <input
                type="text"
                name="txtName"
                class="form-control"
                placeholder="Nom et prenom *"
                v-model="msgPremium.name"
                value
              >
            </div>
            <div class="form-group">
              <input
                type="text"
                v-model="msgPremium.email"
                name="txtEmail"
                class="form-control"
                placeholder="Email *"
                value
              >
            </div>
            <div class="form-group">
              <input
                v-model="msgPremium.tele"
                type="text"
                name="txtPhone"
                class="form-control"
                placeholder="Votre numéro de téléphone *"
                value
              >
            </div>
            <div class="form-group">
              <input
                type="button"
                @click="SendMsg"
                name="btnSubmit"
                class="btnContact"
                value="Envoyer le message"
              >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <textarea
                name="txtMsg"
                v-model="msgPremium.msg"
                class="form-control"
                placeholder="Votre message *"
                style="width: 100%; height: 150px;"
              ></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["tele"],
  data() {
    return {
      msgPremium: {
        name: "",
        email: "",
        tele: "",
        msg: ""
      }
    };
  },
  methods: {
    SendMsg() {
      axios
        .post("/messages/premium", this.msgPremium)
        .then(response => {
          if (response.data["status"] == "success") {
            Swal.fire({
              title: "message envoyé",

              icon: "success",
              showCancelButton: false,
              confirmButtonColor: "#3085d6",
              confirmButtonText: "ok"
            }).then(result => {
              if (result.isConfirmed) {
                window.location = "/fr/maroc";
              } else window.location = "/fr/maroc";
            });
            // Swal.fire("message envoyé", " ", "success");
          }
        })
        .catch(error => {});
    }
  },
  created() {}
};
</script>