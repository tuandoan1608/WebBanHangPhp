<!-- @if($menuparent->categorychilrent->count())
<ul class="megamenu hb-megamenu">
    @foreach($menuparent->categorychilrent as $parent)
    <li><a href="shop-left-sidebar.html">{{$parent->name}}</a>
    @include('parital.client.parentmenu',['parent'=>$parent])
    </li>
    @endforeach

</ul>
@endif -->