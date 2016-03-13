<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link href="/assets/css/admin/style.css" rel="stylesheet"/>
	<title>后台管理</title>
</head>
<body>
	<div class="dialog_content">
		<form id="info_form" name="info_form" action="/admin/index/reset" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<table width="100%" class="table_form">
				<tr>
					<th width="80">密码 :</th>
					<td>
						<input type="password" name="password" id="J_password" class="input-text">
					</td>
				</tr>
				<tr>
					<th>确认密码 :</th>
					<td>
						<input type="password" name="repassword" id="J_repassword" class="input-text">
					</td>
				</tr>
			</table>
			<div class="mt10">
				<input type="submit" value="确定" id="dosubmit" name="dosubmit" class="smt mr10" style="margin:0 0 10px 100px;">
			</div>
		</form>
	</div>
	<script src="/assets/js/jquery-1.7.2.min.js"></script>
	<script src="/assets/js/formvalidator.js"></script>
	<script>
	$(function(){
		$.formValidator.initConfig({formid:"info_form",autotip:true});
		$("#J_password").formValidator({ onshow:'请输入密码', onfocus:'密码应该为6-20位之间'}).inputValidator({ min:6, max:20, onerror:'密码应该为6-20位之间'});
		$("#J_repassword").formValidator({ onshow:'确认密码', onfocus:'确认密码'}).compareValidator({desid:"J_password",operateor:"=",onerror:'两次密码不一致'});
	});
	</script>
</body>
</html>