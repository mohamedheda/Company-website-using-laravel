@extends('admin.admin-master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
<div class="row">
                    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Portfolio</h4>
                <form action="{{route('update.portfolio')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$portfolio->id}}">
                @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text"  name="portfolio_name" value="{{$portfolio->portfolio_name}}" id="name">
                            @error('portfolio_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text"  name="portfolio_title" value="{{$portfolio->portfolio_title}}" id="username">
                            @error('portfolio_title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                <!-- end row -->

                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Portfolio Disciption</label>
                        <div class="col-sm-10">
                        <textarea id="elm1" name="portfolio_discription">
                                        {{$portfolio->portfolio_discription}}
                    </textarea>
                    @error('portfolio_discription')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                        </div>
                    </div>
                <!-- end row -->
                
                <!-- end row -->
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="portfolio_image" id="image">
                        @error('portfolio_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <img class="rounded avatar-lg " src="{{asset($portfolio->portfolio_image)}}" id="showImage" alt=" image">
                    </div>
                </div>
                <!-- end row -->
                <input type="submit"class="btn btn-info waves-effect waves-light" value="Update Portfolio">
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