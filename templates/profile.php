<profile>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 username"><h4>Username</h4></div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="profileBox">
                <div class="row">
                    <div class="col-sm-2">
                        <ul class="nav nav-pills nav-stacked" id="profileNav">
                            <p>My .bat Account</p>
                            <li class="active">
                                <a data-toggle="pill" href="#accountInfo">
                                    <p> <i class="fa fa-address-card-o" style="font-size:19px"></i> Account Info</p>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="pill" href="#security">
                                    <p> <i class="fa fa-lock" style="font-size:19px"></i> Security</p>
                                </a>
                            </li>
                            <p>Store Account</p>
                            <li>
                                <a data-toggle="pill" href="#myAddresses">
                                    <p> <i class="fa fa-map-marker" style="font-size:19px"></i> My Addresses</p>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="pill" href="#myOrders">
                                    <p> <i class="fa fa-list-alt" style="font-size:19px"></i> My Orders</p>
                                </a>
                            </li>
                            <p>Costumer Support</p>
                            <li>
                                <a data-toggle="pill" href="#supportTicket">
                                    <p> <i class="fa fa-sticky-note-o" style="font-size:19px"></i> Support Ticket</p>
                                </a>
                            </li>
                            <li>
                                <a data-toggle="pill" href="#serviceRequests">
                                    <p> <i class="fa fa-refresh" style="font-size:19px"></i> Service Requests</p>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="col-sm-10">
                        <div class="tab-content">
                            <!-- Account Info -->
                            <div id="accountInfo" class="tab-pane in active">
                                <?php
                                    include('accountInfo.php');
                                ?>
                            </div>

                            <!-- Security -->
                            <div id="security" class="tab-pane">
                                <?php
                                    include('security.php');
                                ?>
                            </div>

                            <!-- My Addresses -->
                            <div id="myAddresses" class="tab-pane">
                                <?php
                                    include('myAddresses.php');
                                ?>
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
            </div>
        </div>
    </div>
</profile>