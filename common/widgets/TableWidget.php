<?php


namespace common\widgets;


class TableWidget
{
    public static function getResponse($recordResult)
    {
        function htmlSuccess(bool $recordResult): string
        {
            if ($recordResult) {
                return "<p>Success</p>";
            }
            else return "<p>Error</p>";
        }
        function htmlTable(array $recordResult): string
        {
            $drawResult = [];
            $keys = array_keys($recordResult[0]);
            $drawResult[]= "<table><tr>";
            foreach ($keys as $key) {
                $drawResult[]= "<th> $key </th>";
            }
            $drawResult[]= "</tr>";
            foreach ($recordResult as $columns) {
                $drawResult[]= "<tr>";
                foreach ($columns as $column) {
                    $drawResult[]= "<td> $column </td>";
                }
                $drawResult[]= "</tr>";
            }
            return implode($drawResult);
        }


        if (is_array($recordResult)) {
            return htmlTable($recordResult);
        }
        elseif (is_bool($recordResult)) {
            htmlSuccess($recordResult);
        }
    }
}