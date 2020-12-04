<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">
        <li class="nav-item"><a href="{{route('portal.home')}}" class="nav-link"><i class="icon-display"></i><span> Beranda</span></a></li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-newspaper2"></i> <span> Postingan</span></a>
            <ul class="nav nav-group-sub" data-submenu-title="Postingan">
                <li class="nav-item"><a href="{{route('portal.post.all')}}" class="nav-link">Semua</a></li>
                <li class="nav-item"><a href="{{route('portal.post.create')}}" class="nav-link">Buat Postingan</a></li>
                <li class="nav-item"><a href="{{route('portal.post.category')}}" class="nav-link">Kategori</a></li>
                <li class="nav-item"><a href="{{route('portal.post.tag')}}" class="nav-link">Tagar</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{route('portal.comment.all')}}" class="nav-link">
                <i class="icon-comment"></i>
                <span>Komentar</span>
                <span class="badge bg-blue-400 align-self-center ml-auto">{{\App\Models\Comment::unread()}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('portal.message.all')}}" class="nav-link">
                <i class="icon-mailbox"></i>
                <span>Perpesanan</span>
                <span class="badge bg-blue-400 align-self-center ml-auto">{{\App\Models\Message::unred()}}</span>
            </a>
        </li>
        <li class="nav-item"><a href="{{route('portal.setting')}}" class="nav-link"><i class="icon-cog"></i><span>Pengaturan</span></a></li>
    </ul>
</div>
