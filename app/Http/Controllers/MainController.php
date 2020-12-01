<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Message;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $data ;

    public function __construct()
    {
        $categories     = Category::with('post')->limit(7)->get();
        $tags           = Tag::limit(10)->get();
        $posts          = Post::limit(3)->orderBy('created_at')->get();
        $this->data     = ['category_sidebar' => $categories, 'tags_sidebar' => $tags, 'posts_sidebar' => $posts];
    }
    public function home()
    {
        $meta   = [
            'title' => 'Portal Yayasan Darul Hikmah Menganti',
            'desc'  => 'Portal Resmi Yayasan Darul Hikmah Menganti Kedung Jepara',
            'keyword' => 'portal, portal resmi, portal yayasan, portal yayasan darul hikmah, portal yayasan darul hikmah menganti'
            ];
        $posts = Post::with('user')->with('comment')->limit(4)->orderBy('created_at')->get();
        $event = Event::where('event_date', '>', now())->limit(4)->get();
        $this->data = ['meta' => $meta, 'posts' => $posts, 'events' => $event];
        return view('home', $this->data);
    }

    public function article()
    {
        $this->data['meta']   = [
            'title' => 'Semua Artikel Yayasan Darul Hikmah Menganti',
            'desc'  => 'Semua Artikel Yayasan Darul Hikmah Menganti Kedung Jepara',
            'keyword' => 'portal, portal resmi, portal yayasan, portal yayasan darul hikmah, portal yayasan darul hikmah menganti, artikel, berita, acara, pengumuman'
        ];

        $this->data['posts'] = Post::with('user')->with('comment')->orderBy('created_at', 'ASC')->paginate(9);
        return view('blog', $this->data);
    }

    public function articledetail($id)
    {
        $post       = Post::with('tag')
            ->with('category')
            ->with('comment')
            ->with('user')
            ->find($id);
        $tag                        = $post->tag->pluck('tag_name')->toArray();
        $tags                       = '';
        $post_recents               = Post::with('comment')->where('post_category', $post->post_category)->get();
        $post->date                 = Carbon::parse($post->created_at)->formatLocalized('%I %b %Y');
        for ($i=0;$i<count($tag);$i++){
            $tags .= $tag[$i] . ', ';
        }
        $this->data['post']         = $post;
        $this->data['post_recents'] = $post_recents;
        $this->data['meta']         = [
            'title' => $post->post_title,
            'desc'  => substr($post->post_content, 0, 70),
            'keyword' => $tags . ' portal, portal resmi, portal yayasan, portal yayasan darul hikmah, portal yayasan darul hikmah menganti, artikel, berita, acara, pengumuman' ,
            'author' => $post->user->user_name
        ];

        return view('blog_detail', $this->data);
    }

    public function event()
    {
        $this->data = [
            'events'    => Event::orderBy('event_date')->paginate(9),
            'meta'      => [
                'title' => 'Semua Acara Yayasan Darul Hikmah Menganti',
                'desc'  => 'Semua Acara Yayasan Darul Hikmah Menganti Kedung Jepara',
                'keyword' => 'portal, portal resmi, portal yayasan, portal yayasan darul hikmah, portal yayasan darul hikmah menganti, artikel, berita, acara, pengumuman'
            ]
        ];
        return view('event', $this->data);
    }

    public function eventdetail($id)
    {
        $event = Event::find($id);

        $this->data['meta']   = [
            'title' => $event->event_name,
            'desc'  => substr($event->event_content, 0, 50),
            'keyword' => 'portal, portal resmi, portal yayasan, portal yayasan darul hikmah, portal yayasan darul hikmah menganti, artikel, berita, acara, pengumuman'
        ];
        $this->data['event'] = $event;
        return view('event_detail', $this->data);
    }

    public function category($id)
    {
        $this->data['meta']   = [
            'title' => 'Semua Kategori Yayasan Darul Hikmah Menganti',
            'desc'  => 'Semua kategori Yayasan Darul Hikmah Menganti Kedung Jepara',
            'keyword' => 'portal, portal resmi, portal yayasan, portal yayasan darul hikmah, portal yayasan darul hikmah menganti, artikel, berita, acara, pengumuman'
        ];
        $this->data['posts'] = Post::with('user')
            ->with('comment')
            ->where('post_category', $id)
            ->orderBy('created_at', 'ASC')
            ->paginate(9);
        return view('blog', $this->data);
    }

    public function tag($id)
    {
        $this->data['meta']   = [
            'title' => 'Semua Tagar Yayasan Darul Hikmah Menganti',
            'desc'  => 'Semua Tagar Yayasan Darul Hikmah Menganti Kedung Jepara',
            'keyword' => 'portal, portal resmi, portal yayasan, portal yayasan darul hikmah, portal yayasan darul hikmah menganti, artikel, berita, acara, pengumuman'
        ];
        $this->data['posts'] = Post::whereHas('tag', function ($q) use ($id){
            $q->where('entity__tags.tag_id', $id);
        })->paginate(9);
        return view('blog', $this->data);
    }

    public function contact(Request $request)
    {
        if ($request->isMethod('post')){
            $message = new Message();
            $message->message_name = $request->name;
            $message->message_email = $request->email;
            $message->message_subject = $request->subject;
            $message->message_content = $request->message;
            $message->save();
        }
        else {
            return view('contact');
        }
    }

    public function test()
    {
        $post = Post::with('tag')->find(1);
        $test = $post->tag->pluck('tag_name');
        $tag = '';
        for ($i=0;$i<count($test);$i++){
            $tag .= $test[$i] . ', ';
        }
        $tag = rtrim($tag, ", ");

        return response()->json($tag);
    }
}