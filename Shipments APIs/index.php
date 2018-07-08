
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>



<div class="container">
    <h2>1- Create a client that can consume different courier APIs, each API has different implementation/workflow, with the ability to add more couriers later without changing code implementation of the client</h2>


    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Create Shipment</a></li>
        <li><a data-toggle="tab" href="#menu1">Track Shipment</a></li>

    </ul>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
   <div class="panel panel-default">
        <div class="panel-heading">Create Shipment</div>
        <div class="panel-body">
            <div class="form-group form-group-search">

                <div class="col-sm-6">
                    <label >Sender Name</label>
                    <input   type="text" name="Sender_Name_TXT"   id="Sender_Name_TXT" class="form-control" required  />

                </div>


                <div class="col-sm-6">
                    <label>Sender Address</label>
                    <input   type="text" name="Sender_Address_TXT"   id="Sender_Address_TXT" class="form-control" required  />
                </div>
            </div>
            <div class="form-group form-group-search">

                <div class="col-sm-6">
                    <label >Reciver Name</label>
                    <input   type="text" name="Reciver_Name_TXT"   id="Reciver_Name_TXT" class="form-control" required   />

                </div>


                <div class="col-sm-6">
                    <label>Reciver Address</label>
                    <input   type="text" name="Reciver_Address_TXT"   id="Reciver_Address_TXT" class="form-control"  required />
                </div>
            </div>
            <div class="form-group form-group-search">

                <div class="col-sm-12">
                    <label >Shipment Details</label>
                    <textarea name="Details_TXT"   cols="50" rows="5" id="Details_TXT" class="form-control" ></textarea>

                </div>

            </div>

            <div id="Shipment_number" class="form-group form-group-search">

            </div>
        </div>
        <footer class="panel-footer">

            <button class="btn btn-primary" onClick="creatShipment(1)" id="submitButton1">Creat Shipment with API 1</button> |
            <button class="btn btn-danger" onClick="creatShipment(2)" id="submitButton2">Creat Shipment with API 2</button> |
            <button class="btn btn-success" onClick="creatShipment(3)" id="submitButton3">Creat Shipment with API 3</button>

        </footer>
    </div>
        </div>
        <div id="menu1" class="tab-pane fade">

            <div class="panel panel-default">
                <div class="panel-heading">Track Shipment</div>
                <div class="panel-body">
                    <div class="form-group form-group-search">

                        <div class="col-sm-6">
                            <label >Shipment Number</label>
                            <input   type="text" name="Shipment_num_TXT"   id="Shipment_num_TXT" class="form-control" required  />

                        </div>



                    </div>
                    <div id="Shipment" class="form-group form-group-search">

                    </div>

                </div>
                <footer class="panel-footer">

                    <button class="btn btn-primary" onClick="trackShipment()" id="submitButton">Track Shipment </button>

                </footer>
            </div>
        </div>
    </div>
</div>



<script>

    function creatShipment(api_type) {

        var sender_name=$("#Sender_Name_TXT").val();
        var sender_Address=$("#Sender_Address_TXT").val();
        var reciver_name=$("#Reciver_Name_TXT").val();
        var reciver_Address=$("#Reciver_Address_TXT").val();
        var details=$("#Details_TXT").val();
        $.post("API/client.php", { api_type: api_type,client_type:"create",
                sender_name: sender_name,sender_Address:sender_Address,
                reciver_name:reciver_name,reciver_Address:reciver_Address,
                details:details},

            function(data){
                data=data.trim();

                $("#Shipment_number").html("Your Ticket Number :"+data);


            });

    }

    function trackShipment() {

        var Shipment_num=$("#Shipment_num_TXT").val();

        $.post("API/client.php", {client_type:"Track",
                Shipment_num: Shipment_num},

            function(data){
                data=data.trim();

                  $("#Shipment").html(data);


            });

    }

</script>

</body>
</html>