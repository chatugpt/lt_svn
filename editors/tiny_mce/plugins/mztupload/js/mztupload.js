tinyMCEPopup.requireLangPack();
function mztupload_start_upload(frm){
      if(frm.file.value<4){
            alert('Select file,please！');
            return false;
      }
      document.getElementById('mzt_upload_process').style.display = 'block';
      document.getElementById('mzt_upload').style.display = 'none';
      return true;
}

function mztupload_goto_do(file){
      var n=String(window.document.location);
      var webpath=n.substring(0,n.lastIndexOf("/"));
      webpath=webpath.substring(webpath.indexOf("://")+3);
      webpath=webpath.substring(webpath.indexOf("/"));
      var insert_html='';
      var file_type=file.substring(file.lastIndexOf('.')+1,file.length);
      var file_name=file.substring(file.lastIndexOf('/')+1,file.length);
      var str_else_type="/doc/docx/rar/zip/pdf";
      if(file_type == 'jpg'|| file_type == 'jpeg'|| file_type == 'png' || file_type == 'gif'){
            insert_html="<img src='"+file+"' alt='"+file_name+"' title='"+file_name+"' />";
            document.getElementById('mzt_upload_process').style.display = 'none';
            document.getElementById('mzt_upload').style.display = 'block';       
      }
      else if(str_else_type.indexOf(file_type)!=-1){
            insert_html="<a href='"+file+"' target='_blank'><img src='"+webpath+"/imgs/mzt_file_"+file_type+".gif' alt='"+file_name+"' title='"+file_name+"' /></a>";
      }
      else{
            insert_html="<a href='"+file+"' target='_blank'><img src='"+webpath+"/imgs/mzt_file.gif' alt='"+file_name+"' title='"+file_name+"' /></a>";
            
      }
      mztupload_inert_html(insert_html);
}

function mztupload_inert_html(html){
      try{
            tinyMCE.execCommand('mceInsertContent', false, html);
      }
      catch(e){
            try{
                  tinyMCEPopup.close();
            }catch(ee){
                  window.opener=null;
                  self.close()
            }
      }
      try{
            tinyMCEPopup.close();
      }catch(ee){
            window.opener=null;
            self.close()
      }
}

function mztupload_stop_upload(success,value){
      if(success==1){
            /*上传成功*/
            mztupload_goto_do(value);
      }
      else if(success==2){
            /*文件类型不允许*/
            document.getElementById('mzt_upload_process').style.display = 'none';
            document.getElementById('mzt_upload').style.display = 'block';
            alert('File type error!(only '+ value +')');
      }
      else if(success==3){
            /*文件类型不允许*/
            document.getElementById('mzt_upload_process').style.display = 'none';
            document.getElementById('mzt_upload').style.display = 'block';
            alert('File size is incorrect!(Less '+ value +')');
      }
      else{
            /*其他错误*/
            document.getElementById('mzt_upload_process').style.display = 'none';
            document.getElementById('mzt_upload').style.display = 'block';
            alert('Upload error!');
      }
      return true;
}