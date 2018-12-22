$(function(){

    //主界面课程 动态追加及删除项目名称分类等效果
    $('.itmeA .optionAdd').click(function(){
        var Element= $(this).siblings('span').html();
        var ele = '<div class="option2"><input type="text" class="addinput" id="input1" name="addinput"><div class="optionDel">-</div></div>';
        $(this).prev('div').append(ele);
        $(this).siblings().children().removeClass('current');
    });
    $('.itmeB .optionAdd').click(function(){
        var Element= $(this).siblings('span').html();
        var ele = '<div class="option2"><input type="text" class="addinput" id="input2" name="addinput"><div class="optionDel">-</div></div>';
        $(this).prev('div').append(ele);
        $(this).siblings().children().removeClass('current');
    });
    $('.itmeC .optionAdd').click(function(){
        var Element= $(this).siblings('span').html();
        var ele = '<div class="option2"><input type="text" class="addinput" id="input3" name="addinput"><div class="optionDel">-</div></div>';
        $(this).prev('div').append(ele);
        $(this).siblings().children().removeClass('current');
    });

    $('.options').on('click','.optionDel',function(){
        var table = "projects";
        var id = $(this).attr('id');
        var pname = $(this).data('id');
        var delobj = $(this).parent();
        if($(this).attr("id")){
            var isdo = confirm("是否删除已经保存的数据？");
            if(isdo){
                $.ajax({
                    type: "POST",
                    url: "/admin/xiangmu/isdelOr",
                    data: {id:id,pname:pname},
                    dataType: "text",
                    success: function(data){
                        if(data){
                            if(confirm("此属性已经关联项目信息，删除后会影响信息的完整性，是否真的要删除？")) {
                                delobj.remove();
                                deloption(table,id,"/admin/xiangmu/del_pro");
                            }
                        }
                        else
                        {
                            delobj.remove();
                            deloption(table,id,"/admin/xiangmu/del_pro");
                        }
                    }
                });
            }
        }
        else
        {
            delobj.remove();
        }
    })
});
