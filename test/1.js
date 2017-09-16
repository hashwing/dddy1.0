function checkreg()
  {
            if (document.form1.User.value=="")
   {
    alert("请输入您的用户名!");
    form1.User.focus();
    return false;
   }
            if (document.form1.User.value.length<4 || document.form1.User.value.length>15)
   {
    alert("用户名长度限制在4-15位!");
    form1.User.focus();
    return false;
   }
                        if (document.form1.Pwd.value=="")
   {
    alert("请输入密码!");
    form1.Pwd.focus();
    return false;
   }
                        if (document.form1.Pwd.value.length<6 || document.form1.Pwd.value.length>15)
   {
    alert("密码长度限制在6-15位!");
    form1.Pwd.focus();
    return false;
   }
            if(document.form1.Pwd.value!=document.form1.Pwdagain.value)
   {
    alert("两次输入的密码不同!")
    form1.Pwd.focus();
    return false;
   }
                        if (document.form1.Qq.value=="")
   {
    alert("请输入您的QQ号码!");
    form1.Qq.focus();
    return false;
   }
   if (document.form1.Qq.value.length>10 || document.form1.Qq.value.length<4)
   {
    alert("QQ长度应该在4-10位之间!");
    form1.Qq.focus();
    return false;
   }
                        if (document.form1.Email.value=="")
   {
    alert("请输入您的Email地址!");
    form1.Email.focus();
    return false;
   }
      var myRegex = /@.*\.[a-z]{2,6}/;
      var email = form1.Email.value;
      email = email.replace(/^ | $/g,"");
      email = email.replace(/^\.*|\.*$/g,"");
      email = email.toLowerCase();
       
                        //验证电子邮件的有效性
                        if (email == "" || !myRegex.test(email))
      {
        alert ("请输入有效的E-MAIL!");
        form1.Email.focus();
        return false;
      }
                       return true;
  }
    function Isval(val,name)
    {
                     if (val.value!='' && (isNaN(val.value) || val.value==0))
     {
      alert(name+"应填数字！");
       val.value="";
       val.focus();
     }
     }