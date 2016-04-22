@extends('formAdvance')
@Section('content')
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
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r">
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="tid" value="{{$tid}}">
                                    <input type="hidden" name="patient_id" value="{{date('YmdHis')}}">
                                    <div class="form-group"><label>Patient ID</label><input type="text" name="" disabled="" required value="{{date('YmdHis')}} " placeholder="Patient ID" class="form-control"></div>
                                    <div class="form-group"><label>Patient Name</label><input type="text" name="patient_name" placeholder="Patient Name" class="form-control" required ></div>
                                    <div class="form-group"><label>Patient Contact</label><input type="text" name="patient_contact" class="form-control" placeholder="Patient Contact" data-mask="(+880) 9999-999999" placeholder="" required ></div>
                                    <div class="form-group"><label>Patient Age</label><input type="number" name="age" required placeholder="Patient Age" class="form-control"></div>
                                    <div class="form-group"><label class="col-lg-6 control-label">Reference Doctor</label>
                                        <div class="col-lg-6">
                                        <select name="reference_doctor" required data-placeholder="Reference Doctor" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Reference Doctor</option>
                                            <option value="No Reference Doctor">No Reference Doctor</option>
                                            @foreach($doctor as $doc)
                                            <option value="{{$doc->name_of_doctor}}">{{$doc->name_of_doctor}}</option>
                                            @endforeach
                                        </select>
                                            
                                        </div>
                                    </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="form-group date"><label>Date</label><input type="date" name="date" palceholder="Date" value="{{date('d/m/Y')}} " required class="form-control"></div>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group"><label>Time</label><input type="text" name="time" placeholder="Time" class="form-control" required ></div>
                                    <div class="form-group"><label class="col-lg-2 control-label">Gender</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-b" name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <div class="form-group"><label>Address</label><textarea name="address" style="height:50px" required placeholder="Address" class="form-control"></textarea></div>
                                    

                                    

                                    
                                    
                            </div>

                        </div>
                        
                        
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                

                    <div class="row">
                            <div class="col-sm-6 b-r">
                                    <div class="form-group"><label class="col-lg-2 control-label">Test 1</label>
                                        <div class="col-lg-10">
                                        <select name="test_1"  data-placeholder="Test 1" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 1</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-10"><input type="number" <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>  name="discount_1"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group"><label class="col-lg-2 control-label">Test 2</label>
                                        <div class="col-lg-10">
                                        <select name="test_2"  data-placeholder="Test 2" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 2</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-10"><input type="number" <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_2"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group"><label class="col-lg-2 control-label">Test 3</label>
                                        <div class="col-lg-10">
                                        <select name="test_3"  data-placeholder="Test 3" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 3</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-10"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_3"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 4</label>
                                        <div class="col-lg-10">
                                        <select name="test_4"  data-placeholder="Test 4" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 4</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_4"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 5</label>
                                        <div class="col-lg-10">
                                        <select name="test_5"  data-placeholder="Test 5" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 5</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_5"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 6</label>
                                        <div class="col-lg-10">
                                        <select name="test_6"  data-placeholder="Test 6" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 6</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_6"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 7</label>
                                        <div class="col-lg-10">
                                        <select name="test_7"  data-placeholder="Test 7" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 7</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_7"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 8</label>
                                        <div class="col-lg-10">
                                        <select name="test_8"  data-placeholder="Test 8" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 8</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_8"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 9</label>
                                        <div class="col-lg-10">
                                        <select name="test_9"  data-placeholder="Test 9" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 9</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_9"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 10</label>
                                        <div class="col-lg-10">
                                        <select name="test_10"  data-placeholder="Test 10" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 10</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_10"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>


                            </div>
                            <div class="col-sm-6">
                                

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 11</label>
                                        <div class="col-lg-10">
                                        <select name="test_11"  data-placeholder="Test 11" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 11</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_11"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 12</label>
                                        <div class="col-lg-10">
                                        <select name="test_12"  data-placeholder="Test 12" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 12</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_12"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 13</label>
                                        <div class="col-lg-10">
                                        <select name="test_13"  data-placeholder="Test 13" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 13</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number"  <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_13"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 14</label>
                                        <div class="col-lg-10">
                                        <select name="test_14"  data-placeholder="Test 14" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 14</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number" <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_14"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 15</label>
                                        <div class="col-lg-10">
                                        <select name="test_15"  data-placeholder="Test 15" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 15</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number" <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_15"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 16</label>
                                        <div class="col-lg-10">
                                        <select name="test_16"  data-placeholder="Test 16" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 16</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number" <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_16"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 17</label>
                                        <div class="col-lg-10">
                                        <select name="test_17"  data-placeholder="Test 17" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 17</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number" <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_17"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 18</label>
                                        <div class="col-lg-10">
                                        <select name="test_18"  data-placeholder="Test 18" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 18</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number" <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_18"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 19</label>
                                        <div class="col-lg-10">
                                        <select name="test_19"  data-placeholder="Test 19" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 19</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number" <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_19"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Test 20</label>
                                        <div class="col-lg-10">
                                        <select name="test_20"  data-placeholder="Test 20" class="chosen-select" style="width:350px;" tabindex="2">
                                            <option value="">Test 20</option>
                                            @foreach($tests as $test)
                                                <option value="{{$test->description}}">{{$test->description}} - {{$test->test_rate}} </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-lg-2 control-label">Discount (%)</label>
                                        <div class="col-lg-6"><input type="number" <?php if(Session::get('admin')) { echo 'max="100"'; } else { echo 'max="25"'; } ?>   name="discount_20"  placeholder="Discount (%)" class="form-control">
                                        </div>
                                    </div>


                                        <br />
                                        <div class="form-group" align="right">
                                            <label></label>
                                            <input type="Submit" value="Save" class="btn btn-primary" />
                                        </div>
                                        <br />
                                    </div>

                                    

                                    
                                    </form>
                            </div>

                        </div>
                        
                        
                    </div>

                </div>
                

            </div>
@endSection