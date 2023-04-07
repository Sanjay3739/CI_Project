<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Mission;


class BannerController extends Controller
{
    public function banner(Request $request)
    {
        $query = $request->input('search');
        $banners = Banner::whereNull('deleted_at')
            ->where(function ($q) use ($query) {
                $q->where('banners.text', 'like', '%' . $query . '%');
            })
            ->paginate(5);
        $banners->appends(['search' => $query]);

        return view('admin.banner.banner', compact('banners'));
    }


    public function add_banner()
    {
        return view('admin.banner.add_banner');
    }
    public function banner_add(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'sort_order' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png'
        ]);
        $request->image->store('public/uplodes');
        $banner = new Banner([
            "text" => $request->get('text'),
            "sort_order" => $request->get('sort_order'),
            "image" => $request->image->hashName()
        ]);
        $banner->save();
        return redirect("admin/banner")->with('message', 'New Banner added sucessfully');
    }
    public function edit_banner($banner_id)
    {
        $banner = Banner::where(['banner_id' => $banner_id])->first();
        return view('admin.banner.edit_banner', compact('banner'));
    }
    public function banner_edit(Request $request)
    {
        $request->validate([
            'text' => 'required',
            'sort_order' => 'required',
            'image' => 'mimes:jpeg,bmp,png'
        ]);
        $banner = Banner::where(['banner_id' => $request->get('banner_id')])->first();
        $image = $banner->image;
        if ($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->store('public/uplodes');
        }
        $banner = [
            "text" => $request->get('text'),
            "sort_order" => $request->get('sort_order'),
            "image" => $image,
        ];
        Banner::where('banner_id', $request->get('banner_id'))->update($banner);
        return redirect("admin/banner")->with('message', 'Banner updated sucessfully');
    }
    public function destroy($banner_id)
    {

        $banner = new Banner;
        $banner->find($banner_id)
            ->delete();
        return back()->with('success', 'Successfully Deleted');
    }
}
