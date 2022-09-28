<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'slider_bg_image' => 'required|mimes:jpg,png,jpeg|max:512',
                'slider_image' => 'required|mimes:jpg,png,jpeg|max:512',
                'slider_title' => 'required',
                'slider_content' => 'required',
                'slider_button' => 'nullable',
            ], [
                'slider_bg_image.required' => 'Gambar latar belakang tidak boleh kosong, silahkan memilih gambar terlebih dahulu.',
                'slider_bg_image.mimes' => 'Gambar latar belakang harus berfomat jpg, png atau jpeg.',
                'slider_bg_image.max' => 'Gambar latar belakang ukuran maksimal 512K.',
                'slider_image.required' => 'Gambar tidak boleh kosong, silahkan memilih gambar terlebih dahulu.',
                'slider_image.mimes' => 'Gambar harus berfomat jpg, png atau jpeg.',
                'slider_image.max' => 'Gambar ukuran maksimal 512K.',
                'slider_title.required' => 'Kolong judul Slider tidak boleh kosong.',
                'slider_content.required' => 'Kolong Kontent Slider tidak boleh kosong.',
            ]);
            if ($validator->fails()){
                throw new \Exception(Arr::first(Arr::flatten($validator->getMessageBag()->get('*'))));
            }
            else {
                $slider = new Slider();
                if ($request->hasFile('slider_bg_image')){
                    $bg_image = $request->file('slider_bg_image');
                    $bg_image->store('/public/images/slider/');
                    $slider->slider_bg_image = 'images/slider/' . $bg_image->hashName();
                }
                if ($request->hasFile('slider_image')){
                    $image = $request->file('slider_image');
                    $image->store('/public/images/slider/');
                    $slider->slider_image = 'images/slider/' . $image->hashName();
                }
                $slider->slider_title = $request->slider_title;
                $slider->slider_content = $request->slider_content;
                $slider->slider_button = $request->slider_button;
                $slider->slider_creater = 1;
                if ($slider->save()){
                    $msg = ['status' => 'success', 'msg' => 'Slider berhasil disimpan'];
                }
            }
        }
        catch (\Exception $e){
            $msg = ['status' => 'failed', 'msg' => $e->getMessage()];
        }
        return response()->json($msg);
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'slider_bg_image' => 'required|mimes:jpg,png,jpeg|max:512',
                'slider_image' => 'required|mimes:jpg,png,jpeg|max:512',
                'slider_title' => 'required',
                'slider_content' => 'required',
                'slider_button' => 'nullable',
            ], [
                'slider_bg_image.required' => 'Gambar latar belakang tidak boleh kosong, silahkan memilih gambar terlebih dahulu.',
                'slider_bg_image.mimes' => 'Gambar latar belakang harus berfomat jpg, png atau jpeg.',
                'slider_bg_image.max' => 'Gambar latar belakang ukuran maksimal 512K.',
                'slider_image.required' => 'Gambar tidak boleh kosong, silahkan memilih gambar terlebih dahulu.',
                'slider_image.mimes' => 'Gambar harus berfomat jpg, png atau jpeg.',
                'slider_image.max' => 'Gambar ukuran maksimal 512K.',
                'slider_title.required' => 'Kolong judul Slider tidak boleh kosong.',
                'slider_content.required' => 'Kolong Kontent Slider tidak boleh kosong.',
            ]);
            if ($validator->fails()){
                throw new \Exception(Arr::first(Arr::flatten($validator->getMessageBag()->get('*'))));
            }
            else {
                $slider = Slider::find($request->slider_id);
                if ($request->hasFile('slider_bg_image')){
                    Storage::delete('public/'.$slider->slider_bg_image);
                    $bg_image = $request->file('slider_bg_image');
                    $bg_image->store('/public/images/slider/');
                    $slider->slider_bg_image = 'storage/images/slider/' . $bg_image->hashName();
                }
                if ($request->hasFile('slider_image')){
                    $image = $request->file('slider_image');
                    Storage::delete('public/'.$slider->slider_image);
                    $image->store('/public/images/slider/');
                    $slider->slider_image = 'storage/images/slider/' . $image->hashName();
                }
                $slider->slider_title = $request->slider_title;
                $slider->slider_content = $request->slider_content;
                $slider->slider_button = $request->slider_button;
                $slider->slider_creater = 1;
                if ($slider->save()){
                    $msg = ['status' => 'success', 'msg' => 'Slider berhasil diperbarui'];
                }
            }
        }
        catch (\Exception $e){
            $msg = ['status' => 'failed', 'msg' => $e->getMessage()];
        }
        return response()->json($msg);
    }

    public function delete(Request $request)
    {
        $slider = Slider::where('slider_id', $request->slider_id)->first();
        try {
            if ($slider->delete()){
                Storage::delete('public/'.$slider->slider_bg_image);
                Storage::delete('public/'.$slider->slider_image);
                $msg = ['status' => 'success', 'msg' => 'Data Slider berhasil di hapus.'];
            }
        }
        catch (\Exception $e){
            $msg = ['status' => 'failed', 'msg' => $e->getMessage()];
        }
        return response()->json($msg);
    }

    public function view(Request $request)
    {
        if ($request->_type == 'datatable'){
            $no = 1;
            foreach (Slider::OrderBy('created_at', 'DESC')->get() as $slider){
                $data[] = [
                    $no++,
                    $slider->slider_title,
                    $slider->slider_content,
                    $slider->slider_status == 1 ? '<span class="badge badge-success">Terbit</span>' : '<span class="badge badge-danger">Arsip</span>',
                    $slider->slider_bg_image,
                    $slider->slider_image,
                    '<div class="btn-group">
                            <button class="btn btn-outline-primary bt-sm btn-edit" data-num="'.$slider->post_id.'"><i class="icon-pencil"></i></button>
                            <button class="btn btn-outline-primary bt-sm btn-delete" data-num="'.$slider->post_id.'"><i class="icon-trash"></i></button>
                         </div>
                         '
                ];
            };
            $msg = ['data' => empty($data) ? [] : $data];
        }
        elseif ($request->_type == 'single')
        {
            $msg = Slider::find($request->slider_id);
        }

        return response()->json($msg);
    }
}
