<div ng-controller="workingTimesController" ng-cloak>

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
            <td ng-repeat="day in week track by $index">
                <span ng-show="day">{{day}}</span>

            </td>
        </tr>

    </table>

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