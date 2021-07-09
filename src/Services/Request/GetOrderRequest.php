<?php

namespace Malinoff\PlastekBundle\Services\Request;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class GetOrderRequest extends BaseRequest
{
    /**
     * @var string|null
     */
    private $uuidOrder;

    public function getAction(): string
    {
        return sprintf('/api/%s/Shipment/%s/%s/Get',
            $this->version,
            $this->uuid,
            $this->ticks
        );
    }

    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    public function getQuery(): array
    {
        return [
            'uuidOrder' => $this->uuidOrder,
        ];
    }

    public function setUuidOrder(?string $uuidOrder): self
    {
        $this->uuidOrder = $uuidOrder;

        return $this;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        parent::loadValidatorMetadata($metadata);

        $metadata->addPropertyConstraint('uuidOrder', new Assert\NotBlank([
            'groups' => ['request'],
        ]));
    }
}