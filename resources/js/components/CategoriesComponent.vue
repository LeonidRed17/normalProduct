<template>
  <div class="col col-3">
    <p class="mb-2">Выберите категорию продукта</p>
    <select
      class="form-select mb-4 bg-white"
      name="product_category"
      id="product_category"
      v-model="selectedCategory"
    >
      <option disabled selected>Выберите категорию</option>
      <option
        v-for="category in sortedCategories"
        :key="category.id"
        :value="category.category_name"
      >
        {{ category.category_name }}
      </option>
    </select>
  </div>
  <div class="col col-3">
    <p class="mb-2">Выберите подкатегорию продукта</p>
    <select
      class="form-select mb-4 bg-white"
      name="product_subcategory"
      id="product_subcategory"
      v-model="selectedSubcategory"
      :disabled="!selectedCategory"
    >
      <option disabled selected>Выберите подкатегорию</option>
      <option
        v-for="subcategory in sortedFilteredSubcategories"
        :key="subcategory.id"
        :value="subcategory.subcategory_name"
      >
        {{ subcategory.subcategory_name }}
        {{ subcategory.category_name }}
      </option>
    </select>
  </div>
</template>
<script>
export default {
  name: "CategoriesComponent",
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      selectedCategory: null,
      selectedSubcategory: null,
    };
  },
  computed: {
    sortedCategories() {
      return this.data.categories
        .slice()
        .sort((a, b) => a.category_name.localeCompare(b.category_name));
    },
    filteredSubcategories() {
      return this.data.subcategories.filter(
        (subcategory) => subcategory.category_name === this.selectedCategory
      );
    },
    sortedFilteredSubcategories() {
      return this.filteredSubcategories
        .slice()
        .sort((a, b) => a.subcategory_name.localeCompare(b.subcategory_name));
    },
  },
};
</script>
<style scoped>
h2 {
  color: blue;
}
</style>