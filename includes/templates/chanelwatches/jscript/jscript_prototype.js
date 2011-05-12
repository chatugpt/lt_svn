var isWin = (navigator.platform == "Win32") || (navigator.platform == "Windows");
var isIE=navigator.userAgent.indexOf("IE")>0;
var isIE5=navigator.userAgent.indexOf("IE 5.0")>0;
var isIE6=navigator.userAgent.indexOf("IE 6.0")>0;
var isNav=(navigator.appName.indexOf("Netscape")!=-1);
var element;
function $_(obj){
	return typeof(obj) == "string" ? document.getElementById(obj) : obj;
}
String.prototype.trim=function(){
	return this.replace(/(^[\s]*)|([\s]*$_)/g, "");
};
/********************

      UTILITIES
      
********************/
function findPos(obj) {
	var curleft = curtop = 0;
	if(obj.offsetParent) {
		while(obj.offsetParent) {
			curleft += obj.offsetLeft;
			curtop += obj.offsetTop;
			obj = obj.offsetParent;
		}
	}
	return [curleft,curtop];
}
function addEventSimple(obj,evt,fn) {
	if (obj.addEventListener)
		obj.addEventListener(evt,fn,false);
	else if (obj.attachEvent)
		obj.attachEvent('on'+evt,fn);
}

function removeEventSimple(obj,evt,fn) {
	if (obj.removeEventListener)
		obj.removeEventListener(evt,fn,false);
	else if (obj.detachEvent)
		obj.detachEvent('on'+evt,fn);
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++)
	{
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

function eraseCookie(name) {
	createCookie(name,"",-1);
}

/*#数组添加成员#*/
Array.prototype.add=function(key){
	this[this.length]=key;
};

/*#字符串是否为空 true 为空#*/
function isNone(str){
	return str==null||str.trim()=="" ? true:false;
};

/*#将焦点指定到对应的obj上#*/
function efocu(obj){
	try{$_(obj).focus();}catch(e){}
};

/*#插入HTML代码#*/
function insHtm(obj,code,pos){
	obj=$_(obj);
	if(isIE){
		obj.parentNode.insertAdjacentHTML(pos==null?"beforeend":"afterbegin",code);
	}
	else{
		var r=obj.ownerDocument.createRange();
		r.setStartBefore(obj);
		eval("obj.parentNode."+(pos==null?"appendChild":"insertBefore")+"(r.createContextualFragment(code),obj.parentNode.firstChild)");
	}
}


/*#查看k1是否在当前字符串中,k2为分割符默认为逗号#*/
String.prototype.inc=function(k1,k2){
	if(k2==null){k2=","};
	return (k2+this+k2).indexOf(k2+k1+k2) > -1 ? true:false;
};

/*#从字符串中截取k1字符串#*/
String.prototype.sub=function(k1,k2){
	if(k2==null){k2=","};
	var tmp = k2 + this + k2;
	var size = tmp.indexOf(k1);
	if(size ==-1){
		return 0;
	}
	var i = 0;
	while(tmp.charAt(size+3+i) != '/'){
		i++;
	}
	return tmp.substring(size+3,size+3+i);
};

function hide(el) {
	element = $_(el);
	element.style.display = 'none';
}
function show(el) {
	element = $_(el);
	element.style.display = '';
}
function remove(el){
	element = $_(el);
	element.parentNode.removeChild(element);
}
function toggle(el) {
    el = $_(el);
	if(el.style.display=="none"){
		el.style.display='block';
	}else{
		el.style.display='none';
	}
}
function menuToggle(element, eventName, handler){
	  element = $_(element);
	  if (element.addEventListener) {
        element.addEventListener(eventName, handler, false);
      } else {
        element.attachEvent("on" + eventName, handler);
      }
}
/*==================================================*/
function setOpacity(opacity, theID) {
	var object = $_(theID).style;
	if (navigator.userAgent.indexOf("Firefox") != -1) {
		if (opacity == 100) { opacity = 99.9999; } // This is majorly awkward
	}
	object.filter = "alpha(opacity=" + opacity + ")"; // IE/Win
	object.opacity = (opacity / 100);                 // Safari 1.2, Firefox+Mozilla
}

function getSize() {
	//var myWidth,myHeight,myScroll;
	if (self.innerHeight) { // Everyone but IE
		myWidth = window.innerWidth;
		myHeight = window.innerHeight;
		myScroll = window.pageYOffset;
	} else if (document.documentElement && document.documentElement.clientHeight) { // IE6 Strict
		myWidth = document.documentElement.clientWidth;
		myHeight = document.documentElement.clientHeight;
		myScroll = document.documentElement.scrollTop;
	} else if (document.body) { // Other IE, such as IE7
		myWidth = document.body.clientWidth;
		myHeight = document.body.clientHeight;
		myScroll = document.body.scrollTop;
	}
}
var str = '<div id=\"WWPopup\" style=\"height:56px;display:none;margin:-56px auto 0 auto;width:952px;background:#fff url('+baseURL+'/images/root/blue_bg.gif) repeat-x;\"><div id=\"WWPopupBody\" style=\"width:900px;height:50px;margin:0 auto;color:#333;padding-top:3px;font-weight:bold;font:12px Arial,Helvetica, sans-serif;position: relative;\">';
	str += '<strong>Important Notice:</strong> Dear Customers, Due to data migration, for customer who made order during PST 10:00PM May 31st to PST 9:00PM June 2nd, your order information and login information will be unavailable temporarily. We\'ll finish the data merge in the next 24 hours. Please note your order is being processed normally during the merge of data. If you have any questions please email to <a href="mailto:admin@admin.com" class="u b">admin@admin.com</a>. We apologize for any inconvenience.';
	str+='</div></div>';
//document.write(str);

function flashWrite( id, flashUri, vWidth, vHeight, winMode ) {
	var _obj_ = "";
	_obj_ = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="' + vWidth + '" height="' + vHeight + '" id="' + id + '" align="middle">';
	_obj_ += '<param name="movie" value="' + flashUri + '" />';
	_obj_ += '<param name="quality" value="high" />';
	_obj_ += '<param name="wmode" value="' + winMode + '" />';
	_obj_ += '<param name="bgcolor" value="#ffffff" />';
	_obj_ += '<embed src="' + flashUri + '" quality="high" wmode="' + winMode + '" bgcolor="#ffffff" width="' + vWidth +'" height="' + vHeight + '" id="' + id + '" align="middle" allowscriptaccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></embed>    ';
	_obj_ += '</object>';
	document.write( _obj_ );
}
/*××××××××××××××global××××××××××××××××××*/

function showWWPopup() {
	if (window != top||$_('popuplargerimageBody')) {return false;}
	var wp = $_('WWPopup');
	var n,tt;
	wp.style.display="";
    var anim = function(){
        n += 8;
        if(n >= 56){
            wp.style.marginTop = '0';
            window.clearInterval(tt);
        }else{
            wp.style.marginTop = "-"+(56 - n)+"px";
        }
    },n=0;
    var tt = window.setInterval(anim, 5);
}
//addEventSimple(window,"load",showWWPopup);

/*swich the layer*/
function layerswich(){	
	if($_('boxswitch') === null ) {return;}
	var e, i = 0;
	var evtType = $_('boxswitch').getAttribute('evt');	
	while (e = $_('boxswitch').getElementsByTagName ('DIV') [i++]) {
		if (e.className == 'on' || e.className == 'off') {
			if(evtType=='click'){
				e.onclick = function () {
					var getEls = $_('layer_switch').getElementsByTagName('DIV');
						for (var z=0; z<getEls.length; z++) {
						getEls[z].className=getEls[z].className.replace('show', 'hide');
						getEls[z].className=getEls[z].className.replace('on', 'off');
						}
					this.className = 'on';
					var max = this.getAttribute('title');
					$_(max).className = "show";
				}
			}
			else{
				e.onmouseover = function () {
					var getEls = $_('layer_switch').getElementsByTagName('DIV');
						for (var z=0; z<getEls.length; z++) {
						getEls[z].className=getEls[z].className.replace('show', 'hide');
						getEls[z].className=getEls[z].className.replace('on', 'off');
						}
					this.className = 'on';
					var max = this.getAttribute('title');
					$_(max).className = "show";
				}
			}
		}	
	}

}
/*swich the layer*/
function clicklayerswich(){	
	if($_('boxswitch') == null ) return;
	var e, i = 0;
	while (e = $_('boxswitch').getElementsByTagName ('DIV') [i++]) {
		if (e.className == 'on' || e.className == 'off') {
		e.onclick = function () {
			var getEls = $_('layer_switch').getElementsByTagName('DIV');
				for (var z=0; z<getEls.length; z++) {
				getEls[z].className=getEls[z].className.replace('show', 'hide');
				getEls[z].className=getEls[z].className.replace('on', 'off');
				}
			this.className = 'on';
			var max = this.getAttribute('title');
			$_(max).className = "show";
			}
		}		
	}
}
/* marque => bof*/
function srcMarquee(){
	this.ID = $_(arguments[0]);
	if(!this.ID){this.ID = -1;return;}
	this.Direction = this.Width = this.Height = this.DelayTime = this.WaitTime = this.Correct = this.CTL = this.StartID = this.Stop = this.MouseOver = 0;
	this.Step = 1;
	this.Timer = 30;
	this.DirectionArray = {"top":0 , "bottom":1 , "left":2 , "right":3};
	if(typeof arguments[1] == "number")this.Direction = arguments[1];
	if(typeof arguments[2] == "number")this.Step = arguments[2];
	if(typeof arguments[3] == "number")this.Width = arguments[3];
	if(typeof arguments[4] == "number")this.Height = arguments[4];
	if(typeof arguments[5] == "number")this.Timer = arguments[5];
	if(typeof arguments[6] == "number")this.DelayTime = arguments[6];
	if(typeof arguments[7] == "number")this.WaitTime = arguments[7];
	if(typeof arguments[8] == "number")this.ScrollStep = arguments[8]
	this.ID.style.overflow = this.ID.style.overflowX = this.ID.style.overflowY = "hidden";
	this.ID.noWrap = false;
	this.IsNotOpera = (navigator.userAgent.toLowerCase().indexOf("opera") == -1);
	if(arguments.length >= 7)this.Start();
}

srcMarquee.prototype.Start = function(){
	if(this.ID == -1)return;
	if(this.WaitTime < 800)this.WaitTime = 800;
	if(this.Timer < 20)this.Timer = 20;
	if(this.Width == 0)this.Width = parseInt(this.ID.style.width);
	if(this.Height == 0)this.Height = parseInt(this.ID.style.height);
	if(typeof this.Direction == "string")this.Direction = this.DirectionArray[this.Direction.toString().toLowerCase()];
	this.HalfWidth = Math.round(this.Width / 2);
	this.BakStep = this.Step;
	this.ID.style.width = this.Width;
	this.ID.style.height = this.Height;
	if(typeof this.ScrollStep != "number")this.ScrollStep = this.Direction > 1 ? this.Width : this.Height;
	var msobj = this;
	var timer = this.Timer;
	var delaytime = this.DelayTime;
	var waittime = this.WaitTime;
	msobj.StartID = function(){msobj.Scroll()}
	msobj.Continue = function(){
		if(msobj.MouseOver == 1){
		setTimeout(msobj.Continue,delaytime);
     }
     else{ clearInterval(msobj.TimerID);
		msobj.CTL = msobj.Stop = 0;
		msobj.TimerID = setInterval(msobj.StartID,timer);
     }
    }
	msobj.Pause = function(){
		msobj.Stop = 1;
		clearInterval(msobj.TimerID);
		setTimeout(msobj.Continue,delaytime);
    }
	msobj.Begin = function(){
   msobj.ClientScroll = msobj.Direction > 1 ? msobj.ID.scrollWidth : msobj.ID.scrollHeight;
   if((msobj.Direction <= 1 && msobj.ClientScroll <msobj.Height) || (msobj.Direction > 1 && msobj.ClientScroll <msobj.Width))return;
   msobj.ID.innerHTML += msobj.ID.innerHTML;
   msobj.TimerID = setInterval(msobj.StartID,timer);
   if(msobj.ScrollStep < 0)return;
   msobj.ID.onmousemove = function(event){
       if(msobj.ScrollStep == 0 && msobj.Direction > 1){
			var event = event || window.event;
			if(window.event){
				if(msobj.IsNotOpera){msobj.EventLeft = event.srcElement.id == msobj.ID.id ? event.offsetX - msobj.ID.scrollLeft : 

event.srcElement.offsetLeft - msobj.ID.scrollLeft + event.offsetX;}
				else{msobj.ScrollStep = null;return;}
			}
			else{msobj.EventLeft = event.layerX - msobj.ID.scrollLeft;}
			msobj.Direction = msobj.EventLeft > msobj.HalfWidth ? 3 : 2;
			msobj.AbsCenter = Math.abs(msobj.HalfWidth - msobj.EventLeft);
			msobj.Step = Math.round(msobj.AbsCenter * (msobj.BakStep*2) / msobj.HalfWidth);
			}
		}
		msobj.ID.onmouseover = function(){
			if(msobj.ScrollStep == 0)return;
			msobj.MouseOver = 1;
			clearInterval(msobj.TimerID);
		}
		msobj.ID.onmouseout = function(){
		if(msobj.ScrollStep == 0){
			if(msobj.Step == 0)msobj.Step = 1;
			return;
		}
		msobj.MouseOver = 0;
		if(msobj.Stop == 0){
			clearInterval(msobj.TimerID);
			msobj.TimerID = setInterval(msobj.StartID,timer);
		}}}
		setTimeout(msobj.Begin,waittime);
}

srcMarquee.prototype.Scroll = function(){
	switch(this.Direction){
	case 0:
	this.CTL += this.Step;
	if(this.CTL >= this.ScrollStep && this.DelayTime > 0){
		this.ID.scrollTop += this.ScrollStep + this.Step - this.CTL;
		this.Pause();
		return;
	}
	else{
		if(this.ID.scrollTop >= this.ClientScroll){this.ID.scrollTop -= this.ClientScroll;}
		this.ID.scrollTop += this.Step;
	}
	break;

	case 1:
	this.CTL += this.Step;
	if(this.CTL >= this.ScrollStep && this.DelayTime > 0){
		this.ID.scrollTop -= this.ScrollStep + this.Step - this.CTL;
		this.Pause();
		return;
	}
	else{
		if(this.ID.scrollTop <= 0){this.ID.scrollTop += this.ClientScroll;}
		this.ID.scrollTop -= this.Step;
	}
	break;

	case 2:
	this.CTL += this.Step;
	if(this.CTL >= this.ScrollStep && this.DelayTime > 0){
		this.ID.scrollLeft += this.ScrollStep + this.Step - this.CTL;
		this.Pause();
		return;
	}
	else{
		if(this.ID.scrollLeft >= this.ClientScroll){this.ID.scrollLeft -= this.ClientScroll;}
		this.ID.scrollLeft += this.Step;
	}
	break;

	case 3:
	this.CTL += this.Step;
	if(this.CTL >= this.ScrollStep && this.DelayTime > 0){
		this.ID.scrollLeft -= this.ScrollStep + this.Step - this.CTL;
		this.Pause();
		return;
	}
	else{
		if(this.ID.scrollLeft <= 0){this.ID.scrollLeft += this.ClientScroll;}
	this.ID.scrollLeft -= this.Step;
	}
	break;
	}
} 
/* marque => eof*/
var timer;
function marquee(delay, liHeight, toAlign, lyorderID){	
	var o=$_(lyorderID);
	var timer_bug;
	for(i=0;i<o.childNodes.length;i++){
		if(o.childNodes[i].tagName == null){
			o.removeChild(o.childNodes[i]);			
		}
	}
	if(o==null) return;
	
	function scrollup(o,h,d){	
		if(d==h){
		   var t = o.firstChild;
		   o.appendChild(t);
		   t.style.marginTop=o.firstChild.style.marginTop='0px';
		   d = 0;
		}
		else{
		   var s=3,d=d+s,l=(d>=h?d-h:0);
		   o.firstChild.style.marginTop=-d+l+'px';
		   timer_bug = setTimeout(function(){scrollup(o,h,d-l)},20);
		}
	}
	timer = setInterval(function(){clearTimeout(timer_bug);scrollup(o,liHeight,toAlign);},delay);
}


///////////////
function addListener(element, type, expression, bubbling)
{
  bubbling = bubbling || false;
  if(window.addEventListener)	{ // Standard
    element.addEventListener(type, expression, bubbling);
    return true;
  } else if(window.attachEvent) { // IE
    element.attachEvent('on' + type, expression);
    return true;
  } else return false;
}

var ImageLoader = function(url){
  this.url = url;
  this.image = null;
  this.loadEvent = null;
};

ImageLoader.prototype = {
  load:function(){
    this.image = document.createElement('img');
    var url = this.url;
    var image = this.image;
    var loadEvent = this.loadEvent;
    addListener(this.image, 'load', function(e){
      if(loadEvent != null){
        loadEvent(url, image);
      }
    }, false);
    this.image.src = this.url;
  },
  getImage:function(){
    return this.image;
  }
};

function pro_loadImage(objId,urls){
var loader = new ImageLoader(urls);
loader.loadEvent = function(url){
 obj = $_(objId);
 obj.src = url; 
}
loader.load();
}

function rewrite_url(pname , pid){
	if(pid == null || pid == "undefined" ) {return ""};
	var re = /[^a-zA-Z0-9]/ig;
	var url = "";
	if(FRIENDLY_URLS != null && FRIENDLY_URLS == 'true'){
		url = baseURL + pname.replace(re,"-") + "_p" + pid + ".html";
	}
	else{
		url = linkURL+pid;
	}
	return url;
}
/////////////////
/*the li scroll*/
function page_go(id,num, c,t,cid){
	var Prev = id + "Prev";
	var Next = id + "Next";	
	var pageId = id + "Page";
	var Page = 0;
	var currentPage = 1;
	var PageNumber = Math.ceil(t/num);
	var activeClick = true;
	var gopage = 0;

	if(num>t){activeClick = false;}
	if(c >= num){
		if(t!=null){
			gopage = Math.ceil(c/num);
			if(c % num == 0) gopage++; 		
		}
		updateProduct('goto', gopage);
	}
	
	function updateProduct(type, gopage) {
		if(type=='pre') {Page -= parseInt(num);currentPage--};
		if(type=='next') {Page += parseInt(num);currentPage++};
		if(type=='goto' && gopage != null) {Page = (gopage-1) * num ; currentPage = gopage;}
		if(Page<0) {
			Page=num*(PageNumber-1);
			currentPage=PageNumber;
		}
		if(Page>=t) {
			Page=0;
			currentPage=1;
		}
		
		$_(pageId).innerHTML = currentPage +'/'+PageNumber;
		
		for(i=0;i<num;i++){
			if(i >= productPrice.length){
				break;
			}
			n_page = i + Page;
			$_('cell_price'+i).innerHTML=productPrice[n_page];
			$_('cell_link'+i).href = rewrite_url(productName[n_page], productID[n_page]);
			$_('cell_link'+i).title = productName[n_page];
			
			if(productDISCOUNT[n_page] > 0){
				$_('discount'+i).innerHTML = '<span class="sold_discount_pro_show"><div class="sold_discount_pro_show_font">'+productDISCOUNT[n_page]+'</div></span>';
			} else {
				$_('discount'+i).innerHTML = '';
			}
			
			$_('li'+i).style.display='block';
			if(productID[n_page] == null){
				$_('li'+i).style.display='none';
				continue;
			}
			if(num==4)$_('cell_img'+i).src=baseURL+"images/root/loading_img_b.gif";
			if(num==8)$_('cell_img'+i).src=baseURL+"images/root/loading_img_s.gif";
			$_('cell_img'+i).alt=productName[n_page];
			$_('cell_img'+i).title=productName[n_page];
			//alert($_('cell_img'+i).title);
			
			pro_loadImage('cell_img'+i,imgURL+productIMG[n_page]);
			//$_('cell_img'+i).src=imgURL+productIMG[n_page];    //caizhouqing update js
			//alert(imgURL+productIMG[n_page]);
			
			if(cid != null){
				if(cid == productID[n_page]){
					$_('cell_img'+i).className = 'allborder';
				}
				else{
					$_('cell_img'+i).className = '';
				}
			}
			
			if(productSourcePrice != null){
				$_('cell_source_price'+i).innerHTML=productSourcePrice[n_page];
			}
			if(productSubName != null && productName != null){
				$_('cell_name_link'+i).innerHTML=productSubName[n_page];
				$_('cell_name_link'+i).href=rewrite_url(productName[n_page], productID[n_page]);
				$_('cell_name_link'+i).title=productName[n_page];
			}
			if(productFlg != null){
				var tmp = productFlg[n_page].split('#');
				if(tmp.length < 4) continue;
				$_('sold_out_s'+i).style.display = (tmp[0] > 0) ? 'block' : 'none';
				$_('almost_sold_out_s'+i).style.display = (tmp[1] > 0) ? 'block' : 'none';				
				if(tmp[2] > 0){
					$_('product_count_s'+i).innerHTML=tmp[2];
				}
				$_('product_count_s'+i).style.display = (tmp[2] > 0) ? 'block' : 'none';				
				$_('sale_item_s'+i).style.display = (tmp[3] > 0) ? 'block' : 'none';				
			}
			
		}
	}
	$_(pageId).innerHTML = currentPage +'/'+PageNumber;
	$_(Prev).onclick = function () {
		if(!activeClick) return false;
		updateProduct('pre');
	}
	$_(Next).onclick = function () {
		if(!activeClick) return false;
		updateProduct('next');
	}	
}

function postAjax(url,content,onComplete){
	var options=new Object();
	options.method="post";
	options.asynchronous=true;
	options.parameters=content;
	options.onComplete=onComplete;
	return new Ajax.Request(url, options);
}

function checkWholesalNewsletter(id){
	if ($_(id) == null) return;	
	if(checkEmail(id)){
		hide('wholesale_newsletter_text');
		show('wholesale_newsletter_loading');
			postAjax(window.location.pathname + '?main_page=wholesale_newsletter' , id + '=' + $_(id).value, function(ajax){
			if(ajax.readyState==4&&ajax.status == 200){		
				$_('wholesale_newsletter_text').innerHTML = ajax.responseText;
				hide('wholesale_newsletter_loading');
				show('wholesale_newsletter_text');
				if(ajax.responseText.indexOf('touch')>0){
					$_(id).value = '';
				}
			}
		});	
	}
}

function checkEmail(id){
	var email = $_(id) == null ? '' : $_(id).value;
	if(!/(\,|^)([\w+._]+@\w+\.(\w+\.){0,3}\w{2,4})/.test(email.replace(/-|\//g,""))){
		$_(id).focus();
		alert('Please check your email address.\nYour email addresses should look like "myname@gmail.com"');
		return false;
	}
	else{
		return true;	
	}
}

var openShow = false;
function show_chat_div(obj){
	if(openShow) {
		close_chat_div();
		return;
	}
	openShow = true;
	var name = obj.getAttribute("title");
	var msn = obj.getAttribute("msn");
	var skype = obj.getAttribute("skype");
	var email = obj.getAttribute("email");
	var yahoo = obj.getAttribute("yahoo");
	var aim = obj.getAttribute("aim");
	
	var str = "";//"<strong class='red in_1em big'>"+name+"</strong>";
	    str += "<ul class='gray_trangle_list'>";
	    if(email!=null && email != ""){
	    	str += "<li><span class='big black b'>Email</span><BR/> <span class='pad_1em'><a href=\"mailto:"+email+"\">" + email + "</a></span></li>";
	    }
	    if(msn!=null && msn != ""){
			msnarr = msn.split('-');
	    	str += "<li><span class='big black b'>MSN</span><BR/> <span class='pad_1em'><a href=\"http://settings.messenger.live.com/Conversation/IMMe.aspx?invitee="+msnarr[1]+"@apps.messenger.live.com&mkt=zh-cn\" target=\"_blank\"><img style=\"border-style: none;\" src=\"http://messenger.services.live.com/users/"+msnarr[1]+"@apps.messenger.live.com/presenceimage?mkt=zh-cn\" width=\"16\" height=\"16\" />" + msnarr[0] + "</a></span></li>";
	    }
	    /*if(aim!=null && aim != ""){
	    	str += "<li><span class='big black b'>AIM</span><BR/> <span class='pad_1em'>" + aim + "</span></li>";
	    }*/
	    if(skype!=null && skype != ""){
	   		str += "<li><span class='big black b'>SKYPE</span><BR/> <span class='pad_1em'><a href=\"callto:"+skype+"\">" + skype + "</a></span></li>";
	    }
	    if(yahoo!=null && yahoo != ""){
	    	str += "<li><span class='big black b'>YAHOO</span><BR/> <span class='pad_1em'><a href=\"http://edit.yahoo.com/config/send_webmesg?.target="+yahoo+"&.src=pg\" target=\"_blank\">" + yahoo + "</a></span></li>";
	    }
	    str += "</ul>";	
	$_('chat_div_name').innerHTML = str;
	show('chat_div');
	clearInterval(timer);
	hide_select('in');
}

function close_chat_div(){
	hide('chat_div');
	marquee(3000, 15 ,0 ,'nav_chat_sales');
	hide_select("out");
	openShow = false;
}

function hide_select(what){	
  var anchors = document.getElementsByTagName("select");
  if (what=="in") {
 	 for (var i=0; i<anchors.length; i++) {
 	 	if(anchors[i].getAttribute("rel")=="dropdown"){
 			anchors[i].style.visibility="hidden";
 	 	}
 	 }
  } 
  else {
 	for (var i=0; i<anchors.length; i++) {
 		if(anchors[i].getAttribute("rel")=="dropdown"){
 	    	anchors[i].style.visibility="visible";
 		}
	}
  }
}

function back(num){
	history.go(num);
	return false;
}
function floatBox(posEL,element){
	var posX,posY,pos,offTop;
	var width = 339;
	var height = 328; 
	if(isIE){
		pos = $_(posEL).childNodes[0];
		offTop = 120;
	}else{
		pos = $_(posEL);
		offTop = 130;
	}
	posX = pos.offsetLeft-width;
	posY = pos.offsetTop-offTop;
	
	var box = $_('pop_window');
    box.style.position = 'absolute';   
    box.style.zIndex = 999;
    box.style.top = posY + 'px';    
    box.style.left = posX + 'px';    
    box.style.width = width + 'px';    
    box.style.height = height + 'px';
	var str ="<img onclick='close_box(this)' src='"+baseURL+"images/root/close.gif' class='hand' title='close' alt='close' id='floatBox_img'/><div class='png'>";
	switch (element){
		case 'shipping_info':
		                     str += shipping_info;
		                     break;
        case 'payment_option':
                              str += payment_option;
                              break;
		case 'questions':
                              str += questions;
                              break;                              
		default : str += content;
		          break;
		
	}	
	str += "</div>";
	box.innerHTML = str;
	show('pop_window');
	return false;
}
function close_box(obj){
	el = obj.parentNode;
	element = $_(el);
	element.style.display = 'none';
}