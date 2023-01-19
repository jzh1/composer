<?php

if (!function_exists('array_test')){
    function  array_test()
    {
        return 111;
    }
}
/**
 * 只优化年月日
 */
if (!function_exists('toDateChinese')){
    function toDateChinese($date)
    {
        $date = explode(' ', $date);
        $date_arr = explode('-', reset($date));
        $arr = [];
        foreach ($date_arr as $index => &$val) {
            if (mb_strlen($val) == 4) {
                $arr[] = preg_split('/(?<!^)(?!$)/u', $val);
            } else {
                if ($val > 10) {
                    $v[] = 10;
                    $v[] = $val % 10;
                    $arr[] = $v;
                    unset($v);
                } else {
                    $arr[][] = $val;
                }
            }
        }

        $i = 0;
        foreach ($arr as $item) {
            dd($item);
            $str_time .= $item;
            if ($i == 0) {
                $str_time .= '年';
            } elseif ($i == 1) {
                $str_time .= '月';
            } elseif ($i == 2) {
                $str_time .= '日';
            }
            $i++;
        }

        /*$cn = array("一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "零");
        $num = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "0");
        $str_time = '';
        for ($i = 0; $i < count($arr); $i++) {
            foreach ($arr[$i] as $index => $item) {
                $str_time .= $cn[array_search($item, $num)];
            }
            if ($i == 0) {
                $str_time .= '年';
            } elseif ($i == 1) {
                $str_time .= '月';
            } elseif ($i == 2) {
                $str_time .= '日';
            }
        }*/
        return $str_time;
    }
}


if (!function_exists('toDateChineseForMD')){
    function toDateChineseForMD($date)
    {
        $date = explode(' ', $date);
        $date_arr = explode('-', reset($date));
        /*$arr = [];
        foreach ($date_arr as $index => &$val) {
            if (mb_strlen($val) == 4) {
                $arr[] = preg_split('/(?<!^)(?!$)/u', $val);
            } else {
                if ($val > 10) {
                    $v[] = 10;
                    $v[] = $val % 10;
                    $arr[] = $v;
                    unset($v);
                } else {
                    $arr[][] = $val;
                }
            }
        }*/

        $i = 0;
        $str_time = '';
        foreach ($date_arr as $item) {
            $str_time .= $item;
            if ($i == 0) {
                $str_time .= '年';
            } elseif ($i == 1) {
                $str_time .= '月';
            } elseif ($i == 2) {
                $str_time .= '日';
            }
            $i++;
        }

        /*$cn = array("一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "零");
        $num = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "0");
        $str_time = '';
        for ($i = 0; $i < count($arr); $i++) {
            foreach ($arr[$i] as $index => $item) {
                $str_time .= $cn[array_search($item, $num)];
            }
            if ($i == 0) {
                $str_time .= '年';
            } elseif ($i == 1) {
                $str_time .= '月';
            } elseif ($i == 2) {
                $str_time .= '日';
            }
        }*/
        $str_time = mb_substr($str_time,5,22,"utf-8");
        return $str_time;
    }
}


/*if (!function_exists('dd')){
    function dd(...$args)
    {
        http_response_code(500);

        foreach ($args as $x) {
            var_dump($x);
        }

        die(1);
    }
}

if (!function_exists('dump')){
    function dump(...$args)
    {
        http_response_code(500);

        foreach ($args as $x) {
            var_dump($x);
        }
    }
}*/

