<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:super-admin');
    }

    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        try {
            $data = $request->except('_token', '_method');

            foreach ($data as $key => $value) {
                $setting = Setting::where('key', $key)->first();

                if ($setting) {
                    if ($setting->type == 'image' && $request->hasFile($key)) {
                        // التحقق من صحة الملف
                        $request->validate([
                            $key => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                        ]);

                        // حذف الصورة القديمة إذا وجدت
                        if ($setting->value) {
                            Storage::disk('public')->delete('settings/' . $setting->value);
                        }

                        // حفظ الصورة الجديدة
                        $image = $request->file($key);
                        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                        // الحفظ باستخدام نظام التخزين في لارافيل
                        $path = $image->storeAs('settings', $imageName, 'public');

                        // تعيين القيمة الجديدة
                        $value = $imageName;
                    }

                    // تحديث القيمة في قاعدة البيانات
                    $setting->update(['value' => $value]);
                }
            }

            return redirect()->route('settings.index')
                ->with('success', 'تم تحديث الإعدادات بنجاح');
        } catch (\Exception $e) {
            Log::error('حدث خطأ في تحديث الإعدادات: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء التحديث: ' . $e->getMessage())
                ->withInput();
        }
    }
}
