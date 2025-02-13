import '../css/app.css';
import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import { createApp } from 'vue';

import CategoriesComponent from './components/CategoriesComponent.vue';
import ProductsFilterComponent from './components/ProductsFilterComponent.vue';
import ProductsComponent from './components/ProductsComponent.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Создаем приложение Vue
const appElement = document.getElementById('app');
if (appElement) {
    // Создаем приложение Vue
    const app = createApp({});
    // Регистрируем компонент
    app.component('categoriescomponent', CategoriesComponent);
    app.component('ProductsFilterComponent', ProductsFilterComponent);
    app.component('productscomponent', ProductsComponent);


    // Монтируем приложение на элемент с id 'app'
    app.mount(appElement);
}