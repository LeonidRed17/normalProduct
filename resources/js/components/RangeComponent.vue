<template>
    <div>
        <span>Цена от</span>
      <input
        type="range"
        :min="minPrice"
        :max="maxPrice"
        :value="priceMin"
        @input="updatePriceMin($event.target.value)"
      />
      <span>Цена до</span>
      <input
        type="range"
        :min="minPrice"
        :max="maxPrice"
        :value="priceMax"
        @input="updatePriceMax($event.target.value)"
      />
      <p>Цена: {{ priceMin }} - {{ priceMax }} ₽</p>
    </div>
  </template>
  
  <script>
  export default {
    name: "RangeComponent",
    props: {
      priceMin: {
        type: Number,
        required: true,
      },
      priceMax: {
        type: Number,
        required: true,
      },
      minPrice: {
        type: Number,
        default: 0,
      },
      maxPrice: {
        type: Number,
        default: 10000,
      },
    },
    methods: {
      updatePriceMin(value) {
        this.$emit("update:priceMin", Number(value));
      },
      updatePriceMax(value) {
        this.$emit("update:priceMax", Number(value));
      },
    },
  };
  </script>
  