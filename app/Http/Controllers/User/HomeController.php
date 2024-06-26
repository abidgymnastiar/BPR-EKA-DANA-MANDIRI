<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\KegiatanModel;
use App\Models\PromosiModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $kegiatan = KegiatanModel::limit(4)->get();
        $promosi = PromosiModel::limit(12)->get();
        return view('user.home',compact('kegiatan','promosi'));
    }
}
