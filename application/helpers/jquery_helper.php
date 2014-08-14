<?php

function jquery_widget(){
    return script_tag("public/jquery/jquery-ui/ui/jquery.ui.core.js").
           script_tag("public/jquery/jquery-ui/ui/jquery.ui.widget.js");
}

function jquery_tab(){
    return script_tag("public/jquery/jquery-ui/ui/jquery.ui.tabs.js");
}

function jquery_datepicker(){
    return script_tag("public/jquery/d-bundle/ui/jquery.ui.datepicker.js");
}

function jquery_dialog(){
    return script_tag("public/jquery/jquery-ui/ui/jquery.ui.mouse.js").
           script_tag("public/jquery/jquery-ui/ui/jquery.ui.position.js").
           script_tag("public/jquery/jquery-ui/ui/jquery.ui.draggable.js").             
           script_tag("public/jquery/jquery-ui/ui/jquery.ui.resizable.js").  
           script_tag("public/jquery/jquery-ui/ui/jquery.ui.dialog.js");
}