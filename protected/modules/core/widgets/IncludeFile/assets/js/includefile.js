
$(function(){
   $(".j-editFile").click(function(){
      var dialog_id = $(this).data('dialog-id');
      var form_id = $(this).data('form-id');
      var content_id = $(this).data('content-id');
      var url = $(this).data('url');


      $("#"+dialog_id).dialog({
         width: 1000,
         height: 400,
         position: { my: "top", at: "top" },
         buttons: [
            {
               text: "Сохранить",
               icons: {
                  primary: "ui-icon-heart"
               },
               click: function() {

                  $('#'+content_id).elrte('updateSource');

                  var YII_CSRF_TOKEN = $("#"+dialog_id).find('input[name=YII_CSRF_TOKEN]').val();
                  var FileContent = $("#"+dialog_id).find('textarea[name=FileContent]').val();
                  var FileName = $("#"+dialog_id).find('input[name=FileName]').val();
                  
                  var data = {
                    'YII_CSRF_TOKEN': YII_CSRF_TOKEN,
                    'FileContent': FileContent,
                    'FileName': FileName
                  };
                  
                  
                  $.post(url,data , function(data){
                     alert(data);
                     window.location = '';
                  });
               }
               // Uncommenting the following line would hide the text,
               // resulting in the label being used as a tooltip
               // showText: false
            }
         ]
      });
   });
});
