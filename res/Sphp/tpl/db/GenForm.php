<div class="paghead" id="frmerrdet"><?php print traceError(true); ?></div>
<div class="paghead" id="frmmsgdet"><?php print traceMsg(true); ?></div>
<div class="paghead" id="frmformhead"><?php print $formHead; ?></div>
<form id="form2" runat="server" action="<?php echo getThisPath('',true); ?>">
<div id="genForm" path="libpath/comp/data/DTable.php" runat="server" funsetForm="form2" funsetDontUseFormat="" 
 ></div>
<div align="center" class="pagbar"><input type="submit" value="Submit" /></div>
</form>
<div class="pagfooter">&nbsp;</div>
