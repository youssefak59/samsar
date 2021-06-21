<template>
  <div>
    <footer class="bg-white mt-5 shadow-sm">
      <div class="container py-5">
        <div class="row py-4">
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <h2>team YSF</h2>
            <!-- <img src="img/logo.png" alt width="180" class="mb-3"> -->
            <p class="font-italic text-muted">
              <span>Appartements - Tout le Maroc</span>
              <span>Maisons et Villas - Tout le Maroc</span>
              <span>Bureaux et Plateaux - Tout le Maroc</span>
              <span>Magasins, Commerces et Locaux industriels - Tout le Maroc</span>
              <span>Terrains et Fermes - Tout le Maroc</span>
              <span>Locations de vacances - Tout le Maroc</span>
              <span>Colocations - Tout le Maroc</span>
              <span>Autre Immobilier - Tout le Maroc</span>
            </p>
            <ul class="list-inline mt-4">
              <li class="list-inline-item">
                <a href="#" target="_blank" title="twitter">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" target="_blank" title="facebook">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" target="_blank" title="instagram">
                  <i class="fa fa-instagram"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" target="_blank" title="pinterest">
                  <i class="fa fa-pinterest"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" target="_blank" title="vimeo">
                  <i class="fa fa-vimeo"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <h6 class="text-uppercase font-weight-bold mb-4">Contacts</h6>
            <ul class="list-unstyled mb-0">
              <li class="mb-2">
                <b>Address:</b>
                <p class="text-muted">798 South Park Avenue, New York, USA</p>
              </li>
              <li class="mb-2">
                <b>Email:</b>
                <p class="text-muted">Youssefakchar@gmail.com</p>
              </li>
              <li class="mb-2">
                <b>Téle:</b>
                <p class="text-muted">0674507844/065432864</p>
              </li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 mb-lg-0">
            <h6 class="text-uppercase font-weight-bold mb-4">Contact us</h6>

            <ul class="list-unstyled mb-0">
              <li class="mb-2">
                <b>Contactez nous:</b>
                <br>

                <a @click="RedirectContactUS" class="text-muted">Envoyer un message</a>
              </li>
              <li class="mb-2">
                <b>OU</b>
              </li>
              <li class="mb-2">
                <b>Whatsapp:</b>
                <br>
                <a class="text-muted" href="https://wa.me/212674507844">&nbsp;Contactez nous</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Copyrights -->
      <div class="bg-light py-4">
        <div class="container text-center">
          <p class="text-muted mb-0 py-2">© 2021 All rights reserved Yousssef akchar</p>
        </div>
      </div>
    </footer>
    <!-- End -->
  </div>
</template>
<script>
export default {
  data() {
    return {};
  },
  methods: {
    RedirectContactUS() {
      window.location = "/messages/form";
    }
  }
};
</script>