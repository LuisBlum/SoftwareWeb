var w3Tabs = {
    abrir:function(grp,tab,grp2,btn){
        var i=0;
        var arrTabs=document.getElementsByClassName(grp);
        var arrBtns=document.getElementsByClassName(grp2);
        for(i=0;i<arrTabs.length;i++){
            arrTabs[i].style.display='none';
        }
        for(i=0;i<arrBtns.length;i++){
            arrBtns[i].className='w3-bar-item w3-button '+grp2;
        }
        document.getElementById(tab).style.display='block';
        document.getElementById(btn).className+=' w3-theme-l2';
    }
};