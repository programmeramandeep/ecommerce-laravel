<ul class="social-content-list">
    @foreach($items as $menu_item)
    <li><a href="{{ $menu_item->link() }}" target="_blank"><i class="fa {{ $menu_item->title }}"></i></a></li>
    @endforeach
</ul>