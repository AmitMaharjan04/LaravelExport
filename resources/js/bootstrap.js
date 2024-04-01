import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

// import './echo';
// console.log("bootstrap");
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';
// window.Pusher = Pusher;
// // window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     // key: process.env.MIX_PUSHER_APP_KEY,
//     key: '220ac2505e626aa2f555',
//     clsuter: 'ap2',
//     // cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

// window.Echo.channel('excel-export')
//     .listen('ExportJobCompleted', (event) => {
//         console.log("here");
//         window.location.href = '/download';
// })
// .error((error) => {
//     console.error("Channel subscription error:", error);
// });