<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Dashboard;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{

    use Dashboard;
    
    public function index()
    {
        // dd(Auth::user()->role);
        switch (Auth::user()->role) {
            case 'admin':
                return $this->admin();
                break;
            case 'guru':
                return $this->guru();
                break;
            case 'siswa':
                return $this->siswa();
                break;
            case 'ortu':
                return $this->ortu();
                break;
        }
    }

    private function admin()
    {
        $widget = $this->widget();
        $ujian  = $this->ujianTerakhir();
        return view('pages.dashboard.admin', compact('widget', 'ujian'));
    }

    private function guru()
    {
        return view('pages.dashboard.guru');
    }
    private function ortu()
    {
        return view('pages.dashboard.ortu');
    }

    private function siswa()
    {
        return view('pages.dashboard.siswa');
    }

    public function showProfileAdmin()
    {
        $user = auth()->user();
        $profiles = DB::table('users')
        ->where('id', $user->id)
        ->first();
        
        return view('pages.dashboard.profiles.admin', compact('profiles'));
    }

}
