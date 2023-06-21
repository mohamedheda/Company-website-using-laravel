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

                        <h4 class="card-title">Edit profile</h4>
                        <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{$editProfile->name}}" name="name" id="name">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">User name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{$editProfile->username}}" name="username" id="username">
                                </div>
                            </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" value="{{$editProfile->email}}" name="email" id="email">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="profile_image" id="image">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                            <img class="rounded avatar-lg " src="{{!empty($editProfile->profile_images)? url('uploads/admin_images/'.$editProfile->profile_images):url('uploads/no_image.jpg')}}" id="showImage" alt="Card image cap">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit"class="btn btn-info waves-effect waves-light" value="Update">
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