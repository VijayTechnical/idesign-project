<div>
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Notifications</h4>
                    <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                            @if ($notifications->count() > 0)
                                @foreach ($notifications as $notification)
                                    @if ($notification->type == 'App\Notifications\SubscriberNotification')
                                        <li>
                                            <div class="form-check form-check-primary">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox">
                                                    {{ $notification->data['email'] }} has subscribed us.
                                                </label>
                                            </div>
                                            <i class="remove mdi mdi-close-box" wire:click.prevent="status"></i>
                                        </li>
                                    @elseif ($notification->type == 'App\Notifications\OrderNotification')
                                        <li>
                                            <div class="form-check form-check-primary">
                                                <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox">
                                                    {{ $notification->data['name'] }} has ordered item through
                                                    {{ $notification->data['method'] }} on
                                                    {{ $notification->data['created_at'] }}
                                                </label>
                                            </div>
                                            <i class="remove mdi mdi-close-box" wire:click.prevent="status"></i>
                                        </li>
                                    @endif
                                @endforeach
                            @else
                                <p class="text-danger text-center mt-5">No new notifications</p>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
