<div class="wishlist">
    <div class="cart-content">
        <h5 class="cart-heading">SpaceRace</h5>
        <p>Order ID: <span class="inner-text">#4345</span></p>
    </div>
    <div class="cart-section wishlist-section">
        <table>
            <tbody>
                <tr class="table-row table-top-row">
                    <td class="table-wrapper wrapper-product">
                        <h5 class="table-heading">PRODUCT</h5>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">PRICE</h5>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <h5 class="table-heading">ACTION</h5>
                        </div>
                    </td>
                </tr>

                @foreach ($wishlist as $item)
                    <tr class="table-row ticket-row">
                        <td class="table-wrapper wrapper-product">
                            <div class="wrapper">
                                <div class="wrapper-img">
                                    <img src="{{ asset('uploads/produect/' . $item->images()->first()->file_name) }}" alt="img">
                                </div>
                                <div class="wrapper-content">
                                    <h5 class="heading">{{ $item->name }}</h5>
                                </div>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <h5 class="heading">{{ $item->price }}</h5>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">


                                    <button class="btn btn-success" wire:click="increament">+</button>

<span wire:click="confirmDelete({{ $item->id }})" class="open-delete-modal" data-id="" style="cursor:pointer;">
  <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z" fill="#AAAAAA"></path>
  </svg>
</span>
</div>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    @if($showConfirmModal)
    <div class="modal show" style="display:block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>تأكيد الحذف</h5>
                    <button wire:click="$set('showConfirmModal', false)" style="border:none;background:none;">&times;</button>
                </div>
                <div class="modal-body">
                    هل أنت متأكد من حذف هذا المنتج من المفضلة؟
                </div>
                <div class="modal-footer">
                    <button wire:click="$set('showConfirmModal', false)" class="btn btn-secondary">إلغاء</button>
                    <button wire:click="delete" class="btn btn-danger">حذف</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="wishlist-btn">
        <a href="#" wire:click="clearWishlist" class="clean-btn">Clean Wishlist</a>
        <a href="#" class="shop-btn">View Cards</a>
    </div>
</div>
