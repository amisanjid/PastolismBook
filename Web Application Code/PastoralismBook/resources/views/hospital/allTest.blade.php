@extends('dataTable')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>All Tests</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Tests</a>
                        </li>
                        <li class="active">
                            <strong>All Tests</strong>
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
                        <h5>All Tests</h5>
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
                        <th>Test ID</th>
                        <th>Test Category</th>
                        <th>Test Rate</th>
                        <th>Test Code</th>
                        <th>Test Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=0; ?>
                    @foreach($data as $d)
                    <tr class="gradeX">
                    <?php $sl++; ?>
                        <td>{{$d->test_id}} </td>
                        <td>{{$d->test_cat}} </td>
                        <td>{{$d->test_rate}} </td>
                        <td>{{$d->test_code}} </td>
                        <td>{{$d->description}} </td>
                        <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModa<?php echo $sl; ?>">EDIT</a> | <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModalD<?php echo $sl; ?>">DELETE</td>


	                        	<div class="modal inmodal" id="myModa<?php echo $sl; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	                                <div class="modal-dialog">
	                                    <div class="modal-content animated flipInY">
	                                        <div class="modal-header">
	                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                                            <h4 class="modal-title">Test ID :{{$d->test_id}} </h4>
	                                            <small class="font-bold">Update Information behind Test ID.</small>
	                                        </div>
	                                        <div class="modal-body">
	                                            <div class="ibox-content">
							                        <div class="row">
							                            <div class="col-sm-6 b-r">
							                                <form role="form" action="" method="post" enctype="multipart/form-data">
							                                    <input type="hidden" name="test_id" value="{{$d->test_id}} ">
							                                    <div class="form-group"><label>Test Category</label><input type="text" value="{{$d->test_cat}}" name="test_catagory" placeholder="Test Category" class="form-control" required ></div>
							                                    <div class="form-group"><label>Test Rate</label><input type="number" name="test_rate" value="{{$d->test_rate}}" required placeholder="Test Rate" class="form-control"></div>
							                            </div>
							                            <div class="col-sm-6">
							                                <div class="form-group"><label>Test Code</label><input type="text" name="test_code" placeholder="Test Code" value="{{$d->test_code}}" class="form-control" required ></div>
							                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
							                                    <div class="form-group"><label>Test description</label><textarea name="test_description" placeholder="Test Description" class="form-control" style="height:60px" required>{{$d->description}}</textarea></div>
							                                    
							                            </div>
							                        </div>
							                    </div>
	                                        </div>
	                                        <div class="modal-footer">
	                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
	                                            <button type="submit" class="btn btn-primary">Save changes</button>
	                                        </div>
	                                        </form>
	                                    </div>
	                                </div>
	                            </div>


	                            <div class="modal inmodal" id="myModalD<?php echo $sl; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	                                <div class="modal-dialog">
	                                    <div class="modal-content animated flipInY">
	                                        <div class="modal-header">
	                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	                                            <h4 class="modal-title">Are You Sure To Delete This Test ?</h4>
	                                        </div>
	                                        <div class="modal-body">
	                                            <p><strong>There are no way to retrive data again !</strong> So confirm once.</p>
	                                            <p><strong>Test ID : {{$d->test_id}}</strong></p>
	                                        </div>
	                                        <div class="modal-footer">
	                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
	                                            <a href="{{url('/DelTest')}}?test_id={{$d->test_id}} " class="btn btn-primary">Delete</a>
	                                          
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>


                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Test ID</th>
                        <th>Test Category</th>
                        <th>Test Rate</th>
                        <th>Test Code</th>
                        <th>Test Description</th>
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