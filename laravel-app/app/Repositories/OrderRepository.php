<?php
namespace App\Repositories;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;


class OrderRepository extends BaseRepository
{
    public function storeNewOrder(array $data): Model
    {
        return $this->model->create($data);
    }
    
    public function findOrderById(int $id): Model
    {
        return $this->model->find($id);
    }

    public function model(): string
    {
        return Order::class;
    }
}