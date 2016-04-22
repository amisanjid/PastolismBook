@extends('formAdvance')
@Section('content')
<script type="text/javascript">
    function test(form)
   {
        oldDue=eval(form.oldDue.value);
        paid=eval(form.paid.value);
        Due=oldDue-paid;
        form.due.value=Due;

   }
</script>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                    <h2>Patient Detail</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li>
                            <a>Patient</a>
                        </li>
                        <li class="active">
                            <strong>Patient Detail</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            

            <div class="row">
            <div class="col-lg-9">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                @foreach($data as $d)
                                    <div class="m-b-md">
                                        <a href="#" class="btn btn-white btn-xs pull-right">Edit Patient</a>
                                        <a href="#" class="btn btn-white btn-xs pull-right">Delete Patient</a>
                                        <h2>{{$d->patient_name}} </h2>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Contact:</dt> <dd><span class="label label-primary">{{$d->patient_contact}} </span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                        <dt>Age:</dt> <dd>{{$d->age}} </dd>
                                        <dt>Date:</dt> <dd>{{$d->date}} </dd>
                                        <dt>Time:</dt> <dd>{{$d->time}} </dd>
                                        <dt>Gender:</dt> <dd>{{$d->gender}} </dd>
                                        <dt>Address:</dt> <dd>{{$d->address}} </dd>
                                        <dt>Reference Doctor:</dt> <dd>{{$d->reference_doctor}} </dd>
                                        <dt>Total Price:</dt> <dd><a href="#" class="text-navy">{{$d->total_price}} </a> </dd>
                                        <dt>Discount:</dt> <dd><a href="#" class="text-navy">{{$d->total_discount_money}} </a> </dd>
                                        <dt>Balance Amount:</dt> <dd><a href="#" class="text-navy">{{$d->total_balance_amount}} </a> </dd>
                                        <dt>Paid:</dt> <dd><a href="#" class="text-navy">{{$d->paid}} </a> </dd>
                                        <dt>Due:</dt> <dd><a href="#" class="text-navy">{{$d->due}} </a> </dd>
                                    </dl>
                                </div>
                                
                            </div>
                            
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                
                                <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Test</th>
                                            <th>Discount (%)</th>
                                            <th>Discount Amount</th>
                                            <th>Balance Amount </th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test1}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount1}}
                                            </td>
                                            <td>
                                               {{$d->discount1_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_1}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test1_prince}}
                                            </p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test2}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount2}}
                                            </td>
                                            <td>
                                               {{$d->discount2_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_2}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test2_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test3}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount3}}
                                            </td>
                                            <td>
                                               {{$d->discount3_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_3}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test3_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test4}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount4}}
                                            </td>
                                            <td>
                                               {{$d->discount4_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_4}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test4_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test5}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount5}}
                                            </td>
                                            <td>
                                               {{$d->discount5_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_5}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test5_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test6}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount6}}
                                            </td>
                                            <td>
                                               {{$d->discount6_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_6}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test6_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test7}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount7}}
                                            </td>
                                            <td>
                                               {{$d->discount7_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_7}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test7_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test9}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount9}}
                                            </td>
                                            <td>
                                               {{$d->discount9_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_9}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test9_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test10}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount10}}
                                            </td>
                                            <td>
                                               {{$d->discount10_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_10}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test10_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test11}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount11}}
                                            </td>
                                            <td>
                                               {{$d->discount11_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_11}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test11_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test12}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount12}}
                                            </td>
                                            <td>
                                               {{$d->discount12_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_12}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test12_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test13}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount13}}
                                            </td>
                                            <td>
                                               {{$d->discount13_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_13}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test13_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test14}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount14}}
                                            </td>
                                            <td>
                                               {{$d->discount14_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_14}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test14_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test15}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount15}}
                                            </td>
                                            <td>
                                               {{$d->discount15_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_15}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test15_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test16}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount16}}
                                            </td>
                                            <td>
                                               {{$d->discount16_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_16}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test16_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test17}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount17}}
                                            </td>
                                            <td>
                                               {{$d->discount17_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_17}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test17_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test18}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount18}}
                                            </td>
                                            <td>
                                               {{$d->discount18_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_18}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test18_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test19}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount19}}
                                            </td>
                                            <td>
                                               {{$d->discount19_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_19}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test19_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary"><i class="fa fa-check"></i>{{$d->test20}} </span>
                                            </td>
                                            <td>
                                               {{$d->discount20}}
                                            </td>
                                            <td>
                                               {{$d->discount20_amont}}
                                            </td>
                                            <td>
                                                {{$d->bal_amount_20}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->test20_prince}}
                                            </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                </i> </span>
                                            </td>
                                            <td>
                                               
                                            </td>
                                            <td>
                                               {{$d->total_discount_money}}
                                            </td>
                                            <td>
                                                {{$d->total_balance_amount}}
                                            </td>
                                            <td>
                                            <p class="small">
                                                {{$d->total_price}}
                                            </p>
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
                

            </div>
@endSection