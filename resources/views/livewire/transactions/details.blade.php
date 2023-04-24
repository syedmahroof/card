<div>
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Projects</li>
        </ol>
    </nav>

    <div class="row">
        <div class=" @if (!$addData && !$updateData) col-md-12 @else hide @endif grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                   
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    <th>Product</th>
                                    <th> Type</th>
                                    <th> Value</th>
                                    <th>Project</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($transactions) > 0)
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>
                                                <div>{{ $transaction->product->title }}</div>
                                            </td>

                                            <td>
                                                <div>{{ $transaction->type }}</div>
                                            </td>
                                           
                                            <td>
                                                <div>{{ $transaction->value }}</div>
                                            </td>

                                            <td>
                                                <div>{{ isset($transaction->project) ? $transaction->project->name : "" }}</div>
                                            </td>
                                            <td>
                                                <div>{{ isset($transaction->project) ? $transaction->project->name : "" }}</div>
                                            </td>
                                       
{{--                                             --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" align="center">
                                            No Posts Found.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

<x-confirmation-alert />
