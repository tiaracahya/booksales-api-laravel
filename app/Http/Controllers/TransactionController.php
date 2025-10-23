<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;
use App\Models\Book;


class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'book')->get();

        if($transactions->isEmpty()){
            return response()->json([
                'success' => true,
                'message' => 'Resource data not found'
            ], 200);
        }

        
        return response()->json([
            'success' => true,
            'message' => 'Get all resource',
            'data' => $transactions
        ]);
        
    }

    public function store(Request $request)
    {
        // 1. validator & cek validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Validator errors',
                'data' => $validator->errors()
            ], 422);
        }

        // 2. generate orderNumber -> unique | ORD-0003
        $uniqueCode = "ORD-" . strtoupper(uniqid());


        // 3. ambil user yang sedang login & cek login (apakah ada data user?)
        $user = auth('api')->user();

        if (!$user){
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized!'
            ], 401);
        }


        // 4. mencari data buku dari request
        $book = Book::find($request->book_id);

        // 5. cek stok buku
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Stok barang tidak cukup!' 
            ], 400);
        }

        // 6. hitung total harga = price * quantity
        $total_Amount = $book-> price * $request->quantity;

        // 7. kurangi stok buku (update)
        $book->stock -= $request->quantity;
        $book->save();

        // 8. simpan data transaksi
        $transactions = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $book->id,
            'total_amount' => $total_Amount
        ]);



        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully!',
            'data' => $transactions
        ], 201);
    }
}
