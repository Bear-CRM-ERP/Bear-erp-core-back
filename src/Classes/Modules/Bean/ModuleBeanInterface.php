<?php

namespace Sidalex\BearCRMCore\Classes\Modules\Bean;

use Sidalex\BearCRMCore\Classes\Modules\DTO\ModuleDTOInterface;

interface ModuleBeanInterface
{
    public function getFullDTOById(string $id): ModuleDTOInterface;

    public function getLiteDTOById(string $id): ModuleDTOInterface;

    /**
     * @param string $id
     * @param array<string> $property example = ['name','dateCreate']
     * @return ModuleDTOInterface
     */
    public function getLimitPropertyPDTOById(string $id, array $property): ModuleDTOInterface;

    /**
     * @param array $field example  = [ name = 'ExampleName', date='ExampleDate']
     * @return ModuleDTOInterface
     */
    public function getFullDTOByField(array $field): ModuleDTOInterface;

    /**
     * @param array $field example  = [ name = 'ExampleName', date='ExampleDate']
     * @return ModuleDTOInterface
     */
    public function getLiteDTOByField(array $field): ModuleDTOInterface;

    /**
     * @param array $field example  = [ name = 'ExampleName', date='ExampleDate']
     * @param array $property example  = [ name = 'ExampleName', date='ExampleDate']
     * @return ModuleDTOInterface
     */
    public function getLimitPropertyPDTOByField(array $field, array $property): ModuleDTOInterface;


}