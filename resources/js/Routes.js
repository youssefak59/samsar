import NewAnnonce from "./components/Admin/NewAnonnce.vue";
import dash from "./components/Admin/StatistiqueDash.vue";
import PremiumAn from "./components/Admin/AnnoncesPremium.vue";
import NormalAn from "./components/Admin/AnnonmceNormal.vue";
import Profile from "./components/Admin/Profile.vue";

const routes = [
    // { path: "/play/:id/title/:title", name: "play", component: Play },
    {
        path: "/fr/cms/posting",
        name: "newpost",
        component: NewAnnonce,
        meta: { transition: "zoom" }
    },
    {
        path: "/fr/cms",
        name: "dasH",
        component: dash,
        meta: { transition: "zoom" }
    },
    {
        path: "/fr/cms/annonces/premium",
        name: "premium",
        component: PremiumAn,
        meta: { transition: "zoom" }
    },
    {
        path: "/fr/cms/annonces/normal",
        name: "normal",
        component: NormalAn,
        meta: { transition: "zoom" }
    },
    {
        path: "/fr/cms/profile",
        name: "profile",
        component: Profile,
        meta: { transition: "zoom" }
    }
];

export default routes;
