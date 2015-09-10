<div  ng-controller="calendarController">

    <!-- Row start -->
    <div class="row no-gutter">

        <div class="col-md-9 col-sm-12">

            <div ui-calendar="config" calendar="doctor" ng-model="eventSources" ></div>

        </div>


        <div class="col-md-3 col-sm-12">

        </div>
    </div>



    <!-- Modal -->
    <div id="order-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        data-backdrop="false" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                </div>

                <div class="modal-body ">




                    <div class="row">
                        <div class="col-sm-6 col-xs-12 form-group">
                            <label for="start-time"><?= _('Start Time') ?></label>
                            <input id="start-time" type="text" class="form-control" placeholder="<?= _('Start Time') ?>" ng-model="editOrder.start">
                        </div>
                        <div class="col-sm-6 col-xs-12 form-group">
                            <label for="end-time"><?= _('End Time') ?></label>
                            <input id="end-time" type="text" class="form-control" placeholder="<?= _('End Time') ?>" ng-model="editOrder.end">
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
                                <dd ng-bind="editOrder.client.username || '...'"></dd>

                            </dl>
                        </div>

                        <div class="col-xs-12 form-group">
                            <input id="search-client" type="text" class="form-control" ng-init="initAutocomplete()"
                                   placeholder="<?= _('John Smith +123456789') ?>"
                                   ng-model="editOrder.client.searchString" ng-change="parsSearchString()">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label for="order-description"><?= _('Description') ?></label>
                            <textarea id="order-description" class="form-control" rows="3"
                                      style="resize: none" placeholder=""
                                      ng-model="editOrder.description"></textarea>
                        </div>
                    </div>





                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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