


@extends('header')

@section('content')
   


    
    
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div style="max-height: 400px;" class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <a  data-toggle="modal"  class="edit-avatar"><i
                                    class="fa fa-pencil"></i></a>
                            <img src="/images/profile.png" alt="" class="avatar-photo">
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body pd-5">
                                            <div class="img-container">
                                                <img id="image" src="/images/profile.png" alt="Picture">
                                            </div>
                                        </div>
                                        <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="text-center h5 mb-0">{{ Auth::user()->name }}</h5>
                        <div class="profile-info">
                            <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                            <ul>
                                <li>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}

                                        </div>
                                    @endif

                                    
                                    <div>{{ Auth::user()->email }}</div>
                                </li>
                                
                                
                                <li>
                                    <h5>Address:</h5>
                                    <span>amman</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#timeline"
                                            role="tab">Orders</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Timeline Tab start -->
                                    @if(count($order) > 0 )
                                    <div class="tab-pane fade show active pt-2" id="timeline" role="tabpanel">
                                    @foreach($order as $value)
                                        <div class="px-4">
                                            <div class="profile-timeline py-0 pt-1">
                                                <div class="timeline-month">
                                                    <h5>{{$value -> created_at -> format('M , Y ')}}</h5>
                                                </div>
                                                <div class="profile-timeline-list">
                                                    <ul>
                                                        <li>
                                                            <div class="date">{{$value -> total_price}} JOD</div>
                                                            <div class="task-name">
                                                            Order Details
                                                                <i class="fa fa-th-list"></i> 
                                                            </div>
                                                            @foreach( (App\orders_product::where('order_id', $value -> id)) ->get() as $details)
                                                            <p>{{$details -> order_details}} {{$details -> single_price}} JOD X {{$details -> quantity}} Pcs  </p>
                                                            
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="d-flex flex-column align-items-center">
                                        <img width="500px" src="/images/noorders.svg" alt="">

                                        <h1>No Orders Yet</h1>
                                    </div>

                                    @endif
                                    <!-- Timeline Tab End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- js -->
    <script src="theme/vendors/scripts/core.js"></script>
    <script src="theme/vendors/scripts/script.min.js"></script>
    <script src="theme/vendors/scripts/process.js"></script>
    <script src="theme/vendors/scripts/layout-settings.js"></script>
    <script src="theme/src/plugins/cropperjs/dist/cropper.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var image = document.getElementById('image');
            var cropBoxData;
            var canvasData;
            var cropper;

            $('#modal').on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    autoCropArea: 0.5,
                    dragMode: 'move',
                    aspectRatio: 3 / 3,
                    restore: false,
                    guides: false,
                    center: false,
                    highlight: false,
                    cropBoxMovable: false,
                    cropBoxResizable: false,
                    toggleDragModeOnDblclick: false,
                    ready: function() {
                        cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
                    }
                });
            }).on('hidden.bs.modal', function() {
                cropBoxData = cropper.getCropBoxData();
                canvasData = cropper.getCanvasData();
                cropper.destroy();
            });
        });

    </script>
</body>

</html>
