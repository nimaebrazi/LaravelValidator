<?php


namespace nimaebrazi\LaravelValidator\Validator;


/**
 * Class RuleManager
 * @package nimaebrazi\LaravelValidator\Validator
 */
class RuleManager
{
    /**
     *
     */
    const PipeSeparator = '|';

    /**
     * @var \Illuminate\Support\Collection
     */
    private $rules;

    /**
     * RuleManager constructor.
     */
    public function __construct()
    {
        $this->rules = collect();
    }

    /**
     * @param $value
     */
    protected function add($value)
    {
        $this->rules->push($value);
    }

    /**
     * @return $this
     */
    public function accepted()
    {
        $this->add('accepted');
        return $this;
    }

    /**
     * @return $this
     */
    public function activeUrl()
    {
        $this->add('active_url');
        return $this;
    }

    /**
     * @param $date
     * @return $this
     */
    public function afterDate($date)
    {
        $this->add('after:' . $date);
        return $this;
    }

    /**
     * @param $date
     * @return $this
     */
    public function afterOrEqualDate($date)
    {
        $this->add('after_or_equal:' . $date);
        return $this;
    }

    /**
     * @return $this
     */
    public function alpha()
    {
        $this->add('alpha');
        return $this;
    }

    /**
     * @return $this
     */
    public function alphaDash()
    {
        $this->add('alpha_dash');
        return $this;
    }

    /**
     * @return $this
     */
    public function alphaNumeric()
    {
        $this->add('alpha_num');
        return $this;
    }

    /**
     * @return $this
     */
    public function array()
    {
        $this->add('bail');
        return $this;
    }

    /**
     * @return $this
     */
    public function bail()
    {
        $this->add('bail');
        return $this;
    }

    /**
     * @param $date
     * @return $this
     */
    public function beforeDate($date)
    {
        $this->add('before:' . $date);
        return $this;
    }

    /**
     * @param $date
     * @return $this
     */
    public function beforeOrEqualDate($date)
    {
        $this->add('before_or_equal:' . $date);
        return $this;
    }

    /**
     * @param $min
     * @param $max
     * @return $this
     */
    public function between($min, $max)
    {
        $this->add('between:' . $min . ',' . $max);
        return $this;
    }

    /**
     * @return $this
     */
    public function boolean()
    {
        $this->add('boolean');
        return $this;
    }

    /**
     * @return $this
     */
    public function confirmed()
    {
        $this->add('confirmed');
        return $this;
    }

    /**
     * @return $this
     */
    public function date()
    {
        $this->add('date');
        return $this;
    }

    /**
     * @param $date
     * @return $this
     */
    public function dateEquals($date)
    {
        $this->add('date_equals:' . $date);
        return $this;
    }

    /**
     * @param $format
     * @return $this
     */
    public function dateFormat($format)
    {
        $this->add('date_format:' . $format);
        return $this;
    }

    /**
     * @param $field
     * @return $this
     */
    public function different($field)
    {
        $this->add('different:' . $field);
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function digits($value)
    {
        $this->add('digits:' . $value);
        return $this;
    }

    /**
     * @param $min
     * @param $max
     * @return $this
     */
    public function digitsBetween($min, $max)
    {
        $this->add('digits_between:' . $min . ',' . $max);
        return $this;
    }

    /**
     * @return $this
     */
    public function dimensionsImageFiles()
    {
        $this->add('');
        return $this;
    }

    /**
     * @return $this
     */
    public function distinct()
    {
        $this->add('distinct');
        return $this;
    }

    /**
     * @return $this
     */
    public function email()
    {
        $this->add('email');
        return $this;
    }

    /**
     * @param string $table
     * @param string $connection
     * @param string $column
     * @return $this
     */
    public function existsDatabase(string $table, string $connection = '', string $column = '')
    {
        $this->add('exists:' . $connection . '.' . $table . ',' . $column);
        return $this;
    }

    /**
     * @return $this
     */
    public function file()
    {
        $this->add('file');
        return $this;
    }

    /**
     * @return $this
     */
    public function filled()
    {
        $this->add('filled');
        return $this;
    }

    /**
     * @param $field
     * @return $this
     */
    public function greaterThan($field)
    {
        $this->add('gt:' . $field);
        return $this;
    }

    /**
     * @param $field
     * @return $this
     */
    public function greaterThanOrEqual($field)
    {
        $this->add('gte:' . $field);
        return $this;
    }

    /**
     * @return $this
     */
    public function imageFile()
    {
        $this->add('image');
        return $this;
    }

    /**
     * @param array $values
     * @return $this
     */
    public function in(array $values)
    {
        $commaSeparated = implode(",", $values);
        $this->add('in:' . $commaSeparated);
        return $this;
    }

    /**
     * @param $field
     * @param bool $all
     * @return $this
     */
    public function inArray($field, $all = true)
    {
        $rule = 'in_array:' . $field;

        if ($all) {
            $rule .= '*';
        }

        $this->add($rule);
        return $this;
    }

    /**
     * @return $this
     */
    public function integer()
    {
        $this->add('integer');
        return $this;
    }

    /**
     * @return $this
     */
    public function ipAddress()
    {
        $this->add('ip');
        return $this;
    }

    /**
     * @return $this
     */
    public function ipV4Address()
    {
        $this->add('ipv4');
        return $this;
    }

    /**
     * @return $this
     */
    public function ipV6Address()
    {
        $this->add('ipv6');
        return $this;
    }

    /**
     * @return $this
     */
    public function json()
    {
        $this->add('json');
        return $this;
    }

    /**
     * @param $field
     * @return $this
     */
    public function lessThan($field)
    {
        $this->add('lt:' . $field);
        return $this;
    }

    /**
     * @param $field
     * @return $this
     */
    public function lessThanOrEqual($field)
    {
        $this->add('lte:' . $field);
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function max($value)
    {
        $this->add('max:' . $value);
        return $this;
    }

    /**
     * @param array $types
     * @return $this
     */
    public function mimeTypes(array $types)
    {
        $commaSeparated = implode(",", $types);
        $this->add('mimetypes:' . $commaSeparated);
        return $this;
    }

    /**
     * @param array $types
     * @return $this
     */
    public function mimeTypeByFileExtension(array $types)
    {
        $commaSeparated = implode(",", $types);
        $this->add('mimes:' . $commaSeparated);
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function min($value)
    {
        $this->add('min:' . $value);
        return $this;
    }

    /**
     * @param $values
     * @return $this
     */
    public function notIn($values)
    {
        $commaSeparated = implode(",", $values);
        $this->add('not_in:' . $commaSeparated);
        return $this;
    }

    /**
     * @param string $pattern
     * @return $this
     */
    public function notRegex(string $pattern)
    {
        $this->add('not_regex:' . $pattern);
        return $this;
    }

    /**
     * @return $this
     */
    public function nullable()
    {
        $this->add('nullable');
        return $this;
    }

    /**
     * @return $this
     */
    public function numeric()
    {
        $this->add('numeric');
        return $this;
    }

    /**
     * @return $this
     */
    public function present()
    {
        $this->add('present');
        return $this;
    }

    /**
     * @param $pattern
     * @return $this
     */
    public function regularExpression($pattern)
    {
        $this->add('regex:' . $pattern);
        return $this;
    }

    /**
     * @return $this
     */
    public function required()
    {
        $this->add('required');
        return $this;
    }

    /**
     * @param array ...$field
     * @return $this
     */
    public function requiredIf(...$field)
    {
//        $this->add('required_if:anotherfield,value,...');
        return $this;
    }

    /**
     * @param array ...$fields
     * @return $this
     */
    public function requiredUnless(...$fields)
    {
//        $this->add('required_unless:' . $fields);
        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function requiredWith(array $fields)
    {
        $commaSeparated = implode(",", $fields);
        $this->add('required_with:' . $commaSeparated);
        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function requiredWithAll(array $fields)
    {
        $commaSeparated = implode(",", $fields);
        $this->add('required_with_all:' . $commaSeparated);
        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function requiredWithout(array $fields)
    {
        $commaSeparated = implode(",", $fields);
        $this->add('required_without:' . $commaSeparated);
        return $this;
    }

    /**
     * @param array $fields
     * @return $this
     */
    public function requiredWithoutAll(array $fields)
    {
        $commaSeparated = implode(",", $fields);
        $this->add('required_without_all:' . $commaSeparated);
        return $this;
    }

    /**
     * @param $field
     * @return $this
     */
    public function same($field)
    {
        $this->add('same:' . $field);
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function size($value)
    {
        $this->add('size:' . $value);
        return $this;
    }

    /**
     * @return $this
     */
    public function string()
    {
        $this->add('string');
        return $this;
    }

    /**
     * @return $this
     */
    public function timezone()
    {
        $this->add('timezone');
        return $this;
    }

    /**
     * @param string $table
     * @param $except
     * @param $id
     * @param string $connection
     * @param string $column
     * @return $this
     */
    public function uniqueDatabase(
        string $table,
        $except,
        $id,
        string $connection = '',
        string $column = ''
    ) {
        $fields = $connection . '.' .
            $table . ',' .
            $column . ',' .
            $except . ',' .
            $id;

        $this->add('unique:' . $fields);
        return $this;
    }

    /**
     * @return $this
     */
    public function url()
    {
        $this->add('url');
        return $this;
    }

    /**
     * @return $this
     */
    public function uuid()
    {
        $this->add('uuid');
        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return string
     */
    public function make(): string
    {
        $ruleString = '';
        foreach ($this->rules as $rule) {
            $ruleString .= $rule . self::PipeSeparator;
        }
        $ruleString = trim($ruleString, self::PipeSeparator);
        return $ruleString;
    }

    /**
     * Set new collection for rules property.
     *
     */
    public function resetRules()
    {
        $this->rules = collect();
    }
}