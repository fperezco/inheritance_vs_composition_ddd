<?php

namespace App\Tests\Resources\Factory\FactoryTraits;

use App\Application\UseCase\Department\GetDepartmentsInContentManagement\GetDepartmentsInContentManagementQuery;
use App\Application\UseCase\Department\GetDepartmentsInUserManagement\GetDepartmentsInUserManagementQuery;
use App\Application\UseCase\Department\UpdateDepartment\UpdateDepartmentCommand;
use App\Domain\Department\Entity\Department;
use App\Domain\Department\Entity\DepartmentName;
use App\Domain\Shared\ValueObject\Uuid;


trait DepartmentFactoryTrait
{
    public function getValidDepartment(string $departmentName = null): Department
    {
        if(!$departmentName){
            return new Department($this->getValidUUid(), $this->getValidDepartmentName());
        }
        else{
            return new Department($this->getValidUUid(), new DepartmentName($departmentName));
        }

    }

    public function getValidDepartmentWithUuidName(string $uuid, string $departmentName): Department
    {
        return new Department(new Uuid($uuid), new DepartmentName($departmentName));
    }

    public function getValidUpdateDepartmentCommand(): UpdateDepartmentCommand
    {
        return new UpdateDepartmentCommand($this->getValidUUid()->value(), $this->getValidDepartmentName()->value());
    }

    public function getValidDepartmentName(): DepartmentName
    {
        return new DepartmentName($this->faker->regexify('[a-z]{10}'));
    }

    public function getValidDepartmentsCollection(): iterable
    {
        $departments = [];
        $departments[] = new Department($this->getValidUUid(),$this->getValidDepartmentName());
        return $departments;
    }

    public function getValidDomainsCollection(): iterable
    {
        $domains1 = $this->getValidMailDomain();
        $domains2 = $this->getValidMailDomain();
        return [$domains1, $domains2];
    }

    public function getValidGetDepartmentsInUserManagementQuery(
        string $requestUserUUid = null): GetDepartmentsInUserManagementQuery
    {
        $requestUserUuid = $requestUserUUid ?: $this->getValidUUid()->value();
        return new GetDepartmentsInUserManagementQuery($requestUserUuid);
    }

    public function getValidGetDepartmentsInContentManagementQuery(
        string $requestUserUUid = null): GetDepartmentsInContentManagementQuery
    {
        $requestUserUuid = $requestUserUUid ?: $this->getValidUUid()->value();
        return new GetDepartmentsInContentManagementQuery($requestUserUuid);
    }
}