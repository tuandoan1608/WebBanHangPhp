@if($parent->categorychilrent->count())
<ul >
    @foreach($parent->categorychilrent as $child)
    
            <li><a href="shop-3-column.html">{{$child->name}}</a></li>

        
    @endforeach

</ul>
@endif