<?php
namespace Org\Util;
class Page{

	public $page = 1;	//当前页
	public $count;		//数据总条数
	public $page_num = 2;	//每页显示条数
	public $limit = 0;	//偏移量
	public $page_total;	//总页数

	public function __construct($count){
		$this->page = I('get.p') ? I('get.p') : 1;	//获取当前页
	    //echo $this->page;die;
		$this->count = $count; //数据总条数


		$this->page_total = ceil($this->count / $this->page_num);	//总页数
		$this->limit = ($this->page - 1) * $this->page_num; //偏移量
	}

	public function getPage(){

		$page_total = ceil($this->count / $this->page_num);	//总页数

		$start = $this->page - 3;
		if($start < 1) $start = 1;	//设置开始页数

		$end = $start + 6;
		if($end > $page_total) $end = $page_total;

		$page_str = '';
		for($i = $start; $i<= $end; $i++){
			if($this->page == $i){
				$page_str .= '<span class="current" id="now_page">'.$i.'</span> ';	

			}else{
				$page_str .= '<a href="javascript:void(0)" class="page" opt="'.$i.'">'.$i.'</a> ';
			}
		}

		//上一页
		$prev = ($this->page - 1) ? $this->page - 1 : 1;
		$prev_str = '<a href="javascript:void(0)" class="page" opt="'.$prev.'">上一页</a> ';

		//下一页
		$next = ($this->page + 1) > $page_total ? $page_total : $this->page + 1;
		$next_str = '<a href="javascript:void(0)" class="page" opt="'.$next.'">下一页</a> ';

		$str = '总页数：'.$page_total;

		//如果当前页大于4，展示上一页
		if($this->page > 4){
			$page_str = $prev_str.$page_str;
			
		}

		//如果当前页小于总页数 -4，不展示下一页
		if($this->page < $page_total - 3){
			$page_str = $page_str.$next_str;
		}
		return $page_str.' | '.$str;

	}

}