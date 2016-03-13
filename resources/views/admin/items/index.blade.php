<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="/assets/css/admin/style.css" rel="stylesheet"/>
	<title>后台管理</title>
</head>
<body>
	<div class="pad_lr_10" >
		<div class="J_tablelist table_list">
			<table width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th width="50" align="center">缩略图</th>
						<th align="left">商品名称</th>
						<th width="60">分类</th>
						<th width="150">掌柜</th>
						<th width="70">价格(元)</th>
						<th width="70">折扣比率</th>
						<th width="90">点击数</th>
						<th width="120">发布时间</th>
						<th width="80">管理操作</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($items as $key => $val)
					<tr>
						<td align="center">{{ $val['id'] }}</td>
						<td align="right">
							<div class="img_border">
								<a href="{{ $val['click_url'] }}" target="_blank">
									<img src="{{ $val['pic_url'] }}" width="32" width="32"></a>
							</div>
						</td>
						<td align="left">{{ $val['title'] }}</td>
						<td align="center"><b>{{ $category[$val['cate_id']] }}</b></td>
						<td align="center">{{ $val['nick'] }}</td>
						<td align="center" class="red">{{ $val['coupon_price'] }}</td>
						<td align="center" class="red">{{ $val['coupon_rate'] }}</td>
						<td align="center">{{ $val['hits'] }}</td>
						<td align="center">{{ $val['create_time'] }}</td>
						<td align="center">
							<a href="javascript:;">编辑</a>
							|
							<a href="javascript:;" onclick="del({{ $val['id'] }});">删除</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="btn_wrap_fixed">
			<div id="pages">
				{{ $items->render() }}
			</div>
		</div>
	</div>
	<script>
	function del(id) {
		if(confirm("您确定要删除该宝贝吗？")){
			window.location.href = "/admin/items/delete/" + id;
		}
	}
	</script>
</body>
</html>