<?php

declare(strict_types=1);

/**
 * Mengubah angka menjadi format Rupiah.
 */
if (!function_exists('rupiah')) {
    function rupiah(int $amount): string
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}

/**
 * Alias untuk format Rupiah.
 */
if (!function_exists('formatRupiah')) {
    function formatRupiah(int $amount): string
    {
        return rupiah($amount);
    }
}

/**
 * Memeriksa status kursus berdasarkan kuota.
 */
if (!function_exists('statusKursus')) {
    function statusKursus(int $quota, int $registered): string
    {
        return $registered >= $quota ? 'Penuh' : 'Tersedia';
    }
}

/**
 * Menghitung sisa kursi kursus.
 */
if (!function_exists('sisaKursi')) {
    function sisaKursi(int $quota, int $registered): int
    {
        return max(0, $quota - $registered);
    }
}

/**
 * Memformat tanggal menjadi hari-bulan-tahun.
 */
if (!function_exists('formatTanggal')) {
    function formatTanggal(string $date): string
    {
        try {
            $value = new DateTimeImmutable($date);
            return $value->format('d-m-Y');
        } catch (Exception $exception) {
            return 'Tanggal tidak valid';
        }
    }
}

/**
 * Mengamankan teks sebelum ditampilkan dalam HTML.
 */
if (!function_exists('e')) {
    function e(mixed $value): string
    {
        return htmlspecialchars(
            (string) $value,
            ENT_QUOTES | ENT_SUBSTITUTE,
            'UTF-8'
        );
    }
}

/**
 * Mencari kursus berdasarkan kode.
 */
if (!function_exists('findCourse')) {
    function findCourse(array $courses, string $code): ?array
    {
        foreach ($courses as $course) {
            if (($course['code'] ?? '') === $code) {
                return $course;
            }
        }

        return null;
    }
}

/**
 * Mengambil persentase diskon berdasarkan jenis peserta.
 */
if (!function_exists('getDiscountPercent')) {
    function getDiscountPercent(string $participantType): int
    {
        switch ($participantType) {
            case 'mahasiswa':
                return 20;

            case 'guru':
                return 15;

            default:
                return 0;
        }
    }
}

/**
 * Mengubah kode mode belajar menjadi label.
 */
if (!function_exists('getLearningModeLabel')) {
    function getLearningModeLabel(string $mode): string
    {
        switch ($mode) {
            case 'offline':
                return 'Tatap Muka';

            case 'online':
                return 'Online';

            case 'hybrid':
                return 'Hybrid';

            default:
                return 'Tidak diketahui';
        }
    }
}
