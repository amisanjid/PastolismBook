@extends('formAdvance')
@Section('content')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                    <h2>Add Test</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li>
                            <a>Test</a>
                        </li>
                        <li class="active">
                            <strong>Add Test</strong>
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
                        <h5>Add Test </h5>
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
                                    <div class="form-group"><label>Test ID</label><input type="number" name="test_id" required placeholder="Test ID" class="form-control"></div>
                                    <div class="form-group"><label>Test Category</label><input type="text" name="test_catagory" placeholder="Test Category" class="form-control" required ></div>
                                    <div class="form-group"><label>Test Rate</label><input type="number" name="test_rate" required placeholder="Test Rate" class="form-control"></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"><label>Test Code</label><input type="text" name="test_code" placeholder="Test Code" class="form-control" required ></div>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group"><label>Test Description</label><textarea name="test_description" placeholder="Test Description" class="form-control" style="height:60px" required></textarea></div>
                                    <div class="form-group" align="right">
                                    <label></label>
                                        <input type="Reset" value="Clear" class="btn btn-white" /><input type="Submit" value="Save" class="btn btn-primary" />
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                
             
            </div>
@endSection