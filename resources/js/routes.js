import ArticleIndex from "./components/articles/index";
import PanierIndex from "./components/panier/index";
import countArticlesPanier from "./components/countArticles_Panier";


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
    },
    {
        path: '/count',
        name:'countArticlesPanier',
        component: countArticlesPanier,
    },
    
];