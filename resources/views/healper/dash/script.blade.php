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

<script>
   
   var lang = "{{ app()->getLocale() }}";
    $(function() {
         $('#single-image').fileinput({
             theme: 'fa5',
             language:lang,
             allowedFileTypes: ['image'],
             maxFileCount: 1,
             enableResumableUpload: false,
             showUpload: false,

         });

     });
</script>
@yield('js')