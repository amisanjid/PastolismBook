@extends('formAdvance')
@Section('content')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                    <h2>Clearing Report</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li>
                            <a>Payments</a>
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
                        <h5>Clearing Report </h5>
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
                            <div class="col-sm-12 b-r">
                                <form role="form" action="" method="post">
                                    <div class="form-group"><label>Patient ID</label><input type="number" name="patient_id" required placeholder="Patient ID" class="form-control"></div>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <label></label>
                                        <input type="Submit" align="right" value="Find" class="btn btn-primary" />
                            </form>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                

            </div>
@endSection