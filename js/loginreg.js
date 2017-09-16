$(document).ready(function(){
    $("#loginsubmit").click(function(){
			login();
			return false;
      })
      
      function login(){
		var user =$("#signin-username").val();
		var pwd=$("#signin-password").val();
		if(user=="")
		{
			alert("账号不能为空");
            $("input#signin-username").focus(); 
            return false;
		}
        if(pwd=="")
        {
			alert("密码不能为空");
            return false;
		}
		$.ajax({
			type:"post",
			data: { "user": user, "pwd": pwd },
			url:"login.php",
			beforeSend:function(){
				$("#confirm").html("登录中...");
		    },
		    success:function(msg){	
                    if(msg==1)
                    {
                        $("#confirm").html("登录成功");
                      window.location.href="user/dyadrxz.php"; 
                    }
                    else{
                        //location.href="user/index.php"; 
                        $("#confirm").html(msg);
                    }
                    	
                    //confirm.innerHTML="11"
                    //
                    	
			  }
		})
      }
      $("#reginsubmit").click(function(){
			Regin();
			return false;
      })
function Regin()
      {
        var user =$("#signup-username").val();
		var pwd=$("#signup-password").val();
        var pwd2=$("#signup-password2").val();
        var email=$("#signup-email").val();
        
		if(user=="")
		{
			alert("账号不能为空");
            $("input#signup-username").focus(); 
            return false;
		}
        if(email=="")
        {
            alert("邮箱不能为空");
            $("input#signup-email").focus(); 
            return false;
        }
        var TextVal = $("#signup-email").val();            
　　    var Regex = /^(?:\w+\.?)*\w+@(?:\w+\.)*\w+$/;            
　　  if (!Regex.test(TextVal))
    {                
　　  alert("邮箱格式不对")
      $("input#signup-email").focus(); 
            return false;
         
    }
        if(pwd=="")
        {
			alert("密码不能为空");
            $("input#signup-password").focus(); 
            return false;
		}
        if (pwd.length<6)
         {                
　　       chk4.innerHTML='<font color=green>密码要六位以上</font>' ;
          $("input#signup-password").focus();
            return false;
        }
        if(pwd!=pwd2)
        {
            alert("两次输入密码不一致");
            $("input#signup-password2").focus();
            return false;
        }
		$.ajax({
			type:"post",
			data: { "user": user, "pwd": pwd ,"email":email},
			url:"regin.php",
			beforeSend:function(){
				$("#signuptip").html("注册中...");
		    },
		    success:function(msg){	
                    if(msg==0)
                    {
                        alert("用户名已经被注册");
                        $("#signuptip").html("");
                        $("input#signup-username").focus();
                        return false;
                      
                    }
                    if(msg==1)
                    {
                        alert("注册成功");
                        window.location.href="user/index.html"; 
                    }
                    else{
                        //location.href="user/index.php"; 
                        $("#signuptip").html("网络连接失败，请重试");
                        return false;
                    }
      }
      })
      }
      
	})