<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){

        // //tambah data user dengan Eloquent Model
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); //tambahkan data ke tabel m_user

        // $user = UserModel::all(); //Ambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);

        $data = [
            'level_id' => 2,
            'username'=> 'manager_tiga',
            'nama'=> 'Manager 3',
            'password'=> Hash::make('12345'),
        ];
        UserModel::create($data);
        
        // $user = UserModel::find(1);
        // return view('user', ['data' => $user]);
        $user = UserModel::all(); //Ambil semua data dari tabel m_user
        return view('user', ['data' => $user]);

    }
}

