import axios from 'axios';
import Alpine from 'alpinejs';
 
window.Alpine = Alpine;
 
Alpine.start();
window.axios = axios;

// Alpine.magic('modal', () => {
//     return subject => navigator.clipboard.writeText(subject)
// })

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
