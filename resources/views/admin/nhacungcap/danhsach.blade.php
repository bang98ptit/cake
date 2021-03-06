 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Nhà cung cấp 
                            <small>Danh Sách </small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                      @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Địa chỉ </th>
                                <th>Số điện thoại </th>
                                <th>Email </th>
                                <th>Web site </th>
                                <th>Xoá </th>
                                <th>Sửa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $sup)
                            <tr class="odd gradeX" align="center">
                                <td>{{$sup->id}}</td>
                                <td>{{$sup->name}}
                                    <img width="150px" src="source/image/supplier/{{$sup->image}}"></td>
                                <td>{{$sup->address}}</td>
                                <td>{{$sup->phone}}</td>
                                <td>{{$sup->email}}</td>
                                <td>{{$sup->website}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/nhacungcap/xoa/{{$sup->id}}"> Xoá </a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/nhacungcap/sua/{{$sup->id}}">Sửa </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection