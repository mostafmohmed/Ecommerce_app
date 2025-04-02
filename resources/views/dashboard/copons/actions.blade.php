<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <button
            class="edit_coupon btn btn-outline-success"
            coupon-id="{{$coupn->id}}"
            coupon-code="{{$coupn->code}}"
            coupon-limit="{{$coupn->limit}}"
            coupon-discount_perecentage="{{$coupn->discount_perecentage}}"
            coupon-start_data="{{$coupn->start_data}}"
            coupon-end_data="{{$coupn->end_data}}"
             
            coupon-status={{$coupn->is_active== 'Active'?1:0}}
            {{-- coupon-id="{{ $coupon->id }}"
            coupon-code="{{ $coupon->code }}"
            coupon-limit="{{ $coupon->limit }}"
            coupon-discount="{{ $coupon->discount_precentage }}"
            coupon-start-date="{{ $coupon->start_date }}"
            coupon-end-date="{{ $coupon->end_date }}"
            coupon-status="{{ $coupon->is_active }}" --}}
        >
           {{ __('dashboard.edit') }} <i class="la la-edit"></i>
        </button>


        <a href="" type="button" class="btn btn-outline-info">
            {{ __('dashboard.status_management') }} <i class="la la-stop"></i>
        </a>


            <button id="btnGroupDrop2" coupon_id="{{ $coupn->id }}" type="button"  class="delete_confiurm_bt btn btn-outline-danger">
                {{ __('dashboard.delete') }}<i class="la la-trash"></i>
            </button>


    </div>
</div>