<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            return redirect(route('admin.index'));
        }
        return redirect()->back()->withErrors([
            'login' => 'Giriş Bilgileri Hatalı'
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('admin.login'));
    }

    public function register(Request $request)
    {
        $data = $request->only('name', 'surname', 'email', 'password', 'repassword'); // sadece name, email ve password alanlarını alır
        //dd($data);

        if ($data['password'] != $data['repassword']) {
            $message = ['type' => 'danger', 'description' => 'Şifreler Uyuşmuyor'];
            return redirect()->back()->withInput()->with(['message'=>$message]);
        }

        User::create([
            'name' => $data['name'] . ' ' . $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        $message = ['type' => 'success', 'description' => 'Kullanıcı Başarıyla oluşturuldu.Giriş Yapabilirsiniz'];
        return redirect(route('admin.login'))->with(['message'=>$message]);


    }
}
