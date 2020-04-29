@include('includes.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Add video Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Video</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}</div>
            @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}</div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">#Add Video</h5><br>
                            <form method="post" action="{{route('upload.video')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label> enter the keyword</label>
                                    <input class="form-control" name="keyword" type="text"
                                           placeholder="Enter the Key word">
                                </div>
                                @if($errors->has('keyword'))
                                    <div class="alert alert-danger">{{ $errors->first('keyword') }}</div>
                                @endif
                                <div>
                                    <label for="exampleFormControlFile1">Select Video File</label>
                                    <input type="file" name="video_url" class="form-control-file"
                                           id="exampleFormControlFile1">
                                </div>
                                @if($errors->has('video_url'))
                                    <div class="alert alert-danger">{{ $errors->first('video_url') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Select Image File</label>
                                    <input type="file" name="image_url" class="form-control-file"
                                           id="exampleFormControlFile1">
                                </div>
                                @if($errors->has('image_url'))
                                    <div class="alert alert-danger">{{ $errors->first('image_url') }}</div>
                                @endif
                                <div class="form-group">
                                    <select name="type"class="form-control">
                                        <option value="payed">payed</option>
                                        <option value="free">free</option>
                                    </select>
                                </div>
                                @if($errors->has('type'))
                                    <div class="alert alert-danger">{{ $errors->first('type') }}</div>
                                @endif
                                <input type="submit" class="btn btn-primary" value="upload">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        @if(auth()->check())
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item"  style="color : #1b1919; direction: unset" href="{{route('logout')}}">Logout</a>
            </div>

        @endif
    </div>
</aside>
<!-- /.control-sidebar -->
@include('includes.footer')
