<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('frontend.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // يمكنك هنا إرسال البريد أو حفظ الرسالة في قاعدة البيانات
        // على سبيل المثال فقط، سنعيد المستخدم مع رسالة نجاح
        return back()->with('success', 'تم إرسال رسالتك بنجاح!');
    }
}
