{{-- <div>
    {{ $resource_id }}
    {{ $resource_name }}
    {{ $resource_type }}
    {{ $slot }}
</div> --}}

<button type="button" class="{{ 'btn btn-danger ' . $button_class }}" data-bs-toggle="modal" data-bs-target="{{ '#delete' . ucfirst($resource_type) . 'Modal-' . $resource_id }}">
    Delete
</button>



<div class="modal fade" id="{{ 'delete' . ucfirst($resource_type) . 'Modal-' . $resource_id }}" tabindex="-1" aria-labelledby="{{ 'delete' . ucfirst($resource_type) . 'ModalLabel' }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="{{ 'delete' . ucfirst($resource_type) . 'ModalLabel' }}">
            Delete {{ $resource_type }} #{{ $resource_id }}
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
            Do you really want to delete "{{ $resource_name }}"?
        </p>

        @if ($resource_type == 'game')
            <p class="alert alert-warning m-0">
                <strong>
                    This action will also delete forever all cards and decks associated with this game!
                </strong>
            </p>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Close
        </button>

        <form action="{{ route('' . $resource_type . 's.destroy', $resource_id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Delete forever
            </button>
        </form>
      </div>
    </div>
  </div>
</div>