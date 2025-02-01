<template>
  <div>
    <ul>
      <li v-for="product in products" :key="product.id">{{ product.name }}</li>
    </ul>
    <button @click="fetchProducts">Загрузить продукты</button>
  </div>
</template>

<script>
import axios from '../axiosConfig'; // Импортируйте настроенный axios

export default {
  name: "AxiosComponent",
  data() {
    return {
      products: [],
    };
  },
  methods: {
    async fetchProducts() {
      const params = {
        a: {
          id: 1,
          name: 'ass'
        },
        b: {
          id: 2,
          name: '2ass'
        },
      }
      try {
        const response = await axios.get('/filter', { params });

        this.products = response.data.products;
        console.log('Response:', response);
        console.log('products:', this.products);

      } catch (error) {
        console.error('Ошибка при загрузке продуктов:', error);
      }
    },
  },
};
</script>