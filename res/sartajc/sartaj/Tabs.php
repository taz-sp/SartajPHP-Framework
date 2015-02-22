<?php
/**
 * Description of Tabs
 *
 * @author SARTAJ
 */
include_once("{$libpath}widgets/Control.php");
include_once("{$comppath}jquery.php");

class Tabs extends Control{
public function oncreate($element){
$this->setHTMLName("");
}

public function onjsrender(){
global $jquerypath;
addFileLink($jquerypath.'themes/base/jquery.ui.all.css');
addFileLink($jquerypath.'themes/base/jquery.ui.tabs.css');
addFileLink($jquerypath.'ui/jquery.ui.core.min.js');
addFileLink($jquerypath.'ui/jquery.ui.widget.min.js');
addFileLink($jquerypath.'ui/jquery.ui.tabs.min.js');
addHeaderJSFunctionCode('ready',$this->name,'
 $("#'.$this->name.'").tabs();');
if($this->innerHTML == ''){
$this->innerHTML = '<ul>
		<li><a href="#tabs-1">Tab1</a></li>
		<li><a href="#tabs-2">Tab2</a></li>
		<li><a href="#tabs-3">Tab3</a></li>
                <li><a href="<?php print getEventPath(\'page\',\'data\'); ?>">Ajax Data Tab</a></li>
	</ul>
	<div id="tabs-1">
<p>
Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data
Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data
Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data Tab1 Demo Data
</p>
	</div>
	<div id="tabs-2">
            <p>
Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data
Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data
Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data
Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data Tab2 Demo Data

            </p>
	</div>
	<div id="tabs-3">
<p>
Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data
Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data
Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data
Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data
Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data
Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data Tab3 Demo Data
</p>
        </div>
';
}

}


}
?>