<div ng-controller="workingTimesController" ng-cloak>

    <table class="table" ng-init="renderMonth()">

        <tr ng-repeat="week in monthList track by $index">
            <td ng-repeat="day in week track by $index">
                <span ng-show="day">{{day}}</span>

            </td>
        </tr>

    </table>

</div>