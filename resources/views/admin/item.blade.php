@extends('layouts.app_admin')
@section('content')
<h1>商品一覧</h1>
<table border="1" style="border-collapse: collapse">
<tr>
   <th>商品名</th>
   <th>値段</th>
   <th>在庫</th>
</tr>
@foreach ($items as $item)
   <tr>
       <td><a href="{{route('admin.detail', ['id' => $item->id])}}">{{$item->name}}</a></td>
       <td>{{$item->price}}</td>
       <td>
       @if ($item->stock == 0)
       在庫無し
       @else
       在庫あり
       @endif
       </td>
   </tr>
@endforeach
</table>
<a href="{{route('admin.add')}}">商品追加</a>
@endsection
