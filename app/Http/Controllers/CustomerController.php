<?php



namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller {
    public function index() {
        if (Gate::denies('view_customers')) {
            abort(403, 'Unauthorized action.');
        }
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create() {
        if (Gate::denies('create_customers')) {
            abort(403, 'Unauthorized action.');
        }
        return view('customers.create');
    }

    public function store(CustomerRequest $request) {
        Customer::create($request->validated());
        return response()->json(['success' => 'Customer created successfully.']);
    }

    public function edit(Customer $customer) {
        if (Gate::denies('edit_customers')) {
            abort(403, 'Unauthorized action.');
        }
        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer) {
        $customer->update($request->validated());
        return response()->json(['success' => 'Customer updated successfully.']);
    }

    public function destroy(Customer $customer) {
        if (Gate::denies('delete_customers')) {
            abort(403, 'Unauthorized action.');
        }
        $customer->delete();
        return response()->json(['success' => 'Customer deleted successfully.']);
    }
}


// namespace App\Http\Controllers;

// use App\Models\Customer;
// use Illuminate\Http\Request;
// use App\Http\Requests\CustomerRequest;
// use Illuminate\Support\Facades\Gate;

// class CustomerController extends Controller
// {
//     public function __construct()
//     {
//         // Apply middleware for authorization
//         $this->middleware(function ($request, $next) {
//             if (auth()->user()->hasRole('supplier')) {
//                 return redirect()->route('suppliers.index')->with('error', 'Access Denied.');
//             }
//             return $next($request);
//         });
//     }

//     /**
//      * Display a listing of the customers.
//      */
//     // public function index()
//     // {
//     //     // Authorization check
//     //     if (Gate::denies('view-customers')) {
//     //         abort(403, 'Unauthorized');
//     //     }

//     //     $customers = Customer::all();
//     //     return view('customers.index', compact('customers'));
//     // }

//     /**
//      * Show the form for creating a new customer.
//      */
//     public function create()
//     {
//         // Authorization check
//         if (Gate::denies('create-customers')) {
//             abort(403, 'Unauthorized');
//         }

//         return view('customers.create');
//     }

//     /**
//      * Store a newly created customer in storage.
//      */
//     public function store(CustomerRequest $request)
//     {
//         // Authorization check
//         if (Gate::denies('create-customers')) {
//             abort(403, 'Unauthorized');
//         }

//         Customer::create($request->validated());
//         return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
//     }

//     /**
//      * Display the specified customer.
//      */
//     public function show(Customer $customer)
//     {
//         // Authorization check
//         if (Gate::denies('view-customers')) {
//             abort(403, 'Unauthorized');
//         }

//         return view('customers.show', compact('customer'));
//     }

//     /**
//      * Show the form for editing the specified customer.
//      */
//     public function edit(Customer $customer)
//     {
//         // Authorization check
//         if (Gate::denies('edit-customers')) {
//             abort(403, 'Unauthorized');
//         }

//         return view('customers.edit', compact('customer'));
//     }

//     /**
//      * Update the specified customer in storage.
//      */
//     public function update(CustomerRequest $request, Customer $customer)
//     {
//         // Authorization check
//         if (Gate::denies('edit-customers')) {
//             abort(403, 'Unauthorized');
//         }

//         $customer->update($request->validated());
//         return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
//     }

//     /**
//      * Remove the specified customer from storage.
//      */
//     public function destroy(Customer $customer)
//     {
//         // Authorization check
//         if (Gate::denies('delete-customers')) {
//             abort(403, 'Unauthorized');
//         }

//         $customer->delete();
//         return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
//     }
// }
