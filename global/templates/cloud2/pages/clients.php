<div ng-controller="clientController" ng-cloak>
    <!-- Row start -->
    <div class="row no-gutter">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?= _('Client Details Form') ?></h4>
                    <ul class="links">
                        <li ng-click="slideForm()">
                            <a href="#">
                                <i ng-class="{'fa fa-minus-square-o' : addNewOpen, 'fa fa-plus-square-o' : !addNewOpen}"></i><span><?= _('Add new member') ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body" id="clientRegistrationForm">
                    <form class="form-horizontal" role="form" ng-submit="register(form)">
                        <div class="row no-gutter">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('First Name') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?=_('First Name') ?>" ng-model="clientInfo.firstName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('Last Name') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?=_('Last Name') ?>" ng-model="clientInfo.lastName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('Patronymic Name') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?=_('Patronymic Name') ?>" ng-model="clientInfo.patronymicName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('Gender') ?></label>

                                    <div class="col-sm-10">
                                        <select class="form-control" ng-model="clientInfo.gender">
                                            <option value="Male"><?=_('Male') ?></option>
                                            <option value="Female"><?=_('Female') ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('Birthday') ?></label>

                                    <div class="col-sm-10">
                                        <div class="input-group date" ng-model="clientInfo.birthday" perfect-datepicker>
                                            <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= ('Email') ?></label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="<?= ('Email') ?>" ng-model="clientInfo.email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= ('Phone') ?></label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="<?= ('Phone') ?>" ng-model="clientInfo.phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= ('Address') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?= ('Address') ?>" ng-model="clientInfo.address">
                                    </div>
                                </div>
                            </div>
                            <div class="right-align-text col-xs-12">
                                <button type="submit" class="btn btn-success" ng-show="addNewOpen"><?=_('Register') ?></button>
                                <button type="submit" class="btn btn-success" ng-show="updateUserInfo"><?=_('Update') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->


    <!-- Row start -->
    <div class="row no-gutter" ng-init="loadClientsList()">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?= _('Clients') ?></h4>
                    <ul class="links">
                        <li>
                            <a href="#" ng-click="loadClientsList()">
                                <i class="fa fa-refresh"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                            <thead>
                            <tr>
                                <th style="width:10%"><?= _('Image') ?></th>
                                <th style="width:40%"><?= _('Name') ?></th>
                                <th style="width:20%" class="hidden-xs"><?= _('Phone') ?></th>
                                <th style="width:10%" class="hidden-xs hidden-sm"><?= _('Last visited date') ?></th>
                                <th style="width:10%" class="hidden-xs hidden-sm"><?= _('Action') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="client in clientsList">
                                <td class="center-align-text">
                                    <img ng-src="doctor.avatar" alt="{{client.showName}}" class="img-circle">
                                </td>
                                <td>
                                    <span class="name" ng-bind="client.showName"></span>
                                </td>
                                <td class="hidden-xs" ng-bind="client.phone"></td>
                                <td class="hidden-xs hidden-sm" ng-bind="client.lastVisitedDate"></td>
                                <td class="hidden-xs hidden-sm">
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-xs dropdown-toggle">
                                            <?= _('Action') ?>
                                            <span class="caret">
                                        </span>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#" ng-click="changeClientData(client)"><?= _('Edit') ?></a>
                                            </li>
                                            <li>
                                                <a href="#" ng-click="deleteClient(client)"><?= _('Delete') ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>