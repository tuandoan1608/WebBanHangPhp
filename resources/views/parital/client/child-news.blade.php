
<ul class="megamenu hb-megamenu">
    @foreach($news as $parent)
    <li><a href="{{route('tintuc.index',['id'=>$parent->id,'slug'=>$parent->slug])}}">{{$parent->name}}</a>
  
    </li>
    @endforeach

</ul>
