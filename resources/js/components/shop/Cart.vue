<template>
    <div class="fixedElement">
        <div class=" h-100 scrollable">
            <ul class="list-group w-100">
                <li class="list-group-item" v-for="item in getCartItems" :key="item.product_id">
                    <span class="float-left">{{ item.product_name }} {{ item.qty }}</span>
                </li>
            </ul>
        </div>
        <div class=" fixedBottom">
            <div class="row">
                QTY {{ cartDetails.totalQty }}
            </div>
        </div>
    </div>
</template>
    
<style>
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
        background-color: red;
        position:absolute;
        bottom: 0px;
        left: 0px;
        right: 0px;
        height: 10rem;
    }
</style>
    
<script>
import { store } from '../../store/store';

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
            this.totalQty = cartObj.totalQty
            this.totalAmt = cartObj.totalAmt
            return cartObj.items
        },
    },
    methods: {
        computeCartDetails() {
            
        }
    }
}
</script>