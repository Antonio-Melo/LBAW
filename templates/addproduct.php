<div class="panel-body items-display">
    <div class="new-product">
        <h4>New Product</h4>
    </div>

    <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <div class="name col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tag"> Name</i></span>
                <input type="text" class="form-control" id="name">
            </div>
        </div>
        <div class="row">
            <div class="small-description col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-12 col-xs-12">
                <div class="form-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"> Small description</i></span>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-12 col-xs-12">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"> Type</i></span>
                <select class="form-control" id="types">
                    <option>Smartphone</option>
                    <option>Tablet</option>
                    <option>Peripheral</option>
                    <option>Computer</option>
                    <option>Gaming</option>
                    <option>Camera</option>
                    <option>Accessories</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="name col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-12 col-xs-12">
                <span class="input-group-addon"><i class="fa fa-money"> Price</i></span>
                <input type="number" class="form-control" id="price">
            </div>
        </div>
        <div class="row">
            <div class="colors col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-12 col-xs-12">
                <form>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="">Black
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="">White
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="">Golden
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="">Silver
                    </label>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="name col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-12 col-xs-12">
                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"> Quantity</i></span>
                <input type="number" class="form-control" id="qty">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-6 col-12">
                <span class="input-group-addon"><i class="glyphicon glyphicon-list"> Images</i></span>
                <label class="btn btn-block btn-primary">
                    Browse&hellip; <input type="file" style="display: none;">
                </label>
            </div>
        </div>

        <div class="row">
            <div class="small-description col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-12 col-xs-12">
                <div class="form-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"> Full description</i></span>
                    <textarea class="form-control" rows="10" maxlength="5" id="comment"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-lg-offset-5 col-md-2 col-md-offset-5  col-sm-12 col-xs-12">
                <button type="button" class="btn btn-primary btn-block profileButton">Add</button>
            </div>
        </div>
    </div>
</div>