var arr2;
var tel="13[0-9]{9}|15[0-9]{9}";
var result;
//var count=get_count(content);  
var suc=0;  
var urla;
var title,tel_str="",email_str="",qq_str="";
var arr,arr_div;

function get_replacement(content,replacement){
//var replacement="";  
if(replacement=="" || replacement==null) return content;
if(content=="" || content==null) return "";

	replacement=replacement.split(",");
	for(var i=0; i<replacement.length; i++){
		content=content.replace(replacement[i],"");
		return content;
	}		
}

function pages(url,c){
	url="ajax.php?url="+url;
	var pcontent=sendUrl(url+"&c="+c+getRnd());
	pcontent=get_replacement(pcontent);  
	return pcontent;
}

function getResult(content,s1,s2){
if(content=="" || content==null) return "";
	var l=0;
	l=content.indexOf(s1);		
	if(l==-1 || l==null)return 0;
	content=content.substring(l+s1.length,content.length);

	l=content.indexOf(s2);		
	if(l==-1 || l==null)return 0;
	return content.substring(0,l);
}


function filter_text(str){
	var tmp=str;
	tmp= tmp.replace(/\r\n/g,"");
	tmp= tmp.replace(/\r/g,"");
	tmp= tmp.replace(/&amp;/g,"");
	tmp= tmp.replace(/&lt;/g,"");
	tmp= tmp.replace(/&gt;/g,"");
	tmp= tmp.replace(/\(/g,"");
	tmp= tmp.replace(/\)/g,"");
	tmp= tmp.replace(/,/g,"");
	tmp= tmp.replace(/-/g,"");
	tmp= tmp.replace(/&rdquo;/g,"");
	tmp= tmp.replace(/&ldquo;/g,"");	
	tmp= tmp.replace(/&/g,"");	
	tmp= tmp.replace(/	/g,"");
	tmp= tmp.replace(/	/g,"");
	tmp= tmp.replace(/ /g,"");
	tmp= tmp.replace(/ /g,"");
	tmp= tmp.replace(//g,"");
	tmp= tmp.replace(/ /g,"");
	//tmp= tmp.replace(/\%/g,"");
	return ClearHtmlTag(tmp);
}

function get_url(url){
	if (url=="" || url==null) return "";
	url=url.replace(/\?/g,"______");  
	url=url.replace(/\&/g,"||||||");
	return url;
}

function get_count(a){
	var pages=0;  
	  
	if(a.indexOf("total_page") == -1){   
		pages = 1;
		return pages; 
	}else{
	//alert(1)
		var z1=a.split("total_page \> ");
		z2=z1[1].split(")");	
		//alert(z2[0]);	
		pages = z2[0];
		return parseInt(pages);
		}
}

function get_title(title){
	if (title=="" || title==null) return "";
	if (title.indexOf("<title>") == -1 || title.indexOf("</title>") == -1) return "";
	var v3=title.split("<title>");
	var v4=v3[1].split("</title>");
	return v4[0];
}

function get_a(value){
	if(value=="" || value==null) return ""; 
	var r, re; 
	re =/<a (.+?)>(.*?)<\/a>/ig;
	r = value.match(re); 
	return r;
}	

function ClearHtmlTag(str){
	if(str=="" || str==null) return "";
 	return str.replace(/<[^>]+>/g,"");
}

function get_href(value){
	if(value=="" || value==null) return "";
	var re = new RegExp("<a[^>]+href=[\"\']?([^\"\' ]+)[\"\']?[^.]+>(.*)<\/a>","ig"); 
	re.exec(value); 
	var v= RegExp.$1; 
	if(v==""){
		return value;
	}else{
		return v;
	}
}

function get_link_text(value){
	if(value=="" || value==null) return "";
	var tmp=value;
	tmp = tmp.replace(/<a.*?>(.*)<\/a>/ig,"$1");
	return tmp.replace(/<(.*)>(.*)<\/\1>/ig,"$2"); 
}


function get_match($,js_rule)   
{   
	var r, re;
	re = new RegExp(js_rule,"g");    
	r = $.match(re);
	return(r);    
}  

function get_tel($){
	if($=="" || $==null) return "";
	var get_tel=get_match($,tel);
	if(get_tel==null) get_tel=""; 
	return 	get_tel;
}

function get_email($){
	if($=="" || $==null) return "";
	var _=/[\w\.\+-]+@[\w\.\+-]+/g;
	if($.match(_) == null) return "";
	return $.match(_);
}

function get_str(str,strs){   
	if(str=="" || str==null){
		return strs;
	}else{
		if(strs==""){
			return str;
		}else{
			return str+","+strs;
		}
	}
}

function getlevel(value){
	var l=value.indexOf("level=");
	var str=value.substring(l+7,value.length-l);
	var l1=str.indexOf("\"");
	return str.substring(0,l1);	
	
}

function the_url(str,urlstr){
	if(str=="" || str==null) return "";
	if(str.indexOf(urlstr)== -1){
		return "";
	}else{
		return str;
	}
}

//*******************QQ************************

function get_qq_str(content){
var arr = new Array(); 
arr=["ѣ","Q"," ","QQ","Q Q","qq","q q","Qq","Q q","qQ","uin=","Uin=","UIN="]; 
var qq
var rqq="";   
//alert(arr.length);
//alert(arr.length);
	for(var n=0; n<arr.length; n++){
		
		qq=content.indexOf(arr[n]);
		//alert(qq+arr[n]);
		
		if(qq == -1){
			continue;	
		}else{
		    //alert(arr[n]);
			var qq_arr = content.split(arr[n]);
			//alert(qq_arr.length);
			
			for(var h=0; h<qq_arr.length; h++){
				qq_arr[h]=qq_arr[h].replace(/&nbsp;/g,"");
				//qq_arr[h]=qq_arr[h].replace(":\"","");   
			    rqq += qq_arr[h].substring(0,11) + ",";
			   
			    //alert(arr[n]+rqq);
			} 	
		}	 			
	}
	//rqq=rqq.replace(" ","");
	//alert(rqq);
	return Isqq(rqq);
}



function Isqq(qq){

	//alert(qq);
	
	if (qq.length==0) return "";
	
	var qq=qq.split(",");
	var Isqq="";
	var qqk=new Array(":"," ","",""," ","	","\""); 
	var qq_return;	
	
	for(var n=0; n<qq.length; n++){
		for(var k=0; k<qqk.length; k++){
			qq[n]=qq[n].replace(qqk[k],"");
		}
		
		qq_return=Isqq_str(qq[n]) 
		
		if(qq_return>5){
			Isqq += qq[n].substring(0,qq_return) + ",";
		}
		//alert(Isqq);
	}
	if(Isqq!= "") Isqq=Isqq.substring(0,Isqq.length-1) 
	
	return Isqq
}

function Isqq_str(fData)
{
    var str;
    var fDatastr="";
    if (fData=="") return false;

    for (var i=0;i<fData.length;i++)
    {
        str=fData.substring(i,i+1);
          fDatastr=fDatastr+str;
		if (fData.substring(0,1)==0) return i; 
		//if (isNaN(fDatastr)) return i;  
		if (Digital(str) == 0) return i;
		   
    } 
    //alert(fDatastr);  
    return i;
}


function Digital(Digital){
	var a=0;
	for(var d=0; d<10; d++){
	//alert(Digital+d);
		if(Digital == d){
			a += 1;
		}else{
			a += 0;
		}
	}
	return a;
}