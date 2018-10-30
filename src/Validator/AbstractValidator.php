<?php


namespace nimaebrazi\LaravelValidator\Validator;


use Exception;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\MessageBag;

abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * @var ValidationFactory
     */
    private $validationFactory;

    /** @var Validator */
    private $validator;

    /**
     * @var RuleManager|null
     */
    protected $ruleManager = null;


    /**
     * AbstractValidator constructor.
     * @param ValidationFactory $validationFactory
     */
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
     * @return AbstractValidator
     * @throws Exception
     */
    public function make(array $data, array $rules = [], array $messages = [], array $customAttributes = [])
    {
        // Handle if not set any rules.
        if (!$rules && !$this->rules()) {
            throw new Exception('Not found any rules!');
        }

        $rules = $rules ?: $this->rules();
        $messages = $messages ?: $this->messages();
        $customAttributes = $customAttributes ?: $this->customAttributes();

        $this->validator = $this->validationFactory->make($data, $rules, $messages, $customAttributes);

        return $this;
    }

    /**
     * Determine if the data fails the validation rules.
     *
     * @return bool
     */
    public function fails(): bool
    {
        return $this->validator->fails();
    }

    /**
     * Determine if the data passes the validation rules.
     *
     * @return bool
     */
    public function passes(): bool
    {
        return !$this->fails();
    }

    /**
     * Get all of the validation error messages.
     *
     * @return MessageBag
     */
    public function errors(): MessageBag
    {
        return $this->validator->errors();
    }

    /**
     * Rules of validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * Messages of rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }

    /**
     * Custom attributes of rules.
     *
     * @return array
     */
    public function customAttributes(): array
    {
        return [
            //
        ];
    }

    /**
     * Validate data.
     *
     * @return bool
     * @throws ValidationException
     */
    public function validate()
    {
        if ($this->passes()) {
            return true;
        }

        throw new ValidationException(
            trans(config('laravel_validator.message_path')),
            config('laravel_validator.HttpStatusCode'),
            $this->validator->errors()->messages()
        );

    }

    /**
     * Reset old object of rules collection or set new RuleManager.
     *
     * @return RuleManager|null
     */
    protected function ruleManager()
    {
        if (is_null($this->ruleManager)) {
            $this->ruleManager = new RuleManager();
        }
        $this->ruleManager->resetRules();
        return $this->ruleManager;
    }
}
