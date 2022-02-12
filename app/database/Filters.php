<?php
namespace app\database;

class Filters
{
    private array $filters = [];

    public function where(string $field, string $operator, mixed $value, string $logic = '')
    {
        $formatter = '';
        if (is_array($value)) {
            $formatter = "('".implode("','", $value)."')";
        } elseif (is_string($value)) {
            $formatter = "'{$value}'";
        } elseif (is_bool($value)) {
            $formatter = $value ? 1 : 0;
        } else {
            $formatter = $value;
        }

        $value = strip_tags($formatter);

        $this->filters['where'][] = "{$field} {$operator} {$value} {$logic}";
    }

    public function limit(int $limit)
    {
        $this->filters['limit'] = " limit {$limit}";
    }

    public function orderBy(string $field, string $order = 'asc')
    {
        $this->filters['order'] = " order by {$field} {$order}";
    }

    // select * from users left join posts on users.id = posts.userId

    public function join(string $foreignTable, string $joinTable1, string $operator, string $joinTable2, string $joinType = 'inner join')
    {
        $this->filters['join'][] = "{$joinType} {$foreignTable} on {$joinTable1} {$operator} {$joinTable2}";
    }

    public function dump()
    {
        $filter = !empty($this->filters['join']) ? implode(' ', $this->filters['join']) : '';
        $filter .= !empty($this->filters['where']) ? ' where '.implode(' ', $this->filters['where']) : '';
        $filter.= $this->filters['order'] ?? '';
        $filter.= $this->filters['limit'] ?? '';
        return $filter;
    }
}
