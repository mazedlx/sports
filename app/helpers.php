<?php

if (! function_exists('getRanking')) {
    function getRanking($data, $sort)
    {
        $oldValue = 1;
        'up' === $sort ? asort($data) : arsort($data);
        $tabledata = [];
        $i = 1;
        $n = 0;
        foreach ($data as $name => $value) {
            $show = $i;
            $n = 0;
            if ($oldValue === $value) { // ex aequo
                $show = $i - 1 - $n;
                $n++;
            }
            $oldValue = $value;

            $tabledata[] = [
                $show,
                $name,
                number_format($value, 3, ',', '.'),
            ];
            $i++;
        }

        return $tabledata;
    }
}
