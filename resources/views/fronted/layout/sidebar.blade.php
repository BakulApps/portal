<div class="col-xl-3 col-lg-4">
    <div class="sidebar-style">
        <div class="sidebar-search mb-40">
            <div class="sidebar-title mb-40">
                <h4>Pencarian</h4>
            </div>
            <form>
                <input type="text" placeholder="Cari....">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="sidebar-recent-post mb-35">
            <div class="sidebar-title mb-40">
                <h4>Artikel Terbaru</h4>
            </div>
            <div class="recent-post-wrap">
                @foreach($posts_sidebar as $post)
                <div class="single-recent-post">
                    <div class="recent-post-img">
                        <a href="{{route('article.detail', $post->post_id)}}">
                            <img src="{{asset($post->post_image == null ? 'assets/fronted/img/blog/blog-1.jpg' : $post->post_image)}}" alt="">
                        </a>
                    </div>
                    <div class="recent-post-content">
                        <h5><a href="{{route('article.detail', $post->post_id)}}">{{$post->post_title}}</a></h5>
                        <span>{{\App\Models\Category::name($post->post_category)}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="sidebar-category mb-40">
            <div class="sidebar-title mb-40">
                <h4>Kategori</h4>
            </div>
            <div class="category-list">
                <ul>
                    @foreach($category_sidebar as $category)
                    <li>
                        <a href="{{route('category', $category->category_id)}}">
                                {{$category->category_name}} <span>{{$category->post->where('post_category', $category->category_id)->count()}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="sidebar-tag-wrap">
            <div class="sidebar-title mb-40">
                <h4>Tag</h4>
            </div>
            <div class="sidebar-tag">
                <ul>
                    @foreach($tags_sidebar as $tag)
                    <li><a href="{{route('tag', $tag->tag_id)}}">{{$tag->tag_name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
