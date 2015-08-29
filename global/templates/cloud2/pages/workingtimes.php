<div ng-controller="workingTimesController" ng-cloak>
    <!-- Row start -->
    <div class="row no-gutter">
        <div class="col-md-4 col-sm-4 col-xs-12">

        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">

            <table border="1" ng-init="renderMonth()" class="g">

                <tr>
                    <td><?= _('Mon') ?></td>
                    <td><?= _('Tue') ?></td>
                    <td><?= _('Wed') ?></td>
                    <td><?= _('Thu') ?></td>
                    <td><?= _('Fri') ?></td>
                    <td><?= _('Sat') ?></td>
                    <td><?= _('Sun') ?></td>
                </tr>

                <tr ng-repeat="week in monthList track by $index">
                    <td ng-repeat="item in week track by $index" ng-click="daySelect(item)">
                        <span ng-show="item.day">{{item}}</span>
                    </td>
                </tr>

            </table>

        </div>
    </div>

</div>


<style>

.g {
    table-layout: fixed;
    border-collapse: collapse;
    width: 100%;
}
.g td {
    padding: 0.25em 0.25em;
    width: 14%;
    height: 80px;
    text-align: left;
    vertical-align: top;
}

</style>