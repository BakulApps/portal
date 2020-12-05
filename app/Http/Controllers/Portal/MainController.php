<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $data = [
            'posts' => Post::all(),
            'events'    => Event::all(),
            'comments'   => Comment::where('comment_parent', 0)->get(),
            'messages'   => Message::all()
        ];
        return view('portal.home', $data);
    }

    public function setting()
    {
        return view('portal.setting');
    }
}
