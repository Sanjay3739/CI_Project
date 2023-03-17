<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmsPage;

class CmsPagesController extends Controller
{
    public function index(Request $request)
    {
        $policies = CmsPage::
        orderBy('cms_page_id', 'asc')
        ->paginate(5);
        return view('policy', compact('policies')); 
    }
}


