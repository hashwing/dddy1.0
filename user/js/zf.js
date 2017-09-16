function checkAll() {
  var chkItems = document.getElementsByName("item");
  for (var i = 0; i < chkItems.length; i++) {
    chkItems[i].checked = event.srcElement.checked;
  }
  calculateMoney();
}
//统计所有选中的产品金额
function calculateMoney() {
  var sum = 0;
  var chkItems = document.getElementsByName("item");
  for (var i = 0; i < chkItems.length; i++) {
    if (chkItems[i].checked) {
      sum += parseFloat(chkItems[i].value);
    }
  }
  var sumMoneyObj = document.getElementById("sumMoney");
  sumMoneyObj.innerHTML = sum.toFixed(2);
}
 
//给每个产品复选框加上自动统计功能
function iniEvent() {
  var chkItems = document.getElementsByName("item");
  for (var i = 0; i < chkItems.length; i++) {
    chkItems[i].onclick = calculateMoney;
  }      
}
function zftj()
{
    var inputobj= document.getElementById('zxzf');
    eval("inputobj.style.display=\"none\"");
  var chkItems = document.getElementsByName("item");
  var json = {};
  var j=0;
  for (var i = 0; i < chkItems.length; i++) {
    if (chkItems[i].checked) {
      json[j]=chkItems[i].id;
      j++;
    }
  }
//alert(JSON.stringify(json)); 
if(j)
{
      $.ajax({
			type:"post",
			data: {"hdd":JSON.stringify(json) },
			url:"zf.php",
			beforeSend:function(){
				$("#tjtip").html("订单提交中...");
		    },
		    success:function(msg){
                    if(msg){
		              $("#tjtip").html('完成，正在跳转');
                      window.location.href=msg; 
		            }
                    else{
                        $("#tjtip").html('提交出错');
                         eval("inputobj.style.display=\"\"");
                    }
                   
			  }
		});
}
else{
    alert("请选择要支付的订单");
    eval("inputobj.style.display=\"\"");
}

}
//hdfk
function hdfk()
{
    var inputobj= document.getElementById('zxzf');
    eval("inputobj.style.display=\"none\"");
  var chkItems = document.getElementsByName("item");
  var json = {};
  var j=0;
  for (var i = 0; i < chkItems.length; i++) {
    if (chkItems[i].checked) {
      json[j]=chkItems[i].id;
      j++;
    }
  }
//alert(JSON.stringify(json)); 
if(j)
{
      $.ajax({
			type:"post",
			data: {"hdd":JSON.stringify(json) },
			url:"hdfk.php",
			beforeSend:function(){
				$("#tjtip").html("订单提交中...");
		    },
		    success:function(msg){
                    if(msg){
		              $("#tjtip").html('完成，正在跳转');
                      window.location.href=msg; 
		            }
                    else{
                        $("#tjtip").html('提交出错');
                         eval("inputobj.style.display=\"\"");
                    }
                   
			  }
		});
}
else{
    alert("请选择要支付的订单");
    eval("inputobj.style.display=\"\"");
}

}