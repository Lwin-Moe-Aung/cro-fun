<?php
/**
 * Created by PhpStorm.
 * User: Lenovo
 * Date: 10/27/2017
 * Time: 11:53 AM
 */

namespace App\Library;


class ProjectStatus
{
    public static $status= [
        'draft'=>'Draft',
        'open_for_funding'=>'Open for funding',
        'unfunded'=>'Unfunded',
        'fully_funded'=>'Fully Funded',
        'project_on_going'=>'Project on going',
        'harvesting_period'=>'Harvesting Period',
        'close_finished'=>'Finished',
        'cancelled_open'=>'Cancelled',
        'default_open'=>'Defaulted'
   ];
    public static function getStatus()
    {
      return self::$status;
    }
}