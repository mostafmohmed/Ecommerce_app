@extends('healper.website.app')
@section('body')


@livewire('wishlist') 
@endsection
@section('js')
    <script>
        window.addEventListener('wishlist-deleted', function () {
    Swal.fire({
        icon: 'success',
        title: 'تم الحذف!',
        text: 'تم حذف المنتج من المفضلة بنجاح.',
        confirmButtonText: 'حسناً'
    });
});

    </script>
@endsection

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Counter') }}</div>

                <div class="card-body">
                    <livewire:counter />
                </div>
            </div>
        </div>
    </div>
</div> --}}

