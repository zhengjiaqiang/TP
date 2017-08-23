<?php if (!defined('THINK_PATH')) exit();?>
<center id='fbox'>
	<p><a href="?l=zh-cn">中文</a>||<a href="?l=en-us">英文</a></p>
	名称:<input type="text" name="goods_name" id="goods_name">
	颜色:<input type="text" name="goods_color" id="goods_color">
	<input type="button" value="<?php echo ($wellcome); ?>" class="search">
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
		<td><a href="/index.php/Home/Demo2/counts/id/<?php echo ($v["id"]); ?>" target='_blank'><?php echo ($v["url"]); ?></a></td>	
		<td><?php echo ($v["click_num"]); ?></td>	
		</tr><?php endforeach; endif; ?>	
	</table>
	<?php echo ($pages); ?>
</center>
<script src="/Public/Home/js/jquery-1.7.2.min.js"></script>
<script>
$(function(){
//search
var obj=Object();//顶一个全局对象
$('#fbox').on('click','.search',function(){
	obj['goods_name']=$('#goods_name').val();
	obj['goods_color']=$('#goods_color').val();
	 var str='';
	 $.each(obj,function(k,v){
      str+=k+'='+v+'&';
	 })
	$.ajax({
	  type:'get',
       url:'/index.php/Home/Demo2/show_table',
       //data:{p:p,str:str},
       data:str,
       success:function(data){
       	//alert(data)
        $('#fbox').html(data);
       }
	});
	
})

//fenye
$('#fbox').on('click','.page',function(){
	 var str='';
	 $.each(obj,function(k,v){
      str+=k+'='+v+'&';
	 })
	var p=$(this).attr('opt');
	$.ajax({
	  type:'get',
       url:'/index.php/Home/Demo2/show_table',
       //data:{p:p,str:str},
       data:str+"p="+p,
       success:function(data){
       	//alert(data)
        $('#fbox').html(data);
       }
	});
})
})
</script>