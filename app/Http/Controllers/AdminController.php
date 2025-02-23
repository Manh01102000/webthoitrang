<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash; // ✅ Import Hash đúng
use App\Models\City;
use App\Models\Admin; // Import model Admin

class AdminController extends Controller
{
    public function createAdmin(Request $request)
    {

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // 🔥 Mã hóa mật khẩu trước khi lưu
        ]);

    }

    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) { // ✅ Sử dụng Hash đúng cách
            session(['admin_id' => $admin->id]); // Lưu vào session
            return redirect('/admin');
        }

        return back()->with('error', 'Sai thông tin đăng nhập!');
    }

    public function dashboard()
    {
        dd("Route chạy");
        return view('admin.dashboard');
    }
}
