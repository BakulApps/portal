<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function create(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'create'){
                $validator = Validator::make($request->all(), [
                    'post_image' => 'mimes:jpg,jpeg,png|max:512|nullable'
                ]);
                if ($validator->fails()) {
                    $msg = ['title' => 'Kesalahan !', 'class' => 'danger', 'text' => 'Berkas Harus Berekstensi jpg, jpeg, png dan Ukuran maksimal 512 Kb'];
                }
                else {
                    try {
                        $post = new Post();
                        if ($request->hasFile('post_image')){
                            $file = $request->file('post_image')->store('public/blog');
                        }
                        $post->post_image       = isset($file) ? asset('storage' . preg_replace("/public/", "", $file)) : null;
                        $post->post_author      = auth('user')->user()->user_id;
                        $post->post_category    = $request->post_category;
                        $post->post_title       = $request->post_title;
                        $post->post_content     = $request->post_content;
                        $post->post_comment     = $request->post_comment;
                        $post->post_status      = $request->post_status;
                        if ($post->save()){
                            $tags = explode(',', $request->post_tag);
                            $post->tag()->attach($tags);
                            $msg = ['title' => 'Berhasil !', 'class' => 'success', 'text' => 'Postingan Berhasil ditambahkan'];
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
            return view('portal.post_create');
        }
    }

    public function edit(Request $request, $id){
        if ($request->isMethod('post')){

        }
        else {
            $post = Post::with('tag')
                ->with('user')
                ->find($id);
            $tags = $post->tag->pluck('tag_id');
            return view('portal.post_edit', ['post' => $post, 'tags' => $tags]);
        }
    }

    public function all(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'all'){
                $no = 1;
                foreach (Post::with('user')->OrderBy('created_at', 'DESC')->get() as $post){
                    $data[] = [
                        $no++,
                        $post->post_title,
                        $post->user->user_name,
                        Carbon::parse($post->created_at)->format('d/m/Y'),
                        $post->post_status == 1 ? '<span class="badge badge-success">Terbit</span>' : '<span class="badge badge-danger">Arsip</span>',
                        '<div class="btn-group">
                            <a class="btn btn-outline-primary bt-sm btn-show" target="_blank" href="'.route('article.detail', $post->post_id).'"><i class="icon-eye"></i></a>
                            <a class="btn btn-outline-primary bt-sm btn-edit" href="'.route('portal.post.edit', $post->post_id).'"><i class="icon-pencil"></i></a>
                            <button class="btn btn-outline-primary bt-sm btn-delete" data-num="'.$post->post_id.'"><i class="icon-trash"></i></button>
                         </div>
                         '
                    ];
                };
                $msg = ['data' => empty($data) ? [] : $data];
            }
            elseif ($request->_type == 'delete'){
                try {
                    $post = Post::find($request->post_id);
                    $post->tag()->detach();
                    if ($post->delete()){
                        $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Data Postingan berhasil dihapus.'];
                    }
                }catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            elseif ($request->_type == 'route' && $request->_data == 'create'){
                $msg = ['route' => route('portal.post.create')];
            }
            return response()->json($msg);
        }
        else {
            return view('portal.post_all');
        }
    }

    public function category(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'all'){
                $no = 1;
                foreach (Category::OrderBy('category_name')->get() as $category){
                    $data[] = [
                        $no++,
                        $category->category_name,
                        $category->category_desc,
                        '<div class="btn-group">
                            <button class="btn btn-outline-primary bt-sm btn-edit" data-num="'.$category->category_id.'"><i class="icon-pencil"></i></button>
                            <button class="btn btn-outline-primary bt-sm btn-delete" data-num="'.$category->category_id.'"><i class="icon-trash"></i></button>
                         </div>
                         '
                    ];
                };
                $msg = ['data' => empty($data) ? [] : $data];
            }
            elseif ($request->_type == 'data' && $request->_data == 'category'){
                $msg = Category::where('category_id', $request->category_id)->first();
            }
            elseif ($request->_type == 'store'){
                try {
                    if (Category::create([
                        'category_name' => $request->category_name,
                        'category_desc' => $request->category_desc,

                    ])){
                        $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Kategori berhasil di simpan.'];
                    }
                } catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            elseif ($request->_type == 'update'){
                try {
                    if (Category::where('category_id', $request->category_id)->update([
                        'category_name' => $request->category_name,
                        'category_desc' => $request->category_desc,
                    ])){
                        $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Kategori berhasil diperbarui.'];
                    }
                } catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            elseif ($request->_type == 'delete'){
                try {
                    $category = Category::find($request->category_id);
                    if ($category->delete()){
                        $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Kategori berhasil dihapus.'];
                    }
                } catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            elseif ($request->_type = 'data' && $request->_data == 'json'){
                foreach (Category::OrderBy('category_name')->get() as $category){
                    $data[] = [
                        'id' => $category->category_id,
                        'text' => $category->category_name,
                    ];
                };
                $msg = empty($data) ? [] : $data;
            }
            return response()->json($msg);
        }
        else {
            return view('portal.post_category');
        }
    }

    public function tag(Request $request)
    {
        if ($request->isMethod('post')){
            if ($request->_type == 'data' && $request->_data == 'all'){
                $no = 1;
                foreach (Tag::OrderBy('tag_name')->get() as $tag){
                    $data[] = [
                        $no++,
                        $tag->tag_name,
                        $tag->tag_desc,
                        '<div class="btn-group">
                            <button class="btn btn-outline-primary bt-sm btn-edit" data-num="'.$tag->tag_id.'"><i class="icon-pencil"></i></button>
                            <button class="btn btn-outline-primary bt-sm btn-delete" data-num="'.$tag->tag_id.'"><i class="icon-trash"></i></button>
                         </div>
                         '
                    ];
                };
                $msg = ['data' => empty($data) ? [] : $data];
            }
            elseif ($request->_type == 'data' && $request->_data == 'tag'){
                $msg = Tag::where('tag_id', $request->tag_id)->first();
            }
            elseif ($request->_type == 'store'){
                try {
                    if (Tag::create([
                        'tag_name' => $request->tag_name,
                        'tag_desc' => $request->tag_desc,

                    ])){
                        $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Kategori berhasil di simpan.'];
                    }
                } catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            elseif ($request->_type == 'update'){
                try {
                    if (Tag::where('tag_id', $request->tag_id)->update([
                        'tag_name' => $request->tag_name,
                        'tag_desc' => $request->tag_desc,
                    ])){
                        $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Kategori berhasil diperbarui.'];
                    }
                } catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            elseif ($request->_type == 'delete'){
                try {
                    $tag = Tag::find($request->tag_id);
                    if ($tag->delete()){
                        $msg = ['title' => 'Sukses !', 'class' => 'success', 'text' => 'Kategori berhasil dihapus.'];
                    }
                } catch (\Exception $e){
                    $msg = ['title' => 'Gagal !', 'class' => 'danger', 'text' => $e->getMessage()];
                }
            }
            elseif ($request->_type = 'data' && $request->_data == 'json'){
                foreach (Tag::OrderBy('tag_name')->get() as $tag){
                    $data[] = [
                        'id' => $tag->tag_id,
                        'text' => $tag->tag_name,
                    ];
                };
                $msg = empty($data) ? [] : $data;
            }
            return response()->json($msg);
        }
        else {
            return view('portal.post_tags');
        }
    }

    public function test()
    {
        $post = Post::with('tag')->find(1);
        $post->tag = $post->tag->pluck('tag_id');
        return response()->json($post->tag);
    }
}
