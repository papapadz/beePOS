<template>
    <section>
        <div class="row container-fluid card-deck">
            <div class="badgeCat" @mouseover="catHover" @mouseout="catHoverOut" @click="catClick(category[0].product_category)" v-for="category in categories">
                <center>
                    {{ category[0]['category']['category'] }}
                </center>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-8 h-100">
                <MenuList :products=products></MenuList>
            </div>
            <div class="col-4"><Cart /></div>
        </div>
    </section>
</template>

<style>
.badgeCat {
    box-shadow: 1px 1px 10px lightgray;
    margin: 10px;
    border-color: bisque;
    width: 8vw;
    height: 8vw;
}
</style>

<script>
import MenuList from './MenuList.vue';
import Cart from './Cart.vue';

export default {
  components: {
    Cart,
    MenuList
  },
  data() {
    return {
        categories: [],
        products: [],
    }
  },
  mounted() {
    var self = this
    axios(store.getters.apiURL+'/kohlerLehnerAndBode/product/category/shop')
        .then(function (response) {
            self.categories = response.data
            console.log(self.categories)
            self.categories.forEach(function(cat) {
                cat.forEach(function(prod) {
                    self.products.push(prod)
                })
            })
        });
    store.commit('setShopProducts', {
        'categories': this.categories,
        'products': this.products
    }) 
  },   
  methods: {
    catHover(e) {
            e.target.classList.remove('border-disabled')
            e.target.classList.add('bg-info')
    },
    catHoverOut(e) {
        e.target.classList.remove('bg-info')
        e.target.classList.add('border-disabled')
    },
    catClick(cat) {
        this.products = store.getters.products.filter(product => product.product_category == cat)
    }
  }
}
</script>