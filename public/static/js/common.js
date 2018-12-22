/**
 * Created by Administrator on 2018/12/8 0008.
 */
//根据id删除某个表的数据
function deloption(table,id,url){
    $.ajax({
        type: "POST",
        url: url,
        data: {table:table, id:id},
        dataType: "text",
        success: function(res){
            if(res){
                //alert("删除成功！"+id);
            }
        }
    });
}
