<?php
namespace ThisIsAreku\PhpAmiibo;

class AmiiboDump {
    private $data;
    public function __construct($filePath)
    {
        $fp = fopen($filePath, 'rb');
        fseek($fp, 0x54);
        $rawData = fread($fp, 0x08);
        $this->data = unpack('C*', $rawData);
        fclose($fp);
    }

    public function getData(): array
    {
        return $this->data;
    }

    private function at(int $index): int
    {
        return $this->data[$index+1];
    }

    public function getHexFullId(): string
    {
        return join(array_map(function ($e) {
            return sprintf('%02X', $e);
        }, $this->data));
    }

    public function getGameSerie(): int
    {
        return ($this->at(0) << 4) | ($this->at(1)) >> 4;
    }

    public function getHexGameSerie(): string
    {
        return sprintf('%03X', $this->getGameSerie());
    }

    public function getCharacter(): int
    {
        return $this->at(1);
    }

    public function getHexCharacter(): string
    {
        return sprintf('%03X', $this->getGameSerie());
    }

    public function getType(): int
    {
        return $this->at(3);
    }

    public function getHexType(): string
    {
        return sprintf('%02X', $this->getType());
    }

    public function getAmiibo(): int
    {
        return ($this->at(4) << 8) | $this->at(5);
    }

    public function getHexAmiibo(): string
    {
        return sprintf('%04X', $this->getAmiibo());
    }

    public function getAmiiboSerie(): int
    {
        return $this->at(6);
    }

    public function getHexAmiiboSerie(): string
    {
        return sprintf('%02X', $this->getAmiiboSerie());
    }

    public function get02(): int
    {
        return $this->at(7);
    }

    public function getHex02(): string
    {
        return sprintf('%02X', $this->get02());
    }
}
