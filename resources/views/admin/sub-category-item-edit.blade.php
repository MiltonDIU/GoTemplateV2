@foreach($childs as $key=> $parent)
    <option value="subcategory_{{$parent->subcat_id}}" @if($cat_name == 'subcategory') @if($parent->subcat_id == $cat_id) selected="selected" @endif @endif>
    @for($j=0;$j<=$i; $j++)
            -
        @endfor
        {{ $parent->subcategory_name }}
        @if($parent->subChildren->isNotEmpty())
                @php
                    $i+=1;
                @endphp
            @include('admin.sub-category-item-edit', [
                'childs' => $parent->subChildren
            ])
        @endif
    </option>
@endforeach
