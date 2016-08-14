
{include file="header.tpl"  name=""}  

{include file="page_header.tpl"  name=""}  
{if $common_searching=='yes'}
	{include file="Search_user_details.tpl"  name=""}
{else}
    <form action="" class="form-horizontal form-striped form-bordered" method="post" enctype="multipart/form-data" name="search_form">
    {include file="Search_user_details.tpl"  name=""} 
    </form>
{/if}
{include file="page_footer.tpl"  name=""}  
{include file="layer.tpl"  name=""}  
{include file="footer.tpl"  name=""}  

<script src="{$js_path}search.js"></script>
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();

    });
</script>

{include file="page_close.tpl"  name=""} 