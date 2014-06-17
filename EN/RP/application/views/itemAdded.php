<?php echo "<script>itemAdded();</script>";?>
<!--<div id="dialog" title="Alert">
<p>
Hello this is my first dialog using</p>
</div> 
<input type="button" id="opener" value="show Alert" />
<script type="text/javascript">
$("#opener").click(function () {
    $("#dialog").dialog("open");
});
$('<div></div>').appendTo('body')
                    .html('<div><h6>Are you sure?</h6></div>')
                    .dialog({
                        modal: true, title: 'Delete message', zIndex: 10000, autoOpen: true,
                        width: 'auto', resizable: false,
                        buttons: {
                            Yes: function () {
                                // $(obj).removeAttr('onclick');                                
                                // $(obj).parents('.Parent').remove();

                                $(this).dialog("close");
                            },
                            No: function () {
                                $(this).dialog("close");
                            }
                        },
                        close: function (event, ui) {
                            $(this).remove();
                        }
                    });
</script>-->
