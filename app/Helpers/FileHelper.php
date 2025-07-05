<?php

namespace App\Helpers;

class FileHelper
{
    /**
     * Format bytes into a human-readable string (KB, MB, GB, etc.).
     *
     * @param int $bytes The number of bytes.
     * @param int $precision The number of decimal places.
     * @return string The formatted size.
     */
    public static function formatBytes(int $bytes, int $precision = 2): string
    {
        if ($bytes === 0) return '0 Bytes';

        $base = log($bytes, 1024);
        $suffixes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];

        $index = floor($base);
        if ($index < 0 || $index >= count($suffixes)) {
            // Handle potential edge cases or extremely large numbers
            // For simplicity, return in bytes or highest known unit
            $index = $index < 0 ? 0 : count($suffixes) - 1;
        }

        return round(pow(1024, $base - $index), $precision) . ' ' . $suffixes[$index];
    }

    /**
     * Get a Font Awesome icon class name based on the file's MIME type.
     *
     * @param string|null $mimeType The MIME type of the file.
     * @return string The Font Awesome icon class.
     */
    public static function getIconForMimeType(?string $mimeType): string
    {
        if (!$mimeType) {
            return 'fa-file'; // Default icon
        }

        // Simplified mapping - expand as needed
        if (str_starts_with($mimeType, 'image/')) {
            return 'fa-file-image';
        }
        if (str_starts_with($mimeType, 'audio/')) {
            return 'fa-file-audio';
        }
        if (str_starts_with($mimeType, 'video/')) {
            return 'fa-file-video';
        }

        return match ($mimeType) {
            'application/pdf' => 'fa-file-pdf',
            'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'fa-file-word',
            'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'fa-file-excel',
            'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'fa-file-powerpoint',
            'application/zip', 'application/x-rar-compressed', 'application/x-7z-compressed' => 'fa-file-archive',
            'text/plain' => 'fa-file-alt',
            'text/csv' => 'fa-file-csv',
            default => 'fa-file', // Generic file icon for others
        };
    }
}
