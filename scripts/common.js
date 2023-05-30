

jQuery.fn.isIE=function () {
        var brow=$.browser;
        var bInfo="";
        if(brow.msie){
            return "ie"; 
        }
        else {
            return "ie2";
        }
}
jQuery.fn.isFirefox=function () {
        var brow=$.browser;
        var bInfo="";
        if(brow.mozilla) {
            return true; 
        }
        else {
            return false;
        }
}

function stringToHex(str) {
　　　　var arr = [];
　　　　for (var i = 0; i < str.length; i++) {
　　　　　　arr[i] = ("00" + str.charCodeAt(i).toString(16)).slice(-4);
　　　　}
　　　　return "\\u" + arr.join("\\u");
}

function hexToString(str) {
　　　　return unescape(str.replace(/\\/g, "%"));
}

function showAlert(msg,url){ 
        $("#alert").trigger('click');
        $("#alert-msg").html(msg);
         
         if(url){
            $("#btn-ok,#btn-close").click(function(event) {
                window.location.href=url;
            });
         }
        
}

 