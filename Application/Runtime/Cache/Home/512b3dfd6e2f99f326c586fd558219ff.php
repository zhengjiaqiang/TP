<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>签到</title>
</head>
<body>
<center>
	<button id="btn">签到<button>
	<table border="1">
	<tr>
		<td>总签到</td>
		<td>连续签到</td>
		<td>积分</td>
	</tr>
	<tbody id="box">
	<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
			<td><?php echo ($v["num"]); ?></td>
			<td><?php echo ($v["lnum"]); ?></td>
			<td><?php echo ($v["fen"]); ?></td>
		</tr><?php endforeach; endif; ?>
	</tbody>
	</table>
</center>
</body>
<ml>
<script src="/Public/Home/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
	$('#btn').click(function(){
		$.ajax({
		   type: "POST",
		   url: "<?php echo U('Demo/add');?>",
		   dataType : 'json',
		   success: function(msg){
		     if(msg!=2){
		     var str;
		     $.each(msg,function(k,v){
		     	str+='<tr><td>'+v.num+'</td><td>'+v.lnum+'</td><td>'+v.fen+'</td></tr>';
		     })
		     $('#box').html(str);
		  		}else{
		  			alert('您今天已签到！')
		  			}
		   	}
		});
	})
</script>