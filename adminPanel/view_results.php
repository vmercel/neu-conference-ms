<?php
include('config.php');
if(!empty($_POST['setData'])){
    //$dataID = $_POST['dataID'];
    $table = $_POST['dataType'];
    echo"<script> alert(json_encode($table)); </script>";
}


$sthAR = mysqli_query($conn, "SELECT * from attendanceregister ");
$sthU = mysqli_query($conn, "SELECT * from users ");
$sthS = mysqli_query($conn, "SELECT * from conferencesessions ");
$sthC = mysqli_query($conn, "SELECT * from conferences ");

$rowsAR = array();
$rowsU = array();
$rowsS = array();
$rowsC = array();

while($r = mysqli_fetch_assoc($sthAR)) {
    $rowsAR[] = $r;
}

while($r = mysqli_fetch_assoc($sthU)) {
    $rowsU[] = $r;
}

while($r = mysqli_fetch_assoc($sthS)) {
    $rowsS[] = $r;
}

while($r = mysqli_fetch_assoc($sthC)) {
    $rowsC[] = $r;
}

?>


<script>
    function Sender() {
  table = $("#dataType").val();
  //contract.methods.setInfo (info).send( {from: account}).then( function(tx) { 
  console.log("Transaction: ", table);  
 // });
  
 // $("#GetdataID").val('');
 // $("#GetData").val('');
  addMultipleAttendance(table);
}


function Getter() {
  table = $("#GetdataType").val();
  uID = $("#GetdataID").val();
  //contract.methods.setInfo (info).send( {from: account}).then( function(tx) { 
    console.log("Transaction: ", table);  
 // });
  
 // $("#GetdataID").val('');
 // $("#GetData").val('');
 if(table==="users"){
     showAPersonByID(uID);
 }else if(table==="attendanceregister"){
    showAttendanceByUserID(uID);
 }else if(table==="conferences"){
     alert("Conference Data not Published Yet");
 }else if(table==="conferencesessions"){
     alert("Conference Sessions not Published Yet");
 }else {}
 
}
</script>



<?php
include('../settings/dbconfig.php');
if($_SESSION['status']=='admin'){}
else{
	echo "<div class=\"wrapper\" align=\"center\"> <h3>You have no right to view this page </h3> </div>";
	echo  "<br>";
	echo  "<div class=\"wrapper\" align=\"center\"> redirecting... </div>";
	header('Refresh: 0; URL=index.php');
	}
$page_title = "Marvel Solutions: Conference Management Dapp";
include('header.php');
include('side_bar.php');?>
		<div class="col-sm-12 main">
			<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6"><h1>Interacting with Blockchain Data</h1></div>
				<div class="col-xs-6"><h1 class="pull-right"><span class="glyphicon glyphicon-book"></span></h1></div>
			</div>
			<hr/>


<script src='web3.min.js'></script>
    <div class="head">
        <!-- Head Section Start-->
        <div class="container">

            <!-- Row End-->



    <br >
    <button class="btn btn-primary" onclick="showAPersonByID();">Find Person By ID</button>
    <button class="btn btn-primary" onclick="showAttendanceByUserID();"> Fetch Info by UserID </button>
    <button class="btn btn-primary" onclick="showAllPersons();">Find Conference By ID</button>
    <button class="btn btn-primary" onclick="addMultipleAttendance();">Migrate Database to Blockchain</button>
    <button class="btn btn-primary" onclick="Sender();">Test</button>

    <div class="row">
      <div>
        <h3 class="sub-header">Read Data From Blockchain</h3>
        <form class="form-inline" role="form" >
          <div class="form-group">
            <table>
            <tr>
                <td><label for="dataType">Chose Data Table:</label> </td>
                <td>
                  
                  <select class="form-control" id ="dataType">
                      <option> --- Select type of data --- </option>
                      <option value="users">Users</option>
                      <option value="conferences"> Conferences </option>
                      <option value="conferencesessions"> Sessions </option>
                      <option value="attendanceregister"> Attendance Register </option>
                  </select>
                </td>                          
              </tr>

              <tr>             
                <td>
                  <button type="submit" name="setData" id="setData" onclick="Sender();" class="btn btn-primary">Add Data to Blockchain </button>
                </td>                          
              </tr>
            </table>
          </div>
         
        </form>
      </div>
    </div>   


    <div class="row">
      <div>
        <h3 class="sub-header">Migrate Database to Blockchain</h3>
        <form class="form-inline" role="form" >
          <div class="form-group">
            <table>
            <tr>
                <td><label for="GetdataType">Data Type:</label> </td>
                <td>
                  
                  <select class="form-control" id ="GetdataType">
                      <option> --- Select type of data --- </option>
                      <option value="users"> Users</option>
                      <option value="conferences"> Conferences </option>
                      <option value="conferencesession"> Sessions </option>
                      <option value="attendanceregister"> Attendance Register </option>
                  </select>
                </td>                          
              </tr>
              <tr>
                <td><label for="GetdataID">ID:</label> </td>
                <td>
                  <input class="form-control" id="GetdataID">
                </td>                          
              </tr>
              <tr>
                
                <td>
                  <button type="submit" name="GetData" id="GetData" onclick="Getter();" class="btn btn-primary">Fetch Data From Blockchain </button>
                </td>                          
              </tr>
            </table>
          </div>
         
        </form>
      </div>
    </div>   




    <br /><br />
 	<div class="col-md-6 col-sm-12 mockup">
	Status: <span id="status">Loading...</span>
	</div>


 



            <!-- <div class="row">
                <div class="col-md-6 col-sm-12 main-content">
                    <h1 class="funnytext">NEU Conference App</h1>
                    <p> This is a project developed in the AI and IoT research unit of the Faculty of Engineering, of Near East University</p>

                    showAttendanceByUserID()
                    <button type="button" class="btn btn-default home-btn" onclick="document.getElementById('modalForm').style.display='block'" style="width:auto;">My Conferences</button>
                    
                    <button type="button" class="btn btn-default home-btn" onclick="document.getElementById('id01').style.display='block'">Login</button>
                    <button type="button " class="btn btn-default home-btn " onclick="document.getElementById( 'addP').style.display='block' ">Add User</button>

                </div>

            </div> -->
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Head Section End -->




    <!-- scripts starts here-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js "></script>
    <script src="js/bootstrap.min.js "></script>
    <!-- scripts end here-->

 

    <div id="id01" class="modal">

        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
                <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>

    <style>
    @media screen and (min-width: 676px) {
        .modal-content {
          max-width: 600px; /* New width for default modal */
        }
    }
</style>
    <div id="addP" class="modal">

        <form class="modal-content animate" action="/"  method="post" id="addPForm">
            <div class="imgcontainer">
                <span onclick="document.getElementById('addP').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="images/logo.png" alt="Avatar" class="avatar">
            </div>

            <div class="containerr">
                <label for="uname"><b>Username</b></label>
                <input type="number" placeholder="Enter UserID" name="userID" id="userID" required>
<br>
                <label for="psw"><b>Password</b></label>
                <input type="text" placeholder="Enter FullName" name="fName" id="fName">
<br>
                <label for="uname"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="pEmail" id="pEmail">
<br>
                <label for="psw"><b>Qualification</b></label>
                <input type="text" placeholder="Enter Password" name="pQualif" id="pQualif">
<br>
                <label for="psw"><b>Specialty</b></label>
                <input type="text" placeholder="Enter Specialty" name="pSpecialty" id="pSpecialty">
<br>
                <button type="submit">Add Person</button>

            </div>

            <div class=" containerr " style="background-color:#f1f1f1 ">
                <button type="button " onclick="document.getElementById( 'addP').style.display='none' " class="cancelbtn">Cancel</button>

            </div>
        </form>
    </div>





    <script>
        var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none ";
            }
        }

        var modalP = document.getElementById('addP');
        window.onclick = function(event) {
            if (event.target == modal) {
                modalP.style.display = "none ";
            }
        }
    </script>
    <script>
        //read in a form's data and convert it to a key:value object
        function getFormData(dom_query) {
            var out = {};
            var s_data = $(dom_query).serializeArray();
            //transform into simple data/value object
            for (var i = 0; i < s_data.length; i++) {
                var record = s_data[i];
                out[record.name] = record.value;
            }
            return out;
        }

        console.log(getFormData('#my-Form'));

        function getFormObj(formId) {
            var formParams = {};
            $('#' + formId).serializeArray().forEach(function(item) {
                if (formParams[item.name]) {
                    formParams[item.name] = [formParams[item.name]];
                    formParams[item.name].push(item.value)
                } else {
                    formParams[item.name] = item.value
                }
            });
            return formParams;
        }

        console.log(getFormObj('my-Form'));
    </script>
    <script>
        function formData() {
            var a = document.getElementById("userID ").value;
            var b = document.getElementById("fName ").value;
            var c = document.getElementById("lName ").value;
            var d = document.getElementById("pQualif ").value;
            var e = document.getElementById("pSpecialty ").value;
            var dataobj = [a,
                b,
                c,
                d,
                e
            ];
            return dataobj;
        }

        console.log(formData());
        alert(dataobj);
    </script>
    <script>
        $('#addPbutton').click(function() {
                var dataobj = {};
                var textFieldVal = $("#userID ").val();
                dataobj['fName'] = $("#fName ").val();
                dataobj['lName'] = $("#lName ").val();
                dataobj['pQualif'] = $("#pQualif ").val();
                dataobj['pSpecialty'] = $("#pSpecialty ").val();
                return dataobj;
                console.log(dataobj);
            }

        );
    </script>
    <!-- <script>$(document).ready(function() {
            $('#modalForm').modal( {
                backdrop: 'static', keyboard: false
            }
            ) $("#submit, #close ").click(function() {
                // Validation
                var form=$("#inputs ") if (form[0].checkValidity()===false) {
                    event.preventDefault() event.stopPropagation()
                }
                form.addClass('was-validated') //Declare and initialize variable for display inputs in div
                var code=" ";
                $("#inputs ").each(function() {
                    var text1=$(this).find("#firstname ").val();
                    var text2=$(this).find("#lastname ").val();
                    code +=text1 + " " + text2;
                }
                );
                $("#results ").html(code);
            }
            );
        }
        
        );
        </script>-->
    <script>
        // Attach a submit handler to the form
        $("#addPForm").submit(function(event) {

            // Stop form from submitting normally
            event.preventDefault();

            // Get some values from elements on the page:
            var $form = $(this),
                data = {};
            uIDv = $form.find("input[name='userID' ] ").val(),
                fNmv = $form.find("input[name='fName' ] ").val(),
                pEmv = $form.find("input[name='pEmail' ] ").val(),
                pQlv = $form.find("input[name='pQualif' ] ").val(),
                pSpv = $form.find("input[name='pSpecialty' ] ").val(),
                urlv = $form.attr("action ");
            data = {
                uID: uIDv,
                fNm: fNmv,
                lNm: pEmv,
                pQl: pQlv,
                pSp: pSpv
            }
            console.log(data);
            addPersonF(data);
            // Send the data using post
            $.ajax({
                type: "POST ",
                url: "view_results.php",

                success: function() {
                    addPersonF(data);
                },
                error: function() {
                   alert("Could not upload to the Blockchain");
                }
            });

            //function addPersonF(x) {}

            // Put the results in a div
            posting.done(function(data) {
                var content = $(data).find("#content ");
                $("#persons").empty().append(content);
            });
        });
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById('template');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none ";
            }
        }
    </script>






    <script type="text/javascript">
        async function loadWeb3() {
            if (window.ethereum) {
                window.web3 = new Web3(window.ethereum);
                window.ethereum.enable();
            }
        }

        async function loadContract() {
            return await new window.web3.eth.Contract([
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_userID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_confID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_sID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_presenter",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_pTitle",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_sDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_status",
				"type": "string"
			}
		],
		"name": "addAttendanceRecord",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_confID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_cTitle",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_cStartDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_cEndDate",
				"type": "string"
			}
		],
		"name": "addNewConference",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_pUID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_pFName",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_pEmail",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_pQualif",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_pSpecialty",
				"type": "string"
			}
		],
		"name": "addNewPerson",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "string",
				"name": "_sID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_sTitle",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_sStartDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_sEndDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "_sPresenter",
				"type": "string"
			}
		],
		"name": "addNewSession",
		"outputs": [],
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"inputs": [],
		"stateMutability": "nonpayable",
		"type": "constructor"
	},
	{
		"inputs": [],
		"name": "aCount",
		"outputs": [
			{
				"internalType": "int256",
				"name": "",
				"type": "int256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "int256",
				"name": "",
				"type": "int256"
			}
		],
		"name": "attendanceRegister",
		"outputs": [
			{
				"internalType": "int256",
				"name": "id",
				"type": "int256"
			},
			{
				"internalType": "string",
				"name": "userID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "confID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "sID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "presenter",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "pTitle",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "sDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "status",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "confCount",
		"outputs": [
			{
				"internalType": "int256",
				"name": "",
				"type": "int256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "int256",
				"name": "",
				"type": "int256"
			}
		],
		"name": "conferenceRecords",
		"outputs": [
			{
				"internalType": "int256",
				"name": "id",
				"type": "int256"
			},
			{
				"internalType": "string",
				"name": "confID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "cTitle",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "cStartDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "cEndDate",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "pCount",
		"outputs": [
			{
				"internalType": "int256",
				"name": "",
				"type": "int256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "int256",
				"name": "",
				"type": "int256"
			}
		],
		"name": "peopleRecords",
		"outputs": [
			{
				"internalType": "int256",
				"name": "pID",
				"type": "int256"
			},
			{
				"internalType": "string",
				"name": "pUID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "pFName",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "pEmail",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "pQualif",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "pSpecialty",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [],
		"name": "sCount",
		"outputs": [
			{
				"internalType": "int256",
				"name": "",
				"type": "int256"
			}
		],
		"stateMutability": "view",
		"type": "function"
	},
	{
		"inputs": [
			{
				"internalType": "int256",
				"name": "",
				"type": "int256"
			}
		],
		"name": "sessionRecords",
		"outputs": [
			{
				"internalType": "int256",
				"name": "id",
				"type": "int256"
			},
			{
				"internalType": "string",
				"name": "sID",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "sTitle",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "sStartDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "sEndDate",
				"type": "string"
			},
			{
				"internalType": "string",
				"name": "sPresenter",
				"type": "string"
			}
		],
		"stateMutability": "view",
		"type": "function"
	}
], '0x9799A3A36e7048ADfeF414D0a5d242177061BCaD');
        }

        async function printCoolNumber() {
            updateStatus('fetching Cool Number...');
            const coolNumber = await window.contract.methods.coolNumber().call();
            updateStatus(`coolNumber: ${coolNumber}`);
        }

        async function getCurrentAccount() {
            const accounts = await window.web3.eth.getAccounts();
            return accounts[0];
            r
        }

        async function changeCoolNumber() {
            const value = Math.floor(Math.random() * 100);
            updateStatus(`Updating coolNumber with ${value}`);
            const account = await getCurrentAccount();
            const coolNumber = await window.contract.methods.setCoolNumber(value).send({
                from: account
            });
            updateStatus('Updated.');
        }

        //adding Person
        async function addPerson(data) {
            //const value = (Math.random() + 1).toString(36).substring(7);
            //const count = Math.floor(Math.random() * 100);
            updateStatus(`Adding Person ${data.userName}`);
            const account = await getCurrentAccount();
            const aPerson = await window.contract.methods.addNewPerson(data.userID, data.userName, data.email, data.userQualification, data.specialty).send({
                from: account
            });
            updateStatus('Person Added.');
        }

        //ATTENDANCE RECORDS
        async function addAttendance(data) {
            //var data2 = {userID:"AA000371", conferenceID:"AIE223", sessionID: "AIE223-1", presenter: "John Doe", presentationTitle:"Introduction to Blockchain", date:"2021-03-05", status:"80%"}; 
            //const count = Math.floor(Math.random() * 100);
                        
            updateStatus(`Adding Attendance Record FOR ${data.userID}`);
            const account = await getCurrentAccount();
            const attend = await window.contract.methods.addAttendanceRecord(data.userID, data.conferenceID, data.sessionID, data.presenter, data.presentationTitle, data.date, data.status).send({
                from: account
            });
            updateStatus('New Row Added.');
        }

        async function addMultipleAttendance(table){
            if(table==="users"){
            var data = <?php echo json_encode($rowsU) ?>;
            var n = data.length;
            
                for (i = 0; i <= n-1; i++) {  
                addPerson(data[i]);
            }

            }else if(table==="conferences"){
            var data = <?php echo json_encode($rowsC) ?>;
            var n = data.length;
                for (i = 0; i <= n-1; i++) {  
                addConference(data[i]);
            }

            }else if(table==="conferencesessions"){
            var data = <?php echo json_encode($rowsC) ?>;
            var n = data.length;
                for (i = 0; i <= n-1; i++) {  
                addSession(data[i]);
            }

            }else if(table =="attendanceregister"){
            var data = <?php echo json_encode($rowsAR) ?>;
            var n = data.length;
                for (i = 0; i <= n-1; i++) {  
                addAttendance(data[i]);
            }
            }

        }

        //ADD PERSON FROM FORM
        async function addPersonF(data) {
	//var data = window.prompt("Enter Person's Data"+"<br>"+ "Format as: {uid: , fNm: , pEm:, pQl: , pSp: }");
 	//var data = {uID: 5, fNm: "Darian", qEm: "vmercel@marvel.com", pQl: "BSc", pSp: "Job Seeker"};
            updateStatus(`Adding Person ${data.fNm}`);
            const account = await getCurrentAccount();
            const aPerson = await window.contract.methods.addNewPerson(data.uID, data.fNm, data.fNm, data.pQl, data.pSp).send({
                from: account
            });
            updateStatus('Person Added.');
        }
        // show person
        async function showAPerson(uID) {
		//var uID = window.prompt("Enter Person's ID");
            updateStatus('fetching Person...');
            const aPerson = await window.contract.methods.peopleRecords([uID]).call();
		console.log(aPerson);
            updateStatus(`Person is: ${aPerson[0] +" "+ aPerson[1]+ " "+ aPerson[2]+ " "+ aPerson[3]+ " "+ aPerson[3]}`);
        }

        // show person by ID
        async function showAPersonByID(uID) {
		//var uID = window.prompt("Enter Person's ID");
		const n = await window.contract.methods.pCount().call();
		var siD = 'NULL';	
		for (i = 1; i <= n; i++) {
		const aPerson = await window.contract.methods.peopleRecords([i]).call();
		if(aPerson[1]===uID) {siD = i; console.log(siD);}}
        if(siD !=='NULL'){
		const aPerson2 = await window.contract.methods.peopleRecords([siD]).call();
            // updateStatus('fetching Person...');
            updateStatus(`Operation Success!: ${"<br> SN: " + "<strong>"+ aPerson2[0] +"</strong>" +"<br> UserID: "+ "<strong>"+ aPerson2[1]+"</strong>"+ "<br> User Name:  "+ "<strong>"+ aPerson2[2]+ "</strong>" +"<br> Email Address: "+"<strong>"+ aPerson2[3]+"</strong>"+ "<br> Qualification: "+ "<strong>"+aPerson2[4]+"</strong>"+ "<br> Specialty: "+ "<strong>"+aPerson2[5]+"</strong>"}`);
		}else{updateStatus('Person Not Found ...');}
        }

        // SHOW ATTENDANCE HISTORY BY USERID
        async function showAttendanceByUserID(uID) {
            showAPersonByID(uID);
		//var uID = window.prompt("Enter Person's userID");
		const n = await window.contract.methods.aCount().call();
		var siD = [];	
		for (i = 1; i <= n; i++) {
		const attendee = await window.contract.methods.attendanceRegister([i]).call();
		if(attendee[1]===uID) {siD.push(i); console.log(siD);}}
        if(siD.length !==0){

            var kk = " ";
            for (i = 0; i <= siD.length-1; i++) {
                var aPerson = await window.contract.methods.attendanceRegister([siD[i]]).call();
		console.log(aPerson);
                kk += " <br> <li> Row Number " +"<strong>"+ aPerson[0] +"</strong>"+ " <br> UserID:  " + "<strong>"+aPerson[1]+ "</strong>" + " <br> Conference ID: " +"<strong>"+ aPerson[2]+ "</strong>" + "<blockquote style='border:none'>" + "Session ID: " + "<strong>"+aPerson[3]+ "</strong>" + "<br> Presenter: " + "<strong>"+aPerson[4]+ "</strong>" + "<br> Presentation Title: " + "<strong>"+aPerson[5]+ "</strong>"+ "<br> Date: " + "<strong>"+aPerson[6]+ "</strong>"+ "<br> Attendance Rate: " + "<strong>"+aPerson[7]+ "</strong>"+ "</blockquote>" +" <br></li>"
            }
            var ppl = document.getElementById('status');
            ppl.innerHTML = kk;

        }
        }

        //show all persons
        async function showAllPersons() {
            const n = await window.contract.methods.pCount().call();
            var kk = " ";
            for (i = 1; i <= n; i++) {
                var aPerson = await window.contract.methods.peopleRecords([i]).call();
		console.log(aPerson);
                kk += " <br> <li> SN " + aPerson[0] + " <br> Name:  " + aPerson[1] + " <br> Email Address: " + aPerson[2] + "<br> Qualification: " + aPerson[3] + "<br> Specialty: " + aPerson[4] + " <br></li>"
            }
            var ppl = document.getElementById('status');
            ppl.innerHTML = kk;
        }

        async function load() {
            await loadWeb3();
            window.contract = await loadContract();
            updateStatus('Ready!');
        }

        function updateStatus(status) {
            const statusEl = document.getElementById('status');
            statusEl.innerHTML = status;
            console.log(status);
        }
        load();
    </script>



<?php
$bool = false;
$num = 3 + 4;
$str = "A string here";
?>


<script type="text/javascript">
// boolean outputs "" if false, "1" if true
var bool = <?php echo $bool ?>; 

// numeric value, both with and without quotes
var num = <?php echo $num ?>; // 7
console.log(num);
var str_num = <?php echo $num ?>; // "7" (a string)
console.log(str_num);

var str = <?php echo json_encode($rows[0]) ?>; // "A string here"
console.log(str);

function Sender() {
  table = $("#dataType").val();
  //contract.methods.setInfo (info).send( {from: account}).then( function(tx) { 
  console.log("Transaction: ", table);  
 // });
  
 // $("#GetdataID").val('');
 // $("#GetData").val('');
  //addMultipleAttendance(table);
}


function Getter() {
  table = $("#GetdataType").val();
  dID = $("#GetdataID").val();
  //contract.methods.setInfo (info).send( {from: account}).then( function(tx) { 
    console.log("Transaction: ", table);  
 // });
  
 // $("#GetdataID").val('');
 // $("#GetData").val('');
 // ShowMultipleAttendance(table);
}
</script>




<?php
include('footer.php');
?>