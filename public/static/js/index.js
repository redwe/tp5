$(function(){
	//用户管理、用户列表条件选择效果
	$('.turnDown').click(function(){
		$('.popUps').css('display','block');
	})
	$('.maskClose').click(function(){
		$('.popUps').css('display','none');
	})
    $('.cancelBtn').click(function(){
        $('.popUps').css('display','none');
    })

    //用户管理、用户操作可以修改input可编辑状态
    $('table tr td .edit').click(function(){
        if($(this).html()=='保存'){
            $(this).css('background-color','#fff')
            $(this).css('color','#626262')
            $(this).html('修改');
            $(this).parent().siblings().children('input').attr("disabled","disabled");
            $(this).parent().siblings().children('select').attr("disabled","disabled");
            $(this).parent().siblings().children('input').removeClass('Cur');
            $(this).parent().siblings().children('select').removeClass('Sel');

        }else if($(this).html()=='修改'){
            $(this).html('保存');
            $(this).css('background-color','#1d2088')
            $(this).css('color','#fff')
            $(this).parent().siblings().children('input').removeAttr('disabled');
            $(this).parent().siblings().children('select').removeAttr('disabled');
            $(this).parent().siblings().children('input').addClass('Cur');
            $(this).parent().siblings().children('select').addClass('Sel');
        }

    })
    //用户管理、用户操作可以删除用户信息状态
    $('.approvalCont ul div .Move').click(function(){
        var delid = $(this).data("id");
        $("#delid").val(delid);
        $('.popUps').css('display','block');
    })
    //主界面新建用户 地区选择效果
    $('.options .option1').click(function(){
        $(this).addClass('current').siblings().removeClass('current');
        $(this).parent().siblings('input').val($(this).prop('firstChild').nodeValue.trim()) ;
    });

	
		//主界面课程 动态追加及删除项目名称分类等效果
	$('.itmeA .optionAdd').click(function(){
		var Element= $(this).siblings('span').html();
		var ele = '<div class="option2"><input type="text" class="addinput" id="input1" name="input1"><div class="optionDel">-</div></div>';
		$(this).prev('div').append(ele);
		$(this).siblings().children().removeClass('current');
        $('#shengfen').val('');
	});
	$('.itmeB .optionAdd').click(function(){
		var Element= $(this).siblings('span').html();
		var ele = '<div class="option2"><input type="text" class="addinput" id="input2" name="input2"><div class="optionDel">-</div></div>';
		$(this).prev('div').append(ele);
		$(this).siblings().children().removeClass('current');
        $('#fenbu').val('');
	});
	$('.itmeC .optionAdd').click(function(){
		var Element= $(this).siblings('span').html();
		var ele = '<div class="option2"><input type="text" class="addinput" id="input3" name="input3"><div class="optionDel">-</div></div>';
		$(this).prev('div').append(ele);
		$(this).siblings().children().removeClass('current');
        $('#shenfen').val('');
	});
		$('.itmeD .optionAdd').click(function(){
		var Element= $(this).siblings('span').html();
		var ele = '<div class="option2"><input type="text" class="addinput" id="input4" name="input4"><div class="optionDel">-</div></div>';
		$(this).prev('div').append(ele);
		$(this).siblings().children().removeClass('current');
        $('#gangwei').val('');
	});
		
	
	
	
		$('.options').on('click','.optionDel',function(){
            var sid = $(this).data('id');
            var table = $(this).data('table');
            var id = $(this).attr('id');
            var delobj = $(this).parent();
            if($(this).attr("id")){
                var isdo = confirm("是否删除已经保存的数据？");
                if(isdo){
                    $.ajax({
                        type: "POST",
                        url: "/admin/users/isdelOr",
                        data: {sid:sid, id:id},
                        dataType: "text",
                        success: function(data){
                            if(data){
                                if(confirm("此属性已经关联用户信息，删除后会影响用户信息的完整性，是否真的要删除？")) {
                                    delobj.remove();
                                    deloption(table,id,"/admin/users/deloption");
                                }
                            }
                            else
                            {
                                delobj.remove();
                                deloption(table,id,"/admin/users/deloption");
                            }
                         }
                     });
                }
                else
                {
                    delobj.remove();
                }
            }
            else
            {
                delobj.remove();
            }
	})	
	
});
