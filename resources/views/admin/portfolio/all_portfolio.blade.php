@extends('admin.admin-master')

@section('admin')
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">                    
           
    <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Portfolio </h4>
                            <br>
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>

                    <tr>
                        <th>Serial Number</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                
                
                <tbody>
                    
                    @foreach($portfolios as $key=>$portfolio)
                <tr>
                    <td> {{$key+1}} </td>
                    <td>{{$portfolio->portfolio_name}}</td>
                    <td>{{$portfolio->portfolio_title}}</td>
                    <td>
                        <img src="{{ asset($portfolio->portfolio_image) }}" height="50" width="60" alt="multi image">
                    </td>
                    <td>
                        <a href="{{ route('edit.portfolio',$portfolio->id) }}" title="Edit Portfolio" class="btn btn-info">
                        <i class="far fa-edit"></i>
                        </a>
                        <a href="{{route('delete.portfolio',$portfolio->id)}}" id="delete" title="Delete Portfolio" class="btn btn-danger">
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

    