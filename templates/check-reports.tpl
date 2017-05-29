{include file='header.tpl'}

<div class="container-fluid" id="check-reports-body">

    {if isset($smarty.session.id) && isset($smarty.session.admin)}
        <h1>Reports</h1>
        <hr>
        <div class="tickets-content">
            {if $nr_pages > 1}
            <div class="page-selector">
                <ul class="pagination pull-right">
                    <li><a go=1><span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span></a></li>
                    <li><a go={$current_page} before=true><span class="glyphicon glyphicon-menu-left"></span></a></li>
                    {for $i=$start_page to $end_page}
                    <li
                            {if $i == $current_page}
                                class="active"
                            {/if}
                    ><a go={$i}>{$i}</a><li>
                        {/for}
                    <li><a go={$current_page} max={$nr_pages} next=true><span class="glyphicon glyphicon-menu-right"></span></a></li>
                    <li><a go={$nr_pages}><span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span></a></li>
                </ul>
            </div>
            {/if}
            <div class="list-group panel">
                {foreach $reports as $report}
                    <a href={"#"|cat: $report.report_id} class="list-group-item" data-toggle="collapse">{$report.username2} by: {$report.username1} <i class="fa fa-caret-down"></i></a>
                    <div class="collapse answer" id={$report.report_id}>
                        <p>{$report.message}</p>
                        <form method="post" action="../actions/ban-user.php">
                            <input type="hidden" value={$report.reported} name="id">
                            <input type="hidden" value={$report.report_id} name="report_id">

                            <button type="submit" class="btn button">Ban</button>
                        </form>
                    </div>
                {/foreach}
            </div>
            {if $nr_pages > 1}
                <div class="page-selector">
                    <ul class="pagination pull-right">
                        <li><a go=1><span class="glyphicon glyphicon-menu-left"></span><span class="glyphicon glyphicon-menu-left"></span></a></li>
                        <li><a go={$current_page} before=true><span class="glyphicon glyphicon-menu-left"></span></a></li>
                        {for $i=$start_page to $end_page}
                        <li
                                {if $i == $current_page}
                                    class="active"
                                {/if}
                        ><a go={$i}>{$i}</a><li>
                            {/for}
                        <li><a go={$current_page} max={$nr_pages} next=true><span class="glyphicon glyphicon-menu-right"></span></a></li>
                        <li><a go={$nr_pages}><span class="glyphicon glyphicon-menu-right"></span><span class="glyphicon glyphicon-menu-right"></span></a></li>
                    </ul>
                </div>
            {/if}
        </div>
    {/if}
</div>

{include file='footer.tpl'}