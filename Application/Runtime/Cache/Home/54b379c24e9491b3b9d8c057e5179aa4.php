<?php if (!defined('THINK_PATH')) exit();?><center>
	<table border="1">
		<tr>
			<td>编号</td>
			<td>点击次数</td>
			<td>操作</td>
		</tr>
		<tr>
		<td><?php echo $row['c_id'] ?></td>	
		<td><?php echo $row['click_num'] ?></td>		
		<td><a href="/index.php/Home/Demo/show">返回</a></td>		
		</tr>
	</table>
</center>
<?php  header("refresh:3 url=https://www.baidu.com"); ?>