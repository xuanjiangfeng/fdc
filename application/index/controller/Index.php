<?php
namespace app\index\controller;
use think\Db;
class Index
{	
    public $preg = '/[a-zA-Z0-9]+/u';

    public function index()
    {
    	$ydata = Db::table('tb_fdc')->select();
    	//$str = "暨阳街道1a幢2单元301";
        foreach ($ydata as $key1 => $value1) {
        	preg_match_all($this->preg,$value1['naddress'],$ary1);
        	$ydata[$key1]['bh'] = $ary1[0];
        }
        //dump($ary1[0]);

        $ndata = Db::table('tb_zf')->select();
        foreach ($ndata as $key2 => $value2) {
        	preg_match_all($this->preg,$value2['zfname'],$ary2);
        	$ndata[$key2]['bh'] = $ary2[0];
        }
        /*$str = "暨阳街道1a-2-301";
    	$preg = '/[a-zA-Z0-9]+/u';
        dump($ary2[0]);
        if($ary1 == $ary2){
        	echo "==";
        }else{
        	echo "!=";
        }*/
        $ysum = count($ydata);
        $nsum = count($ndata);
        $k = 0;
        foreach ($ndata as $key3 => $value3) {
        	foreach ($ydata as $key4 => $value4) {
        		if($value3['bh'] == $value4['bh']){
        			$k++;
        		}
        	}
        }
        echo $ysum . "</br>";
        echo $nsum . "</br>";
        echo $k . "</br>";
    }
}
