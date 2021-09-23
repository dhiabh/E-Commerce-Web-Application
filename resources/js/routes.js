import ArticleIndex from "./components/articles/index";
import PanierIndex from "./components/panier/index";


export const routes = [
    {
        path: '/home',
        name:'ArticleIndex',
        component: ArticleIndex,
    },
    {
        path: '/paniers',
        name:'PanierIndex',
        component: PanierIndex,
    }
];