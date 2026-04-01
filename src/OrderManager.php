<?php

namespace App;

class OrderManager
{
    private array $orders = [];
    private int $nextId = 1;

    public function createOrder(float $amount): int
    {
        $id = $this->nextId++;
        $this->orders[$id] = [
            'id' => $id,
            'sum' => $amount,
            'status' => 'новый'
        ];
        return $id;
    }

    public function setStatus(int $id, string $status): bool
    {
        $allowed = ['новый', 'в работе', 'завершенный'];
        if (isset($this->orders[$id]) && in_array($status, $allowed)) {
            $this->orders[$id]['status'] = $status;
            return true;
        }
        return false;
    }

    public function getOrdersByStatus(string $status): array
    {
        return array_filter($this->orders, fn($order) => $order['status'] === $status);
    }
}
