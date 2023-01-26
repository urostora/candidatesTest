<?php

namespace CandidateTest\Group01\Types;

class Employee
{
    public string $name;
    public \DateTime $birthday;
    public \DateTime $hiredOn;
    public string $group;
    public int $salary;

    /**
     * Create sample array of employee data
     *
     * @param array{'name': string, 'birthday': string, 'hiredOn': string, 'group': string, 'salary': int} $data
     *
     * @return Employee
     *
     */
    public static function createFromData(array $data): Employee
    {
        $ret = new Employee();

        $ret->name = $data['name'];
        $ret->birthday = \DateTime::createFromFormat('Y-m-d', $data['birthday']);
        $ret->hiredOn = \DateTime::createFromFormat('Y-m-d', $data['hiredOn']);
        $ret->group = $data['group'];
        $ret->salary = (int)$data['salary'];

        return $ret;
    }

    /**
     * @return Employee[]
     */
    public static function getSampleEmployees(): array
    {
        $sampleData = [
            ['name' => 'Sam Smith', 'birthday' => '1968-12-18', 'hiredOn' => '2021-05-06', 'group' => 'Accounting', 'salary' => 45000],
            ['name' => 'Amy Adams', 'birthday' => '1974-08-22', 'hiredOn' => '2015-04-01', 'group' => 'CEO', 'salary' => 250000],
            ['name' => 'Joe Compostor', 'birthday' => '1991-08-25', 'hiredOn' => '2008-11-11', 'group' => 'Accounting', 'salary' => 70000],
            ['name' => 'Mary White', 'birthday' => '1955-11-30', 'hiredOn' => '2022-02-01', 'group' => 'Cleaning', 'salary' => 25000],
            ['name' => 'Keith Black', 'birthday' => '1987-07-18', 'hiredOn' => '2012-10-01', 'group' => 'IT', 'salary' => 65000],
            ['name' => 'Sue Pollack', 'birthday' => '1994-02-02', 'hiredOn' => '2020-01-21', 'group' => 'IT', 'salary' => 55000],
            ['name' => 'Anna Lena', 'birthday' => '1977-03-15', 'hiredOn' => '2007-06-14', 'group' => 'Cleaning', 'salary' => 32000],
            ['name' => 'Victor Gray', 'birthday' => '1997-10-17', 'hiredOn' => '2010-05-08', 'group' => 'Sales', 'salary' => 52000],
            ['name' => 'Alex White', 'birthday' => '1983-01-09', 'hiredOn' => '2018-12-01', 'group' => 'Sales', 'salary' => 37000],
        ];

        return array_map(
            fn($data) => Employee::createFromData($data),
            $sampleData,
        );
    }

    public function __toString()
    {
        $birthday = $this->birthday->format('Y-m-d');
        $hiredOn = $this->birthday->format('Y-m-d');

        return "{$this->name} [{$birthday}, hired on {$hiredOn}] group: {$this->group}, salary: {$this->salary}";
    }
}
