@extends('formAdvance')
@Section('content')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                    <h2>Create Profile</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li>
                            <a>Forms</a>
                        </li>
                        <li class="active">
                            <strong>Create Profile</strong>
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
                        <h5>Create Profile <small>Create profile for all</small></h5>
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
                                    <div class="form-group"><label>Name</label> <input type="text" required="true" placeholder="Your Full Name" name="name" class="form-control"></div>
                                    <div class="form-group"><label>About</label> <textarea class="form-control" required="true" name="about" placeholder="About"></textarea></div>
                                    <div class="form-group"><label>Company Name</label><input type="text" required="true" placeholder="Name of Company" name="job_company_name" class="form-control"></div>
                                    <div class="form-group"><label>Designation</label><input type="text" placeholder="Designation" required="true" name="job_designation" class="form-control"></div>
                                    <div class="form-group"><label>Education</label><input type="text" placeholder="Education" name="education" required="true" class="form-control"></div>
                                    <div class="form-group"><label>Gender</label>
                                    <div class="radio i-checks"><label> <input type="radio" name="gender" value="Male"> <i></i> Male </label></div>
                                    <div class="radio i-checks"><label> <input type="radio" name="gender" value="Female"> <i></i> Female </label></div></div>
                                    
                                
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"><label>Contact No</label> <input type="number" required="true" placeholder="Contact No" name="contact_no" class="form-control"></div>
                                    <div class="form-group"><label>Password</label> <input type="password" required="true" placeholder="Password" name="password" class="form-control"></div>
                                    <div class="form-group"><label>Address</label> <textarea required="true" class="form-control" name="address" placeholder="Address"></textarea></div>
                                    <div class="form-group"><label>E-mail</label><input required="true" type="email" placeholder="E-mail" name="email" class="form-control"></div>
                                    <div class="form-group"><label>Date of Birth</label><input required="true" type="date" placeholder="Date of Birth" name="date_of_birth" class="form-control"></div>
                                    <div class="form-group"><label>Photo</label><input required="true" type="file" placeholder="Upload Photo" name="file" class="form-control"></div>
                                    <!--
                                    <div class="form-group"><label>Administration</label>
                                    <div class="radio i-checks"><label> <input type="radio" name="admin" value="ad"> <i></i> Admin </label></div>
                                    <div class="radio i-checks"><label> <input type="radio" name="admin" value="user"> <i></i> General User </label></div></div>
                                    -->
                                    <div class="form-group"><label class="col-lg-2 control-label">Administration</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-b" name="admin">
                                            <option value="0">General User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    <span class="help-block m-b-none"></span>
                                    </div>

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Save</strong></button>
                                    </div>
                                    </form>
                                    <br /><br />
                            </div>
                        </div>
                    </div>
                </div>
                

            </div>
@endSection