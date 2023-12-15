<?php
    return [
        '~^$~'=>[\core\controllers\RandomNumberGenerator::class, 'generateRandomNumber'],
        '~^([a-zA-Z0-9]+)$~'=>[\core\controllers\RandomNumberGenerator::class, 'getGeneratedNumber'],
    ];