<?php
/**
 * 堆排序
 * @author  gaochao <gaochao@baofeng.com>
 * @date    2016-06-03 13:58:38
 */

class Heap extends SortAlgorithm {

    #堆排序
    private function heapSort(&$arr) {
         #初始化大顶堆
         $this->initHeap($arr, 0, count($arr) - 1);
         
         #开始交换首尾节点,并每次减少一个末尾节点再调整堆,直到剩下一元素
        for($end = count($arr) - 1; $end > 0; $end--) {
            $temp = $arr[0];
            $arr[0] = $arr[$end];
            $arr[$end] = $temp;
            $this->ajustNodes($arr, 0, $end - 1);
        }
    }
    
    #初始化最大堆,从最后一个非叶子节点开始,最后一个非叶子节点编号为数组长度/2 向下取整
    private function initHeap(&$arr) {
        $len = count($arr);
        for($start = floor($len / 2) - 1; $start >= 0; $start--) {
            $this->ajustNodes($arr, $start, $len - 1);
        }
    }
    
    #调整节点
    #@param $arr    待调整数组
    #@param $start    调整的父节点坐标
    #@param $end    待调整数组结束节点坐标
    private function ajustNodes(&$arr, $start, $end) {
        $maxInx = $start;
        $len = $end + 1;    #待调整部分长度
        $leftChildInx = ($start + 1) * 2 - 1;    #左孩子坐标
        $rightChildInx = ($start + 1) * 2;    #右孩子坐标
        
        #如果待调整部分有左孩子
        if($leftChildInx + 1 <= $len) {
            #获取最小节点坐标
            if($arr[$maxInx] < $arr[$leftChildInx]) {
                $maxInx = $leftChildInx;
            }
            
            #如果待调整部分有右子节点
            if($rightChildInx + 1 <= $len) {
                if($arr[$maxInx] < $arr[$rightChildInx]) {
                    $maxInx = $rightChildInx;
                }
            }
        }
        
        #交换父节点和最大节点
        if($start != $maxInx) {
            $temp = $arr[$start];
            $arr[$start] = $arr[$maxInx];
            $arr[$maxInx] = $temp;
            
            #如果交换后的子节点还有子节点,继续调整
            if(($maxInx + 1) * 2 <= $len) {
                $this->ajustNodes($arr, $maxInx, $end);
            }
        }
    }

	public function exerciser(array $arr){
		$this->heapSort($arr);

		return $arr;
	}

	public function getName(){
		return "堆排序";
	}

}