<div  ng-controller="calendarController">




    <!-- Row start -->
    <div class="row no-gutter">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <h4>Calendar</h4>
                    <ul class="links">
                        <li>
                            <a href="#">
                                <i class="fa fa-area-chart"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div id="worker-calendar" ng-init="initCalendar()"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->



    <!-- Row start -->
   <!-- <div class="row no-gutter">

        <div class="col-md-9 col-sm-12">



        </div>


        <div class="col-md-3 col-sm-12">

        </div>
    </div>
-->


    <!-- Modal -->
    <div id="order-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">

                <div class="modal-header">
                    <button type="button" class="close" ng-click="closePopup()">x</button>
                    <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                </div>

                <div class="modal-body ">




                    <div class="row">
                        <div class="col-sm-6 col-xs-12 form-group">
                            <label for="start-time"><?= _('Start Time') ?></label>
                            <input id="start-time" type="text" placeholder="<?= _('Start Time') ?>" perfect-time-input="editOrder.start">
                        </div>
                        <div class="col-sm-6 col-xs-12 form-group">
                            <label for="end-time"><?= _('End Time') ?></label>
                            <input id="end-time" type="text" placeholder="<?= _('End Time') ?>" perfect-time-input="editOrder.end">
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-xs-12">
                            <label for="search-client"><h4><?= _('Client') ?></h4></label>
                        </div>
                        <div class="col-xs-6 ">
                            <dl>

                                <dt><?= _('First Name') ?></dt>
                                <dd ng-bind="editOrder.client.firstName || '...'"></dd>

                                <dt><?= _('Last Name') ?></dt>
                                <dd ng-bind="editOrder.client.lastName || '...'"></dd>

                                <dt><?= _('Phone') ?></dt>
                                <dd ng-bind="editOrder.client.phone || '...'"></dd>

                            </dl>
                        </div>

                        <div class="col-xs-6 ">
                            <dl>

                                <dt><?= _('Gender') ?></dt>
                                <dd ng-bind="editOrder.client.gender || '...'"></dd>

                                <dt><?= _('Email') ?></dt>
                                <dd ng-bind="editOrder.client.email || '...'"></dd>

                                <dt><?= _('Username') ?></dt>
                                <dd ng-bind="editOrder.client.userName || '...'"></dd>

                            </dl>
                        </div>

                        <div class="col-xs-12 form-group">
                            <input id="search-client" type="text" class="form-control" ng-init="initAutocomplete()"
                                   placeholder="<?= _('John Smith +123456789') ?>"
                                   ng-model="editOrder.searchString" ng-change="parsSearchString()">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="order-type"><?= _('Order Type') ?></label>
                            <select id="order-type" ng-model="editOrder.orderTypeId" class="form-control">
                                <?php foreach(\MD\Helpers\App::getOrderTypes() as $row) { ?>
                                    <option value="<?= $row['orderTypeId'] ?>"><?= _($row['name']) ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-xs-12 form-group">
                            <label for="order-description"><?= _('Description') ?></label>
                            <textarea id="order-description" class="form-control" rows="3"
                                      style="resize: none" placeholder=""
                                      ng-model="editOrder.description"></textarea>
                        </div>

                    </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" ng-click="closePopup()">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="saveOrder()">Save changes</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- Modal End -->
    <!-- Modal Big End -->


</div>
<style>
.ui-autocomplete {
    z-index: 1041;
}
</style>