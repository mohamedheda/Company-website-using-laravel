@extends('admin.admin-master')

@section('admin')
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">                    
           
    <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Blogs </h4>
                            <br>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>

                    <tr>
                        <th>Serial Number</th>
                        <th>Blog Category</th>
                        <th>Blog Tiltle</th>
                        <th>Blog Image</th>
                        <th>Blog Tags</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                
                
                <tbody>
                    
                   
                    @foreach($blogs as $key => $blog)
                <tr>
                    <td> {{$key+1}} </td>
                    <td>{{$blog['category']['name']}}</td>
                    <td>{{$blog->blog_title}}</td>
                    <td>
                        <img src="{{ asset($blog->blog_image) }}" height="50" width="60" alt="multi image">
                    </td>
                    <td>{{$blog->blog_tags}}</td>
                    <td>
                        <a href="{{route('edit.blog',$blog->id)}}" title="Edit Blog" class="btn btn-info">
                        <i class="far fa-edit"></i>
                        </a>
                        <a href="{{route('delete.blog',$blog->id)}}" id="delete" title="Delete Blog" class="btn btn-danger">
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