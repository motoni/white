<?php

/*
| -----------------------------------------------------
| PRODUCT NAME:     INILABS SCHOOL MANAGEMENT SYSTEM
| -----------------------------------------------------
| AUTHOR:           INILABS TEAM
| -----------------------------------------------------
| EMAIL:            info@inilabs.net
| -----------------------------------------------------
| COPYRIGHT:        RESERVED BY INILABS IT
| -----------------------------------------------------
| WEBSITE:          http://inilabs.net
| -----------------------------------------------------
| MODIFIED BY:      INTELNETGS intelnetgs@yahoo.com
|------------------------------------------------------
*/

function btn_add($uri, $name) {
    return anchor($uri, "<i class='fa fa-plus'></i>", "class='btn btn-primary btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

function btn_view($uri, $name) {
    return anchor($uri, "<i class='fa fa-check-square-o'></i>", "class='btn btn-success btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

function btn_edit($uri, $name) {
    return anchor($uri, "<i class='fa fa-edit'></i>", "class='btn btn-warning btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

function btn_delete($uri, $name) {
    return anchor($uri, "<i class='fa fa-trash-o'></i>",
        array(
            'onclick' => "return confirm('you are about to delete a record. This cannot be undone. are you sure?')",
            'class' => 'btn btn-danger btn-xs mrg',
            'data-placement' => 'top', 
            'data-toggle' => 'tooltip', 
            'data-original-title' => $name
        )
    );
}

function delete_file($uri, $id) {
    return anchor($uri, "<i class='fa fa-times '></i>",
        array(
            'onclick' => "return confirm('you are about to delete a record. This cannot be undone. are you sure?')",
            'id' => $id,
            'class' => "close pull-right"
        )
    );
}
function share_file($uri, $id) {
    return anchor($uri, "<i class='fa fa-globe'></i>",
        array(
            'onclick' => "return confirm('you are about to delete a record. This cannot be undone. are you sure?')",
            'id' => $id,
            'class' => "pull-right"
        )
    );
}


function btn_dash_view($uri, $name) {
    return anchor($uri, "<span class='fa fa-check-square-o'></span>", "class='btn btn-success btn-xs mrg' style='background-color:#FDB45C;color:#fff;border:1px solid #FDB45C' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}


function btn_invoice($uri, $name) {
    return anchor($uri, "<i class='fa fa-credit-card'></i>", "class='btn btn-primary btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}


function btn_return($uri, $name) {
    return anchor($uri, "<i class='fa fa-mail-forward'></i>",
        array(
            "onclick" => "return confirm('you are return the book . This cannot be undone. are you sure?')",
            "class" => 'btn btn-danger btn-xs',
            'data-placement' => 'top', 
            'data-toggle' => 'tooltip', 
            'data-original-title' => $name

        )
    );
}

function btn_attendance($id, $method, $class, $name) {
    return "<input type='checkbox' class='".$class."' $method id='".$id."' data-placement='top' data-toggle='tooltip' data-original-title='".$name."' >  ";
    // return anchor($uri, "<i class='fa fa-credit-card'></i>", "class='btn btn-primary btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

function btn_promotion($id, $class, $name) {
    return "<input type='checkbox' class='".$class."' id='".$id."' data-placement='top' data-toggle='tooltip' data-original-title='".$name."' >  ";
    // return anchor($uri, "<i class='fa fa-credit-card'></i>", "class='btn btn-primary btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}

if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

// infinite coding starts here..
function btn_add_pdf($uri, $name) {
    return anchor($uri, "<i class='fa fa-file'></i> ".$name, "class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button' target='_blank'");
}
function btn_sm_edit($uri, $name) {
    return anchor($uri, "<i class='fa fa-edit'></i> ".$name, "class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'");
}
function btn_sm_add($uri, $name) {
    return anchor($uri, "<i class='fa fa-plus'></i> ".$name, "class='btn-cs btn-sm-cs' style='text-decoration: none;' role='button'");
}

function btn_payment($uri, $name) {
    return anchor($uri, "<i class='fa fa-credit-card'></i> ".$name, "class='btn-cs btn-sm-cs'style='text-decoration: none;' role='button'");
}
function btn_marksheet($uri, $name) {
    return anchor($uri, "<i class='fa fa-signal'></i>", "class='btn btn-success btn-xs mrg' data-placement='top' data-toggle='tooltip' data-original-title='".$name."'");
}


/**
 * Recursively implodes an array with optional key inclusion
 * 
 * Example of $include_keys output: key, value, key, value, key, value
 * 
 * @access  public
 * @param   array   $array         multi-dimensional array to recursively implode
 * @param   string  $glue          value that glues elements together   
 * @param   bool    $include_keys  include keys before their values
 * @param   bool    $trim_all      trim ALL whitespace from string
 * @return  string  imploded array
 */ 
function recursive_implode(array $array, $glue = ',', $include_keys = false, $trim_all = true)
{
    $glued_string = '';

    // Recursively iterates array and adds key/value to glued string
    array_walk_recursive($array, function($value, $key) use ($glue, $include_keys, &$glued_string)
    {
        $include_keys and $glued_string .= $key.$glue;
        $glued_string .= $value.$glue;
    });

    // Removes last $glue from string
    strlen($glue) > 0 and $glued_string = substr($glued_string, 0, -strlen($glue));

    // Trim ALL whitespace
    $trim_all and $glued_string = preg_replace("/(\s)/ixsm", '', $glued_string);

    return (string) $glued_string;
}

function process_subjects_array($array) { // returns the subjects array as a quoted string
    $result = array();
    

    if (is_array($array)) {

        foreach($array as $subject) {
            $result[] = '"' . $subject . '"';
        } 
        return implode(",", $result);
    }

}

// infinite coding end here..