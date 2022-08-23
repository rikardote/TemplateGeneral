@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Profile</h4>

                            <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="example-text-input" name="name" value="{{ $editData->name }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" id="example-text-input" name="email" value="{{ $editData->email }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="example-text-input" name="username" value="{{ $editData->username }}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="profile_image" >
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image)? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg')) }} " alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">

                        </form>
                    </div>
             </div>
        </div>
    </div>

@endsection

@section('scripts')
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

