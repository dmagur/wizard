<?php
    $config = array(
        'get-wizard' => array(
            'class' => SSH\Controllers\WizardController::class,
            'method' => 'get'
        ),
        'post-wizard' => array(
            'class' => SSH\Controllers\WizardController::class,
            'method' => 'post'
        ),
        'delete-wizard' => array(
            'class' => SSH\Controllers\WizardController::class,
            'method' => 'delete'
        ),
        'get-question' => array(
            'class' => SSH\Controllers\QuestionController::class,
            'method' => 'get'
        ),
        'post-question' => array(
            'class' => SSH\Controllers\QuestionController::class,
            'method' => 'post'
        ),
        'delete-question' => array(
            'class' => SSH\Controllers\QuestionController::class,
            'method' => 'delete'
        ),
        'post-answer' => array(
            'class' => SSH\Controllers\AnswerController::class,
            'method' => 'post'
        ),
        'delete-answer' => array(
            'class' => SSH\Controllers\AnswerController::class,
            'method' => 'delete'
        ),
        'post-wizard-question' => array(
            'class' => SSH\Controllers\WizardQuestionController::class,
            'method' => 'post'
        ),
        'delete-wizard-question' => array(
            'class' => SSH\Controllers\AnswerController::class,
            'method' => 'delete'
        )
    );

    return $config;