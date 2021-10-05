<ul class="dd">
   @foreach($childs as $key=> $parent)
       <li>
            <a class="fly" tabindex="1" href="{{ URL::to('/shop/subcategory/') }}/{{$parent->subcat_id}}/{{$parent->subcategory_slug}}">
               {{ $parent->subcategory_name }}
               @if($parent->subChildren->isNotEmpty())
                   <i class="fa fa-angle-right ml-1 md-hide-element"></i>
                   <i class="fa fa-angle-down ml-1 md-show-element"></i>
                @endif
            </a>

            @if($parent->subChildren->isNotEmpty())
               @include('sub-menu', [
                   'childs' => $parent->subChildren
               ])
            @endif
       </li>
   @endforeach
</ul>
