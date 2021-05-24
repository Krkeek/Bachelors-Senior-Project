//#region Show Admins
function admin() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?adminRetrieve=adminRetrieve";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var Admins = JSON.parse(this.responseText);
            var Admin = Admins.Admin;
            var html1 = "";
            if (Admin.length == 0) {
                document.getElementById("noadminExcited").style.display = "inline-flex";
                document.getElementById("adminExcited").style.display = "none";

            } else {
                for (var a = 0; a < Admin.length; a++) {
                    var firstName = Admin[a].firstname;
                    var lastName = Admin[a].lastname;
                    var phone = Admin[a].phone;
                    var email = Admin[a].email;
                    var position = Admin[a].position;
                    var username = Admin[a].username;


                    html1 += "<div class='row row-md'>";
                    html1 += " <div class='col adminInfo'>" + firstName + " " + lastName + "</div>";
                    html1 += " <div class='col adminInfo'> Tel: " + phone + " " + email + "</div>";
                    html1 += " <div class='col adminInfo'>" + position + "</div>";
                    html1 += " <div  class='col adminInfo buttonBox'><a name='" + username + "' onClick='changePosition(this.name)' type='button' class='btn btn-primary custom-btn blueB'>Position</a><a name='" + username + "' onClick='deleteAdmin(this.name)' type='button' class='btn btn-danger custom-btn redB'>Delete</a></div></div>";
                }
                document.getElementById("adminInfoR").innerHTML = html1;
                document.getElementById("noadminExcited").style.display = "none";
                document.getElementById("adminExcited").style.display = "block";
            }
        }
    };
}
//#endregion

//#region Delete Admin Account
function deleteAdmin(a) {
    var username = a;
    $('#areUsure').modal('show');

    document.getElementById("confirmDelete").addEventListener("click", del);

    function del() {
        $('#areUsure').modal('hide');
        $.ajax({
            url: "../../dataManagment/server.php",
            method: "POST",
            data: { username: username, deletedAdmin: 'deletedAdmin' },
            success: function(res) {
                admin();
            },
        });
    };



}
//#endregion

//#region Change admin position
function changePosition(a) {
    var u = a;
    $('#position').modal('show');
    document.getElementById("changePosition").addEventListener("click", change);

    function change() {
        $('#position').modal('hide');

        var position = $("input:radio[name=option]:checked").val()
        $.ajax({
            url: "../../dataManagment/server.php",
            method: "POST",
            data: { u: u, position: position, changePosition: 'changePosition' },
            success: function(res) {
                window.location.reload(true);

            },
        });
    }

}
//#endregion

//#region Show pending orders
function pendingOrders() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?pendingOrdersRetrieve=pendingOrdersRetrieve";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var Orders = JSON.parse(this.responseText);
            var Order = Orders.Order;
            var CountO = Orders.CountO;
            var CountP = Orders.CountP;
            var html1 = "";
            if (Order.length == 0) {
                document.getElementById("nopendingOrdersExcited").style.display = "inline-flex";
                document.getElementById("pendingOrdersExcited").style.display = "none";
            } else {
                for (var a = 0; a < Order.length; a++) {
                    var dateofOrder = Order[a].date_of_order;
                    var totalCost = Order[a].total_cost;
                    var orderId = Order[a].order_id;
                    var cust_user = Order[a].username;
                    var numO = CountO[0]['COUNT(*)'];
                    var numP = CountP[0]['COUNT(*)'];

                    html1 += `  
                 <div class='row row-md'>
               <div class='col orderInfo'>` + dateofOrder + `</div>
                <div class='col orderInfo'>` + totalCost + `</div>
                <div class='col orderInfo'>` + cust_user + `</div>
                 <div class='col orderInfo'><a id='` + orderId + `' data-toggle='modal' data-target='#showMyOrder' onClick='showOrderedItems(event)' type='button' class='btn btn-primary custom-btn blueB'>Show</a></div>
                 <div class='col adminInfo buttonBox'><a name='` + orderId + `' onClick='approveOrder(this.name)' type='button' class='btn btn-success custom-btn greenB'>Approve</a><a name='` + orderId + `' onClick='rejectOrder(this.name)' type='button' class='btn btn-danger custom-btn redB'>Reject</a></div>
                </div>
                 
                 `

                    html2 = `
            <p id='CountOP'>Number of uncomplete orders is ` + numO + ` (` + numP + ` Products)<p>
            `
                }


                document.getElementById("pOrders").innerHTML = html1;
                document.getElementById('Count').innerHTML = html2;
                document.getElementById("nopendingOrdersExcited").style.display = "none";
                document.getElementById("pendingOrdersExcited").style.display = "block";
            }




        }
    };
}
//#endregion

//#region Approve order from the subadmin
function approveOrder(a) {
    var u = a;

    $.ajax({
        url: "../../dataManagment/server.php",
        method: "POST",
        data: { u: u, approveOrder: 'approveOrder' },
        success: function(res) {
            pendingOrders();
            $('#orderApproved').modal('show');
        },
    });
}
//#endregion

//#region Reject order from the subadmin

function rejectOrder(a) {
    var u = a;
    $.ajax({
        url: "../../dataManagment/server.php",
        method: "POST",
        data: { u: u, rejectOrder: 'rejectOrder' },
        success: function(res) {
            pendingOrders();
            $('#orderRejected').modal('show');
        },
    });
}
//#endregion

//#region Show the items of the order 

function showOrderedItems(e) {
    var id = e.target.id;
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?id=" + id + "&showOrderItems=showOrderItems";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            var items = JSON.parse(this.responseText);
            var item = items.item;
            var html1 = "";
            for (var a = 0; a < item.length; a++) {
                var type = item[a].type;
                var size = item[a].size;
                var color = item[a].color;
                var price = item[a].price;
                var pocketSticker = item[a].pocket_sticker;
                var frontSticker = item[a].front_sticker;
                var backSticker = item[a].back_sticker;
                var returns = item[a].returns
                var url = identifyShirt(type, color);
                html1 +=
                    "<div class='container orderContainer'><div class='row'><div class='col-3 orderItem'><img src='" +
                    url +
                    "' width='90px'>";
                html1 +=
                    " </div><div class='col-5 orderItem'><div class='container'><div class='row'><div class='col'><div class='row'></div><div class='row'><p class='cartText'>POCKET</p></div>";
                html1 +=
                    " <div class='row'><img src='" +
                    pocketSticker +
                    "' alt='Empty'  width='30px'></div></div>";
                html1 +=
                    " <div class='col'><div class='row'><p class='cartText'>FRONT</p></div><div class='row'><img src='" +
                    frontSticker +
                    "' alt='Empty'  width='30px'></div>";
                html1 +=
                    " </div><div class='col'><div class='row'><p class='cartText'>BACK</p></div><div class='row'><img src='" +
                    backSticker +
                    "' alt='Empty'  width='30px'>";
                html1 +=
                    " </div></div></div></div></div><div class='col-4 orderText'><h4 id='cartProductHeader'>" +
                    type +
                    "</h4><p><span style='font-weight:bold;'>Size: </span>" +
                    size +
                    "<br /><span style='font-weight:bold;'>Price: </span>" +
                    price +
                    "$</br><span style='font-weight:bold;'>Status: </span>" + returns + " </p></div>";
                html1 += "</div></div>";
                html1 += "<br/>";
            }
            document.getElementById("showDrop2").innerHTML = html1;
        }



    }
};

//#endregion

//#region Show approved orders
function pendingOrdersRequests() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?pendingOrdersRequests=pendingOrdersRequests";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var OrdersRequests = JSON.parse(this.responseText);
            var OrderRequest = OrdersRequests.OrderRequest;
            var html1 = "";
            if (OrderRequest.length == 0) {
                document.getElementById("nopendingOrdersRequests").style.display = "inline-flex";
                document.getElementById("pendingOrdersRequests").style.display = "none";
            } else {
                for (var a = 0; a < OrderRequest.length; a++) {
                    var dateofOrder = OrderRequest[a].date_of_order;
                    var totalCost = OrderRequest[a].total_cost;
                    var orderId = OrderRequest[a].order_id;
                    var cust_user = OrderRequest[a].username;
                    var manufacture_status = OrderRequest[a].manufacture_status;
                    console.log(manufacture_status);
                    if (manufacture_status == 'Approved') {
                        html1 += `  
                 <div class='row row-md'>
               <div class='col orderInfo'>` + dateofOrder + `</div>
                <div class='col orderInfo'>` + totalCost + `</div>
                <div class='col orderInfo'>` + cust_user + `</div>
                 <div class='col orderInfo'><a id='` + orderId + `' data-toggle='modal' data-target='#showMyOrder2' onClick='showOrderedItemRequests(event)'  type='button' class='btn btn-primary custom-btn blueB'>Show</a></div>
                 <div id='divOfStartFactory' class='col adminInfo buttonBox'><a name='` + orderId + `'  type='button' onclick='startFactory(this.name)' class='btn btn-success custom-btn greenB'>Start</a></div>
                </div>
                 
                 `


                    }
                    if (manufacture_status == 'Manufacturing...') {

                        html1 += `  
                 <div class='row row-md'>
               <div class='col orderInfo'>` + dateofOrder + `</div>
                <div class='col orderInfo'>` + totalCost + `</div>
                <div class='col orderInfo'>` + cust_user + `</div>
                 <div class='col orderInfo'><a id='` + orderId + `' data-toggle='modal' data-target='#showMyOrder2' onClick='showOrderedItemRequests(event)'  type='button' class='btn btn-primary custom-btn blueB'>Show</a></div>
                  <div id='divOfFinishedFactory' class='col adminInfo buttonBox'><a name='` + orderId + `' type='button'  onclick='finishFactory(this.name)' class='btn btn-danger custom-btn redB'>Finished</a></div>
                </div>
                 
                 `



                    }



                    document.getElementById("pOrdersRequests").innerHTML = html1;
                    document.getElementById("nopendingOrdersRequests").style.display = "none";
                    document.getElementById("pendingOrdersRequests").style.display = "block";
                }




            }
        };
    }
}
//#endregion

//#region Show orders requests in the factory account
function showOrderedItemRequests(e) {

    var id = e.target.id;

    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?id=" + id + "&showOrderItemsRequests=showOrderItemsRequests";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            var items = JSON.parse(this.responseText);
            var item = items.item;
            var html1 = "";
            for (var a = 0; a < item.length; a++) {
                var type = item[a].type;
                var size = item[a].size;
                var color = item[a].color;
                var price = item[a].price;
                var pocketSticker = item[a].pocket_sticker;
                var frontSticker = item[a].front_sticker;
                var backSticker = item[a].back_sticker;
                var returns = item[a].returns
                var url = identifyShirt(type, color);
                html1 +=
                    "<div class='container orderContainer'><div class='row'><div class='col-3 orderItem'><img src='" +
                    url +
                    "' width='90px'>";
                html1 +=
                    " </div><div class='col-5 orderItem'><div class='container'><div class='row'><div class='col'><div class='row'></div><div class='row'><p class='cartText'>POCKET</p></div>";
                html1 +=
                    " <div class='row'><img src='" +
                    pocketSticker +
                    "' alt='Empty'  width='30px'></div></div>";
                html1 +=
                    " <div class='col'><div class='row'><p class='cartText'>FRONT</p></div><div class='row'><img src='" +
                    frontSticker +
                    "' alt='Empty'  width='30px'></div>";
                html1 +=
                    " </div><div class='col'><div class='row'><p class='cartText'>BACK</p></div><div class='row'><img src='" +
                    backSticker +
                    "' alt='Empty'  width='30px'>";
                html1 +=
                    " </div></div></div></div></div><div class='col-4 orderText'><h4 id='cartProductHeader'>" +
                    type +
                    "</h4><p><span style='font-weight:bold;'>Size: </span>" +
                    size +
                    "<br /><span style='font-weight:bold;'>Price: </span>" +
                    price +
                    "$</br><span style='font-weight:bold;'>Status: </span>" + returns + " </p></div>";
                html1 += "</div></div>";
                html1 += "<br/>";

            }
            document.getElementById("showDrop3").innerHTML = html1;
        }

    }

}
//#endregion

//#region Onclick start manufacturing
function startFactory(a) {
    var u = a;

    $.ajax({
        url: "../../dataManagment/server.php",
        method: "POST",
        data: { u: u, startFactory: 'startFactory' },
        success: function(res) {
            pendingOrdersRequests();
            $('#startFactory').modal('show');
            document.getElementById('divOfStartFactory').style.display = 'none';
            document.getElementById('divOfFinishedFactory').style.display = 'flex';
        },
    });
}
//#endregion

//#region Onclick finish manufacturing
function finishFactory(a) {
    var u = a;

    $.ajax({
        url: "../../dataManagment/server.php",
        method: "POST",
        data: { u: u, finishFactory: 'finishFactory' },
        success: function(res) {
            pendingOrdersRequests();
            $('#finishFactory').modal('show');
        },
    });
}
//#endregion

//#region OnClick show all orders in the manufacture
function showAllOrders() {

    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?showAllOrders=showAllOrders";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            var items = JSON.parse(this.responseText);
            var item = items.item;
            var html1 = "";
            for (var a = 0; a < item.length; a++) {
                var type = item[a].type;
                var size = item[a].size;
                var color = item[a].color;
                var price = item[a].price;
                var pocketSticker = item[a].pocket_sticker;
                var frontSticker = item[a].front_sticker;
                var backSticker = item[a].back_sticker;
                var returns = item[a].returns
                var url = identifyShirt(type, color);

                html1 +=
                    "<div name='forPrint' class='container orderContainer'><div class='row'><div class='col-3 orderItem'><img src='" +
                    url +
                    "' width='90px'>";
                html1 +=
                    " </div><div class='col-5 orderItem'><div class='container'><div class='row'><div class='col'><div class='row'></div><div class='row'><p class='cartText'>POCKET</p></div>";
                html1 +=
                    " <div class='row'><img src='" +
                    pocketSticker +
                    "' alt='Empty'  width='30px'></div></div>";
                html1 +=
                    " <div class='col'><div class='row'><p class='cartText'>FRONT</p></div><div class='row'><img src='" +
                    frontSticker +
                    "' alt='Empty'  width='30px'></div>";
                html1 +=
                    " </div><div class='col'><div class='row'><p class='cartText'>BACK</p></div><div class='row'><img src='" +
                    backSticker +
                    "' alt='Empty'  width='30px'>";
                html1 +=
                    " </div></div></div></div></div><div class='col-4 orderText'><h4 id='cartProductHeader'>" +
                    type +
                    "</h4><p><span style='font-weight:bold;'>Size: </span>" +
                    size +
                    "<br /><span style='font-weight:bold;'>Price: </span>" +
                    price +
                    "$</br><span style='font-weight:bold;'>Status: </span>" + returns + " </p></div>";
                html1 += "</div></div>";
                html1 += "<br/>";

            }
            document.getElementById("showDrop3").innerHTML = html1;
        }



    }
}
//#endregion

//#region Onclick print button in the manufacture account
function print() {

    var printdata = document.getElementById('showMyOrder2');

    newwin = window.open("", "", "width=1000,height=1000");
    newwin.document.write(printdata.outerHTML);
    newwin.print();
    newwin.close();

}
//#endregion

//#region Show completed orders in the delivery account
function completedOrdersForDelivery() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?completedOrdersForDelivery=completedOrdersForDelivery";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {



        }

    }
}
//#endregion


function startDelivery() {


    var locationSelect = document.getElementById("chosenLocation");
    var chosenLocation = locationSelect.options[locationSelect.selectedIndex].value;
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?startDelivery=startDelivery&chosenLocation=" + chosenLocation;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            onloadDelivery();

        }

    }

}


function showOrdersDelivery() {
    document.getElementById('showOrdersDelivery').innerHTML = " ";
    var locationSelect = document.getElementById("chosenLocation");
    var chosenLocation = locationSelect.options[locationSelect.selectedIndex].value;
    var html1 = '';
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?showOrdersDelivery=showOrdersDelivery&chosenLocation=" + chosenLocation;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            var ordersForSpecificLocation = JSON.parse(this.responseText);
            var orderForSpecificLocation = ordersForSpecificLocation.orderForSpecificLocation;


            if (orderForSpecificLocation == 'Empty') {


            } else {
                for (var a = 0; a < orderForSpecificLocation.length; a++) {

                    var order_id = orderForSpecificLocation[a].order_id;
                    var firstName = orderForSpecificLocation[a].firstname;
                    var lastName = orderForSpecificLocation[a].lastname;
                    var phone = orderForSpecificLocation[a].phone;
                    var city = orderForSpecificLocation[a].city;
                    var address = orderForSpecificLocation[a].address;
                    var totalCost = orderForSpecificLocation[a].total_cost;
                    var dateOfOrder = orderForSpecificLocation[a].date_of_order;


                    if (city == chosenLocation) {


                        html1 += `
                    
                   <div class="row">
 <div class="col colOfShowOrdersDelivery">
                ${order_id}
                 </div>
                 <div class="col colOfShowOrdersDelivery">
                ${dateOfOrder}
                 </div>
                 <div class="col colOfShowOrdersDelivery">
${firstName} ${lastName}
             </div>
            <div class="col colOfShowOrdersDelivery">
${phone}
                </div>
                    <div class="col colOfShowOrdersDelivery">
${city}

                 </div>
                 <div class="col colOfShowOrdersDelivery">
${address}
                </div>
                  <div class="col colOfShowOrdersDelivery">
    ${totalCost}
                  </div>
  
                </div>
                </br>
                    `



                    }


                }

                document.getElementById('showOrdersDelivery').innerHTML = html1;

            }





        }

    }




}

function onloadDelivery() {

    var locationSelect = document.getElementById("chosenLocation");
    var chosenLocation = locationSelect.options[locationSelect.selectedIndex].value;
    var html2 = ' ';
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?onloadDelivery=onloadDelivery&chosenLocation=" + chosenLocation;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

            var onloadDelivery = JSON.parse(this.responseText);
            var deliveryOrderReady = onloadDelivery.deliveryOrderReady;
            var deliveryingOrder = onloadDelivery.deliveryingOrder;

            var inTyre = 0;
            var inBintJbeil = 0;
            var inSaida = 0;
            var inBeirut = 0;
            var inNabatieh = 0;
            var inJounieh = 0;
            var inByblos = 0;
            var inTripoli = 0;
            var inAkkar = 0;
            var inBaalbeak = 0;
            var inBekaa = 0;




            if (deliveryOrderReady == 'Empty') {

                document.getElementById("inTyre").innerHTML = inTyre;
                document.getElementById("inBintJbeil").innerHTML = inBintJbeil;
                document.getElementById("inSaida").innerHTML = inSaida;
                document.getElementById("inBeirut").innerHTML = inBeirut;
                document.getElementById("inNabatieh").innerHTML = inNabatieh;
                document.getElementById("inJounieh").innerHTML = inJounieh;
                document.getElementById("inByblos").innerHTML = inByblos;
                document.getElementById("inTripoli").innerHTML = inTripoli;
                document.getElementById("inAkkar").innerHTML = inAkkar;
                document.getElementById("inBaalbeak").innerHTML = inBaalbeak;
                document.getElementById("inBekaa").innerHTML = inBekaa;

            } else {




                for (var a = 0; a < deliveryOrderReady.length; a++) {

                    var city = deliveryOrderReady[a].city;

                    switch (city) {

                        case 'tyre':
                            inTyre++;
                            break;
                        case 'bintJbeil':
                            inBintJbeil++;
                            break;
                        case 'saida':
                            inSaida++;
                            break;
                        case 'beirut':
                            inBeirut++;
                            break;
                        case 'nabatieh':
                            inNabatieh++;
                            break;
                        case 'jounieh':
                            inJounieh++;
                            break;
                        case 'byblos':
                            inByblos++;
                            break;
                        case 'tripoli':
                            inTripoli++;
                            break;
                        case 'akkar':
                            inAkkar++;
                            break;
                        case 'baalbeck':
                            inBaalbeak++;
                            break;
                        case 'bekaa':
                            inBekaa++;
                            break;


                    }



                }

                document.getElementById("inTyre").innerHTML = inTyre;
                document.getElementById("inBintJbeil").innerHTML = inBintJbeil;
                document.getElementById("inSaida").innerHTML = inSaida;
                document.getElementById("inBeirut").innerHTML = inBeirut;
                document.getElementById("inNabatieh").innerHTML = inNabatieh;
                document.getElementById("inJounieh").innerHTML = inJounieh;
                document.getElementById("inByblos").innerHTML = inByblos;
                document.getElementById("inTripoli").innerHTML = inTripoli;
                document.getElementById("inAkkar").innerHTML = inAkkar;
                document.getElementById("inBaalbeak").innerHTML = inBaalbeak;
                document.getElementById("inBekaa").innerHTML = inBekaa;


            }






            if (deliveryingOrder == 'Empty') {



            } else {

                for (var a = 0; a < deliveryingOrder.length; a++) {

                    var order_id = deliveryingOrder[a].order_id;
                    var city = deliveryingOrder[a].city;

                    html2 += `
                
                    <div class="row">
  <div class="col">
    <div id="onDeliveryOrdersContainer">
      <div class="row">
        <div class="col ColOfOnDelivery">
          ${order_id}
        </div>
        <div class="col ColOfOnDelivery">

          ${city}
        </div>
        <div class="col ColOfOnDelivery">
          <div class='row'>
         
 <select name='${order_id}'  onchange="chosenOption(this.name)" id="${order_id}" class="custom-select custom-select-sm selectOptionInDelivery ">
                                                <option value="selectOption">Select Option</option>
                                                <option value="show">Show</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="returned">Returned</option>
                                               
                                            </select>

          </div>




        </div>


      </div>
    </div>
  </div>
</div>
                
                
                `

                }


            }

            document.getElementById('pushInfoDeliverying').innerHTML = html2;




        }





    }
}

function chosenOption(order_id) {

    var optionSelect = document.getElementById(order_id);
    var chosenOption = optionSelect.options[optionSelect.selectedIndex].value;

    switch (chosenOption) {
        case 'show':
            orderInformation(order_id);
            $('#orderInfoModal').modal('show');
            break;

        case 'delivered':
            orderDelivered(order_id);
            break;

        case 'returned':
            orderReturned(order_id);
            break;

    }


    optionSelect.selectedIndex = 0;

}

function orderInformation(order_id) {

    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?orderInformation=orderInformation&orderId=" + order_id;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {


            var orderInformation = JSON.parse(this.responseText);
            var orderInformationn = orderInformation.orderInformationn;
            var html1 = '';

            if (orderInformationn == 'Empty') {


            } else {
                for (var a = 0; a < orderInformationn.length; a++) {

                    var order_id = orderInformationn[a].order_id;
                    var firstName = orderInformationn[a].firstname;
                    var lastName = orderInformationn[a].lastname;
                    var phone = orderInformationn[a].phone;
                    var city = orderInformationn[a].city;
                    var address = orderInformationn[a].address;
                    var totalCost = orderInformationn[a].total_cost;
                    var dateOfOrder = orderInformationn[a].date_of_order;


                    html1 += `
                    
                   <div class="row">
 <div class="col colOfShowOrdersDelivery">
                ${order_id}
                 </div>
                 <div class="col colOfShowOrdersDelivery">
                ${dateOfOrder}
                 </div>
                 <div class="col colOfShowOrdersDelivery">
${firstName} ${lastName}
             </div>
            <div class="col colOfShowOrdersDelivery">
${phone}
                </div>
                    <div class="col colOfShowOrdersDelivery">
${city}

                 </div>
                 <div class="col colOfShowOrdersDelivery">
${address}
                </div>
                  <div class="col colOfShowOrdersDelivery">
    ${totalCost}
                  </div>
  
                </div>
                </br>
                    `






                }

                document.getElementById('orderInformation').innerHTML = html1;

            }







        }
    }

}

function orderDelivered(order_id) {

    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?orderDelivered=orderDelivered&orderId=" + order_id;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            onloadDelivery();
            $('#deliveredDone').modal('show');
        }

    }

}

function orderReturned(order_id) {

    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "../../dataManagment/server.php?orderReturned=orderReturned&orderId=" + order_id;
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            onloadDelivery();
            $('#orderReturned').modal('show');
        }

    }

}