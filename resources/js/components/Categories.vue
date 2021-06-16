<template>
    <div class="container" :class="{'loading': loading}">
        <div class="row">

            <div class="col-lg-3 py-5">
                <div class="list-group">
                    <a class="list-group-item" v-for="category in categories"
                       :class="category.id == selectedCategory ? 'bg-dark text-white' : ''"
                       @click="selectCategory(category.id)">
                        {{ category.title }}
                    </a>
                </div>
            </div>

            <div class="col-lg-9 py-5">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4" v-for="product in products">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <router-link :to="`/products/${product.id}`">
                                        {{ product.title }}
                                    </router-link>
                                </h4>
                                <h5>{{ product.id }}</h5>
                                <p class="card-text">{{ product.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            categories: [],
            products: [],
            loading: true,
            selectedCategory: 'all',
        }
    },
    mounted() {
        this.loadCategories();
        this.loadProducts();
    },
    methods: {
        selectCategory(category) {
            this.selectedCategory = category;
            if (category == 'all') {
                this.loadProducts();
            }
            else {
                axios.get('/api/products/by-category/' + category)
                    .then((response) => {
                        this.products = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        loadCategories: function () {
            axios.get('/api/categories')
                .then((response) => {
                    this.categories = response.data.data;
                    this.categories.unshift({id: 'all', title: 'View all products'});

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        loadProducts: function () {
            axios.get('/api/products')
                .then((response) => {
                    console.log(response.data)
                    this.products = response.data.data;
                    this.loading = false;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
}
</script>
