<script src="http://127.0.0.1:8000/website/assets/js/jquery_3.7.1.min.js"></script>

<script src="{{asset('website/assets')}}/js/jquery_3.7.1.min.js"></script>

<script src="{{asset('website/assets')}}/js/bootstrap_5.3.2.bundle.min.js"></script>

<script src="{{asset('website/assets')}}/js/nouislider.min.js"></script>

<script src="{{asset('website/assets')}}/js/aos-3.0.0.js"></script>

<script src="{{asset('website/assets')}}/js/swiper10-bundle.min.js"></script>

<script src="{{asset('website/assets')}}/js/shopus.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    var adminid="{{auth()->user()?->id}}";
</script>
<script src="{{asset('build/assets/app-BOTvg166.js')}}"  ></script>
<script src="{{ asset('website/assets/js/jquery_3.7.1.min.js') }}"></script>

@yield('jswbsite')
@section('jswbsite')


<script>
    console.log('gggggggggggggggggggg');
    
  let selectedProductId = null;

  $(document).ready(function () {
    // ✅ استخدم document delegation عشان الزر يتعرف حتى لو اتولد متأخر
    $(document).on('click', '.open-delete-modal', function () {
      console.log('زر الحذف اتضغط ✅');
      selectedProductId = $(this).data('id');
      $('#deleteConfirmModal').fadeIn(); // أو .show()
    });

    // إغلاق المودال
    $(document).on('click', '.close-modal', function () {
      $('#deleteConfirmModal').fadeOut();
    });

    $(document).on('click', '#confirmDeleteBtn', function () {
      if (selectedProductId) {
        $.ajax({
          url: "{{route('website.wishlist.destroy',':id')}}".replace(':id',selectedProductId),
          type: 'DELETE',
          data: {
            _token: '{{ csrf_token() }}'
          },
          success: function () {
            $('#deleteConfirmModal').fadeOut();
            $(`.open-delete-modal[data-id="${selectedProductId}"]`).closest('tr').remove();
          },
          error: function () {
            alert('فشل الحذف، حاول مرة أخرى.');
          }
        });
      }
    });
  });
</script>

    
