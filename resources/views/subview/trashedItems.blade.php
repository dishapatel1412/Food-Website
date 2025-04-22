<div id="trashContainer" style="display: none;">
    <div id="trashedItemsList">
        @if(isset($trashedItems) && $trashedItems->isNotEmpty())
            @foreach($trashedItems as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">Price: ₹{{ $item->price }}</p>
                        <form action="{{ route('restore', $item->item_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Restore</button>
                        </form>
                        <form action="{{ route('delete', $item->item_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Permanently</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>No trashed items.</p>
        @endif
    </div>
</div>
