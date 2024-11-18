import '../css/app.css';
import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import { createApp } from 'vue';

import CategoriesComponent from './components/CategoriesComponent.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Создаем приложение Vue
const appElement = document.getElementById('app');
if (appElement) {
    // Создаем приложение Vue
    const app = createApp({});

    // Регистрируем компонент
    app.component('categories-component', CategoriesComponent);

    // Монтируем приложение на элемент с id 'app'
    app.mount(appElement);
}