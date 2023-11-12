<?php

namespace App\Entity;

use App\Repository\QuantityRepository;
use App\Trait\EntityTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: QuantityRepository::class)]
class Quantity
{
    use EntityTrait;

    // https://github.com/PhpUnitsOfMeasure/php-units-of-measure

    public const TYPE_AMOUNT = 'amount';

    public const TYPES = [
        self::TYPE_AMOUNT,
    ];

    #[ORM\Column(type: 'string')]
    private string $type = self::TYPE_AMOUNT;

    #[ORM\Column(type: 'float', nullable: true)]
    private float $value = 0;

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }
}
