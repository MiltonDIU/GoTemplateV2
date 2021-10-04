<?php echo $__env->make('version', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <?php echo $__env->make('admin.stylesheet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>

    <?php echo $__env->make('admin.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">


                       <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Edit Item - <?php echo e($type_name->item_type_name); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">

                </div>
            </div>
        </div>

        <?php if(session('success')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
    </div>
<?php endif; ?>


<?php if($errors->any()): ?>
    <div class="col-sm-12">
     <div class="alert  alert-danger alert-dismissible fade show" role="alert">
     <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <?php echo e($error); ?>


     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
     </div>
    </div>
 <?php endif; ?>

       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">




                        <div class="card">
                           <?php if($demo_mode == 'on'): ?>
                           <?php echo $__env->make('admin.demo-mode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                           <?php else: ?>
                           <form action="<?php echo e(route('admin.edit-item')); ?>" class="setting_form" id="item_form" method="post" enctype="multipart/form-data">
                           <?php echo e(csrf_field()); ?>

                           <?php endif; ?>


                             <div class="col-md-6">

                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <?php /*?><div class="form-group">
                                                <label for="name" class="control-label mb-1">Item Type <span class="require">*</span></label>

                                                <select name="item_type" id="item_type" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                   @foreach($getWell['type'] as $value)

                                                    <option value="{{ $value->item_type_slug }}" @if($edit['item']->item_type == $value->item_type_slug) selected="selected" @endif>{{ $value->item_type_name }}</option>
                                                   @endforeach
                                                </select>
                                            </div><?php */?>

                                             <input type="hidden" name="item_type" value="<?php echo e($edit['item']->item_type); ?>">
                                            <input type="hidden" name="type_id" value="<?php echo e($typer_id); ?>">

                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Item Name<span class="require">*</span></label>
                                               <input type="text" id="item_name" name="item_name" class="form-control" value="<?php echo e($edit['item']->item_name); ?>" data-bvalidator="required,maxlen[100]">

                                            </div>

                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Product Overview <span class="require">*</span></label>
                                                <textarea name="item_shortdesc" rows="6"  class="form-control" data-bvalidator="required"><?php echo e($edit['item']->item_shortdesc); ?></textarea>

                                            </div>

                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Product Features &amp; Details <span class="require">*</span></label>

                                            <textarea name="item_desc" id="summary-ckeditor" rows="6"  class="form-control" data-bvalidator="required"><?php echo e(html_entity_decode($edit['item']->item_desc)); ?></textarea>
                                            </div>


                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Upload Thumbnail <span class="require">*</span> </label><br/>
                                                <input type="file" id="item_thumbnail" name="item_thumbnail" class="files"><small>(Size : 255x165px)</small><br/>
                                        <?php if($edit['item']->item_thumbnail!=''): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($edit['item']->item_thumbnail); ?>" alt="<?php echo e($edit['item']->item_name); ?>" class="item-thumb">
                                        <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($edit['item']->item_name); ?>" class="item-thumb">
                                        <?php endif; ?>

                                            </div>


                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Upload Preview <span class="require">*</span> </label><br/>
                                                <input type="file" id="item_preview" name="item_preview" class="files"><small>(Size : 350x235px)</small><br/>
                                        <?php if($edit['item']->item_preview!=''): ?>
                                        <img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($edit['item']->item_preview); ?>" alt="<?php echo e($edit['item']->item_name); ?>" class="item-thumb">
                                        <?php else: ?>
                                        <img src="<?php echo e(url('/')); ?>/public/img/no-image.png" alt="<?php echo e($edit['item']->item_name); ?>" class="item-thumb">
                                        <?php endif; ?>

                                            </div>



                                             <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Upload Main File  <span class="require">*</span> </label><br/>
                                                <input type="file" id="item_file" name="item_file" class="files"><small>(ZIP - All files)</small>

                                                <?php if($allsettings->site_s3_storage == 1): ?>
                                                    <?php $fileurl = Storage::disk('s3')->url($edit['item']->item_file); ?>
                                                    <br/><a href="<?php echo e($fileurl); ?>" class="blue-color" download><?php echo e($edit['item']->item_file); ?></a>
                                                    <?php else: ?>
                                                    <br/><?php if($edit['item']->item_file!=''): ?><a href="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($edit['item']->item_file); ?>" class="blue-color" download><?php echo e($edit['item']->item_file); ?></a><?php endif; ?>
                                                    <?php endif; ?>


                                            </div>

                                            <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Upload Screenshots (multiple) </label><br/>
                                                <input type="file" id="item_screenshot" name="item_screenshot[]" class="files"><small>(Size : 700x400px)</small><br/><br/><?php $__currentLoopData = $item_image['item']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <div class="item-img"><img src="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($item->item_image); ?>" alt="<?php echo e($item->item_image); ?>" class="item-thumb">
                                                    <a href="<?php echo e(url('/admin/edit-item')); ?>/dropimg/<?php echo e(base64_encode($item->itm_id)); ?>" onClick="return confirm('Are you sure you want to delete?');" class="drop-icon"><span class="ti-trash drop-icon"></span></a>
                                                    </div>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <div class="clearfix"></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Video Preview Type (optional) </label>
                                               <select name="video_preview_type" id="video_preview_type" class="form-control">
                                                <option value=""></option>
                                                    <option value="youtube" <?php if($edit['item']->video_preview_type == 'youtube'): ?> selected <?php endif; ?>>Youtube</option>
                                                    <option value="mp4" <?php if($edit['item']->video_preview_type == 'mp4'): ?> selected <?php endif; ?>>MP4</option>
                                                </select>
                                            </div>

                                            <div id="youtube" <?php if($edit['item']->video_preview_type == 'youtube'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="name" class="control-label mb-1">Youtube Video URL <span class="require">*</span></label>

                                                <input type="text" id="video_url" name="video_url" class="form-control" value="<?php echo e($edit['item']->video_url); ?>" data-bvalidator="required">
                                        <small>(example : https://www.youtube.com/watch?v=C0DPdy98e4c)</small>
                                            </div>

                                            <div id="mp4" <?php if($edit['item']->video_preview_type == 'mp4'): ?> class="form-group force-block" <?php else: ?> class="form-group force-none" <?php endif; ?>>
                                                <label for="site_desc" class="control-label mb-1">Upload MP4 Video <span class="require">*</span></label><br/>
                                                <input type="file" id="video_file" name="video_file" class="files"><small>(MP4 - file only)</small>
                                                <?php if($allsettings->site_s3_storage == 1): ?>
                                                    <?php $videofileurl = Storage::disk('s3')->url($edit['item']->video_file); ?>
                                                    <br/><a href="<?php echo e($videofileurl); ?>" class="blue-color" download><?php echo e($edit['item']->video_file); ?></a>
                                                    <?php else: ?>
                                                    <br/><?php if($edit['item']->video_file!=''): ?><a href="<?php echo e(url('/')); ?>/public/storage/items/<?php echo e($edit['item']->video_file); ?>" class="blue-color" download><?php echo e($edit['item']->video_file); ?></a><?php endif; ?>
                                                    <?php endif; ?>
                                            </div>

                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1">Apply For Free Download?<span class="require">*</span></label>
                                               <select name="free_download" id="free_download" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->free_download == 1): ?> selected="selected" <?php endif; ?>>Yes</option>
                                                    <option value="0" <?php if($edit['item']->free_download == 0): ?> selected="selected" <?php endif; ?>>No</option>
                                                </select>
                                            </div>


                                           <div class="form-group">
                                                <label for="site_desc" class="control-label mb-1">Tags</label>
                                                <textarea name="item_tags" id="item_tags" class="form-control"><?php echo e($edit['item']->item_tags); ?></textarea>
                                                <small>(Maximum of 15 keywords. Keywords should all be in lowercase and separated by commas. ex: shopping, blog, forum....ect)</small>

                                            </div>


                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Feature Update<span class="require">*</span></label>
                                                <select name="future_update" id="future_update" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->future_update == 1): ?> selected="selected" <?php endif; ?>>Yes</option>
                                                    <option value="0" <?php if($edit['item']->future_update == 0): ?> selected="selected" <?php endif; ?>>No</option>
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Item Support<span class="require">*</span></label>
                                                <select name="item_support" id="item_support" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                    <option value="1" <?php if($edit['item']->item_support == 1): ?> selected="selected" <?php endif; ?>>Yes</option>
                                                    <option value="0" <?php if($edit['item']->item_support == 0): ?> selected="selected" <?php endif; ?>>No</option>
                                                </select>

                                            </div>


                                    </div>
                                </div>

                            </div>
                            </div>

                            <div class="col-md-6">

                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">

                                        <div class="form-group">
                                                <label for="name" class="control-label mb-1">Select Category <span class="require">*</span></label>
                                               <select name="item_category" id="item_category" class="form-control" data-bvalidator="required">
                                            <option value="">Select</option>
                                            <?php $__currentLoopData = $categories['menu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="category_<?php echo e($menu->cat_id); ?>" <?php if($cat_name == 'category'): ?> <?php if($menu->cat_id == $cat_id): ?> selected="selected" <?php endif; ?> <?php endif; ?>><?php echo e($menu->category_name); ?></option>
                                                <?php $__currentLoopData = $menu->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="subcategory_<?php echo e($sub_category->subcat_id); ?>" <?php if($cat_name == 'subcategory'): ?> <?php if($sub_category->subcat_id == $cat_id): ?> selected="selected" <?php endif; ?> <?php endif; ?>> - <?php echo e($sub_category->subcategory_name); ?></option>


                                                           <?php if($sub_category->subChildren->isNotEmpty()): ?>
                                                               <?php
                                                                   $i=1;
                                                               ?>
                                                               <?php echo $__env->make('admin.sub-category-item-edit', [
                                                                   'childs' => $sub_category->subChildren
                                                               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                           <?php endif; ?>





                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            </div>
                                            <?php if(count($attribute['fields']) != 0): ?>
                                            <?php $__currentLoopData = $attri_field['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e($attribute_field->attr_label); ?> <span class="require">*</span></label>
                                                <?php
                                                $field_value=explode(',',$attribute_field->attr_field_value);
                                                $checkpackage=explode(',',$attribute_field->item_attribute_values);
                                                ?>
                                                <?php if($attribute_field->attr_field_type == 'multi-select'): ?>
                                                <select  name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" multiple="multiple" data-bvalidator="required">
                                                <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($field); ?>" <?php if(in_array($field,$checkpackage)): ?> selected="selected" <?php endif; ?>><?php echo e($field); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'single-select'): ?>
                                                <select name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" data-bvalidator="required">
                                                  <option value=""></option>
                                                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($field); ?>" <?php if($attribute_field->item_attribute_values == $field): ?> selected <?php endif; ?>><?php echo e($field); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'textbox'): ?>
                                                <input name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" type="text" class="form-control" data-bvalidator="required">
                                                <?php endif; ?>

                                            </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php else: ?>
                                          <?php $__currentLoopData = $attri_field['display']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <div class="form-group">
                                                <label for="name" class="control-label mb-1"><?php echo e($attribute_field->attr_label); ?> <span class="require">*</span></label>
                                                <?php $field_value=explode(',',$attribute_field->attr_field_value); ?>
                                                <?php if($attribute_field->attr_field_type == 'multi-select'): ?>
                                                <select  name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" multiple="multiple" data-bvalidator="required">
                                                <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'single-select'): ?>
                                                <select name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" class="form-control" data-bvalidator="required">
                                                  <option value=""></option>
                                                  <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($field); ?>"><?php echo e($field); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php endif; ?>
                                                <?php if($attribute_field->attr_field_type == 'textbox'): ?>
                                                <input name="attributes_<?php echo e($attribute_field->attr_id); ?>[]" type="text" class="form-control" data-bvalidator="required">
                                                <?php endif; ?>

                                            </div>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>

                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Demo URL</label>
                                                <input type="text" id="demo_url" name="demo_url" class="form-control" value="<?php echo e($edit['item']->demo_url); ?>" data-bvalidator="url">

                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Regular License (6 months support) </label>
                                                <input type="text" id="regular_price" name="regular_price"  class="form-control" value="<?php echo e($edit['item']->regular_price); ?>" data-bvalidator="digit,min[1],required">
                                                (<?php echo e($allsettings->site_currency); ?>)
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Extended License (12 months support) </label>

                                                <input type="text" id="extended_price" name="extended_price" class="form-control" value="<?php if($edit['item']->extended_price==0): ?> <?php else: ?> <?php echo e($edit['item']->extended_price); ?> <?php endif; ?>" data-bvalidator="digit,min[1]">
                                                (<?php echo e($allsettings->site_currency); ?>)
                                            </div>

                                            <div class="form-group">
                                                <label for="rlicense">Regular Licence</label>
                                                <div class="input-group">
                                                        <textarea type="text" id="regular_licence" name="regular_licence" class="form-control"><?php echo $edit['item']->regular_licence; ?></textarea>
                                                </div>
                                                <p>After single service, do line separator using commas</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="rlicense">Extended Licence</label>
                                                <div class="input-group">
                                                        <textarea type="text" id="extended_licence" name="extended_licence" class="form-control"><?php echo $edit['item']->extended_licence; ?></textarea>

                                                </div>
                                                <p>After single service, do line separator using commas</p>
                                            </div>


                                            <?php if($edit['item']->item_flash_request == 1): ?>
                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Flash Sale <span class="require">*</span></label>
                                                <select name="item_flash" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['item']->item_flash == 1): ?> selected="selected" <?php endif; ?>>Active</option>
                                                <option value="0" <?php if($edit['item']->item_flash == 0): ?> selected="selected" <?php endif; ?>>InActive</option>

                                                </select>

                                            </div>
                                            <?php else: ?>
                                            <input type="hidden" name="item_flash" value="0">
                                            <?php endif; ?>



                                            <div class="form-group">
                                                <label for="site_title" class="control-label mb-1"> Status <span class="require">*</span></label>
                                                <select name="item_status" class="form-control" data-bvalidator="required">
                                                <option value=""></option>
                                                <option value="1" <?php if($edit['item']->item_status == 1): ?> selected="selected" <?php endif; ?>>Approved</option>
                                                <option value="0" <?php if($edit['item']->item_status == 0): ?> selected="selected" <?php endif; ?>>UnApproved</option>
                                                <option value="2" <?php if($edit['item']->item_status == 2): ?> selected="selected" <?php endif; ?>>Rejected</option>
                                                </select>

                                            </div>
                                        <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                        <input type="hidden" name="save_file" value="<?php echo e($edit['item']->item_file); ?>">
                                        <input type="hidden" name="save_thumbnail" value="<?php echo e($edit['item']->item_thumbnail); ?>">
                                        <input type="hidden" name="save_preview" value="<?php echo e($edit['item']->item_preview); ?>">
                                        <input type="hidden" name="save_extended_price" value="<?php echo e($edit['item']->extended_price); ?>">
                                        <input type="hidden" name="item_token" value="<?php echo e($edit['item']->item_token); ?>">
                                        <input type="hidden" name="save_video_file" value="<?php echo e($edit['item']->video_file); ?>">


                                    </div>
                                </div>

                            </div>
                            </div>

                             <div class="col-md-12 no-padding">
                             <div class="card-footer">
                                 <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                 <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-ban"></i> Reset </button>
                             </div>

                             </div>


                            </form>





                        </div>




                    </div>


                </div>
            </div><!-- .animated -->
        </div>


        <!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


<?php echo $__env->make('admin.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript">
	$(document).ready(function()
	{
	$('#video_preview_type').on('change', function() {
      if ( this.value == 'youtube')

      {
	     $("#youtube").show();
		 $("#mp4").hide();
	  }
	  else if ( this.value == 'mp4')
	  {
	     $("#mp4").show();
		 $("#youtube").hide();
	  }
	  else
	  {
	      $("#mp4").hide();
		  $("#youtube").hide();
	  }

	 });
});
</script>
</body>

</html>
<?php /**PATH /home/gotemplate/public_html/resources/views/admin/edit-item.blade.php ENDPATH**/ ?>