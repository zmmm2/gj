     function news(){
        let bb = document.getElementById("bb").value;
        let lj = document.getElementById("lj").value;
        let tz = document.getElementsByTagName("textarea")[0].value;
        let value = document.getElementById("value");
        if(bb == "" || lj == "" || tz == ""){
            value.innerHTML = '<span class="text">请填写完整信息</span>';
        }else if(bb.length > 100 || lj.length > 300 || tz.length > 3000){
            value.innerHTML = '<span class="text">有信息超出了最大长度</span>';
        }else{
            Ajax(bb,lj,tz);
        }
    }

    function Ajax(bb,lj,tz){
        $.ajax({
            url: "./Ajax.php?act=new",
            type: "POST",
            data: {"bb":bb,"lj":lj,"tz":tz},
            dataType: "json",
            error: function(error){
                value.innerHTML = '<span class="text">error，服务器连接失败</span>';
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