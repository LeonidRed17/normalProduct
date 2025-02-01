import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: '/api', // Укажите базовый URL для ваших API запросов
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'X-Requested-With': 'XMLHttpRequest',
    },
});

export default axiosInstance;
