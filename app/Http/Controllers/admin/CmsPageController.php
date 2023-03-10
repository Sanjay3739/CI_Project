<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCmsPageRequest;
use App\Http\Requests\UpdateCmsPageRequest;
use App\Models\CmsPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CmsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $data = Cmspage::where([
            ['title', '!=', null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('title', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }],
        ])->paginate(10)
            ->appends(['s' => $request->s]);

        return view('admin.cmspage.index', compact('data'));
        // return view('admin.cmspage.index');
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
        $request->validated();

        CmsPage::create($request->post());

        return redirect()->route('cmspage.index')->with('success', 'field has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.cmspage.edit', compact('cmsPage'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(CmsPage $cmsPage, $cms_page_id)
    {
        $cmsPage = $cmsPage->find($cms_page_id);

        return view('admin.cmspage.edit', compact('cmsPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCmsPageRequest $request, CmsPage $cmsPage, $id): RedirectResponse
    {
        $request->validated();
        $cmsPage->find($id)
            ->fill($request->post())
            ->save();
        return redirect()->route('cmspage.index')->with('success', 'field Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CmsPage $cmsPage, $id): RedirectResponse
    {
        $cmsPage->find($id)
            ->delete();
        return back()->with('success', 'field has been deleted successfully');
    }
}
