    $(document).ready(function() {
       
       $(".poll_form").submit(function()
         {
            var yii =  $("form input[name='YII_CSRF_TOKEN']").val();
            var choice =  $("form input[name='choice']:checked").val();
            var info = 'YII_CSRF_TOKEN='+yii+"&choice="+choice;
            var poll_id = $("form input[name='poll']").val();;
           
            $.ajax({
            type:'post',
            url:"/poll/ajax",
            data:info,
            success:function(data){
                poll_result_load(poll_id,"vote_form");
            }
           })
           return false;
        })
        
             $("#poll_result").click(function(){
              
               $(".poll_form").hide();
               $(".results").fadeIn(200);
               
            })
            
            $("#poll_vote").click(function(){
              
               $(".results").hide();
               $(".poll_form").fadeIn(200);
            })
       });
       
         function poll_result_load(id,class_name){
             $.ajax({
            type:'get',
            url:"/poll/result?id="+id,
            success:function(data){
               $('.'+class_name).html(data);
               
            }
           }) 
        }
   