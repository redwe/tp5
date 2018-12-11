$(function(){
	//资源管理页面全选、反选案例
	 //计算次数，当 #food 7个都选中时，#all 也选中
    var num =0;
    //#all 全选框选中时，#food 全部选中
    $('#all').click(function(){
        if((this.checked)){
            $('.approvalCont ul li input:checkbox').prop('checked',true);
        }else{
            $('.approvalCont ul li input:checkbox').prop('checked',false);
        }
    })
    //全部框都选中时，#all 也选中
    $('.approvalCont ul li input:checkbox').click(function(){
        if(this.checked){
            num++;
        }else{
            num--;
        }
       if($('.approvalCont ul li input:checked').length == $('.approvalCont ul li input').length){
       		$('#all').prop('checked',true);
       }else{
            $('#all').prop('checked',false);
        }
    })
});
