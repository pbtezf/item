@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <div>
        <form action="{{ route('item.index') }}" method="get">
            <input type="text"name="keyword">
            <Input type="submit" value="検索">
        </form>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-bordered p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                                <th>編集</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>
                                     <div >
                                     <a href="{{ url('items/edit/'.$item->id) }}"><button type="button"class="btn btn-link">編集</button></a>
                                     </div>
                                     <div>
                                       <form action="{{ url('items/delete') }}" method="POST" onsubmit="return confirm('削除します。よろしいですか？');">
                                       @csrf
                                       <input type="hidden" name="id" value="{{ $item->id }}">
                                       <input type="submit" value="削除" class="btn btn-danger">
                                       </form>                                      
                                     </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
