<?php

namespace nimaebrazi\LaravelValidator\Validator;

interface ValidatorInterface
{
    /**
     * Rules of validation.
     *
     * @return array
     */
    public function rules(): array;

    /**
     * Run the validator's rules against its data.
     *
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validate(array $data, array $rules = [], array $messages = [], array $customAttributes = []);

    /**
     * Determine if the data fails the validation rules.
     *
     * @return bool
     */
    public function fails(): bool;

    /**
     * Determine if the data passes the validation rules.
     *
     * @return bool
     */
    public function passes(): bool;

    /**
     * Get all of the validation error messages.
     *
     * @return array
     */
    public function errors(): array;

    /**
     * Get all of the validation messages.
     *
     * @return array
     */
    public function messages(): array;

}