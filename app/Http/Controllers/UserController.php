<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // public function index(){

    //     $user = UserModel::all(); //Ambil Semua Data
    //     return view('user' , ['data' => $user]);
    // }

    public function tambah(){
        return view('user_tambah');
    }

    public function tambahSimpan(Request $request) {
    UserModel::create([
        'username' => $request->username,
        'nama' => $request->nama,
        'password' => Hash::make($request->password),
        'level_id' => $request->level_id,
    ]);
     
      return redirect('/user');
    }

    public function ubah($id) {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' =>$user]);
    }
    public function ubah_simpan($id, Request $request) {
      $user = UserModel::find($id);
      $user->username = $request->username;
      $user->nama = $request->nama;
      $user->password = Hash::make('$request->password');
      $user->level_id = $request->level_id;

    $user->save();
    }
    
    public function hapus($id) {
    $user = UserModel::find($id);
    $user->delete();
    return redirect('/user');

    }

    public function index(){
    
    $user = UserModel::with('level')->get();
    return view('user', ['data' =>$user]);

    }
}




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

        // $data = [
        //     'level_id' => 2,
        //     'username'=> 'manager_tiga',
        //     'nama'=> 'Manager 3',
        //     'password'=> Hash::make('12345'),
        // ];
        // UserModel::create($data);
        
        // $user = UserModel::find(1);
        // $user = UserModel::firstWhere('level_id', 1);
        // $user = UserModel::findOr (20, ['username','nama'], function()
        //         {abort(404); });
        // $user = UserModel::findOrFail(1);
        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);
        // $user = UserModel::Create(
        //     [
        //         'username' => 'manager11',
        //         'nama' => 'Manager11',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ],
        // );

        // $user->username = 'manager12';
        // $user->save();

        //  return view('user', ['data' => $user]);
        //  $user->wasChanged(); // true
        // $user->wasChanged('username'); // true
        // $user->wasChanged(['username', 'level_id']); // true
        // $user->wasChanged('nama'); // false
        // dd($user->wasChanged(['nama', 'username'])); //true

        // $user->isDirty(); //True
        // $user->isDirty('username'); // True
        // $user->isDirty('nama'); // False
        // $user->isDirty(['nama', 'username']); //True

        // $user->isClean(); // False
        // $user->isClean('username'); // False
        // $user->isClean('nama'); // True
        // $user->isClean(['nama', 'username']); //False



        // $user->isDirty(); //False
        // $user->isClean(); //True
        // dd($user->isDirty());

        // $user->save();
        // return view('user', ['data' => $user]);
        // $user = UserModel::all(); //Ambil semua data dari tabel m_user
        // return view('user', ['data' => $user]);
    




