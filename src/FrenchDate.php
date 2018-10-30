<?php

namespace JoffreyC22\FrenchDatepicker;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;
use Exception;
use Carbon\Carbon;
use DateTime;
use DateTimeInterface;

class FrenchDate extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'french-date';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|null  $attribute
     * @param  mixed|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback ?? function ($value) {
            if (! $value instanceof DateTimeInterface) {
                throw new Exception("Date field must cast to 'date' in Eloquent model.");
            }

            return $value->format('d-m-Y');
        });
    }

    /**
     * Indicate that the date field is nullable.
     *
     * @return $this
     */
    public function nullable()
    {
        return $this->withMeta(['nullable' => true]);
    }

    /**
     * Hydrate the given attribute on the model based on the incoming request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  string  $requestAttribute
     * @param  object  $model
     * @param  string  $attribute
     * @return void
     */
    protected function fillAttributeFromRequest(NovaRequest $request,
                                                $requestAttribute,
                                                $model,
                                                $attribute)
    {
        if ($request->exists($requestAttribute) && $request[$requestAttribute]) {
            $sentData = $request[$requestAttribute];
            if (DateTime::createFromFormat('d-m-Y', $sentData) === FALSE) {
              throw new Exception("Le champ date doit être une date valide.");
            }
            $newDate = Carbon::createFromFormat('d-m-Y', $request[$requestAttribute])->format('Y-m-d');
            $model->{$attribute} = $newDate;
        }
    }
}
