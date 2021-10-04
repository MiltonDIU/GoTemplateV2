@foreach($childs as $key=> $parent)
    <option value="{{$menu->cat_id}}_{{$parent->subcat_id}}">
        @for($j=0;$j<=$i; $j++)
            -
        @endfor
        {{ $parent->subcategory_name }}
        @if($parent->subChildren->isNotEmpty())
                @php
                    $i+=1;
                @endphp
            @include('admin.sub-category-admin-section', [
                'childs' => $parent->subChildren
            ])
        @endif
    </option>
@endforeach
