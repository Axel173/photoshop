<?php
/**
 * Created by PhpStorm.
 * User: Kate
 * Date: 01.03.2019
 * Time: 13:17
 */

namespace App\Repositories;

use App\Models\ShopOrder as Model;

class ShopOrderRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param $fields
     * @return mixed
     */
    public function createNewOrder($fields)
    {
        $result = $this
            ->startConditions()::create(array(
                'total_price' => $fields['total_price'],
                'first_name' => $fields['first_name'],
                'last_name' => $fields['last_name'],
                'email' => $fields['email'],
                'description' => $fields['description'],
                'user_id' => $fields['user_id'],
                'is_published' => true,
            ));

        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOrder($id)
    {
        $order = $this->startConditions()
            ->with([
                'products',
                'status'
            ])
            ->where([
                ['id', $id]
            ])
            ->first();

        return $order;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @param $id
     * @param $user_id
     * @return mixed
     */
    public function getUserOrder($id, $user_id)
    {
        $order = $this->startConditions()
            ->with([
                'products',
                'status'
            ])
            ->where([
                ['user_id', $user_id],
                ['id', $id]
            ])
            ->first();
        return $order;
    }

    /**
     * @param $user_id
     * @param $perPage
     * @return mixed
     */
    public function getAllWithUserPaginate($user_id, $perPage = null)
    {
        $result = $this
            ->startConditions()
            ->with(['status'])
            ->where([
                ['user_id', $user_id],
            ])
            ->paginate($perPage);

        return $result;
    }

    /**
     * @param $user_id
     * @param $perPage
     * @return mixed
     */
    public function getAllWithPaginate($perPage = null)
    {
        $result = $this
            ->startConditions()
            ->with(['status'])
            ->paginate($perPage);

        return $result;
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getLastUserOrder($user_id)
    {
        $orders = $this->startConditions()
            ->latest('created_at')
            ->with(['status'])
            //[
            //  ['status', '=', '1'],
            //  ['subscribed', '<>', '1'],
            //]
            ->where([
                ['user_id', $user_id],
                ['status_id', '!=', 2],
            ])
            ->first();
        return $orders;
    }

    /**
     * @param $order_id
     * @param $user_id
     * @return bool
     */
    public function cancelUserOrder($order_id, $user_id)
    {
        $order = $this->startConditions()
            ->where([
                ['user_id', $user_id],
                ['id', $order_id],
                ['status_id', '!=', 2],
            ])
            ->first();

        if ($order) {
            $order->status_id = 2;
            $order->save();

            return $order;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function countOrders()
    {
        $count = $this->startConditions()
            ->count();

        return $count;
    }

    /**
     * @return mixed
     */
    public function sumOrders()
    {
        $sumOrders = $this->startConditions()
            ->sum('total_price');

        return $sumOrders;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteOrder($id)
    {
        return $this->startConditions()
            ->find($id)
            ->delete();
    }
}