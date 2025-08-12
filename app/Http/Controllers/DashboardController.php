<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // تعیین نوع کاربر بر اساس subscription_type
        $userType = match($user->subscription_type) {
            'free' => 'کاربر رایگان',
            'silver' => 'کاربر نقره‌ای',
            'gold' => 'کاربر طلایی',
            'diamond' => 'کاربر الماس',
            'custom' => 'کاربر سفارشی',
            default => 'کاربر'
        };

        return view('dashboard', [
            'userType' => $userType,
            'user' => $user
        ]);
    }
}
