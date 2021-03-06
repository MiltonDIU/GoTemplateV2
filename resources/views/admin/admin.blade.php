
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
                        <h1>Vendors</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <a href="{{ url('/admin/add-vendor') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Vendor</a>
                        </ol>
                    </div>
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
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Vendors</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Mobile</th>

                                            <th>Photo</th>
                                            <th>Vendor Type</th>
                                            <th>Bank Details</th>
                                            <th>Earning Amount</th>
                                            <th>Email Verified</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @php $no = 1; @endphp
                                    @foreach($userData['data'] as $user)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td><a href="{{ URL::to('/user') }}/{{ $user->username }}" target="_blank" class="blue-color">{{ $user->username }}</a></td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td>@if($user->user_photo != '') <img height="50" src="{{ url('/') }}/public/storage/users/{{ $user->user_photo }}" alt="{{ $user->name }}" class="userphoto"/>@else <img height="50" src="{{ url('/') }}/public/img/no-user.png" alt="{{ $user->name }}" class="userphoto"/>  @endif</td>

                                            <td>@if($user->exclusive_author == 1) <span class="badge badge-success">Exclusive User</span> @else <span class="badge badge-danger">Non Exclusive User</span> @endif</td>

                                           <td>--</td>
                                            <td>{{ $user->earnings }} {{ $allsettings->site_currency }}</td>
                                            <td>@if($user->verified == 1) <span class="badge badge-success">verified</span> @else <span class="badge badge-danger">unverified</span> @endif</td>
                                        </tr>
                                        @php $no++; @endphp
                                   @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


   @include('admin.javascript')


</body>

</html>
