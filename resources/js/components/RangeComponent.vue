<template>
  <p data-v-fd933c04="" class="mb-2">По диапазону цен</p>
  <span>Цена от</span>
  <input class="mx-2" type="range" :min="minPrice" :max="maxPrice" :value="priceMin"
    @input="updatePriceMin($event.target.value)" />
  <br>
  <span>Цена до</span>
  <input class="mx-2" type="range" :min="minPrice" :max="maxPrice" :value="priceMax"
    @input="updatePriceMax($event.target.value)" />
  <p>Цена: {{ priceMin }} - {{ priceMax }} ₽</p>
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