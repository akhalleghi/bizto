<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    // ارسال کد تایید
    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^09[0-9]{9}$/',
            'action' => 'required|in:login,register',
            'first_name' => 'required_if:action,register',
            'last_name' => 'required_if:action,register',
            'business_name' => 'required_if:action,register',
            'business_type' => 'required_if:action,register'
        ]);

        $phone = $request->phone;
        $action = $request->action;

        // ایجاد کلید برای محدودیت نرخ
        $throttleKey = 'verification:' . $phone;

        // بررسی محدودیت نرخ
        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return response()->json([
                'error' => 'تعداد درخواست‌ها بیش از حد مجاز است.',
                'retry_after' => $seconds
            ], 429);
        }

        // ثبت درخواست
        RateLimiter::hit($throttleKey, 300); // 5 دقیقه محدودیت

        // تولید کد تصادفی
        $code = rand(10000, 99999);

        // ذخیره اطلاعات کاربر
        if ($action === 'register') {
            $user = User::updateOrCreate(
                ['phone' => $phone],
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'business_name' => $request->business_name,
                    'business_type' => $request->business_type,
                    'phone' => $phone, // اضافه کردن این خط
                    'verification_code' => $code,
                    'verification_code_expires_at' => now()->addMinutes(5),
                    'subscription_type' => 'free' // کاربر جدید به صورت رایگان ثبت می‌شود
                ]
            );
        } else {
            $user = User::where('phone', $phone)->first();

            if (!$user) {
                return response()->json(['error' => 'کاربری با این شماره موبایل ثبت نام نکرده است.'], 404);
            }

            $user->update([
                'verification_code' => $code,
                'verification_code_expires_at' => now()->addMinutes(5)
            ]);
        }

        // ارسال SMS (تابع پایین تعریف شده)
        $this->sendSMS($phone, $code, $action);

        return response()->json([
            'message' => 'کد تایید ارسال شد',
            'attempts_remaining' => RateLimiter::remaining($throttleKey, 3)
        ]);
    }

    // تایید کد
    public function verifyCode(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^09[0-9]{9}$/',
            'code' => 'required|digits:5',
            'action' => 'required|in:login,register',
            'first_name' => 'required_if:action,register',
            'last_name' => 'required_if:action,register',
            'business_name' => 'required_if:action,register',
            'business_type' => 'required_if:action,register'
        ]);

        $user = User::where('phone', $request->phone)
            ->where('verification_code', $request->code)
            ->where('verification_code_expires_at', '>', now())
            ->first();

        if (!$user) {
            return response()->json(['error' => 'کد تایید نامعتبر یا منقضی شده است'], 422);
        }

        // اگر عمل ثبت نام است، اطلاعات تکمیلی را ذخیره کنید
        if ($request->action === 'register') {
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'business_name' => $request->business_name,
                'business_type' => $request->business_type,
                'phone_verified_at' => now()
            ]);
        }

        // لاگین کاربر
        Auth::login($user);

        // پاک کردن کد تایید
        $user->update([
            'verification_code' => null,
            'verification_code_expires_at' => null
        ]);

        return response()->json([
            'redirect' => route('dashboard')
        ]);
    }

    // تابع ارسال SMS
    protected function sendSMS($phone, $code, $action)
    {
        try {
            $text = $action === 'register'
                ? "کد تایید ثبت نام در bizto: $code"
                : "کد تایید ورود به bizto: $code";

            // این بخش بستگی به سرویس SMS شما دارد
            ini_set("soap.wsdl_cache_enabled", "0");
            $sms_client = new \SoapClient('https://webservice.0098sms.com/service.asmx?wsdl', ['encoding' => 'UTF-8']);

            $parameters = [
                'username' => env('SMS_USERNAME'),
                'password' => env('SMS_PASSWORD'),
                'mobileno' => $phone,
                'pnlno' => env('SMS_SENDER_NUMBER'),
                'text' => $text,
                'isflash' => false
            ];

            $sms_client->SendSMS($parameters);

        } catch (\Exception $e) {
            Log::error('SMS sending failed: ' . $e->getMessage());
        }
    }
}

//
//namespace App\Http\Controllers\Auth;
//
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use App\Models\User;
//use Illuminate\Support\Facades\Log;
//use Illuminate\Support\Facades\RateLimiter;
//use Illuminate\Support\Str;
//
//class VerificationController extends Controller
//{
//    public function sendVerificationCode(Request $request)
//    {
//        $request->validate([
//            'phone' => 'required|regex:/^09[0-9]{9}$/'
//        ]);
//
//        // ایجاد کلید منحصر به فرد برای محدودیت نرخ
//        $throttleKey = 'verification:' . $request->phone;
//
//        // بررسی تعداد درخواست‌ها
//        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
//            $seconds = RateLimiter::availableIn($throttleKey);
//            return response()->json([
//                'error' => 'تعداد درخواست‌ها بیش از حد مجاز است.',
//                'retry_after' => $seconds
//            ], 429);
//        }
//
//        // ثبت درخواست
//        RateLimiter::hit($throttleKey, 300); // 5 دقیقه محدودیت
//
//        $code = rand(10000, 99999);
//
//        $user = User::updateOrCreate(
//            ['phone' => $request->phone],
//            [
//                'verification_code' => $code,
//                'verification_code_expires_at' => now()->addMinutes(5)
//            ]
//        );
//
//        $this->sendSMS($request->phone, $code);
//
//        return response()->json([
//            'message' => 'کد تایید ارسال شد',
//            'attempts_remaining' => RateLimiter::remaining($throttleKey, 3)
//        ]);
//    }
//
//    // ... بقیه متدها بدون تغییر
//}
