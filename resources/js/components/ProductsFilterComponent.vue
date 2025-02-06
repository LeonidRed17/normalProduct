<template>
  <!--
 Добавить сортировку по магазину и по качеству товара...?
 Зарефакторить добавление продукта, длинный инпут
 -->
  <div class="row d-flex my-5 p-3 text-bg-light border-1">

    <div class="d-flex flex-row flex-wrap flex-sm-nowrap mb-3 justify-content-center justify-content-sm-start">
      <a href="/products" class="btn btn-primary me-sm-2  col-10 col-sm-4 col-md-3 col-xl-2">Все продукты</a>
      <a href="/add_product" class="btn btn-primary me-sm-2   col-10 col-sm-4 col-md-3 col-xl-2 mt-1 mt-sm-0">Добавить
        продукт</a>
      <button
        class="btn btn-success justify-content-center align-items-center d-flex col-10 col-sm-4 col-md-3 col-xl-2 mt-1 mt-sm-0"
        @click="show = !show">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear"
          viewBox="0 0 16 16">
          <path
            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
          <path
            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
        </svg>
        <span class="ml-1">Сортировка</span>
      </button>
    </div>
    <div v-if="show" class="d-flex flex-row flex-wrap">
      <ul>
        <li v-for="product in products">{{ product }}</li>
      </ul>
      <CategoriesComponent :data='data' @setValues="getCategoriesValues" ref="categoriesComponent" />
      <div class="col ms-2">
        <SortPriceFromToComponent @setActiveButton="getSortPriceFromToValue" ref="sortPriceFromToComponent" />
        <div class="mt-4">
          <RangeComponent @setValues="getPriceValues" ref="rangeComponent" />
        </div>
      </div>
    </div>
    <div v-if="show" class="d-flex flex-row">
      <button @click="fetchProducts" class="btn btn-success justify-content-center align-items-center">
        Сортировать
      </button>
      <button class="btn btn-danger ms-2" @click="resetFilter">Сброс</button>
    </div>
  </div>
</template>
<script>
import RangeComponent from './RangeComponent.vue';
import CategoriesComponent from './CategoriesComponent.vue';
import SortPriceFromToComponent from './SortPriceFromToComponent.vue';
import axios from '../axiosConfig';

export default {
  name: "ProductsFilterComponent",
  components: { RangeComponent, CategoriesComponent, SortPriceFromToComponent },
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      show: false,
      products: [],
      filteredData: {
        selectedCategory: undefined,
        selectedSubcategory: undefined,
        minPrice: undefined,
        maxPrice: undefined,
        sortPriceFromTo: undefined,
      },
    };
  },

  methods: {

    getCategoriesValues(values) {
      this.filteredData.selectedCategory = values.selectedCategory;
      this.filteredData.selectedSubcategory = values.selectedSubcategory;
      console.log(this.filteredData)
    },
    getPriceValues(values) {
      this.filteredData.minPrice = values.minPrice;
      this.filteredData.maxPrice = values.maxPrice;
      console.log(this.filteredData);
    },
    getSortPriceFromToValue(values) {
      this.filteredData.sortPriceFromTo = values;
      console.log(this.filteredData);
    },
    resetFilter() {
      this.filteredData = {};
      this.$refs.categoriesComponent.reset();
      this.$refs.sortPriceFromToComponent.reset();
      this.$refs.rangeComponent.reset();
      console.log(this.filteredData);
    },
    async fetchProducts() {
      try {
        const response = await axios.get('/products/filter', { params: this.filteredData });

        this.products = response.data.products;
        console.log('Response:', response);
        console.log('products:', this.products);
        
        this.$emit('sentValues', this.filteredData);
        console.log('ass');


      } catch (error) {
        console.error('Ошибка при загрузке продуктов:', error);
      }
    },
  },
};
</script>
<style scoped>
h2 {
  color: blue;
}
</style>