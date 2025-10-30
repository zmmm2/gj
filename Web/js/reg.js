function but(){
        let user = document.getElementsByName("user")[0].value;
        let pwd = document.getElementsByName("pwd")[0].value;
        let userl = user.length;
        let pwdl = pwd.length;
        let value = document.getElementById("value");
        if(userl >= 6 && pwdl >= 6 && userl <= 12 && pwdl <= 12){
            log(user,pwd,value);
        }else{
            value.innerHTML = '<span class="text">账号/密码长度需在6-12位之间</span>';
        }
    }

    function log(user,pass,value){
        $.ajax({
            url: "./register_Ajax.php",
            type: "POST",
            data: {"user":user,"pass":pass},
            dataType: "json",
            error: function(error){
                value.innerHTML = '<span class="text">error，服务器连接失败<span>';
            },
            success: function(data){
                if(data.code === true){
                    value.innerHTML = '<span class="text">'+data.msg+'</span>';
                    setTimeout('window.location.replace("./login.html")',1000);
                }else{
                    value.innerHTML = '<span class="text">'+data.msg+'</span>';
                }
            }
        });
    }

    function value_no(){
        let value = document.getElementById("value");
        value.innerHTML = "";
    }

    function logs(){
        window.location.href="../Web/login.html";
    }