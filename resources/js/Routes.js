import NewAnnonce from "./components/Admin/NewAnonnce.vue";
import dash from "./components/Admin/StatistiqueDash.vue";
import PremiumAn from "./components/Admin/AnnoncesPremium.vue";
import NormalAn from "./components/Admin/AnnonmceNormal.vue";

const routes = [
    // { path: "/play/:id/title/:title", name: "play", component: Play },
    { path: "/fr/cms/posting", name: "newpost", component: NewAnnonce },
    { path: "/fr/cms", name: "dasH", component: dash },
    { path: "/fr/cms/annonces/premium", name: "premium", component: PremiumAn },
    { path: "/fr/cms/annonces/normal", name: "normal", component: NormalAn }
];

export default routes;
