   function notice(){
        let content = document.getElementsByTagName("textarea")[0].value;
        let value = document.getElementById("value");
        if(content.length <=0 || content.length > 3000){
            value.innerHTML = '<span class="text">内容长度需在1-3000字符之间</span>';
        }else{Ajax(content);}
    }

    function Ajax(content){
        $.ajax({
            url: "./Ajax.php?act=notice",
            type: "POST",
            data: {"content":content},
            dataType: "json",
            error: function(error){
                value.innerHTML = '<span class="text">error，服务器连接失败<span>';
            },
            success: function(data){
                if(data.code === true){
                    value.innerHTML = '<span class="text">'+data.msg+'</span>';
                }else{
                    value.innerHTML = '<span class="text">'+data.msg+'</span>';
                }
            }
        });
    }

    function not_text(){
        let value = document.getElementById("value");
        value.innerHTML = "";
    }