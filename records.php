<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link defer rel="stylesheet" href="STYLES\stylemain.css">
    <link defer rel="stylesheet" href="STYLES\styleresin.css">
    <link rel="stylesheet" href="STYLES\styleform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link defer rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.1/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sl-2.0.1/datatables.min.css" rel="stylesheet">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script defer src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.5/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/cr-2.0.1/date-1.5.2/fc-5.0.0/fh-4.0.1/kt-2.12.0/r-3.0.2/rg-1.5.0/rr-1.5.0/sl-2.0.1/datatables.min.js"></script>
    <script defer src="SCRIPTS/script.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
</head>
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
                        <li class="dropdown_item"><a href="#" id="bgyCert">Barangay Certificate</a></li>
                        <li class="dropdown_item"><a href="#" id="indCert">Certificate of Indigency</a></li>
                        <li class="dropdown_item"><a href="#" id="bsnPerm">Business Permit</a></li>
                        <li class="dropdown_item"><a href="#" id="blot">Blotter</a></li>
                        
                    </ul>
                </li>
                <li class="active">
                    <a href="#"  class="btns shadow1">
                        <img src="ICONS\list-ol.svg" width="20px"/>
                        Transactions
                    </a>
                </li>
                <li>
                    <a href="residentinfo.php"  class="btns">
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
            <header id="hRes">Most Recent Transactions</header>
            <br>
            <div class="functions">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
            <br>
            
            <div class="tableContainer">
                    <table id="example"class="table table-hover">
                        <thead class="table-dark" style="position: sticky; top: 0%;z-index: 1000">
                            <tr>
                                <th>Transaction No.</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th class="text-center" style="width:200px">Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView" data-bs-toggle="modal" data-bs-target="#bgyCertificate">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@odo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                            <tr>
                                <td>123</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td class="text-center"><button class="btnView">View</button><button class="btnEdit">Edit</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="pagination"></div>
            </div>
            
            
        </div>    
    </div>
</section>

<div name="modals">
    <!------------- BRGY CERTIFICATE --------------->
    <div class="modal fade " id="bgyCertificate" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Barangay Certificate</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-inline-flex align-items-start">
                <form>
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <select class="form-control js-example-tags"  style="width:350px;">
                                <option value="" selected></option>
                                <option>Louie I. Calma</option>
                                <option>Louie Calma</option>
                                <option>Louie Calma</option>
                                <option>Louie Calma</option>
                                <option>Louie Calma</option>
                                <option>purple</option>
                            </select>
                        </div>     
                    </div>
                    <div class="row g-3 align-items-center">
                        
                        <div class="col-auto">
                          <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                        <div class="col-auto">
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                          </div>
                          <div class="col-auto">
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                          </div>
                    </div>
                </form>
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
</div>
  <script>
    
    </script>
</body>
</html>