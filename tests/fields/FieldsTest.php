<?php


namespace Tchury\Tests\fields;


use Tchury\ActiveCampaign\Fields\Fields;
use Tchury\Tests\ResourceTestCase;

/**
 * Class FieldsTest
 * @package Tchury\Tests\fields
 */
class FieldsTest extends ResourceTestCase
{
    private static $title;
    private static $type;
    private static $descript;
    private static $perstag;
    private static $defval;
    private static $visible;
    private static $ordernum;

    /**
     *
     */
    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        self::$title = 'SampleTagForTesting';
        self::$type = 'textarea';
        self::$descript = 'API Test';
        self::$perstag = 'SAMPLE_TAG_FOR_TESTING';
        self::$defval = 'Test default value';
        self::$visible = 1;
        self::$ordernum = 1;
    }

    /**
     *
     */
    public function testCreation() {
        $fields = new Fields($this->client);
        $create = $fields->create([
            'title' => self::$title,
            'type' => self::$type,
            'descript' => self::$descript,
            'perstag' => self::$perstag,
            'defval' => self::$defval,
            'visible' => self::$visible,
            'ordernum' => self::$ordernum
        ]);
        $createdField = json_decode($create, true);
        $this->assertEquals(1, count($createdField));

        $getField = $fields->getByPerstag($createdField['field']['perstag']);
        $this->assertEquals(self::$title, $getField->title);
    }

    public function testDelete() {
        $fields = new Fields($this->client);
        $getField = $fields->getByPerstag(self::$perstag);
        $this->assertNotNull($getField);
        $fields->delete($getField->id);
        $fieldDeleted = $fields->getByPerstag(self::$perstag);
        $this->assertNull($fieldDeleted);
    }

    /**
     * @return string
     */
    public function testGetAllFields() {
        $fields = new Fields($this->client);
        $fieldsList = (array)json_decode($fields->listAll());
        $this->assertArrayHasKey('fieldOptions', $fieldsList);
        $this->assertArrayHasKey('fieldRels', $fieldsList);
        $this->assertArrayHasKey('fields', $fieldsList);
        $this->assertArrayHasKey('meta', $fieldsList);
        return $fields->listAll();
    }
}