// importScripts('https://www.gstatic.com/firebasejs/10.3.1/firebase-app-compat.js');
// importScripts('https://www.gstatic.com/firebasejs/10.3.1/firebase-messaging-compat.js');
//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// const firebaseConfig = {

// apiKey: "AIzaSyC1qmWvyqQS-qhcTyeTOiesVQj0dNAvToc",

// authDomain: "laravel-11695.firebaseapp.com",

// databaseURL: "https://laravel-11695-default-rtdb.firebaseio.com",

// projectId: "laravel-11695",

// storageBucket: "laravel-11695.firebasestorage.app",

// messagingSenderId: "909627018946",

// appId: "1:909627018946:web:d7c306a74641f8cf9bb55b",

// measurementId: "G-ZZCV03J6YL"

// };
importScripts('https://www.gstatic.com/firebasejs/10.3.1/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/10.3.1/firebase-messaging-compat.js');

firebase.initializeApp({
  apiKey:"AIzaSyC1qmWvyqQS-qhcTyeTOiesVQj0dNAvToc",
authDomain: "laravel-11695.firebaseapp.com",
 projectId: "laravel-11695",
  messagingSenderId: "909627018946",
  appId: "1:909627018946:web:d7c306a74641f8cf9bb55b",
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  const notificationTitle = payload.notification.title;
  const notificationOptions = {
    body: payload.notification.body,
    icon: '/firebase-logo.png' // ضع أيقونة موجودة عندك
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});