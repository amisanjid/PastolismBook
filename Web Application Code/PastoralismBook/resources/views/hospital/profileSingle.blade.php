@extends('formAdvance')
@Section('content')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-12">
                    <h2>Show Profile</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li class="active">
                            <a>Profile</a>
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
                    
                    <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Profile Detail</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right">
                                <img alt="image" class="img-responsive" src="profile/{{$d->pic}}">
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong>{{$d->name}} </strong></h4>
                                <p><i class="fa fa-map-marker"></i> {{$d->address}} </p>
                                <h5>
                                    About me
                                </h5>
                                <p>
                                    {{$d->about}}
                                </p>

                                <h5>Email</h5>
                                <p>
                                {{$d->email}}
                                </p>

                                <h5>Company</h5>
                                <p>
                                {{$d->company}}
                                </p>

                                <h5>Designation</h5>
                                <p>
                                {{$d->Designation}}
                                </p>

                                <h5>Gender</h5>
                                <p>
                                {{$d->gender}}
                                </p>

                                <h5>Contact No</h5>
                                <p>
                                {{$d->contact_no}}
                                </p>

                                <h5>Date of Birth</h5>
                                <p>
                                {{$d->date_of_birth}}
                                </p>

                                <!--
                                <div class="user-button">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                        </div>
                                    </div>
                                </div>
                                -->
                            </div>
                    </div>


                </div>

 <br /><br />
            </div>

@endSection