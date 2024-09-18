<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()  //index fonksionu genellikle listeleme için kullanılır
    {
        $users = User::all();

        return view('admin.users.index')->with('users', $users); //admin/users/index.blade.php dosyasına $users değişkenini gönderiyoruz compact dizi fonksiyonu ile
    }

    public function show(User $user) //show fonksiyonu genellikle detay gösterme için kullanılır
    {
        return view('admin.users.show')->with('user', $user);
    }

}
