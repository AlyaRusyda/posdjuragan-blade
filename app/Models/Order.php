<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'order_date',
        'juragan',
        'id_customer',
        'payment_method',
        'source',
        'served_by',
        'id_produk',
        'size',
        'quantity',
        'tgl_bayar',
        'jumlah_dana',
        'tujuan_bayar',
        'total_amount',
        'paid_amount',
        'remaining_amount',
        'notes',
        'status',
        'keterangan_status',
        'deadline',
    ];

    public static function createNewOrder($data)
    {
        $data['status'] = 'belum_proses';
        return self::created($data);
    }

    public function scopeWithPaymentMethod($query, $paymentMethod)
    {
        return $query->when($paymentMethod, function ($query) use ($paymentMethod) {
            $query->where('payment_method', 'like', "%" . $paymentMethod . "%");
        });
    }

    public function scopeWithStatus($query, $status)
    {
        return $query->when($status, function ($query) use ($status) {
            $query->where('status', 'like', "%" . $status . "%");
        });
    }

    public function scopeWithShippingOption($query, $shippingOption)
    {
        return $query->when($shippingOption, function ($query) use ($shippingOption) {
            $query->where('status', 'like', "%" . $shippingOption . "%");
        });
    }

    public function scopeWithCustomerName($query, $customerName)
    {
        if (!empty($customerName)) {
            return $query->whereHas('customer', function ($query) use ($customerName) {
                $query->where('name', 'like', "%" . $customerName . "%");
            });
        }
    }

    public function scopeWithOrderDate($query, $orderDate)
    {
        return $query->when($orderDate, function ($query) use ($orderDate) {
            $query->whereDate('order_date', '=', $orderDate);
        });
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'served_by');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer');
    }

    public function scopeOrderanSelesai($query)
    {
        // Your scope implementation
        return $query->where('status', '=', 'orderan_selesai');
    }

    public function scopeExcludeStatusGagal($query)
    {
        return $query->where('keterangan_status', 'NOT LIKE', '%gagal%');
    }
}
