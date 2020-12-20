<div>
    <x-slot name="title">
        Collaborators
    </x-slot>

    <div>
        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check mr-1"></i> {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    <form wire:submit.prevent="submit">
        <input type="hidden" wire:model="collaborator_id">
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" wire:model="full_name" class="form-control @error('full_name') is-invalid @enderror"
                id="full_name">
            @error('full_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" wire:model="username" class="form-control @error('username') is-invalid @enderror"
                id="username">
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror" id="email">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="position_held">Position held</label>
            <input type="text" wire:model="position_held"
                class="form-control @error('position_held') is-invalid @enderror" id="position_held">
            @error('position_held')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="button" class="btn btn-secondary" wire:click="clear">Clear</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="table-responsive mt-5">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Full name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Position held</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($collaborators as $collaborator)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $collaborator->full_name }}</td>
                    <td>{{ $collaborator->username }}</td>
                    <td>{{ $collaborator->email }}</td>
                    <td>{{ $collaborator->position_held }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-info" wire:click="edit({{ $collaborator->id }})">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger" wire:click="delete({{ $collaborator->id }})">Delete</button>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td class="h1 text-center" colspan="6">No records found !</td>
                  </tr>
                @endforelse
            </tbody>
          </table>
      </div>
</div>