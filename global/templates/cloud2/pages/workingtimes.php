<div ng-controller="workingTimesController">

    <table class="table">

        <tr ng-repeat="week in month">
            <td ng-repeat="day in week">
                {{day}}
            </td>
        </tr>

    </table>

</div>