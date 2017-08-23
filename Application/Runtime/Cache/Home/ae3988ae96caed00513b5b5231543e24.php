<?php if (!defined('THINK_PATH')) exit();?><center>
	<table border="2">
		<tr>
			<td>编号</td>
			<td>点击次数</td>
			<td>操作</td>
		</tr>
		<tr>
		<td><?php echo ($row["id"]); ?></td>
		<td><?php echo ($row["click_num"]); ?></td>
		<td><a href="/index.php/Home/Demo4/show/id/<?php echo ($row["id"]); ?>">返回</a></td>
		</tr>
	</table>
</center>
<?php  header("refresh:3 url=http://www.baidu.com") ?>