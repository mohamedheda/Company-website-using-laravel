@extends('admin.admin-master')

@section('admin')
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">                    
           
    <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Blog Category </h4>
                            <br>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>

                    <tr>
                        <th>Serial Number</th>
                        <th>Name</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                
                
                <tbody>
                    
                    @foreach($blogCategory as $key=>$item)
                <tr>
                    <td> {{$key+1}} </td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="{{route('edit.blog.category',$item->id)}}" title="Edit Portfolio" class="btn btn-info">
                        <i class="far fa-edit"></i>
                        </a>
                        <a href="{{route('delete.blog.category',$item->id)}}" id="delete" title="Delete Portfolio" class="btn btn-danger">
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
    </div>
    </div>
        

@endsection