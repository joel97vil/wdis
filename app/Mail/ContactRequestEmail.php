<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class ContactRequestEmail extends Mailable
{
    public $view;

    public $subject;

    protected string $template;

    protected ?Collection $usableFields;

    protected array $allowedFiles;

    protected array $excludedFields;

    public function __construct(Request $request, string $template, string $subject, array $excludedFields = [], array $allowedFiles = [])
    {
        $this->subject = $subject;

        $this->allowedFiles = $allowedFiles;

        $this->excludedFields = $excludedFields;

        $this->usableFields = $this->cleanRequest($request);

        $this->template = $template;
    }

    public function build()
    {
        $this->usableFields = $this->prepareFields($this->usableFields);

        $this->view = view($this->template, ['fields' => $this->usableFields])->render();

        return $this->subject(__($this->subject))->html($this->view);
    }

    protected function cleanRequest($request)
    {
        return collect($request->toArray())->filter()->except($this->excludedFields);
    }

    protected function prepareFields($fields)
    {
        return $fields->mapWithKeys(function ($value, $field) {
            return [$this->translate($field) => $value];
        });
    }

    private function translate($field)
    {
        if (Lang::has("forms.{$field}")) {
            return __("forms.{$field}", [], 'es');
        }

        return $field;
    }
}
