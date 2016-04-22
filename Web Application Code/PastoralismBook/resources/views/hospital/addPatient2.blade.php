@extends('formAdvance')
@Section('content')
<script type="text/javascript">
    function test(form)
   {
        total_balance_amount=eval(form.total_balance_amount.value);
        paid=eval(form.paid.value);
        Due=total_balance_amount-paid;
        form.due.value=Due;

   }
</script>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                    <h2>Add Patient</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li>
                            <a>Patient</a>
                        </li>
                        <li class="active">
                            <strong>Add Patient</strong>
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
                        <h5>Add Patient </h5>
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
                                <form role="form" action="{{url('/savePatient')}}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="patient_id" value="{{$patient_id}}">
                                    <input type="hidden" name="patient_name" value="{{$patient_name}}">
                                    <input type="hidden" name="patient_contact" value="{{$patient_contact}}">
                                    <input type="hidden" name="age" value="{{$age}}">
                                    <input type="hidden" name="date" value="{{$date}}">
                                    <input type="hidden" name="time" value="{{$time}}">
                                    <input type="hidden" name="gender" value="{{$gender}}">
                                    <input type="hidden" name="address" value="{{$address}}">
                                    <input type="hidden" name="tid" value="{{$tid}}">
                                    <input type="hidden" name="reference_doctor" value="{{$reference_doctor}}">
                                    
                                    <input type="hidden" name="test1" value="{{$test1}}">
                                    <input type="hidden" name="discount1" value="{{$discount1}}">
                                    <input type="hidden" name="discount1_amont" value="{{$discount1_amont}}">
                                    <input type="hidden" name="bal_amount_1" value="{{$bal_amount_1}}">
                                    <input type="hidden" name="test1_prince" value="{{$test1_prince}}">
                                    

                                  <input type="hidden" name="test2" value="{{$test2}}">
                                  <input type="hidden" name="discount2" value="{{$discount2}}">
                                  <input type="hidden" name="discount2_amont" value="{{$discount2_amont}}">
                                  <input type="hidden" name="bal_amount_2" value="{{$bal_amount_2}}">
                                  <input type="hidden" name="test2_prince" value="{{$test2_prince}}">
                                  <input type="hidden" name="test3" value="{{$test3}}">
                                  <input type="hidden" name="discount3" value="{{$discount3}}">
                                  <input type="hidden" name="discount3_amont" value="{{$discount3_amont}}">
                                  <input type="hidden" name="bal_amount_3" value="{{$bal_amount_3}}">
                                  <input type="hidden" name="test3_prince" value="{{$test3_prince}}">
                                  <input type="hidden" name="test4" value="{{$test4}}">
                                  <input type="hidden" name="discount4" value="{{$discount4}}">
                                  <input type="hidden" name="discount4_amont" value="{{$discount4_amont}}">
                                  <input type="hidden" name="bal_amount_4" value="{{$bal_amount_4}}">
                                  <input type="hidden" name="test4_prince" value="{{$test4_prince}}">
                                  <input type="hidden" name="test5" value="{{$test5}}">
                                  <input type="hidden" name="discount5" value="{{$discount5}}">
                                  <input type="hidden" name="discount5_amont" value="{{$discount5_amont}}">
                                  <input type="hidden" name="bal_amount_5" value="{{$bal_amount_5}}">
                                  <input type="hidden" name="test5_prince" value="{{$test5_prince}}">
                                  <input type="hidden" name="test6" value="{{$test6}}">
                                  <input type="hidden" name="discount6" value="{{$discount6}}">
                                  <input type="hidden" name="discount6_amont" value="{{$discount6_amont}}">
                                  <input type="hidden" name="bal_amount_6" value="{{$bal_amount_6}}">
                                  <input type="hidden" name="test6_prince" value="{{$test6_prince}}">
                                  <input type="hidden" name="test7" value="{{$test7}}">
                                  <input type="hidden" name="discount7" value="{{$discount7}}">
                                  <input type="hidden" name="discount7_amont" value="{{$discount7_amont}}">
                                  <input type="hidden" name="bal_amount_7" value="{{$bal_amount_7}}">
                                  <input type="hidden" name="test7_prince" value="{{$test7_prince}}">
                                  <input type="hidden" name="test8" value="{{$test8}}">
                                  <input type="hidden" name="discount8" value="{{$discount8}}">
                                  <input type="hidden" name="discount8_amont" value="{{$discount8_amont}}">
                                  <input type="hidden" name="bal_amount_8" value="{{$bal_amount_8}}">
                                  <input type="hidden" name="test8_prince" value="{{$test8_prince}}">
                                  <input type="hidden" name="test9" value="{{$test9}}">
                                  <input type="hidden" name="discount9" value="{{$discount9}}">
                                  <input type="hidden" name="discount9_amont" value="{{$discount9_amont}}">
                                  <input type="hidden" name="bal_amount_9" value="{{$bal_amount_9}}">
                                  <input type="hidden" name="test9_prince" value="{{$test9_prince}}">
                                  <input type="hidden" name="test10" value="{{$test10}}">
                                  <input type="hidden" name="discount10" value="{{$discount10}}">
                                  <input type="hidden" name="discount10_amont" value="{{$discount10_amont}}">
                                  <input type="hidden" name="bal_amount_10" value="{{$bal_amount_10}}">
                                  <input type="hidden" name="test10_prince" value="{{$test10_prince}}">
                                  <input type="hidden" name="test11" value="{{$test11}}">
                                  <input type="hidden" name="discount11" value="{{$discount11}}">
                                  <input type="hidden" name="discount11_amont" value="{{$discount11_amont}}">
                                  <input type="hidden" name="bal_amount_11" value="{{$bal_amount_11}}">
                                  <input type="hidden" name="test11_prince" value="{{$test11_prince}}">
                                  <input type="hidden" name="test12" value="{{$test12}}">
                                  <input type="hidden" name="discount12" value="{{$discount12}}">
                                  <input type="hidden" name="discount12_amont" value="{{$discount12_amont}}">
                                  <input type="hidden" name="bal_amount_12" value="{{$bal_amount_12}}">
                                  <input type="hidden" name="test12_prince" value="{{$test12_prince}}">
                                  <input type="hidden" name="test13" value="{{$test13}}">
                                  <input type="hidden" name="discount13" value="{{$discount13}}">
                                  <input type="hidden" name="discount13_amont" value="{{$discount13_amont}}">
                                  <input type="hidden" name="bal_amount_13" value="{{$bal_amount_13}}">
                                  <input type="hidden" name="test13_prince" value="{{$test13_prince}}">
                                  <input type="hidden" name="test14" value="{{$test14}}">
                                  <input type="hidden" name="discount14" value="{{$discount14}}">
                                  <input type="hidden" name="discount14_amont" value="{{$discount14_amont}}">
                                  <input type="hidden" name="bal_amount_14" value="{{$bal_amount_14}}">
                                  <input type="hidden" name="test14_prince" value="{{$test14_prince}}">
                                  <input type="hidden" name="test15" value="{{$test15}}">
                                  <input type="hidden" name="discount15" value="{{$discount15}}">
                                  <input type="hidden" name="discount15_amont" value="{{$discount15_amont}}">
                                  <input type="hidden" name="bal_amount_15" value="{{$bal_amount_15}}">
                                  <input type="hidden" name="test15_prince" value="{{$test15_prince}}">
                                  <input type="hidden" name="test16" value="{{$test16}}">
                                  <input type="hidden" name="discount16" value="{{$discount16}}">
                                  <input type="hidden" name="discount16_amont" value="{{$discount16_amont}}">
                                  <input type="hidden" name="bal_amount_16" value="{{$bal_amount_16}}">
                                  <input type="hidden" name="test16_prince" value="{{$test16_prince}}">
                                  <input type="hidden" name="test17" value="{{$test17}}">
                                  <input type="hidden" name="discount17" value="{{$discount17}}">
                                  <input type="hidden" name="discount17_amont" value="{{$discount17_amont}}">
                                  <input type="hidden" name="bal_amount_17" value="{{$bal_amount_17}}">
                                  <input type="hidden" name="test17_prince" value="{{$test17_prince}}">
                                  <input type="hidden" name="test18" value="{{$test18}}">
                                  <input type="hidden" name="discount18" value="{{$discount18}}">
                                  <input type="hidden" name="discount18_amont" value="{{$discount18_amont}}">
                                  <input type="hidden" name="bal_amount_18" value="{{$bal_amount_18}}">
                                  <input type="hidden" name="test18_prince" value="{{$test18_prince}}">
                                  <input type="hidden" name="test19" value="{{$test19}}">
                                  <input type="hidden" name="discount19" value="{{$discount19}}">
                                  <input type="hidden" name="discount19_amont" value="{{$discount19_amont}}">
                                  <input type="hidden" name="bal_amount_19" value="{{$bal_amount_19}}">
                                  <input type="hidden" name="test19_prince" value="{{$test19_prince}}">
                                  <input type="hidden" name="test20" value="{{$test20}}">
                                  <input type="hidden" name="discount20" value="{{$discount20}}">
                                  <input type="hidden" name="discount20_amont" value="{{$discount20_amont}}">
                                  <input type="hidden" name="bal_amount_20" value="{{$bal_amount_20}}">
                                  <input type="hidden" name="test20_prince" value="{{$test20_prince}}">
          
                                    <input type="hidden" name="total_balance_amount" value="{{$total_balance_amount}}">
                                    <input type="hidden" name="total_price" value="{{$total_price}}">
                                    <input type="hidden" name="total_discount_amount" value="{{$total_discount_amount}}">
                                
                                    <div class="form-group"><label>Total Balance Amount</label><input type="number" disabled="" name="" required placeholder="Test ID"  value="{{$total_balance_amount}}" class="form-control"></div>
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
                        </div>
                    </div>
                </div>
                

            </div>
@endSection