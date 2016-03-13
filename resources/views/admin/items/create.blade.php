<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="/assets/css/admin/style.css" rel="stylesheet"/>
	<title>后台管理</title>
</head>
<body>
	<div class="subnav">
		<h1 class="title_2 line_x">添加商品</h1>
	</div>
	<form id="info_form" name="info_form" action="/admin/items" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="pad_lr_10">
			<div class="col_tab">
				<ul class="J_tabs tab_but cu_li">
					<li class="current">商品信息</li>
				</ul>
				<div class="J_panes">
					<div class="content_list pad_10">
						<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
							<tr>
								<th width="120">宝贝链接 :</th>
								<td>
									<input type="text" id="good_link" name="link" class="input-text" size="50" >
									<input type="button" value="一键采集" id="J_get_info" name="click_url_btn" class="btn">
								</td>
							</tr>
							<tr>
								<th width="120">所属分类 :</th>
								<td>
									<select class="J_cate_select mr10" name="cate_id">
										@foreach ($category as $key => $val)
											<option value="{{ $key }}">{{ $val }}</option>
										@endforeach
									</select>
								</td>
							</tr>
							<tr>
								<th>商品名称 :</th>
								<td>
									<input type="text" name="title" id="J_title" class="input-text" size="60" >
									<input type="hidden" name="item_id" id="item_id" value="">
								</td>
							</tr>
							<tr>
								<th>商品图片 :</th>
								<td>
									<img id="J_pic_url_img"  width="100" >
									<br />
									<input type="text" name="pic_url" id="J_pic_url" class="input-text" size="50" >
								</td>
							</tr>
							<tr>
								<th>商品简介 :</th>
								<td>
									<textarea name="intro" id="J_intro" cols="80" rows="2"></textarea>
								</td>
							</tr>
							<tr>
								<th>销量 :</th>
								<td>
									<input type="text" name="volume" id="J_volume" class="input-text" size="10"></td>
							</tr>
							<tr>
								<th width="120">商品价格 :</th>
								<td>
									<input type="text" name="price" id="J_price"size="10" class="input-text" >元</td>
								<p class="s1" id="prices" style="display:none"></p>
								<p class="tips"></p>
							</tr>
							<tr>
								<th>商品折扣 :</th>
								<td>
									<input type="text" name="coupon_rate" id="coupon_rate" size="10" class="input-text" />
									<span class="gray m110">折率</span>
								</td>
							</tr>
							<tr>
								<th>购买价格 :</th>
								<td>
									<input type="text" name="coupon_price" id="coupon_price" size="10" class="input-text" >元</td>
							</tr>
							<tr>
								<th width="120">是否包邮 :</th>
								<td>
									<label>
										<input type="radio" value="1" name="ems" checked>是</label>
									<label>
										<input type="radio" value="0" name="ems">否</label>
									<span class="gray m110" style="margin-left:10px;">选择是否包邮</span>
								</td>
							</tr>
							<tr>
								<th>推广链接 :</th>
								<td>
									<input type="text" name="click_url" id="J_click_url" class="input-text" size="100" value="">
									<span class="gray m110" style="margin-left:2px;">登陆阿里妈妈后台自助推广中获取</span>
								</td>
							</tr>
							<th>店铺ID:</th>
							<td>
								<input type="text" name="seller_id" id="J_sellerId" class="input-text" size="10" value=""></td>
							<tr>
								<th>掌柜旺旺 :</th>
								<td>
									<input type="text" name="nick" id="J_nick" class="input-text" size="20" value="">
									<span class="gray m110" style="margin-left:10px;">无法获取请手动填写或留空</span>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="mt10">
					<input type="submit" value="确定" id="dosubmit" name="dosubmit" class="smt mr10" style="margin:0 0 10px 150px;"></div>
			</div>
		</div>
	</form>
	<script src="/assets/js/jquery-1.7.2.min.js"></script>
	<script src="/assets/js/formvalidator.js"></script>
	<script type="text/javascript">
	$.formValidator.initConfig({formid:"info_form",autotip:true});
	$("#good_link").formValidator({onshow:'请填写宝贝链接',onfocus:'请填写宝贝链接'}).inputValidator({min:1,onerror:'请填写宝贝链接'});
	$("#J_title").formValidator({onshow:'请填写商品名称',onfocus:'请填写商品名称'}).inputValidator({min:1,onerror:'请填写商品名称'});
	$("#J_price").formValidator({onshow:"请填写原价",onfocus:"请填写价格",oncorrect:"填写正确",onempty:"请填写价格"}).inputValidator({min:1,max:100,onerror:"请正确填写价格"});
	$("#J_pic_url").formValidator({onshow:"请填写宝贝地址",onfocus:"请填写宝贝地址",oncorrect:"填写正确",onempty:"请填写宝贝地址"}).inputValidator({min:50,onerror:"请正确填写宝贝地址"});
	$("#coupon_price").formValidator({onshow:"请填写购买价",onfocus:"请填写购买价",oncorrect:"填写正确",onempty:"请填写购买价"}).inputValidator({min:1,max:100,onerror:"请填写购买价"});
	$("#J_volume").formValidator({onshow:"请输入宝贝销量",onfocus:"请输入宝贝销量",oncorrect:"填写正确",onempty:"请输入宝贝销量"}).inputValidator({min:1,max:100,onerror:"请输入正确的数字"});
	$('#J_get_info').live('click', function() {
		var link = $("#good_link").val();
		if (link == '') return false;
		//ajax获取数据
		$.getJSON('/admin/items/getAjaxItemInfo',{link:link},function(data){
			if(data.status===1)
			{
				var info=data.data;
				$('#item_id').val(info['item_id']);
				$('#J_pic_url').val(info['pic_url']);
                $('#J_title').val(info['title']);
                $('#J_pic_url_img').attr('src',info['pic_url']);
                $('#nick').val(info['nick']);
                $('#J_volume').val(info['volume']);
				$('#coupon_rate').val(info['coupon_rate']);
                $('#J_price').val(info['price']);
				$("#coupon_price").val(info['coupon_price']);
				$("#J_nick").val(info['nick']);
				$("#J_sellerId").val(info['sellerId'])
             } else {
             	alert(data.msg);
             }
         });
	});
	</script>
</body>
</html>