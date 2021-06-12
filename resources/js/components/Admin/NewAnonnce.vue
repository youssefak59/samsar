<template >
  <div>
    <!-- <div class="row d-flex justify-content-center">
      <div class="row d-flex justify-content-center">
        <div class="progress-container prog">
          <div class="progress" id="progress"></div>
          <div class="circle active">1</div>
          <div class="circle">2</div>
          <div class="circle">3</div>
          <div class="circle">4</div>
        </div>
        <button class="btn" id="prev" disabled>Prev</button>
        <button class="btn" id="next">Next</button>
      </div>
    </div>-->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <div v-if="step1">
                  <h4 class="card-title">CRÉER ANNONCE</h4>
                  <p class="card-category">ÉTAPE 1</p>
                </div>
                <div v-if="step2">
                  <h4 class="card-title">CRÉER ANNONCE</h4>
                  <p class="card-category">ÉTAPE 2</p>
                </div>
                <div v-if="step3">
                  <h4 class="card-title">CRÉER ANNONCE</h4>
                  <p class="card-category">ÉTAPE 3</p>
                </div>
              </div>
              <div class="card-body">
                <div class="container">
                  <div v-if="step1">
                    <form class="was-validated">
                      <div class="row mb-4">
                        <div class="col-lg-3">
                          <h5>
                            <b>Transaction*</b>
                          </h5>
                          <span v-if="errors.Transaction" class="errors">Champs requis *</span>
                          <div>
                            <input
                              type="radio"
                              name="trans"
                              id="trans1"
                              value="Vente"
                              v-model="annonce.Transaction"
                              checked
                            >
                            <label class="form-check-label" for="trans1">Vente</label>
                          </div>
                          <div>
                            <input
                              type="radio"
                              name="trans"
                              id="trabs2"
                              value="Location"
                              v-model="annonce.Transaction"
                            >
                            <label class="form-check-label" for="trabs2">Location</label>
                          </div>
                          <div>
                            <input
                              type="radio"
                              name="trans"
                              id="trans3"
                              value="Location Vacances"
                              v-model="annonce.Transaction"
                            >
                            <label class="form-check-label" for="trans3">Location Vacances</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <h5>
                            <b class="tim-note">Type de bien*</b>
                          </h5>
                          <span v-if="errors.Type_bien" class="errors">Champs requis *</span>
                          <div class>
                            <input
                              type="radio"
                              v-model="annonce.Type_bien"
                              name="type"
                              id="type1"
                              value="Appartements"
                              checked
                            >
                            <label class="form-check-label" for="type1">Appartements</label>
                          </div>
                          <div>
                            <input
                              type="radio"
                              v-model="annonce.Type_bien"
                              name="type"
                              id="type2"
                              value="Maisons"
                            >
                            <label class="form-check-label" for="type2">Maisons</label>
                          </div>
                          <div>
                            <input
                              type="radio"
                              v-model="annonce.Type_bien"
                              name="type"
                              id="type3"
                              value="Villas & maisons de luxe"
                            >
                            <label class="form-check-label" for="type3">Villas & maisons de luxe</label>
                          </div>
                          <div>
                            <input
                              type="radio"
                              v-model="annonce.Type_bien"
                              name="type"
                              id="type4"
                              value="Riad"
                            >
                            <label class="form-check-label" for="type4">Riad</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <h5>.</h5>
                          <div class>
                            <input
                              type="radio"
                              v-model="annonce.Type_bien"
                              name="type"
                              id="type5"
                              value=" Locaux commerciaux"
                            >
                            <label class="form-check-label" for="type5">Locaux commerciaux</label>
                          </div>
                          <div>
                            <input
                              type="radio"
                              v-model="annonce.Type_bien"
                              name="type"
                              id="type7"
                              value="Bureaux"
                            >
                            <label class="form-check-label" for="type7">Bureaux</label>
                          </div>
                          <div>
                            <input
                              type="radio"
                              v-model="annonce.Type_bien"
                              value="Terrains"
                              name="type"
                              id="type8"
                            >
                            <label class="form-check-label" for="type8">Terrains</label>
                          </div>
                          <div>
                            <input
                              type="radio"
                              v-model="annonce.Type_bien"
                              value="Fermes"
                              name="type"
                              id="type9"
                            >
                            <label class="form-check-label" for="type9">Fermes</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <h5>
                            <b>État*</b>
                          </h5>
                          <span v-if="errors.Etat" class="errors">Champs requis *</span>

                          <div class>
                            <input
                              type="radio"
                              v-model="annonce.Etat"
                              name="etat"
                              value="Nouveau"
                              checked
                            >
                            <label class="form-check-label">Nouveau</label>
                          </div>
                          <div>
                            <input type="radio" v-model="annonce.Etat" value="Bon etat" name="etat">
                            <label class="form-check-label">Bon état</label>
                          </div>
                          <div>
                            <input
                              type="radio"
                              v-model="annonce.Etat"
                              value="À rénover"
                              name="etat"
                            >
                            <label class="form-check-label" for="exampleRadios1">À rénover</label>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg">
                          <h4>
                            <b class="h-title">Emplacement</b>
                          </h4>
                        </div>
                        <div class="col-lg-10">
                          <hr>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Adresse</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="annonce.adresse"
                              aria-describedby="emailHelp"
                              required
                            >
                            <div v-if="errors.adresse" class="errors">Champs requis *</div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Région *</label>
                            <select
                              class="custom-select"
                              @change="GetVille(annonce.region)"
                              v-model="annonce.region"
                              required
                            >
                              <option
                                v-for="(item,index) in region"
                                :key="index"
                                :value="item.region"
                              >{{ item.region }}</option>
                            </select>
                            <div v-if="errors.region" class="errors">Champs requis *</div>
                          </div>
                          <div class="form-group">
                            <!-- <label for="exampleInputEmail1">Ville *</label>
                            <input
                              type="text"
                              class="form-control mb-2"
                              v-model="annonce.ville"
                              aria-describedby="emailHelp"
                              required
                            >-->
                            <label for="exampleInputEmail1">Ville *</label>
                            <select class="custom-select" v-model="annonce.ville" required>
                              <option
                                v-for="(item,index) in ville"
                                :key="index"
                                :value="item.ville"
                              >{{ item.ville }}</option>
                            </select>
                            <div v-if="errors.ville" class="errors">Champs requis *</div>
                          </div>

                          <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Quartier *</label>
                            <input
                              type="text"
                              class="form-control"
                              v-model="annonce.quartier"
                              aria-describedby="emailHelp"
                              required
                            >
                            <div v-if="errors.quartier" class="errors">Champs requis *</div>
                          </div>-->
                        </div>
                        <div class="col-lg-8 col-sm-12 col-md-12 mb-3">
                          <GmapMap
                            :center="{lat:31, lng:-7}"
                            :zoom="5"
                            map-type-id="terrain"
                            style="width: 600px; height: 350px"
                          >
                            <GmapMarker
                              :key="index"
                              v-for="(m, index) in markers"
                              :position="m.position"
                              :clickable="true"
                              :draggable="true"
                              @click="center=m.position"
                            />
                          </GmapMap>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div v-if="step2">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Surface: m²*</label>
                          <input
                            type="number"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            v-model="annonce.surface"
                          >
                          <div v-if="errors.surface" class="errors">Champs requis *</div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Prix *</label>
                          <input
                            type="number"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            v-model="annonce.prix"
                          >
                          <div v-if="errors.prix" class="errors">Champs requis *</div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Étage du bien</label>
                          <input
                            type="number"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            v-model="annonce.etage"
                          >
                          <div v-if="errors.etage" class="errors">Champs requis *</div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Pièces *</label>
                          <input
                            type="number"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            v-model="annonce.pieces"
                          >
                          <div v-if="errors.pieces" class="errors">Champs requis *</div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Chambres *</label>
                          <input
                            type="number"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            v-model="annonce.chambres"
                          >
                          <div v-if="errors.chambres" class="errors">Champs requis *</div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Salles de bains *</label>
                          <input
                            type="number"
                            class="form-control"
                            id="exampleInputEmail1"
                            aria-describedby="emailHelp"
                            v-model="annonce.salles"
                          >
                          <div v-if="errors.salles" class="errors">Champs requis *</div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3 mt-3">
                      <div class="col-lg-2">
                        <h4>
                          <b class="h-title">Fonctionnalités</b>
                        </h4>
                      </div>
                      <div class="col-lg-10">
                        <hr>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-2">
                        <input
                          value="Jardin"
                          id="Jardin"
                          type="checkbox"
                          v-model="annonce.Caracteristiques"
                          aria-label="Checkbox for following text input"
                        >
                        <label for="Jardin">Jardin</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          value="Terrasse"
                          id="Terrasse"
                          type="checkbox"
                          v-model="annonce.Caracteristiques"
                          aria-label="Checkbox for following text input"
                        >
                        <label for="Terrasse">Terrasse</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          value="Garage"
                          type="checkbox"
                          v-model="annonce.Caracteristiques"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Garage</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          value="Ascenseur"
                          type="checkbox"
                          v-model="annonce.Caracteristiques"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Ascenseur</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          value="Vue sur mer"
                          type="checkbox"
                          v-model="annonce.Caracteristiques"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Vue sur mer</label>
                      </div>

                      <div class="col-lg-2">
                        <input
                          value="Vue les montagnes"
                          type="checkbox"
                          v-model="annonce.Caracteristiques"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Vue les montagnes</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-2">
                        <input
                          value="Piscine"
                          type="checkbox"
                          v-model="annonce.Caracteristiques"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Piscine</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          value="Concierge"
                          type="checkbox"
                          v-model="annonce.Caracteristiques"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Concierge</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          value="Chambre rangement"
                          type="checkbox"
                          v-model="annonce.Caracteristiques"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Chambre rangement</label>
                      </div>
                    </div>
                    <!-- Options supplémentaires-->
                    <div class="row mb-3 mt-3">
                      <div class="col-lg-2">
                        <h4>
                          <b class="h-title">Intérieur</b>
                        </h4>
                      </div>
                      <div class="col-lg-10">
                        <hr>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Salon Marocain"
                          v-model="annonce.Interieur"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Salon Marocain</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Salon europeen"
                          v-model="annonce.Interieur"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Salon européen</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Antenne parabolique"
                          v-model="annonce.Interieur"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Antenne parabolique</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Cheminee"
                          v-model="annonce.Interieur"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Cheminée</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Climatisation"
                          v-model="annonce.Interieur"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Climatisation</label>
                      </div>

                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Chauffage central"
                          v-model="annonce.Interieur"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Chauffage central</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Securite"
                          v-model="annonce.Interieur"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Sécurité</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Double vitrage"
                          v-model="annonce.Interieur"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Double vitrage</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Porte blindee"
                          v-model="annonce.Interieur"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Porte blindée</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <h4>
                          <b class="h-title">Options supplémentaires</b>
                        </h4>
                      </div>
                      <div class="col-lg-9">
                        <hr>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Cuisine equipee"
                          v-model="annonce.Options"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Cuisine équipée</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Refrigerateur"
                          v-model="annonce.Options"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Réfrigérateur</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Four"
                          v-model="annonce.Options"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Four</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="TV"
                          v-model="annonce.Options"
                          aria-label="Checkbox for following text input"
                        >
                        <label>TV</label>
                      </div>
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Machine a laver"
                          v-model="annonce.Options"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Machine à laver</label>
                      </div>

                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Micro-ondes"
                          v-model="annonce.Options"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Micro-ondes</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <input
                          type="checkbox"
                          value="Internet"
                          v-model="annonce.Options"
                          aria-label="Checkbox for following text input"
                        >
                        <label>Internet</label>
                      </div>
                    </div>
                  </div>
                  <div v-if="step3">
                    <div class="row d-flex justify-content-center mb-4">
                      <span>
                        <b>Télécharger des photos *</b> Cliquez sur le coeur pour faire la photo de couverture.
                      </span>
                    </div>
                    <div class="row d-flex justify-content-center">
                      <div id>
                        <VueUploadMultipleImage
                          @upload-success="uploadImageSuccess"
                          @before-remove="beforeRemove"
                          @edit-image="editImage"
                          :data-images="images"
                          :multiple="true"
                          idUpload="myIdUpload"
                          editUpload="myIdEdit"
                        ></VueUploadMultipleImage>
                        <div v-if="errors.pics" class="errors">Champs requis *</div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-3">
                        <h4>
                          <b class="h-title">Information de la publication</b>
                        </h4>
                      </div>
                      <div class="col-lg-9">
                        <hr>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-7">
                        <div class="form-group">
                          <label class="mb-2">
                            Titre *
                            <span class="desc">50 caractères max</span> .
                          </label>
                          <input
                            v-model="annonce.titre"
                            type="text"
                            max="50"
                            class="form-control"
                            minlength="10"
                            maxlength="50"
                          >
                          <div v-if="errors.titre" class="errors">Champs requis *</div>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="col-lg-7">
                          <div class="form-group">
                            <label class="mb-2">Téléphone *</label>

                            <input
                              v-model="annonce.tele"
                              type="number"
                              max="50"
                              class="form-control"
                              minlength="15"
                            >
                            <div v-if="errors.tele" class="errors">Champs requis *</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-7">
                        <div class="mb-3">
                          <label class="mb-2">
                            Description *
                            <span class="desc">5000 caractères max.</span> .
                          </label>
                          <textarea
                            v-model="annonce.description"
                            class="form-control is-invalid"
                            id="validationTextarea"
                            placeholder="Required example textarea"
                            required
                          ></textarea>
                          <div v-if="errors.description" class="errors">Champs requis *</div>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Type *</label>
                          <select class="custom-select" v-model="annonce.type" required>
                            <option selected>Normal</option>
                            <option>Premium</option>
                          </select>
                          <div v-if="errors.region" class="errors">Champs requis *</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- {{ errors[0] }} -->
                  <!-- <p >
                    <b>Please correct the following error(s):</b>
                    <ul>
                      <li v-for="(error,index) in errors" :key="index">{{ error }}</li>
                    </ul>
                  </p>-->

                  <div class="row d-flex justify-content-end">
                    <button class="btn" v-if="step3" @click="AddAnnonce">Enregistrer</button>
                    <button class="btn" v-if="step1" @click="NextStep2">Suivant</button>
                    <button class="btn" v-if="step2" @click="NextStep3">Suivant</button>
                  </div>
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
@import url("https://fonts.googleapis.com/css2?family=Muli&display=swap");

:root {
  --line-border-fill: #3498db;
  --line-border-empty: #e0e0e0;
}

* {
  box-sizing: border-box;
}
/* .error-message {
  color: #cc0033;
  display: inline-block;
  font-size: 12px;
  line-height: 15px;
  margin: 5px 0 0;
} */
ul li.mb-0 {
  margin: -12px;
}
.errors {
  /* background-color: #ff2b2bc7;
  color: white;
  border-radius: 5px;
  padding: 3px; */
  color: #cc0033;
  display: inline-block;
  font-size: 12px;
  line-height: 15px;
  margin: 5px 0 0;
  font-weight: bold;
}
.desc {
  font-size: 10px;
  color: #c4c4c4;
}
.h-title {
  color: #3498db;
  font-weight: bold;
}

.progress-container {
  display: flex;
  text-align: center;
  justify-content: space-between;
  position: relative;
  margin-bottom: 30px;
  max-width: 100%;
  width: 350px;
}

.progress-container::before {
  content: ""; /* Mandatory with ::before */
  background-color: var(--line-border-empty);
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  height: 4px;
  width: 100%;
  z-index: -1;
}

.progress {
  background-color: var(--line-border-fill);
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  height: 4px;
  width: 0%;
  z-index: -1;
  transition: 0.4s ease;
}

.circle {
  background-color: #fff;
  color: #999;
  border-radius: 50%;
  height: 30px;
  width: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 3px solid var(--line-border-empty);
  transition: 0.4s ease;
}

.circle.active {
  border-color: var(--line-border-fill);
}

.btn {
  background-color: var(--line-border-fill);
  color: #fff;
  border: 0;
  border-radius: 6px;
  cursor: pointer;
  font-family: inherit;
  padding: 8px 30px;
  margin: 5px;
  font-size: 14px;
}

.btn:active {
  transform: scale(0.98);
}

.btn:focus {
  outline: 0;
}

.btn:disabled {
  background-color: var(--line-border-empty);
  cursor: not-allowed;
}
</style>

<script>
import Swal from "sweetalert2/dist/sweetalert2.js";
import "sweetalert2/src/sweetalert2.scss";
// import VueUploadMultipleImage from "vue-upload-multiple-image";
import VueUploadMultipleImage from "./VueUploadMultipleImage.vue";
export default {
  data() {
    return {
      region: [],
      ville: [],
      attachments: [],
      form: new FormData(),
      infoIMG: [],
      step1: true,
      step2: false,
      step3: false,
      cpt: 0,
      Ineximage: [],
      images: [],
      errors: [],
      markers: [],
      annonce: {
        adresse: "tala youssef alhoceima",
        region: "tanger tetouan alhoceima",
        ville: "alhoceuma",
        quartier: "sidi 9asam",
        Transaction: "",
        Type_bien: "",
        Etat: "",
        surface: "3245",
        prix: "324",
        etage: "",
        pieces: "324",
        chambres: "23",
        salles: "23",
        Caracteristiques: [],
        Interieur: [],
        Options: [],
        titre: "ewfwfd",
        tele: "342325325",
        description: "vegreegreger",
        type: "Normal"
      }
    };
  },
  methods: {
    uploadImageSuccess(index, fileList, images) {
      this.attachments = images;
    },
    AddAnnonce() {
      for (var i = 0; i < this.attachments.length; i++) {
        this.form.append("pics[]", this.attachments[i]);
      }
      this.form.append("adresse", this.annonce.adresse);
      this.form.append("ville", this.annonce.ville);
      this.form.append("quartier", this.annonce.quartier);
      this.form.append("region", this.annonce.region);
      this.form.append("Transaction", this.annonce.Transaction);
      this.form.append("Type_bien", this.annonce.Type_bien);
      this.form.append("Etat", this.annonce.Etat);
      this.form.append("surface", this.annonce.surface);
      this.form.append("prix", this.annonce.prix);
      this.form.append("etage", this.annonce.etage);
      this.form.append("pieces", this.annonce.pieces);
      this.form.append("chambres", this.annonce.chambres);
      this.form.append("salles", this.annonce.salles);
      this.form.append("Caracteristiques", this.annonce.Caracteristiques);
      this.form.append("Interieur", this.annonce.Interieur);
      this.form.append("Options", this.annonce.Options);
      this.form.append("titre", this.annonce.titre);
      this.form.append("tele", this.annonce.tele);
      this.form.append("description", this.annonce.description);
      this.form.append("type", this.annonce.type);

      const config = { headers: { "Content-Type": "multipart/form-data" } };
      document.getElementById("myIdUpload").value = [];
      axios
        .post("/api/posting/annonce", this.form, config)
        .then(response => {
          if (response.data["status"] == "success") {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Votre annonce a été enregistré",
              showConfirmButton: false,
              timer: 1500
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Un problème est survenu!"
            });
          }
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
      this.attachments = [];
    },

    NextStep2() {
      if (
        this.annonce.Transaction &&
        this.annonce.Type_bien &&
        this.annonce.Etat &&
        this.annonce.adresse &&
        this.annonce.region &&
        this.annonce.ville &&
        this.annonce.quartier
      ) {
        if (this.cpt == 0) {
          this.step1 = false;
          this.step2 = true;
          this.step3 = false;
          this.cpt = this.cpt + 1;
        }
      } else {
        this.errors = [];
        if (!this.annonce.adresse) {
          this.errors.push("Le champ adresse obligatoire.");
          // alert(this.errors.adresse);
        }
        if (this.annonce.region == "") {
          this.errors.push("Le champ Règion obligatoire.");
        }
        if (!this.annonce.ville) {
          this.errors.push("Le champ Ville obligatoire.");
        }
        if (!this.annonce.quartier) {
          this.errors.push("Le champ Quartier obligatoire.");
        }
        if (!this.annonce.Transaction) {
          this.errors.push("Le champ Transaction obligatoire.");
        }
        if (!this.annonce.Type_bien) {
          this.errors.push("Le champ Type bien obligatoire.");
        }
        if (!this.annonce.Etat) {
          this.errors.push("Le champ Etat obligatoire.");
        }
        console.log("step1", this.errors);
        Swal.fire({
          type: "warning",
          html: `<p> <b v-if="${
            this.errors.length
          }" >Veuillez corriger les erreurs suivantes:</b>  <ul> ${this.errors.map(
            error => `<li class="mb-0">${error}</li>`
          )} </ul> </p> `,
          showConfirmButton: true
        });
      }
    },
    NextStep3() {
      if (
        this.annonce.surface &&
        this.annonce.prix &&
        this.annonce.etage &&
        this.annonce.pieces &&
        this.annonce.chambres &&
        this.annonce.salles
      ) {
        if (this.cpt == 1) {
          this.step1 = false;
          this.step2 = false;
          this.step3 = true;
          this.cpt = this.cpt + 1;
        }
      } else {
        this.errors = [];
        if (!this.annonce.surface) {
          this.errors.push("Le champ Surface obligatoire.");
        }
        if (!this.annonce.prix) {
          this.errors.push("Le champ Prix obligatoire.");
        }
        if (!this.annonce.etage) {
          this.errors.push("Le champ Etage obligatoire.");
        }
        if (!this.annonce.pieces) {
          this.errors.push("Le champ Pieces obligatoire.");
        }
        if (!this.annonce.chambres) {
          this.errors.push("Le champ Chambres obligatoire.");
        }
        if (!this.annonce.salles) {
          this.errors.push("Le champ Salles obligatoire.");
        }
        console.log("step2", this.errors);
        Swal.fire({
          type: "warning",
          html: `<p> <b v-if="${
            this.errors.length
          }" >Veuillez corriger les erreurs suivantes:</b>  <ul> ${this.errors.map(
            error => `<li class="mb-0">${error}</li>`
          )} </ul> </p> `,
          showConfirmButton: true
        });
      }
    },

    beforeRemove(index, done, fileList) {
      console.log("index", index, fileList);
      var r = confirm("remove image");
      if (r == true) {
        done();
      } else {
      }
    },
    editImage(formData, index, fileList) {
      console.log("edit data", formData, index, fileList);
    },
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
    GetVille(item) {
      axios
        .get("/api/getville/" + this.annonce.region)
        .then(response => {
          if (response.data["status"] == "succsus") {
            this.ville = response.data["villes"];
          }
        })
        .catch(error => {
          console.log(error);
        });
    }
  },
  created() {
    this.GetRegion();
  }
};
</script>
