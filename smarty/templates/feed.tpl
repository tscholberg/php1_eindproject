<div class="container-fluid header-feed">
    <div class="row">
        <div class="col-md-3"></div>

        <div class="col-md-6">
            <form class="form-inline search-bar" action="{$siteurl}/feed" method="post">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <div class="form-group">
                        <input type="text" class="form-control" name="search" placeholder="Type tag"/>
                    </div>
                    <button type="submit" class="btn btn-default btn-search" name="btnZoeken">Search</button>
                </div>
                </div>
             </form>

        <div class="col-md-3">
            <a class="btn btn-default" href="{$siteurl}/logout" role="button">Logout</a>
            <a class="btn btn-default" href="{$siteurl}/change_profile" role="button">Change profile</a>
        </div>
    </div>
</div>

<div class="container-fluid feed">
    <div class="row feed">
            {foreach from=$afb key=k item=v}
                <div class="each-post">
                    <img src="{$afb[$k]['picture']}" alt="{$afb[$k]['picture']}" class="img-feed"/><br />
                    <div class="description-feed">{$descr[$k]['description']}
                        <div class="comment-like">
                           <button type="" class="btn btn-default btn-like"><i class="fa fa-heart fa-2x nolike"></i></button>
                        </div>
                    </div>
                </div>
            {/foreach}
    </div>
</div>
