@extends('admin.admin-master')

@section('admin')
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">                    
<div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Messages</h4>
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>

                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>

                                        <th>Time</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                
                                <tbody>
                                    
                                    @foreach($messages as $key=> $item)
                                <tr>
                                    <td> {{$key+1}} </td>
                                    <td>
                                    {{$item->name}}
                                    </td>
                                    <td>
                                    {{$item->email}}
                                    </td>
                                    <td>
                                    {{$item->subject}}
                                    </td>

                                    <td>
                                    {{Carbon\Carbon::parse($item->created_at)->diffforhumans()}}
                                    </td>
                                    <td>
                                        <a href="{{route('show.message',$item->id)}}" title="Show Message" class="btn btn-info">
                                        <i class=" fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('delete.message',$item->id)}}" id="delete" title="Delete Message" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>          
                                    @endforeach             
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
                        
                    
                    
                    
                    </div> 
                        </div> 
                        </div> 
        </div>

@endsection