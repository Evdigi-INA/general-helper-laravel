<?php

namespace Evdigi\Generalhelper;

/**
 * Basic Calculator.
 *
 */
class MataUang
{
    /**
     * Menjumlahkan semua data dalam sebuah array.
     *
     * @param array $data
     * @return integer
     */
    public static function rupiah($angka, $decimals = 2)
    {
        if($decimals < 0) {
            $decimals = 0;
        }

        $hasil_rupiah = "Rp " . number_format($angka, $decimals, ',', '.');
        return $hasil_rupiah;
    }

    private static function terbilangInRupiah($number) {
        // buat array bilangan
        $bilangan = array(
            '',
            'Satu',
            'Dua',
            'Tiga',
            'Empat',
            'Lima',
            'Enam',
            'Tujuh',
            'Delapan',
            'Sembilan',
            'Sepuluh',
            'Sebelas'
        );

        // cek apakah bilangan kurang dari sama dengan 11
        if ($number < 12) {
            return $bilangan[$number];
        } else if ($number < 20) {
            // bilangan puluhan
            return $bilangan[$number - 10] . ' Belas';
        } else if ($number < 100) {
            // bilangan ratusan
            $hasil_bagi = (int)($number / 10);
            $hasil_mod = $number % 10;
            return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
        } else if ($number < 200) {
            // bilangan ribuan
            return sprintf('Seratus %s', self::terbilangInRupiah($number - 100));
        } else if ($number < 1000) {
            // bilangan ribuan
            $hasil_bagi = $number / 100;
            $hasil_mod = $number % 100;
            return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], self::terbilangInRupiah($hasil_mod)));
        } else if ($number < 2000) {
            // bilangan ribuan
            return trim(sprintf('Seribu %s', self::terbilangInRupiah($number - 1000)));
        } else if ($number < 1000000) {
            // bilangan jutaan
            $hasil_bagi = $number / 1000;
            $hasil_mod = $number % 1000;
            return sprintf('%s Ribu %s', self::terbilangInRupiah($hasil_bagi), self::terbilangInRupiah($hasil_mod));
        } else if ($number < 1000000000) {
            // bilangan milyaran
            $hasil_bagi = $number / 1000000;
            $hasil_mod = $number % 1000000;
            return trim(sprintf('%s Juta %s', self::terbilangInRupiah($hasil_bagi), self::terbilangInRupiah($hasil_mod)));
        } else if ($number < 1000000000000) {
            // bilangan trilyunan
            $hasil_bagi = $number / 1000000000;
            $hasil_mod = fmod($number, 1000000000);
            return trim(sprintf('%s Milyar %s', self::terbilangInRupiah($hasil_bagi), self::terbilangInRupiah($hasil_mod)));
        } else if ($number < 1000000000000000) {
            // bilangan quadrilyunan
            $hasil_bagi = $number / 1000000000000;
            $hasil_mod = fmod($number, 1000000000000);
            return trim(sprintf('%s Trilyun %s', self::terbilangInRupiah($hasil_bagi), self::terbilangInRupiah($hasil_mod)));
        } else {
            return 'Wow...';
        }
    }

    /**
     * Membuat kalimat bilangan terbilang dari sebuah angka dalam rupiah.
     *
     * @param array $number
     * @return integer
     */

    public static function rupiahTerbilang($number) {
        return self::terbilangInRupiah($number) . ' Rupiah';
    }
}
