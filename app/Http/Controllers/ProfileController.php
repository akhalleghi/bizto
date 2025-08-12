<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'business_type' => 'required|string'
        ]);

        $user = Auth::user();
        $user->update($request->all());

        return redirect()->route('profile.edit')
            ->with('success', 'پروفایل با موفقیت به‌روزرسانی شد');
    }
}
