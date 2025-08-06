<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\contactnotifction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class contactController extends Controller
{
    public function create()
    {
        return view('website.contact.contact');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|min:3|max:255',
            'massage' => 'required|string|min:5',
            'phone'   => 'required',
            'email'   => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $cotact = Contact::create([
            'name'    => $request->name,
            'massage' => $request->massage,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'user_id' => auth()->id(),
        ]);

        $admins = User::all();
        foreach ($admins as $admin) {
            $admin->notify(new contactnotifction($cotact));
        }

        return response()->json([
            'status'  => true,
            'message' => 'تم الحفظ بنجاح'
        ]);
    }

    public function validtion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|min:3|max:255',
            'massage' => 'required|string|min:5',
            'phone'   => 'required',
            'email'   => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        return response()->json([
            'status'  => true,
            'message' => 'تم الحفظ بنجاح'
        ]);
    }
}
