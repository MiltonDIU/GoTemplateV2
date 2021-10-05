
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
                        <h1>Exclusive Author Request</h1>
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

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Withdrawal Request</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td><a href="{{ URL::to('/user') }}/{{ $user->username }}" target="_blank" class="blue-color">{{ $user->username }}</a></td>
                                            <td>
                                            <a href="{{ URL::to('/admin/exclusive-vendor-request-approve') }}/{{ $user->id }}"
                                               class="btn btn-success btn-sm" onClick="return confirm('Are you sure you want to complete exclusive author approved request?');">
                                                <i class="fa fa-money"></i>&nbsp;
                                                Complete Approval
                                            </a>

                                            </td>
                                        </tr>
                                   @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>




   @include('admin.javascript')


</body>

</html>
