<template>
    <div class="fixedElement">
        <div class="h-100 scrollable">
            <ul class="list-group">
                <li class="list-group-item list-group-item-action flex-column align-items-start "  v-for="item in getCartItems" :key="item.product_id">
                    <div class="d-flex w-100 justify-content-between">
                        <h3 class="mb-1">{{ item.product_name }} x {{ item.qty }}</h3>
                        <span class="sliderButton form-inline">
                            <button type="button" @click="addToCart(item.product_id)" class="btn btn-success btn-circle btn-xl"><v-icon name="plus" /></button>
                            <button @click="removeFromCart(item.product_id)" type="button" class="btn btn-danger btn-circle btn-xl"><v-icon name="minus" /></button>
                        </span>
                    </div>
                    <small>{{ parseFloat(item.total_price).toFixed(2) }}</small>
                </li>
            </ul>
        </div>
        <div class="fixedBottom d-flex">
            <div class="d-flex flex-row">
                <div class="p-2">
                    <div class="d-flex flex-column">
                        <div class="p-2">
                            <v-icon name="shopping-cart" scale="5"/><span class="badge badge-warning ml-2"><p class="h3">{{ cartDetails.totalQty }}</p></span>
                        </div>
                        <div class="p-2 d-flex justify-content-center"><h4>{{ cartDetails.totalAmt }}</h4></div>
                    </div>
                </div>
                <div class="p-2 justify-content-end w-100" :style="{ 'border': 'solid' }" ></div>
            </div>
        </div>
    </div>
</template>
    
<style>
.btn-circle.btn-xl {
			width: 50px;
			height: 50px;
			padding: 13px 18px;
			border-radius: 60px;
			text-align: center;
		}
    .list-group-item:hover .sliderButton {
        transition: 1s;
        right: 0;
    }
    .sliderButton {
        position: fixed;
        right: -100px;
        width: 100px;
        transition: 1s;
    }
    .scrollable {
        overflow-y: scroll;
    }
    .fixedElement {
        background-color: #c0c0c0;
        position:fixed;
        top:0;
        width:100%;
        z-index:100;
        height: 100%;
    }
    .fixedBottom {
        border-top: solid;
        background-color: white;
        position:absolute;
        bottom: 0px;
        left: 0px;
        right: 0px;
        height: 10rem;
    }
</style>
    
<script>
import { store } from '../../store/store';
import 'vue-awesome/icons/plus'
import 'vue-awesome/icons/minus'
import 'vue-awesome/icons/shopping-cart'
import 'vue-awesome/icons/money-bill'

export default {
    data() {
        return {
            cartDetails: {
                totalQty: 0,
                totalAmt: 0.00
            }
        }
    },
    mounted() {
        this.$eventHub.on('add-to-cart', () => {
            this.$forceUpdate()
        })
    },
    computed: {
        getCartItems() {
            const cartObj = store.getters.cart
            this.cartDetails.totalQty = cartObj.totalQty
            this.cartDetails.totalAmt = cartObj.totalAmt
            return cartObj.items
        },
    },
    methods: {
        addToCart(product_id) {
            store.dispatch('addToCart',product_id)
            this.$forceUpdate()
        },
        removeFromCart(product_id) {

            store.dispatch('removeFromCart',product_id)
            this.$forceUpdate()
        }
    }
}
</script>