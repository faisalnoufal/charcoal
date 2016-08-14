<!-- BEGIN GLOBAL AND THEME VENDORS -->
<script src="{$js_path}global-vendors.js"></script>
<!-- END GLOBAL AND THEME VENDORS -->
<!-- PLEASURE -->
<script src="{$js_path}pleasure.js"></script>
<!-- ADMIN 1 -->
<script src="{$js_path}layout.js"></script>
<script>
    jQuery(document).ready(function ()
    {
        jQuery("#close_link").click(function ()
        {
            jQuery("#message_box").fadeOut(10);
        }
        )
    })
</script> 