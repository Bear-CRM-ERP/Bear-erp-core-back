<?php

namespace Sidalex\BearCRMCore\Classes\Modules\DTO;


interface ModuleDTOInterface
{
    public function __construct(array $dtoArray, \stdClass $metadataDtoObj);

    /** getting Params from DTO object
     * @param string $field_name
     * @return mixed value params
     */
    public function getField(string $field_name): mixed;

    /**
     * @return string json from Dto object
     */
    public function getDtoJson(): string;
}