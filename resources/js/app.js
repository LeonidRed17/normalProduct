import { createApp } from 'vue';

// Импортируем компонент
import CategoriesComponent from './components/CategoriesComponent.vue';

// Создаем приложение Vue
const app = createApp({});

// Регистрируем компонент
app.component('categories-component',CategoriesComponent);

// Монтируем приложение на элемент с id 'app'
app.mount('#app');