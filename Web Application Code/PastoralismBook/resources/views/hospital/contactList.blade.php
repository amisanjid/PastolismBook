@extends('formAdvance')
@Section('content')
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Contact List</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{url('/')}} ">Home</a>
                        </li>
                        <li class="active">
                            <a>Contact</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        

        <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

        @foreach($data as $d)

        <div class="col-lg-4">
                <div class="contact-box">
                    <a href="{{url('/profileSingle')}}?id={{$d->id}} ">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" style="width:130px; height=100px;" class="img-thumbnail m-t-xs img-responsive" src="profile/{{$d->pic}} ">
                            <div class="m-t-xs font-bold">{{$d->Designation}} </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong>{{$d->name}} </strong></h3>
                        <p><i class="fa fa-map-marker"></i> {{$d->address}} </p>
                        <address>
                            <strong>{{$d->company}} </strong><br>
                            <b>Email : </b>{{$d->email}} <br>
                            <b>Gender : </b>{{$d->gender}} <br> 
                            <abbr title="Phone">Call : </abbr> {{$d->contact_no}}
                        </address>
                    </div>
                    <div class="clearfix"></div>
                        </a>
                </div>
            </div>

        @endforeach
            
        </div>
        </div>
           
@endSection