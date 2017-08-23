<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center id="box">
	 <p>切换到：<a href="?l=zh-cn">简体中文</a> | <a href="?l=en-us">English</a></p>
	 <input type="text" name="" id="c_name">
	 <input type="button" value="<?php echo ($wellcome); ?>" id="search" name="searchs">
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
			<td><a href="/index.php/Home/Demo/counts/id/<?php echo ($v["c_id"]); ?>" target="_blank"><?php echo ($v["url"]); ?></a></td>
			<td><?php echo ($v["click_num"]); ?></td>
			<td>
				<a href="/index.php/Home/Demo/delete/id/<?php echo ($v["c_id"]); ?>">删除</a>||
				<a href="/index.php/Home/Demo/update/id/<?php echo ($v["c_id"]); ?>">修改</a>
			</td>	
			</tr><?php endforeach; endif; ?>	
		</table>
		<?php echo ($pages); ?>
	</center>	
</body>
</html>
<script src="/Public/Home/js/jquery-1.7.2.min.js"></script>
<script>
var new_name='';//定义一个全局变量
$(function(){
	
	//搜索
   $('#box').delegate('#search','click',function(){
   	var c_name=$('#c_name').val();
   	//var searchs=$("input[name='searchs']").val();
   	new_name=c_name
   	$.ajax({
			type:'get',
			url: '/index.php/Home/Demo/show_table',
			data:{new_name:new_name},
			success:function(data){
				//alert(data);
				$("#box").html(data);;
			}
		})
   })
	//分页
	$("#box").delegate('.page','click',function(){
		var p=$(this).attr('opt');
		$.ajax({
			type:'get',
			url: '/index.php/Home/Demo/show_table/',
			data:{p:p,new_name:new_name},
			success:function(data){
				$("#box").html(data);
				// alert(data);
			}
		})
	})
})
</script>