<?php


use EvdigiIna\Generalhelper\MataUang;

/**
 * Check the sidebar menu with the current Uri
 */

if (!function_exists('is_active_menu')) {
    function is_active_menu(string|array $route): string
    {
        $activeClass = ' active';

        if (is_string($route)) {
            if (request()->is(substr($route . '*', 1))) {
                return $activeClass;
            }

            if (request()->is(str($route)->slug() . '*')) {
                return $activeClass;
            }

            if (request()->segment(2) == str($route)->before('/')) {
                return $activeClass;
            }

            if (request()->segment(3) == str($route)->after('/')) {
                return $activeClass;
            }
        }

        if (is_array($route)) {
            foreach ($route as $value) {
                $actualRoute = str($value)->remove(' view')->plural();

                if (request()->is(substr($actualRoute . '*', 1))) {
                    return $activeClass;
                }

                if (request()->is(str($actualRoute)->slug() . '*')) {
                    return $activeClass;
                }

                if (request()->segment(2) == $actualRoute) {
                    return $activeClass;
                }

                if (request()->segment(3) == $actualRoute) {
                    return $activeClass;
                }
            }
        }

        return '';
    }
}

if (!function_exists('rupiah')) {
    function rupiah(int|float $number): string
    {
        return MataUang::rupiah($number);
    }
}

if (!function_exists('rupiah_idr')) {
    function rupiah(int|float $number): string
    {
        return MataUang::rupiahIdr($number);
    }
}

if (!function_exists('rupiah_no_prefix')) {
    function rupiah_no_prefix(int|float $number): string
    {
        return str(MataUang::rupiahNoPrefix($number));
    }
}

/**
 * Membuat kalimat bilangan terbilang dari sebuah angka dalam rupiah.
 */
if (!function_exists('rupiah_terbilang')) {
    function rupiah_terbilang(int|float $number): string
    {
        return MataUang::rupiahTerbilang($number);
    }
}
