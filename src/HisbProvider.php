<?php

namespace QuranData;

/**
 * HisbProvider - A PHP provider for Qur'an Hizb data
 * 
 * This class provides access to the 60 hizbs of the Qur'an with both
 * top-down and bottom-up numbering, making it easy to integrate into
 * Islamic applications, educational platforms, or research projects.
 * 
 * @author Taleb Mohammed Reda <talebmedreda@gmail.com>
 * @version 1.0.0
 * @license MIT
 */
class HisbProvider
{
    /**
     * @var array The hizbs data loaded from JSON
     */
    private static $hizbs = null;

    /**
     * Load hizbs data from JSON file
     * 
     * @return array The hizbs data
     */
    private static function loadHizbs(): array
    {
        if (self::$hizbs === null) {
            $jsonPath = __DIR__ . '/../data/hizbs.json';
            
            if (!file_exists($jsonPath)) {
                throw new \RuntimeException("Hizbs data file not found at: {$jsonPath}");
            }
            
            $jsonContent = file_get_contents($jsonPath);
            if ($jsonContent === false) {
                throw new \RuntimeException("Failed to read hizbs data file");
            }
            
            $data = json_decode($jsonContent, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException("Invalid JSON in hizbs data file: " . json_last_error_msg());
            }
            
            self::$hizbs = $data['hizbs'] ?? [];
        }
        
        return self::$hizbs;
    }

    /**
     * Get all hizbs
     * 
     * @return array Array of all hizbs
     */
    public static function getAllHizbs(): array
    {
        return self::loadHizbs();
    }

    /**
     * Get a hizb by its ID
     * 
     * @param int $id The hizb ID (1-60)
     * @return array|null The hizb data or null if not found
     */
    public static function getHizbById(int $id): ?array
    {
        $hizbs = self::loadHizbs();
        
        foreach ($hizbs as $hizb) {
            if ($hizb['id'] === $id) {
                return $hizb;
            }
        }
        
        return null;
    }

    /**
     * Get a hizb by its order (top-down numbering: 1-60)
     * 
     * @param int $order The order from top to down (1-60)
     * @return array|null The hizb data or null if not found
     */
    public static function getHizbByOrderUpToDown(int $order): ?array
    {
        $hizbs = self::loadHizbs();
        
        foreach ($hizbs as $hizb) {
            if ($hizb['order_up_to_down'] === $order) {
                return $hizb;
            }
        }
        
        return null;
    }

    /**
     * Get a hizb by its order (bottom-up numbering: 1-60)
     * 
     * @param int $order The order from bottom to top (1-60)
     * @return array|null The hizb data or null if not found
     */
    public static function getHizbByOrderDownToTop(int $order): ?array
    {
        $hizbs = self::loadHizbs();
        
        foreach ($hizbs as $hizb) {
            if ($hizb['order_down_to_top'] === $order) {
                return $hizb;
            }
        }
        
        return null;
    }

    /**
     * Get hizbs by surah name (start or end surah)
     * 
     * @param string $surahName The name of the surah
     * @return array Array of hizbs that start or end with the given surah
     */
    public static function getHizbsBySurah(string $surahName): array
    {
        $hizbs = self::loadHizbs();
        $result = [];
        
        foreach ($hizbs as $hizb) {
            if ($hizb['start_surah'] === $surahName || $hizb['end_surah'] === $surahName) {
                $result[] = $hizb;
            }
        }
        
        return $result;
    }

    /**
     * Search hizbs by name (Arabic or transliteration)
     * 
     * @param string $name The name to search for
     * @param bool $exactMatch Whether to perform exact match or partial match
     * @return array Array of matching hizbs
     */
    public static function searchHizbsByName(string $name, bool $exactMatch = false): array
    {
        $hizbs = self::loadHizbs();
        $result = [];
        
        foreach ($hizbs as $hizb) {
            if ($exactMatch) {
                if ($hizb['name'] === $name) {
                    $result[] = $hizb;
                }
            } else {
                if (strpos($hizb['name'], $name) !== false) {
                    $result[] = $hizb;
                }
            }
        }
        
        return $result;
    }

    /**
     * Get the total number of hizbs
     * 
     * @return int The total count of hizbs
     */
    public static function getHizbCount(): int
    {
        return count(self::loadHizbs());
    }

    /**
     * Get hizbs in a specific range by order (up-to-down)
     * 
     * @param int $startOrder The starting order (inclusive)
     * @param int $endOrder The ending order (inclusive)
     * @return array Array of hizbs in the specified range
     */
    public static function getHizbsInRange(int $startOrder, int $endOrder): array
    {
        $hizbs = self::loadHizbs();
        $result = [];
        
        foreach ($hizbs as $hizb) {
            $order = $hizb['order_up_to_down'];
            if ($order >= $startOrder && $order <= $endOrder) {
                $result[] = $hizb;
            }
        }
        
        // Sort by order_up_to_down
        usort($result, function($a, $b) {
            return $a['order_up_to_down'] <=> $b['order_up_to_down'];
        });
        
        return $result;
    }

    /**
     * Get a random hizb
     * 
     * @return array A randomly selected hizb
     */
    public static function getRandomHizb(): array
    {
        $hizbs = self::loadHizbs();
        
        if (empty($hizbs)) {
            throw new \RuntimeException("No hizbs available");
        }
        
        $randomIndex = array_rand($hizbs);
        return $hizbs[$randomIndex];
    }

    /**
     * Validate if a hizb ID is valid
     * 
     * @param int $id The hizb ID to validate
     * @return bool True if valid, false otherwise
     */
    public static function isValidHizbId(int $id): bool
    {
        return $id >= 1 && $id <= 60;
    }

    /**
     * Validate if a hizb order is valid
     * 
     * @param int $order The order to validate
     * @return bool True if valid, false otherwise
     */
    public static function isValidHizbOrder(int $order): bool
    {
        return $order >= 1 && $order <= 60;
    }

    /**
     * Get hizb data as JSON string
     * 
     * @param int|null $hizbId Optional specific hizb ID, or null for all hizbs
     * @param int $flags JSON encoding flags
     * @return string JSON representation of hizb(s)
     */
    public static function toJson(?int $hizbId = null, int $flags = JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE): string
    {
        if ($hizbId !== null) {
            $data = self::getHizbById($hizbId);
            if ($data === null) {
                throw new \InvalidArgumentException("Hizb with ID {$hizbId} not found");
            }
        } else {
            $data = ['hizbs' => self::getAllHizbs()];
        }
        
        return json_encode($data, $flags);
    }

    /**
     * Get hizb data formatted for XML export
     * 
     * @return string XML representation of all hizbs
     */
    public static function toXml(): string
    {
        $hizbs = self::getAllHizbs();
        $xml = new \SimpleXMLElement('<hizbs/>');
                
        foreach ($hizbs as $hizbData) {
            $hizb = $xml->addChild('hizb');
            foreach ($hizbData as $key => $value) {
                $hizb->addChild($key, htmlspecialchars($value, ENT_XML1, 'UTF-8'));
            }
        }
        
        return $xml->asXML();
    }
} 