@extends('admin.admin-master')

@section('admin')


<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
<div class="row">
                    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Blog Category</h4>
                
                <form action="{{route('store.blog.category')}}" method="POST" >
                @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text"  name="name" id="name">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->
                <input type="submit"class="btn btn-info waves-effect waves-light" value="Add Blog Category">
            </form>
            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

</div>
    </div>
    </div>

@endsection