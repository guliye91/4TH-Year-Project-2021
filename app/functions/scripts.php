<?php
require_once("../incs/authenticator.php");
?>
 <!--Import jQuery before materialize.js-->
     
      <!--<script type="text/javascript" src="../../assets/js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="../../assets/js/materialize.min.js"></script>
      <script type="text/javascript" src="../../assets/js/init.js"></script>
      <script type="text/javascript" src="../../assets/js/select.js"></script>
      <script type="text/javascript" src="../../assets/js/sidenav.js"></script>
      <script type="text/javascript" src="../../assets/js/carousel.js"></script>
      <script type="text/javascript" src="../../assets/js/modal.js"></script>
      <script type="text/javascript" src="../../assets/js/typed.js"></script>
	  <script type="text/javascript" src="../../assets/js/typedMod.js"></script>
      <script type="text/javascript" src="../../assets/js/tooltip.js"></script>-->
      <script type="text/javascript" src="../../assets/libs/zing/zingchart.min.js"></script>
      <script type="text/javascript" src="../../assets/libs/sweet/sweetalert.min.js"></script>
      <script type="text/javascript" src="../../assets/libs/tooltipster/dist/js/tooltipster.bundle.min.js"></script>
      <script type="text/javascript" src="../functions/idleState.js"></script>
      <script type="text/javascript" src="../functions/processAdd.js"></script>
      <script type="text/javascript" src="../functions/processPhoto.js"></script>
      <script type="text/javascript" src="../functions/processRepair.js"></script>
      <script type="text/javascript" src="../functions/processCyber.js"></script>
      <script type="text/javascript" src="../functions/processSales.js"></script>
      <script type="text/javascript" src="../functions/changePassword.js"></script>
      <script type="text/javascript" src="../functions/processLogout.js"></script>
      <script type="text/javascript" src="../functions/processDeleteuser.js"></script>
      <script type="text/javascript" src="../functions/processTarget.js"></script>
      <script type="text/javascript" src="../functions/printReceipt.js"></script>
      <script type="text/javascript" src="../functions/graph.js"></script>
      <script type="text/javascript" src="../functions/processLiabilities.js"></script>
      <script type="text/javascript" src="../functions/updateAmount.js"></script>
      <script type="text/javascript" src="../functions/updateAmount1.js"></script>
      <script type="text/javascript" src="../functions/updateAmount2.js"></script>
      <script type="text/javascript" src="../functions/expenses.js"></script>
      <script type="text/javascript" src="../functions/searchIp.js"></script>
      <script type="text/javascript" src="../functions/processUpdateuser.js"></script>
      <script type="text/javascript" src="../functions/processBackup.js"></script>
      <script type="text/javascript" src="../functions/processChangestatus.js"></script>
      <script type="text/javascript" src="../functions/stock.js"></script>
      <script type="text/javascript" src="../functions/searchStock.js"></script>
      <script type="text/javascript" src="../functions/printFL.js"></script>
      <!--<script type="text/javascript" src="../functions/searchRepair.js"></script>-->
       <?php if($_SESSION['userlevel'] != 'admin'){?>
      <script type="text/javascript" src="../functions/level.js"></script>
          <?php }?>
