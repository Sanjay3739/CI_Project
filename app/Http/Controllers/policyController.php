<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CmsPage;
class policyController extends Controller
{
    public function policy(Request $request)
    {

        $policies = CmsPage::orderBy('cms_page_id', 'asc')
        ->paginate(12);

        return view('admin.policy.login-policy', compact('policies'));
    }


}
