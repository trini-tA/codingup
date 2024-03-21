<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class codingup extends Controller
{
    public function index(Request $request){

        $in = 2024;

        $out = 0;

        for( $i=1; $i < $in; $i++){
            if( $in % $i === 0 ){
                $out += $i;
            }
        }

        dump( $out );
        
        $releves = array( 10, 12, 6, 9, 18.5, 22, 7, 4, 9, 10 );
        //$releves = array( '10.0', '12.0', '6.0', '9.0', '18.5', '22.0', '7.0', '4.0', '9.0', '10.0' );

        $lines = [];
        $fp = fopen('toto.txt', 'r');
        if ($fp) {
            while (($buffer = fgets($fp, 4096)) !== false) {
                $exp = explode( ' - ', $buffer );
                $exp2 = explode( ', ', $exp[1] );

                $exp2[count($exp2)-1] = str_replace(array("\r", "\n"), '', $exp2[count($exp2)-1] );

                $lines[$exp[0]] = $exp2;

            }
            fclose($fp);
        }
        
        $results = [];
        foreach( $lines as $key => $line ){
            $isGood = true;
            dump( $line, $releves );
            foreach( $releves as $value ){
                
                if( !in_array( $value, $line ) ){
                    if( !in_array( $value/2, $line ) ) {
                        $isGood = false;
                    }
                }

                if( !$isGood ){
                    //dump( $line, $value );
                    break;
                }
            }

            if( $isGood ){
                $results[] = $key;
            }

        }
        dump( $results );

        dd('STOP');
    }



}
