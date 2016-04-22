@extends('dataTable')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Daily Due</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li>
                            <a>Statement</a>
                        </li>
                        <li class="active">
                            <strong>Daily Due Statement</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daily Due Statements</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>PT. ID</th>
                        <th>PT. Name</th>
                        <th>Phone</th>
                        <th>Total Amount</th>
                        <th>Discount</th>
                        <th>Total Balance Amount</th>
                        <th>Paid</th>
                        <th>Due</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=0; ?>
                    @foreach($data as $d)
                    <tr class="gradeX">
                    <?php $sl++; ?>
                        <td><?php echo $sl; ?>
                        <td>{{$d->date_}} </td>
                        <td>{{$d->patient_id}} </td>
                        <td>{{$d->patient_name}} </td>
                        <td>{{$d->patient_phone}} </td>
                        <td>{{$d->total_amount}} </td>
                        <td>{{$d->discount_amount}} </td>
                        <td>{{$d->total_amount-$d->discount_amount}}</td>
                        <td>{{$d->paid}} </td>
                        <td>{{$d->due}} </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Date</th>
                        <th>PT. ID</th>
                        <th>PT. Name</th>
                        <th>Phone</th>
                        <th>Total Amount</th>
                        <th>Discount</th>
                        <th>Total Balance Amount</th>
                        <th>Paid</th>
                        <th>Due</th>
                    </tr>
                    </tfoot>
                    </table>

                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection