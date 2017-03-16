(function($){
//plusItem('0004','104','鸡蛋饭',1,'15'); 
//minusItem('0003','103');
// var arrObj=selectAll('0001');
// alert(JSON.stringify(arrObj));
})(jQuery);


      
//加法
function plusItem(shopId,itemId,name,count,price){
    var arrObj=selectAll(shopId);
    //若存在数组
    if(arrObj){
        var obj=selectOne(shopId,itemId);
        if(obj){//存在
            for(var i=0;i<arrObj.length;i++){
                if(arrObj[i].itemId==itemId){
                    arrObj[i].count++; 
                }
            }
            txt=JSON.stringify(arrObj); 
            $.cookie('cart'+shopId,txt,{expires:1,path:'/'});//写cookie
        }else{//不存在 
            obj={itemId:itemId,name:stringToHex(name),count:count,price:price}; 
            arrObj.push(obj);
            txt=JSON.stringify(arrObj);
            $.cookie('cart'+shopId,txt,{expires:1,path:'/'});//写cookie 
        }
    } 
    else{
        arrObj=new Array();//新建数组
        obj={itemId:itemId,name:stringToHex(name),count:count,price:price};
        arrObj.push(obj);
        txt=JSON.stringify(arrObj);
        $.cookie('cart'+shopId,txt,{expires:1,path:'/'});//写cookie 
    }  
};



//减法
function minusItem(shopId,itemId){
    
    var arrObj=selectAll(shopId);
    //若存在数组
    if(arrObj){
        var obj=selectOne(shopId,itemId);
        if(obj){//存在
            for(var i=0;i<arrObj.length;i++){
                if(arrObj[i].itemId==itemId){
                    arrObj[i].count--; 
                    if(arrObj[i].count==0){
                        removeItem(shopId,itemId);
                    }else{
                        txt=JSON.stringify(arrObj); 
                        $.cookie('cart'+shopId,txt,{expires:1,path:'/'});//写cookie
                    }
                    break;
                }
            }
            
        }
    } 
};

//移除一个对象
function removeItem(shopId,itemId){
    var arrObj=selectAll(shopId);
    if(arrObj){
        var temp=-1;
        for(var i=0;i<arrObj.length;i++){
            if(arrObj[i].itemId==itemId){
                temp=i;
            }
        }
        if(temp>-1){ 
            arrObj.splice(temp,1);//移除
            txt=JSON.stringify(arrObj); 
            $.cookie('cart'+shopId,txt,{expires:1,path:'/'});//写cookie
        }
    }
}

//移除所有对象
function removeAllItem(shopId){
    var arrObj=selectAll(shopId);
    if(arrObj){ 
        var length=arrObj.length; 
        if(length>0){
            arrObj.splice(0,length);//移除所有
            txt=JSON.stringify(arrObj); 
            $.cookie('cart'+shopId,txt,{expires:1,path:'/'});//写cookie 
        }
        
    }
}

//检索一个对象
function selectOne(shopId,itemId){
   var arrObj= selectAll(shopId);
   if(arrObj){
        for(var i=0;i<arrObj.length;i++){
            if(arrObj[i].itemId==itemId){
                return arrObj[i];
            }
       }
   } 
   return;
}

//检索所有对象
function selectAll(shopId){
    var arrTxt=$.cookie('cart'+shopId);
    if(arrTxt){ 
        return eval('('+arrTxt+')'); 
    }else{ 
        return;
    } 
}


