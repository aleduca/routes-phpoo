<?php
namespace app\database\models;

use app\database\Connection;
use app\database\Filters;
use app\database\Pagination;
use PDO;
use PDOException;

abstract class Model
{
    private string $fields = '*';
    private string $filters = '';
    private string $pagination = '';

    public function setFields($fields)
    {
        $this->fields = $fields;
    }

    public function setFilters(Filters $filters)
    {
        $this->filters = $filters->dump();
    }

    public function setPagination(Pagination $pagination)
    {
        $pagination->setTotalItems($this->count());
        $this->pagination = $pagination->dump();
    }

    public function create(array $data)
    {
        try {
            $sql = "insert into {$this->table} (";
            $sql.=implode(',', array_keys($data)).") values(";
            $sql.=':'.implode(',:', array_keys($data)).")";

            $connect = Connection::connect();

            $prepare = $connect->prepare($data);

            return $prepare->execute($data);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }


    // $user->update('id', 22,['firstName' => 'alexa'])

    // update users set firstName = 'Mario', lastName = 'Santos' where id = 22

    public function update(string $field, string|int $fieldValue, array $data)
    {
        try {
            $sql = "update {$this->table} set ";
            foreach ($data as $key => $value) {
                $sql.= "{$key} = :{$key},";
            }

            $sql = rtrim($sql, ',');

            $sql.= " where {$field} = :{$field}";

            $connection = Connection::connect();

            $data[$field] = $fieldValue;

            $prepare = $connection->prepare($sql);

            return $prepare->execute($data);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function fetchAll()
    {
        try {
            $sql = "select {$this->fields} from {$this->table} {$this->filters} {$this->pagination}";

            $connection = Connection::connect();

            $query = $connection->query($sql);

            return $query->fetchAll(PDO::FETCH_CLASS, get_called_class());
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function findBy(string $field = '', string $value = '')
    {
        try {
            $sql = (empty($this->filters)) ?
                "select {$this->fields} from {$this->table} where {$field} = :{$field}" :
                "select {$this->fields} from {$this->table} {$this->filters}";

            $connection = Connection::connect();

            $prepare = $connection->prepare($sql);

            $prepare->execute(!$this->filters ? [$field => $value] : []);

            return $prepare->fetchObject(get_called_class());
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function first($field = 'id', $order = 'asc')
    {
        try {
            $sql = "select {$this->fields} from {$this->table} order by {$field} {$order} limit 1";

            $connection = Connection::connect();

            $query = $connection->query($sql);

            return $query->fetchObject(get_called_class());
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function delete(string $field = '', string|int $value = '')
    {
        try {
            $sql = (!empty($this->filters)) ?
            "delete from {$this->table} {$this->filters}":
            "delete from {$this->table} where {$field} = :{$field}";

            $connection = Connection::connect();

            $prepare = $connection->prepare($sql);

            return $prepare->execute(empty($this->filters) ? [$field => $value] : []);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function count()
    {
        try {
            $sql = "select {$this->fields} from {$this->table} {$this->filters}";

            $connection = Connection::connect();

            $query = $connection->query($sql);

            return $query->rowCount();
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }
}
