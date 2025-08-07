<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    /**
     * Subscribe to newsletter.
     */
    public function subscribe(Request $request): JsonResponse
    {
        // اعتبارسنجی ایمیل
        $request->validate([
            'email' => 'required|email|max:255'
        ]);

        // بررسی تکراری نبودن ایمیل
        if (Newsletter::where('email', $request->email)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'این ایمیل قبلاً ثبت شده است.'
            ], 409); // کد وضعیت 409: Conflict
        }

        // ذخیره ایمیل در دیتابیس
        Newsletter::create([
            'email' => $request->email,
            'subscribed_at' => now()
        ]);

        // بازگرداندن پاسخ موفق
        return response()->json([
            'success' => true,
            'message' => 'عضویت در خبرنامه موفقیت آمیز بود!'
        ]);
    }
}
