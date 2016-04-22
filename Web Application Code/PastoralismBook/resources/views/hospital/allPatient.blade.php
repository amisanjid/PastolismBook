@extends('dataTable')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>All Patient</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Patient</a>
                        </li>
                        <li class="active">
                            <strong>All Patient</strong>
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
                        <h5>All Patient</h5>
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
                    	@if(isset($success))
                    	<div class="alert alert-success">
                                Success !
                        </div>
                        @endif
                        @if(isset($failed))
                        <div class="alert alert-danger">
                        		Failed !
                        </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Patient Contact</th>
                        <th>Age</th>
                        <th>Date</th> 
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=0; ?>
                    @foreach($data as $d)
                    <tr class="gradeX">
                    <?php $sl++; ?>
                        <td>{{$sl}}</td>
                        <td>{{$d->patient_id}} </td>
                        <td>{{$d->patient_name}} </td>
                        <td>{{$d->patient_contact}} </td>
                        <td>{{$d->age}} </td>
                        <td>{{$d->date}} </td>
                        <td><a href="patientDetail?patient_id={{$d->patient_id}} " class="btn btn-primary" >DETAIL</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Patient Contact</th>
                        <th>Age</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    </table>

                    </div>
                </div>
            </div>
            </div>
        </div>
@endsection