<?php

class GlobalHelper {
    public static function formatDate($date, $format = 'd F Y') {
        return (!is_null($date)) ? (new DateTime($date))->format($format) : "-";
    }

    public static function getMonth($numMonth){
    	$arrMonth = ['-','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    	if(!is_numeric($numMonth))
    		return 'GetMonthFail:notNumber';
    	elseif($numMonth<=0)
    		return 'GetMonth:tooSmall';
    	elseif($numMonth>=13)
    		return 'GetMonth:tooBig';
    	else
    		return $arrMonth[$numMonth];
    }

    public static function getArrayMonth(){
        return [
                '1' => 'Januari',
                '2' => 'Februari',
                '3' => 'Maret',
                '4' => 'April',
                '5' => 'Mei',
                '6' => 'Juni',
                '7' => 'Juli',
                '8' => 'Agustus',
                '9' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
            ];
    }

    public static function getArrayYear(){
        $year = [];
        for($i=(date('Y')-5);$i<=(date('Y')+5);$i++){
            $year[$i]=$i;
        }
        return $year;
    }
}
?>