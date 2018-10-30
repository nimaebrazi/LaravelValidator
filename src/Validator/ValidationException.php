<?php


namespace nimaebrazi\LaravelValidator\Validator;


use Exception;


class ValidationException extends Exception
{
    protected $errors;

    /**
     * ValidationException constructor.
     * @param $message
     * @param $code
     * @param $errors
     */
    public function __construct($message, $code, $errors)
    {
        parent::__construct($message, $code);
        $this->errors = $errors;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed $errors
     * @return void
     */
    public function setErrors($errors): void
    {
        $this->errors = $errors;
    }
}
