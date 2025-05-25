@extends("layouts.app")

@section("title")
Moj nalog
@endsection

@section("content")
<div class="container mt-5">
    <div class="bg-primary text-white p-4 rounded shadow-sm">
        <h1 class="display-5"><strong>Moj nalog</strong></h1>
        <hr class="border-light w-25">
    </div>

    <div class="mt-4">
        <h2>Dobrodošao, {{ $user->name }}</h2>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>

    <div class="mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Moje narudžbine</h4>
            <a href="{{ route('public.order') }}" class="btn btn-danger">Dodaj narudžbinu</a>
        </div>

        @if(count($orders) > 0)
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-primary text-dark">
                        <tr>
                            <th>ID</th>
                            <th>Datum</th>
                            <th>Proizvod</th>
                            <th>Količina</th>
                            <th>Ukupan iznos</th>
                            <th>Status</th>
                            <th>Opcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d.m.Y. H:i') }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ number_format($order->total_price, 2) }} RSD</td>
                            <td>{{ $order->status ?? 'Na čekanju' }}</td>
                            <td>
                                <form action="{{ route('public.delete', $order->id) }}" method="POST" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovu narudžbinu?')">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Obriši</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-primary mt-3" role="alert">
                Nemate nijednu narudžbinu.
            </div>
        @endif
    </div>
</div>
@endsection
