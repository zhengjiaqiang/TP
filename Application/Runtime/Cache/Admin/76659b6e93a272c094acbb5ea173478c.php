<?php if (!defined('THINK_PATH')) exit();?>
	<table border='2'>
		<tr>
			<td>员工姓名</td>
			<td>打卡时间</td>
			<td>打卡状态</td>
		</tr>
		<?php foreach ($row as $k => $v): ?>
		<tr>
		<td><?php echo $v['yname'] ?></td>		
		<td><?php echo date("Y-m-d",$v['am_time']) ?></td>	
		<td><?php if( $v['status']==0){echo "已达卡";}else{echo "未打卡";} ?></td>	
		</tr>
		<?php endforeach ?>
	</table>