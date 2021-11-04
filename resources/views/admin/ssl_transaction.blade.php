
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
                                    <th>Item Name</th>
                                    <th>Vendor Name</th>
                                    <th>Vendor Email</th>
                                    <th>Buyer Name</th>
                                    <th>Buyer Email</th>
                                    <th>Transaction Date</th>
                                    <th>Transaction ID</th>
                                    <th>Transaction Amount</th>
                                    <th>Status</th>
                                    <th>Currency</th>
{{--                                    <th>User Id</th>--}}
                                    <th>Purchase Token</th>
                                    <th>Order ids</th>
                                </tr>
                                </thead>
                                <tbody>
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
                { "data": "itemName",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        // $(nTd).html("<span>"+console.log((oData.itemName!=null)?oData.itemName:oData.itemName)+"</span>");
                        $(nTd).html("<span>"+(oData.itemName!=null)?oData.itemName:""+"</span>");
                    }
                },
                { "data": "vendorName",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<span>"+(oData.itemName!=null)?oData.vendorName:""+"</span>");
                    }
                },
                { "data": "vendorEmail",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<span>"+(oData.itemName!=null)?oData.vendorEmail:""+"</span>");
                    }
                },
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                { "data": "created_at",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<span>"+ new Date(oData.created_at).toDateString()+"</span>");
                    }
                },
                {data: 'transaction_id', name: 'transaction_id'},
                {data: 'amount', name: 'amount'},
                {data: 'status', name: 'status'},

                {data: 'currency', name: 'currency'},
                // {data: 'user_id', name: 'user_id'},
                {data: 'purchase_token', name: 'purchase_token'},
                {data: 'order_ids', name: 'order_ids'},
            ]
        });

    });
</script>
</body>

