<?php


namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SupplierController extends Controller {
    public function index() {
        if (Gate::denies('view_suppliers')) {
            abort(403, 'Unauthorized action.');
        }
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create() {
        if (Gate::denies('create_suppliers')) {
            abort(403, 'Unauthorized action.');
        }
        return view('suppliers.create');
    }

    public function store(SupplierRequest $request) {
        Supplier::create($request->validated());
        return response()->json(['success' => 'Supplier created successfully.']);
    }

    public function edit(Supplier $supplier) {
        if (Gate::denies('edit_suppliers')) {
            abort(403, 'Unauthorized action.');
        }
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(SupplierRequest $request, Supplier $supplier) {
        $supplier->update($request->validated());
        return response()->json(['success' => 'Supplier updated successfully.']);
    }

    public function destroy(Supplier $supplier) {
        if (Gate::denies('delete_suppliers')) {
            abort(403, 'Unauthorized action.');
        }
        $supplier->delete();
        return response()->json(['success' => 'Supplier deleted successfully.']);
    }
}

// namespace App\Http\Controllers;

// use App\Models\Supplier;
// use App\Http\Requests\SupplierRequest;
// use Illuminate\Http\Request;

// class SupplierController extends Controller
// {
//     public function index()
//     {
//         $suppliers = Supplier::all();
//         return view('suppliers.index', compact('suppliers'));
//     }

//     public function create()
//     {
//         return view('suppliers.create');
//     }

//     public function store(SupplierRequest $request)
//     {
//         Supplier::create($request->validated());
//         return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
//     }

//     public function show(Supplier $supplier)
//     {
//         return view('suppliers.show', compact('supplier'));
//     }

//     public function edit(Supplier $supplier)
//     {
//         return view('suppliers.edit', compact('supplier'));
//     }

//     public function update(SupplierRequest $request, Supplier $supplier)
//     {
//         $supplier->update($request->validated());
//         return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
//     }

//     public function destroy(Supplier $supplier)
//     {
//         $supplier->delete();
//         return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
//     }
// }
