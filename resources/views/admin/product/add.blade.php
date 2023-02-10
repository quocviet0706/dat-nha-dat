@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="menu_id">Danh mục</label>
                        <select class="form-control" name="menu_id" id="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="price">Giá gốc</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="price_sale">Giá giảm</label>
                        <input type="number" class="form-control" name="price_sale" id="price_sale" placeholder="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" name="description" id="description" ></textarea>
            </div>
            <div class="form-group">
                <label for="content">Mô tả chi tiết</label>
                <textarea class="form-control" name="content" id="content" ></textarea>
            </div>
            <div class="form-group">
                <label for="upload">Ảnh sản phẩm</label>
                <input class="form-control" type="file" name="thumb" id="upload">
            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" value="1" checked="">
                    <label class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" value="0" >
                    <label class="form-check-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
