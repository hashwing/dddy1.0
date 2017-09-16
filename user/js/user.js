

//加载用户信息

window.onload = function(){
$.ajax({
			type:"post",
			data: { "user": "islogin", },
			url:"index.php",
		    success:function(msg){	
                    if(msg!=0)
                    {
                        $("#username").html(msg);
                      
                    }
					else{
					alert("请登录进入");
					window.location.href="../index.html"; 
					}
                    }
                    });
            var dsm=document.ddf.dsm.value;
            var dyadr=document.ddf.dyadr.value;
            var ys=document.ddf.ys.value;
            var fs=document.ddf.fs.value;
            var size=document.ddf.size.value;
            var color=document.ddf.color.value;
            $.ajax({
			type:"post",
			data: { "dsm":dsm,"ys":ys,"fs":fs,"size":size,"color":color,"price":1,"dyadr":dyadr },
			url:"price.php",
			beforeSend:function(){
				$("#price").html("计算中...");
		    },
		    success:function(msg){	
                    $("#price").html(msg);
			  }
		});
        $.ajax({
			type:"post",
			data: { "dyadr":dyadr,"shtime":1 },
			url:"price.php",
			beforeSend:function(){
				$("#shtime").html("加载中...");
		    },
		    success:function(msg){	
                    $("#shtime").html(msg);
			  }
		});
                    
}
////////////////////////////////
$(document).ready(function(){
    
    //注销
    $("#logout a").bind("click",function(){
        if(confirm("您确定要退出吗?"))
        {
		$.ajax({
			type:"post",
			data: { "out": "1", },
			url:"index.php",
		    success:function(msg){	
                    if(msg)
                    {
                        alert("注销成功");
                        window.location.href="../index.html"; 
                      
                    }
					else{
					alert("退出失败，请重试");
					return false;
					}
                    }
                    })
		}
      })
//
      
      
      
	})

