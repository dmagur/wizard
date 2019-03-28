<?php
    $config = array(
        'get-wizard' => array(
            'class' => 'SSH\Controllers\WizardController',
            'method' => 'get'
        ),
        'post-wizard' => array(
            'class' => 'SSH\Controllers\WizardController',
            'method' => 'post'
        ),
        'delete-wizard' => array(
            'class' => 'SSH\Controllers\WizardController',
            'method' => 'delete'
        ),
        'get-question' => array(
            'class' => 'SSH\Controllers\QuestionController',
            'method' => 'get'
        ),
        'post-question' => array(
            'class' => 'SSH\Controllers\QuestionController',
            'method' => 'post'
        ),
        'delete-question' => array(
            'class' => 'SSH\Controllers\QuestionController',
            'method' => 'delete'
        )
    );

    return $config;