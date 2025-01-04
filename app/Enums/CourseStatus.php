<?php

namespace App\Enums;

enum CourseStatus:int
{
    case BORRADOR = 1;
    case PENDIENTE = 2;
    case PUBLICADO = 3;
}
