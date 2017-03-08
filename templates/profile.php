<div class="container-fluid" id="profile-body">
    <!-- Profile -->
	<h1>Your profile</h1>
	<hr>
	<div class="profile-content">
		<ul class="nav nav-pills">
			<li class="active">
				<a data-toggle="pill" href="#accountInfo">
					<h2> <i class="fa fa-address-card-o" ></i>&nbsp; Account Info</h2>
				</a>
			</li>
			<li>
				<a data-toggle="pill" href="#security">
					<h2> <i class="fa fa-lock" ></i>&nbsp; Security</h2>
				</a>
			</li>
			<li>
				<a data-toggle="pill" href="#myAddresses">
					<h2> <i class="fa fa-map-marker" ></i>&nbsp; My Addresses</h2>
				</a>
			</li>
			<li>
				<a data-toggle="pill" href="#myOrders">
					<h2> <i class="fa fa-list-alt" ></i>&nbsp; My Orders</h2>
				</a>
			</li>
			<li>
				<a data-toggle="pill" href="#supportTicket">
					<h2> <i class="fa fa-sticky-note-o"></i>&nbsp; Support Ticket</h2>
				</a>
			</li>
			<li>
				<a data-toggle="pill" href="#myOrders">
					<h2> <i class="fa fa-refresh" ></i>&nbsp; Service Requests</h2>
				</a>
			</li>
		</ul>
	
		<div class="tab-content">
			<!-- Account Info -->
			<div id="accountInfo" class="tab-pane in active">
				<div class="row">
					<div class="col-sm-2">
						<b>First Name:</b>
					</div>
					<div class="col-sm-8">
						<p>Augustus</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<b>Last Name:</b>
					</div>
					<div class="col-sm-8">
						<p>Caesar</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<b>E-mail address:</b>
					</div>
					<div class="col-sm-8">
						<p>augustus@romail.com</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<b>Country:</b>
					</div>
					<div class="col-sm-8">
						<p>Roman Empire</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<button type="button" class="btn btn-primary btn-block profileButton">Edit</button>
					</div>
				</div>
			</div>

			<!-- Security -->
			<div id="security" class="tab-pane">
				<div class="row">
					<div class="col-sm-2">
						<b>Password:</b>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="password" class="form-control" id="oldpwd" placeholder="Old Password">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="password" class="form-control" id="pwd" placeholder="New Password">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-4">
						<div class="form-group">
							<input type="password" class="form-control" id="newpwd" placeholder="Confirm">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-primary btn-block profileButton">Save</button>
					</div>
				</div>
			</div>

			<!-- My Addresses -->
			<div id="myAddresses" class="tab-pane">
				<ul class="row list-unstyled">
					<li class="col-sm-6 col-md-6">
						<div class="adressCard">
							<p>Augustus Caesar</p>
							<p>Street 1, Door 1</p>
							<p>Roma 1000</p>
							<p>Roma</p>
							<p>Roman Empire</p>
							<p>Tel:+39 06 6485 0987</p>
							<button type="button" class="btn btn-primary btn-block profileButton">Default</a></button>
							<button type="button" class="btn btn-primary btn-block profileButton"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-primary btn-block profileButton delete-address"><i class="fa fa-trash"></i></button>
						</div>
					</li>
					<li class="col-sm-6 col-md-6">
						<div class="adressCard">
							<p>Cleopatra</p>
							<p>Street 1, Door 1</p>
							<p>Cairo 1000</p>
							<p>Cairo</p>
							<p>Egyptian Empire</p>
							<p>Tel:+20 101 701 7003</p>
							<button type="button" class="btn btn-primary btn-block profileButton">Default</a></button>
							<button type="button" class="btn btn-primary btn-block profileButton"><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-primary btn-block profileButton delete-address"><i class="fa fa-trash"></i></button>
						</div>
					</li>


					<li class="col-sm-6 col-md-6">
						<button type="button" class="btn btn-primary btn-block profileButton">Add</button>
					</li>
				</ul>
			</div>

			<!-- My Orders -->
			<div id="myOrders" class="tab-pane">
				444444444444
			</div>

			<!-- Support Ticket -->
			<div id="supportTicket" class="tab-pane">
				555555555555
			</div>

			<!-- Service Requests -->
			<div id="serviceRequests" class="tab-pane">
				666666666666
			</div>

		</div>
    </div>
</div>