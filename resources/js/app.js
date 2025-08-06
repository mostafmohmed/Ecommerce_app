import './bootstrap';
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: false,
    enabledTransports: ['ws'],
});

console.log('✅ Echo connected');
console.log('🔗 HOST:', import.meta.env.VITE_REVERB_HOST);
console.log('📡 PORT:', import.meta.env.VITE_REVERB_PORT);

// ✨ استمع إلى القناة العامة
window.Echo.channel('public-channel')
    .listen('App\\Events\\NewMessage', (e) => {
        console.log('📨 رسالة جديدة:', e.message);
    });
