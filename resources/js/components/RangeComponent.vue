<template>
  <div>
    <p data-v-fd933c04="" class="mb-2">По диапазону цен</p>
    <span>Цена от</span>
    <input class="mx-2 col-12" type="range" :min="minPrice" :max="maxPrice" :value="selectedValues.minPrice"
      ref="minPriceInput" @input="setValues($event)" />
    <br>
    <span>Цена до</span>
    <input class="mx-2 col-12" type="range" :min="minPrice" :max="maxPrice" :value="selectedValues.maxPrice"
      ref="maxPriceInput" @input="setValues($event)" />
    <p>Цена: {{ selectedValues.minPrice }} - {{ selectedValues.maxPrice }} ₽</p>
  </div>
</template>

<script>
export default {
  name: "RangeComponent",
  data() {
    return {
      minPrice: 0, // Минимальное значение по умолчанию
      maxPrice: 10000, // Максимальное значение по умолчанию

      selectedValues: {
        minPrice: 0,
        maxPrice: 10000
      },
    }
  },
  methods: {
    setValues(event) {
      if (event) {
        if (event.target == this.$refs.minPriceInput) {

          this.selectedValues.minPrice = event.target.value;

        }
        else if (event.target == this.$refs.maxPriceInput) {

          this.selectedValues.maxPrice = event.target.value;

        }
      }

      this.$emit('setValues', this.selectedValues);

    },
    reset() {

      this.selectedValues.minPrice = this.minPrice;
      this.selectedValues.maxPrice = this.maxPrice;

      this.$refs.minPriceInput.value = this.minPrice;
      this.$refs.maxPriceInput.value = this.maxPrice;

    }
  },
  mounted() {

    this.setValues();

  }
};
</script>