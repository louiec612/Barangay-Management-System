<?php
require('connect.php');
$result = mysqli_query($con,"SELECT * FROM resident_information");
$rowcount= mysqli_num_rows($result);
echo $rowcount;

if(isset($_POST['submit']))
{
    $firstName=$_POST['firstName'];
    $middleName = $_POST ['middleName'];
    $lastName = $_POST ['lastName'];
    $gender =$_POST['gender'];
    $civilStatus = $_POST['civilStatus'];
    $birthday = $_POST['date'];
    $contactNumber = $_POST['contactNumber'];
    $purok = $_POST['purok'];
    $street = $_POST['street'];
    $houseNumber = $_POST['houseNumber'];
    $voteRegister = $_POST['voteRegister'];
    $sql = "INSERT INTO resident_information (firstName, middleName, lastName, gender, civilStatus, birthday, contactNumber, purok, street, houseNumber,voteRegister)
    VALUES ('$firstName', '$middleName', '$lastName', '$gender', '$civilStatus', '$birthday', '$contactNumber', '$purok', '$street', '$houseNumber','$voteRegister')";
   
    
    mysqli_query($con, $sql);
    echo
    "
    <script>alert('Data is inserted successfully');</script>
    ";
}

$query = "SELECT *, CONCAT(firstName, ' ', lastName) AS FIRSTNAME FROM resident_information";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident Info</title>
    <link defer rel="stylesheet" href="STYLES\stylemain.css">
    <link defer rel="stylesheet" href="STYLES\styleresin.css">
    <link rel="stylesheet" href="STYLES\styleform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link defer rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>

    
<body onload="checkDropdown();">
    <div class="sidebar shadow">
        <div style="font-weight: 800; text-align: center; margin-top: 60px;">Bilis-Barangay Management System</div>
        <div class="gap"></div>
            <ul class="main">
                <li>
                    <a href="index.php" class="btns">
                        <img src="ICONS\house.svg"width="20px"/>
                        Dashboard
                    </a>
                <hr class="mt-2 mb-3"> 
                <p class="menu">Processes</p>
                </li>
                <li class="dropdown mouseenter" >
                    <a href="#" class="dropdown_link btns" onclick="showDocuments()">
                        <img src="ICONS\file-earmark-richtext.svg" width="20px" />
                        <p class="m-0">Documents<i id="icon" class="m-2"></i></p>
                    </a>
                    <ul class="dropdown_menu" id="dropdown_menu" >
                        <li class="dropdown_item"><a href="#" id="bgyCert">Barangay</a></li>
                        <li class="dropdown_item"><a href="#" id="indCert">Certificate of Indigency</a></li>
                        <li class="dropdown_item"><a href="#" id="bsnPerm">Business Permit</a></li>
                        <li class="dropdown_item"><a href="#" id="blot">Blotter</a></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="records.php"  class="btns">
                        <img src="ICONS\list-ol.svg" width="20px"/>
                        Transactions
                    </a>
                </li>
                <li class="active">
                    <a href="#"  class="btns shadow1">
                        <img src="ICONS\person-lines-fill.svg" width="20px"/>
                        Residents
                    </a>
                </li>
                <hr class="mt-2 mb-3"> 
                <li id="logout">
                    <a href="login.html" class="btns">
                        <img src="ICONS\box-arrow-right.svg" width="20px"/>
                        Logout
                    </a>
                </li>

            </ul>  
    </div>

<div class="vr"></div>
<section class="mainsection d-flex align-items-center">
    <div class="container">
        <div class="resContent">
            <header id="hRes">List of Residents</header>
            <br>
            <div class="functions">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addResident">Add</button>
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
            <br>
            
            <div class="tableContainer">
                    <table id="example"class="table table-hover">
                        <thead class="table-dark" style="position: sticky; top: 0%;z-index: 1000">
                            <tr>
                                <th>Resident No.</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th class="text-center" style="width:200px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <?php
                                    
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        ?>
                                        <td><?php echo $row['residentNo'] ?></td>
                                        <td><?php echo $row['FIRSTNAME'] ?></td>
                                        <td><?php echo $row['gender'] ?></td>
                                        <td><?php echo $row['birthday'] ?></td>
                                        <td class="text-center"><button class="btnView" data-bs-toggle="modal" data-bs-target="#bgyCertificate">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                                    <?php
                                    }
                                ?> 
                        </tbody>
                    </table>
                    
                        <div id="pagination"></div>
                      
            </div>
            
            
        </div>    
    </div>
</section>

<div name="modals">
    <!------------- BRGY CERTIFICATE --------------->
    <div class="modal fade " id="bgyCertificate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Barangay Certificate</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <!------------- CERTIFICATE OF INDIGENCY --------------->
    <div class="modal fade " id="indCertificate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Certificate of Indigency</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <!------------- BUSINESS PERMIT --------------->
    <div class="modal fade " id="bsnPermit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Business Permit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <!------------- BLOTTER --------------->
    <div class="modal fade " id="blotter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Blotter</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
    <!-- ADD RESIDENT -->
    <div class="modal fade " id="addResident" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered" style="min-width:1000px;">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Resident</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-inline-flex align-items-start">
                <form action="residentinfo.php" method="post">
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <input type="text" placeholder="First Name" class="form-control" name="firstName">
                        </div>  
                        <div class="col-auto">
                            <input type="text" placeholder="Middle Name" class="form-control" name="middleName">
                        </div>
                        <div class="col-auto">
                            <input type="text" placeholder="Last Name" class="form-control" name="lastName">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <select class="form-control" id="gender" style="width: 106px;" name="gender">
                                <option value="" selected></option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>   
                        <div class="col-auto">
                            <select class="form-control" id="civilStatus" style="width: 156px;" name="civilStatus">
                                <option value="" selected></option>
                                <option>Single</option>
                                <option>Married</option>
                                <option>Widow</option>
                                <option>Seperated</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control" name="date">
                        </div>
                        <div class="col-auto" style="width: 190px;">
                            <input type="text" class="form-control" placeholder="Contact Number" name="contactNumber">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <input type="text" placeholder="Purok" class="form-control" name="purok">
                        </div>  
                        <div class="col-auto">
                            <input type="text" placeholder="House Number" class="form-control" name="houseNumber">
                        </div>
                        <div class="col-auto">
                            <input type="text" placeholder="Street" class="form-control" name="street">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                        <select class="form-control" id="voteRegister" style="width: 156px;" name="voteRegister">
                                <option value="" selected></option>
                                <option>Voter</option>
                                <option>Non-voter</option>
                            </select>
                        </div>  
                        <div class="col-auto">
                            <input type="text" class="form-control" >
                        </div>
                        <div class="col-auto">
                            <input type="text" placeholder="Street" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn" style="background-color: #ff6961; color:white;">Add Resident</button>
                    </div>
                </form>
                <div class="col-auto" style="width: 206px;">
                    <div class="col-auto">
                        <img id="img" class="object-fit-contain"></img>
                    </div>
                    <div class="col-auto">
                        <input id="input" type="file" class="form-control form-control-sm" accept="image/*" onchange="file_changed()" >
                    </div>
                </div>
            </div>
                
                
            </div>
            
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="SCRIPTS/script.js"></script>
  <script>
    $(document).ready(function() {
        var res = document.getElementById('gender')
        $(res).select2({
            placeholder: "Gender",
            dropdownParent: $('#addResident'),
            minimumResultsForSearch: Infinity
        });
    });

    $(document).ready(function() {
        var res = document.getElementById('civilStatus')
        $(res).select2({
            placeholder: "Civil Status",
            dropdownParent: $('#addResident'),
            minimumResultsForSearch: Infinity
        });
    });

    </script>
</body>
</html>