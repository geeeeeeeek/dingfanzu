(function($){ 
 

})(jQuery);





//------------------------------下面3个函数：初始化、存、取------------------------------
//初始化json
function initMyinfo(){
    var myInfo=$.cookie('myInfo');
    if(!myInfo){
        myInfo='{"userId":"","paymethod":"0","pn":"","name":"","place":"","block":"","floor":"","jifen":""}'; 
        $.cookie('myInfo',myInfo,{expires:720,path:'/'});
    }
}

//存
function my_SaveValue(key,value){
    initMyinfo();//先初始化
    var myInfo=$.cookie('myInfo');
    if(myInfo){
        var obj=eval('('+myInfo+')');
        obj[''+key+'']=value;
        myInfo=JSON.stringify(obj);
        $.cookie('myInfo',myInfo,{expires:720,path:'/'});
    }
}

//取
function my_GetValue(key){
    initMyinfo();//先初始化
    var myInfo=$.cookie('myInfo');
    if(myInfo){
        var obj=eval('('+myInfo+')');
        return obj[''+key+''];
    }
}