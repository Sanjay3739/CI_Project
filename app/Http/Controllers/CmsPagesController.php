<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmsPage;
use Illuminate\Support\Facades\Auth;

class CmsPagesController extends Controller
{
    public function index(Request $request)
    {
        $user=Auth::user();
        $policies = CmsPage::where('status','1')->paginate(10);
        return view('policy', compact('policies','user'));
    }
}


