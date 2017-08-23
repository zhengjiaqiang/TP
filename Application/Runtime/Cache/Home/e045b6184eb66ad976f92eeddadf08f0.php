<?php if (!defined('THINK_PATH')) exit();?><p><a href="?l=zh-cn">中文</a>||<a href="?l=en-us">英文</a></p>
名称:<input type="text" name="goods_name" id="goods_name">
	颜色:<input type="text" name="goods_color" id="goods_color">
	<input type="button" value="搜索" class="search">
	<table border='2'>
		<tr>
			<td>编号</td>
			<td>名称</td>
			<td>颜色</td>
			<td>地址</td>
			<td>点击次数</td>
		</tr>
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
		<td><?php echo ($v["id"]); ?></td>	
		<td><?php echo ($v["goods_name"]); ?></td>	
		<td><?php echo ($v["goods_color"]); ?></td>	
		<td><a href="/index.php/Home/Demo2/counts/id/<?php echo ($v["id"]); ?>"><?php echo ($v["url"]); ?></a></td>	
		<td><?php echo ($v["click_num"]); ?></td>	
		</tr><?php endforeach; endif; ?>	
	</table>
	<?php echo ($pages); ?>