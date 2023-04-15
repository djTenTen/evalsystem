<?php

//require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintFooter(false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Evaluation System');
$pdf->SetTitle('Result');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(10,40,10);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

        $query = $this->db->query("select * from teachers where TeacherID = $teacherid");
        $tname = $query->row_array();

        date_default_timezone_set("Asia/Singapore");
        $date =  date("F, d Y");

        
        $html = '<h1>'.$tname['Fullname'].'</h1>';
        $html .= '<h3>Rank: '.str_replace('_',' ',$rankpos).'</h3>';
        $html .= '
            <h5>'.str_replace('_',' ',$dpt).' Department</h5>
            <h5>Date Printed: '.$date.'</h5>
            <br><br>
        ';

        

        $html .= '
        <h3>Credentials</h3>
        <table>
            <thead>
                <tr>
                    <th style="width: 400px;"><strong> Category </strong></th>
                    <th><strong> Rating/Points </strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 400px;">Academic and Professional Development</td>
                    <td>'.$creditpointsA.'</td>
                </tr>
                <tr>
                    <td style="width: 400px;">Work Efficiency and Teaching Performance Effectiveness</td>
                    <td>'.$creditpointsB.'</td>
                </tr>
                <tr>
                    <td style="width: 400px;">Community and Extension Service</td>
                    <td>'.$creditpointsC.'</td>
                </tr>
                <tr>
                    <td style="width: 400px;">Work Experiences</td>
                    <td>'.$creditpointsD.'</td>
                </tr>
                <tr>
                    <td style="width: 400px;"></td>
                    <td><h3>Credential Score: '.$creditpoints.'</h3></td>
                </tr>
            </tbody>
        </table>
        ';


        $average = ($performance + $creditpoints) / 2;

        $html .= '
        <h3>Performance</h3>
        <table>
            <thead>
                <tr>
                    <th style="width: 400px;"><strong> Category </strong></th>
                    <th><strong> Rating/Points </strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 400px;">Supervisor</td>
                    <td>'.$resultSupervisor.'</td>
                </tr>
                <tr>
                    <td style="width: 400px;">Self</td>
                    <td>'.$resultTeacher.'</td>
                </tr>
                <tr>
                    <td style="width: 400px;">Student</td>
                    <td>'.$resultStudent.'</td>
                </tr>
                <tr>
                    <td style="width: 400px;"></td>
                    <td><h3>Performance Score: '.$performance.'</h3></td>
                </tr>
            </tbody>
        </table>

        <br>
        

        <table>
            <thead>
                <tr>
                    <th style="width: 400px;"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="width: 400px;"></td>
                    <td><h3>Average: '.$average.'</h3></td>
                </tr>
            </tbody>
        </table>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>



        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">'.$tname['Fullname'].'</td>
                    <td style="text-align: center;">_________________________________</td>
                </tr>
                <tr>
                    <td style="text-align: center;">Employee</td>
                    <td style="text-align: center;">Human Resource Head</td>
                </tr>
            </tbody>
        </table>

        
        
        ';

       
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, false, false, '');
        $pdf->Output('result of '.$tname['Fullname'].'.pdf'.'.pdf','D');

        