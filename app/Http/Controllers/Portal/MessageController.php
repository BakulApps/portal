<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function all(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'all'){
                $no = 1;
                foreach (Message::OrderBy('created_at', 'DESC')->get() as $message){
                    $data[] = [
                        $no++,
                        $message->message_name,
                        $message->message_email,
                        $message->message_subject,
                        '<div class="btn-group">
                            <a class="btn btn-outline-primary bt-sm btn-view" href="'.route('portal.message.detail', $message->message_id).'"><i class="icon-eye"></i></a>
                            <button class="btn btn-outline-primary bt-sm btn-delete" data-num="'.$message->message_id.'"><i class="icon-trash"></i></button>
                         </div>
                         '
                    ];
                };
                $msg = ['data' => empty($data) ? [] : $data];
            }
            elseif ($request->_type == 'delete'){
                try {
                    $message = Message::find($request->message_id);
                    if ($message->delete()){
                        $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Pesan berhasil dihapus.'];
                    }
                } catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            return response()->json($msg);
        }
        else {
            return view('portal.message_all');
        }
    }

    public function detail($id)
    {
        $message = Message::find($id);
        $message->update(['message_read' => 0]);
        return view('portal.message_detail', ['message' => $message]);
    }

}
