@include('includes.header')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Video Information</h5>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">video</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Notified</th>
                                    <th scope="col">keyword</th>
                                    <th scope="col">created by</th>
                                    <th scope="col">created at</th>
                                    <th scope="col">updated at</th>
                                    <th scope="col">Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($videos as $video)
                                    <tr>
                                        <th scope="row"><?php echo $i++; ?></th>
                                        <td><button type="button" class="btn btn-info btn-lg giveFeedback" id="giveFeedback"
                                                    data-toggle="modal"
                                                    data-target="#exampleModalCenter">image
                                            </button></td>
                                        <td><button type="button" class="btn btn-info btn-lg giveFeedback" id="giveFeedback"
                                                    data-toggle="modal"
                                                    data-target=".video">video
                                            </button></td>
                                        <td>{{$video->is_notified}}</td>
                                        <td>{{$video->keyword}}</td>
                                        <td>{{$video->user->name}}</td>
                                        <td>{{$video->created_at}}</td>
                                        <td>{{$video->updated_at}}</td>
                                        <td><a href="{{route('delete.video',$video->id)}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">image</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <img  style="width: 97%" src="{{asset($video->image_url)}}">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        {{--end modal--}}
                                    </div>
                                    {{--modal--}}
                                    <div class="modal fade video" id="exampleModalCenter" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">video</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <video  style="width: 86%" src="{{URL::asset($video->video_url)}}" controls>
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                        {{--end modal--}}
                                    </div>
                                    {{--end modal--}}
                                @endforeach
                                </tbody>
                            </table>

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
