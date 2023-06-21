@extends('admin.admin-master')

@section('admin')
<div class="main-content">

<div class="page-content">
    <div class="container-fluid">  
    <div class="row">  
    <div class="col-lg-12">
                                <div class="card border border-primary">
                                    <div class="card-header bg-transparent border-primary">
                                        <h5 class="my-0 text-primary"><i class="fas fa-envelope"></i>    {{$message->subject}}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><h5 class="card-title">Message :</h5> {{$message->message}}</p> <br><br>
                                        <h5 class="card-title">Name:{{$message->name}}</h5>
                                        <h5 class="card-title">Email:{{$message->email}}</h5>
                                        <h5 class="card-title">Phone:{{$message->number}}</h5>
                                    </div>
                                </div>
                            </div>    
    </div>
    </div>
    </div>
    </div>

@endsection