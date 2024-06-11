<?php

namespace Sidalex\BearCRMCore\Classes\Modules\DTO;

use Sidalex\BearCRMCore\Classes\Modules\DTO\Exception\DTOException;
use Sidalex\BearCRMCore\Classes\Utilities\DTOUtilities\DTOFromMetadataBuilder;

class DTOBasic implements ModuleDTOInterface
{
    protected \stdClass $dto;

    protected \stdClass $metadataDtoObj;

    /**
     * @param array<\stdClass> $dtoArray
     * @param \stdClass $metadataDtoObj
     */
    public function __construct(array $dtoArray, \stdClass $metadataDtoObj)
    {
        $dto2Obj = [];
        foreach ($dtoArray as $dto) {
            $dto2Obj = array_merge(DTOFromMetadataBuilder::buildDTOFromMetadata((array)$dto, $metadataDtoObj), $dto2Obj);
        }

        $this->dto = (object)$dto2Obj;
        unset($dto2Obj);
        $this->metadataDtoObj = $metadataDtoObj;
    }

    /**
     * @return mixed
     */
    public function getField(string $field_name): mixed
    {
        if (!property_exists($this->metadataDtoObj, $field_name)) {
            throw new DTOException("get non valid DTO prorerty {$field_name}. This property is not valid from metadata " . var_export($this->metadataDtoObj, 1),1);
        }
        if (!property_exists($this->dto, $field_name)) {
            return null;
        } else {
            return $this->dto->{$field_name};
        }
    }

    /**
     * @return string json from Dto object
     */
    public function getDtoJson(): string
    {
        return json_encode($this->dto);
    }
}