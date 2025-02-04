<template>
  <div class="col">
    <p class="mb-2">Выберите категорию продукта</p>
    <select :class="data.customClass" class="form-select mb-4 bg-white" name="product_category" ref="product_category"
      id="product_category" @change="sentValues" v-model="selectedCategory">
      <option disabled selected>Выберите категорию</option>
      <option v-for="category in sortedCategories" :key="category.id" :value="category.category_name">
        {{ category.category_name }}
      </option>
    </select>
    <p class="mb-2">Выберите подкатегорию продукта</p>
    <select :class="data.customClass" class="form-select mb-4 bg-white" name="product_subcategory"
      id="product_subcategory" ref="product_subcategory" @change="sentValues" v-model="selectedSubcategory"
      :disabled="!selectedCategory">
      <option disabled selected>Выберите подкатегорию</option>
      <option v-for="subcategory in sortedFilteredSubcategories" :key="subcategory.id"
        :value="subcategory.subcategory_name">
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
      customClass: String,
    }
  },
  data() {
    return {
      selectedCategory: null,
      selectedSubcategory: null,
      selectedCategories: {
      }
    };
  },
  methods: {
    sentValues(event) {
      //При изменении категории сбрасываем 
      if (event) {
        if (event.target == this.$refs.product_category) {
          this.selectedSubcategory = null;
        }
      }

      this.selectedCategories.selectedCategory = this.selectedCategory;
      this.selectedCategories.selectedSubcategory = this.selectedSubcategory;

      //this.data.selectedCategories
      this.$emit('setValues', this.selectedCategories);

    },
    reset() {
      this.selectedCategories = {};
      this.selectedCategory = null;
      this.selectedSubCategory = null;
    }
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
  mounted() {
    /*
    if (this.sortedCategories.length > 0) {
      this.selectedCategory = this.sortedCategories[0].category_name;
    }
      */
    this.sentValues();
  },
};
</script>
<style scoped>
h2 {
  color: blue;
}
</style>