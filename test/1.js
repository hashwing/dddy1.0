function checkreg()
  {
            if (document.form1.User.value=="")
   {
    alert("�����������û���!");
    form1.User.focus();
    return false;
   }
            if (document.form1.User.value.length<4 || document.form1.User.value.length>15)
   {
    alert("�û�������������4-15λ!");
    form1.User.focus();
    return false;
   }
                        if (document.form1.Pwd.value=="")
   {
    alert("����������!");
    form1.Pwd.focus();
    return false;
   }
                        if (document.form1.Pwd.value.length<6 || document.form1.Pwd.value.length>15)
   {
    alert("���볤��������6-15λ!");
    form1.Pwd.focus();
    return false;
   }
            if(document.form1.Pwd.value!=document.form1.Pwdagain.value)
   {
    alert("������������벻ͬ!")
    form1.Pwd.focus();
    return false;
   }
                        if (document.form1.Qq.value=="")
   {
    alert("����������QQ����!");
    form1.Qq.focus();
    return false;
   }
   if (document.form1.Qq.value.length>10 || document.form1.Qq.value.length<4)
   {
    alert("QQ����Ӧ����4-10λ֮��!");
    form1.Qq.focus();
    return false;
   }
                        if (document.form1.Email.value=="")
   {
    alert("����������Email��ַ!");
    form1.Email.focus();
    return false;
   }
      var myRegex = /@.*\.[a-z]{2,6}/;
      var email = form1.Email.value;
      email = email.replace(/^ | $/g,"");
      email = email.replace(/^\.*|\.*$/g,"");
      email = email.toLowerCase();
       
                        //��֤�����ʼ�����Ч��
                        if (email == "" || !myRegex.test(email))
      {
        alert ("��������Ч��E-MAIL!");
        form1.Email.focus();
        return false;
      }
                       return true;
  }
    function Isval(val,name)
    {
                     if (val.value!='' && (isNaN(val.value) || val.value==0))
     {
      alert(name+"Ӧ�����֣�");
       val.value="";
       val.focus();
     }
     }