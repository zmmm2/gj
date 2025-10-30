    let box = [];
    for(let i =1;i<=6;i++){
        box[i] = document.querySelector('.pay-box'+i);
    }
    if(window.matchMedia("(max-width: 460px)").matches){
        for(let j =1;j<=6;j++){
            box[j].style.width = "100%";
            box[j].style.display = "block";
        }
    }else{
        for(let k =1;k<=6;k++){
            box[k].style.width = "50%";
            box[k].style.display = "block";
        }
    }
   box[1].onclick = function () {
        window.location.href = '../epayvip.php?time=1month&admin=' + user;
    }
    box[2].onclick = function () {
        window.location.href = '../epayvip.php?time=3month&admin=' + user;
    }
    box[3].onclick = function () {
        window.location.href = '../epayvip.php?time=1year&admin=' + user;
    }
    box[4].onclick = function () {
        window.location.href = '../epayvip.php?time=100year&admin=' + user;
    }
    let time1 = document.getElementById('time1');
    let time2 = document.getElementById('time2');
    let content1 = document.getElementById('content1');
    let content2 = document.getElementById('content2');
    let money1 = document.getElementById('money1');
    let money2 = document.getElementById('money2');
    let youhui1 = document.getElementById('youhui1');
    let youhui2 = document.getElementById('youhui2');
    box[5].onmouseover = function (){
        time1.innerText = '你在想屁吃?';
        content1.innerText = '你是不是在想屁吃？记住，天下没有免费的午餐，快面对现实吧，大兄弟';
        money1.innerText = '售价:999RMB';
        youhui1.innerText = '优惠:99折';
    }
    box[5].onmouseout = function (){
        time1.innerText = '缴费一整年(免费)';
        content1.innerText = '由易对接后台站长提供的免费贴心服务，是不是很感动?还不快来领取？';
        money1.innerText = '售价:0RMB';
        youhui1.innerText = '0折';
    }
    box[6].onmouseover = function (){
        time2.innerText = '你在想屁吃?';
        content2.innerText = '你是不是在想屁吃？记住，天下没有免费的午餐，快面对现实吧，大兄弟';
        money2.innerText = '售价:999RMB';
        youhui2.innerText = '优惠:99折';
    }
    box[6].onmouseout = function (){
        time2.innerText = '激活永久版(免费)';
        content2.innerText = '由易对接后台站长提供的免费贴心服务，是不是很感动?还不快来领取？';
        money2.innerText = '售价:0RMB';
        youhui2.innerText = '0折';
    }