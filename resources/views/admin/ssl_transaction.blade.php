
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
                    <h1>Ssl Commerz Transaction</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">

            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Transaction</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered yajra-datatable">
                                <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Transaction ID</th>
                                    <th>Status</th>
                                    <th>Currency</th>
                                    <th>User Id</th>
                                    <th>Purchase Token</th>
                                    <th>Order ids</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Transaction ID</th>
                                    <th>Status</th>
                                    <th>Currency</th>
                                    <th>Purchase Token</th>
                                    <th>Order ids</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach($transactions as $key => $transaction)

                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$transaction->name}}</td>
                                        <td>{{$transaction->email}}</td>
                                        <td>{{$transaction->phone}}</td>
                                        <td>{{$transaction->transaction_id}}</td>
                                        <td>{{$transaction->status}}</td>
                                        <td>{{$transaction->currency}}</td>
                                        <td>{{$transaction->purchase_token}}</td>
                                        <td>{{$transaction->order_ids}}</td>
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

<script type="text/javascript">
    $(function () {
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('ssl_transaction.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'amount', name: 'amount'},
                {data: 'transaction_id', name: 'transaction_id'},
                {data: 'status', name: 'status'},
                {data: 'currency', name: 'currency'},
                {data: 'user_id', name: 'user_id'},
                {data: 'purchase_token', name: 'purchase_token'},
                {data: 'order_ids', name: 'order_ids'},
            ]
        });

    });
</script>
</body>
