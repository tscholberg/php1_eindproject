<a class="btn btn-default" href="{$siteurl}/feed" role="button">Logout</a>
<br /><br />

{foreach from=$afb key=k item=v}
    <img src="{$afb[$k]['picture']}" alt="{$afb[$k]['picture']}" /><br />
{/foreach}
