<?php

namespace calderawp\interopWP\Tests;

use PHPUnit\Framework\TestCase as PhpUnitTestCase;

abstract class TestCase extends PhpUnitTestCase
{

    /**
     * @param string $fieldId
     * @param array $config
     * @return array
     */
    protected function field($fieldId='', $config=[])
    {
        if (! $fieldId) {
            $fieldId = $this->fieldId();
        }

        return [
            'ID' => $fieldId,
            'slug' => bin2hex(random_bytes(5)),
            'config' => $config
        ];
    }
    protected function fieldId()
    {
        return uniqid('fld');
    }
    /** @return array */
    protected function formArray($formId = '')
    {
        if (! $formId) {
            $formId = $this->formId();
        }
        return [
            'ID' => $formId,
            'name' => 'bats',
            'fields' => []
        ];
    }

    /**
     * @return \Caldera_Forms_Entry
     */
    protected function wpCreateMockEntry($numberOfFields = 5)
    {
        $formId = $this->formId();
        $entryId = rand();
        $entryDetailsWp = $this->entryDetailsWpFactory($entryId, $formId);

        $entryWp = new \Caldera_Forms_Entry(
            [
                'ID' => $formId
            ],
            $entryId,
            $entryDetailsWp
        );

        $fieldIds = [];
        for ($i = 0; $i < $numberOfFields; $i++) {
            $field = $this->wpEntryFieldFactory();
            $entryWp->add_field($field);
            $fieldIds[] = $field->id;
        }


        return $entryWp;
    }

    /**
     * Create a mock Caldera_Forms_Entry_Field object
     *
     * @param string $fieldId
     * @return \Caldera_Forms_Entry_Field
     */
    protected function wpEntryFieldFactory($fieldId = '')
    {
        $field = new \Caldera_Forms_Entry_Field;
        $field->id = rand();
        $field->entry_id = rand();
        $field->field_id = !empty($fieldId) ? $fieldId : uniqid('fld');
        $field->slug = bin2hex(random_bytes(5));
        $field->value = bin2hex(random_bytes(35));
        return $field;
    }

    /**
     * @param $entryId
     * @param $formId
     * @return \Caldera_Forms_Entry_Entry
     */
    protected function entryDetailsWpFactory($entryId, $formId)
    {
        $entryDetailsWp = new \Caldera_Forms_Entry_Entry();
        $entryDetailsWp->id = $entryId;
        $entryDetailsWp->form_id = $formId;
        $entryDetailsWp->user_id = 1;
        $entryDetailsWp->datestamp = 1;
        return $entryDetailsWp;
    }

    /**
     * @return string
     */
    protected function formId()
    {
        $formId = uniqid('CF');
        return $formId;
    }
}
