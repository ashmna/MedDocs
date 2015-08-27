<span class="label label-default">label-default</span>
<span class="label label-info">label-info</span>
<span class="label label-danger">label-danger</span>
<span class="label label-primary">label-primary</span>
<span class="label label-success">label-success</span>
<span class="label label-warning">label-warning</span>

<div ng-controller="doctorController" ng-cloak>
    <!-- Row start -->
    <div class="row no-gutter">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <h4><?= _('Doctor Details Form') ?></h4>
                    <ul class="links">
                        <li>
                            <a href="#">
                                <i class="fa fa-plus-square-o"></i> Added new member
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" ng-submit="register(form)">
                        <div class="row no-gutter">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= _('First Name') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?= _('First Name') ?>"
                                               ng-model="registerInfo.firstName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= _('Last Name') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?= _('Last Name') ?>"
                                               ng-model="registerInfo.lastName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= _('Patronymic Name') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                               placeholder="<?= _('Patronymic Name') ?>"
                                               ng-model="registerInfo.patronymicName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= _('Username') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?= _('Username') ?>"
                                               ng-model="registerInfo.userName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= _('Gender') ?></label>

                                    <div class="col-sm-10">
                                        <select class="form-control" ng-model="registerInfo.gender">
                                            <option value="Male"><?= _('Male') ?></option>
                                            <option value="Female"><?= _('Female') ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= _('Specialization') ?></label>

                                    <div class="col-sm-10">
                                        <select class="form-control" ng-model="registerInfo.specialization">
                                            <option value="Audiologist"><?= _('Audiologist') ?></option>
                                            <option value="Allergist"><?= _('Allergist') ?></option>
                                            <option value="Anesthesiologist"><?= _('Anesthesiologist') ?></option>
                                            <option value="Cardiologist"><?= _('Cardiologist') ?></option>
                                            <option value="Dentist"><?= _('Dentist') ?></option>
                                            <option value="Dermatologist"><?= _('Dermatologist') ?></option>
                                            <option value="Endocrinologist"><?= _('Endocrinologist') ?></option>
                                            <option value="Epidemiologist"><?= _('Epidemiologist') ?></option>
                                            <option value="Gynecologist"><?= _('Gynecologist') ?></option>
                                            <option value="Immunologist"><?= _('Immunologist') ?></option>
                                            <option
                                                value="Infectious Disease Specialist"><?= _('Infectious Disease Specialist') ?></option>
                                            <option
                                                value="Internal Medicine Specialist"><?= _('Internal Medicine Specialist') ?></option>
                                            <option value="Medical Geneticist"><?= _('Medical Geneticist') ?></option>
                                            <option value="Microbiologist"><?= _('Microbiologist') ?></option>
                                            <option value="Neonatologist"><?= _('Neonatologist') ?></option>
                                            <option value="Neurologist"><?= _('Neurologist') ?></option>
                                            <option value="Neurosurgeon"><?= _('Neurosurgeon') ?></option>
                                            <option value="Obstetrician"><?= _('Obstetrician') ?></option>
                                            <option value="Oncologist"><?= _('Oncologist') ?></option>
                                            <option value="Orthopedic Surgeon"><?= _('Orthopedic Surgeon') ?></option>
                                            <option value="ENT Specialist"><?= _('ENT Specialist') ?></option>
                                            <option value="Pediatrician"><?= _('Pediatrician') ?></option>
                                            <option value="Physiologist"><?= _('Physiologist') ?></option>
                                            <option value="Plastic Surgeon"><?= _('Plastic Surgeon') ?></option>
                                            <option value="Podiatrist"><?= _('Podiatrist') ?></option>
                                            <option value="Psychiatrist"><?= _('Psychiatrist') ?></option>
                                            <option value="Radiologist"><?= _('Radiologist') ?></option>
                                            <option value="Rheumatologist"><?= _('Rheumatologist') ?></option>
                                            <option value="Surgeon"><?= _('Surgeon') ?></option>
                                            <option value="Urologist"><?= _('Urologist') ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= _('Birthday') ?></label>

                                    <div class="col-sm-4">
                                        <input class="datepicker form-control" ng-model="registerInfo.birthday" perfect-datepicker>
                                    </div>
                                    <div class="col-sm-3 registerAvatar" perfect-uploader-preview>
                                        <input type="file" name="avatar" style="display: none;" ng-model="registerInfo.avatar">
                                        <a hred="#" class="thumbnail img-responsive col-sm-12 right-align-text">
                                            <img alt="avatar" src="../../../img/admin1.png">
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= ('Email') ?></label>

                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="<?= ('Email') ?>"
                                               ng-model="registerInfo.email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= ('Phone') ?></label>

                                    <div class="col-sm-10">
                                        <input type="phone" class="form-control" placeholder="<?= ('Phone') ?>"
                                               ng-model="registerInfo.phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= ('Address') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?= ('Address') ?>"
                                               ng-model="registerInfo.address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?= ('Zip code') ?></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="<?= ('Zip code') ?>"
                                               ng-model="registerInfo.zipCode">
                                    </div>
                                </div>
                            </div>
                            <div class="right-align-text col-xs-12">
                                <button type="submit" class="btn btn-success"><?= _('Register') ?></button>
                                <button type="submit" class="btn btn-success"><?= _('Update') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->


    <!-- Row start -->
    <div class="row no-gutter" ng-init="loadDoctorsList()">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="panel panel-blue">
                <div class="panel-heading">
                    <h4><?= _('Doctors') ?></h4>
                    <ul class="links">
                        <li>
                            <a href="#" ng-click="loadDoctorsList()">
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
                                <th style="width:20%" class="hidden-xs"><?= _('Specialization') ?></th>
                                <th style="width:10%" class="hidden-xs hidden-sm"><?= _('Date') ?></th>
                                <th style="width:10%" class="hidden-xs hidden-sm"><?= _('Action') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="doctor in doctorsList">
                                <td class="center-align-text">
                                    <img ng-src="doctor.avatar" alt="{{doctor.showName}}" class="img-circle">
                                </td>
                                <td>
                                    <span class="name" ng-bind="doctor.showName"></span>
                                </td>
                                <td class="hidden-xs">
                                <span class="label"
                                      ng-class="{
                                        'label-default' : doctor.specialization == 1,
                                        'label-info'    : doctor.specialization == 2,
                                        'label-danger'  : doctor.specialization == 3,
                                        'label-primary' : doctor.specialization == 4,
                                        'label-success' : doctor.specialization == 5,
                                        'label-warning' : doctor.specialization == 6
                                      }"
                                      ng-bind="doctor.specialization"></span>
                                </td>
                                <td class="hidden-xs hidden-sm" ng-bind="doctor.date"></td>
                                <td class="hidden-xs hidden-sm">
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-xs dropdown-toggle">
                                            <?= _('Action') ?>
                                            <span class="caret">
                                        </span>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#" ng-click="changeDoctorData(doctor)"><?= _('Edit') ?></a>
                                            </li>
                                            <li>
                                                <a href="#" ng-click="deleteDoctor(doctor)"><?= _('Delete') ?></a>
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