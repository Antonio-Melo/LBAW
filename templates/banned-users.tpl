{include file='header.tpl'}

<div class="banned-users-body">

	{if isset($smarty.session.id) && isset($smarty.session.admin)}
	<!-- Only admins have access to this page's content -->
		<h1>Banned Users</h1>
		<hr>

		<div class="table-responsive">
			<table id="banned" class="table table-hover">
				<thead>
					<tr>
						<th>User</th>
						<th>ID</th>
						<th>Date of Unban</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					{foreach $banned as $user}
						<tr id={$order.id}>
							<td>{$user.name}</td>
							<td>{$user.id}</td>
							<td>
							{if $user.date-unban != 0}
								{$user.date-unban}
							{else}
								Indefinite
							{/if}
							</td>
							<td>
								<form id={$user.id} class="review-input" method="post">
									<button type="submit" class="unban btn btn-sm">Unban</button>
								</form>
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
	{else} <!-- No admin privileges -->
		<h1 id= "access-denied">ACCESS DENIED</h1>
	{/if}

</div>

{include file='footer.tpl'}