
//���÷���
//����һ���������URL��ַ
//һ���ַ����Ĵ���������(���������)
function sendInfo(URL,functions){
	var xmlHttp=xmlInit();
	xmlHttp.open("GET", URL, true); 
	xmlHttp.onreadystatechange = function(){ 
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200){ 
			var pReturn="";
			pReturn=xmlHttp.responseText;
			functions(pReturn);
		}
	}		
	xmlHttp.send(null);
}

function sendInfos(URL,functions,s){
	var xmlHttp=xmlInit();
	xmlHttp.open("GET", URL, true); 
	xmlHttp.onreadystatechange = function(){ 
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200){ 
			var pReturn="";
			pReturn=xmlHttp.responseText;
			functions(pReturn,s);
		}
	}		
	xmlHttp.send(null);
}

function sendUrl(URL){
	var xmlHttp=xmlInit();
	xmlHttp.open("GET", URL, false); 
	xmlHttp.send(null);
	if (xmlHttp.readyState == 4 && xmlHttp.status == 200){ 
			return xmlHttp.responseText;
	}
}

function xmlInit(){
	var xmlHttp = false;
	try { 
		xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); 
	} catch (e) { 
	try { 
		xmlHttp =  new ActiveXObject("Microsoft.XMLHTTP"); 
	} catch (e2) {
		xmlHttp =  false; 
	} 
	} 
	if (!xmlHttp && typeof XMLHttpRequest != 'undefined') { 
		xmlHttp =  new XMLHttpRequest(); 
	}
	return xmlHttp;
}

function getRnd(){var dates=new Date();	return "&r="+dates.getTime();}