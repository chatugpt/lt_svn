if (typeof addthis_widget=="undefined"){
	var addthis_widget='addthis';
	var at12O='http://s7.addthis.com/'; 
	var at12o='http://s7.addthis.com/services/';
	function at12Y( ){
		addthis_url=encodeURIComponent(addthis_url); addthis_title=encodeURIComponent(addthis_title); addthis_title=addthis_title.replace(/'/g,'\\\''); 
		var at12y='<a href="'+at12I('')+'\" onclick=\"return addthis_to()\">'; at12y+='<img src="'+baseURL+'images/root/button1-bm.gif" width="125" height="16" border="0" style="border: none; padding: 0px" alt="AddThis Social Bookmarking Widget" /></a>';
		document.write(at12y); 
	}
	function at12I(at12r){return 'http://www.addthis.com/bookmark.php?v=12&winname=addthis&pub='+addthis_pub+'&s='+at12r+'&url='+addthis_url+'&title='+addthis_title; }
	function addthis_to(at12r){if (at12r=='favorites'){addthis_url=decodeURIComponent(addthis_url); addthis_title=decodeURIComponent(addthis_title); if (document.all)window.external.AddFavorite(addthis_url,addthis_title); else window.sidebar.addPanel(addthis_title,addthis_url,''); return false; }window.open(at12I(at12r),'addthis','scrollbars=yes,menubar=no,width=620,height=400,resizable=yes,toolbar=no,location=no,status=no'); return false; }
}
at12Y();