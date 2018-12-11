/**
 * Created by Administrator on 2018/12/10 0010.
 */

function setCheckbox(obj,str){
    if(obj.checked){
        checkAll(str);
    }
    else
    {
        cancleAll(str)
    }
}

function checkAll(str){
    $(document.getElementsByName(str)).each(function(i){
        this.checked = true;
    })
}

function cancleAll(str){
    $(document.getElementsByName(str)).each(function(i){
        this.checked = false;
    })
}

function getChecks(str){
    var ids =[];
    $('input[name='+str+']:checked').each(function(){
        ids.push($(this).val());
    });
    if(ids){
        return ids;
    }
    else
    {
        alert("请选择需要删除的记录！");
    }
}

function delAll(m,d){
    if(d==1){
        url = "/admin/ziyuan/delzy";
    }
    else
    {
        url = "/admin/ziyuan/del";
    }
    switch (m){
        case 200:
            window.location.href = url+"/limit/200";
            break;
        case 500:
            window.location.href = url+"/limit/500";
            break;
        default :
            var ids = getChecks("delid");
            //alert(ids);
            $("#ids").val(ids);
            delform.action = url;
            delform.submit();
            break;
    }
}

$("#recycle").click(function(){
    var url = window.location.href;
    url = url + "/hsz/1";
    window.location.href = url;
})
