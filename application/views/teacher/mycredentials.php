<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom fonts for this template-->
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <script src="https://kit.fontawesome.com/2be74ad659.js" crossorigin="anonymous"></script>

    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <!-- for data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myDatatable').DataTable();
        });
    </script>

</head>

<body class="bg-primary">

    <div class="container bg-white">


        <?php

        if($this->session->flashdata('Success') != null){
            echo '<div class="alert alert-success">
            <strong>Success! </strong> Upload Success. 
        </div>';
        unset($_SESSION['Success']);

        }

        if($this->session->flashdata('Deleted') != null){
            echo '<div class="alert alert-success">
            <strong>Removed! </strong> Credentials successfully removed. 
        </div>';
        unset($_SESSION['Deleted']);

        }
        
        ?>

        <div class="container">
            <a type="button" class="btn" href="<?= base_url();?>teacherdash"><h1><?= $teachername['Fullname'];?></h1></a> 
            <h1>Credentials</h1>
        </div>


        <div class="container m-3">

            <h3>Educational Attainment</h3>

            <?= form_open_multipart("uploadcredential");?>
                <div class="row">
                    <div class="col-5">
                        Credential Name:
                        <select name="credential" id="" class="form form-control form-select">
                            <option value="" selected>Select Credential</option>
                            <option value="Doctorate Degree">Doctorate Degree</option>
                            <option value="Masters Degree">Masters Degree</option>
                            <option value="Bachelor Degree">Bachelor Degree</option>
                        </select>
                    </div>

                    <div class="col-4">
                        Upload Supporting Documents (PDF):
                        <input type="file" name="suppdoc" id="">
                    </div>

                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            <?= form_close();?>
        </div>

        <hr>

        <div class="container m-3">

            <h3>Research Presentation / Review</h3>

            <?= form_open_multipart("uploadcredential");?>
                <div class="row">
                    <div class="col-5">
                        Credential Name:
                        <select name="credential" id="" class="form form-control form-select">
                            <option value="" selected>Select Credential</option>
                            <option value="Paper presentation in international research conference">Paper presentation in international research conference</option>
                            <option value="Paper presentation in national research conference">Paper presentation in national research conference</option>
                            <option value="Paper presentation in regional research conference">Paper presentation in regional research conference</option>
                            <option value="Paper presentation in local research conference">Paper presentation in local research conference</option>
                            <option value="Journal Editorial Board Membership/Editing work">Journal Editorial Board Membership/Editing work</option>
                            <option value="Involvement in Research Peered Review">Involvement in Research Peered Review </option>
                        </select>
                    </div>

                    <div class="col-4">
                        Upload Supporting Documents (PDF):
                        <input type="file" name="suppdoc" id="">
                    </div>

                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            <?= form_close();?>
        </div>


        <hr>


        <div class="container m-3">

            <h3>Publication of Research, Instructional Materials / Creative Works</h3>

            <?= form_open_multipart("uploadcredential");?>
                <div class="row">
                    <div class="col-5">
                        Credential Name:
                        <select name="credential" id="" class="form form-control form-select">
                            <option value="" selected>Select Credential</option>
                            <option value="Published book, Journal, textbook, manual, etc.">Published book, Journal, textbook, manual, etc. </option>
                            <option value="Published article in international journal -scopus index, web of science, clarivate analytic">Published article in international journal -scopus index, web of science, clarivate analytic</option>
                            <option value="Published article in national journal and international -but not publish in scopus index, web of science, clarivate analytic">Published article in national journal and international -but not publish in scopus index, web of science, clarivate analytic</option>
                            <option value="Published article in regional journal">Published article in regional journal</option>
                            <option value="Involvement in a commissioned internal or external funded research">Involvement in a commissioned internal or external funded research</option>
                            <option value="locally published article or at The HCC Research Journal">locally published article or at The HCC Research Journal</option>
                        </select>
                    </div>

                    <div class="col-4">
                        Upload Supporting Documents (PDF):
                        <input type="file" name="suppdoc" id="">
                    </div>

                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            <?= form_close();?>
        </div>

        <hr>

        <div class="container m-3">

            <h3>Participation in training/workshop</h3>

            <?= form_open_multipart("uploadcredential");?>
                <div class="row">
                    <div class="col-5">
                        Credential Name:
                        <select name="credential" id="" class="form form-control form-select">
                            <option value="" selected>Select Credential</option>
                            <option value="Training/Workshop National">Training/Workshop National</option>
                            <option value="Training/Workshop Regional">Training/Workshop Regional</option>
                            <option value="Training/Workshop Provincial">Training/Workshop Provincial</option>
                            <option value="Training/Workshop Congressional">Training/Workshop Congressional</option>
                            <option value="Training/Workshop Local">Training/Workshop Local</option>
                        </select>
                    </div>

                    <div class="col-4">
                        Upload Supporting Documents (PDF):
                        <input type="file" name="suppdoc" id="">
                    </div>

                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            <?= form_close();?>
        </div>
        


        <hr>



        <div class="container m-3">

            <h3>Speaker / Lecturer in Training, Workshop or Seminar </h3>

            <?= form_open_multipart("uploadcredential");?>
                <div class="row">
                    <div class="col-5">
                        Credential Name:
                        <select name="credential" id="" class="form form-control form-select">
                            <option value="" selected>Select Credential</option>
                            <option value="Speaker or Lecturer in Training and Workshop or Seminar National">Speaker or Lecturer in Training and Workshop or Seminar National</option>
                            <option value="Speaker or Lecturer in Training and Workshop or Seminar Regional">Speaker or Lecturer in Training and Workshop or Seminar Regional</option>
                            <option value="Speaker or Lecturer in Training and Workshop or Seminar Provincial">Speaker or Lecturer in Training and Workshop or Seminar Provincial</option>
                            <option value="Speaker or Lecturer in Training and Workshop or Seminar Congressional">Speaker or Lecturer in Training and Workshop or Seminar Congressional</option>
                            <option value="Speaker or Lecturer in Training and Workshop or Seminar Local">Speaker or Lecturer in Training and Workshop or Seminar Local</option>
                        </select>
                    </div>

                    <div class="col-4">
                        Upload Supporting Documents (PDF):
                        <input type="file" name="suppdoc" id="">
                    </div>

                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            <?= form_close();?>
        </div>
        

        <hr>

        <div class="container m-3">

            <h3>Awards, Coaching / Competition [Academics or Sports] </h3>

            <?= form_open_multipart("uploadcredential");?>
                <div class="row">
                    <div class="col-5">
                        Credential Name:
                        <select name="credential" id="" class="form form-control form-select">
                            <option value="" selected>Select Credential</option>
                            <option value="Awards Coaching  Competition Academics or Sports Internationaly">Awards, Coaching / Competition [Academics or Sports] Internationaly</option>
                            <option value="Awards Coaching  Competition Academics or Sports National">Awards, Coaching / Competition [Academics or Sports] National</option>
                            <option value="Awards Coaching  Competition Academics or Sports Regional">Awards, Coaching / Competition [Academics or Sports] Regional</option>
                            <option value="Awards Coaching  Competition Academics or Sports Provincial">Awards, Coaching / Competition [Academics or Sports] Provincial</option>
                            <option value="Awards Coaching  Competition Academics or Sports Congretional">Awards, Coaching / Competition [Academics or Sports] Congretional</option>
                            <option value="Awards Coaching  Competition Academics or Sports Local">Awards, Coaching / Competition [Academics or Sports] Local</option>
                        </select>
                    </div>

                    <div class="col-4">
                        Upload Supporting Documents (PDF):
                        <input type="file" name="suppdoc" id="">
                    </div>

                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            <?= form_close();?>
        </div>

        <hr>

        <div class="container m-3">

            <h3>Professional Organizations</h3>

            <?= form_open_multipart("uploadcredential");?>
                <div class="row">
                    <div class="col-5">
                        Credential Name:
                        <select name="credential" id="" class="form form-control form-select">
                            <option value="" selected>Select Credential</option>
                            <option value="Holding a position in Professional Organization">Holding a position in Professional Organization</option>
                            <option value="Membership in Professional Organization">Membership in Professional Organization</option>
                            <option value="Academic Consultancy including Paneling orAdvising">Academic Consultancy including Paneling orAdvising</option>
                            <option value="Research professional level consultancy">Research professional level consultancy</option>
                        </select>
                    </div>

                    <div class="col-4">
                        Upload Supporting Documents (PDF):
                        <input type="file" name="suppdoc" id="">
                    </div>

                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            <?= form_close();?>
        </div>

        <hr>

        <div class="container m-3">

            <h3>Professional Licensure / Certification</h3>

            <?= form_open_multipart("uploadcredential");?>
                <div class="row">
                    <div class="col-5">
                        Credential Name:
                        <select name="credential" id="" class="form form-control form-select">
                            <option value="" selected>Select Credential</option>
                            <option value="PRC Licensure Exam">PRC Licensure Exam</option>
                            <option value="Certification Exam from Recognized Professional Organization">Certification Exam from Recognized Professional Organization</option>
                            <option value="Eligibility Exam from the Government (Civil Service)">Eligibility Exam from the Government (Civil Service)</option>
                            <option value="Industry-based Certification Exam / TESDA">Industry-based Certification Exam / TESDA</option>
                        </select>
                    </div>

                    <div class="col-4">
                        Upload Supporting Documents (PDF):
                        <input type="file" name="suppdoc" id="">
                    </div>

                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            <?= form_close();?>
        </div>


        <hr>

        

        
        <div class="container">
            <table class="table table-hover" id="myDatatable">
                <thead>
                    <tr>
                        <th>Credential ID</th>
                        <th>Name</th>
                        <th>Points</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($credentials as $row){?>
                    <tr>
                        <td><?= $row['CredentialID']?></td> 
                        <td><?= $row['CredentialName']?></td>
                        <td><?= $row['Points']?></td>
                        <td>

                        <div class="btn-group">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewdocument<?= $row['CredentialID']?>">View</button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?= $row['CredentialID']?>">Delete</button>
                        </div>

                            <!-- The Modal -->
                            <div class="modal fade" id="viewdocument<?= $row['CredentialID']?>">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Document</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <object data="<?= base_url();?>credential/<?= $row['CredentialID'];?>.pdf" type="application/pdf" width="100%" height="500">
                                                    
                                        </object>
                                            
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>

                                    </div>
                                </div>
                            </div>



                            <!-- The Modal -->
                            <div class="modal fade" id="delete<?= $row['CredentialID']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirmation</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        
                                        Are you sure to Delete this credentials?
                                            
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <?= form_open("deletecredential/".$row['CredentialID']);?>
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        <?= form_close();?>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    </div>

                                    </div>
                                </div>
                            </div>



                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>

        </div>

    </div>

</body>

</html>