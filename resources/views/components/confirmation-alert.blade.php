@push('confirmation-scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('show-delete-confirmation', event => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteConfirmed');
                window.addEventListener('deleted', event => {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                });
            }
        })
    });

    window.addEventListener('show-update-success', event => {
        Swal.fire(
            'Good job!',
            'Data updated successfully',
            'success'
        )

    });

    window.addEventListener('show-create-success', event => {
        Swal.fire(
            'Good job!',
            'Data saved successfully',
            'success'
        ).then((result) => {
            Livewire.emit('resetFrom');
        });
    });

    window.addEventListener('show-create-error', event => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
        });
    });

    window.addEventListener('show-update-error', event => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
        });
    });



</script>
@endpush