 @extends('admin.layout.index')
 @section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại sản phẩm 
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
                                <th>Mô tả </th>
                                <th>Xoá </th>
                                <th>Sửa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loaisp as $lsp)
                            <tr class="odd gradeX" align="center">
                                <td>{{$lsp->id}}</td>
                                <td>{{$lsp->name}}
                                    <img width="150px" src="source/image/product/{{$lsp->image}}"></td>
                                <td>{{$lsp->description}}</td>
                            
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/loaisanpham/xoa/{{$lsp->id}}"> Xoá </a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/loaisanpham/sua/{{$lsp->id}}">Sửa </a></td>
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