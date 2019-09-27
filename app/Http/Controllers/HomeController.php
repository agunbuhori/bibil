<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Dashboard;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    use Dashboard;
    
    public function index()
    {
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

    private function siswa()
    {
        return view('pages.dashboard.siswa');
    }

}
