<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 11/10/2017
 * Time: 11:18 AM
 */

namespace App\Library;
use App\Library\ClientRequest;

class GenerateCodeNumber
{

    /*
     * This is the function of generating code no for all tables
     * Checking the code no in its related table whether it is already in database or not
     */
    /*
    public static function generateCode($url)
    {
        $code_no = "";

        while(true) {
            $code_no = mt_rand(100000,999999);
            $url = $url.$code_no."/search/code-no";
            $result = ClientRequest::getClientRequest($url);
            if($result == "No record found") {
                break;
            }

        }
        return $code_no;

    }*/


    /*
     * This is the function of generating transaction no
     * Checking the transaction no in its related table whether it is already in database or not
     */
    public static function generateTransaction($url)
    {

        $transaction_no = "";

        while(true) {
            $transaction_no = mt_rand(100000000,999999999);
            $url = $url.$transaction_no."/search/transaction_no";
            $result = ClientRequest::getClientRequest($url);
            if($result == "No record found") {
                break;
            }

        }
        return $transaction_no;

    }
}