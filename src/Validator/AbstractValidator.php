<?php


namespace nimaebrazi\LaravelValidator\Validator;


use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;

abstract class AbstractValidator implements ValidatorInterface
{

    private $validationFactory;

    private $validator;

    public function __construct(ValidationFactory $validationFactory)
    {
        $this->validationFactory = $validationFactory;
    }

    /**
     * Run the validator's rules against its data.
     *
     * @param array $data
     * @param array|null $rules
     * @param array $messages
     * @param array $customAttributes
     * @return Validator
     */
    public function validate(array $data, array $rules = [], array $messages = [], array $customAttributes = []): Validator
    {
        $this->validator = $this->validationFactory->make($data, $rules, $messages, $customAttributes);
    }

    /**
     * Determine if the data fails the validation rules.
     *
     * @return bool
     */
    public function fails(): bool
    {
        // TODO: Implement fails() method.
    }

    /**
     * Determine if the data passes the validation rules.
     *
     * @return bool
     */
    public function passes(): bool
    {
        // TODO: Implement passes() method.
    }

    /**
     * Get all of the validation error messages.
     *
     * @return array
     */
    public function errors(): array
    {
        // TODO: Implement errors() method.
    }

    /**
     * Get all of the validation messages.
     *
     * @return array
     */
    public function messages(): array
    {
        // TODO: Implement messages() method.
    }

    /**
     * Rules of validation.
     *
     * @return array
     */
    abstract public function rules(): array;

}