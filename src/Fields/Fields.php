<?php


namespace Tchury\ActiveCampaign\Fields;


use Tchury\ActiveCampaign\Resource;

/**
 * Class Fields
 * @package Tchury\ActiveCampaign\Fields
 */
class Fields extends Resource
{

    /**
     * @param array $field
     * @return string
     */
    public function create(array $field) {
        $req = $this->client
            ->getClient()
            ->post('/api/3/fields', [
                'json' => [
                    'field' => $field
                ]
            ]);

        return $req->getBody()->getContents();
    }

    /**
     * @param int $limit
     * @return string
     */
    public function listAll($limit = 100) {
        $req = $this->client->getClient()->get('/api/3/fields?limit='.$limit);
        return $req->getBody()->getContents();
    }

    /**
     * @param $name
     */
    public function get($name) {
        $fieldsApi = json_decode($this->listAll());
        $fields = $fieldsApi->fields;
        foreach($fields as $field) {
            if($field->title === $name) {
                return $field;
            }
        }
        return null;

    }

    /**
     * @param $perstag
     * @return mixed|null
     */
    public function getByPerstag($perstag) {
        $fieldsApi = json_decode($this->listAll());
        $fields = $fieldsApi->fields;
        foreach($fields as $field) {
            if($field->perstag === $perstag) {
                return $field;
            }
        }
        return null;

    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) {

        $req = $this->client
            ->getClient()
            ->delete('/api/3/fields/' . $id);

        return 200 === $req->getStatusCode();

    }

}