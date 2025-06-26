<?php

namespace App\Http\Controllers;

use App\Services\PayPalService;
use Illuminate\Http\Request;

class PayPalController extends Controller
{
    protected $paypal;

    public function __construct(PayPalService $paypal)
    {
        $this->paypal = $paypal;
    }

    public function createOrder()
    {
        $order = $this->paypal->createOrder(100); // $100

        if (!empty($order['links'])) {
            foreach ($order['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return back()->with('error', 'تعذر إنشاء الطلب');
    }

    public function success(Request $request)
    {
        $orderId = $request->query('token');
        $result = $this->paypal->captureOrder($orderId);

        if ($result['status'] === 'COMPLETED') {
            // حفظ الطلب في قاعدة البيانات
            return redirect()->route('checkout.create')->with('success', 'تم الدفع بنجاح');
        }

        return redirect()->route('checkout.create')->with('error', 'فشل الدفع');
    }

    public function cancel()
    {
        return redirect()->route('checkout.create')->with('error', 'تم إلغاء العملية');
    }
}
