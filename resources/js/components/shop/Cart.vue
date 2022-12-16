<template>
    <div class="fixedElement d-flex flex-column">
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
        <div class="fixedBottom">
            <div class="d-flex flex-row">
                <div class="d-flex flex-column">
                    <div class="pl-2 align-self-stretch">Qty: {{ cartDetails.totalQty }}</div>
                    <div class="pl-2 align-self-stretch"><h2>Total: {{ cartDetails.totalAmt }}</h2></div>
                </div>
                <div class="d-flex align-items-end">
                    <button class="btn btn-success w-100">Checkout</button>
                </div>
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
        right:0;
        bottom: 0;
        width:300px;
        height: 100%;
    }
    .fixedBottom {
        border-top: solid;
        background-color: white;
        height: 10rem;
    }
</style>
    
<script>
import { store } from '../../store/store';
import 'vue-awesome/icons/plus'
import 'vue-awesome/icons/minus'

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