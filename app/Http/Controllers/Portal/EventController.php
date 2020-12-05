<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function all(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'all'){
                $no = 1;
                foreach (Event::OrderBy('event_date_start', 'DESC')->get() as $event){
                    $data[] = [
                        $no++,
                        $event->event_title,
                        $event->date_start(),
                        $event->date_end(),
                        $event->event_time,
                        $event->event_place,
                        '<div class="btn-group">
                            <a class="btn btn-outline-primary bt-sm btn-view" target="_blank" href="'.route('event.detail', $event->event_id).'"><i class="icon-eye"></i></a>
                            <a class="btn btn-outline-primary bt-sm btn-view" href="'.route('portal.event.edit', $event->event_id).'"><i class="icon-pencil"></i></a>
                            <button class="btn btn-outline-primary bt-sm btn-delete" data-num="'.$event->event_id.'"><i class="icon-trash"></i></button>
                         </div>
                         '
                    ];
                };
                $msg = ['data' => empty($data) ? [] : $data];
            }
            elseif ($request->_type == 'delete'){
                try {
                    $event = Event::find($request->event_id);
                    if ($event->delete()){
                        $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Data Acara/Kegiatan berhasil dihapus.'];
                    }
                }catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            return response()->json($msg);
        }
        else {
            return view('portal.event_all');
        }
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'create'){
                $validator = Validator::make($request->all(), [
                    'event_image' => 'mimes:jpg,jpeg,png|max:512|nullable'
                ]);
                if ($validator->fails()) {
                    $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Berkas Harus Berekstensi jpg, jpeg, png dan Ukuran maksimal 512 Kb'];
                }
                else {
                    try {
                        $event = new Event();
                        if ($request->hasFile('event_image')){
                            $file = $request->file('event_image')->store('public/event');
                        }
                        $event->event_image         = isset($file) ? asset('storage' . preg_replace("/public/", "", $file)) : null;
                        $event->event_date_start    = Carbon::createFromFormat('d/m/Y', $request->event_date_start)->format('Y-m-d');
                        $event->event_date_end      = Carbon::createFromFormat('d/m/Y', $request->event_date_end)->format('Y-m-d');
                        $event->event_time          = $request->event_time;
                        $event->event_place         = $request->event_place;
                        $event->event_title         = $request->event_title;
                        $event->event_content       = $request->event_content;
                        if ($event->save()){
                            $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Acara/Kegiatan Berhasil ditambahkan, anda akan dialihkan kehalaman Acara/Kegiatan'];
                        }
                    }
                    catch (\Exception $e){
                        $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => $e->getMessage()];
                    }
                }
            }
            return response()->json($msg);
        }
        else {
            return view('portal.event_create');
        }
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'update'){
                $validator = Validator::make($request->all(), [
                    'event_image' => 'mimes:jpg,jpeg,png|max:512|nullable'
                ]);
                if ($validator->fails()) {
                    $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Berkas Harus Berekstensi jpg, jpeg, png dan Ukuran maksimal 512 Kb'];
                }
                else {
                    try {
                        $event = Event::find($id);
                        if ($request->hasFile('event_image')){
                            $file = $request->file('event_image')->store('public/event');
                        }
                        $event->event_image         = isset($file) ? asset('storage' . preg_replace("/public/", "", $file)) : null;
                        $event->event_date_start    = Carbon::createFromFormat('d/m/Y', $request->event_date_start)->format('Y-m-d');
                        $event->event_date_end      = Carbon::createFromFormat('d/m/Y', $request->event_date_end)->format('Y-m-d');
                        $event->event_time          = $request->event_time;
                        $event->event_place         = $request->event_place;
                        $event->event_title         = $request->event_title;
                        $event->event_content       = $request->event_content;
                        if ($event->save()){
                            $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Acara/Kegiatan Berhasil diperbarui, anda akan dialihkan kehalaman Acara/Kegiatan'];
                        }
                    }
                    catch (\Exception $e){
                        $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => $e->getMessage()];
                    }
                }
            }
            return response()->json($msg);
        }
        else {
            $event = Event::find($id);
            return view('portal.event_edit', ['event' => $event]);
        }
    }
}
