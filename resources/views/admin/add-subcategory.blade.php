
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    @include('admin.stylesheet')
</head>

<body>

    @include('admin.navigation')

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">


                       @include('admin.header')


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Sub Category</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">

                </div>
            </div>
        </div>

        @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
@endif


@if ($errors->any())
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     @foreach ($errors->all() as $error)

         {{$error}}

     @endforeach
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>
 @endif

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                       @if($demo_mode == 'on')
                           @include('admin.demo-mode')
                           @else
                       <form action="{{ route('admin.add-subcategory') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        @endif
                        <div class="card">



                           <div class="col-md-6">

                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">



                                            <div class="form-group">
{{--                                                <label for="cat_id" class="control-label mb-1">Category <span class="require">*</span></label>--}}
{{--                                                --}}
{{--                                                <select name="cat_id" class="form-control" required>--}}
{{--                                                <option value=""></option>--}}
{{--                                                @foreach($categoryData['category'] as $category)--}}
{{--                                                <option value="{{ $category->cat_id }}">{{ $category->category_name }}</option>--}}
{{--                                                @endforeach   --}}
{{--                                                </select>--}}


                                                <label for="name" class="control-label mb-1">Select Category <span class="require">*</span></label>
                                                <select name="cat_id" id="cat_id" class="form-control" data-bvalidator="required">
                                                    <option value="">Select</option>
                                                    @foreach($categories['menu'] as $menu)
                                                        <option value="{{ $menu->cat_id }}_0"><strong>{{ $menu->category_name }}</strong></option>
                                                        @foreach($menu->subcategory as $sub_category)
                                                            <option value="{{$menu->cat_id}}_{{$sub_category->subcat_id}}"> - {{ $sub_category->subcategory_name }}</option>
                                                            @if($sub_category->subChildren->isNotEmpty())
                                                                @php
                                                                    $i=1;
                                                                @endphp
                                                                @include('admin.sub-category-admin-section', [
                                                                    'childs' => $sub_category->subChildren
                                                                ])
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </select>




                                            </div>


                                             <div class="form-group">
                                                <label for="subcategory_name" class="control-label mb-1">Sub Category <span class="require">*</span></label>
                                                <input id="subcategory_name" name="subcategory_name" type="text" class="form-control" required>
                                            </div>


                                             <!--<div class="form-group">
                                                <label for="subcategory_status" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="subcategory_status" class="form-control" required>
                                                <option value=""></option>
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                                </select>

                                            </div> -->

                                              <input type="hidden" name="subcategory_status" value="1">


                                    </div>
                                </div>

                            </div>
                            </div>



                             <div class="col-md-6">




                             </div>


                            <div class="card-footer">
                                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
                                                    </div>




                        </div>


                    </form>

                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
