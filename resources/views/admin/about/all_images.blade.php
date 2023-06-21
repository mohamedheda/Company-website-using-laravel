@extends('admin.admin-master')

@section('admin')
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">                    
<div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Multi Images</h4>
                            <br>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>

                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                
                                <tbody>
                                    
                                    @foreach($images as $key=>$image)
                                <tr>
                                    <td> {{$key+1}} </td>
                                    <td>
                                        <img src="{{ asset($image->multi_image) }}" height="50" width="60" alt="multi image">
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.multi.image',$image->id) }}" title="Edit Image" class="btn btn-info">
                                        <i class="far fa-edit"></i>
                                        </a>
                                        <a href="{{route('delete.multi.image',$image->id)}}" id="delete" title="Delete Image" class="btn btn-danger">
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