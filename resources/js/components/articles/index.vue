<template>
    <div>
        <section class="category__section section" id="category">
            <div class="tab__list">
                <div class="title__container tabs">
                    <div class="section__titles category__titles ">
                        <div class="form-check" data-id="All Products">
                            <input
                                class="form-check-input"
                                @change="getArticles()"
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
                                @change="getArticles()"
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
            <div
                class="category__container"
                data-aos="fade-up"
                data-aos-duration="1200"
            >
                <div class="category__center">
                    <div
                        class="product category__products"
                        v-for="article in articles"
                        :key="article.id"
                    >
                        <div class="product__header">
                            <img :src="article.image" alt="product" />
                        </div>
                        <div class="product__footer">
                            <h3>{{ article.name }}</h3>
                            <div class="rating">
                                <svg>
                                    <use
                                        xlink:href="/images/sprite.svg#icon-star-full"
                                    ></use>
                                </svg>
                                <svg>
                                    <use
                                        xlink:href="/images/sprite.svg#icon-star-full"
                                    ></use>
                                </svg>
                                <svg>
                                    <use
                                        xlink:href="/images/sprite.svg#icon-star-full"
                                    ></use>
                                </svg>
                                <svg>
                                    <use
                                        xlink:href="/images/sprite.svg#icon-star-full"
                                    ></use>
                                </svg>
                                <svg>
                                    <use
                                        xlink:href="/images/sprite.svg#icon-star-empty"
                                    ></use>
                                </svg>
                            </div>
                            <div class="product__price">
                                <h4>{{ article.price }}</h4>
                            </div>
                            <a href="#"
                                ><button type="submit" class="product__btn">
                                    Add To Cart
                                </button></a
                            >
                        </div>
                        <ul>
                            <li>
                                <a
                                    data-tip="Quick View"
                                    data-place="left"
                                    href="#"
                                >
                                    <svg>
                                        <use
                                            xlink:href="/images/sprite.svg#icon-eye"
                                        ></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a
                                    data-tip="Add To Wishlist"
                                    data-place="left"
                                    href="#"
                                >
                                    <svg>
                                        <use
                                            xlink:href="/images/sprite.svg#icon-heart-o"
                                        ></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a
                                    data-tip="Add To Compare"
                                    data-place="left"
                                    href="#"
                                >
                                    <svg>
                                        <use
                                            xlink:href="/images/sprite.svg#icon-loop2"
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
            picked: "all"
        };
    },

    created() {
        this.getCategories();
        this.getArticles();
    },

    methods: {
        getArticles() {
            axios
                .get("api/getArticles")
                .then(res => {
                    if (this.picked === "all") {
                        this.articles = res.data.data;
                    } else {
                        this.articles = [];
                        for (let i = 0; i < res.data.data.length; i++) {
                            if (res.data.data[i]["category"] === this.picked) {
                                this.articles.push(res.data.data[i]);
                            }
                        }
                    }
                })
                .catch(error => {
                    console.log(error);
                });
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
        }
    }
};
</script>
