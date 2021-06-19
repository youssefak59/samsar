<template>
  <div>
    <ul class="pro-file">
      <li class="d-flex justify-content-center">
        <!-- <vs-avatar size="70px" src="https://randomuser.me/api/portraits/men/85.jpg"/> -->
        <vs-avatar size="70px" v-if="ProfilImage" :src="'/storage/'+ProfilImage"/>
        <vs-avatar size="70px" v-else/>

        <span class="cha-nge change-profile">
          <vs-tooltip text="Change profile" position="right">
            <a @click="popupProfile=true">
              <span class="material-icons-outlined m-1">photo_camera</span>
            </a>
          </vs-tooltip>
        </span>
        <!-- <vs-button class="change-profile" radius color="success" type="flat" icon="photo_camera"></vs-button> -->
      </li>
      <li class="d-flex justify-content-center mt-3">
        <b class="name-profile">{{ authname }}</b>
      </li>
      <li class="d-flex justify-content-center text-muteds">{{ authfonction }}</li>
    </ul>
    <vs-popup
      class="holamundo"
      title="Mettre à jour la photo de profil"
      :active.sync="popupProfile"
    >
      <div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <vs-avatar size="100px" :src="imageData"/>
          </div>
        </div>
        <div class="row mt-3 mb-2">
          <div class="col d-flex justify-content-center">
            <vs-button
              color="primary"
              onclick="document.getElementById('myFileInput').click()"
              value="Select a File"
              class="p-1"
              type="border"
              icon="add"
            >Importer une photo</vs-button>
            <input type="file" v-on:change="onImageChange" id="myFileInput">
          </div>
        </div>
        <hr>
        <div class="float-right">
          <vs-button type="flat" @click="ClosePopup" class="mr-2">Annuler</vs-button>
          <vs-button @click="ChangeImage">Enregistrer</vs-button>
          <!-- <a href="#" class="btn btn-primary">Enregistrer</a> -->
        </div>
      </div>
    </vs-popup>
  </div>
</template>
<style>
.change-profile {
  position: absolute;
  top: 70px;
  right: 100px;
  /* bottom: px; */
}
.cha-nge {
  background-color: white;
  border-radius: 15px;
}
#myFileInput {
  display: none;
}
</style>

<script>
import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/src/sweetalert2.scss";
export default {
  props: ["authname", "authfonction", "authid", "authimage"],
  data() {
    return {
      form: new FormData(),
      popupProfile: false,
      imageData: null,
      image: "",
      ProfilImage: ""
    };
  },
  methods: {
    ClosePopup() {
      this.popupProfile = false;
    },
    ChangeImage() {
      //   console.log(this.image);
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };

      this.form.append("image", this.image);
      axios
        .post("/updateprofile", this.form, config)
        .then(response => {
          if (response.data["status"] == "success") {
            this.ProfilImage = response.data["user"].image;
            //   Swal.fire({
            //     position: "center",
            //     icon: "success",
            //     title: "Your work has been saved",
            //     showConfirmButton: false,
            //     timer: 1500
            //   });
            this.popupProfile = false;
            this.activeLoading = true;
            this.$vs.loading({
              type: "point"
            });
            setTimeout(() => {
              this.activeLoading = false;
              this.$vs.loading.close();
              this.invalid = true;
            }, 800);
          }
        })
        .catch(error => {
          if (error.response.status == 422) {
            // alert(error.response);
            let color = `danger`;
            this.$vs.notify({
              title: "Error",
              text:
                error.response.data["errors"].image[0] +
                "" +
                error.response.data["errors"].image[1] +
                "" +
                error.response.data["errors"].image[2],

              color: color
            });
          }
        });
    },
    // ImageProfile(){

    // },
    onImageChange(event) {
      // `files` is always an array because the file input may be in multiple mode
      this.image = event.target.files[0];

      // Reference to the DOM input element
      var input = event.target;
      // Ensure that you have a file before attempting to read it
      if (input.files && input.files[0]) {
        // create a new FileReader to read this image and convert to base64 format
        var reader = new FileReader();
        // Define a callback function to run, when FileReader finishes its job
        reader.onload = e => {
          // Note: arrow function used here, so that "this.imageData" refers to the imageData of Vue component
          // Read image as base64 and set to imageData
          this.imageData = e.target.result;
        };
        // Start the reader job - read file as a data url (base64 format)
        reader.readAsDataURL(input.files[0]);
      }
    }
  },
  created() {
    this.ProfilImage = this.authimage;
  }
};
</script>