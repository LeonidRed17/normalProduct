<template>
    <ProductsFilterComponent :data="this.data" ref="ProductsFilterComponent" @sentValues="setValues"></ProductsFilterComponent>
    {{ console.log(this.data) }}

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div v-for="product in products.data" :key="product.id">
            <div class="col mb-5">
                <div class="image-wrapper d-flex justify-center border border-lighter border-1" width="381px"
                    height="383px">

                    <a :href="`/product/${product.id}`">
                        <img v-if="product.product_image" :src="`/images/products/${product.product_image}`"
                            alt="Product Image" class="image_products" width="100%" height="350px">
                        <div v-else class="text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="500" fill="currentColor"
                                class=" bi-image border border-lighter border-1" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
                                <path
                                    d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1z" />
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="card-body text-center border border-lighter border-1 mt-2 p-2">
                    <p class="card-text text-center fw-medium text-primary text-uppercase mx-auto mt-3"
                        style="max-width:384px;">{{ product.product_name }}</p>
                    <p class="card-text text-center fw-medium text-primary text-uppercase mx-auto"
                        style="max-width:384px;">
                        {{ product.product_description }}</p>
                    <p class="card-text text-end fw-bold">{{ product.product_price }} руб.</p>
                    <p class="card-text text-start text-danger">Качество: {{ product.product_quality }}</p>

                    <div class="d-flex justify-content-between align-items-center">

                        <a href="#" class="">{{ product.product_category }}</a>
                        <a href="#" class="">{{ product.product_subcategory }}</a>
                        <a href="#" class="">{{ product.shop }}</a>
                        <small class="text-body-secondary">{{ product.created_at }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <ul class="pagination">
            {{ console.log(products.links) }}
            <!-- Кнопка "Назад" -->
            <!--<li v-if="products.prev_page_url" class="page-item">
            <a class="page-link" href="#" @click.prevent="fetchProducts(products.prev_page_url)">Назад</a>
        </li>-->

            <!-- Кнопки для страниц -->
            <li v-for="(page, index) in products.links" :key="index" class="page-item" :class="{ active: page.active }">
                <a class="page-link" href="#" @click.prevent="fetchProducts(page.url)" v-if="page.url">
                    <!-- Условие для изменения текста кнопки "next" -->
                    {{ page.label === 'pagination.next' ? 'Вперёд' : (page.label === 'pagination.previous' ? 'Назад' :
                    page.label) }}
                </a>
            </li>

            <!-- Кнопка "Вперёд" -->
            <!--<li v-if="products.next_page_url" class="page-item">
            <a class="page-link" href="#" @click.prevent="fetchProducts(products.next_page_url)">Вперёд</a>
        </li>-->
        </ul>
    </nav>
</template>
<script>
import ProductsFilterComponent from "./ProductsFilterComponent.vue";


export default {
    name: "ProductsComponent",
    components: {
        ProductsFilterComponent
    },
    props: {
        data: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            products: {
            },
        };
    },
    methods: {
        fetchProducts(url) {
            axios
                .get(url)
                .then((response) => {
                    this.products = response.data;
                    console.log(this.products);
                    if (this.$refs.ProductsFilterComponent.filteredData != null) {
                        console.log('не нал');
                        console.log(this.$refs.ProductsFilterComponent.filteredData);

                    }
                })
                .catch((error) => {
                    console.error("Ошибка при загрузке продуктов:", error);

                });
        },
        setValues(values) {
            console.log(values);
        }
    },

    mounted() {
        this.fetchProducts("api/products/filter/"); // Начальная загрузка
    },
};
</script>