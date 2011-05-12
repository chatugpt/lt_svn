var arr2;
var tel="13[0-9]{9}|15[0-9]{9}";
var result;
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

function str_digital(str){
	str=str.replace(/\,/g,"");
	if((new RegExp("([0-9]{2,10})")).test(str)){     //0-9kK
            return RegExp.$1;
        }	
}

function str_code(str){
	str=str.replace(/\,/g,"");
	if((new RegExp("([A-Z$]{2,10})")).test(str)){
            return RegExp.$1;
        }	
}