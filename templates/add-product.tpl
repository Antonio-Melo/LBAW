{include file='header.tpl'}


<div class="container-fluid" id="addproduct-body">
    <h1>Add New Product</h1>
    <hr>
    <form id="add-product" action="../actions/addproduct.php" method="post" enctype="multipart/form-data">
        <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12" id="addproduct-content">
                <div>
                    <label for="name"><span class="glyphicon glyphicon-tag"></span> Name</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="full-name"><span class="glyphicon glyphicon-tag"></span> Full Name</label>
                    <textarea rows="2" id="full-name" name="full-name"></textarea>
                </div>
                <div>
                    <label for="sm-description"><span class="glyphicon glyphicon-tags"></span> Small description</label>
                    <textarea rows="5" id="sm-description" name="sm-description" ></textarea>
                </div>
                <div class="dropdown-container">
                    <label for="types"><span class="glyphicon glyphicon-list"></span> Type</label>
                    <div class="select dropdown" id="types">
                        <button value="1" class="btn btn-default dropdown-toggle" id="types-search-order-bttn" data-toggle="dropdown">
                            Smartphone &nbsp;&nbsp;<span class="caret"></span>
                        </button>
                        <ul id="category" class="dropdown-menu">
                            {foreach from=$keywords item=keyword}							
								<li value={$keyword.id}><a>{$keyword.name}</a></li>
							{/foreach}
                        </ul>
                    </div>
					<input type="hidden" value="1" name="keyword">
                </div>
            <div class="dropdown-container">
                <label for="brands"><span class="glyphicon glyphicon-list"></span> Brand</label>
                <div class="select dropdown" id="brands">
                    <button class="btn btn-default dropdown-toggle" value="" id="brands-search-order-bttn" data-toggle="dropdown">
                         &nbsp;<span class="caret"></span>
                    </button>
                    <ul id="brands-list" class="dropdown-menu">
                        {foreach $brands as $brand}
                            <li value={$brand.id}><a>{$brand.name}</a></li>
                        {/foreach}
                    </ul>
                </div>
				<input type="hidden" value="-1" name="brand">
            </div>
                <div>
                    <label for="price"><span class="fa fa-money"></span> Price</label>
                    <input type="number" id="price" name="price">
                </div>

                <div>
                    <label for="qty"><span class="glyphicon glyphicon-tags"></span> Quantity</label>
                    <input type="number" id="qty" name="qty">
                </div>

                <div>
                    <label><span class="glyphicon glyphicon-picture"></span> Images</label>
                    <label for="image-input" id="browse-btn">Browse&hellip;</label>
                    <input id="image-input" name="imageinput[]" type="file" style="display: none;" multiple="multiple">
                </div>
                <div>
                    <label for="lg-description"><span class="glyphicon glyphicon-tags"></span> Full description</label>
                    <textarea rows="10" id="lg-description" name ="lg-description"></textarea>
                </div>
                <div>
                    <button id="addbutton" type="submit" class="btn btn-primary btn-block profileButton">Add</button>
                </div>
        </div>
    </form>
</div>


{include file='footer.tpl'}