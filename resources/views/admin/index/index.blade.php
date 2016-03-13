<!doctype html>
<html class="off">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="/assets/css/admin/style.css">
    <title>管理后台</title>
</head>
<body scroll="no">
<div id="header">
	<div class="logo"><a href="/" title="logo"></a></div>
    <div class="fl">
    	<div class="cut_line admin_info tr">
		您好！<b>{{ $admin }}</b> [管理员]
        	&nbsp;&nbsp;&nbsp;<a href="/admin/index/logout">[退出]</a>
			&nbsp;<a href="/" target="_blank">[网站首页]</a>
        </div>
    </div>
    <ul class="nav white" id="J_tmenu">
        <li class="top_menu on"><a href="javascript:;" data-id="0" hidefocus="true" style="outline:none;">后台管理</a></li>
		<!-- <li class="top_menu"><a href="javascript:;" data-id="1" hidefocus="true" style="outline:none;">数据管理</a></li> -->
    </ul>
</div>
<div id="content">
	<div class="left_menu fl">
    	<div id="J_lmenu" class="J_lmenu" data-uri="/admin/index/left"></div>
        <a href="javascript:;" id="J_lmoc" style="outline-style: none; outline-color: invert; outline-width: medium;" hidefocus="true" class="open" title="左侧菜单"></a>
    </div>
    <div class="right_main">
    	<div class="crumbs">
        	<div class="options">
				<a href="javascript:;" title="刷新页面" id="J_refresh" class="refresh" hidefocus="true">刷新页面</a>
            	<a href="javascript:;" title="全屏" id="J_full_screen" class="admin_full" hidefocus="true">全屏</a>
			</div>
    		<div id="J_mtab" class="mtab">
            	<a href="javascript:;" id="J_prev" class="mtab_pre fl" title="上一页">上一页</a>
                <a href="javascript:;" id="J_next" class="mtab_next fr" title="下一页">下一页</a>
                <div class="mtab_p">
                    <div class="mtab_b">
                        <ul id="J_mtab_h" class="mtab_h"><li class="current" data-id="0"><span><a>后台首页</a></span></li></ul>
                    </div>
                </div>
            </div>
        </div>
    	<div id="J_rframe" class="rframe_b">
        	<iframe id="rframe_0" src="/admin/index/panel" frameborder="0" scrolling="auto" style="height:90%;width:100%;"></iframe>
        </div>
    </div>
</div>
<script src="/assets/js/jquery-1.7.2.min.js"></script>
<script src="/assets/js/panel.js"></script>
</body>
</html>