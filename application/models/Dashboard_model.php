<?php 
class Dashboard_model extends CI_Model{


    public function __construct(){
        $this->load->database();
    }



    public function getRank($credpointsshs){

        if($credpointsshs <= 10){
            return 'Assistant_Teacher';
        }elseif($credpointsshs > 10 && $credpointsshs <= 15){
            return 'Teacher_1';
        }elseif($credpointsshs > 15 && $credpointsshs <= 20){
            return 'Teacher_2';
        }elseif($credpointsshs > 20 && $credpointsshs <= 25){
            return 'Teacher_3';
        }elseif($credpointsshs > 25 && $credpointsshs <= 35){
            return 'Assistant_HT_1_-_Assistant_MT_1';
        }elseif($credpointsshs > 35 && $credpointsshs <= 40){
            return 'Assistant_HT_2_-_Assistant_MT_2';
        }elseif($credpointsshs > 40 && $credpointsshs <= 45){
            return 'Assistant_HT_2_-_Assistant_MT_2';
        }elseif($credpointsshs > 45 && $credpointsshs <= 50){
            return 'Associate_HT_1_-_Associate_MT_1';
        }elseif($credpointsshs > 50 && $credpointsshs <= 55){
            return 'Associate_HT_2_-_Associate_MT_2';
        }elseif($credpointsshs > 55 && $credpointsshs <= 60){
            return 'Associate_HT_3_-_Associate_MT_3';
        }elseif($credpointsshs > 60 && $credpointsshs <= 65){
            return 'Associate_HT_4_-_Associate_MT_4';
        }elseif($credpointsshs > 65 && $credpointsshs <= 70){
            return 'Associate_HT_5_-_Associate_MT_5';
        }elseif($credpointsshs > 70 && $credpointsshs <= 75){
            return 'Head_Teacher_1_-_Master_Teacher_1';
        }elseif($credpointsshs > 75 && $credpointsshs <= 80){
            return 'Head_Teacher_2_-_Master_Teacher_2';
        }elseif($credpointsshs > 80 && $credpointsshs <= 85){
            return 'Head_Teacher_3_-_Master_Teacher_3';
        }elseif($credpointsshs > 85 && $credpointsshs <= 90){
            return 'Head_Teacher_4_-_Master_Teacher_4';
        }elseif($credpointsshs > 90 && $credpointsshs <= 95){
            return 'Head_Teacher_5_-_Master_Teacher_5';
        }

    }


    public function getPerformanceScore($performanceshs){

        if($performanceshs <= 75){
            $data = array(
                'Points' => 7,
                'Remarks' => 'Fair'
            );
            return $data;
        }elseif($performanceshs >= 76 && $performanceshs <= 77){
            $data = array(
                'Points' => 8,
                'Remarks' => 'Fair'
            );
            return $data;
        }elseif($performanceshs >= 78 && $performanceshs <= 79){
            $data = array(
                'Points' => 9,
                'Remarks' => 'Fair'
            );
            return $data;
        }elseif($performanceshs >= 80 && $performanceshs <= 81){
            $data = array(
                'Points' => 10,
                'Remarks' => 'Satisfactory'
            );
            return $data;
        }elseif($performanceshs >= 82 && $performanceshs <= 83){
            $data = array(
                'Points' => 11,
                'Remarks' => 'Satisfactory'
            );
            return $data;
        }elseif($performanceshs >= 84 && $performanceshs <= 85){
            $data = array(
                'Points' => 12,
                'Remarks' => 'Satisfactory'
            );
            return $data;
        }elseif($performanceshs >= 86 && $performanceshs <= 87){
            $data = array(
                'Points' => 13,
                'Remarks' => 'Satisfactory'
            );
            return $data;
        }elseif($performanceshs >= 88 && $performanceshs <= 89){
            $data = array(
                'Points' => 14,
                'Remarks' => 'Satisfactory'
            );
            return $data;
        }elseif($performanceshs >= 90 && $performanceshs <= 91){
            $data = array(
                'Points' => 15,
                'Remarks' => 'Very Satisfactory'
            );
            return $data;
        }elseif($performanceshs >= 92 && $performanceshs <= 93){
            $data = array(
                'Points' => 16,
                'Remarks' => 'Very Satisfactory'
            );
            return $data;
        }elseif($performanceshs >= 94 && $performanceshs <= 95){
            $data = array(
                'Points' => 17,
                'Remarks' => 'Very Satisfactory'
            );
            return $data;
        }elseif($performanceshs >= 96 && $performanceshs <= 97){
            $data = array(
                'Points' => 18,
                'Remarks' => 'Excellent'
            );
            return $data;
        }elseif($performanceshs >= 98 && $performanceshs <= 99){
            $data = array(
                'Points' => 19,
                'Remarks' => 'Excellent'
            );
            return $data;
        }elseif($performanceshs >= 100){
            $data = array(
                'Points' => 20,
                'Remarks' => 'Excellent'
            );
            return $data;
        }


    }


}