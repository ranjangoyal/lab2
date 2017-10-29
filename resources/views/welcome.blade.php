<!DOCTYPE html>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link href="css/style.css" rel="stylesheet">
		<script src="js/processing.js"></script>
    </head>
    <body>
		<div class="container">
            <div class="row">
                <div class="col-sm-12 heading">Add product details</div>
            </div>
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>
			<div class="row">
                <div class="col-sm-3">&nbsp;</div>
                <div id="idMsgEP" class="col-sm-6"></div>
                <div class="col-sm-3">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>
            <form name="frm" id="idEP" method="post">
			<div class="row">
                <div class="col-sm-3">&nbsp;</div>
                <div class="col-sm-2 label">Product name</div>
				<div class="col-sm-4">
					<input type="text" id="pname" name="pname" value="">
				</div>
                <div class="col-sm-3">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-sm-12"></div>
            </div>
            <div class="row">
                <div class="col-sm-3">&nbsp;</div>
                <div class="col-sm-2 label">Quantity in stock</div>
				<div class="col-sm-4">
					<input type="text" id="qty" name="qty" value="">
				</div>
                <div class="col-sm-3">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-sm-12"></div>
            </div>
            <div class="row">
                <div class="col-sm-3">&nbsp;</div>
                <div class="col-sm-2 label">Price per item</div>
				<div class="col-sm-4">
					<input type="text" id="price" name="price" value="">
				</div>
                <div class="col-sm-3">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-sm-5">&nbsp;</div>
				<div class="col-sm-4">
					<input type="submit" value="Submit" class="submit"/>
				</div>
                <div class="col-sm-3">&nbsp;</div>
            </div>
			<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
			</form>
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-sm-12 heading_items_list">Items List</div>
            </div>
            <div class="row">
                <div class="col-sm-3 heading">Product name</div>
				<div class="col-sm-2 heading">Quantity in stock</div>
				<div class="col-sm-2 heading">Price per item</div>
				<div class="col-sm-3 heading">Datetime submitted</div>
				<div class="col-sm-2 heading">Total value number</div>
            </div>
			<div id="result">{!! $strIH !!}</div>
        </div>
    </body>
</html>