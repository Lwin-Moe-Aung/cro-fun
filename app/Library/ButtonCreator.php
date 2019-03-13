<?php
namespace App\Library;


class ButtonCreator
{
	public static function generateButtons($grid_name, $id, $additional_class=null)
	{
		$role = session('current')['role'];		
		$button_lists =  config("buttons.buttons_access.$role.$grid_name");



		$btn = "";
		foreach($button_lists as $button_list){			

			$button_attributes = config("buttons.buttons.$button_list");
			$button_links=config("buttons.buttons_paths.$grid_name");


                $link = $button_links[$button_list] . $id;
                $color = $button_attributes['color'];
                $icon = $button_attributes['icon'];
                $title = $button_attributes['text'];
                $btn .= "<a href='$link' class='btn btn-xs $color' data-toggle='tooltip' title='$title'> <i class='fa $icon' ></i> </a>";


       
		}
		return $btn;
		
	}
}