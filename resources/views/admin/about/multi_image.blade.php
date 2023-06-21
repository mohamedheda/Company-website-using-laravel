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

                <h4 class="card-title">Edit Multi Images </h4>
                <form action="{{route('store.multi.images')}}" method="POST" enctype="multipart/form-data">
                @csrf

                
                
                <!-- end row -->
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" name="multi_image[]" multiple id="image">
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
                @if(count($errors))
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                    {{$error}}
                                            </div>
                    @endforeach
                @endif
                <input type="submit"class="btn btn-info waves-effect waves-light" value="Add Multi Images">
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