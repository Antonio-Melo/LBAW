{include file='header.tpl'}

<div class="container-fluid" id="tickets-body">
	<!-- Tickets -->
	<h1>Pending tickets</h1>
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
			{foreach $tickets as $ticket}
				<a href={"#"|cat: $ticket.ticket_id} class="list-group-item" data-toggle="collapse">"{$ticket.subject}" by: {$ticket.name} ({$ticket.username}) <i class="fa fa-caret-down"></i></a>
				<div class="collapse answer" id={$ticket.ticket_id}>
					<p>{$ticket.message}</p>
					<form method="post" action="../actions/respondticket.php">
						<input type="hidden" value={$ticket.email} name="email">
						<input type="hidden" value={$ticket.subject} name="subject">
						<input type="hidden" value={$ticket.ticket_id} name="id">
						<input type="hidden" value={$current_page} name="page">
					
						<label for={"response"|cat:$ticket.ticket_id}>Email response:</label>
						<textarea class="form-control" rows="5" id={"response"|cat:$ticket.ticket_id} name="response"></textarea>
						<button type="submit" class="btn button">Send</button>
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
</div>

{include file='footer.tpl'}