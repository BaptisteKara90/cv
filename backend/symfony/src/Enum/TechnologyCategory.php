<?php

namespace App\Enum;

enum TechnologyCategory: string
{
    case FRONTEND = 'frontend';
    case BACKEND = 'backend';
    case DEVOPS = 'devops';
    case SGBD = 'sgbd';
    case CICD = 'ci_cd';
    case TOOLS = 'tools';
    case OTHER = 'other';
}
