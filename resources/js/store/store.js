import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        apiURL: 'http://localhost/beePOS/public/api',
        categories: [],
        products: [],
        cart: {
            totalAmt: 0.00,
            totalQty: 0,
            items: []
        }
    },
    mutations: {
        setShopProducts(state, data) {
            state.categories =  data.categories
            state.products =  data.products
        },
        addToCart(state, data) {
            state.cart = data
        },
    },
    actions: {
        addToCart(context, product_id) {
            var qty = 1
            var tempCart = store.getters.cart.items
            var product = tempCart.find(cart => cart.product_id == product_id)

            if(product !== undefined) {

                const itemIndex = tempCart.findIndex(cart => cart.product_id == product_id)
                tempCart[itemIndex] = {
                    'product_id': product.product_id,
                    'product_name': product.product_name,
                    'qty': product.qty+1,
                    'price': 0.00
                }
            } else {
                product = store.getters.products.find(product => product.product_id == product_id)            
                tempCart.push({
                    'product_id': product.product_id,
                    'product_name': product.product_name,
                    'qty': qty,
                    'price': 0.00
                })
                
            }
            
            context.commit('addToCart', {
                totalAmt: tempCart.reduce((counter, object) => counter + object.price,0),
                totalQty: tempCart.reduce((counter, object) => counter + object.qty,0),
                items: tempCart
            })

        }
    },
    getters: {
        apiURL: state => state.apiURL,
        products: state => state.products,
        categories: state => state.categories,
        cart: state => state.cart
    }
})