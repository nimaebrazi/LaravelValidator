# LaravelValidator

### Instalation
```sh
composer require nimaebrazi/laravel-validator
```
Add this key in <code>messages.php</code> file:

<code>resources/lang/YOUR_LANGUAGE/messages.php</code>

```php
"validation_failed" => "YOUR_MESSAGE_WHEN_VALIDATION_FAILED"
```

This package throws an exception named ValidationException. For handling Laravel Exception, add below code in <code>Handler.php</code> file and custumize it for your project.

```php
use nimaebrazi\LaravelValidator\src\Validator\ValidationException;
...
/**
* Render an exception into an HTTP response.
*
* @param  \Illuminate\Http\Request  $request
* @param  \Exception  $exception
* @return \Illuminate\Http\Response
*/
public function render($request, Exception $exception)
{
    if($exception instanceof ValidationException){
        return response()->json([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'description' => $exception->getMessage(),
            'data' => [
                'errors' => $exception->getErrors()
            ]

        ], 422);
    }

  return parent::render($request, $exception);
}
```
    
### Usage

Step 1:

Create a validation class:

<code>\nimaebrazi\LaravelValidator\Validator\AbstractValidator</code>

```php
use nimaebrazi\LaravelValidator\Validator\AbstractValidator;

class UpdateUserProfile extends AbstractValidator
{
    /**
     * Rules of validation.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3',
        ];
    }
    
    // OPTIONAL
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

    // OPTIONAL
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
}
```

#### For more about:

[Custom Error Messages](https://laravel.com/docs/5.7/validation#custom-error-messages)

[Custom Attributes](https://gilbitron.me/blog/laravel-custom-validation-attributes)

Step 2:
Inject class to a controller:

```php
class ApiUserController extends Controller
{
    /**
     * @param Request $request
     * @param UpdateUserProfile $validator
     * @throws \Exception
     * @throws \nimaebrazi\LaravelValidator\src\Validator\ValidationException
     */
    public function update(Request $request, UpdateUserProfile $validator)
    {
        $result = $validator->make($request->all())->validate();

        dd($result); // true, when passed
    }
```

#### Notes:
- When you call <code>validate</code> function package throws default exception. If you want handle other way:
```php
class ApiUserController extends Controller
{
    /**
     * @param Request $request
     * @param UpdateUserProfile $validator
     * @throws \Exception
     * @throws \nimaebrazi\LaravelValidator\src\Validator\ValidationException
     */
    public function update(Request $request, UpdateUserProfile $validator)
    {
        $validator->make($request->all());

        if($validator->fails()){
           // your codes
        }
        
        
        if($validator->passes()){
           // your codes
        }
    }
```
