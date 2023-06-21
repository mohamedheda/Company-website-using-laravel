@extends('admin.admin-master')

@section('admin')
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
    <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <center>
                        <br>
                        <br>
                        <img class="img-thumbnail rounded-circle avatar-xl" src="{{!empty($profileData->profile_images)? url('uploads/admin_images/'.$profileData->profile_images):url('uploads/no_image.jpg')}}" alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Name : {{$profileData->name}}</h4><hr>
                        <h4 class="card-title">User Name : {{$profileData->username}}</h4><hr>
                        <h4 class="card-title">Email : {{$profileData->email}}</h4><hr>
                        <a class="btn btn-info waves-effect waves-light" href="{{route('profile.edit')}}">Edit profile</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>


@endsection