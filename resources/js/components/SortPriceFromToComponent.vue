<template>
    <div>
        <p class="mb-2">По цене</p>
        <div class="d-flex">
            <button 
                @click="setActive('cheaper')" 
                :class="{'btn-success': activeButton !== 'cheaper', 'btn-light-success': activeButton === 'cheaper'}"
                class="btn justify-content-center align-items-center d-flex me-2"
            >
                <DownArrowIconComponent />Дешевле
            </button>
            <button 
                @click="setActive('more_expensive')" 
                :class="{'btn-success': activeButton !== 'more_expensive', 'btn-light-success': activeButton === 'more_expensive'}"
                class="btn justify-content-center align-items-center d-flex"
            >
                <UpArrowIconComponent />Дороже
            </button>
        </div>
    </div>
</template>

<script>
import DownArrowIconComponent from './icons/DownArrowIconComponent.vue';
import UpArrowIconComponent from './icons/UpArrowIconComponent.vue';

export default {
    name: "SortPriceFromToComponent",
    components: {
        DownArrowIconComponent,
        UpArrowIconComponent
    },
    data() {
        return {
            activeButton: null, // Хранит идентификатор активной кнопки
        };
    },
    methods: {
        setActive(button) {
            this.activeButton = button; // Устанавливаем активную кнопку
        },
    },
};
</script>

<style>
.btn-light-success {
    background-color: #13633e!important; 
    border-color: #00ab00 !important;   
    color: #fff !important;             
}
</style>
