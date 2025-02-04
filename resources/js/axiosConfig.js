import axios from 'axios';

const csrfMetaTag = document.querySelector('meta[name="csrf-token"]');

let axiosInstance = null;

if (csrfMetaTag) {
    const csrfToken = csrfMetaTag.getAttribute('content');
    axiosInstance = axios.create({
        baseURL: '/api',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest',
        },
    });
} else {
    console.warn('CSRF-токен не найден. Axios не инициализирован.');
}

export default axiosInstance;
