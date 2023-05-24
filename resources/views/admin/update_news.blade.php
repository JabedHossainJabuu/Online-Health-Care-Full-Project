<!DOCTYPE html>
<html lang="en">

<head>
        <base href="{{ asset('/') }}">
        <style>
                label {
                        display: inline-block;
                        width: 200px;
                }
        </style>
        @include('admin.css')
</head>

<body>
        <div class="container-scroller">
                <div class="row p-0 m-0 proBanner" id="proBanner">
                        <div class="col-md-12 p-0 m-0">
                                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                                        <div class="ps-lg-1">
                                                <div class="d-flex align-items-center justify-content-between">
                                                        <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more</p>
                                                        <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                                                </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                                <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                                                <button id="bannerClose" class="btn border-0 p-0">
                                                        <i class="mdi mdi-close text-white me-0"></i>
                                                </button>
                                        </div>
                                </div>
                        </div>
                </div>
                <!-- partial:partials/_sidebar.html -->
                @include('admin.sidebar')
                <!-- partial -->
                <div class="container-fluid page-body-wrapper">

                        <!-- partial:partials/_navbar.html -->
                        @include('admin.navbar')
                        <!-- partial -->
                        <div class="container-fluid page-body-wrapper">

                                <div class="container" align="center" style="padding: 100px">
                                        @if(session()->has('message'))
                                        <div class="alert alert-success">
                                                <button type="button" class="close" data-bs-dismiss="alert">

                                                        {{ session()->get('message') }}
                                                </button>

                                        </div>

                                        @endif
                                        <form action="{{ url('edit_news', $data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div style="padding: 15px;">
                                                        <label for="">News Title</label>
                                                        <input type="text" name="name" style="color: black" value="{{ $data->name }}">
                                                </div>

                                                <div style="padding: 15px;">
                                                        <label for="">Description</label>
                                                        <textarea rows="4" cols="50" name="desc" form="usrform" style="color: black">{{ $data->desc }}</textarea>

                                                </div>

                                                <div style="padding: 15px;">
                                                        <label for="">Old Image</label>
                                                        <img src="newsImage/{{ $data->image }}" alt="" width="150" height="160">

                                                </div>

                                                <div style="padding: 15px;">
                                                        <label for="">Change Image</label>
                                                        <input type="file" name="file">

                                                </div>

                                                <div style="padding: 15px;">
                                                        <input type="submit" class="btn btn-success">

                                                </div>

                                        </form>
                                </div>
                        </div>
                        {{-- body part--}}
                        <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->

        <!-- endinject -->
        <!-- Plugin js for this page -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>