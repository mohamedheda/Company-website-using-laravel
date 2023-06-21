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

                <h4 class="card-title">Edit About Slider</h4>
                <form action="{{route('about.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="id" value="{{$aboutSlider->id}}">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Tilte</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$aboutSlider->title}}" name="title" id="name">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Short Title</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$aboutSlider->short_title}}" name="short_title" id="username">
                        </div>
                    </div>
                <!-- end row -->
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Short Disciption</label>
                        <div class="col-sm-10">
                            <textarea required=""  name="short_discription" class="form-control" rows="5">
                            {{$aboutSlider->short_discription}}
                            </textarea>
                        </div>
                    </div>
                <!-- end row -->
                    <div class="row mb-3">
                        <label for="username" class="col-sm-2 col-form-label">Long Disciption</label>
                        <div class="col-sm-10">
                        <textarea id="elm1" name="long_discription">
                            {{$aboutSlider->long_discription}}
                        </textarea>

                        </div>
                    </div>
                <!-- end row -->
                
                <!-- end row -->
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="about_image" id="image">
                    </div>
                </div>
                <!-- end row -->
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                    <img class="rounded avatar-lg " src="{{!empty($aboutSlider->about_image) ? url($aboutSlider->about_image):url('uploads/no_image.jpg')}}" id="showImage" alt=" image">
                    </div>
                </div>
                <!-- end row -->
                <input type="submit"class="btn btn-info waves-effect waves-light" value="Edit About Slider">
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