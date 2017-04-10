$(function () {
    //on load first populate drp then attach event handler to change event
    $('#lblResult').hide();
    GetXMLRestaurants();
    $('#drpRestaurant').change(function (ev) {
        $('#lblResult').hide();
        if (this.value != "-1") {
            // get restaurant data by name!
            GetXMLRestaurantByName(this.value);
            //also bind save even here!?
        }
        else {
            EmptyInputs();
        }
    });
    $('#btnSave').click(function (ev) {
        if ($('#drpRestaurant').val() != "-1") {
            SaveXML();
        }
    });
});
function GetXMLRestaurants() {
    var sendRequestTo = GET_RESTAURANTS_URL;
    $.ajax({
        type: "GET",
        url: sendRequestTo,
        success: PopulateSelectRestaurant,
        error: AlertError
    });
}
function GetXMLRestaurantByName(name) {

    var sendRequestTo = GET_RESTAURANT_BYNAME + name;
    $.ajax({
        type: "GET",
        url: sendRequestTo,
        success: PopulateInputs,
        error: AlertError
    });

}
function SaveXML() {
    var sendRequestTo = POST_CHANGES_URL;
    var data = JSON.stringify(GetFormData());
    $.ajax({
        type: "POST",
        url: sendRequestTo,
        data:{saveXML: data},
        success: DisplaySuccess,
        error: AlertError
    });

}
function DisplaySuccess(data) {
    var message = data;
    $('#lblResult').show().text(message);
}
function PopulateSelectRestaurant(data) {
    var restaurants = JSON.parse(data);
    for (var i = 0;i < restaurants.Restaurant.length;i++)
    {
        AddSelection('#drpRestaurant', restaurants.Restaurant[i].Name, restaurants.Restaurant[i].Name);
    }
}
function PopulateInputs(data) {
    var restaurant = JSON.parse(data);
    var address = restaurant[0];
    var summary = restaurant[1];
    var rating = restaurant[2];
    $('#txtAddress').val(address);
    $('#txtSummary').val(summary);
    $('#drpRating').val(rating.toString());
}
function EmptyInputs() {
    $('#txtAddress').val("");
    $('#txtSummary').val("");
    $('#drpRating').val("1");
}
function GetFormData() {
    var restaurantReview = { Name: $('#drpRestaurant').val(), Rating: parseInt($('#drpRating').val()), Summary: $('#txtSummary').val(), Address: { City: "", Street: "", PostalCode: "", Province: "" } }
    return restaurantReview;
}
function AlertError(xhr, status, error) {
    alert("xhr: " + xhr + "status: " + status + "error: " + error);
}
function AddSelection(selector, val, txt) {
    $(selector).append($('<option>', {
        value: val,
        text: txt
    }));
}
var GET_RESTAURANTS_URL = "json.php?getrestaurants=1";
var GET_RESTAURANT_BYNAME = "json.php?getrestaurantbyname=";
var POST_CHANGES_URL = "json.php";