<!-- Main Container Start -->
<div class="main-container">

    <!-- Container fluid Starts -->
    <div class="container-fluid" ng-controller="userController">

        <!-- Spacer starts -->
        <div class="spacer-xs">
            <!-- Row start -->
            <div class="row no-gutter">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Registrtation Form</h4>
                            <ul class="links">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-list"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" ng-submit="register(form)">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('First Name')?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?=_('First Name')?>" ng-model="registerInfo.firstName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('Last Name')?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?=_('Last Name')?>" ng-model="registerInfo.lastName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('Patronymic Name')?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?=_('Patronymic Name')?>" ng-model="registerInfo.patronymicName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('Username')?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?=_('Username')?>" ng-model="registerInfo.username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('Gender')?></label>

                                    <div class="col-sm-10">
                                        <select class="form-control" ng-model="registerInfo.gender">
                                            <option><?=_('Male')?></option>
                                            <option><?=_('Female')?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=_('Birthday')?></label>

                                    <div class="col-sm-10">
                                        <fieldset class="birthday-picker" ng-model="registerInfo.firstName">
                                            <select class='birth-year' name='birth[year]'></select>
                                            <select class='birth-month' name='birth[month]'></select>
                                            <select class='birth-day' name='birth[day]'></select>
                                            <input type='hidden' name='birthdate' />
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=('Email')?></label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="<?=('Email')?>" ng-model="registerInfo.email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=('Phone')?></label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="<?=('Phone')?>" ng-model="registerInfo.phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=('Address')?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?=('Address')?>" ng-model="registerInfo.address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?=('Zip code')?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?=('Zip code')?>" ng-model="registerInfo.zipCode">
                                    </div>
                                </div>

                                <div class="form-group" style="margin-bottom: 0px;">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success"><?=_('Register')?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Spacer ends -->

    </div>
    <!-- Container fluid ends -->

</div>
<!-- Main Container Start -->