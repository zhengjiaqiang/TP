<?php if (!defined('THINK_PATH')) exit();?>
请选择员工:
<select name="yname" id="yname">
<option value="">请选择</option>
<?php foreach ($list as $k => $v): ?>
<option value="<?php echo $v['id'] ?>"><?php echo $v['yname'] ?></option>	
<?php endforeach ?>
</select>
<input type="button" value="打卡" id='daka'>
请选择日期:
<select name="riqi" id="dates">
<option value="">请选择</option>
<option value="2017-8-4">2017-8-4</option>
<option value="2017-8-5">2017-8-5</option>
<option value="2017-8-6">2017-8-6</option>
<option value="2017-8-7">2017-8-7</option>
<option value="2017-8-8">2017-8-8</option>
</select>
<div id="box"></div>
<script src="/Public/Admin/js/jquery-1.7.2.min.js"></script>
<script>
$(function(){
$("#dates").change(function(){
	var riqi=$("select[name=riqi]").find("option:selected").val();
	alert(riqi);
})
$('#daka').click(function(){
	//获取当前选中select的text值
	var yname=$("#yname").find("option:selected").text();

	$.ajax({
		type:"post",
		url:"<?php echo U('Daka/sel');?>",
		data:{yname:yname},
		success:function(data)
		{
			$("#box").html(data);
		}
	})
})
})
</script>