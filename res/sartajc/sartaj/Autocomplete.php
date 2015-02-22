<?php
/**
 * Description of Autocomplete
 *
 * @author SARTAJ
 */
include_once("{$libpath}widgets/Control.php");
include_once("{$comppath}jquery.php");

class Autocomplete extends Control{
private $url = ""; 
private $minlen = "1"; 
private $req = false;
private $formName = '';
private $msgName = '';

public function oncreate($element){
$this->setHTMLName("");
$this->url = getEventPath($this->name.'_autocomplete');
}
     public function setForm($val) { $this->formName = $val;}
     public function setMsgName($val) { $this->msgName = $val;}
     public function setRequired() {
if($this->issubmit){
if(strlen($this->value) < 1){
setErr($this->name,"Can not submit Empty");
            }
  }
$this->req = true;
}

public function setURL($val){
    $this->url = $val;    
}
public function setMinLen($val){
    $this->minlen = $val;
}

public function sendData($val){
global $JSServer;
$JSServer->addJSONBlock('js','proces','
           var data = '.$val.';
  var term = "'.$_REQUEST['term'].'" ;
'.$this->name.'_cache[ term ] = data;    
'.$this->name.'_response(data);
    ');
    
}

public function onjsrender(){
global $jquerypath;
addFileLink($jquerypath.'themes/base/jquery.ui.all.css');
addFileLink($jquerypath.'themes/base/jquery.ui.accordion.css');
addFileLink($jquerypath.'ui/jquery.ui.core.min.js');
addFileLink($jquerypath.'ui/jquery.ui.widget.min.js');
addFileLink($jquerypath.'ui/jquery.ui.position.min.js');
addFileLink($jquerypath.'ui/jquery.ui.menu.min.js');
addFileLink($jquerypath.'ui/jquery.ui.autocomplete.min.js');
if($this->formName!=''){
if($this->req){
addFooterJSFunctionCode("{$this->formName}_submit", "{$this->name}req", "
ctlReq['$this->name']= Array('$this->msgName','TextField');");
}
}

addHeaderJSFunction($this->name.'_autocomplete', "function ".$this->name.'_autocomplete(request){ ' , "
getURL('$this->url',request);    
}");

addHeaderJSCode($this->name, ' var '.$this->name.'_cache = {}; var '.$this->name.'_response = null;');
addHeaderJSFunctionCode('ready',$this->name,'
    $("#'.$this->name.'").autocomplete({
    minLength: '.$this->minlen.',
    source: function( request, response ) {
            var term = request.term;
            if ( term in '.$this->name.'_cache ) {
                    response( '.$this->name.'_cache[ term ] );
                    return;
            }
'.$this->name.'_response = response;
 '.$this->name.'_autocomplete(request);
            
    }
});        
    ');
}



}
?>