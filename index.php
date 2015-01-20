<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>o(∩_∩)o </title>
	
	<link rel="stylesheet" href="css/my.css">

</head>
<body>
	<table style = "width:100%;min-width:650px">
		<tr><td><h2>套外linux机器基础性能检查</h2></td></tr>
		<tr><td>查询IP: <input id="ip" type="text" value = "192.168.14.99" maxlength="15" ></td></tr>
		<tr><td>
			<div class="card">
				<div onclick="shq.cmenu(event)">
					<a href="#" id="cpu" class="CPU">处理器</a>
					<a href="#" id="memory" class="memory">内存</a>
					<a href="#" id="disk" class="disk">磁盘</a>
					<a href="#" id="service" class="service">服务</a>
					<a href="#" id="diy" class="diy">自助</a>
				</div><div ID = "content" class="content">请选择类型</div>
			</div>
		</td></tr>
	</table>
Mysql主从同步检查
<script type="text/javascript">
	var shq={}
	shq.cmenu=function(e)
	{
	var e=window.event?window.event.srcElement:e.target;
	        if(/a/i.test(e.tagName)){
	        e.parentNode.className=e.className;
	        var ip=document.getElementById("ip").value;
	        if(e.id == 'cpu'){
	        	e.parentNode.nextSibling.innerHTML='加载中，请等待。。。'
		        var url = "/monitor/man.php?type=" + e.id + "&ip=" + ip;
				ajax(url);
		    }else if(e.id == 'memory'){
	        	e.parentNode.nextSibling.innerHTML='加载中，请等待。。。'
			    var url = "/monitor/man.php?type=" + e.id + "&ip=" + ip;
				ajax(url);
			}else if(e.id == 'disk'){
	        	e.parentNode.nextSibling.innerHTML='加载中，请等待。。。'
				var url = "/monitor/man.php?type=" + e.id + "&ip=" + ip;
				ajax(url);
			}else if(e.id == 'service'){
	        	e.parentNode.nextSibling.innerHTML='加载中，请等待。。。'
					var url = "/monitor/man.php?type=" + e.id + "&ip=" + ip;
					ajax(url);
			}else if(e.id == 'diy'){
	        	e.parentNode.nextSibling.innerHTML='加载中，请等待。。。'
					var url = "/monitor/man.php?type=" + e.id + "&ip=" + ip;
					ajax(url);
			}

	        e.parentNode.nextSibling.style.cssText='border-top:none';
	        e.blur();
	        }
	}
	function ajax(url) {
		//先声明一个异步请求对象
			var xmlHttpReg = null;
			if (window.ActiveXObject) {//如果是IE
				xmlHttpReg = new ActiveXObject("Microsoft.XMLHTTP");
			} else if (window.XMLHttpRequest) {
				xmlHttpReg = new XMLHttpRequest(); //实例化一个xmlHttpReg
			}
			//如果实例化成功,就调用open()方法,就开始准备向服务器发送请求

			if (xmlHttpReg != null) {
				xmlHttpReg.open("get", url, true);
				xmlHttpReg.send(null);
				xmlHttpReg.onreadystatechange = doResult; //设置回调函数
			}
			//回调函数
			//一旦readyState的值改变,将会调用这个函数,readyState=4表示完成相应
			//设定函数doResult()
			function doResult() {
				if (xmlHttpReg.readyState == 4) {//4代表执行完成
					if (xmlHttpReg.status == 200) {//200代表执行成功
						//将xmlHttpReg.responseText的值赋给ID为resText的元素
						document.getElementById("content").innerHTML = xmlHttpReg.responseText;
					}
				}
			}
		}

</script>
</body>
</html>
