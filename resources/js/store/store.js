import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
// Create our number formatter.
const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'PHP',
  
    // These options are needed to round to whole numbers if that's what you want.
    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
  });

export const store = new Vuex.Store({
    state: {
        shop: {},
        apiURL: '',
        categories: [],
        products: [],
        cart: {
            totalAmt: 0.00,
            totalQty: 0,
            items: []
        }
    },
    mutations: {
        init(state, data) {
            state.shop = data.shop
            state.categories =  data.categories
            state.products =  data.products
        },
        addToCart(state, data) {
            state.cart = data
        },
    },
    actions: {
        init(context, data) {
            axios(data.apiURL+data.shop.shop_code+'/product/category/shop')
            .then(function (response) {
                const categories = response.data
                let products = []
                categories.forEach(function(cat) {
                    cat.forEach(function(prod) {
                        products.push(prod)
                    })
                })
                context.commit('init', {
                    'categories': categories,
                    'products': products,
                    'shop': data.shop
                })
            });
        },
        addToCart(context, product_id) {
            var qty = 1
            var total_price = 0
            
            var tempCart = store.getters.cart.items
            var product = tempCart.find(cart => cart.product_id == product_id)
            
            if(product !== undefined) {
                qty = product.qty+1
                total_price = qty*product.price
                const itemIndex = tempCart.findIndex(cart => cart.product_id == product_id)
                tempCart[itemIndex] = {
                    'product_id': product.product_id,
                    'product_name': product.product_name,
                    'qty': qty,
                    'price': product.price,
                    'total_price': total_price
                }
            } else {
                product = store.getters.products.find(product => product.product_id == product_id) 
                total_price = qty*product.price.unit_price
                tempCart.push({
                    'product_id': product.product_id,
                    'product_name': product.product_name,
                    'qty': qty,
                    'price': product.price.unit_price,
                    'total_price': total_price
                })
                
            }
            context.commit('addToCart', {
                totalAmt: formatter.format(tempCart.reduce((counter, object) => counter + object.total_price,0).toFixed(2)),
                totalQty: tempCart.reduce((counter, object) => counter + object.qty,0),
                items: tempCart
            })

        },
        removeFromCart(context, product_id) {
            var tempCart = store.getters.cart.items
            const product = tempCart.find(cart => cart.product_id == product_id)
            const itemIndex = tempCart.findIndex(cart => cart.product_id == product_id)
                
            if(product.qty>1) {
                var qty = product.qty-1
                var total_price = qty*product.price
                tempCart[itemIndex] = {
                    'product_id': product.product_id,
                    'product_name': product.product_name,
                    'qty': qty,
                    'price': product.price,
                    'total_price': total_price
                }
            } else
                tempCart.splice(itemIndex,1)
            
            context.commit('addToCart', {
                totalAmt: formatter.format(tempCart.reduce((counter, object) => counter + object.total_price,0).toFixed(2)),
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