function searchSuggest () {
	var search_str = $("#keyword").val();
	var query_str={search:search_str};
	var search_tex_width = $("#keyword").width()+2;
	var set_url = "includes/templates/chanelwatches/sideboxes/search.php";
	$.post(set_url,query_str,function(data){
		if(data) {
		$("#search_suggest").html(data);
		$("#search_suggest").css({'display':'block','width':search_tex_width});
		}
	})
}

//mouseOver
function suggestOver(div_value){
	div_value.className='suggest_link_over';
}

//mouseOut
function sugggestOut(div_value){
  div_value.className='suggest_link';
}

//click
function setSearch(div_value){
   document.getElementById("keyword").value=div_value;
   document.getElementById("search_suggest").innerHTML="";
   document.quick_find_header.submit();
   document.getElementById("search_suggest").style.display="none";
}
