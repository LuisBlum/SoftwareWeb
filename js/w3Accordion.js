var w3Accordion = {
    abrir:function(acr){
        var a=document.getElementById(acr);
        if(a.style.display==='none'){
            a.style.display='block';
        } else {
            a.style.display='none';
        }
    }
};