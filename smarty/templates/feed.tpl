<a class="btn btn-default" href="{$siteurl}/logout" role="button">Logout</a>
<br /><br />

<form action="{$siteurl}/feed" method="post">
    <input type="text" name="search" />
    <input type="submit" name="btnZoeken" value="search" />
</form>

{foreach from=$afb key=k item=v}
    <img src="{$afb[$k]['picture']}" alt="{$afb[$k]['picture']}" /><br />
{/foreach}
