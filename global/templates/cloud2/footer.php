<?php
use \MD\Helpers\App;
use MD\Helpers\Utils;
if(App::isLoggedUser()) { ?>

					</div>
					<!-- Spacer ends -->

				</div>
				<!-- Container fluid ends -->

			</div>
			<!-- Main Container Start -->
<footer>
    <?= Utils::format(_('Copyright {partnerName}. All Rights Reserved.'))   ?>
</footer>
<!-- Footer end -->
</div>
<!-- Dashboard Wrapper End -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/global/js/jquery.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/global/js/bootstrap.min.js"></script>

<!-- Flot Charts
<script src="/global/js/flot/jquery.flot.js"></script>
<script src="/global/js/flot/jquery.flot.time.js"></script>
<script src="/global/js/flot/jquery.flot.selection.js"></script>
<script src="/global/js/flot/jquery.flot.resize.js"></script>
<script src="/global/js/flot/jquery.flot.tooltip.js"></script>
<script src="/global/js/flot/flot.excanvas.min.js"></script>
-->
<!-- Custom flot JS
<script src="/global/js/flot/custom/combine-chart.js"></script>
-->
<!-- Animated Right Sidebar -->
<script src="/global/js/slidebars.js"></script>

<!-- Tyny Scrollbar -->
<script src="/global/js/tiny-scrollbar.js"></script>

<!-- Date Range -->
<script src="/global/js/daterange/moment.js"></script>
<script src="/global/js/daterange/daterangepicker.js"></script>
<script src="/global/js/datepicker/bootstrap-datepicker.js"></script>

<!-- Custom JS -->
<script src="/global/js/custom.js"></script>
<script src="/global/js/custom-index.js"></script>


<?php } ?>

<!-- angular -->
<script src="/global/ng/app.js"></script>
<script src="/global/ng/factory/serverConnector.js"></script>

<!-- angular services -->
<script src="/global/ng/service/userService.js"></script>

<!-- angular controllers -->
<script src="/global/ng/controller/userController.js"></script>
<script src="/global/ng/controller/doctorController.js"></script>
<script src="/global/ng/controller/clientController.js"></script>
<script src="/global/ng/controller/workingTimesController.js"></script>

<!-- angular directives -->
<script src="/global/ng/directives/perfectUploader.js"></script>
<script src="/global/ng/directives/perfectDatepicker.js"></script>

</body>
</html>