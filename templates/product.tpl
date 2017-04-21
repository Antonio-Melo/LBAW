{include file='header.tpl'}

<div class="panel-body items-display">
    <div id="product-image" class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="product-image-container">
            {if $product.url != null}
				<img src={"../images/products/"|cat:$product.url}>
			{else}
				<img src="../images/products/common/default.png">
			{/if}
        </div>
        <div class="product-info-container">
            <div class="center-block">
                <span class="name"><h1>{$product.product_name}</h1></span>
				<span>
					{if $product.nr_ratings != 0}
						{for $i=1 to $product.rating/$product.nr_ratings}
							<img src="../images/products/common/star.png">
						{/for}
					{/if}
				</span>
            </div>
        </div>
    </div>
    <div id="product-info" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		{if isset($smarty.session.username) && isset($smarty.session.admin)}
			<button id="editproduct" type="button" class="btn btn-primary btn-block profileButton">Edit product</button>
		{/if}
        
		<div class="full-description">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					<span class="full-name"> <h3>{$product.full_name}</h3></span><br>
				</div>
			</div>
			<span class="sub-description">
				{$product.small_description}
			</span>
			<hr>
		</div>
		
		<div class="product-pricing">
			{if $product.sale_price != null}
				<h4>Flash sale price:</h4>
				<span class="price">{$product.sale_price|number_format:2}&euro;</span>
				<span class="old-price">{$product.price|number_format:2}&euro;</span>
			{else}
				<h4>Price:</h4>
				<span class="price">{$product.price|number_format:2}&euro;</span>
			{/if}
			{if $product.sale_price != null}
				<div class="progress">
					<div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="50"
						 aria-valuemin="0" aria-valuemax="100" style="width:50%">
						{$product.stock} left
					</div>
				</div>
			{/if}
			<div class="product-shipping">
				<br><span>Shipping Cost: FREE SHIPPING Via Unregistered Air Mail</span>
			</div>
		</div>
		
		<div class="product-add">
			{if isset($smarty.session.username) && !isset($smarty.session.admin)}
				<div class="product-buttons">
					<div class="product-buttons-buttons">
						<button type="button" class="btn btn-primary" id="add-to-cart">
							<span class="glyphicon glyphicon-shopping-cart"></span>
							Add to Cart
						</button>
						<button type="button" class="btn btn-primary" id="add-to-fav">
							<span class="glyphicon glyphicon-heart"></span>
							Add to Favorites
						</button>
					</div>
				</div>
			{/if}
			
			<div class="item-verifications">
				<img src="../images/products/common/paypal-verified.png" alt="paypal">
				<img src="../images/products/common/money.png" alt="money">
			</div>
		</div>
    </div>

    <div class="full-info-container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#description"> <i class="fa fa-info-circle"></i> Description</a></li>
                <li><a data-toggle="tab" href="#faq"> <i class="fa fa-question-circle"></i> FAQ</a></li>
                <li><a data-toggle="tab" href="#customer-rv"><i class="fa fa-comment" style="font-size:20px"></i> Customer Reviews</a></li>
                <li><a data-toggle="tab" href="#sp"><i class="fa fa-plane" style="font-size:20px"></i> Shipping & Payment</a></li>
            </ul>

            <div class="tab-content">
                <div id="description" class="tab-pane fade in active"><br>
                    {$product.description}
                </div>

				
                <div id="faq" class="tab-pane fade"><br>
                    <div class="list-group panel">
						{foreach $faqs as $faq}
							<a href={"#"|cat:$faq.faq_id} class="list-group-item" data-toggle="collapse">{$faq.question}</a>
							<div class="collapse answer" id={$faq.faq_id}>
								<br><p>{$faq.answer}</p>
							</div>
						{/foreach}
                    </div>
                </div>
                <div id="customer-rv" class="tab-pane fade">
                    <br>
					{foreach $reviews as $review}
						<div class="media">
							<div class="media-left">
								{if $review.url != null}
									<img class="media-object" src={"../images/users/"|cat:$review.url}>
								{else}
									<img class="media-object" src="../images/users/common/default_client.png">
								{/if}
							</div>
							<div class="media-body">
								<h4 class="media-heading">{$review.name}</h4>
								<span>
									{for $i=1 to $review.rating}
										<img class="star" src="../images/products/common/star.png">
									{/for}
								</span>
								{if $review.comment != null}
									<p>{$review.comment}</p>
								{/if}
								
								<!-- REPLIES -->
								{foreach $review.replies as $reply}
									<div class="media">
										<div class="media-left">
											{if $reply.url != null}
												<img class="media-object answer-pic" src={"../images/users/"|cat:$reply.url}>
											{else}
												<img class="media-object answer-pic" src="../images/users/common/default_admin.png">
											{/if}
										</div>
										<div class="media-body">
											<h4 class="media-heading">{$reply.name}</h4>
											<p>{$reply.message}</p>
										</div>
									</div>
								{/foreach}
							</div>
						</div>
						<hr>
					{/foreach}
                </div>
                <div id="sp" class="tab-pane fade">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Shipping Type</th>
                                <th>Country or Region</th>
                                <th>Estimated Shipping Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                <td rowspan="10">Flat Rate Shipping</td>
                                <tr>
                                    <td>United States</td>
                                    <td>10-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Russia,Kraine</td>
                                    <td>10-40 Business Days</td>
                                </tr>
                                    <td>United Kindom, Ireland, Germany, France, Italy, Netherlands, Belgium, Austria,Switzerland, Spain, Portugal</td>
                                    <td>10-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Canada,Australia,New Zealand</td>
                                    <td>15-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Belarus,Estonia,Latavia,Moldova</td>
                                    <td>15-35 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Japan,Korea</td>
                                    <td>15-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Brazil, Argentina, Uruguay, Peru </td>
                                    <td>15-40 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Norway, Sweden, Finland, Iceland, Denmark</td>
                                    <td>15-30 Business Days</td>
                                </tr>
                                <tr>
                                    <td>Egypt, Iran, Iraq, Israel, Jordan, Kuwait, Suaudi Arabia, United Arab Emirates, Yemen</td>
                                    <td>15-40 Business Days</td>
                                </tr>
                                <td rowspan="5">Priority Direct Mail</td>
                                <tr>
                                    <td>Russia </td>
                                    <td>10-25 Days</td>
                                </tr>
                                <tr>
                                    <td>United States, United Kingdom, Germany, France, Italy, Spain, Portugal </td>
                                    <td>7-15 Days</td>
                                </tr>
                                <tr>
                                    <td>Canada, Australia </td>
                                    <td>7-15 Days</td>
                                </tr>
                                <tr>
                                    <td>Korea</td>
                                    <td>5-10 Days</td>
                                </tr>
                                <td rowspan="2">Standard Shipping</td>
                                <tr>
                                    <td>Worldwide</td>
                                    <td>6-10 Business Days</td>
                                </tr>
                                <td rowspan="2">Expedited Shipping</td>
                                <tr>
                                    <td>Worldwide</td>
                                    <td>3-7 Days</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file='footer.tpl'}