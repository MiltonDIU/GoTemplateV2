@foreach($childs as $key=> $parent)
    <option value="subcategory_{{$parent->subcat_id}}">
    @for($j=0;$j<=$i; $j++)
            -
        @endfor
        {{ $parent->subcategory_name }}
        @if($parent->subChildren->isNotEmpty())
                @php
                    $i+=1;
                @endphp
            @include('admin.sub-category-item-add', [
                'childs' => $parent->subChildren
            ])
        @endif
    </option>
@endforeach
