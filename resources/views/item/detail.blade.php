<!DOCTYPE html>
<html>
<head>
<title>商品</title>
</head>
<body>
<table border='3'>
<tr>
<td>商品名</td>
<td>詳細</td>
<td>値段</td>
<td>在庫の有無</td>
</tr>
@foreach ($items as $item)
<tr>
<td><a href='{{ url("/detail/$item->id" )}}' >{{ $item->name }} </a></td>
<td>{{ $item->description }}</td>
<td>{{ $item->price }}</td>
@if ($item->stock === 0)
<td>在庫なし</td>
@else
<td>在庫あり</td>
@endif
</tr>
@endforeach
</table>
</body>
</html>
