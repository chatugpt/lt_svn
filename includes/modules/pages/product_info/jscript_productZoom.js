/*the small images for mid images*/
function changeImg(url,show, num) {
	if(num == null ) num = 0;
	var aa = show + "_a";
	var ii = show + "_i";	
	$_(ii).src = url;
	var bigUrl = url.replace('/l/','/v/');	
	$_(show).href = bigUrl;
}


//show big picture xiechangquan
function initBtn(btns,showimg){
	var smallImgBtns = $_(btns).getElementsByTagName("img");
	clearBtnBorder(smallImgBtns,true);
	var bigUrl, imgSize;
	for (i = 0; i <smallImgBtns.length; i++) {		
		imgSize = parseInt(smallImgBtns[i].getAttribute("imgSize"));
		//cached the large images
		var imagesHiltite = new Object();
		imagesHiltite[i] = new Image(imgSize, imgSize);
		if(bigUrl != null  && bigUrl != 'undefined'){
			imagesHiltite[i].src = bigUrl;
		}
		//define the onclick
		smallImgBtns[i].onclick = function() {
			var newUrl = this.getAttribute("big");
			changeImg(newUrl,showimg, parseInt(this.getAttribute("num")));
			clearBtnBorder(smallImgBtns,false);
			this.style.border='1px solid #F5A79A';			
			this.style.cursor = "default";
		}
		smallImgBtns[i].onmouseover = function(){
			this.style.backgroundColor = "#ddd";
		}
		smallImgBtns[i].onmouseout = function(){
			this.style.backgroundColor = "#fff";
		}
	}
}



function clearBtnBorder(smallImgBtns,flg){
	for (i = 0; i <smallImgBtns.length; i++) {
		if(flg && i==0){
			smallImgBtns[i].style.border='1px solid #F5A79A';			
			smallImgBtns[i].style.cursor = "default";
		}else{
			smallImgBtns[i].style.border='1px solid #EEEEEE';
			smallImgBtns[i].style.cursor = "pointer";
		}
	}
}

function clickflash(Btns) {
	var sbtn = $_(Btns).getElementsByTagName("img");
	for (i = 0; i <sbtn.length; i++) {
		sbtn[i].onclick = function() {
			$_('ZoomImage').src = this.getAttribute("src").replace('/s/','/v/');
			clearBtnBorder(sbtn,false);
			this.style.border='1px solid #F5A79A';			
			this.style.cursor = "default";
		}
		sbtn[i].onmouseover = function(){
			this.style.backgroundColor = "#ddd";
		}
		sbtn[i].onmouseout = function(){
			this.style.backgroundColor = "#fff";
		}
	}
}

//========================================================
var zoomTime       = 3;    // Milliseconds between frames of zoom animation
var zoomSteps      = 8;   // Number of zoom animation frames 15
var includeFade    = 1;    // Set to 1 to fade the image in / out as it zooms
var minBorder      = 90;   // Amount of padding between large, scaled down images, and the window edges
var shadowSettings = '0px 5px 25px rgb(0, 0, 0)'; // Blur, radius, color of shadow for compatible browsers
var imageDir = baseURL + "images/";
var myWidth = 0, myHeight = 0, myScroll = 0; myScrollWidth = 0; myScrollHeight = 0;
var zoomOpen = false, preloadFrame = 1, preloadActive = false, preloadTime = 0, imgPreload = new Image();
var preloadAnimTimer = 0;

var zoomActive = new Array();
var zoomTimer  = new Array(); 
var zoomOrigW  = new Array();
var zoomOrigH  = new Array();
var zoomOrigX  = new Array(); 
var zoomOrigY  = new Array();
var zoomID         = "ZoomBox";
var theID          = "ZoomImage";
if (navigator.userAgent.indexOf("MSIE") != -1) {
	var browserIsIE = true;
}
function insertZoomHTML(){
	var inImage1 = document.createElement("img");
	inImage1.onclick = function (event) { zoomOut(this, event); return false; };	
	inImage1.setAttribute('src',imageDir+'spacer.gif');
	inImage1.setAttribute('id','ZoomImage');
	inImage1.setAttribute('border', '0');
	inImage1.setAttribute('style', '-webkit-box-shadow: '+shadowSettings+'0.0)');
	inImage1.style.display = 'block';
	inImage1.style.width = '10px';
	inImage1.style.height = '10px';
	inImage1.style.cursor = 'pointer'; 
	inImage1.title = "click here to close the window";
	$_('ZoomBox').insertBefore(inImage1,$_('ZoomClose'));
	$_('ZoomClose').onclick = function(event) { zoomOut('ZoomImage', event); return false; };
}

function insertBtns() {
	if($_('smallImgBtns') != null ) return;
	var Btns = document.createElement('DIV');
	Btns.setAttribute('id','smallImgBtns');
	$_('ZoomBox').appendChild(Btns);
	$_(Btns).innerHTML=$_('product_flash_btn').innerHTML;
	clickflash(Btns);
}

function setupZoom() {
	prepZooms();
	insertZoomHTML();// creat load div
	zoomdiv = $_(zoomID);  
	zoomimg = $_(theID);
}

function prepZooms() {
	var links = $_('product_flash').getElementsByTagName("a");
	for (i = 0; i < links.length; i++) {
		if (links[i].getAttribute("href")) {
			if (links[i].getAttribute("href").search(/(.*)\.(jpg|jpeg|gif|png|bmp|tif|tiff)/gi) != -1) {
					links[i].onmouseover = function () {zoomPreload(this); }; //onload define preLoadActive;
					links[i].onclick = function (event) {return zoomClick(this, event);};			
			}
		}
	}
}

function zoomPreload(from) {
	var theimage = from.getAttribute("href");
	if (imgPreload.src.indexOf(from.getAttribute("href").substr(from.getAttribute("href").lastIndexOf("/"))) == -1) {
		preloadActive = true;
		imgPreload = new Image();
		imgPreload.onload = function() {
			preloadActive = false;
		}
		imgPreload.src = theimage;
	}
}
function preloadAnimStart() {
	preloadTime = new Date();
	$_("ZoomSpin").style.left = $_('product_flash_show_i').offsetLeft+'px';
	$_("ZoomSpin").style.top = $_('product_flash_show_i').offsetTop+'px';
	$_("ZoomSpin").style.visibility = "visible";	
	$_("SpinImage").src = imageDir+'loading.gif';
	preloadAnimTimer = setInterval("preloadAnim()", 100);
}
function preloadAnim(from) {
	if (preloadActive != false) {
		$_("SpinImage").src = imageDir+'loading.gif';
	} else {
		$_("ZoomSpin").style.visibility = "hidden";    
		clearInterval(preloadAnimTimer);
		preloadAnimTimer = 0;
		zoomIn(preloadFrom);
	}
}
function zoomClick(from, evt) {
	if (! evt && window.event && (window.event.metaKey || window.event.altKey)) {
		return true;
	} else if (evt && (evt.metaKey|| evt.altKey)) {
		return true;
	}
	getSize();
	if (preloadActive == true) {
		if (preloadAnimTimer == 0) {
			preloadFrom = from;
			preloadAnimStart();	
		}
	} else {
		zoomIn(from);
	}
	return false;
}
function zoomIn(from) {
	zoomimg.src = from.getAttribute("href");
	startW=startH=280;
	//alert(zoomimg.src);
	hostX = $_('product_flash_show_i').offsetLeft;
	hostY = $_('product_flash_show_i').offsetTop;
	//endW = imgPreload.width;
	//endH = imgPreload.height;
	endW = 500;
	endH = 500;
	if (zoomActive[theID] != true) {
		if (! browserIsIE) {
			if (fadeActive["ZoomImage"]) {
				clearInterval(fadeTimer["ZoomImage"]);
				fadeActive["ZoomImage"] = false;
				fadeTimer["ZoomImage"] = false;			
			}
			$_("ZoomImage").style.webkitBoxShadow = shadowSettings + '0.0)';			
		}
		$_("ZoomClose").style.visibility = "hidden";     
		zoomOrigW[theID] = startW;
		zoomOrigH[theID] = startH;
		zoomOrigX[theID] = hostX;
		zoomOrigY[theID] = hostY;

		zoomimg.style.width = startW + 'px';
		zoomimg.style.height = startH + 'px';
		zoomdiv.style.left = hostX + 'px';
		zoomdiv.style.top = hostY + 'px';

		zoomdiv.style.visibility = "visible";

		zoomChangeX = ((myWidth / 2) - (endW / 2) - hostX);
		zoomChangeY = (((myHeight / 2) - (endH / 2) - hostY) + myScroll);
		zoomChangeW = (endW - startW);
		zoomChangeH = (endH - startH);

		tempSteps = zoomSteps;
		// Setup Zoom
		zoomCurrent = 0;
		if (includeFade == 1) {
			fadeCurrent = 0;
			fadeAmount = (0 - 100) / tempSteps;
		} else {
			fadeAmount = 0;
		}

		// Do It!
		zoomTimer[theID] = setInterval("zoomElement('"+zoomID+"', '"+theID+"', "+zoomCurrent+", "+startW+", "+zoomChangeW+", "+startH+", "+zoomChangeH+", "+hostX+", "+zoomChangeX+", "+hostY+", "+zoomChangeY+", "+tempSteps+", "+includeFade+", "+fadeAmount+", 'zoomDoneIn(zoomID)')", zoomTime);		
		zoomActive[theID] = true; 
	}
}

// Zoom it back out.

function zoomOut(from) {
	tempSteps = zoomSteps;
	// Check to see if something is happening/open
	if (zoomActive[theID] != true) {
		// First, get rid of the shadow if necessary.
		remove('smallImgBtns');
		zoomimg.style.border = "none";
		if (! browserIsIE) {
			// Wipe timer if shadow is fading in still
			if (fadeActive["ZoomImage"]) {
				clearInterval(fadeTimer["ZoomImage"]);
				fadeActive["ZoomImage"] = false;
				fadeTimer["ZoomImage"] = false;			
			}
			$_("ZoomImage").style.webkitBoxShadow = shadowSettings + '0.0)';			
		}

		// ..and the close box...
		$_("ZoomClose").style.visibility = "hidden";

		// ...and the caption if necessary!
		// Now, figure out where we came from, to get back there
		startX = parseInt(zoomdiv.style.left);
		startY = parseInt(zoomdiv.style.top);
		startW = zoomimg.width;
		startH = zoomimg.height;
		zoomChangeX = zoomOrigX[theID] - startX;
		zoomChangeY = zoomOrigY[theID] - startY;
		zoomChangeW = zoomOrigW[theID] - startW;
		zoomChangeH = zoomOrigH[theID] - startH;
		// Setup Zoom
		zoomCurrent = 0;
		// Setup Fade with Zoom, If Requested

		/*if (includeFade == 1) {
			fadeCurrent = 0;
			fadeAmount = (100 - 0) / tempSteps;
		} else {*/
			fadeAmount = 0;
		//}

		// Do It!

		zoomTimer[theID] = setInterval("zoomElement('"+zoomID+"', '"+theID+"', "+zoomCurrent+", "+startW+", "+zoomChangeW+", "+startH+", "+zoomChangeH+", "+startX+", "+zoomChangeX+", "+startY+", "+zoomChangeY+", "+tempSteps+", "+includeFade+", "+fadeAmount+", 'zoomDone(zoomID, theID)')", zoomTime);	
		zoomActive[theID] = true;
	}
}

// Finished Zooming In

function zoomDoneIn(zoomdiv, theID) {
    zoomimg.style.borderLeft = "1px solid #bcbcbc";
    zoomimg.style.borderTop = "1px solid #bcbcbc";
	// Note that it's open
 	zoomOpen = true;
	insertBtns();
	$_("ZoomClose").style.visibility = "visible";
}
// Finished Zooming Out
function zoomDone(zoomdiv, theID) {
    zoomimg.style.border = "0";
	// No longer open
	zoomOpen = false;
	// Clear stuff out, clean up
	zoomOrigH[theID] = "";
	zoomOrigW[theID] = "";
	$_(zoomdiv).style.visibility = "hidden";
	zoomActive[theID] == false;
}

// Actually zoom the element

function zoomElement(zoomdiv, theID, zoomCurrent, zoomStartW, zoomChangeW, zoomStartH, zoomChangeH, zoomStartX, zoomChangeX, zoomStartY, zoomChangeY, zoomSteps, includeFade, fadeAmount, execWhenDone) {

	if (zoomCurrent == (zoomSteps + 1)) {
		zoomActive[theID] = false;
		clearInterval(zoomTimer[theID]);

		if (execWhenDone != "") {
			eval(execWhenDone);
		}
	} else {
	
		// Do the Fade!
	  
		if (includeFade == 1) {
			if (fadeAmount < 0) {
				setOpacity(Math.abs(zoomCurrent * fadeAmount), zoomdiv);
			} else {
				setOpacity(100 - (zoomCurrent * fadeAmount), zoomdiv);
			}
		}
	  
		// Calculate this step's difference, and move it!
		
		moveW = cubicInOut(zoomCurrent, zoomStartW, zoomChangeW, zoomSteps);
		moveH = cubicInOut(zoomCurrent, zoomStartH, zoomChangeH, zoomSteps);
		moveX = cubicInOut(zoomCurrent, zoomStartX, zoomChangeX, zoomSteps);
		moveY = cubicInOut(zoomCurrent, zoomStartY, zoomChangeY, zoomSteps);
	
		$_(zoomdiv).style.left = moveX + 'px';
		$_(zoomdiv).style.top = moveY + 'px';
		zoomimg.style.width = moveW + 'px';
		zoomimg.style.height = moveH + 'px';
	
		zoomCurrent++;
		
		clearInterval(zoomTimer[theID]);
		zoomTimer[theID] = setInterval("zoomElement('"+zoomdiv+"', '"+theID+"', "+zoomCurrent+", "+zoomStartW+", "+zoomChangeW+", "+zoomStartH+", "+zoomChangeH+", "+zoomStartX+", "+zoomChangeX+", "+zoomStartY+", "+zoomChangeY+", "+zoomSteps+", "+includeFade+", "+fadeAmount+", '"+execWhenDone+"')", zoomTime);
	}
}
function fadeOut(elem) {
	if (elem.id) {
		fadeElementSetup(elem.id, 100, 0, 10);
	}
}

function fadeIn(elem) {
	if (elem.id) {
		fadeElementSetup(elem.id, 0, 100, 10);	
	}
}

var fadeActive = new Array();
var fadeQueue  = new Array();
var fadeTimer  = new Array();
var fadeClose  = new Array();
var fadeMode   = new Array();

function fadeElementSetup(theID, fdStart, fdEnd, fdSteps, fdClose, fdMode) {
	if (fadeActive[theID] == true) {
		fadeQueue[theID] = new Array(theID, fdStart, fdEnd, fdSteps);

	} else {
		fadeSteps = fdSteps;
		fadeCurrent = 0;
		fadeAmount = (fdStart - fdEnd) / fadeSteps;
		fadeTimer[theID] = setInterval("fadeElement('"+theID+"', '"+fadeCurrent+"', '"+fadeAmount+"', '"+fadeSteps+"')", 15);
		fadeActive[theID] = true;
		fadeMode[theID] = fdMode;
		
		if (fdClose == 1) {
			fadeClose[theID] = true;
		} else {
			fadeClose[theID] = false;
		}
	}
}

function fadeElement(theID, fadeCurrent, fadeAmount, fadeSteps) {
	if (fadeCurrent == fadeSteps) {
		clearInterval(fadeTimer[theID]);
		fadeActive[theID] = false;
		fadeTimer[theID] = false;
		if (fadeClose[theID] == true) {
			$_(theID).style.visibility = "hidden";
		}
		if (fadeQueue[theID] && fadeQueue[theID] != false) {
			fadeElementSetup(fadeQueue[theID][0], fadeQueue[theID][1], fadeQueue[theID][2], fadeQueue[theID][3]);
			fadeQueue[theID] = false;
			alert('dd');
		}
	} else {

		fadeCurrent++;
	
		if (fadeMode[theID] == "shadow") {

			if (fadeAmount < 0) {
				$_(theID).style.webkitBoxShadow = shadowSettings + (Math.abs(fadeCurrent * fadeAmount)) + ')';
			} else {
				$_(theID).style.webkitBoxShadow = shadowSettings + (100 - (fadeCurrent * fadeAmount)) + ')';
			}
			
		} else {

			if (fadeAmount < 0) {
				setOpacity(Math.abs(fadeCurrent * fadeAmount), theID);
			} else {
				setOpacity(100 - (fadeCurrent * fadeAmount), theID);
			}
		}
		clearInterval(fadeTimer[theID]);
		fadeTimer[theID] = setInterval("fadeElement('"+theID+"', '"+fadeCurrent+"', '"+fadeAmount+"', '"+fadeSteps+"')", 15);
	}
}
//Modify the big picture position xiechangquan
function cubicInOut(t, b, c, d)
{
	if ((t/=d/2) < 1) return c/2*t*t*t + b;
	return c/2*((t-=2)*t*t + 2) + b;
}


// Utility: Set the opacity, compatible with a number of browsers. Value from 0 to 100.


function popupwin(url, name, width, height, options){
	if(isIE){
	   var win = window.showModelessDialog(url, window ,"status:false;dialogWidth:"+(width)+"px;dialogHeight:"+(height+30)+"px;edge:Raised; help: 0; resizable: 0; status: 0;scroll:0;");
	}
	else{
		xposition=0; yposition=0;
		if ((parseInt(navigator.appVersion) >= 4 )){
			xposition = (screen.width - width) / 2;
			yposition = (screen.height - height) / 2;
		}
		theproperty= "width=" + width + "," 
		           + "height=" + height + "," 
		           + "screenx=" + xposition + ","
	               + "screeny=" + yposition + ","
	               + "left=" + xposition + ","
	               + "top=" + yposition + "," + options 	
		var win = window.open(url,name,theproperty);
		win.focus();
	}
	return false;
}





//---------------------

var sina={$_:function(objName){if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}},isIE:navigator.appVersion.indexOf("MSIE")!=-1?true:false,addEvent:function(l,i,I){if(l.attachEvent){l.attachEvent("on"+i,I)}else{l.addEventListener(i,I,false)}},delEvent:function(l,i,I){if(l.detachEvent){l.detachEvent("on"+i,I)}else{l.removeEventListener(i,I,false)}},readCookie:function(O){var o="",l=O+"=";if(document.cookie.length>0){var i=document.cookie.indexOf(l);if(i!=-1){i+=l.length;var I=document.cookie.indexOf(";",i);if(I==-1)I=document.cookie.length;o=unescape(document.cookie.substring(i,I))}};return o},writeCookie:function(i,l,o,c){var O="",I="";if(o!=null){O=new Date((new Date).getTime()+o*3600000);O="; expires="+O.toGMTString()};if(c!=null){I=";domain="+c};document.cookie=i+"="+escape(l)+O+I},readStyle:function(I,l){if(I.style[l]){return I.style[l]}else if(I.currentStyle){return I.currentStyle[l]}else if(document.defaultView&&document.defaultView.getComputedStyle){var i=document.defaultView.getComputedStyle(I,null);return i.getPropertyValue(l)}else{return null}}};

//ͼƬ캯
//UI&UE Dept. mengjia
//080623
//function ScrollPic(scrollContId,arrLeftId,arrRightId,dotListId){this.scrollContId=scrollContId;this.arrLeftId=arrLeftId;this.arrRightId=arrRightId;this.dotListId=dotListId;this.dotClassName="dotItem";this.dotOnClassName="dotItemOn";this.dotObjArr=[];this.pageWidth=0;this.frameWidth=0;this.speed=10;this.space=10;this.pageIndex=0;this.autoPlay=true;this.autoPlayTime=5;var _autoTimeObj,_scrollTimeObj,_state="ready";this.stripDiv=document.createElement("DIV");this.listDiv01=document.createElement("DIV");this.listDiv02=document.createElement("DIV");if(!ScrollPic.childs){ScrollPic.childs=[]};this.ID=ScrollPic.childs.length;ScrollPic.childs.push(this);this.initialize=function(){if(!this.scrollContId){throw new Error("ָscrollContId.");return};this.scrollContDiv=sina.$_(this.scrollContId);if(!this.scrollContDiv){throw new Error("scrollContIdȷĶ.(scrollContId = \""+this.scrollContId+"\")");return};this.scrollContDiv.style.width=this.frameWidth+"px";this.scrollContDiv.style.overflow="hidden";this.listDiv01.innerHTML=this.listDiv02.innerHTML=this.scrollContDiv.innerHTML;this.scrollContDiv.innerHTML="";this.scrollContDiv.appendChild(this.stripDiv);this.stripDiv.appendChild(this.listDiv01);this.stripDiv.appendChild(this.listDiv02);this.stripDiv.style.overflow="hidden";this.stripDiv.style.zoom="1";this.stripDiv.style.width="32766px";this.listDiv01.style.cssFloat="left";this.listDiv02.style.cssFloat="left";sina.addEvent(this.scrollContDiv,"mouseover",Function("ScrollPic.childs["+this.ID+"].stop()"));sina.addEvent(this.scrollContDiv,"mouseout",Function("ScrollPic.childs["+this.ID+"].play()"));if(this.arrLeftId){this.arrLeftObj=sina.$_(this.arrLeftId);if(this.arrLeftObj){sina.addEvent(this.arrLeftObj,"mousedown",Function("ScrollPic.childs["+this.ID+"].rightMouseDown()"));sina.addEvent(this.arrLeftObj,"mouseup",Function("ScrollPic.childs["+this.ID+"].rightEnd()"));sina.addEvent(this.arrLeftObj,"mouseout",Function("ScrollPic.childs["+this.ID+"].rightEnd()"))}};if(this.arrRightId){this.arrRightObj=sina.$_(this.arrRightId);if(this.arrRightObj){sina.addEvent(this.arrRightObj,"mousedown",Function("ScrollPic.childs["+this.ID+"].leftMouseDown()"));sina.addEvent(this.arrRightObj,"mouseup",Function("ScrollPic.childs["+this.ID+"].leftEnd()"));sina.addEvent(this.arrRightObj,"mouseout",Function("ScrollPic.childs["+this.ID+"].leftEnd()"))}};if(this.dotListId){this.dotListObj=sina.$_(this.dotListId);if(this.dotListObj){var pages=Math.round(this.listDiv01.offsetWidth/this.frameWidth+0.4),i,tempObj;for(i=0;i<pages;i++){tempObj=document.createElement("span");this.dotListObj.appendChild(tempObj);this.dotObjArr.push(tempObj);if(i==this.pageIndex){tempObj.className=this.dotClassName}else{tempObj.className=this.dotOnClassName};tempObj.title=""+(i+1)+"ҳ";sina.addEvent(tempObj,"click",Function("ScrollPic.childs["+this.ID+"].pageTo("+i+")"))}}};if(this.autoPlay){this.play()}};this.leftMouseDown=function(){if(_state!="ready"){return};_state="floating";_scrollTimeObj=setInterval("ScrollPic.childs["+this.ID+"].moveLeft()",this.speed)};this.rightMouseDown=function(){if(_state!="ready"){return};_state="floating";_scrollTimeObj=setInterval("ScrollPic.childs["+this.ID+"].moveRight()",this.speed)};this.moveLeft=function(){if(this.scrollContDiv.scrollLeft+this.space>=this.listDiv01.scrollWidth){this.scrollContDiv.scrollLeft=this.scrollContDiv.scrollLeft+this.space-this.listDiv01.scrollWidth}else{this.scrollContDiv.scrollLeft+=this.space};this.accountPageIndex()};this.moveRight=function(){if(this.scrollContDiv.scrollLeft-this.space<=0){this.scrollContDiv.scrollLeft=this.listDiv01.scrollWidth+this.scrollContDiv.scrollLeft-this.space}else{this.scrollContDiv.scrollLeft-=this.space};this.accountPageIndex()};this.leftEnd=function(){if(_state!="floating"){return};_state="stoping";clearInterval(_scrollTimeObj);var fill=this.pageWidth-this.scrollContDiv.scrollLeft%this.pageWidth;this.move(fill)};this.rightEnd=function(){if(_state!="floating"){return};_state="stoping";clearInterval(_scrollTimeObj);var fill=-this.scrollContDiv.scrollLeft%this.pageWidth;this.move(fill)};this.move=function(num,quick){var thisMove=num/5;if(!quick){if(thisMove>this.space){thisMove=this.space};if(thisMove<-this.space){thisMove=-this.space}};if(Math.abs(thisMove)<1&&thisMove!=0){thisMove=thisMove>=0?1:-1}else{thisMove=Math.round(thisMove)};var temp=this.scrollContDiv.scrollLeft+thisMove;if(thisMove>0){if(this.scrollContDiv.scrollLeft+thisMove>=this.listDiv01.scrollWidth){this.scrollContDiv.scrollLeft=this.scrollContDiv.scrollLeft+thisMove-this.listDiv01.scrollWidth}else{this.scrollContDiv.scrollLeft+=thisMove}}else{if(this.scrollContDiv.scrollLeft-thisMove<=0){this.scrollContDiv.scrollLeft=this.listDiv01.scrollWidth+this.scrollContDiv.scrollLeft-thisMove}else{this.scrollContDiv.scrollLeft+=thisMove}};num-=thisMove;if(Math.abs(num)==0){_state="ready";if(this.autoPlay){this.play()};this.accountPageIndex();return}else{this.accountPageIndex();setTimeout("ScrollPic.childs["+this.ID+"].move("+num+","+quick+")",this.speed)}};this.next=function(){if(_state!="ready"){return};_state="stoping";this.move(this.pageWidth,true)};this.play=function(){if(!this.autoPlay){return};clearInterval(_autoTimeObj);_autoTimeObj=setInterval("ScrollPic.childs["+this.ID+"].next()",this.autoPlayTime*1000)};this.stop=function(){clearInterval(_autoTimeObj)};this.pageTo=function(num){if(_state!="ready"){return};_state="stoping";var fill=num*this.frameWidth-this.scrollContDiv.scrollLeft;this.move(fill,true)};this.accountPageIndex=function(){this.pageIndex=Math.round(this.scrollContDiv.scrollLeft/this.frameWidth);if(this.pageIndex>Math.round(this.listDiv01.offsetWidth/this.frameWidth+0.4)-1){this.pageIndex=0};var i;for(i=0;i<this.dotObjArr.length;i++){if(i==this.pageIndex){this.dotObjArr[i].className=this.dotClassName}else{this.dotObjArr[i].className=this.dotOnClassName}}}};