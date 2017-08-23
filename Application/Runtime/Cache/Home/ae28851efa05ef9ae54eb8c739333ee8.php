<?php if (!defined('THINK_PATH')) exit();?>
<center id='fbox'>
	<p><a href="?l=zh-cn">中文</a>||<a href="?l=en-us">英文</a></p>
	<form action="/index.php/Home/Demo3/show">
	名称:<input type="text" name="goods_name" id="goods_name">
	颜色:<input type="text" name="goods_color" id="goods_color">
	<input type="submit" value="<?php echo ($wellcome); ?>" class="search">
	</form>
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
		<td><a href="/index.php/Home/Demo3/counts/id/<?php echo ($v["id"]); ?>" target='_blank'><?php echo ($v["url"]); ?></a></td>	
		<td><?php echo ($v["click_num"]); ?></td>	
		</tr><?php endforeach; endif; ?>	
	</table>
	<?php echo ($show); ?>
</center>