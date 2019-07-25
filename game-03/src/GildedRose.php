<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    const AGEDBRIE = 'Aged Brie';
    const BACKSTAGEPASSES = 'Backstage passes to a TAFKAL80ETC concert';
    const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    const CONJURED = 'Conjured Mana Cake';

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->name !== self::SULFURAS) {
            $this->sellIn -= 1;
        }

        switch ($this->name) {
            case self::AGEDBRIE:
                if ($this->quality < 50) {
                    $this->quality += $this->sellIn < 0 ? 2 : 1;
                }
                break;
            case self::BACKSTAGEPASSES:
                if ($this->sellIn < 0) {
                    $this->quality = 0;
                } else {
                    if ($this->quality < 50) {
                        $this->quality += $this->sellIn < 5 ? 3 : ($this->sellIn < 10 ? 2 : 1);
                    }
                }
                break;
            case self::CONJURED:
                if ($this->quality > 0) {
                    $this->quality -= $this->sellIn < 0 ? 4 : 2;
                }
                break;
            case self::SULFURAS:
                break;
            default:
                if ($this->quality > 0) {
                    $this->quality -= $this->sellIn < 0 ? (2 < 0 ? 0 : 2) : 1;
                }
                break;
        }

        $this->quality = $this->quality > 50 ? 50 : $this->quality;
    }
}
