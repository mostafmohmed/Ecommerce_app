

<script src="{{asset('dash/app-assets')}}/vendors/js/vendors.min.js" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('dash/app-assets')}}/js/core/app-menu.js" type="text/javascript"></script>
<script src="{{asset('dash/app-assets')}}/js/core/app.js" type="text/javascript"></script>
<script src="{{asset('dash/app-assets')}}/js/scripts/customizer.js" type="text/javascript"></script>
<script src="{{ asset('dash/app-assets') }}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="{{ asset('dash/app-assets') }}/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript">
</script>
<script src="{{ asset('dash/app-assets') }}/js/scripts/tables/components/table-components.js" type="text/javascript">

</script>

<script  src='https://cdn.datatables.net/2.2.1/js/dataTables.min.js' ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <script>
    //  translations
    //  let title = "{{ __('dashboard.are_you_sure') }}";
console.log('dsad');

     $(document).on('click', '.delete_confirm ', function(e) {

         e.preventDefault();


         form = $(this).closest('form');

         const swalWithBootstrapButtons = Swal.mixin({
             customClass: {
                 confirmButton: "btn btn-success",
                 cancelButton: "btn btn-danger"
             },
             buttonsStyling: true
         });
         swalWithBootstrapButtons.fire({
             title: 'delete',
             text: "You delete",
             icon: "warning",
             showCancelButton: true,
             confirmButtonText: "Yes, delete it!",
             cancelButtonText: "No, cancel!",
             reverseButtons: true
         }).then((result) => {
             if (result.isConfirmed) {
                 form.submit();
                 swalWithBootstrapButtons.fire({
                     title: "Deleted!",
                     text: "Your file has been deleted.",
                     icon: "success"
                 });
             } else if (
                 /* Read more about handling dismissals below */
                 result.dismiss === Swal.DismissReason.cancel
             ) {
                 swalWithBootstrapButtons.fire({
                     title: "Cancelled",
                     text: "Your imaginary file is safe :)",
                     icon: "error"
                 });
             }
         });

     });
 </script>
<script src="{{ asset('file-input/js/fileinput.min.js') }}"></script>
<script src="{{ asset('file-input/themes/fa5/theme.min.js') }}"></script>
@if (app()->getLocale()=='ar')
<script src="{{ asset('file-input/js/locales/LANG.js')}}"></script>
<script src="{{ asset('file-input/js/locales/ar.js') }}"></script>   
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
   
//    var lang = "{{ app()->getLocale() }}";
//     $(function() {
//          $('#single-image').fileinput({
//              theme: 'fa5',
//              language:lang,
//              allowedFileTypes: ['image'],
//              maxFileCount: 1,
//              enableResumableUpload: false,
//              showUpload: false,

//          });

//      });
</script>

<script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1/plugin/relativeTime.js"></script>
<script>
    dayjs.extend(dayjs_plugin_relativeTime);
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/10.3.1/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/10.3.1/firebase-messaging-compat.js"></script>

<script>
    const firebaseConfig = {

apiKey: "AIzaSyC1qmWvyqQS-qhcTyeTOiesVQj0dNAvToc",

authDomain: "laravel-11695.firebaseapp.com",

databaseURL: "https://laravel-11695-default-rtdb.firebaseio.com",

projectId: "laravel-11695",

storageBucket: "laravel-11695.firebasestorage.app",

messagingSenderId: "909627018946",

appId: "1:909627018946:web:d7c306a74641f8cf9bb55b",

measurementId: "G-ZZCV03J6YL"

};
firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

// messaging.onMessage(function(payload) {
//     console.log('🔔 New Message:', payload);

//     const notificationTitle = payload.notification.title;
//     const notificationOptions = {
//         body: payload.notification.body,
//         icon: '/firebase-logo.png', // عدّل حسب مسارك
//     };

//     // عرض الإشعار على الفور
//     new Notification(notificationTitle, notificationOptions);
// });

Notification.requestPermission().then((permission) => {
    if (permission === 'granted') {
        messaging.onMessage(function(payload) {
            console.log('🔔 New Message:', payload);

            const notificationTitle = payload.notification.title;
            const notificationOptions = {
                body: payload.notification.body,
            };

            new Notification(notificationTitle, notificationOptions);






const order_id = payload.data.order_id;
const user_name = payload.data.user_name;
const total_price = payload.data.total_price;
const notify_id = payload.data.id; // أو notfy_id حسب ما بعت
const message = payload.data.message;

    const routeTemplate = @json(route('website.order.show', ':id'));
    const orderUrl = routeTemplate.replace(':id', order_id);

    const timeNow = dayjs().fromNow();

    // HTML للشكل داخل القائمة
    const html = `<a href="${orderUrl}?notify_admin=${notify_id}">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">${message}</h6>
                       <p style="margin: 5px 0; color: #666; font-size: 14px;">
    order from ${user_name}
    EGP ${total_price}
</p>       <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">       ${timeNow}
</time>
                        </small>
                      </div>
                    </div>
                  </a>`;
console.log(html);

    // ضيف الإشعار أول القائمة
    $('#notif-list').prepend(html);

    // عدّل عداد الإشعارات
    let count = parseInt($('#count').text()) || 0;
    $('#count').text(`${count + 1} New`);






        });
    } else {
        console.warn('🔕 تم رفض صلاحية الإشعارات من المستخدم.');
    }
});




    if ("serviceWorker" in navigator) {
        navigator.serviceWorker.register("/firebase-messaging-sw.js")
            .then(function(registration) {
                console.log("Service Worker registered with scope:", registration.scope);
                // messaging.useServiceWorker(registration);

                return messaging.getToken({
                    vapidKey: "BBGAJ_caEij_G3JqfgRymvxXhrtKrhKcDaJljRLoUJNCSwXFvH2I2ngvbXyf2pV1huz1GllYUF81QsZKDMnMgfk",
                    serviceWorkerRegistration: registration
                });
            })
            .then(function(currentToken) {
                if (currentToken) {
                    console.log("FCM Token:", currentToken);




        $.ajax({
            url: '/admin/save-fcm-token',
            method: 'POST',
            data: {
                token: currentToken,
                _token: '{{ csrf_token() }}' // Laravel CSRF
            },
            success: function (response) {
                console.log('✅ Token stored on server');
            },
            error: function (xhr, status, error) {
                console.error('❌ Error storing token:', error);
            }
        });




                    // أرسل التوكن للسيرفر هنا عبر Axios مثلاً
                } else {
                    console.warn("No registration token available.");
                }
            })
            .catch(function(err) {
                console.error("An error occurred while retrieving token. ", err);
            });
    }








    // طلب صلاحية الإشعارات
    console.log('gggggggggggg');
    
//     Notification.requestPermission().then((permission) => {
//     if (permission === 'granted') {
//         messaging.getToken({ vapidKey: 'BBGAJ_caEij_G3JqfgRymvxXhrtKrhKcDaJljRLoUJNCSwXFvH2I2ngvbXyf2pV1huz1GllYUF81QsZKDMnMgfk' }).then((token) => {
//             console.log("FCM Token:", token);

//             // إرسال التوكن إلى السيرفر باستخدام jQuery
//             $.ajax({
//                 url: '/admin/save-fcm-token',
//                 method: 'POST',
//                 data: {
//                     token: token,
//                     _token: csrfToken
//                 },
//                 success: function (response) {
//                     console.log('Token stored');
//                 },
//                 error: function (xhr, status, error) {
//                     console.error('Error storing token', error);
//                 }
//             });
//         }).catch((err) => {
//             console.error('Error getting token:', err);
//         });
//     } else {
//         console.warn('Notification permission denied');
//     }
// });


//     // استقبال الإشعار في الوقت الحقيقي
//     messaging.onMessage(function(payload) {
//         console.log('New Message:', payload);

//         // عرض إشعار بسيط
//         alert(`🔔 ${payload.notification.title}\n${payload.notification.body}`);
//     });
</script>

@yield('js')