<div ng-controller="workingTimesController" ng-init="init()" ng-cloak>
    <!-- Row start -->
    <div class="row no-gutter">
        <div class="col-md-3 col-sm-3 col-xs-12">

            <div class="btn-group">
                <label class="btn btn-rounded" ng-class="currentMonth == 'thisMonth' ? 'btn-primary' : 'btn-default'"
                    ng-click="changeMonth('thisMonth')">
                    <?= _('This Month') ?>
                </label>
                <label class="btn btn-rounded" ng-class="currentMonth == 'nextMonth' ? 'btn-primary' : 'btn-default'"
                       ng-click="changeMonth('nextMonth')">
                    <?= _('Next Month') ?>
                </label>
            </div>

            <div>
                <h4 ng-repeat="wt in dayWorkingTimes">
                    <span class="label label-info">
                        {{wt.startTime}} - {{wt.endTime}}
                    </span>
                </h4>
            </div>

        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">

            <table border="1" class="working-time-calendar">

                <tr class="week-days">
                    <td><?= _('Mon') ?></td>
                    <td><?= _('Tue') ?></td>
                    <td><?= _('Wed') ?></td>
                    <td><?= _('Thu') ?></td>
                    <td><?= _('Fri') ?></td>
                    <td><?= _('Sat') ?></td>
                    <td><?= _('Sun') ?></td>
                </tr>

                <tr ng-repeat="week in monthList track by $index">
                    <td ng-repeat="item in week track by $index" ng-click="daySelect(item)"
                        class="item" ng-class="{'disable' : item.disable}">
                        <div>
                            <div class="col-xs-6 left-align-text">
                                <span class="pu" ng-show="item.day">{{item.day}}</span>
                            </div>
                            <div class="col-xs-6 right-align-text icon-group">
                                <i ng-show="item.wait" class="fa fa-spinner fa-spin"></i>
                                <i ng-show="!item.wait && item.working" class="fa fa-check-circle"></i>
                            </div>
                        </div>
                        <div ng-repeat="wt in item.times" class="right-align-text">
                            <span class="label label-info">
                                {{wt.startTime}} - {{wt.endTime}}
                            </span>
                        </div>
                    </td>
                </tr>

            </table>

        </div>
    </div>

</div>


<style>

.working-time-calendar {
    table-layout: fixed;
    border-collapse: collapse;
    width: 100%;

    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.working-time-calendar td {
    padding: 0.25em 0.25em;
    width: 14%;
    height: 80px;
    text-align: left;
    vertical-align: top;
    background-color: #FFF;
    border-radius: 2px;
    box-shadow: none;
    border: 1px solid #CEE3F0;
}
.working-time-calendar .week-days td {
    padding: 0.25em 0.25em;
    width: 14%;
    height: 25px;
    text-align: center;
    vertical-align: middle;
    background-color: #FFF;
    border-radius: 2px;
    box-shadow: none;
    border: 1px solid #CEE3F0;
}
.working-time-calendar .item {
    -webkit-transition: .3s all;
       -moz-transition: .3s all;
            transition: .3s all;
}
.working-time-calendar .item.disable {
    background-color: #F8F8F8;
}
.working-time-calendar .item:not(.disable):hover {
    background-color: #CFEBF7;
    border: 1px solid #8DD0EC;
}
.working-time-calendar .item:not(.disable):active {
    background-color: #8DD0EC;
    border: 1px solid #337AB7;
}
.working-time-calendar .icon-group {
    color: #337AB7;
}
</style>