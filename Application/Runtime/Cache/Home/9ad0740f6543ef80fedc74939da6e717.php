<?php if (!defined('THINK_PATH')) exit();?><center>
	<p>切换到:<a href="?l=zh-cn">中文</a>||<a href='?l=en-us'>英文</a></p>
	<form action="/index.php/Home/Demo4/show">
	新闻标题:<input type="text" name="news_name" id="">
	<input type="submit" value="<?php echo ($wellcome); ?>">
	</form>
	<table border="2">
		<tr>
			<td>编号</td>
			<td>标题</td>
			<td>地址</td>
			<td>点击数</td>
		</tr>
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
		<td><?php echo ($v["id"]); ?></td>
		<td><?php echo ($v["title"]); ?></td>
		<td><a href="/index.php/Home/Demo4/counts/id/<?php echo ($v["id"]); ?>" target="_blank"><?php echo ($v["url"]); ?></a></td>
		<td><?php echo ($v["click_num"]); ?></td>
		</tr><?php endforeach; endif; ?>	
	</table>
	<?php echo ($show); ?>
</center>