// Scripts for "Choice" tab
$(function() {

    // Add new row
    $(".choiceEditTable .plusOne").click(function(){
        var choice_name = Math.random();
        var row = $(".choiceEditTable .copyMe").clone().removeClass('copyMe');
        row.appendTo(".choiceEditTable tbody");
        row.find(".value").each(function(i, el){
            $(el).attr('name', 'choice['+choice_name+'][]');
        });
        return false;
    });

    // Delete row
    $(".choiceEditTable").delegate(".deleteRow", "click", function(){
        $(this).parent().parent().remove();

        if($(".choiceEditTable tbody tr").length == 1)
        {
            $(".choiceEditTable .plusOne").click();
        }
        return false;
    });

    // Enable table rows sorting
    $(".choiceEditTable tbody").sortable();

   /**
     * Show/hide choice tab on type change
     * @param el
     */
    function toggleChoiceTab(el)
    {
        var choiceTab = $(".SidebarTabsControl li")[1];
        // Show choice tab when type is dropdown or select
        if($(el).val() == 3 || $(el).val() == 4 || $(el).val() == 5 || $(el).val() == 6)
        {
            $(choiceTab).show();

            $(".field_use_in_filter").show();
            $(".field_select_many").show();
        }else{
            $(choiceTab).hide();
            $(".field_use_in_filter").hide();
            $(".field_select_many").hide();
        }
    }

});