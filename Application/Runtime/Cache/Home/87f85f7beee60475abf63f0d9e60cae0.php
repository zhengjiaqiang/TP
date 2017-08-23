<?php if (!defined('THINK_PATH')) exit();?><table border='2'>
		<tr>
			<td>编号</td>
			<td>点击次数</td>
			<td>操作</td>
		</tr>
		<tr>
		<td><?php echo ($row["id"]); ?></td>	
		<td><?php echo ($row["click_num"]); ?></td>	
		<td><a href="/index.php/Home/Demo3/show/id/<?php echo ($row["id"]); ?>">返回</a></td>	
		</tr>	
	</table>
	<?php  header("refresh:3 url=https://www.baidu.com/"); ?>