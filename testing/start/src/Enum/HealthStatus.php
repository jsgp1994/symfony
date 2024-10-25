<?php

namespace App\Enum;

enum HealthStatus: string
{
    case HEALTY = 'Healthy';
    case SICK = 'Sick';
}
