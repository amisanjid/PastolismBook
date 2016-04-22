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
                    <h2>Clearing Report</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li>
                            <a>Payment</a>
                        </li>
                        <li class="active">
                            <strong>Clearing Report</strong>
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
                        <h5>Pay Due First ! </h5>
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
                        <div class="row">
                            <div class="col-sm-6 b-r">
                            @foreach($data as $da)
                                <form role="form" action="{{url('/PayDueClearingReport')}}" method="post">
                                    <input type="hidden" value="{{$da->total_balance_amount}}" name="total_balance_amount">
                                    <input type="hidden" value="{{$da->due}}" name="oldDue" >
                                    <input type="hidden" value="{{$patient_id}}" name="patient_id">
                                    <div class="form-group"><label>Old Due</label><input type="number" disabled="" name="" required placeholder="Test ID"  value="{{$da->due}}" class="form-control"></div>
                                    <div class="form-group"><label>Paid</label><input type="text" name="paid" placeholder="Paid" class="form-control" required='' ></div>
                                    <div class="form-group"><label>Due</label><input type="number" name="due" required placeholder="Due" onclick="test(this.form)" class="form-control"></div>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="Submit" value="Save" class="btn btn-primary" />
                                    
                            </div>
                            <div class="col-sm-6">
                                <!--
                                <div class="form-group"><label>Test Code</label><input type="text" name="test_code" placeholder="Test Code" class="form-control" required ></div>
                                    <div class="form-group"><label>Test Description</label><textarea name="test_description" placeholder="Test Description" class="form-control" style="height:60px" required></textarea></div>
                                    <div class="form-group" align="right">
                                    <label></label>
                                    </div>
                                    -->
                            </div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                </div>
                

            </div>
@endSection