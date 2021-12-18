<div>
    <div class="page-header">
        <h3 class="page-title"> Orders </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders Table
                    </h4>
                    <div class="table-header">
                        <form action="#" class="mt-1">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <select name="paginate" id="paginate" aria-placeholder="Number of orders"
                                            class="form-control" wire:model="paginate">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-7">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" placeholder="Search here...." class="form-control"
                                            wire:model="searchTerm">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>OrderId</th>
                                    <th>Client</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>T_Mode</th>
                                    <th>T_Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>
                                            <img src="{{ asset('/storage/user_image') }}/{{ $order->user->profile_photo_path }}"
                                                alt="{{ $order->user->name }}" />
                                            <span class="pl-2">{{ $order->user->name }}</span>
                                        </td>
                                        <td>
                                            @if ($order->status == 'ordered')
                                                <div class="badge badge-outline-warning"> {{ $order->status }}</div>
                                            @elseif($order->status == 'delivered')
                                                <div class="badge badge-outline-success"> {{ $order->status }}</div>
                                            @else
                                                <div class="badge badge-outline-danger"> {{ $order->status }}</div>
                                            @endif
                                        </td>
                                        <td>Rs. {{ number_format($order->total) }}</td>
                                        @if($order->transaction->mode)
                                        <td>{{ $order->transaction->mode }}</td>
                                        @else
                                        <td>cod</td>
                                        @endif
                                        @if($order->transaction->status)
                                        <td>
                                            @if ($order->transaction->status == 'pending')
                                                <div class="badge badge-outline-warning">
                                                    {{ $order->transaction->status }}</div>
                                            @elseif($order->transaction->status == 'approved')
                                                <div class="badge badge-outline-success">
                                                    {{ $order->transaction->status }}</div>
                                            @elseif($order->transaction->status == 'declined')
                                                <div class="badge badge-outline-danger">
                                                    {{ $order->transaction->status }}</div>
                                            @else
                                                <div class="badge badge-outline-primary">
                                                    {{ $order->transaction->status }}</div>
                                            @endif
                                        </td>
                                        @endif
                                        <td>{{ $order->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', ['order_id' => $order->id]) }}"
                                                class="btn btn-primary"><i class="mdi mdi-eye"></i></a>
                                            @if ($order->status === 'ordered')
                                                <a href="#"
                                                    wire:click.prevent="statusDelivered({{ $order->id }},'delivered')"
                                                    class="btn btn-success"><i
                                                        class="mdi mdi-checkbox-marked-circle-outline"></i></a>
                                                <a href="#"
                                                    wire:click.prevent="statusCancelled({{ $order->id }},'cancelled')"
                                                    class="btn btn-danger"><i class="mdi mdi-window-close"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- PAGINATION-->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center justify-content-lg-end">
                            {{ $orders->links('pagination::bootstrap-4') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('swal:confirmDelivered', event => {
            swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.statuscode,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willUpdate) => {
                    if (willUpdate) {
                        window.livewire.emit('statusupdate', event.detail.id, event.detail.status);
                    }
                });
        });
        window.addEventListener('swal:confirmCancelled', event => {
            swal({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.statuscode,
                    buttons: true,
                    dangerMode: true,
                })
                .then((willUpdate) => {
                    if (willUpdate) {
                        window.livewire.emit('statusupdate', event.detail.id, event.detail.status);
                    }
                });
        });
    </script>
@endpush
