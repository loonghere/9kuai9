@foreach ($menu as $key => $val)
<h3 class="f14">
	<span class="J_switchs cu on" title="展开或关闭"></span>
	{{ $key }}
</h3>
<ul>
	@foreach ($val as $k => $v)
	<li class="sub_menu">
		<a href="javascript:;" data-uri="{{ $v['url'] }}" data-id="{{ $k }}" hidefocus="true">{{ $v['title'] }}</a>
	</li>
	@endforeach
</ul>
@endforeach