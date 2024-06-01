<?php
require('connect.php');
$recenttransacQuery = "SELECT *, CONCAT(firstName, ' ', lastName) AS FULLNAME FROM resident_information LIMIT 3";
$recenttransacResult = mysqli_query($con, $recenttransacQuery);


// Fetch all rows into an array to use them multiple times
$recenttransacRows = [];
while ($row = mysqli_fetch_assoc($recenttransacResult)) {
    $recenttransacRows[] = $row;
}


$residentQuery = "SELECT *, CONCAT(firstName, ' ', lastName) AS FULLNAME FROM resident_information";
$residentResult = mysqli_query($con, $residentQuery);


if (!$residentResult) {
    die('Query failed: ' . mysqli_error($con));
}

// Fetch all rows into an array to use them multiple times
$residentRows = [];
while ($row = mysqli_fetch_assoc($residentResult)) {
    $residentRows[] = $row;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="STYLES/stylemain.css">
    <link rel="stylesheet" href="STYLES/styleindex.css">
    <link rel="stylesheet" href="STYLES/styleform.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet"/>
</head>
<body onload="checkDropdown();loadTables();">
    
<div class="sidebar shadow">     
    <div style="font-weight: 800; text-align: center; margin-top: 60px;">Bilis-Barangay Management System</div>
    <div class="gap"></div>
        <ul class="main">
            <li class="active">
                <a href="#" class="btns shadow1">
                    <img src="ICONS/house.svg" width="20px" class="svgcolor"/>
                    Dashboard
                </a>
                <hr class="mt-2 mb-3"> 
                <p class="menu">Processes</p>
            </li>
            <li class="dropdown mouseenter" >
                <a href="#" class="dropdown_link btns" onclick="showDocuments()">
                    <img src="ICONS/file-earmark-richtext.svg" width="20px"/>
                    <p class="m-0">Documents<i id="icon" class="m-2"></i></p>
                </a>
                <ul class="dropdown_menu" id="dropdown_menu">
                    <li class="dropdown_item"><a href="#" data-bs-toggle="modal" data-bs-target="#bgyCertificate">Barangay Certificate</a></li>
                    <li class="dropdown_item"><a href="#" data-bs-toggle="modal" data-bs-target="#indCertificate">Certificate of Indigency</a></li>
                    <li class="dropdown_item"><a href="#" data-bs-toggle="modal" data-bs-target="#bsnPermit">Business Permit</a></li>
                    <li class="dropdown_item"><a href="#" data-bs-toggle="modal" data-bs-target="#blotter">Blotter</a></li>
                </ul>
            </li>
            <li>
                <a href="records.php"  class="btns">
                    <img src="ICONS/list-ol.svg" width="20px"/>
                    Transactions
                </a>
            </li>
            <li>
                <a href="residentinfo.php"  class="btns">
                    <img src="ICONS/person-lines-fill.svg" width="20px"/>
                    Residents
                </a>
            </li>
            
            <hr class="mt-2 mb-3"> 
            <li id="logout">
                <a href="login.html" class="btns">
                    <img src="ICONS/box-arrow-right.svg" width="20px"/>
                    Logout
                </a>
            </li>
        </ul>  
</div>
    
<div class="vr"></div>
<section class="mainsection d-flex align-items-center">
    <div class="container">
        <p>Main Dashboard</p>
        <div class="row gx-3">
            <div class="col-4">
                <div class="topStats">
                    <label>Population</label>
                    <p><?php echo $popcount?></p>
                </div>
            </div>
            <div class="col-4">
                <div class="topStats">
                    <label>Registered Voters</label>
                    <p><?php echo $votecount?></p>
                </div>
            </div>
            <div class="col-4">
                <div class="topStats">
                    <label>Transactions</label>
                    <div>asdasd</div>
                    <p><?php echo $malecount?></p>
                </div>
            </div>
        </div>
        <div class="row gx-3">
            <div class="col-8">
                <div class="midStats">
                    <canvas id="agePopulation"></canvas>
                </div>
            </div>
            <div class="col-4">
                <div class="midStats">
                    <canvas id="genderPopulation"></canvas>
                </div>
            </div>
        </div>
        <div class="row gx-3">
            <div class="col-8">
                <div class="botStats">
                    <div class="container">
                        <label>Recent Transactions</label>
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Transaction No.</th>
                                    <th>Name</th>
                                    <th>Document Type</th>
                                    <th>Transaction Date</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recenttransacRows as $row): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['residentNo']); ?></td>
                                        <td><?php echo htmlspecialchars($row['FULLNAME']); ?></td>
                                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                                        <td><?php echo htmlspecialchars($row['birthday']); ?></td>
                                        <td class="text-center">
                                            <button class="btnView" data-bs-toggle="modal" data-bs-target="#bgyCertificate">View</button>
                                            <button class="btnEdit">Edit</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="container">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="botStats4" style="background: rgb(117,255,229); background: linear-gradient(40deg, rgba(117,255,229,1) 0%, rgba(213,255,160,1) 34%, rgba(244,255,109,1) 100%);">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="botStats4" style="background: rgb(255,177,117); background: linear-gradient(75deg, rgba(255,177,117,1) 0%, rgba(254,139,135,1) 34%);">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="botStats4"></div>
                        </div>
                        <div class="col-6">
                            <div class="botStats4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="bgyCertificate" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Barangay Certificate</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <form>
                    <div class="row g-3 align-items-center">
                            <div class="justify-content-center">
                                <img id="img" class="object-fit-contain"></img>
                                <input id="input" type="file" class="form-control form-control-sm" accept="image/*" onchange="file_changed()" style="width:300px;margin:auto;" >
                            </div>
                        
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">                           
                            <select id="residentName" class="form-control" style="width:205px;">
                                <option value="" selected></option>
                                    <?php foreach ($residentRows as $row): ?>
                                        <option value="<?php echo htmlspecialchars($row['residentNo']); ?>"><?php echo htmlspecialchars($row['FULLNAME']); ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-auto">                           
                            <select id="purposes" class="form-control" style="width:205px;">
                                <option value="" selected></option>
                                <option>Employment</option>
                                <option>Business Permit</option>
                                <option>Residence Verification</option>
                                <option>School Requirements</optio>
                                <option >Travel Permit</option>  
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4">   
                            <input type="date" id="date" class="form-control">
                        </div>
                        <div class="col-4">
                            <input type="text" id="age" class="form-control" placeholder="Age">
                        </div>
                        <div class="col-4">
                            <input type="text" id="civilStatus" class="form-control" placeholder="Civil Status">
                        </div>
                        
                    </div>
                    <div class="row  align-items-center">
                        <div class="col-auto w-100">
                                <textarea class="form-control " name="address" id="address" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<div id="dom-target-male" style="display: none;">
    <?php echo htmlspecialchars($malecount); ?>
</div>
<div id="dom-target-female" style="display: none;">
    <?php echo htmlspecialchars($femalecount); ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="SCRIPTS/script.js"></script>
<script>
   
    $(document).ready(function() {
        $('#residentName').select2({
            placeholder: 'Select Resident',
            tags: true,
            dropdownParent: $('#bgyCertificate')
        });
        $('#purposes').select2({
            placeholder: 'Select Purpose',
            tags: true,
            dropdownParent: $('#bgyCertificate'),
        });
        
        $('#residentName').on('change', function() {
            var selectedIndex = $(this).prop('selectedIndex') - 1;
            console.log("Selected Index:", selectedIndex);
            $.ajax({
            url: 'transact.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $("#age").val(data[selectedIndex].age)
                $("#date").val(data[selectedIndex].birthday)
                $("#civilStatus").val(data[selectedIndex].civilStatus)
                $("#address").val(data[selectedIndex].address)
                $("#birthday").val(data[selectedIndex].birthday)
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);

            }
        });
        
        });

    });
    

</script>

</script>
</body>
</html>
