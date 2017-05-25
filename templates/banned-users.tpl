{include file='header.tpl'}

<div class="banned-users-body">

	{if isset($smarty.session.id) && isset($smarty.session.admin)}
	<!-- Only admins have access to this page's content -->
		<h1>Banned-Users</h1>
		<hr>

		<div class="row">

			<div class="col-md-3 col-xs-3">
				<h3> User </h3>
				{foreach $banned as $user}
					<p>{$user.name}</p>
				{/foreach}
			</div>

			<div class="col-md-3 col-xs-3">
				<h3> ID </h3>
				{foreach $banned as $user}
					<p>{$user.id}</p>
				{/foreach}
			</div>

			<div class="col-md-3 col-xs-3">
				<h3> Date of Unban </h3>
				{foreach $banned as $user}
					<p>{$user.date-unban}</p>
				{/foreach}
			</div>

			<div class="col-md-3 col-xs-3">
				<h1> Unban</h1>
				<div class="btn-group-vertical" id="unban-buttons">
					{foreach $banned as $user}

						<button id="unban" type="button" class="btn btn-sm">Unban</button>

					{/foreach}
				</div>	
			</div>

		</div>


	{else} <!-- No admin privileges -->
		<h1 id= "access-denied">ACCESS DENIED</h1>
	{/if}

</div>

{include file='footer.tpl'}