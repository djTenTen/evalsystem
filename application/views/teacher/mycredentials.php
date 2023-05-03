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

                <h3>Academic Development</h3>

                <?= form_open_multipart("uploadcredential");?>

                    <input type="text" value="A" name="cate" hidden>
                    <div class="row">
                        <div class="col-3">
                            Credential Name:

                            <select name="credential" id="" class="form form-control form-select" required>
                                    <option value="" selected>Select Credential</option>
                                <optgroup label="Educational Attainment">
                                    <option value="Doctorate Degree">Doctorate Degree</option>
                                    <option value="Masters Degree">Masters Degree</option>
                                    <option value="Bachelor Degree">Bachelor Degree</option>
                                </optgroup>
                                
                            </select>
                        </div>

                        <div class="col-3">
                            Allignment:
                            <select name="alignment" id="" class="form form-control form-select" required>
                                <option value="" selected>Identify your alignments</option>
                                <optgroup label="Doctorate  Degree">
                                    <option value="All Degrees are aligned">All Degrees are aligned</option>
                                    <option value="Two Degrees allied or related">Two Degrees allied or related</option>
                                    <option value="D Not aligned">Not aligned</option>
                                </optgroup>

                                <optgroup label="Master Degree">
                                    <option value="Aligned to Bachelors Degree">Aligned to Bachelors Degree</option>
                                    <option value="Related to Specialization">Related to Specialization</option>
                                    <option value="M Not aligned">Not aligned</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-3">
                            Upload Supporting Documents (PDF):
                            <input type="file" name="suppdoc" id="" required>
                        </div>

                        <div class="col-1">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                <?= form_close();?>
            </div>

            <div class="container m-3">

                <h3>Professional Development</h3>

                <?= form_open_multipart("uploadcredential");?>

                    <input type="text" value="A" name="cate" hidden>
                    <div class="row">
                        <div class="col-5">
                            Credential Name:

                            <select name="credential" id="" class="form form-control form-select" required>
                                    <option value="" selected>Select Credential</option>

                                <optgroup label="Research Presentation / Review">
                                    <option value="Paper presentation in international research conference">Paper presentation in international research conference</option>
                                    <option value="Paper presentation in national research conference">Paper presentation in national research conference</option>
                                    <option value="Paper presentation in regional research conference">Paper presentation in regional research conference</option>
                                    <option value="Paper presentation in local research conference">Paper presentation in local research conference</option>
                                    <option value="Journal Editorial Board Membership/Editing work">Journal Editorial Board Membership/Editing work</option>
                                    <option value="Involvement in Research Peered Review">Involvement in Research Peered Review </option>
                                </optgroup>

                                <optgroup label="Publication of Research, Instructional Materials / Creative Works">
                                    <option value="Published book, Journal, textbook, manual, etc.">Published book, Journal, textbook, manual, etc. </option>
                                    <option value="Published article in international journal -scopus index, web of science, clarivate analytic">Published article in international journal -scopus index, web of science, clarivate analytic</option>
                                    <option value="Published article in national journal and international -but not publish in scopus index, web of science, clarivate analytic">Published article in national journal and international -but not publish in scopus index, web of science, clarivate analytic</option>
                                    <option value="Published article in regional journal">Published article in regional journal</option>
                                    <option value="Involvement in a commissioned internal or external funded research">Involvement in a commissioned internal or external funded research</option>
                                    <option value="locally published article or at The HCC Research Journal">locally published article or at The HCC Research Journal</option>
                                </optgroup>


                                <optgroup label="Participation in training/workshop">
                                    <option value="Training/Workshop International">Training/Workshop International</option>
                                    <option value="Training/Workshop National">Training/Workshop National</option>
                                    <option value="Training/Workshop Regional">Training/Workshop Regional</option>
                                    <option value="Training/Workshop Provincial">Training/Workshop Provincial</option>
                                    <option value="Training/Workshop Congressional">Training/Workshop Congressional</option>
                                    <option value="Training/Workshop Local">Training/Workshop Local</option>
                                </optgroup>

                                <optgroup label="Speaker / Lecturer in Training, Workshop or Seminar">
                                    <option value="Speaker or Lecturer in Training and Workshop or Seminar International">Speaker or Lecturer in Training and Workshop or Seminar International</option>
                                    <option value="Speaker or Lecturer in Training and Workshop or Seminar National">Speaker or Lecturer in Training and Workshop or Seminar National</option>
                                    <option value="Speaker or Lecturer in Training and Workshop or Seminar Regional">Speaker or Lecturer in Training and Workshop or Seminar Regional</option>
                                    <option value="Speaker or Lecturer in Training and Workshop or Seminar Provincial/Local Professional Audience">Speaker or Lecturer in Training and Workshop or Seminar Provincial/Local Professional Audience</option>
                                    <option value="Speaker or Lecturer in Training and Workshop or Seminar Provincial/Local Student Audience">Speaker or Lecturer in Training and Workshop or Seminar Provincial/Local Student Audience</option>
                                </optgroup>

                                <optgroup label="Awards, Coaching / Competition [Academics or Sports]">
                                    <option value="Awards Coaching  Competition Academics or Sports Internationaly">Awards, Coaching / Competition [Academics or Sports] Internationaly</option>
                                    <option value="Awards Coaching  Competition Academics or Sports National">Awards, Coaching / Competition [Academics or Sports] National</option>
                                    <option value="Awards Coaching  Competition Academics or Sports Regional">Awards, Coaching / Competition [Academics or Sports] Regional</option>
                                    <option value="Awards Coaching  Competition Academics or Sports Provincial">Awards, Coaching / Competition [Academics or Sports] Provincial</option>
                                    <option value="Awards Coaching  Competition Academics or Sports Congretional">Awards, Coaching / Competition [Academics or Sports] Congretional</option>
                                    <option value="Awards Coaching  Competition Academics or Sports Local">Awards, Coaching / Competition [Academics or Sports] Local</option>
                                </optgroup>

                                <optgroup label="Professional Organizations">
                                    <option value="Holding a position in Professional Organization">Holding a position in Professional Organization</option>
                                    <option value="Membership in Professional Organization">Membership in Professional Organization</option>
                                    <option value="Academic Consultancy including Paneling orAdvising">Academic Consultancy including Paneling orAdvising</option>
                                    <option value="Research professional level consultancy">Research professional level consultancy</option>
                                </optgroup>

                                <optgroup label="Professional Licensure / Certification">
                                    <option value="PRC Licensure Exam">PRC Licensure Exam</option>
                                    <option value="Certification Exam from Recognized Professional Organization">Certification Exam from Recognized Professional Organization</option>
                                    <option value="Eligibility Exam from the Government (Civil Service)">Eligibility Exam from the Government (Civil Service)</option>
                                    <option value="Industry-based Certification Exam / TESDA">Industry-based Certification Exam / TESDA</option>
                                </optgroup>
                                
                            </select>
                        </div>

                        <div class="col-4">
                            Upload Supporting Documents (PDF):
                            <input type="file" name="suppdoc" id="" required>
                        </div>

                        <div class="col-1">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                <?= form_close();?>
            </div>


            <hr>


            <div class="container m-3">

                <h3>Community and Extension Service</h3>

                <?= form_open_multipart("uploadcredential");?>
                    <input type="text" value="C" name="cate" hidden>
                    <div class="row">
                        <div class="col-5">
                            Credential Name:
                            <select name="credential" id="" class="form form-control form-select" required>
                                <option value="" selected>Select Credential</option>
                                <optgroup label="FIDES">
                                    <option value="Coordinative service for Pastoral Activity">Coordinative service for Pastoral Activity</option>
                                    <option value="Any Catholic Religious Works Activities">Any Catholic Religious Works Activities</option>
                                </optgroup>
                                <optgroup label="CARITAS">
                                    <option value="Community Outreach">Community Outreach</option>
                                    <option value="Any Charitable Works">Any Charitable Works</option>
                                </optgroup>
                                <optgroup label="LIBERTAS">
                                    <option value="Service Training">Service Training</option>
                                    <option value="Research Based Community Extension">Research Based Community Extension</option>
                                </optgroup>
                                <optgroup label="Services Outside">
                                    <option value="Services Outside HCC Community Leader / Facilitator / Coordinator">Services Outside HCC Community Leader / Facilitator / Coordinator</option>
                                    <option value="Services Outside HCC Community Member / Participants">Services Outside HCC CommunityMember / Participants</option>
                                </optgroup> 
                                <optgroup label="Services within">
                                    <option value="Services within HCC Community Leader / Facilitator / Coordinator">Services within HCC Community Leader / Facilitator / Coordinator</option>
                                    <option value="Services within HCC Community Member / Participants">Services within HCC Community Member / Participants</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-4">
                            Upload Supporting Documents (PDF):
                            <input type="file" name="suppdoc" id="" required>
                        </div>

                        <div class="col-1">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                <?= form_close();?>
            </div>


            <hr>

            <div class="container m-3">

                <h3>Work Experiences</h3>

                <?= form_open_multipart("uploadcredential");?>
                    <input type="text" value="D" name="cate" hidden>
                    <div class="row">
                        <div class="col-5">
                            Credential Name:
                            <select name="credential" id="" class="form form-control form-select" required> 
                                <option value="" selected>Select Credential</option>
                                <option value="Full-time teaching in Tertiary Level/ Graduate School  at HCC">Full-time teaching in Tertiary Level/ Graduate School  at HCC</option>
                                <option value="Full-time teaching in Basic Education Level at HCC">Full-time teaching in Basic Education Level at HCC</option>
                                <option value="Part- time teaching in Tertiary Level/ Graduate School at HCC">Part- time teaching in Tertiary Level/ Graduate School at HCC</option>
                                <option value="Part-time teaching in Basic Education Level at HCC">Part-time teaching in Basic Education Level at HCC</option>
                                <option value="Full-time teaching in Tertiary Level/ Graduate School">Full-time teaching in Tertiary Level/ Graduate School</option>
                                <option value="Full-time teaching in Basic Education Level">Full-time teaching in Basic Education Level</option>
                                <option value="Part- time teaching in Tertiary Level/ Graduate School">Part- time teaching in Tertiary Level/ Graduate School</option>
                                <option value="Part-time teaching in Basic Education Level">Part-time teaching in Basic Education Level</option>
                                <option value="Work Related to Profession but not teaching">Work Related to Profession but not teaching</option>
                                <option value="Work not Related to Profession">Work not Related to Profession</option>
                            </select>
                        </div>
                        
                        <div class="col-4">
                            Upload Supporting Documents (PDF):
                            <input type="file" name="suppdoc" id="" required>
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