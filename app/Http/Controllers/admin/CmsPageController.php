<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\CmsPage;
use App\Http\Requests\StoreCmsPageRequest;
use App\Http\Requests\UpdateCmsPageRequest;

class CmsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cmsdata = CmsPage::where([
            ['title','!=',Null],
            [function ($query) use ($request) {
                if(($search = $request->s)) {
                    $query->orWhere('title', 'LIKE', '%' . $search . '%')
                          ->get();
                }
            }]
        ])->paginate(20)
          ->appends(['s'=>$request->s]);
        return view('admin.cmspage.index',compact('cmsdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cmspage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCmsPageRequest $request): RedirectResponse
    {
        // dd ($request);
        $request->validated();
        CmsPage::create($request->post());
        return redirect()->route('cmspage.index')->with('success','field has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CmsPage $cmsPage)
    {
        return view('admin.cmspage.edit', compact('cmsPage'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CmsPage $cmsPage, $cmsPageId)
    {
        $cmsPage = $cmsPage->find($cmsPageId);
        return view('admin.cmspage.edit',compact('cmsPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCmsPageRequest $request,$id): RedirectResponse
    {
        // dd($request);
        $request->validated();
        CmsPage::find($id)
                     ->fill($request->post())
                     ->save();
        return redirect()->route('cmspage.index')->with('success','field Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CmsPage $cmsPage,$id): RedirectResponse
    {
        $cmsPage->find($id)
        ->delete();
        return back()->with('success','field has been deleted successfully');
    }
}
