@php

  if(isset($ratings) && count($ratings) != 0) {
    $top = 0;
    $bottom = 0;

    foreach($ratings as $view) {
      if($view->rating == 1){ $value1 = $view->rating*1; } else { $value1 = 0; }
      if($view->rating == 2){ $value2 = $view->rating*2; } else { $value2 = 0; }
      if($view->rating == 3){ $value3 = $view->rating*3; } else { $value3 = 0; }
      if($view->rating == 4){ $value4 = $view->rating*4; } else { $value4 = 0; }
      if($view->rating == 5){ $value5 = $view->rating*5; } else { $value5 = 0; }
      $top += $value1 + $value2 + $value3 + $value4 + $value5;
      $bottom += $view->rating;
    }


    if(!empty(round($top/$bottom))) {
      $count_rating = round($top/$bottom);
    }else {
      $count_rating = 0;
    }
  }else {
    $count_rating = 0;
  }
@endphp

<div class="rating product--rating">
  <ul>
    @php $notStar = 5 - $count_rating; @endphp

    @for($i = 0; $i < $count_rating; $i++) 
      <li><span class="fa fa-star"></span></li>
    @endfor

    @for($j = 0; $j < $notStar; $j++) 
      <li><span class="fa fa-star-o"></span></li>
    @endfor
  </ul>
</div>