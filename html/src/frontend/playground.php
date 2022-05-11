<?php

use CandidateTest\Group01\ArrayBasics;

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

$employees = \CandidateTest\Group01\Types\Employee::getSampleEmployees();

echo '<pre>' . print_r($employees, true) . '</pre>';
