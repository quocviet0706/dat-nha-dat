@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Tên danh mục</label>
                <input value="{{$menu->name}}" type="text" class="form-control" name="name" id="name" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="parentid">Danh mục cha</label>
                <select class="form-control" name="parent_id" id="parentid">
                    <option value="0" {{$menu->parent_id==0?'selected':''}} >Danh mục cha</option>
                    @foreach($menus as $menupa)
                        @if($menupa!=$menu)
                        <option value="{{$menupa->id}}" {{$menu->parent_id==$menupa->id?'selected':''}} >{{$menupa->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" name="description" id="description" >{{$menu->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Mô tả ngắn</label>
                <textarea class="form-control" name="content" id="content" >{{$menu->content}}</textarea>
            </div>
            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" value="1" {{$menu->active==1?'checked=""':''}}>
                    <label class="form-check-label">Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" value="0" {{$menu->active==0?'checked=""':''}}>
                    <label class="form-check-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection
