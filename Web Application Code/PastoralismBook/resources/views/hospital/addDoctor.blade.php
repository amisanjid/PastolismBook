@extends('formAdvance')
@Section('content')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                    <h2>Add Doctor</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li>
                            <a>Doctor</a>
                        </li>
                        <li class="active">
                            <strong>Add Doctor</strong>
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
                        <h5>Add Doctor </h5>
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
                                    <div class="form-group"><label>Name Of Doctor</label><input type="text" name="name_of_doctor" required placeholder="Name of Doctor" class="form-control"></div>
                                    <div class="form-group"><label>Designation Of Doctor</label><input type="text" name="designation_of_doctor" placeholder="Designation Of Doctor" class="form-control" required ></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"><label>Specialist</label><input type="text" name="specialist" placeholder="Specialist" class="form-control" required ></div>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group"><label>Contact No</label><input type="text" name="contact_no" placeholder="Contact No" class="form-control" required ></div>
                                    <div class="form-group" align="right">
                                    <label></label>
                                        <input type="Submit" value="Save" class="btn btn-primary" />
                                    </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
@endSection