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
            editform.submit();
            $(this).css('background-color','#fff');
            $(this).css('color','#626262');
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
    $('.Move').click(function(){
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
	
});
