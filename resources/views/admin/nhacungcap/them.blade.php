  @extends('admin.layout.index')
  @section('content')
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhà cung cấp
                            <small>Thêm </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}} <br>
                            @endforeach
                        </div>
                        @endif
                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                        <form action="admin/nhacungcap/them" method="POST" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{csrf_token()}}" />
                
                            <div class="form-group">
                                <label>Tên </label>
                                <input class="form-control" name="name" placeholder="Nhập tên" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ </label>
                                <input class="form-control" name="address" placeholder="Nhập địa chỉ" />
                            </div>
                             <div class="form-group">
                                <label>Sô điện thoại </label>
                                <input class="form-control" name="phone" placeholder="Nhập số điện thoại" />
                            </div>
                             <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Nhập địa chỉ email" />
                            </div>
                             <div class="form-group">
                                <label>Website</label>
                                <input class="form-control" name="website" placeholder="Nhập địa chỉ website" />
                            </div>
                            <div class="form-group">
                                 <label>Hình ảnh </label>
                                 <input type="file" name="Hinh" class="form-control">
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thêm </button>
                            <button type="reset" class="btn btn-default">Làm mới </button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

 @endsection       