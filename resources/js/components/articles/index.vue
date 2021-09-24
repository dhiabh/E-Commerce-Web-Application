<template>
    <div>
        <section class="category__section section" id="category">
            <div class="tab__list">
                <div class="title__container tabs">
                    <div class="section__titles category__titles ">
                        <div class="form-check" data-id="All Products">
                            <input
                                class="form-check-input"
                                @change="getArticlesCategories()"
                                type="radio"
                                value="all"
                                v-model="picked"
                            />
                            <label class="form-check-label">All Products</label>
                        </div>
                    </div>

                    <div
                        v-for="category in categories"
                        :key="category.id"
                        class="section__titles"
                    >
                        <div class="form-check" data-id="Trending Products">
                            <input
                                class="form-check-input"
                                @change="getArticlesCategories()"
                                type="radio"
                                :value="category.id"
                                v-model="picked"
                            />
                            <label class="form-check-label">{{
                                category.name
                            }}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category__container">
                <div class="category__center">
                    <div
                        class="product category__products"
                        v-for="article in produits"
                        :key="article.id"
                    >
                        <div class="product__header">
                            <img :src="article.image" alt="product" />
                        </div>
                        <div class="product__footer">
                            <h3>{{ article.name }}</h3>
                            <div class="product__price">
                                <h4>{{ article.price }}$</h4>
                            </div>
                            <a
                                v-if="
                                    article.panier !== undefined &&
                                        article.panier === 2
                                "
                                :href="'/articles/'+article.id"
                            >
                                <button type="submit" class="product__btn">
                                    View Your own Product
                                </button>
                            </a>
                            <a
                                v-if="
                                    article.panier === undefined ||
                                        article.panier === 0
                                "
                                @click="AddToCart(article)"
                                ><button type="submit" class="product__btn">
                                    Add To Cart
                                </button>
                            </a>

                            <a
                                v-if="
                                    article.panier !== undefined &&
                                        article.panier === 1
                                "
                                @click="RemoveFromCart(article)"
                                ><button type="submit" class="product__btn">
                                    Remove from Cart
                                </button>
                            </a>
                        </div>
                        <ul>
                            <li>
                                <a
                                    data-tip="Quick View"
                                    data-place="left"
                                    :href="'/articles/'+article.id"
                                >
                                    <svg>
                                        <use
                                            xlink:href="/images/sprite.svg#icon-eye"
                                        ></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

export default {
    data() {
        return {
            categories: [],
            articles: [],
            produits: [],
            picked: "all"
        };
    },
    computed: {
        count() {
            return this.$store.state.count;
        }
    },

    created() {
        this.$store.commit('getPanierCountFromDB');
        this.getCategories();
        this.getArticles();
    },

    methods: {
        getArticles() {
            axios
                .get("getArticles")
                .then(res => {
                    this.articles = [...res.data.data];
                    this.produits = [...this.articles];
                })
                .catch(error => {
                    console.log(error);
                });
        },

        getArticlesCategories() {
            if (this.picked == "all") {
                this.produits = [...this.articles];
            } else {
                this.produits = [];
                for (let i = 0; i < this.articles.length; i++) {
                    if (this.articles[i].category === this.picked) {
                        this.produits.push(this.articles[i]);
                    }
                }
            }
        },

        getCategories() {
            axios
                .get("api/categories")
                .then(res => {
                    this.categories = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        AddToCart(article) {
            axios.get("/articles/" + article.id + "/add-to-cart")
            .then(response => {
                this.$store.commit('increment');
                article.panier = 1;
            })
            .catch(errors => {
                if (errors.response.status == 401) {      //401: unauthorized error
                    window.location = "/login";
                }
            });
        },

        RemoveFromCart(article) {
            axios.get("/paniers/" + article.id)
            .then(response => {
                this.$store.commit('decrement');
                article.panier = 0;


            })
        },

    }
};
</script>
