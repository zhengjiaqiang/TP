<?php if (!defined('THINK_PATH')) exit();?><p>切换到：<a href="?l=zh-cn">简体中文</a> | <a href="?l=en-us">English</a></p>
<input type="text" name="" id="c_name">
<input type="button" value="搜索" id="search">
<table border='2'>
			<tr>
				<td>编号</td>
				<td>顾客名称</td>
				<td>网址</td>
				<td>点击次数</td>
				<td>操作</td>
			</tr>
			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
			<td><?php echo ($v["c_id"]); ?></td>	
			<td><?php echo ($v["c_name"]); ?></td>
			<td><a href="/index.php/Home/Demo/counts/id/<?php echo ($v["c_id"]); ?>"><?php echo ($v["url"]); ?></a></td>
			<td><?php echo ($v["click_num"]); ?></td>
			<td>
				<a href="/index.php/Home/Demo/delete/id/<?php echo ($v["c_id"]); ?>">删除</a>||
				<a href="/index.php/Home/Demo/update/id/<?php echo ($v["c_id"]); ?>">修改</a>
			</td>	
			</tr><?php endforeach; endif; ?>	
		</table>
		<?php echo ($pages); ?>