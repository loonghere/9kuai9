<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>{{ $title }}</title>
	<meta name="keywords" content="{{ $keywords }}" />
	<meta name="description" content="{{ $description }}" />
	<meta name="renderer" content="webkit">
	<link rel="stylesheet" type="text/css" href="/assets/css/home/base.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/home/global.css" />
	<link rel="stylesheet" type="text/css" href="/assets/css/home/page.css" />
	<link rel='stylesheet' type='text/css' href="/assets/css/home/good.css" />
	<script type="text/javascript" src="/assets/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/assets/js/index.js"></script>
</head>
<body>
<div>
	<!-- 头部开始 -->
	<div class="head">
		<div class="logo w980">
			<h1>
				<a title="9kuai9" href="/">
					<img src="/assets/images/53a13d0ba2a2e.png" width="240" height="45" />
				</a>
			</h1>
			<div class="search_box">
				<form method="get" action="/">
					<input x-webkit-speech name="keyword" id="keywords" placeholder="请输入您要找的宝贝！" value="{{ !empty($input['keyword']) ? $input['keyword'] : '' }}" class="text" />
					<button type="submit" value="" class="btn2">搜宝贝</button>
				</form>
			</div>
		</div>
		<div class="nav w980">
			<ul class="navigation">
				<li class="current">
					<a href="/">九块九包邮</a>
				</li>
				<li class="split">
					<a href="http://www.shgszr.com" target="_blank">上海公司转让网</a>
				</li>
				<li class="split">
					<a href="http://www.bjgszrw.com" target="_blank">北京公司转让网</a>
				</li>
			</ul>
		</div>
	</div>
	<!--头部结束-->
	<div class="jiu-nav-main">
		<div class="jiu-nav w980">
			<div class="nav-item fl">
				<div class="item-list">
					<ul>
						<li><a href="/" class="{{ empty($input['cate_id']) ? 'active' : '' }}">全部</a></li>
						@foreach ($category as $key => $val)
							<li><a href="/?cate_id={{ $key }}" class="{{ (!empty($input['cate_id']) && $input['cate_id'] == $key) ? 'active' : '' }}" title="{{ $val }}">{{ $val }}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="n_h">
				<span>排序：</span>
				<a href="/?{{ http_build_query(array_merge($input,['orderby' => 'new'])) }}" class="{{ (empty($input['orderby']) || $input['orderby'] == 'new') ? 'active' : '' }}">最新</a>
				<a href="/?{{ http_build_query(array_merge($input,['orderby' => 'hot'])) }}" class="{{ (!empty($input['orderby']) && $input['orderby'] == 'hot') ? 'active' : '' }}">最热</a>
			</div>
		</div>
	</div>
</div>
<div class="jiu-side-nav w980">
	<div>
		<a class="logo" href="/">
			<img src="/assets/images/53a13d0f065e9.jpg" width="104" height="60" />
		</a>
	</div>
	<div class="content">
		<div class="hd">
			<h3>分类筛选</h3>
		</div>
		<div class="bd">
			<ul>
				<li><a href="/" class="{{ empty($input['cate_id']) ? 'on' : '' }}">全部</a></li>
				@foreach ($category as $key => $val)
					<li><a href="/?cate_id={{ $key }}" class="{{ (!empty($input['cate_id']) && $input['cate_id'] == $key) ? 'on' : '' }}" title="{{ $val }}">{{ $val }}</a></li>
				@endforeach
			</ul>
		</div>
		<div class="bottom"></div>
	</div>
</div>
<!--List Start-->
<div class="main w980 clear">
	<ul class="goods-list w1005">
		@foreach ($items as $key => $val)
		<li>
			<div class="list-good buy">
				<div class="good-pic">
					<a href="/items/{{ $val['id'] }}.html" target="_blank">
						<img src="{{ $val['pic_url'] }}" alt="{{ $val['title'] }}" />
					</a>
					<div class="yhq"></div>
					<div class="zhekou">{{ $val['coupon_rate']/1000 }}折</div>
				</div>
				<h5 class="good-title"> <b class="icon tao-n" title="淘宝网"></b>
					<a target="_blank" href="/items/{{ $val['id'] }}.html" class="title">{{ $val['title'] }}</a>
				</h5>
				<div class="good-price">
					<span class="price-current">
						<em>￥</em>{{ $val['coupon_price'] }}
					</span>
					<span class="des-other">
						<span class="price-old">
							<em>¥{{ $val['price'] }}</em>
						</span>
						<span class="discount show">{{ $val['ems'] ? '包邮' : '不包邮' }}</span>
					</span>
					<div class="btn-new buy">
						<a href="/items/{{ $val['id'] }}.html" target="_blank" rel="nofollow">
							<span>去抢购</span>
						</a>
					</div>
				</div>
				<div class="pic-des">
					<div class="des-state">
						<span class="state-time fl">掌柜：{{ $val['nick'] }}</span>
					</div>
				</div>
				<span class="newicon">今日新品</span>
			</div>
		</li>
		@endforeach
	</ul>
	<div class="clear"></div>
	<div class="page">
		{{ $items->render() }}
	</div>
</div>
<!--List End-->
<!-- 页脚 -->
<div class="foot">
	<div class="white_bg w980">
		<p class="f_miibeian w980">
			九块九包邮 © 2016 All Rights Reserved
			<a href="http://www.miibeian.gov.cn/" rel="nofollow" target="_blank">豫ICP备15010242号-1</a>
		</p>
	</div>
</div>
<!-- /页脚 -->
</body>
</html>