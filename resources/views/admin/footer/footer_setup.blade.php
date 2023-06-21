@extends('admin.admin-master')

@section('admin')

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">
<div class="row">
                    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Edit Footer </h4>
                <form action="{{route('footer.update')}}" method="POST" >
                @csrf
                    <input type="hidden" name="id" value="{{$footer->id}}">
                    <div class="row mb-3">
                        <label for="number" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$footer->number}}" name="number" id="number">
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row mb-3">
                        <label for="short_discription" class="col-sm-2 col-form-label">Short Discription</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$footer->short_discription}}" name="short_discription" id="short_discription">
                        </div>
                    </div>
                <!-- end row -->
                    <div class="row mb-3">
                        <label for="country" class="col-sm-2 col-form-label">Country</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$footer->country}}" name="country" id="country">
                        </div>
                    </div>
                <!-- end row -->
                    <div class="row mb-3">
                        <label for="adress" class="col-sm-2 col-form-label">Adress</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$footer->adress}}" name="adress" id="adress">
                        </div>
                    </div>
                <!-- end row -->

                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" value="{{$footer->email}}" name="email" id="email">
                        </div>
                    </div>
                <!-- end row -->
                    <div class="row mb-3">
                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$footer->facebook}}" name="facebook" id="facebook">
                        </div>
                    </div>
                <!-- end row -->
                    <div class="row mb-3">
                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$footer->twitter}}" name="twitter" id="twitter">
                        </div>
                    </div>
                <!-- end row -->
                    <div class="row mb-3">
                        <label for="twitter" class="col-sm-2 col-form-label">Copy Right</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{$footer->copy_right}}" name="copy_right" id="copy_right">
                        </div>
                    </div>
                <!-- end row -->
                  
                <input type="submit"class="btn btn-info waves-effect waves-light" value="Update footer">
            </form>
            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

</div>
    </div>
    </div>



@endsection