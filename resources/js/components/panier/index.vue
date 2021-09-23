<template>
    <div>
        <main id="main">
            <div
                v-if="panier.nbre_articles == 0"
                class="col mx-auto bg-light text-center "
            >
                <div class="my-5 py-5">
                    <img src="/svg/empty-cart.png" />
                </div>

                <h3 class="text-secondary">
                    <strong>Your Card is Empty !</strong>
                </h3>
                <h4 class="text-dark">
                    Explore our categories and discover our best offers!
                </h4>
                <a :href="'/'" class="btn btn-primary m-5"
                    ><span class="">Start Shopping</span>
                </a>
            </div>

            <section v-else class="section cart__area">
                <div class="container">
                    <div class="responsive__cart-area">
                        <form class="cart__form">
                            <div class="cart__table table-responsive">
                                <table width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th>NAME</th>
                                            <th>UNIT PRICE</th>
                                            <th>QUANTITY</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(article, index) in articles"
                                            :key="article.id"
                                        >
                                            <td class="product__thumbnail">
                                                <a href="#">
                                                    <img :src="article.image" />
                                                </a>
                                            </td>
                                            <td class="product__name">
                                                <a :href="'/articles/'+article.id">{{
                                                    article.name
                                                }}</a>
                                                <br /><br />
                                                <a :href="'/boutiques/'+article.boutique.id">{{
                                                    article.boutique.name
                                                }}</a>
                                            </td>
                                            <td class="product__price">
                                                <div class="price">
                                                    <span class="new__price"
                                                        >{{
                                                            article.price
                                                        }}$</span
                                                    >
                                                </div>
                                            </td>
                                            <td class="product__quantity">
                                                <form
                                                    @submit.prevent="
                                                        updateQuantity
                                                    "
                                                    method="post"
                                                >
                                                    <div class="input-counter">
                                                        <div>
                                                            <button
                                                                type="submit"
                                                                name="minus"
                                                                :value="index"
                                                                class="minus-btn"
                                                            >
                                                                <svg>
                                                                    <use
                                                                        xlink:href="/images/sprite.svg#icon-minus"
                                                                    ></use>
                                                                </svg>
                                                            </button>
                                                            <span
                                                                class="counter-btn"
                                                                >{{
                                                                    article.quantity
                                                                }}</span
                                                            >
                                                            <button
                                                                type="submit"
                                                                name="plus"
                                                                :value="index"
                                                                class="plus-btn"
                                                            >
                                                                <svg>
                                                                    <use
                                                                        xlink:href="/images/sprite.svg#icon-plus"
                                                                    ></use>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="product__subtotal">
                                                <div class="price">
                                                    <span class="new__price"
                                                        >{{ article.total }}$</span
                                                    >
                                                </div>
                                                <a
                                                    href="#"
                                                    class="remove__cart-item"
                                                    @click="deleteArticle(article.id)"
                                                >

                                                    <svg>
                                                        <use
                                                            xlink:href="/images/sprite.svg#icon-trash"
                                                        ></use>
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="cart-btns">
                                <div class="continue__shopping">
                                    <a href="/">Continue Shopping</a>
                                </div>
                            </div>

                            <div class="cart__totals">
                                <h3>Total: {{ panier.total }}$</h3>

                                <a href="/commandes/create">PROCEED TO CHECKOUT</a>

                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script>
export default {
    data() {
        return {
            panier: {},
            articles: [],
            index: 0, 
        };
    },

    created() {
        this.getPanier();
        this.getArticles_Panier();
    },

    methods: {
        updateQuantity(event) {
            this.index = event.submitter.value;
            if (event.submitter.name == "plus") {
                this.increaseQuantity(this.articles[this.index]["quantity"],this.articles[this.index]["total"],this.articles[this.index]["price"]);
            } else {
                this.decreaseQuantity(this.articles[this.index]["quantity"],this.articles[this.index]["total"],this.articles[this.index]["price"]);
            }
        },
        increaseQuantity(quantity, total, price) {
            quantity++;
            total+=price;
            axios
                .put(
                    "/updateArticlePanier/" + this.articles[this.index].id,
                    {
                        'quantity': quantity,
                        'total': total
                    }
                )
                .then(res => {
                    this.$router.push({ name: "PanierIndex" }).catch(()=>{});
                    this.articles[this.index].quantity = quantity;
                    this.articles[this.index].total = total;
                    this.getPanier();

                });
        },
        decreaseQuantity(quantity, total, price) {
            quantity--;
            total-=price;
            axios
                .put(
                    "/updateArticlePanier/" + this.articles[this.index].id,
                    {
                        'quantity': quantity,
                        'total' : total
                    }
                )
                .then(res => {
                    this.$router.push({ name: "PanierIndex" }).catch(()=>{});
                    this.articles[this.index].quantity = quantity;
                    this.articles[this.index].total = total;
                    this.getPanier();
                });
        },
        getPanier() {
            axios
                .get("/getPanier")
                .then(res => {
                    this.panier = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },

        getArticles_Panier() {
            axios
                .get("/getArticles_Panier")
                .then(res => {
                    this.articles = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },


        deleteArticle(id) {
            axios
                .get("/paniers/" + id)
                .then(res => {
                    this.panier.nbre_articles -- ;
                    for(let i = 0;i < this.articles.length; i++) {
                        if(this.articles[i].id === id) {
                            this.panier.total -= this.articles[i].total;
                            this.articles.splice(i,1);
                            break;
                        }
                    }
                    
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>

<style></style>
