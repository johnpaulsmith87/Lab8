<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.css">


    <title></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-4"><label>Select a Restaurant...</label></div>
            <div class="col col-md-8">
                <select id="drpRestaurant" class="form-control">
                    <option value="-1">Please choose an option</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4"><label>Address:</label></div>
            <div class="col col-md-8"><textarea id="txtAddress" class="form-control" readonly></textarea></div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4"><label>Summary:</label></div>
            <div class="col col-md-8"><textarea id="txtSummary" class="form-control"></textarea></div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4"><label>Rating</label></div>
            <div class="col col-md-8">
                <select id="drpRating" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4">
                <button type="button" id="btnSave" class="btn btn-primary">Save</button>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4">
                <label class="alert alert-success" id="lblResult"></label>
            </div>
        </div>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery-3.2.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/sitejs.js"></script>
</body>
</html>