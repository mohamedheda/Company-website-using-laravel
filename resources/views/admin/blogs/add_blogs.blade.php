@extends('admin.admin-master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
<div class="row">
                    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Add Blog</h4>
                
                <form action="{{route('store.blog')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Blog Category</label>
                        <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="blog_category_id">
                                <option selected="">select Category</option>
                                @foreach($categorys as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                                    </select>
                        @error('blog_category_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Blog title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text"  name="blog_title" id="name">
                            @error('blog_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Blog Tags</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text"  name="blog_tags" data-role="tagsinput" value="laravel,php">
                            @error('blog_tags')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                <!-- end row -->

                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Portfolio Disciption</label>
                        <div class="col-sm-10">
                        <textarea id="elm1" name="blog_discription">

                    </textarea>
                        
                    @error('blog_discription')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                    </div>
                <!-- end row -->
                
                <!-- end row -->
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="blog_image" id="image">
                        @error('blog_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <img class="rounded avatar-lg " src="{{url('uploads/no_image.jpg')}}" id="showImage" alt=" image">
                    </div>
                </div>
                <!-- end row -->

                

                <input type="submit"class="btn btn-info waves-effect waves-light" value="Add Blog">
            </form>
            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

</div>
    </div>
    </div>

    <script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection