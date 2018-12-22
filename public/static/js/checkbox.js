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
    if(ids.length > 0){
       return ids;
    }
    else
    {
        alert("请选择需要操作的记录！");
        return false;
    }
}

function delAll(m,url){

        switch (m){
            case 200:
                if(confirm("确认要批量操作200条信息吗？")) {
                    window.location.href = url + "/limit/200";
                }
                break;
            case 500:
                if(confirm("确认要批量操作500条的信息吗？")) {
                    window.location.href = url + "/limit/500";
                }
                break;
            default :
                var ids = getChecks("delid");
                if(ids && confirm("确认要批量操作勾选的信息吗？")) {
                    //alert(ids);
                    $("#ids").val(ids);
                    delform.action = url;
                    delform.submit();
                }
                break;
        }

}

$("#recycle").click(function(){
    var url = window.location.href;
    url = url + "/hsz/1";
    window.location.href = url;
})
