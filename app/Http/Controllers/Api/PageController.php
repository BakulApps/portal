<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function update(Request $request)
    {
        try {
            $page = Page::where('page_name', $request->page_name)->first();
            if ($request->hasFile('page_value')){
                Storage::delete('public/'.$page->page_value);
                $image = $request->file('page_value');
                $image->store('/public/images/page/');
                $page->page_value = 'storage/images/page/' . $image->hashName();
            }
            else {
                $page->page_value = $request->page_value;
            }
            if ($page->save()){
                $msg = ['status' => 'success', 'msg' => 'Pengaturan halaman sukses di perbarui.'];
            }
        }
        catch (\Exception $e){
            $msg = ['status' => 'failed', 'msg' => $e->getMessage()];
        }
        return response()->json($msg);
    }

    public function view()
    {
        return response()->json(Page::all());
    }
}
